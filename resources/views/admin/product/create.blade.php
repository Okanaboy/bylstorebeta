@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        
        <div class="d-flex align-items-end flex-wrap">
            <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Tableau de bord&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Produit&nbsp;/&nbsp;Ajouter</p>
            </div>
        </div>


        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nouveau produit</h4>
                    
                    <div class="card">
                        <div class="card-body p-5">
                          {{-- @livewire('multipartformproduct', []) --}}
                          @livewire('multipartformproduct', ['categories' => $categories])
                        </div>
                      </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection