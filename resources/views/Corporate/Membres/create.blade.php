@extends('......layouts.admin')

@section('content')
    <div class="md-container">
        <div class="widget">
            <div class="widget-header">
                <h5 class=""><i class="fa fa-user"></i> NOUVEL UTILISATEUR</h5>
            </div>
            <div class="widget-content">
                <form enctype="multipart/form-data" class="form" action="{{route('admin.users.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">

                    <div class="col-sm-4 col-sm-12 form-group">
                        <label for="name" class="control-label">NOM</label>
                        <input type="text" name="last_name" id="name" class="form-control"/>
                    </div>
                    <div class="form-group col-sm-12 col-md-5">
                       <label for="name" class="control-label">PRENOM</label>
                       <input type="text" name="first_name" id="name" class="form-control"/>
                     </div>
                     <div style="" class="col-sm-12 col-md-3">
                     <ul style="margin-top: 30px" class="list-inline">
                        <li class="list-inline-item">
                            <label style="" for="male"> UTILISATEUR HOMME </label>
                        </li>
                        <li class="list-inline-item">
                            <input style="" type="checkbox" checked name="male" id="male" class="checkbox"/>
                        </li>
                     </ul>



                     </div>
                    </div>
                    <div class="row">
                     <div class="form-group col-sm-12 col-md-4">
                         <label for="name" class="control-label">ADRESSE</label>
                         <input type="text" name="address" id="name" class="form-control"/>
                     </div>
                     <div class="form-group col-sm-12 col-md-4">
                       <label for="name" class="control-label">TELEPHONE</label>
                       <input type="text" name="phone" id="name" class="form-control"/>
                     </div>
                     <div class="col-sm-12 col-md-4">
                         <label for="pay_id">PAYS DE RESIDENCE</label>
                         <select class="form-control" name="pay_id" id="pay_id">
                             <option value="0">SELECTIONNER UN PAYS</option>
                             @foreach($pays as $p)
                             <option value='{!! $p->id !!}'>{{$p->nom}}</option>
                             @endforeach
                         </select>
                     </div>
                     </div>
                     <div class="row">
                     <div class="col-md-3 col-sm-12 form-group">
                         <label for="name" class="control-label">EMAIL</label>
                         <input type="text" name="email" id="name" class="form-control"/>
                     </div>
                     <div class="col-md-3">
                     <label for="password">MOT DE PASSE</label>
                     <input type="password" id="password" name="password" class="form-control"/>
                     </div>
                     <div class="col-md-3 col-sm-12">
                        <label for="cpassword">CONFIRMATION</label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword"/>
                     </div>

                    <div class="col-sm-12 col-md-3">
                        <label for="imageUri">PHOTO</label>
                        <input type="file" class="form-control" name="imageUri"/>
                     </div>
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