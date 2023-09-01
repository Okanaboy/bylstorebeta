@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        
        <div class="d-flex align-items-end flex-wrap">
            <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Tableau de bord&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Categorie&nbsp;/&nbsp;Ajouter</p>
            </div>
        </div>


        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nouvelle Categorie</h4>
                    <p class="card-description">
                    Veuillez remplir tout les champs ayant <span class="text-warning">(*)</span>
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex">
                            <div class="form-group col-md-6 mr-5">
                                <label for="name">Nom <span class="text-warning">(*)</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nom" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="slug">Slug <span class="text-warning">(*)</span></label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description <span class="text-warning">(*)</span></label>
                            <textarea type="text" class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Picture</label>
                            <input type="file" name="picture" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Catégorie Parent</label>
                            <select class="form-select" aria-label="Default select example" id="parent_id" name="parent_id">
                                <option selected value="NULL">Choisir le parent</option>  
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="d-flex">
                            <div class="form-group col-md-6 mr-5">
                                <label for="metatitle">Meta Titre <span class="text-warning">(*)</span></label>
                                <input type="text" class="form-control" name="metatitle" id="metatitle" placeholder="metatitle" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="metakeyword">Meta Mots clé <span class="text-warning">(*)</span></label>
                                <input type="text" class="form-control" id="metakeyword" name="metakeyword" placeholder="meta mots clé" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="metadescription">Meta Description <span class="text-warning">(*)</span></label>
                            <textarea type="text" class="form-control" id="metadescription" name="metadescription" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Enregister</button>
                        <a class="btn btn-light" href="/admin/categories">Retour</a>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection