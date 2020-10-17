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
                                <label for="name">CATEGORIES</label>
                                <select required class="form-control" name="category_id" id="name">
                                    <option class="text-danger" value="">CATEGORIE</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>

                    <fieldset>

                        <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                    <label for="name">Longueur</label>
                                    <input class="form-control" name="longueur" value="{{ $article->longueur }}" type="text" placeholder="longueur"/>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                <label for="name">Largeur</label>
                                    <input class="form-control" name="largeur" type="text" value="{{ $article->largeur }}" placeholder="largeur"/>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                <label for="name">Diametre</label>
                                    <input class="form-control" name="diametre" type="text" value="{{ $article->diametre }}"/>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                <label for="name">Poids U.</label>
                                    <input class="form-control" name="poids" type="text" value="{{ $article->poids }}"/>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                <label for="name">Volume</label>
                                    <input class="form-control" name="volume" type="text" value="{{ $article->volume }}" />
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                <label for="name">CODE HS</label>
                                    <input class="form-control" name="code_hs" type="text" value="{{ $article->coe_hs }}" />
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-12">
                                <div class="form-group">
                                <label for="name">TAUX DDI</label>
                                    <input class="form-control" name="taux_ddi" type="text" value="{{ $article->taux_ddi }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                <label for="name">Description Fr.</label>
                                   <textarea class="form-control" name="description" id="description" cols="30" rows="3">{{ $article->description }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                <label for="name">Description En.</label>
                                   <textarea class="form-control" name="description_en" id="description_en" cols="30" rows="3">{{ $article->description_en }}</textarea>
                                </div>
                            </div>

                        </div>
                    </fieldset>

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
