


@extends('layouts.rc')

@section('page-title')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">BASE DES COMMANDES CLIENT</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/rc/dashboard">SM</a></li>
              <li class="breadcrumb-item">CLIENTS</li>
              <li class="breadcrumb-item active">COMMANDES</li>
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
                  <h3 class="card-title">COMMANDES</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <table class="table datatable table-bordered table-hover table-striped table-condensed">
                       <thead>
                           <tr>
                               <th>CLIENT</th>
                               <th>&numero;</th>
                               <th>DATE</th>
                               <th>NOMBRE D'AGENT</th>
                               <th>STATUT</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($commandes as $liv)

                               <tr>
                                   <td>{{ $liv->client?$liv->client->name:'-' }}</td>
                                   <td>{{ $liv->name }}</td>

                                   <td>{{ date_format($liv->created_at,'d/m/Y') }}  </td>
                                   <td>{{ number_format($liv->nombre, 0,',','.') }}</td>
                                   <td> <span class="badge badge-{{ $liv->step['color'] }}">{{ $liv->step['name'] }}</span> </td>
                                   <td>
                                       <ul class="list-inline">
                                            @if($liv->step['level']>1)
                                                <li class="list-inline-item"><a class="btn btn-xs btn-info" title="Afficher" href="/rc/commandes/{{ $liv->token }}"><i class="fa fa-eye"></i></a></li>
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