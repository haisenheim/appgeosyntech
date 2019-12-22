<div class="modal fade" id="angelsModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6  class="modal-title text-center">INVESTISSEURS POTENTIELS</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="modal-body">
            <div class="card card-danger">
                <div class="card-body">
                     @if(count($projet->investissements)>=1)
                        <table style="color: #000" id="table-invest" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%;"></th>
                              <th>#</th>
                              <th>Entreprise</th>
                              <th>Organisme Fin.</th>
                              <th>Depuis le</th>
                              <th>RDV</th>

                              <th style="width: 10%;"></th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach($projet->investissements as $invest)
                                    <tr>
                                         <td style="width: 5%;"></td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#angelMoal">
                                                <img style="border-radius: 50%;float: left;height: 40px;width: 40px;"
                                                    src="{{ $invest->angel->imageUri?asset('img/'.$invest->angel->imageUri):asset('img/avatar.png') }}" /> <br/>
                                               <p>{{ $invest->angel->name }}  </p>
                                        </a>
                                        </td>
                                        <td>
                                            <?php if($invest->angel->entreprise): ?>
                                                    <img  style="border-radius: 50%;float: left;height: 40px;width: 40px;" src="{{ $invest->angel->entreprise->imageUri?asset('img/'.$invest->angel->entreprise->imageUri):asset('img/logo-obac.png') }}" /> <br/>
                                                    <p>{{ $invest->angel->entreprise->name }}</p>

                                             <?php else: ?>
                                                -
                                             <?php endif; ?>
                                        </td>
                                         <td>
                                            <?php if($invest->angel->organisme): ?>
                                                    <img  style="border-radius: 50%;float: left;height: 40px;width: 40px;" src="{{ $invest->angel->organisme->imageUri?asset('img/'.$invest->angel->organisme->imageUri):asset('img/logo-obac.png') }}" /> <br/>
                                                    <p>{{ $invest->angel->organisme->name }}</p>

                                             <?php else: ?>
                                                -
                                             <?php endif; ?>
                                        </td>
                                        <td><?= $invest->created_at?date_format($invest->created_at, 'd/m/Y'):'-' ?></td>
                                        <td><?= $invest->rencontre?date_format($invest->rencontre,'d/m/Y'):'-'; ?></td>
                                        <td style="width: 10%;">

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-flat">Actions</button>
                                                <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                                                  <span class="caret"></span>

                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                 <?php if($invest->lettre): ?>
                                                    <a class="dropdown-item" href="/national/letter/create/{{ $invest->token }}">Lettre d'intention</a>
                                                  <?php endif; ?>
                                                  <?php if(!$invest->doc_juridique): ?>
                                                    <a title="Autoriser l'accès à la documentation juridique" class="dropdown-item" href="/national/projet/docs/open/{{ $invest->token }}">Ouvrir la documentation</a>
                                                  <?php else: ?>
                                                    <a title="Autoriser l'accès à la documentation juridique" class="dropdown-item" href="/national/projet/docs/close/{{ $invest->token }}">Fermer la documentation</a>
                                                  <?php endif; ?>
                                                  <?php if($invest->validated): ?>
                                                    <a class="dropdown-item" href="/owner/investissements/close/{{ $invest->token }}">Fermer la data room</a>
                                                  <?php else: ?>
                                                    <a class="dropdown-item" href="/owner/investissements/open/{{ $invest->token }}">Ouvrir la data room</a>
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
</div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
 $(function () {
    $("#table-invest").DataTable({
        "lengthChange":true

    });

  });
</script>