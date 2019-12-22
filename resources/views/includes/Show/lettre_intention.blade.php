<div class="container">
    <div class="row">
        
         <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    {{ $investissement->dossier->name }}
                    <small class="float-right">Date: {{ date_format($invest->lettre->created_at,'d/m/Y') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <hr/>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  PARTENAIRE:
                  <address>
                    <strong>{{ $investissement->angel->name }} </strong><br>
                    {{ $investissement->angel->address }}<br>

                    Téléphone: {{ $investissement->angel->phone }}<br>
                    Email: {{ $investissement->angel->email }}<br/>
                  </address>
                </div>
                <!-- /.col -->

                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>TOTAL : {{ number_format($investissement->montant, 0,',','.') }} </b><br>
                  <br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
                <hr/>
              <div class="row">
                <div class="">

                <p>La présente lettre d’intention décrit les principales conditions et modalités selon lesquelles l’investissement envisagé dans la société <span style="font-weight: bold"> {{ $investissement->projet->owner->name }} </span>  pourrait être réalisé. </p>
                <p>Elle ne constitue en aucun cas un engagement ferme et irrévocable des parties de procéder à cet investissement. </p>
                <p>Cette lettre d’intention a été préparée sur la base et en l’état des informations reçues de la Société à ce jour,
                 particulièrement du business plan qui ont été préparés par les Fondateurs.</p>
                <p>Le montant total de l’investissement étant estimé à
                <span style="font-weight: bold"> {{ $investissement->projet->montant }} &nbsp; {{ $investissement->projet->devise->name }} </span>, je, soussigné,<span style="font-weight: bold"> {{ $investissement->angel->name }} </span>, agissant pour
                 <span style="width: 300px;">
                    @if($investissement->lettre->personnel)
                        <span>MON PROPRE COMPTE</span>
                    @else
                        @if($investissement->angel->organisme_id)
                            <span>{{ $investissement->angel->organisme->name }}</span>
                        @endif
                        @if($investissement->angel->entreprise_id)
                            <span>{{ $investissement->angel->entreprise->name }}</span>
                        @endif
                    @endif


                 </span>
                 ,
                 manifeste le souhait de participer à cette opération sous forme de
                 <span style="font-weight: bold; width:300px"> {{ $investissement->lettre->type->name }}</span>
                 (prise de participation ou/et Prêts et/ou Engagements par signature)
                 à hauteur de <span style="font-weight: bold; width:300px"> {{ number_format($investissement->lettre->montant,0,',','.') }} </span>. </p>
                @if($investissement->lettre->forme_id==1)
                <p class="blocx" style="display: block" id="block-1">
                    La prise de participation représentera donc un pourcentage de
                     <span style="font-weight: bold; width:100px"> {{ $investissement->lettre->pct_participation }}  </span> % au capital du projet <span style="font-weight: bold"> {{ $investissement->dossier->name }}  </span>
                </p>
                @else
                    @if($investissement->lettre->forme_id==2)
                        <p class="blocx"  id="block-2">
                            Le prêt sera effectué
                            sur une durée de <span style="font-weight: bold; width:100px"> {{ $investissement->lettre->duree_pret }}  </span> année(s) à un taux annuel de <span style="font-weight: bold; width:100px"> {{ $investissement->lettre->pct_pret }} </span> %, avec
                            <span style="font-weight: bold;">
                                @if($investissement->lettre->type_remboursement=="Remboursement In fine")
                                    <span>Remboursement In fine</span>
                                @else
                                    @if($investissement->lettre->type_remboursement=="Amortissement constant du capital")
                                        <span>Amortissement constant du capital</span>
                                    @else
                                        <span>Annuités constantes</span>
                                    @endif
                                 @endif

                            </span>
                        </p>
                    @else
                        <p class="blocx" id="block-3">
                            L’engagement par signature sera effectué sur une durée de <span style="font-weight: bold; width:100px"> {{ $investissement->lettre->duree_engagement }} </span> année(s), a une commission de caution de <span style="font-weight: bold; width:100px"> {{ $investissement->lettre->pct_engagement }} </span>% ou <span style="font-weight: bold; width: 300px"> {{ number_format($investissement->lettre->mt_engagement,0,',','.') }} </span>.
                        </p>
                    @endif

              @endif

                <br/>
                <br/>

                <div style="float: right; margin-right: 50px">
                    Fait à <span style="font-weight: bold; width:300px"> {{ $investissement->lettre->lieu }}  </span>, le {{ date_format($investissement->created_at,'d/m/Y') }}.
                    <br/> <br/>
                    Pour l’investisseur
                    <br/>
                    <br/>
                    <span style="font-weight: bold">{{ $investissement->angel->name }}</span>

                </div>

                </div>
              </div>
            <!-- /.invoice -->
        </div>
        
    </div>
</div>