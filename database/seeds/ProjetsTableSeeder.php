<?php

use Illuminate\Database\Seeder;

class ProjetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    factory(App\Models\Projet::class,2)->create()->each(function($projet){
		    $projet->environnement()->save(factory(App\Models\Environnement::class)->make());
		    $projet->bilans()->save(factory(App\Models\Bilan::class)->make(['annee'=>$projet->annee-1]));
		    $projet->bilans()->save(factory(App\Models\Bilan::class)->make(['annee'=>$projet->annee-2]));
		    $projet->bilans()->save(factory(App\Models\Bilan::class)->make(['annee'=>$projet->annee-3]));
		    for($i=1;$i<=5; $i++){
			    $projet->prevbilans()->save(factory(App\Models\Prevbilan::class)->make(['annee'=>$projet->annee+$i]));
		    }
		    for($i=1;$i<=5; $i++){
			    $projet->prevresultats()->save(factory(App\Models\Prevresultat::class)->make(['annee'=>$projet->annee+$i]));
		    }
		    for($i=1;$i<=5; $i++){
			    $projet->prevtresoreries()->save(factory(App\Models\Prevtresorerie::class)->make(['annee'=>$projet->annee+$i]));
		    }
		    for($i=1;$i<=3; $i++){
			    $projet->resultats()->save(factory(App\Models\Resultat::class)->make(['annee'=>$projet->annee-$i]));
		    }
		    $projet->swot()->save(factory(App\Models\Swot::class)->make());
		    $projet->teaser()->save(factory(App\Models\Teaser::class)->make());
		    $conc=rand(2,5);
		    for($i=1;$i<=$conc; $i++){
			    $projet->concurrents()->save(factory(App\Models\Concurrent::class)->make());
		    }
		    for($i=1;$i<=$conc; $i++){
			    $projet->segments()->save(factory(App\Models\Segment::class)->make());
		    }
	    });
    }
}
