@extends('......layouts.admin')

@section('content')
    <div class="md-container">
        <div class="widget">
            <div class="widget-header">
                <h5 class=""><i class="fa fa-group"></i> LISTE DES INVESTISSEURS</h5>
            </div>
            <div class="widget-content">
                 <table class="table table-bordered table-hover table-condensed">
                                <thead>
                      <tr>
                          <th>NOM</th>
                          <th>PRENOM</th>
                          <th>ADRESSE</th>
                          <th>TELEPHONE</th>
                          <th>EMAIL</th>
                          <th>ROLE</th>
                          <th><a class="btn btn-xs btn-success" href="{{route('admin.angels.create')}}"><i class="fa fa-plus-circle"></i></a></th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                          <tr>
                              <td>{!! $user->last_name !!} </td>
                              <td>{!! $user->first_name !!} </td>
                              <td>{!! $user->address !!} </td>
                              <td>{!! $user->phone !!} </td>
                              <td>{!! $user->email !!} </td>
                              <td>{!! $user->role?$user->role->nom:'' !!} </td>
                              <td>
                              <ul class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-primary btn-xs" href="{{route('admin.users.show',[$user->id])}}"><i class="fa fa-search"></i></a></li>
                              </ul>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                 </table>
            </div>
        </div>


    </div>


@endsection