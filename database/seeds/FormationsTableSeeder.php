<?php

use Illuminate\Database\Seeder;

class FormationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(\App\Models\Formation::class,2)->create()->each(function($formation){

		    for($i=1;$i<=5; $i++){
			    $formation->modules()->save(factory(App\Models\Module::class)->make(['formation_id'=>$formation->id]));
		    }

	    });
    }
}
