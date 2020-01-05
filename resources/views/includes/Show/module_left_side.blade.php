<style>
    .pull-right{
        float: right;
        margin-right: 10px;
    }
</style>
<div class="card">
    <div class="card-header bg-info">
        <h3 class="card-title">{{ $module->name  }}</h3>
    </div>
    <div class="card-body">


        <ul>
            <li>COURS : <span class="text-info text-bold">{{ $module->cours->count() }}</span></li>
            <li>PRIX EN LIGNE: <span class="text-info text-bold">{{ number_format($module->prix_ligne,0,',','.') }}</span></li>
            <li>PRIX EN PRESENTIEL: <span class="text-info text-bold">{{ number_format($module->prix_presentiel,0,',','.') }}</span></li>
        </ul>
        <div class="divider"></div>
        <fieldset>
            <legend>Description</legend>
                <div style="max-height: 200px; overflow-y: scroll">
                    <p><?= $module->description ?></p>
                </div>
        </fieldset>

    </div>

</div>