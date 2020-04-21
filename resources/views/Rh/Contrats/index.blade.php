


@extends('layouts.rh')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">BASE DES CONTRATS</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/rh/dashboard">SM</a></li>
              <li class="breadcrumb-item">FICHIERS</li>
              <li class="breadcrumb-item active">CONTRATS</li>
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
                  <h3 class="card-title">CONTRATS DE TRAVAIL </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                    <thead>
                    <tr>

                      <th>TYPE</th>

                      <th>PROPRIETAIRE</th>

                      <th>DATE DE SIG.</th>
                      <th>DATE D'EXP.</th>
                      <th>JOURS RESTANTS</th>
                      <th>CONTRAT PREC.</th>
                      <th>STATUT</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contrats as $certificat)
                          <tr style="background-color: <?= $certificat->expired?'red':'' ?>;color: <?= $certificat->expired?'#FFF':'' ?>  ">


                              <td>{{ $certificat->tcontrat?$certificat->tcontrat->name:'-' }} </td>
                               <td>{{ $certificat->user?$certificat->user->name:'-' }} </td>

                                <td>{{ date_format($certificat->debut,'d/m/Y') }}</td>
                                <td style="font-weight: bolder">{{ date_format($certificat->fin,'d/m/Y') }}</td>
                                <td>{{ $certificat->expired?' - ':number_format($certificat->remaining_days, 0,',','.') }} Jour(s)</td>
                                @if($certificat->ante)
                                    <td> <a href="{{route('rh.contrats.show',[$certificat->ante->token])}}">{{ $certificat->ante->name }}</a></td>
                                @else
                                    <td>AUCUN</td>
                                @endif

                              <td><?= $certificat->expired?'Expiré':'Valide' ?></td>
                              <td>
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-info btn-xs" href="{{route('rh.contrats.show',[$certificat->token])}}"><i class="fa fa-eye"></i></a></li>
                                @if($certificat->expired)
                                <li class="list-inline-item"><a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-eye"></i></a></li>
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
                        <h4 class="modal-title">RENOUVELLEMENT CONTRAT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="/rh/contrat/renew" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="row">
                               <input type="hidden" id="token" name="token"/>



                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">DEBUT DE SIGNATURE</label>
                                      <input required="required" type="date" class="form-control" id="name" name="debut" >
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">FIN DE SIGNATURE</label>
                                      <input required="required" type="date" class="form-control" id="name" name="fin" >
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