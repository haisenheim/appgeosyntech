@extends('......layouts.admin')

@section('page-title')
EVENEMENTS
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">
        <div class="card">
        <div class="card-body p-0">
          <table class="table table-striped projects" id="table-projets">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th>
                          DESIGNATION
                      </th>
                      <th style="width: 20%">DEBUT</th>
                      <th style="width: 20%">
                         FIN
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>


                   @foreach($events as $projet)
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $projet->name }}</span>
                            </td>

                            <td>{{ date_format($projet->start,'d/m/Y H:i' ) }}</td>
                            <td>{{ date_format($projet->end,'d/m/Y H:i' ) }}</td>




                      <td class="project-actions text-right">
                          <a class="btn btn-success btn-xs" href="/admin/events/{{ $projet->token  }}">
                              <i class="fas fa-search">
                              </i>
                              Afficher
                          </a>


                      </td>
                        </tr>
                   @endforeach
              </tbody>
          </table>

          <div class="pagination">
            {{ $events->links() }}
          </div>
        </div>
        <!-- /.card-body -->
        <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">NOUVEL EVENEMENT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                           <form enctype="multipart/form-data" class="form" action="{{route('admin.events.store')}}" method="post">
                            {{csrf_field()}}

                            <fieldset>
                                <legend>INFORMATIONS SUR L'EVENEMENT</legend>
                                    <div class="row">
                                         <div class="col-md-12">
                                             <div class="form-group">
                                                 <label class="control-label">NOM</label>
                                                 <input id="name" name="name" maxlength="250" type="text" required="required" class="form-control" placeholder="">
                                             </div>
                                         </div>
                                    </div>

                                    <div class="row">
                                         <div class="col-md-3">
                                             <div class="form-group">
                                                 <label for="prix" class="control-label">DATE DE DEBUT</label>
                                                 <input id="start" name="start"  type="date"  class="form-control" placeholder="">
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="form-group">
                                                 <label for="prix" class="control-label">DATE DE FIN</label>
                                                 <input id="end" name="end"  type="date"  class="form-control" placeholder="">
                                             </div>
                                         </div>

                                         <div class="col-md-3">
                                             <div class="form-group">
                                                 <label for="link" class="control-label">LIEN YOUTUBE</label>
                                                 <input id="link" name="link"  type="datetime"  class="form-control" placeholder="">
                                             </div>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="form-group">
                                                 <label for="link" class="control-label">PHOTO</label>
                                                 <input id="imageUri" name="imageUri"  type="file"  class="form-control" placeholder="">
                                             </div>
                                         </div>
                                    </div>

                                     <div class="row">
                                         <div class="col-md-12 col-sm-12">
                                             <div class="form-group">
                                                 <label for="description" class="control-label">DESCRIPTION</label>
                                                 <textarea name="description" id="description" cols="30" rows="3"></textarea>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="btn-div card-footer text-center">
                                         <button class="btn btn-outline-success btn-block" type="submit"> Enregister <i class="fa fa-save"></i></button>
                                    </div>
                             </fieldset>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
           </div>
      </div>

    </div>
    <style>
            div.note-editor.note-frame{
                padding: 0;
            }
          .note-frame .btn-default {
                color: #222;
                background-color: #FFF;
                border-color: none;
            }
        </style>
        <script type="text/javascript" src="{{ asset('summernote/dist/summernote.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('summernote/dist/summernote.css') }}"/>

        <script type="text/javascript">
            $(document).ready(function() {
              $('textarea').summernote({
                height: 200,
                tabsize: 2,
                followingToolbar: true,
                lang:'fr-FR'
              });
            });
          </script>
@endsection

@section('nav_actions')
<main>
    <nav class="floating-menu">
        <ul class="main-menu">
            <li>
                <a title="Nouvel évènement" href="#" data-target="#modal-lg" data-toggle="modal" class="ripple">
                    <i class="fa fa-plus-circle fa-lg"></i>
                </a>
            </li>
        </ul>
        <div class="menu-bg"></div>
    </nav>
</main>

@endsection