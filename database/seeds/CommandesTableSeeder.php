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
		    factory(\App\Models\Cligne::class,$l)->create(['commande_id'=>$commande->id])
			   // ->make(['commande_id'=>$commande->id])->create()
			    ->each(function($ligne) use($commande){

				   $fdate = $ligne->debut;
				   $tdate = $ligne->fin;
				   $datetime1 = new DateTime($fdate);
				   $datetime2 = new DateTime($tdate);
				   $interval = $datetime1->diff($datetime2);
				   $days = $interval->format('%a');

				   for($r=0;$r<$days;$r++){
					   $jour = $ligne->debut->addDays($r);
					   $fiche = \App\Models\Fiche::where('jour',$jour)->where('commande_id',$commande->id)->first();
					   if(!$fiche){
						  $fiche = \App\Models\Fiche::create(
							  [
								  //
								  'name' => rand(1000,9999),
								  'commande_id'=>$commande->id,
								  'annee'=>date_format($jour,'Y'),
								  'user_id'=>rand(1,5),
								  'token'=>sha1(rand(100.3000) . rand(1000,99999)),
								  'jour'=>$jour,
								  'moi_id'=>date_format($jour,'m'),
							  ]
						  );
					   }
				   }

			   $lo =  rand(2,8);
			    for($i=1;$i<=$ligne->quantity;$i++){
				    factory(\App\Models\Livraison::class,1)->create(['cligne_id'=>$ligne->id,'commande_id'=>$commande->id,
					    'client_id'=>$commande->client_id,'poste_id'=>$ligne->poste_id,
				         'debut'=>$commande->debut,'fin'=>$commande->fin
				    ])
					    //->make( ['cligne_id'=>$ligne->id,'commande_id'=>$commande->id,'client_id'=>$commande->client_id,'poste_id'=>$ligne->poste_id])->create()
					    ->each(function($livraison) use($commande){
					    $p=rand(1,3);
					    for($i=1;$i<=$p;$i++){
						    factory(\App\Models\Prime::class)->create(['livraison_id'=>$livraison->id,'tprime_id'=>$i]);
							    //->make(['livraison_id'=>$livraison->id,'tprime_id'=>$i])->create();
					    }

						 for($i=2019;$i<=2020;$i++){
							 for($j=1;$j<=12;$j++){
								 factory(\App\Models\Bulletin::class)->create(['livraison_id'=>$livraison->id,'user_id'=>$livraison->id,'annee'=>$i,'moi_id'=>$j])
									 ->each(function($bulletin) use($commande){
										 $k=rand(10,26);
										 for($i=1;$i<=$k;$i++){
											 $fiche = \App\Models\Fiche::where('annee',$bulletin->annee)->where('moi_id',$bulletin->moi_id)->where('commande_id',$commande->id)->first();
											 factory(\App\Models\Pointage::class)->create(['livraison_id'=>$bulletin->livraison_id,'user_id'=>$bulletin->user_id,'bulletin_id'=>$bulletin->id,'fiche_id'=>$fiche?$fiche->id:0]);
											 //->make(['livraison_id'=>$livraison->id,'user_id'=>$livraison->user_id])->create();
										 }
									 });
							 }
						 }

					    /*$j=rand(10,26);
					    for($i=1;$i<=$j;$i++){
						    factory(\App\Models\Pointage::class)->create(['livraison_id'=>$livraison->id,'user_id'=>$livraison->user_id]);
							    //->make(['livraison_id'=>$livraison->id,'user_id'=>$livraison->user_id])->create();
					    }*/
				    });

			    }
		    });


		   /* for($i=1;$i<=$l; $i++){
			    $commande->lignes()->save(factory(App\Models\Cligne::class)->make(['commande_id'=>$commande->id]));
		    }*/

	    });
    }
}
