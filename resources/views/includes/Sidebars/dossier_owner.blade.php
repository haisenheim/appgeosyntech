

<?php use \Illuminate\Support\Facades\Auth; ?>
 <div class="card">
    <div class="card-body">

    <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

    </div>

        <p>CODE : {{ $projet->code }}</p>
        <p>DATE DE CREATION : <span class="value"> {{ date_format($projet->created_at,'d/m/Y') }}</span></p>
        <?php if(Auth::user()->role_id==!3): ?>
            <p>PROMOTEUR : <span class="value">{{ $projet->owner->name }}</span></p>
        <?php endif; ?>


        <a href="#" data-toggle="modal" data-target="#bm" class="btn btn-me btn-outline-success btn-block">MODELE ECONOMIQUE</a>
        @if($projet->investissements->count()>=1)
            <button data-toggle="modal" data-target="#angelsModal" class="btn btn-danger btn-block btn-xs"><i class="fa fa-users"></i>POTENTIELS INVESTISSEURS</button>
        @endif

    @if($projet->etape>=4)
        <button data-toggle="modal" data-target="#reportEditModal" class="btn btn-info btn-block btn-xs"><i class="fa fa-file-alt"></i>EDITER LE RAPPORT MENSUEL</button>
        <button data-toggle="modal" data-target="#upDocsModal" class="btn btn-primary btn-block btn-xs"><i class="fa fa-upload"></i>CHARGER LA DOCUMENTATION</button>
        <ul class="list-group">
            <li class="list-group-item">MONTANT DES INVESTISSEMENT : <span class="value"><?= number_format($projet->montant_investissement,0,',','.') ?></span></li>
            <li class="list-group-item">BESOIN EN FONDS DE ROULEMENT : <span class="value"><?= number_format($projet->bfr,0,',','.') ?></span></li>
            <li style="font-weight: bold;" class="list-group-item">COUT GLOBAL DU PROJET : <span class="value"><?= number_format(($projet->montant_investissement + $projet->bfr),0,',','.') ?> <sup><?= $projet->devise->abb ?></sup></span></li>
        </ul>

        <fieldset>
            <legend>MOYENS DE FINANCEMENT</legend>
            <ul class="list-group">
                @if($projet->moyens)
                    @foreach($projet->financements as $moyen)

                        <li class="list-group-item"><?= $moyen->moyen? $moyen->moyen->name:'-' ?> : <span class=""> <?= number_format($moyen->montant,0,',','.') ?></span></li>
                    @endforeach
                @endif
            </ul>
        </fieldset>

    @endif
    <input type="hidden" id="id" value="<?= $projet->token ?>"/>
    <p><i class="fa fa-map-marker"></i> {{ $projet->ville->name }}</p>
    <input type="hidden" id="pl_id" value="{{ $projet->plan_id }}"/>


    @if($projet->synthese_diagnostic_interne)
        <button data-toggle="modal" data-target="#synDiagIntModal" class="btn-synt btn btn-outline-warning btn-block btn-xs"><i class="fa fa-pencil"></i>SYNTHESE DU DIAGNOSTIC INTERNE</button>
    @endif

    @if($projet->etape>=2)
        <button style="margin-top: 7px" data-toggle="modal" data-target="#synDiagExtModal" class="btn-synt btn btn-outline-info btn-block btn-xs"><i class="fa fa-pencil"></i>SYNTHESE DU DIAGNOSTIC EXTERNE</button>
    @endif

    @if($projet->etape>=3)
        <button style="margin-top: 7px" data-toggle="modal" data-target="#synDiagStratModal" class="btn-synt btn btn-outline-primary btn-block btn-xs"><i class="fa fa-pencil"></i>SYNTHESE DU DIAGNOSTIC STRATEGIQUE</button>
    @endif

     @if($projet->etape>=4)
        <button style="margin-top: 7px" data-toggle="modal" data-target="#teaserModal" class="btn-synt btn btn-outline-success btn-block btn-xs"><i class="fa fa-pencil"></i> TEASER</button>
    @endif

    @if($projet->teaser)
        <button style="margin-top: 7px" id="btn-print" class="btn btn-outline-danger btn-block btn-xs"><i class="fa fa-print"></i> IMPRIMER</button>
    @endif



    @if($projet->modepaiement_id>0)
        <h6 class="page-header" style="background-color: inherit">MODALITE DE PAIEMENT</h6>
        <ul class="list-group">
            <li class="list-group-item"><span style="font-weight: 700">{{ $projet->modepaiement->name }}</span></li>

            <li class="list-group-item">PRIX TTC : <span style="font-weight: 700">{{ number_format($projet->traite * 4 ,0,',','.') }} <sup>{{ $projet->devise->abb }}</sup></span> ( <b>{{ number_format($projet->traite ,0,',','.') }} <sup>{{ $projet->devise->abb }}</sup></b> /ETAPE)</li>
        </ul>
    @endif

    @if($projet->modepaiement_id==0)

        <?php if(Auth::user()->role_id==3): ?>
            <div>
                <h6 class="page-header" style="background-color: inherit">FORMULE DE PAIEMENT</h6>

                    <b>AUCUN CHOIX POUR L'INSTANT</b>
                    <P>VOUS AVEZ A CHOISIR ENTRE DEUX FORMULES</P>
                    <ul>
                        <li>GOLD (ETUDE DE MARCHE OFFERTE)</li>
                        <li>SILVER (SANS ETUDE DE MARCHE)</li>
                    </ul>
                    <b>Contactez votre expert OBAC pour en savoir davantage</b>
            </div>
        <?php endif; ?>
    @endif
</div>
</div>