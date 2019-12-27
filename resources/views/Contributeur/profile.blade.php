@extends('...layouts.owner')

@section('content')
    <?php $user = \Illuminate\Support\Facades\Auth::user(); ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
            
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <img src="{{asset('img')}}/avatar.png" class="fa-2x fa-fw">
                </div>
            </div>
                 <p>{{ $user->name }}</p>
            </div>
        </div>

    </div>
@endsection