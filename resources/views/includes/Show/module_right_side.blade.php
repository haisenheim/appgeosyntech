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

                                            <video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered"
                                                       controls preload="auto" height="300" width="490">

                                                    <source src="{{url('http://otc.test/load-video/89a489a8b7ea73fa0b4bf3e89b0862afaf5f1933.mp4')}}" />
                                            </video>


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