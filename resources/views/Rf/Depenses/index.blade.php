


@extends('layouts.rf')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">JOURNAL DE DEPENSES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/rf/dashboard">SM</a></li>
              <li class="breadcrumb-item">FINANCES</li>
              <li class="breadcrumb-item active">SORTIES</li>
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
                  <h3 class="card-title">DEPENSES <a class="btn btn-danger btn-xs pull-right" title="Saisir une nouvelle depense" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div style="margin: 20px 0">
                        <form class="form-inline" action="">
                            <label style="margin-right: 5px" class="mr-10" for="debut">DEBUT</label>
                            <input type="date" class="form-control" name="debut" id="debut"/>

                            <label style="margin: 0 5px 0 20px" class="mr-10" for="debut">DEBUT</label>
                            <input type="date" style="margin-right: 20px" class="form-control" name="debut" id="debut"/>


                            <button class="btn btn-danger btn-sm" type="submit" title="charger"><i class="fa fa-search"></i></button>
                        </form>
                   </div>
                   <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>

                               <th>&numero;</th>
                               <th>DATE</th>
                               <th>MONTANT</th>
                               <th>LIBELLE</th>

                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($depenses as $liv)
                                <?php
                                    $lib = "";
                                    if($liv->bulletin){
                                        $lib = 'Paiement salaire - mois -'.$liv->bulletin->mois->name.' - '.$liv->bulletin->owner->name;
                                    }else{
                                        if($liv->tdepense){
                                           $lib = $liv->tdepense->name;
                                        }
                                    }
                                ?>
                               <tr>

                                   <td>{{ $liv->name }}</td>

                                   <td>{{ date_format($liv->jour,'d/m/Y') }} </td>
                                   <td style="padding-right: 10px;text-align: right; font-weight: bolder">{{ number_format($liv->montant, 0,',','.') }}</td>
                                   <td style="font-weight: bolder">{{ $lib }}</td>

                                   <td>
                                       <ul class="list-inline">
                                           <li class="list-inline-item"><a class="btn btn-xs btn-secondary" title="Afficher" href="/rf/depenses/{{ $liv->token }}"><i class="fa fa-eye"></i></a></li>
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
                        <h4 class="modal-title">NOUVELLE DEPENSE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="{{route('rf.depenses.store')}}" method="post">
                        {{csrf_field()}}

                          <div class="card-body">
                            <div class="row">

                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="variable">TYPE DE DEPENSE</label>
                                      <select class="form-control" name="tdepense_id" required="required" id="variable">

                                        <option value="0">SELECTIONNER</option>
                                        @foreach($types as $type)
                                        <option value="{{$type->id}}">{{ $type->name }}</option>
                                        @endforeach
                                      </select>

                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">MONTANT</label>
                                      <input type="text" class="form-control" id="name" name="montant" placeholder="Saisir le montant ">
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="jour">JOUR</label>
                                      <input type="date" class="form-control" id="jour" name="jour">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <label for="motif">MOTIF</label>
                                    <textarea class="form-control" name="motif" id="motif" cols="10" rows="3"></textarea>
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
</script>
@endsection