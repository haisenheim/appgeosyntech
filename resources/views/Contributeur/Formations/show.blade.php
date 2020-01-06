@extends('......layouts.contributeur')

@section('page-title')
{{ $formation->name }}
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                 @include('includes.Show.formation_left_side')
            </div>
            <div class="col-md-8 col-sm-12">
                 @include('includes.Show.formation_right_side')
            </div>
        </div>
    </div>


    <div class="modal fade" id="moduleAdd">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-info">
                        <h4 class="modal-title">NOUVEAU MODULE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="/contributeur/formation/add-module/" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="token" value="{{ $formation->token }}"/>

                          <!-- /.card-body -->
                          <div class="card-body">
                               <div class="form-group">
                                    <label for="name">INTITULE DU MODULE</label>
                                    <input type="text" name="name" id="name" class="form-control"/>
                               </div>
                               <div class="row">

                                    <div class="col-md-8 col-sm-12">
                                        <div class="form-group">
                                            <label for="minimum">SCORE MINIMUM REQUIS</label>
                                            <input type="text" name="minimum" id="minimum" class="form-control"/>
                                       </div>
                                    </div>

                               </div>
                               <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="prix_ligne">Prix en ligne</label>
                                            <input type="number" id="prix_ligne" class="form-control" name="prix_ligne" />

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="prix_presentiel">Prix en présentiel</label>
                                            <input type="number" id="prix_presentiel" class="form-control" name="prix_presentiel" />

                                        </div>
                                    </div>

                               </div>
                               <div class="form-group">
                                   <label for="description">DESCRIPTION</label>
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


       <script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>

    <script type="text/javascript">
        $(document).ready(function() {
          $('textarea').summernote({
            height: 125,
            tabsize: 2,
            followingToolbar: true,
            lang:'fr-FR'
          });
        });
    </script>
@endsection



