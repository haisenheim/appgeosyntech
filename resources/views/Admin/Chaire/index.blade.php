@extends('......layouts.admin')
@section('content')

 <div class="card">
        <div class="card-header">
          <h3 class="card-title">CHAIRE OBAC</h3>
        </div>

        <div class="card-body p-0">
          <table class="table table-striped projects" id="table-projets">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 38%">
                          FORMATION
                      </th>
                      <th>Cout en ligne</th>
                      <th>Cout en présentiel</th>
                      <th>
                          Contributeur
                      </th>
                      <th>Nb. Modules</th>
                      <th><a class="btn btn-outline-primary btn-xs" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></th>

                  </tr>
              </thead>
              <tbody>


                   @foreach($formations as $formation)
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $formation->name }}</span>- <small>{{ $formation->created_at?date_format($formation->created_at,'d/m/Y'):'' }}</small><br/>
                            <?= $formation->active?'<span class="badge badge-success">ACTIVE</span>':'<span class="badge badge-danger">Bloquée</span>' ?> -
                            <?= $formation->free?'<span class="badge badge-info">GRATUITE</span>':'<span class="badge badge-warning">PAYANTE</span>' ?>
                            </td>
                            <td>
                                {{number_format($formation->prix_ligne,0,',','.')}}
                            </td>
                            <td>
                                {{number_format($formation->prix_presentiel,0,',','.')}}
                            </td>

                            <td>{{$formation->contributeur?$formation->contributeur->name:'-'}}</td>
                            <td>{{ $formation->modules->count() }}</td>

                          <td class="project-actions text-right">
                                <ul>
                                    <li class="list-inline-item"> <a class="btn btn-primary btn-xs" href="/admin/formations/{{ $formation->token  }}"><i class="fas fa-folder"></i>Afficher</a></li>

                                           @if($formation->active)
                                               <li title="bloquer cette formation" class="list-inline-item"><a class="btn btn-danger btn-xs" href="/admin/formation/disable/{{ $formation->token }}"><i class="fa fa-lock"></i></a></li>
                                           @else
                                             <li title="débloquer ce formation" class="list-inline-item"><a class="btn btn-success btn-xs" href="/admin/formation/enable/{{ $user->token }}"><i class="fa fa-unlock"></i></a></li>
                                           @endif
                                </ul>
                           </td>
                        </tr>
                   @endforeach
              </tbody>
          </table>
          <div class="">
              <ul class="pagination justify-content-end">
              {{ $formations->links() }}
          </ul>
          </div>
        </div>
        <!-- /.card-body -->
      </div>


            <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                        <h4 class="modal-title">NOUVELLE FORMATION DE LA CHAIRE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="chaire/" method="post">
                        {{csrf_field()}}

                          <!-- /.card-body -->
                          <div class="card-body">
                               <div class="form-group">
                                    <label for="name">INTITULE</label>
                                    <input type="text" name="name" id="name" class="form-control"/>
                               </div>
                               <div class="form-group">
                                   <label for="description">DESCRIPTION</label>
                                   <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                               </div>
                               <div class="form-group">
                                    <label for="">IMAGE OU PLAQUETTE</label>
                                    <input class="form-control" type="file" name="imageUri"/>
                               </div>
                          </div>

                          <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-outline-primary"><i class="fa fa-w fa-save"></i> ENREGISTRER</button>
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
            height: 200,
            tabsize: 2,
            followingToolbar: true,
            lang:'fr-FR'
          });
        });
    </script>
@endsection