<div style="max-height: 240px; max-width: 300px">
    @if($projet->imageUri)
        <img class="img-thumbnail" src="{{asset('img/'.$projet->imageUri)}}" alt=""/>
        <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i></a>
    @else
         <img class="img-thumbnail" src="{{asset('img/logo-obac.png')}}" alt=""/>
         <a data-toggle="modal" data-target="#uploadImgModal" href="" title="modifier l'image"><i class="fa fa-pencil"></i></a>
    @endif
</div>
<h3 class="text-primary"> {{$projet->name}}</h3>
@if($projet->modele)
  <button data-target="#meModal" data-toggle="modal" class="btn btn-sm btn-block btn-outline-success">Modèle économique</button>
@endif
<br>
<div class="text-muted">
  <p class="text-sm">Porteur de projet:
    <b class="d-block">{{$projet->owner->name}}</b>
    <b class="d-block"><i class="far fa-fw fa-envelope"></i> {{$projet->owner->email}}</b>
    <b class="d-block"><i class="far fa-fw fa-telegram"></i> {{$projet->owner->phone}}</b>
  </p>
  <p class="text-sm">Consultant
     @if($projet->consultant)
     </p>
     <p class="text-sm">
     <b class="d-block">{{$projet->consultant->name}}</b>
         <b class="d-block"><i class="far fa-fw fa-envelope"></i> {{$projet->consultant->email}}</b>
     </p>
     @else
                  <form class="form-inline"  action="/national/projet/expert">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{ $projet->id }}"/>
                      <div class="form-group">
                          <select class="form-control" name="expert_id" id="id">
                              @foreach($experts as $expert)
                                  <option value="{{ $expert->id }}">{{ $expert->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-danger"><i class="fa fa-link"></i> LIER</button>
                      </div>
                  </form>

       @endif
</div>