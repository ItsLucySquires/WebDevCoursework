<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tag::class, 10)->create()->each(function ($tag){
          $boolean=random_int(0,1);
          $ids=range(1, 4);
          shuffle($ids);
          if ($boolean){
            $sliced=array_slice($ids, 0, 2);
            $tag->posts()->attach($sliced);
          }
        });
    }
}
