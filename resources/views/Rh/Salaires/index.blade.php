@extends('......layouts.rh')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">ETAT DE LA PAIE</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">Salaires</li>
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
                  <h3 class="card-title">PAYE <a class="btn btn-primary btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card text-white" style="background-color: #888; border-color: #333;">
                        <div class="card-body">
                            MOIS DE <span style="text-align: right;" class="value">{{ $moi_id }}/{{ $annee }}</span>
                        </div>
                   </div>
                   <div>
                        <form class="form-inline" action="">
                            <label class="mr-10" for="moi_id">MOIS</label>
                            <select class="form-control mr-20" name="moi_id" id="moi_id">
                                @foreach($mois as $m)
                                    <option value="{{ $m->id }}">{{ $m->name }}</option>
                                @endforeach
                            </select>

                            <label class="mr-10" for="annee">MOIS</label>
                            <select class="form-control mr-20"  name="annee" id="annee">
                                <?php $an = date('Y'); for($i=0;$i<5;$i++): ?>
                                    <option value=" {{ $an-$i }} "> {{ $an - $i }} </option>
                                <?php endfor; ?>
                            </select>
                            <button class="btn btn-danger btn-xs mt-3" type="submit" title="charger"><i class="fa fa-search"></i></button>
                        </form>
                   </div>

                   <table class="table table-bordered table-striped table-condensed table-hover dataTable">
                        <thead>
                            <tr>
                                <th>AGENT</th>
                                <th>MONTANT</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $s=0; ?>
                            @foreach($bulletins as $bulletin)
                                <?php $s=$s+$bulletin->montant; ?>
                                <tr>
                                    <td>{{ $bulletin->owner->name }}</td>
                                    <td style="padding-right: 10px; text-align: right; font-weight: bolder">{{ number_format($bulletin->montant,0,',','.') }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline">
                                                 <a class="btn btn-xs btn-info" href="/rh/bulletin/{{ $bulletin->token }}"><i class="fa fa-eye"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>

                   <div class="card text-white" style="background-color: #888; border-color: #333;">
                        <div class="card-body">
                            MASSE SALAIRE DU MOIS : <span style="text-align: right;" class="value">{{ number_format($s,0,',','.') }}</span>
                        </div>
                   </div>

                </div>
                <!-- /.card-body -->
              </div>

            </div>

            <!-- /.col -->
          </div>
    </div>



           <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVELLE CATEGORIE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('rh.categories.store')}}" method="post">
                        {{csrf_field()}}

                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">NOM</label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder="Saisir le nom ">
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="minimum">SALAIRE</label>
                                      <input type="number" class="form-control" id="minimum" name="minimum" >
                                    </div>
                                </div>

                            </div>


                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
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