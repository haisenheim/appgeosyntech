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
                        <div class="card-header">
                             <h4 class="card-title">{{ $cour->name }} </h4>
                        </div>
                        <div class="card-body">
                             <ul style="" class="list-group">
                                @if($cour->pdfUri)
                                    <li class="list-group-item"><a href="/read-pdf/{{ $cour->pdfUri }}"><i class="fa fa-file-pdf"></i> Consulter le fichier</a></li>
                                @endif
                                @if($cour->audioUri)
                                    <li class="list-group-item"><audio controls style="width: 200px;" > <source src="{{ asset('podcasts/'.$cour->audioUri) }}" type="audio/mpeg"></audio></li>
                                @endif
                                @if($cour->videoUri)
                                    <li class="list-group-item"><video controls style="width: 200px;"> <source src="{{ asset('videos/'.$cour->videoUri) }}" > </video></li>
                                @endif
                             </ul>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>