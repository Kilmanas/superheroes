<?php

namespace App\Console\Commands;

use App\Models\Image;
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
                $alignmentId = 1;
            } else {
                $alignmentId = 2;
            }
            $height = substr($superhero->appearance->height[1], 0,-3);
            $weight = substr($superhero->appearance->weight[1],0,-3);
            $image = new Image();
            $image->sm_img_url = $superhero->images->sm;
            $image->lg_img_url = $superhero->images->lg;
            $image->save();
            $hero = new Superhero();
            $hero->name = $superhero->name;
            $hero->intelligence = $superhero->powerstats->intelligence;
            $hero->strength = $superhero->powerstats->strength;
            $hero->speed = $superhero->powerstats->speed;
            $hero->durability = $superhero->powerstats->durability;
            $hero->power = $superhero->powerstats->power;
            $hero->combat = $superhero->powerstats->combat;
            $hero->height = (int)$height;
            $hero->weight = (int)$weight;
            $hero->image_id = $image->id;
            $hero->alignment_id = $alignmentId;
            $hero->aliases = implode(',', $superhero->biography->aliases);
            $hero->user_created = 0;
            $hero->save();
        }
    }
}
