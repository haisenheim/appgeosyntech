<div class="card">
    <div class="card-header">
        <h4>LISTES DE MODULES</h4>
        <span class="pull-right"><a class="btn btn-outline-info btn-xs" href="#" data-toggle="modal" data-target="#moduleAdd"><i class="fa fa-plus-circle"></i></a></span>
    </div>
    <div>
        <ul class="list" style="list-style-type: upper-roman;">
            @foreach($formation->modules as $module)
                <li style="margin-top: 10px">{{ $module->name }}    -   <span>Prix en ligne: <b>{{ number_format($module->prix_ligne,0,',','.') }}</b> </span>   -   <span>Prix en presentiel: <b>{{ number_format($module->prix_presentiel,0,',','.') }}</b></span>
                     <ul class="list-inline pull-right">
                        <li class="list-inline-item"><a class="btn btn-xs btn-info" href="show-module/{{$module->token}}" ><i class="fa fa-search"></i></a></li>
                        <li class="list-inline-item"><a class="btn btn-xs btn-success" href="" data-toggle="modal" data-target="#moduleEdit"><i class="fa fa-edit"></i></a></li>
                     </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>