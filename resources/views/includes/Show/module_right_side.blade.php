<link href="{{ asset('css/video-js.css') }}" rel="stylesheet">
<div class="card">
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

                                            <video  id="example_video_1" style="width: 99%; height: 200px" class="video-js vjs-default-skin vjs-big-play-centered"
                                                       controls preload="auto">
                                                    <source src="{{url('/load-video/'.$cour->videoUri)}}" />
                                            </video>

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