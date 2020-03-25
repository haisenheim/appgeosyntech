<?php

use Illuminate\Database\Seeder;

class CommandesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(\App\Models\Commande::class,2)->create()->each(function($commande){
		    $l = rand(2,9);
		    factory(\App\Models\Cligne::class,$l)->make(['commande_id'=>$commande->id])->create()->each(function($ligne) use($commande){
			   $lo =  rand(2,8);
			    for($i=1;$i<=$ligne->quantity;$i++){
				    factory(\App\Models\Livraison::class,1)->make(
					    ['cligne_id'=>$ligne->id,'commande_id'=>$commande->id,'client_id'=>$commande->client_id,'poste_id'=>$ligne->poste_id]
				    )->create()->each(function($livraison){
					    $p=rand(1,3);
					    for($i=1;$i<=$p;$i++){
						    factory(\App\Models\Prime::class)->make(['livraison_id'=>$livraison->id,'tprime_id'=>$i])->create();
					    }

					    $j=rand(10,26);
					    for($i=1;$i<=$j;$i++){
						    factory(\App\Models\Pointage::class)->make(['livraison_id'=>$livraison->id,'user_id'=>$livraison->user_id])->create();
					    }
				    });

			    }
		    });


		   /* for($i=1;$i<=$l; $i++){
			    $commande->lignes()->save(factory(App\Models\Cligne::class)->make(['commande_id'=>$commande->id]));
		    }*/

	    });
    }
}
