@extends('layouts.admin')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">BONS DE LIVRAISON</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">SGM</a></li>
              <li class="breadcrumb-item">BL</li>
              <li class="breadcrumb-item active">CLIENTS</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@section('content')


     <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">BONS DE LIVRAISON </h3>
                    <ul class="list-inline pull-right">
                        <li class="list-inline-item">
                            <a class="btn btn-orange btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a>
                        </li>
                    </ul>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                    <thead>
                    <tr>
                      <th>DATE</th>
                      <th>CLIENT</th>
                      <th>FOURNISSEUR</th>

                      <th>MODE D'EXPEDITION</th>
                      <th>DATE DE LIVRAISON</th>

                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cotations as $projet)

                          <tr>
                              <td>{{ date_format($projet->created_at,'d/m/Y') }}</td>
                              <td>{{ $projet->fournisseur->sigle }}</td>
                              <td>{{ $projet->client->sigle?$projet->client->sigle:$projet->client->name }}</td>

                              <td>{{ $projet->transport_option->name }}</td>
                              <td>{{ $projet->jour?date_format($projet->jour,'d/m/Y'):date_format($projet->created_at,'d/m/Y') }}</td>

                              <td style="min-width: 7%;">
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-light btn-xs" href="{{route('admin.forders.show',[$projet->token])}}"><i class="fa fa-search"></i></a></li>
                              </ul>
                              </td>
                          </tr>


                      @endforeach

                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>

            </div>

            <!-- /.col -->
          </div>

          <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVEAU BON DE LIVRAISON</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('admin.livraisons.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="row">

                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="pay_id">FOURNISSEUR</label>
                                      <select required="required" name="fournisseur_id" id="pay_id" class="form-control">
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
                                      <select required="required" name="client_id" id="pay_id" class="form-control">
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
                                      <input type="text" name="bcnum" id="bcnum" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="tr_id">MODE D'EXPEDITION</label>
                                      <select class="form-control" required="required" name="transport_option_id" id="tr_id">
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
                                      <textarea class="form-control editor" name="modalites_paiement" id="elm" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                </div>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                              <label for="elm1">PRESENCE CLIENT</label>
                                              <textarea class="form-control editor" name="presence_client" id="elm1" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                              <label for="elm">PRESENCE FOURNISSEUR </label>
                                              <textarea class="form-control editor" name="presence_fournisseur" id="elm" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                              <label for="elm">OBSERVATIONS</label>
                                              <textarea class="form-control editor" name="observation" id="elm" cols="30" rows="10"></textarea>
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
         <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
          <!--tinymce js-->
        <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

        <!-- init js -->
        <script>
        $(document).ready(function(){0<$(".editor").length&&tinymce.init({selector:"textarea.editor",height:200,plugins:["advlist lists charmap print preview hr anchor pagebreak spellchecker","searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking","save table contextmenu directionality emoticons template paste textcolor"],toolbar:"insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor emoticons",style_formats:[{title:"Bold text",inline:"b"},{title:"Red text",inline:"span",styles:{color:"#ff0000"}},{title:"Red header",block:"h1",styles:{color:"#ff0000"}},{title:"Example 1",inline:"span",classes:"example1"},{title:"Example 2",inline:"span",classes:"example2"},{title:"Table styles"},{title:"Table row 1",selector:"tr",classes:"tablerow1"}]})});
        </script>

@endsection

