@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        
        <div class="d-flex align-items-end flex-wrap">
            <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Tableau de bord&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Categorie&nbsp;/&nbsp;{{ $category->name }}</p>
            </div>
        </div>


        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Modifier {{ $category->name }}</h4>
                    <p class="card-description">
                        Veuillez remplir tout les champs ayant <span class="text-warning">(*)</span>
                    </p>
                    <form class="forms-sample" method="POST" action="{{ route('admin.category.update', $category) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="d-flex">
                            <div class="form-group col-md-6 mr-5">
                                <label for="name">Nom <span class="text-warning">(*)</span></label>
                                <input type="text" class="form-control" value="{{ $category->name }}" name="name" id="name" placeholder="Nom" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="slug">Slug <span class="text-warning">(*)</span></label>
                                <input type="text" class="form-control" value="{{ $category->slug }}" id="slug" name="slug" placeholder="Slug" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description <span class="text-warning">(*)</span></label>
                            <textarea type="text" class="form-control" id="description" name="description" rows="3" required>{{ $category->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Picture</label>
                            <input type="file" name="picture" class="form-control">
                            @if ($category->picture)
                                <img src="{{ asset($category->picture) }}" alt="" width="100" height="100" class="mt-5">
                                @else                        
                                Aucune image
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Sous Catégorie(s)</label>
                            @include('admin.category.subcategory.index')
                        </div>
                        <div class="d-flex">
                            <div class="form-group col-md-6 mr-5">
                                <label for="metatitle">Meta Titre <span class="text-warning">(*)</span></label>
                                <input type="text" class="form-control" value="{{ $category->meta_title }}" name="metatitle" id="metatitle" placeholder="metatitle" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="metakeyword">Meta Mots clé <span class="text-warning">(*)</span></label>
                                <input type="text" class="form-control" value="{{ $category->meta_keyword }}" id="metakeyword" name="metakeyword" placeholder="meta mots clé" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="metadescription">Meta Description <span class="text-warning">(*)</span></label>
                            <textarea type="text" class="form-control" id="metadescription" name="metadescription" rows="3" required>{{ $category->meta_description }}</textarea>
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