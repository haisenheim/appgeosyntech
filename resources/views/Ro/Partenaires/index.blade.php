


@extends('layouts.ro')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">BASE DE DONNEES DES PARTENAIRES</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/rc/dashboard">TABLEAU DE BORD</a></li>
              <li class="breadcrumb-item">PARAMETRES</li>
              <li class="breadcrumb-item active">PARTENAIRES</li>
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
                  <h3 class="card-title">BASE DES PARTENAIRES <a class="btn btn-primary btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                    <thead>
                    <tr>
                      <th>NOM</th>

                      <th>ADRESSE</th>
                      <th>TELEPHONE</th>
                      <th>EMAIL</th>
                      <th>CATEGORIE</th>

                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($partenaires as $ville)
                          <tr>
                              <td>{!! $ville->name !!} </td>

                              <td>{!! $ville->address !!} </td>
                               <td>{!! $ville->phone !!} </td>
                                <td>{!! $ville->email !!} </td>
                                <td style="text-align: right; padding-right: 10px">{{ $ville->tpartenaire?$ville->tpartenaire->name:'-' }}</td>

                              <td>
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-default btn-xs" href="{{route('rc.partenaires.show',[$ville->token])}}"><i class="fa fa-search"></i></a></li>
                              </ul>
                              </td>
                          </tr>
                      @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                      <th>NOM</th>

                      <th>ADRESSE</th>
                      <th>TELEPHONE</th>
                      <th>EMAIL</th>
                      <th>CATEGORIE</th>

                      <th></th>
                    </tr>
                    </tfoot>
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
                        <h4 class="modal-title">NOUVEAU PARTENAIRE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('ro.partenaires.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">NOM</label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder="Saisir le nom ">
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="tpartenaire_id">TYPE</label>
                                      <select required="required" class="form-control" name="tpartenaire_id" id="tpartenaire_id">
                                            <option value="">SELECTIONNER</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{ $type->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>


                                <div class="col-md-7 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">ADRESSE</label>
                                      <input type="text" class="form-control" id="name" name="address" placeholder="Saisir l'adresse">
                                    </div>
                                </div>

                                <div class="col-md-5 col-sm-12">
                                    <div class="form-group">
                                      <label for="phone">TELEPHONE</label>
                                      <input type="text" class="form-control" id="phone" name="phone" placeholder="exple : 0456773878">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="email">EMAIL</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="exple : info@system.com">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">LOGO</label>
                                        <input type="file" class="form-control" id="exampleInputFile" name="imageUri">
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
</script>
@endsection