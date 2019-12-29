<div class="card">
    <div class="card-header bg-info">
        <h3 class="card-title">{{ $formation->name  }}</h3>
    </div>
    <div class="card-body">
        <div style="width: 100%; height: 320px">
            <img src="{{ $formation->imageUri?asset('img/'.$formation->imageUri):'img/logo-obac.png' }}" style="height: 100%; width: 100%" alt=""/>
        </div>
        <div class="divider"></div>

        <ul>
            <li>MODULES : <span class="text-info text-bold">{{ $formation->modules->count() }}</span></li>
            <li>PRIX EN LIGNE: <span class="text-info text-bold">{{ number_format($formation->prix_ligne,0,',','.') }}</span></li>
            <li>PRIX EN PRESENTIEL: <span class="text-info text-bold">{{ number_format($formation->prix_presentiel,0,',','.') }}</span></li>
        </ul>
        <fieldset>
            <legend>CONTRIBUTEUR</legend>
            <ul>
                <li><b> {{ $formation->contributeur->name }} </b></li>
                <li>{{ $formation->contributeur->address }}</li>
                <li><i class="fa fa-mobile"></i> {{ $formation->contributeur->phone }}</li>
                <li><i class="fa fa-envelope"></i> {{ $formation->contributeur->email }}</li>
                <li><i class="fa fa-home"></i> {{ $formation->contributeur->pay?$formation->contributeur->pay->name:'-' }}</li>
            </ul>
        </fieldset>
    </div>

</div>