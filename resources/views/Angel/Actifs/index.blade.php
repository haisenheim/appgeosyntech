@extends('layouts.angel')

@section('content-header')
     <h3 style="font-weight: 800; margin-top: 50px; color: #FFFFFF; padding-bottom: 15px; border-bottom: solid #FFFFFF 1px;" class="page-header">CESSIONS D'ACTIFS</h3>
@endsection

@section('content')
    <div style="padding-top: 30px" class="container-fluid">

                <div class="row">
                    <?php $i=0; $colors=['danger','info','warning','primary','success'] ?>

                    @foreach($dossiers as $projet)


                     <div class="col-md-3 col-sm-12">


                    <!-- small card -->
                    <div class="small-box bg-{{ $colors[$i] }}">
                    <?php $i==5?$i=0:$i++ ?>
                      <div class="inner">
                        <h3>{{ $projet->prix }}<sup style="font-size: 20px">{{ $projet->devise->abb }}</sup></h3>

                        <p>{{ $projet->name }}</p>
                        <img src="{{ $projet->imageUri?asset('img/'.$projet->imageUri):asset('img/logo.png') }}" style="width: 100px; height: 100px; border-radius: 50px; position: absolute; top:15px; right: 10px"/>
                      </div>

                      <a data-target="#viewModal" data-toggle="modal" href="#" class="small-box-footer">
                        Je suis intéressé(e) <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>



                    </div>

                    @endforeach



                </div>
            </div>

@endsection

@section('action')

@endsection