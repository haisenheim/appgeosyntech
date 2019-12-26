<div  class="modal fade" id="LetterModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h4  class="modal-title text-center">LETTRE D’INTENTION</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div style="padding: 20px 20px 40px 20px; font-family: 'Gill Sans MT', Calibri, sans-serif" class="modal-body">
             <form id="letter" enctype="multipart/form-data" class="form" action="/angel/letter/" method="post">
                {{csrf_field()}}
                <input type="hidden" name="token" value="{{ $investissement->token }}"/>

                <p>La présente lettre d’intention décrit les principales conditions et modalités selon lesquelles l’investissement envisagé dans la société <span style="font-weight: bold"> {{ $investissement->dossier->owner->name }} </span>  pourrait être réalisé. </p>
                <p>Elle ne constitue en aucun cas un engagement ferme et irrévocable des parties de procéder à cet investissement. </p>
                <p>Cette lettre d’intention a été préparée sur la base et en l’état des informations reçues de la Société à ce jour,
                 particulièrement du business plan qui ont été préparés par les Fondateurs.</p>
                <p>Le montant total de l’investissement étant estimé à
                <span style="font-weight: bold"> {{ $investissement->dossier->montant }} &nbsp; {{ $investissement->dossier->devise->name }} </span>, je, soussigné,<span style="font-weight: bold"> {{ $investissement->angel->name }} </span>, agissant pour
                 <span style="width: 300px;">
                    <select style="font-weight: bold" class="form-control" name="personnel" id="">
                        <option value="1">MON PROPRE COMPTE</option>
                        @if($investissement->angel->organisme_id)
                            <option value="0">{{ $investissement->angel->organisme->name }}</option>
                        @endif
                        @if($investissement->angel->entreprise_id)
                            <option value="0">{{ $investissement->angel->entreprise->name }}</option>
                        @endif
                    </select>
                 </span>
                 ,
                 manifeste le souhait de participer à cette opération sous forme de
                 <span style="font-weight: bold; width:300px">

                    <select class="form-control" name="forme_id" id="forme_id">
                        @foreach($formes as $forme)
                            <option value="{{ $forme->id }}">{{ $forme->name }}</option>
                        @endforeach
                    </select>
                 </span>
                 (prise de participation ou/et Prêts et/ou Engagements par signature)
                 à hauteur de <span style="font-weight: bold; width:300px"> <input class="form-control" name="montant" type="number"/> </span>. </p>
                <p class="blocx" style="display: block" id="block-1">
                    La prise de participation représentera donc un pourcentage de
                     <span style="font-weight: bold; width:100px"> <input class="form-control" name="pct_participation" type="number"/> </span> % au capital du projet <span style="font-weight: bold"> {{ $investissement->dossier->name }}  </span>
                </p>
                <p class="blocx" style="display: none" id="block-2">
                    Le prêt sera effectué
                    sur une durée de <span style="font-weight: bold; width:100px"> <input class="form-control" name="duree_pret" type="number"/> </span> année(s) à un taux annuel de <span style="font-weight: bold; width:100px"> <input class="form-control" name="pct_pret" type="number"/> </span> %, avec
                    <span style="font-weight: bold; width:300px">
                        <select class="form-control" name="type_remboursement" >
                                <option value="Remboursement In fine">Remboursement In fine </option>
                                <option value="Amortissement constant du capital">Amortissement constant du capital</option>
                                <option value="Annuités constantes">Annuités constantes</option>
                        </select>
                    </span>
                </p>

                <p class="blocx" style="display: none" id="block-3">
                    L’engagement par signature sera effectué sur une durée de <span style="font-weight: bold; width:100px"> <input id="duree_engagement" class="form-control" name="duree_engagement" type="number"/> </span> année(s), a une commission de caution de <span style="font-weight: bold; width:100px"> <input class="form-control" name="pct_engagement" type="number"/> </span>% ou <span style="font-weight: bold; width: 300px"> <input class="form-control" placeholder="Saisir un montant" name="mt_engagement" type="number"/> </span>.
                </p>

                <br/>
                <br/>

                <div style="float: right; margin-right: 50px">
                    Fait à <span style="font-weight: bold; width:300px"> <input id="lieu" class="form-control" name="lieu" type="text" required="true"/> </span>, le {{ date('d/m/Y') }}.
                    <br/> <br/>
                    Pour l’investisseur
                    <br/>
                    <br/>
                    <span style="font-weight: bold">{{ $investissement->angel->name }}</span>

                </div>
                <input type="hidden" name="token" id="token" value="{{ $investissement->token }}"/>
                <button id="btn-save" type="submit" class="btn btn-success btn-block"> ENREGISTRER </button>
            </form>
          </div>

        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
</div>