@extends('......layouts.admin')

@section('content')
    <div class="md-container">
        <div class="widget">
            <div class="widget-header">
                <h5 class="">LISTE DES VILLES</h5>
            </div>
            <div class="widget-content">
                 <table class="table table-bordered table-hover table-condensed">
                                <thead>
                      <tr>
                          <th>NOM</th>
                          <th>PAYS</th>
                          <th><a class="btn btn-xs btn-success" href="{{route('admin.villes.create')}}"><i class="fa fa-plus-circle"></i></a></th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($villes as $ville)
                          <tr>
                              <td>{!! $ville->name !!} </td>
                              <td>{!! $ville->pay?$ville->pay->nom:'-' !!}</td>
                              <td>
                              <ul class="list-inline">
                                <li class="list-inline-item"><a class="btn btn-primary btn-xs" href="{{route('admin.villes.show',[$ville->id])}}"><i class="fa fa-search"></i></a></li>
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