@extends('......layouts.admin')

@section('content')
    <div class="md-container">
        <div class="widget">
            <div class="widget-header">
                <h5 class="">NOUVELLE VILLE</h5>
            </div>
            <div class="widget-content">
                <form class="form" action="{{route('admin.villes.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name" class="control-label">NOM DE LA VILLE</label>
                        <input type="text" name="name" id="name" class="form-control"/>
                    </div>
                    <div>
                        <label for="pay_id">PAYS</label>
                        <select class="form-control" name="pay_id" id="pay_id">
                            <option value="0">SELECTIONNER UN PAYS</option>
                            @foreach($pays as $p)
                            <option value='{!! $p->id !!}'>{{$p->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <button class="btn btn-block btn-success btn-sm"><i class="fa fa-save"></i> ENREGISTRER</button>
                    </div>
                </form>
            </div>
        </div>


    </div>


@endsection