@extends('......layouts.national')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">AGENCES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/national/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">PARAMETRES</li>
              <li class="breadcrumb-item active">AGENCES OBAC</li>
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
                  <h3 class="card-title">LISTE DES AGENCES</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                      <th>NOM</th>
                      <th>VILLE</th>
                      <th>PAYS</th>


                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($devises as $ville)
                          <tr>
                              <td>{!! $ville->name !!} </td>
                              <td>{!!$ville->ville->name !!}</td>
                              <td>{!! $ville->ville->pay->name !!} </td>
                              <td>
                                    <ul class="list-inline">
                                        <li title="Afficher" class="list-inline-item"><a class="btn btn-info btn-xs" href="/national/agences/{{ $ville->token }}"><i class="fa fa-search"></i></a></li>
                                    </ul>
                              </td>
                          </tr>
                      @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                      <th>NOM</th>
                      <th>VILLE</th>
                      <th>PAYS</th>

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
                        <h4 class="modal-title">Nouvelle agence</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('national.agences.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">NOM</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Saisir le nom de l'agence">
                            </div>

                             <div class="form-group">
                              <label for="name">ADRESSE</label>
                              <input type="text" class="form-control" id="name" name="agaddress" placeholder="Saisir l'adresse de l'agence">
                            </div>

                             <div class="form-group">
                              <label for="name">TELEPHONE</label>
                              <input type="text" class="form-control" id="name" name="agphone" placeholder="">
                            </div>



                            <div class="form-group">
                              <label for="pay_id">PAYS</label>
                             <select name="pay_id" class="form-control" id="pay_id">
                                @foreach($pays as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                             </select>
                            </div>
                            <div class="form-group">
                              <label for="ville_id">VILLE</label>
                              <select name="ville_id" id="ville_id" class="form-control">

                              </select>
                            </div>

                            <fieldset>
                                <legend>ADMINISTRATEUR</legend>
                                    <div class="">
                                        <div class="form-group">
                                          <label for="name">NOM</label>
                                          <input type="text" class="form-control" id="name" name="last_name" placeholder="Saisir le nom ">
                                        </div>
                                        <div class="form-group">
                                          <label for="name">PRENOM</label>
                                          <input type="text" class="form-control" id="name" name="first_name" placeholder="Saisir le prenom">
                                        </div>
                                        <div class="form-group">
                                          <label for="name">ADRESSE</label>
                                          <input type="text" class="form-control" id="name" name="address" placeholder="Saisir l'adresse">
                                        </div>

                                        <div class="form-group">
                                          <label for="phone">TELEPHONE</label>
                                          <input type="text" class="form-control" id="phone" name="phone" placeholder="exple : 0456773878">
                                        </div>
                                        <div class="form-group">
                                          <label for="email">EMAIL</label>
                                          <input type="email" class="form-control" id="email" name="email" placeholder="exple : info@system.com">
                                        </div>
                                        <div class="form-group">
                                          <label for="name">MOT DE PASSE</label>
                                          <input type="password" class="form-control" id="name" name="password" placeholder="">
                                        </div>
                                        <div class="form-group">
                                          <label for="name">CONFIRMATION DU MOT DE PASSE</label>
                                          <input type="password" class="form-control" id="name" name="cpassword" placeholder="">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputFile">PHOTO</label>
                                        <input type="file" class="form-control" id="exampleInputFile" name="imageUri">
                                      </div>
                                      </div>
                            </fieldset>
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

  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">


<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}} "></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();

  });

  $('#pay_id').change(function() {
  $('#ville_id').html('');
  var html='';
    $.ajax({
        url:'/get-villes-pay',
        type:'get',
        dataType:'json',
        data:{pay_id:$('#pay_id').val()},
        success:function(data) {

         // console.log(Object.entries(data));
          data = Object.entries(data);
          for(var i=0;i<data.length;i++){
          html= html + '<option value="'+ data[i][1].id +'">'+ data[i][1].name +'</option>';
          //console.log(html);
          }
          //console.log(html);
          $('#ville_id').html(html);
        }

    });
  })
</script>


@endsection