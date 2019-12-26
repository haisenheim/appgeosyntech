

 <div class="card">
    <div class="card-body">

    <div style="height: 300px; width: 100%; background: url('{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}'); background-size: cover ">

    </div>

        <p>CODE : {{ $projet->code }}</p>
        <p>DATE DE CREATION : <span class="value"> {{ date_format($projet->created_at,'d/m/Y') }}</span></p>
        <?php if(Auth::user()->role_id==!3): ?>
            <p>PROMOTEUR : <span class="value">{{ $projet->owner->name }}</span></p>
        <?php endif; ?>


        <a href="#" data-toggle="modal" data-target="#meModal" class="btn btn-me btn-outline-success btn-block">MODELE ECONOMIQUE</a>

    @if($projet->etape>=4)
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

    @if($projet->etape>=1)
        <button data-toggle="modal" data-target="#synDiagIntModal" class="btn-synt btn btn-outline-warning btn-block btn-xs"><i class="fa fa-pencil"></i>SYNTHESE DU DIAGNOSTIC INTERNE</button>
    @endif

    @if($projet->etape>=2)
        <button style="margin-top: 7px" data-toggle="modal" data-target="#synDiagExtModal" class="btn-synt btn btn-outline-info btn-block btn-xs"><i class="fa fa-pencil"></i>SYNTHESE DU DIAGNOSTIC EXTERNE</button>
    @endif

    @if($projet->etape>=3)
        <button style="margin-top: 7px" data-toggle="modal" data-target="#synDiagStratModal" class="btn-synt btn btn-outline-primary btn-block btn-xs"><i class="fa fa-pencil"></i>SYNTHESE DU DIAGNOSTIC STRATEGIQUE</button>
    @endif

     @if($projet->etape>=4)
        <button style="margin-top: 7px" data-toggle="modal" data-target="#teaserModal" class="btn-synt btn btn-outline-success btn-block btn-xs"><i class="fa fa-pencil"></i>RESUME EXECUTIF</button>
    @endif


    <a class="btn btn-outline btn-block btn-sm btn-success" id="btn-letter" data-target="#LetterModal" data-toggle="modal" href="#"> <i class="fa fa-edit"></i> Editer la lettre d'intention </a>

    @if($investissement->lettre)

        <a class="btn btn-outline btn-block btn-sm btn-danger" id="btn-doc" data-target="#DocModal" data-toggle="modal" href="#"> <i class="fas fa-file-pdf"></i> Charger la documentation juridique </a>

        @if($investissement->obac_doc_juridique_validated)

            <a class="btn btn-outline btn-block btn-sm btn-info" id="btn-justificatif" data-target="#JustificatifModal" data-toggle="modal" href="#"> <i class="fas fa-file-pdf"></i> Charger le justificatif de paiement</a>

        @endif
    @endif


</div>
</div>