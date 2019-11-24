@extends('......layouts.owner')

@section('page-title')
CESSION DE {{ number_format($projet->montant, 0,',','.') }} <sup>{{ $projet->devise->montant }}</sup>
@endsection

@section('content')
     <?php
        use \Illuminate\Support\Facades\Auth;
      ?>
    <div style="padding-top: 30px" class="container">
        <div class="row">




            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>

                    <small class="float-right">Date: {{ date_format($projet->created_at,'d/m/Y') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <hr/>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  DEBITEUR:
                  <address>
                    <strong>{{ $projet->debiteur }} </strong><br>
                    {{ $projet->address }}<br>

                    Téléphone: {{ $projet->phone }}<br>
                    Email: {{ $projet->email }}<br/>
                    Representé par: {{ $projet->representant }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  CREANCIER:
                  <address>
                    <strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong><br>
                    <?= Auth::user()->address ?><br>

                    Téléphone: <?= Auth::user()->phone ?><br>
                    Email: <?= Auth::user()->email ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>MONTANT : {{ number_format($projet->montant, 0,',','.') }} <sup>{{ $projet->devise->abb }}</sup></b><br>
                  <br>
                  <b>PRIX DE LA CESSION :{{ number_format($projet->prix_cession, 0,',','.') }} <sup>{{ $projet->devise->abb }}</sup> </b><br>
                  <b>DATE DE PAIEMENT:</b> <?= date_format($projet->dt_paiement,'d/m/Y') ?><br>

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
                <hr/>
              <div class="row">
                <div class="col-md-12 col-sm-12">
                    <p><?= $projet->description ?></p>
                </div>
              </div>



            <!-- /.invoice -->

        </div>
    </div>
@endsection


@section('nav_actions')
<main>
    <nav style="top:30%" class="floating-menu">
        <ul class="main-menu">


            <li>
                <a title="Modifier" class="ripple" href="/owner/creance/edit/{{ $projet->token }}" ><i class="fa fa-edit fa-lg"></i></a>
            </li>

            @if($projet->cessions->count() >=1)
                   @if($projet->validated_step==1)
                       <li>
                            <a title="Programmer une rencontre avec les investisseur" class="ripple" href="/owner/actifs/plan"><i class="fa fa-calendar"></i></a>
                       </li>
                    @endif
                   <li>
                        <a data-target="#angelsModal" data-toggle="modal" title="Liste des investisseurs potentiels" class="ripple" href="#"><i class="fa fa-users fa-lg"></i></a>
                   </li>
            @endif

            <li>
                <a data-toggle="modal" data-target="#upDocsModal" title="Charger les documents du projet" href="#" class="ripple">
                    <i class="fa fa-book fa-lg"></i>
                </a>
            </li>

        </ul>
        <div
         style="
          background-image:-webkit-linear-gradient(top,#28a745 0,#167699 100%);
          background-image:-o-linear-gradient(top,#28a745 0,#167699 100%);
          background-image:-webkit-gradient(linear,left top,left bottom,from(#28a745),to(#167699));
          background-image:linear-gradient(to bottom,#efffff 0,tranparent 100%);
          background-repeat:repeat-x;position:absolute;width:100%;height:100%;border-radius:50px;z-index:-1;top:0;left:0;
          -webkit-transition:.1s;-o-transition:.1s;transition:.1s
        "
        class="menu-bg"></div>
    </nav>
</main>


<div class="modal fade" id="angelsModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header bg-success">
          <h4 class="modal-title">LISTE DE POTENTIELS INVESTISSEURS</h4>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
      </div>
      <div class="modal-body">
          <div class="card card-danger">
                <div class="card-body">
                     @if($projet->cessions->count()>=1)
                        <table style="color: #000" id="table-invest" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Investisseur</th>
                              <th>Depuis le</th>

                               <th></th>


                            </tr>
                            </thead>
                            <tbody>
                                @foreach($projet->cessions as $invest)
                                    <tr>
                                        <td>
                                            @if($invest->validated)
                                                <span class="badge badge-success"><i class="fa fa-check"></i></span>
                                            @else
                                                <span class="badge badge-danger"><i class="fas fa-trash"></i></span>
                                            @endif
                                        </td>
                                        <td>{{ $invest->angel->name }}</td>
                                        <td><?= $invest->created_at?date_format($invest->created_at, 'd/m/Y H:i'):'-' ?></td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-flat">Actions</button>
                                                <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                                  <span class="caret"></span>

                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                 <?php if($invest->lettre): ?>
                                                    <a class="dropdown-item" href="#">Lettre d'intention</a>
                                                  <?php endif; ?>
                                                  <?php if($invest->validated): ?>
                                                    <a class="dropdown-item" href="/owner/cessions/close/{{ $invest->token }}">Dissocier cet investisseur</a>
                                                  <?php else: ?>
                                                    <a class="dropdown-item" href="/owner/cessions/open/{{ $invest->token }}">Associer cet investisseur</a>
                                                  <?php endif; ?>

                                                </div>
                                              </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                @endif
                </div>
            </div>
      </div>
          </div>
      </div>
</div





<style>
   .modal .card-title{
        color: #000000;
        font-weight: bold;
   }

   .modal label{
        font-size: x-small;
        line-height: 0.5;
   }
   .card.maximized-card {

               overflow-y: scroll;
           }
</style>
 <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<script src="{{asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#table-invest").DataTable();

  });
</script>

@endsection

