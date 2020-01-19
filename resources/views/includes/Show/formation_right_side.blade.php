<?php
    use Illuminate\Support\Facades\Auth;

    $id = Auth::user()->role_id;
    $i = Auth::user()->id;
    $link = '';
    if($id==1){
        $link='admin';
    }
    if($id==7){
            $link='contributeur';
    }

    if($id==2){
            $link='national';
    }
    if($id==6){
            $link='consultant';
    }

    if($id==5){
           $link='corporate';
    }

    if($id==3){
            $link='adminag';
    }

    if($id==10){
           $link='member';
    }

    if($id==9){
        $link='mcp';
    }

    if($id==8){
       $link='mch';
    }

    $canseetest=false;
    if(in_array($id,[1,2,3,6,7])){
        $canseetest=true;
    }

    $canshow = false;
    if(in_array($id,[1,2,3,6,7])){
        $canseetest=true;
    }
 ?>

<div style="margin-top: 15px" class="card">
    <div class="card-header">
        <h4>LISTES DE MODULES</h4>
        <?php if($formation->owner_id == Auth::user()->id): ?>
        <span class="pull-right"><a class="btn btn-outline-info btn-xs" href="#" data-toggle="modal" data-target="#moduleAdd"><i class="fa fa-plus-circle"></i></a></span>
        <?php endif ?>
    </div>
    <div>
        <ul class="list" style="list-style-type: upper-roman;">
            @foreach($formation->modules as $module)
                <li style="margin-top: 10px">{{ $module->name }}    -   <span>Prix en ligne: <b>{{ number_format($module->prix_ligne,0,',','.') }}</b> </span>   -   <span>Prix en presentiel: <b>{{ number_format($module->prix_presentiel,0,',','.') }}</b></span>
                     <ul class="list-inline pull-right">
                        <?php if($canshow): ?>
                            <li class="list-inline-item"><a class="btn btn-xs btn-info" href="/{{$link}}/show-module/{{$module->token}}" ><i class="fa fa-search"></i></a></li>
                        <?php endif; ?>
                        <?php if($formation->owner_id == Auth::user()->id): ?>
                            <li class="list-inline-item"><a class="btn btn-xs btn-success" href="" data-toggle="modal" data-target="#moduleEdit"><i class="fa fa-edit"></i></a></li>
                          <?php endif ?>
                        @if($canseetest)
                             <li class="list-inline-item"><a class="btn btn-xs btn-danger" href="/{{$link}}/module/test/{{ $module->token }}" ><i class="fa fa-edit"></i></a></li>
                        @endif
                     </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>