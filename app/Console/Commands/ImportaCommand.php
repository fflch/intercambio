<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pais;
use App\Models\Instituicao;

class ImportaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo("Iniciando importação...\n");
        $csv = array_map('str_getcsv', file(base_path() . '/DATA-EXPORT/instituicoes.csv'));
        foreach($csv as $row){
            $pais = new Termo;
            $pais->nome = $row[0];    
            $pais->save();

            if(!empty($row[1])){
                # verifica se ele já existe
                $cdd = Cdd::where('cdd',$row[1])->first();
                if(!$cdd) {
                    $cdd = Cdd::create(['cdd' => $row[1]]);
                } 
                
                $termo->cdds()->attach($cdd);
                $termo->save();
            }
        }
        echo("Importação completa.\n");

        return 0;
    }
}
