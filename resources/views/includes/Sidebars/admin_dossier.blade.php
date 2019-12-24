<div id="" class="card">
    <div class="card-body">
        <div style="max-height: 95%; max-width: 360px">
    @if($projet->imageUri)
        <img style="height: 340px; width: 99%" class="img-thumbnail" src="{{asset('img/'.$projet->imageUri)}}" alt=""/>
        <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i></a>
    @else
         <img style="height: 340px; width: 100%" class="img-thumbnail" src="{{asset('img/logo-obac.png')}}" alt=""/>
         <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i></a>
    @endif
</div>
<h3 class="text-bold text-success" style="text-transform: capitalize;"> {{$projet->name}}</h3>
<hr/>
@if($projet->modele)
  <button data-target="#meModal" data-toggle="modal" class="btn btn-sm btn-block btn-outline-success">Modèle économique</button>
@endif

@if($projet->investissements->count()>=1)
    <button data-target="#angelsModal" data-toggle="modal" class="btn btn-sm btn-block btn-outline-danger"><i class="fa fa-users"></i> Potentiels investisseurs</button>
@endif

@if($projet->synthese_diagnostic_interne)
    <button data-target="#synDiagIntModal" data-toggle="modal" class="btn btn-sm btn-block btn-outline-warning">SYNTHESE DIAGNOSTIC INTERNE</button>
@endif

@if($projet->synthese_diagnostic_externe)
    <button data-target="#synDiagExtModal" data-toggle="modal" class="btn btn-sm btn-block btn-outline-info"> SYNTHESE DIAGNOSTIC EXTERNE</button>
@endif

@if($projet->synthese_diagnostic_strategique)
    <button data-target="#synDiagStratModal" data-toggle="modal" class="btn btn-sm btn-block btn-outline-primary">SYNTHESE DIAGNOSTIC STRATEGIQUE</button>
@endif

@if($projet->teaser)
    <button data-target="#teaserModal" data-toggle="modal" class="btn btn-sm btn-block btn-outline-success">TEASER</button>
@endif
    <fieldset>
        <legend>PROMOTEUR</legend>
            <ul>
                <li style="font-size: larger"><b>{{$projet->owner->name}}</b></li>
                <li><i class="far fa-fw fa-envelope"></i> {{$projet->owner->email}}</li>
                <li><i class="fas fa-fw fa-mobile"></i> {{$projet->owner->phone}}</li>

            </ul>
    </fieldset>
     <fieldset>
            <legend>CONSULTANT</legend>
             @if($projet->expert_id>0)
                <ul>
                        <li style="font-size: larger"><b>{{$projet->consultant->name}}</b></li>
                        <li><i class="far fa-fw fa-envelope"></i> {{$projet->consultant->email}}</li>
                        <li><i class="fas fa-fw fa-mobile"></i> {{$projet->consultant->phone}}</li>
                        <li><i class="fas fa-fw fa-home"></i> {{$projet->consultant->agence?$projet->consultant->agence->name:'-'}}</li>
                 </ul>
             @else
                @if(\Illuminate\Support\Facades\Auth::user()->role_id==9)
                    @if($projet->bilans)

                        <?php $link= "/adminag/dossier/expert" ?>
                    @else
                        <?php $link= "/adminag/projet/expert" ?>
                    @endif
                    <form class=""  action="<?= $link ?>">
                     {{csrf_field()}}
                     <input type="hidden" name="id" value="{{ $projet->id }}"/>
                         <div class="form-group">
                              <label for="expert_id">AFFECTER A UN CONSULTANT</label>
                             <select class="form-control" name="expert_id" id="expert_id">
                                 @foreach($experts as $expert)
                                     <option value="{{ $expert->id }}">{{ $expert->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-link"></i> LIER</button>
                         </div>
                     </form>
                @endif
             @endif
        </fieldset>

    </div>
</div>


