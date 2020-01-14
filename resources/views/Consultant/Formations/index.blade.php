@extends('......layouts.consultant')
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
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                   @foreach($formations as $formation)
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $formation->name }}</span>- <small>{{ $formation->created_at?date_format($formation->created_at,'d/m/Y'):'' }}</small><br/>
                            <?= $formation->active?'<span class="badge badge-success">ACTIVE</span>':'<span class="badge badge-danger">Bloquée</span>' ?> -
                            <?= $formation->free?'<span class="badge badge-info">GRATUITE</span>':'<span class="badge badge-warning">PAYANTE</span>' ?>- <?= $formation->interne?'<span class="badge badge-success"><i class="fa fa-users"></i> Consultants </span>':'<span class="badge badge-warning"><i class="fa fa-school"></i> Ecoles</span>' ?>
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
                                    <li class="list-inline-item" title="Afficher"> <a class="btn btn-info btn-xs" href="/consultant/formations/{{ $formation->token  }}"><i class="fas fa-search"></i></a></li>

                                           @if($formation->active)
                                               <li title="bloquer cette formation" class="list-inline-item"><a class="btn btn-danger btn-xs" href="/consultant/formation/disable/{{ $formation->token }}"><i class="fa fa-lock"></i></a></li>
                                           @else
                                             <li title="débloquer ce formation" class="list-inline-item"><a class="btn btn-success btn-xs" href="/consultant/formation/enable/{{ $formation->token }}"><i class="fa fa-unlock"></i></a></li>
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