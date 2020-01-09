@extends('......layouts.contributeur')
@section('page-title')
{{ $module->name }}
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                 @include('includes.Show.module_left_side')
            </div>
            <div class="col-md-8 col-sm-12">
                 @include('includes.Show.module_right_side')
            </div>
        </div>
    </div>

    <div class="modal" id="coursAdd">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">NOUVEAU COURS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form enctype="multipart/form-data" role="form" action="/contributeur/module/add-cours/" method="post">
              {{csrf_field()}}
              <input type="hidden" name="token" value="{{ $module->token }}"/>

                <!-- /.card-body -->
                <div class="card-body">
                     <div class="form-group">
                          <label for="name">INTITULE DU COURS</label>
                          <input type="text" name="name" id="name" class="form-control">
                     </div>

                     <div class="row">
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="pdfUri">Fichier pdf</label>
                                  <input type="file" id="pdfUri" class="form-control" name="pdfUri">
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="audioUri">Le Podcast</label>
                                  <input type="file" id="audioUri" class="form-control" name="audioUri">
                              </div>
                          </div>
                          <div class="col-md-4 col-sm-12">
                              <div class="form-group">
                                  <label for="videoUri">Vidéo du cours</label>
                                  <input type="file" id="videoUri" class="form-control" name="videoUri">
                              </div>
                          </div>

                     </div>
                     <div class="form-group">
                         <label for="description">DESCRIPTION SOMMAIRE</label>
                         <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>

                     </div>


                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-outline-info"><i class="fa fa-w fa-save"></i> ENREGISTRER</button>
                </div>
              </form>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
                  <!-- /.modal-dialog -->

    </div>

@endsection


@section('nav_actions')
<main>
    <nav class="floating-menu">
        <ul class="main-menu">
            <li>
                <a title="Ajouter un cours" href="#" data-toggle="modal" data-target="#coursAdd" class="ripple">
                    <i class="fa fa-plus-circle fa-lg"></i>
                </a>
            </li>
        </ul>
        <div class="menu-bg"></div>
    </nav>
</main>

@endsection
