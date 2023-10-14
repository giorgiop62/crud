<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beer;

class BeersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = file_get_contents('https://api.sampleapis.com/beers/ale');
        $data = json_decode($data);
        
        foreach($data as $beer){
 
            $new_beer = new Beer();
            $new_beer->name = $beer->name;
            $new_beer->price = $this->reformatPrice($beer->price);
            $new_beer->rating = $beer->rating->average;
            $new_beer->image = $beer->image;
            $new_beer->save();

        }
    
    }
    //funzione per riformmare il prezzo e trasformarlo in float
    private function reformatPrice($stringPrice){
        $price = str_replace('$','', $stringPrice);
        $price = (float) $price;

        return $price;
    }
}
