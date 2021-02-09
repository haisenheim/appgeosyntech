@extends('layouts.admin')


@section('page-title')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">CATALOGUE</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">GSM</a></li>
                        <li class="breadcrumb-item active">Catalogue</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container">
         <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Edition de : {{ $article->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/admin/articles/save" method="post">
                    {{csrf_field()}}
                    <input type="hidden" value="{{ $article->id }}" name="id"/>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">DESIGNATION</label>
                                <input type="text" value="{{ $article->name }}" id="name" class="form-control"/>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="name">TYPE</label>
                                <select required class="form-control" name="tproduit_id" id="name">
                                    <option class="text-danger" value="">TYPE</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="name">FOURNISSEUR</label>
                                <select required class="form-control" name="fournisseur_id" id="name">
                                    <option class="text-danger" value="">FOURNISSEUR</option>
                                    @foreach($fournisseurs as $fournisseur)
                                        <option value="{{ $fournisseur->id }}">{{ $fournisseur->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="name">FAMILLE</label>
                                <select required class="form-control" name="family_id" id="name">
                                    <option class="text-danger" value="">CATEGORIE</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-orange" type="submit">ENGREGISTRER</button>
                    </div>
                    </form>
                </div>
                <!-- /.card-body -->
              </div>

            </div>

            <!-- /.col -->
          </div>
    </div>

<style>
    .table th,
    .table td {
      padding: 0.35rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
  </style>

@endsection
