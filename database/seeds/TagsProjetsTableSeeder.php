<?php

use Illuminate\Database\Seeder;

class TagsProjetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(App\Models\TagsProjet::class,250)->create();
    }
}
