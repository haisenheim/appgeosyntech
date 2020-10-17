@extends('layouts.admin')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">DEMANDE DE COTATION FOURNISSEUR</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">SGM</a></li>
              <li class="breadcrumb-item">COTATIONS</li>
              <li class="breadcrumb-item active">DEMANDE DE COTATION FOURNISSEUR</li>
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
                  <h4 class="card-title">DEMANDES DE COTATION FOURNISSEUR</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed datatable">
                    <thead>
                    <tr>
                      <th>PROJET</th>  
                      <th>DATE</th>
                      <th>FOURNISSEUR</th>
                      <th>ORIGINE</th>
                      <th>VOLUME DE GROS</th>
                      <th>POIDS DE GROS</th>
                      <th>MONTANT</th>
                      
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cotations as $projet)

                          <tr>
                              <td><a href="/admin/projets/{{ $projet->token }}">{{ $projet->projet? \Illuminate\Support\Str::limit($projet->projet->name,50):'-' }}</a></td>
                              <td>{{ date_format($projet->created_at,'d/m/Y') }}</td>
                              <td>{{ $projet->fournisseur->sigle }}</td>
                              <td>{{ $projet->origine?$projet->origine->name:'' }}</td>
                              <td>{{ number_format($projet->volume,2,',','.') }}</td>
                              <td>{{ number_format($projet->poids,2,',','.') }}</td>
                               <td>{{ number_format($projet->prix,2,',','.') }}</td>
                              <td style="min-width: 7%;">
                              <ul style="margin-bottom: 0" class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-light btn-xs" href="{{route('admin.frncotations.show',[$projet->token])}}"><i class="fa fa-search"></i></a></li>
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

        
@endsection

