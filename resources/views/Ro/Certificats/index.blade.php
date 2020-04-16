


@extends('layouts.ro')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">LISTE DES DOCUMENTS</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/ro/dashboard">TABLEAU DE BORD</a></li>
              <li class="breadcrumb-item">FICHIERS</li>
              <li class="breadcrumb-item active">CERTIFICATS</li>
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
                  <h3 class="card-title">BASE DES CERTIFICATS ET AUTRES DOCUMENTS </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                    <thead>
                    <tr>
                      <th>&numero;</th>
                      <th>TYPE</th>

                      <th>PROPRIETAIRE</th>
                      <th>PARTENAIRE</th>
                      <th>DEBUT</th>
                      <th>FIN DE VALIDITE</th>
                      <th>DOCUMENT ANTERIEUR</th>

                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($certificats as $certificat)
                          <tr>
                              <td>{{ $certificat->name }}</td>

                              <td>{{ $certificat->tcertificat?$certificat->tcertificat->name:'-' }} </td>
                               <td>{{ $certificat->user?$certificat->user->name:'-' }} </td>
                                <td>{{ $certificat->partenaire?$certificat->partenaire->name:'-' }} </td>
                                <td>{{ date_format($certificat->debut,'d/m/Y') }}</td>
                                <td style="font-weight: bolder">{{ date_format($certificat->fin,'d/m/Y') }}</td>
                                @if($certificat->ante)
                                    <td> <a href="{{route('ro.certificats.show',[$certificat->ante->token])}}">{{ $certificat->ante->name }}</a></td>
                                @else
                                    <td>AUCUN</td>
                                @endif
                              <td>
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-default btn-xs" href="{{route('ro.certificats.show',[$certificat->token])}}"><i class="fa fa-eye"></i></a></li>
                                @if($certificat->expired)
                                    <li class="list-inline-item"><a data-token="{{ $certificat->token }}" title="renouveler ce certificat" class="btn btn-danger btn-xs btn-renew" href="#" data-toggle="modal" data-target="#modal-lg"><i class="mdi mdi-file-restore-outline"></i></a></li>
                                @endif
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
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVELLE MISE A JOUR</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('ro.certificats.renew')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="row">
                               <input type="hidden" id="token" name="token"/>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="tpartenaire_id">PARTENAIRE</label>
                                      <select required="required" class="form-control" name="partenaire_id" id="partenaire_id">
                                            <option value="">SELECTIONNER</option>
                                            @foreach($partenaires as $type)
                                                <option value="{{$type->id}}">{{ $type->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">DEBUT DE VALIDITE</label>
                                      <input required="required" type="date" class="form-control" id="name" name="debut" >
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">FIN DE VALIDITE</label>
                                      <input required="required" type="date" class="form-control" id="name" name="fin" >
                                    </div>
                                </div>

                                <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">COUT D'ETAB. DU DOC.</label>
                                      <input required="required" style="text-align: right; padding-right: 10px" type="number" class="form-control" id="name" name="debut" >
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">FICHIER</label>
                                      <input type="file" class="form-control" id="name" name="fichier" required="required" >
                                    </div>
                                </div>




                            </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
           </div>

<style>
    .table th,
    .table td {
      padding: 0.35rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
  </style>



@endsection

@section('scripts')
<script>
     $(document).ready(function(){$(".datatable").DataTable();});
     $('.btn-renew').click(function(){
        $('#token').val($(this).data('token'));
     });
</script>
@endsection