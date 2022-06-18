<?php

namespace App\Console\Commands;

use App\Http\Controllers\SuperheroController;
use App\Models\Superhero;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetDataFromApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Superheroes data from API';

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
        $response = Http::get('https://akabab.github.io/superhero-api/api/all.json');
        $superheroes = json_decode($response,false);
        foreach ($superheroes as $superhero){
            if ($superhero->biography->alignment == 'good'){
                $alignment_id = 1;
            } else {
                $alignment_id = 2;
            }
            $height = substr($superhero->appearance->height[1], 0,-3);
            $weight = substr($superhero->appearance->weight[1],0,-3);
            $hero = Superhero::create([
                'name' => $superhero->name,
                'intelligence' => $superhero->powerstats->intelligence,
                'strength' => $superhero->powerstats->strength,
                'speed' => $superhero->powerstats->speed,
                'durability' => $superhero->powerstats->durability,
                'power' => $superhero->powerstats->power,
                'combat' => $superhero->powerstats->combat,
                'height' => (int)$height,
                'weight' => (int)$weight,
                'image_sm_url' => $superhero->images->sm,
                'image_lg_url' => $superhero->images->lg,
                'alignment_id' => $alignment_id,
                'aliases' => implode(',', $superhero->biography->aliases),
            ]);
        }
    }
}
