<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Uspdev\Replicado\Pessoa;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/Discente';

    public function username()
    {
        return 'codpes';
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('senhaunica')->redirect();
    }

    public function handleProviderCallback()
    {
        $userSenhaUnica = Socialite::driver('senhaunica')->user();

        $user = User::where('codpes',$userSenhaUnica->codpes)->first();

        if (is_null($user)) $user = new User;

        // bind do dados retornados
        $user->codpes = $userSenhaUnica->codpes;
        $user->email = $userSenhaUnica->email;
        $user->name = $userSenhaUnica->nompes;
        $user->save();
        Auth::login($user, true);
        return redirect('/');
    }

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