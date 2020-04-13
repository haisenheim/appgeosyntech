


@extends('layouts.admin')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DOTATIONS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">SM</a></li>
              <li class="breadcrumb-item">DOTATIONS</li>
              <li class="breadcrumb-item active">SORTIES DE STOCK</li>
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
                  <h3 class="card-title">SORTIE DE STOCK </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>

                               <th>&numero;</th>
                               <th>DATE</th>
                               <th>CLIENT</th>
                               <th>MISSION</th>
                               <th>NOMBRE D'ELEMENT</th>

                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($sorties as $liv)

                               <tr>

                                   <td>{{ $liv->name }}</td>

                                   <td>{{ date_format($liv->created_at,'d/m/Y') }}  </td>
                                   <td>{{ $liv->client->name }}</td>
                                   <td>{{ $liv->commande->name }}</td>
                                   <td>{{ number_format($liv->nombre, 0,',','.') }}</td>

                                   <td>
                                       <ul class="list-inline">
                                           <li class="list-inline-item"><a class="btn btn-xs btn-info" title="Afficher" href="/admin/sorties/{{ $liv->token }}"><i class="fa fa-eye"></i></a></li>
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