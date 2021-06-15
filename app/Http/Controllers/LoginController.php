<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Uspdev\Replicado\Pessoa;

class LoginController extends Controller
{

    public function loginAsForm(){
        $this->authorize('admin');
        return view('login.loginas');
    }

    public function loginAs(Request $request){

        $this->authorize('admin');

        $request->validate([
            'codpes' => 'required|integer',
          ]);

        $user = User::where('codpes',$request->codpes)->first();

        if (is_null($user)) {
            $user = new User;
            $pessoa = Pessoa::dump($request->codpes);
            if($pessoa){
                $user->codpes = $request->codpes;
                $user->email = Pessoa::email($request->codpes);
                $user->name = Pessoa::nomeCompleto($request->codpes);
                $user->save();
            } else {
                request()->session()->flash('alert-danger','Usuário não existe na USP');
                return redirect('/loginas');
            }
        }

        Auth::login($user, true);
        return redirect('/');
    }
}