@extends('......layouts.rh')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">FICHES DE POINTAGE</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">Pointage</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
         <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">FICHES DE POINTAGE </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card text-white" style="background-color: #888; border-color: #333;">
                        <div class="card-body">
                            MOIS DE <span style="text-align: right;" class="value">{{ $moi_id }}/{{ $annee }}</span> <span style="float: right; font-weight: bolder; font-size: larger">{{ $client?$client->name:'' }}</span>
                        </div>
                   </div>
                   <div>
                        <form class="form-inline" action="">
                             <label class="mr-10" for="client_id">CLIENT</label>
                            <select class="form-control" style="margin-right: 20px" name="client_id" id="client_id">
                                @foreach($clients as $cl)
                                    <option value="{{ $cl->id }}">{{ $cl->name }}</option>
                                @endforeach
                            </select>

                            <label class="mr-10" for="moi_id">MOIS</label>
                            <select class="form-control" style="margin-right: 20px" name="moi_id" id="moi_id">
                                @foreach($mois as $m)
                                    <option value="{{ $m->id }}">{{ $m->name }}</option>
                                @endforeach
                            </select>

                            <label class="mr-10" for="annee">ANNEE</label>
                            <select class="form-control" style="margin-right: 20px"  name="annee" id="annee">
                                <?php $an = date('Y'); for($i=0;$i<5;$i++): ?>
                                    <option value=" {{ $an-$i }} "> {{ $an - $i }} </option>
                                <?php endfor; ?>
                            </select>
                            <button class="btn btn-danger btn-sm" type="submit" title="charger"><i class="fa fa-search"></i></button>
                        </form>
                   </div>

                   <table class="table table-bordered table-striped table-condensed table-hover datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>JOUR</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($fiches as $fiche)

                                <tr>
                                    <td>{{ $fiche->name }}</td>
                                    <td style="padding-right: 10px; text-align: right; font-weight: bolder">{{ date_format($fiche->jour, 'd/m/Y') }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline">
                                                 <a class="btn btn-xs btn-info" href="/rh/fiche/{{ $fiche->token }}"><i class="fa fa-eye"></i></a>
                                            </li>
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