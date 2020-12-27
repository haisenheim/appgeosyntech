@extends('layouts.admin')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">DONNEES PROJETS</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">GEOSYNTEC</a></li>
              <li class="breadcrumb-item">ANALYSE DATA</li>
              <li class="breadcrumb-item active">ACHATS</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@section('content')


     <div class="row">
            <div class="col-12">
              <div class="card card-light">
                <div class="card-header">
                  <h3 class="text-center p-2">ANALYSE DES ACHATS</h3>
                    <hr/>
                    <form class="form-inline" action="/admin/analyses/achats">

                      <div style="padding: 0 10px" class="form-group">
                        <label for="moi_id">CLIENT</label>
                        <select name="client_id" class="form-control" id="moi_id">
                            <option value="">TOUS</option>
                            @foreach($clients as $ent)
                               <option value="{{ $ent->id }}">{{ \Illuminate\Support\Str::limit($ent->sigle,30) }}</option>
                            @endforeach
                        </select>
                      </div>


                      <div style="padding: 0 10px" class="form-group">
                        <label for="moi_id">PRODUIT</label>
                        <select name="produit_id" class="form-control" id="moi_id">
                            <option value="">TOUS</option>
                            @foreach($produits as $ent)
                               <option value="{{ $ent->id }}">{{ $ent->name }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div style="padding: 0 10px" class="form-group">
                        <label for="moi_id">PROJET</label>
                        <select name="projet_id" class="form-control" id="moi_id">
                            <option value="">TOUS</option>
                            @foreach($projets as $ent)
                               <option value="{{ $ent->id }}"> {{ \Illuminate\Support\Str::limit($ent->name,35) }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div style="padding: 0 10px" class="form-group">
                        <label for="moi_id">ETAT</label>
                        <select name="statut" class="form-control" id="moi_id">
                            <option value="">TOUS</option>
                            <option value="1">CREATION</option>
                            <option value="2">EXECUTION</option>
                        </select>
                      </div>

                      <button type="submit" class="btn btn-orange"><i class="fa fa-search"></i></button>

                  </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                    <thead>
                    <tr>
                      <th>ID PROD</th>
                      <th>DESIGNATION</th>
                      <th>PU (EURO)</th>
                      <th>PU (FCFA)</th>
                      <th>QUANTITE</th>
                      <th>PROJET</th>
                      <th>CLIENT</th>
                      <th>TOTAL (EURO)</th>
                      <th>TOTAL (FCFA)</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lgns as $ligne)

                          <tr>
                            <td>{{ $ligne['code'] }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($ligne['name'],30) }}</td>
                            <td>{{ \App\Helpers\CurrencyFr::format($ligne['pu'],2) }}</td>
                            <td>{{ \App\Helpers\CurrencyFr::format($ligne['pu_fcfa']) }}</td>
                            <td>{{ number_format($ligne['quantity'],0,',','.') }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($ligne['projet'],40) }}</td>
                            <td>{{  \Illuminate\Support\Str::limit($ligne['client'],30) }}</td>
                            <td>{{ \App\Helpers\CurrencyFr::format($ligne['total'],2 ) }}</td>
                            <td>{{ \App\Helpers\CurrencyFr::format($ligne['total_fcfa'] ) }}</td>
                            <td><span class="badge badge-{{ $ligne['badge'] }}">{{ $ligne['etat'] }}</span></td>
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

          <style>
            .form-inline input, .form-inline select{
                margin-left: 10px;
            }

            .form-inline label{
                font-weight: 600;
            }
          </style>

@endsection

