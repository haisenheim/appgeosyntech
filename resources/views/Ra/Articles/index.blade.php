@extends('......layouts.ra')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">ARTICLES</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SM</a></li>
                        <li class="breadcrumb-item active">Articles</li>
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
                  <h3 class="card-title">ARTICLES <a class="btn btn-primary btn-xs pull-right" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">



                   <table class="table table-bordered table-striped table-condensed table-hover datatable">
                        <thead>
                            <tr>
                                <th>DESIGNATION</th>

                                <th>QUANTITE EN STOCK</th>
                                <th>SEUIL MINIMUM</th>
                                <th>CATEGORIE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($articles as $article)

                                <tr style="background-color: <?= ($article->quantity <= $article->minimun)?'rgba(255, 10, 3, 0.36)':''  ?> ">
                                    <td>{{ $article->name }}</td>
                                    <td style="padding-right: 10px; text-align: right; font-weight: bolder">{{ number_format($article->quantity,0,',','.') }}</td>
                                    <td style="padding-right: 10px; text-align: right; font-weight: bolder">{{ number_format($article->minimum,0,',','.') }}</td>
                                    <td>{{ $article->type?$article->type->name:'-' }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline">
                                                 <a class="btn btn-xs btn-info" href="#"><i class="fa fa-eye"></i></a>
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

    <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVEL ARTICLE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('ra.articles.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="name">DESIGNATION</label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder="Saisir le nom ">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="role_id">CATEGORIE</label>
                                      <select required="required" name="tarticle_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($tarticles as $tarticle)
                                                <option value="{{ $tarticle->id }}">{{ $tarticle->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="role_id">UNITE DE MESURE</label>
                                      <select required="required" name="unite_id" id="pay_id" class="form-control">
                                        <option value="0">SELECTIONNER </option>
                                            @foreach($unites as $unite)
                                                <option value="{{ $unite->id }}">{{ $unite->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="email">STOCK INITAL</label>
                                      <input type="number" class="form-control" id="email" name="quantity" placeholder="exple :0">
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                      <label for="email">STOCK MINIMUM</label>
                                      <input type="number" class="form-control" id="email" name="minimum" placeholder="seuil d'alerte ">
                                    </div>
                                </div>


                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputFile">PHOTO</label>
                                        <input type="file" class="form-control" id="exampleInputFile" name="imageUri">
                                    </div>
                                </div>

                            </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-info btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
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