<?php

use Illuminate\Database\Seeder;

class PointagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(\App\Models\Commande::class,2)->create()->each(function($formation){

		    for($i=1;$i<=5; $i++){
			    $formation->modules()->save(factory(App\Models\Module::class)->make(['formation_id'=>$formation->id]));
		    }

	    });
    }
}
