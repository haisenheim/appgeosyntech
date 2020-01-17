@extends('......layouts.corporate')

@section('page-title')
NOS FORMATIONS
@endsection

@section('content')
 <div class="card">


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

                      <th>Nb. d'inscrits</th>
                      <th>Nb. Modules</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                   @foreach($inscriptions as $inscription)
                        <?php $formation = $inscription->formation ?>
                        <tr>
                            <td>#</td>
                            <td>
                            <span class="text-bold text-lg-left">{{ $formation->name }}</span>- <small>{{ $formation->created_at?date_format($formation->created_at,'d/m/Y'):'' }}</small><br/>

                            </td>
                            <td>
                                {{number_format($formation->prix_ligne,0,',','.')}}
                            </td>
                            <td>
                                {{number_format($formation->prix_presentiel,0,',','.')}}
                            </td>
                            <td>
                                {{ $inscription->comptes->count() }}
                            </td>


                            <td>{{ $formation->modules->count() }}</td>

                          <td class="project-actions text-right">
                                <ul>
                                    <li class="list-inline-item" title="Afficher"> <a class="btn btn-info btn-xs" href="/corporate/formations/{{ $formation->token  }}"><i class="fas fa-search"></i></a></li>
                                </ul>
                           </td>
                        </tr>
                   @endforeach
              </tbody>
          </table>
          <div class="">
              <ul class="pagination justify-content-end">
              {{ $inscriptions->links() }}
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