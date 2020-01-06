<div class="card">
    <div class="card-header">
        <h4>LISTES DE COURS</h4>
        <span class="pull-right"><a class="btn btn-outline-info btn-xs" href="#" data-toggle="modal" data-target="#coursAdd"><i class="fa fa-plus-circle"></i></a></span>
    </div>
    <div>
        <ul class="list" style="list-style-type: upper-roman;">

            @foreach($module->cours as $cour)
                <li style="margin-top: 10px">
                    <div class="card">
                        <div class="">

                        </div>
                        <div class="card-body">
                             <h4 class="">{{ $cour->name }} </h4>
                             <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <ul style="" class="list-group">

                                        @if($cour->videoUri)
                                            <li class="list-group-item"><video controls style="width: 200px;"> <source src="{{ asset('videos/'.$cour->videoUri) }}" > </video></li>
                                        @endif
                                         @if($cour->audioUri)
                                            <li class="list-group-item"><audio controls style="width: 200px;" > <source src="{{ asset('podcasts/'.$cour->audioUri) }}" type="audio/mpeg"></audio></li>
                                        @endif
                                        @if($cour->pdfUri)
                                            <li class="list-group-item"><a href="/read-pdf/{{ $cour->pdfUri }}"><i class="fa fa-file-pdf"></i> Consulter le fichier</a></li>
                                        @endif

                                     </ul>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <fieldset>
                                        <legend>Description</legend>
                                        <p><?= $cour->description ?></p>
                                    </fieldset>
                                </div>
                             </div>

                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>