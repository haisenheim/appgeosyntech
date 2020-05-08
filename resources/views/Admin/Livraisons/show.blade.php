@extends('......layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 style="color: orange" class="mb-0 font-size-18">{{$projet->client->sigle }} <span>BON DE LIVRAISON DU </span> <span>{{ date_format($projet->created_at,'d/m/Y') }}</span></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">GSM</a></li>
                        <li class="breadcrumb-item active">{{ $projet->client?$projet->client->sigle:'-' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">

            <div class="card">
                <div class="card-header">
                    <ul class="list-inline pull-right">
                        <li class="list-inline-item">
                            <a href="/livraison/print/{{ $projet->token }}" title="imprimer le bon de livraison" class="btn btn-xs btn-danger"><i class="mdi mdi-printer"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a  class="btn btn-orange btn-xs" title="Ajouter un produit" href="#" data-toggle="modal" data-target="#modal-produit"><i class="fa fa-plus-circle"></i></a>
                        </li>
                         <li class="list-inline-item">
                            <a  class="btn btn-warning btn-xs" href="#" title="Ajouter une image" data-toggle="modal" data-target="#modal-img"><i class="mdi mdi-file-image-outline"></i></a>
                         </li>
                         <li class="list-inline-item">
                            <a  class="btn btn-info btn-xs" href="#" title="Modifier le bon de livraison" data-toggle="modal" data-target="#modal-edit"><i class="mdi mdi-pencil-outline"></i></a>
                         </li>

                    </ul>
                </div>
                <div class="card-body">

                      <div style="border: 1px solid #7c8a96;" class="card">
                        <div class="card-header bg-secondary">
                            <h6 style="font-weight: bolder" class=" text-white">A- DETAIL DES PRODUITS</h6>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" >DESIGNATION ET DETAILS DES PRODUITS <br/></th>
                                                <th colspan="3">Caractéristiques</th>
                                                <th rowspan="2">Quantité Livrée (m²) <br/></th>

                                                <th rowspan="2" colspan="2">OBSERVATIONS <br/></th>


                                            </tr>
                                            <tr>


                                                <th>long.</th>
                                                <th>larg.</th>
                                                <th>nombre</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($projet->lignes->count())
                                                @foreach($projet->lignes as $prdt)
                                                    <?php //dd($prdt) ?>
                                                    <tr>

                                                      <td>
                                                          <ul style="list-style: none; padding: 0;margin-bottom: 0">
                                                              <li style="font-weight: bolder">{{ $prdt->produit->name }}</li>
                                                              <li><span style="font-style: italic" class="">{{ $prdt->produit->description }}</span></li>

                                                          </ul>
                                                      </td>
                                                      <td>{{ $prdt->produit->longueur }}</td>
                                                      <td>{{ $prdt->produit->largeur }}</td>
                                                      <td>{{ $prdt->nombre }}</td>
                                                      <td>{{ number_format($prdt->quantity,2,',','.') }} m²</td>

                                                      <td>
                                                        {{ $prdt->observations }}
                                                      </td>
                                                      <td>
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a class="btn btn-success btn-xs btn-edit" data-id="{{ $prdt->id }}" href="" data-toggle="modal" data-target="#modal-obs" title="Ecrire une observation"><i class="mdi mdi-pencil-outline"></i></a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="btn btn-danger btn-xs" href="/admin/livraison/remove-produit/{{$prdt->id}}" title="Supprimer cette ligne"><i class="fa fa-trash"></i></a>
                                                            </li>
                                                        </ul>
                                                      </td>

                                                    </tr>

                                                @endforeach


                                            @else
                                                <tr>
                                                    <th colspan="10">AUCUN PRODUIT</th>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div>

                                </div>
                            </div>
                        </div>
                     </div>
                     <h5>B- OBSERVATIONS SUR LA LIVRAISON</h5>
                     <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="text-white bg-info" style="border-radius: 5px; padding: 10px 15px; margin-bottom: 15px;">
                                <p><?= $projet->observation ?></p>
                            </div>
                        </div>
                     </div>

                    <h5>C- PRESENCE A LA RECEPTION </h5>
                     <div class="row" style="margin-bottom: 15px">
                        <div class="col-md-6 col-sm-12">
                            <h6 style="text-decoration: underline; font-weight: 700">CLIENT</h6>
                            <div class="text-white bg-info" style="border-radius: 5px; padding: 10px 15px; margin-bottom: 15px;">
                                <p><?= $projet->presence_client ?></p>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <h6 style="text-decoration: underline; font-weight: 700">FOURNISSEUR</h6>
                            <div class="text-white bg-info" style="border-radius: 5px; padding: 10px 15px; margin-bottom: 15px;">
                                <p><?= $projet->presence_fournisseur ?></p>
                            </div>
                        </div>
                     </div>

                     <h5>D- APERÇU DE LA RECEPTION</h5>
                     <div class="row">
                        @foreach($projet->photos as $photo)
                            <div class="col-md-3 col-sm-12">
                                <img src="{{ asset('img/'.$photo->uri) }}" alt="{{ $photo->name }}" style="max-width: 240px; max-height: 240px"/>
                            </div>
                        @endforeach
                     </div>


                </div>
            </div>
        </div>



        <div class="modal fade" id="modal-produit">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">ASSOCIER UN PRODUIT</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form enctype="multipart/form-data" role="form" action="/admin/livraison/add-produit" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="livraison_id" value="{{ $projet->id }}"/>

                       <div class="card-body">
                         <div class="row">
                             <div class="col-md-12 col-sm-12">
                                 <div class="form-group">
                                   <select class="form-control" name="produit_id" required="required" id="">
                                        <option value="">SELECTIONNER UN PRODUIT</option>
                                        @foreach($produits as $dom)
                                            <option value="{{ $dom->id }}">{{ $dom->name }}</option>
                                        @endforeach
                                   </select>
                                 </div>
                             </div>

                             <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" required="required" name="nombre" placeholder="Nombre"/>
                                </div>
                             </div>

                             <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" required="required" name="quantity" placeholder="Quantité Livrée (m²)"/>
                                </div>
                             </div>

                         </div>


                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer">
                         <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> ENREGISTRER</button>
                       </div>
                     </form>
                   </div>

                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-obs">
               <div class="modal-dialog modal-sm">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">Editer une observation</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form role="form" action="/admin/livraison/add-obs" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="id" id="ligne_id" />

                       <div class="card-body">
                         <div class="row">


                             <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="observations" id="" cols="20" rows="2"></textarea>
                                </div>
                             </div>



                         </div>


                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer">
                         <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> ENREGISTRER</button>
                       </div>
                     </form>
                   </div>

                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
        </div>

         <div class="modal fade" id="modal-img">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h4 class="modal-title">ASSOCIER UNE PHOTO</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                     <form enctype="multipart/form-data" role="form" action="/admin/livraison/add-img" method="post">
                     {{csrf_field()}}
                     <input type="hidden" name="livraison_id" value="{{ $projet->id }}"/>

                       <div class="card-body">
                         <div class="row">


                             <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" required="required" name="name" placeholder="Nom de l'image"/>
                                </div>
                             </div>

                             <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="file" required="required" name="imageUri" placeholder=""/>
                                </div>
                             </div>

                         </div>


                       </div>
                       <!-- /.card-body -->
                       <div class="card-footer">
                         <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> ENREGISTRER</button>
                       </div>
                     </form>
                   </div>

                 </div>
                 <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
        </div>

      <div class="modal fade" id="modal-edit">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">EDITION DU BON DE LIVRAISON</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="/admin/livraison/save" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="token" value="{{ $projet->token }}"/>
                          <div class="card-body">
                            <div class="row">

                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">FOURNISSEUR</label>
                                      <select name="fournisseur_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($fournisseurs as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">CLIENTS</label>
                                      <select name="client_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($clients as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>

                                 <div class="col-md-2 col-sm-12">
                                        <div class="form-group">
                                            <label for="debut">DATE LIV.</label>
                                            <input type="date" name="jour" id="debut" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="bcnum">BC</label>
                                      <input type="text" name="bcnum" id="bcnum" value="{{ $projet->bcnum }}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="tr_id">MODE D'EXPEDITION</label>
                                      <select class="form-control" name="transport_option_id" id="tr_id">
                                        <option value="">SELECTIONNER</option>
                                        @foreach($toptions as $opt)
                                            <option value="{{ $opt->id }}">{{ $opt->name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="elm">MODALITES DE PAIEMENT</label>
                                      <textarea class="form-control editor" name="modalites_paiement" id="elm" cols="30" rows="10"><?= $projet->modalites_paiement ?></textarea>
                                    </div>
                                </div>
                                </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                              <label for="elm1">PRESENCE CLIENT</label>
                                              <textarea class="form-control editor" name="presence_client" id="elm1" cols="30" rows="10"><?= $projet->presence_client ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                              <label for="elm">PRESENCE FOURNISSEUR </label>
                                              <textarea class="form-control editor" name="presence_fournisseur" id="elm" cols="30" rows="10"><?= $projet->presence_fournisseur ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                              <label for="elm">OBSERVATIONS</label>
                                              <textarea class="form-control editor" name="observation" id="elm" cols="30" rows="10"><?= $projet->observation ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-orange btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
          </div>

    </div>

    <style>
        .card .card-header.bg-secondary{
        padding: 5px 15px;
        }
        .card .card-header.bg-secondary h6{margin-bottom: 0; line-height: 2}
    </style>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
          <!--tinymce js-->
        <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

        <!-- init js -->
        <script>
            $(document).ready(function(){0<$(".editor").length&&tinymce.init({selector:"textarea.editor",height:200,plugins:["advlist lists charmap print preview hr anchor pagebreak spellchecker","searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking","save table contextmenu directionality emoticons template paste textcolor"],toolbar:"insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor emoticons",style_formats:[{title:"Bold text",inline:"b"},{title:"Red text",inline:"span",styles:{color:"#ff0000"}},{title:"Red header",block:"h1",styles:{color:"#ff0000"}},{title:"Example 1",inline:"span",classes:"example1"},{title:"Example 2",inline:"span",classes:"example2"},{title:"Table styles"},{title:"Table row 1",selector:"tr",classes:"tablerow1"}]})});
            $('.btn-edit').click(function(e){
                $('#ligne_id').val($(this).data('id'));
            })
        </script>

     
@endsection

@section('script')
<script>
  $(function () {
    $(".datatable").DataTable();

  });
</script>
@endsection