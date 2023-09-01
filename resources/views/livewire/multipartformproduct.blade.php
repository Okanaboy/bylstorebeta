<div>
   
@if(!empty($successMessage))
<div class="alert alert-success">
   {{ $successMessage }}
</div>
@endif
  
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Categories & Marques</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>A Propos du Produit</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}">3</a>
                <p>Options</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">4</a>
                <p>Validation</p>
            </div>
        </div>
    </div>
  
    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="my-5 text-center">
                    <h1 class="p-5"> 
                        @if ($currentStepChild == 1)
                            Categorie
                        @elseif($currentStepChild == 2)
                            Sous Catégorie
                        @elseif($currentStepChild == 3)
                            Voulez vous choisir une <div class="text-warning">Marque</div> ?
                        @endif
                    </h1>
                </div>

                <div class="row setup-content-child m-5 {{ $currentStepChild != 1 ? 'displayNone' : '' }}" id="stepchild-1">
                    <div id="radios" class="text-center mb-5">
                        @foreach ($categories as $category)
                        <label for="{{ $category->name }}" class="material-icons">
                            <input type="radio" name="category" id="{{ $category->name }}" value="{{ $category->id }}"
                            wire:click="categoryChoosen({{$category->id}})" required>
                            @if ($category->picture)
                                <span><img src="{{ $category->picture }}" alt="" width="50" height="50"></span>
                            @else
                                <span>{{ $category->name }}</span>
                            @endif
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="row setup-content-child {{ $currentStepChild != 2 ? 'displayNone' : '' }}" id="stepchild-2">
                    <div id="radios" class="text-center mb-5">
                        @if ($subCategories)
                            @foreach ($subCategories as $subCategory)
                            <label for="{{ $subCategory->name }}" class="material-icons">
                                <input type="radio" name="subCategory_id" 
                                wire:model="subCategory_id" id="{{ $subCategory->name }}" value="{{ $subCategory->id }}"
                                wire:click="subCategoryChoosen({{$subCategory->id}})" required>
                                @if ($subCategory->picture)
                                    <span><img src="{{ $subCategory->picture }}" alt="" width="50" height="50"></span>
                                @else
                                    <span>{{ $subCategory->name }}</span>
                                @endif
                            </label>
                            @endforeach
                        @endif
                        
                    </div>
                </div>
                <div class="row setup-content-child {{ $currentStepChild != 3 ? 'displayNone' : '' }}" id="stepchild-3">
                    <div id="radios" class="text-center mb-5">
                        @if ($brands)
                            @foreach ($brands as $brand)
                            <label for="{{ $brand->name }}" class="material-icons">
                                <input type="radio" name="brand_id" id="{{ $brand->name }}" value="{{ $brand->id }}"
                                wire:click="firstStepSubmit"
                                wire:model="brand_id">
                                @if ($brand->picture)
                                    <span><img src="{{ $brand->picture }}" alt="" width="50" height="50"></span>
                                @else
                                    <span>{{ $brand->name }}</span>
                                @endif
                            </label>
                            @endforeach  
                        @endif
                        
                    </div>
                </div>
                
                @if ($currentStepChild > 1)
                    <button class="btn btn-warning pull-right" wire:click="back({{ $currentStepChild }})" type="button" ><i class="mdi mdi-keyboard-backspace"></i>Précédant</button>
                @endif

                @if ($currentStepChild === 3)
                    <button class="btn btn-primary pull-right float-end" wire:click="firstStepSubmit" type="button" >Suivant<i class="mdi mdi-trending-neutral"></i></button>
                @endif
            </div>
        </div>
    </div>
    
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="my-5 text-center">
                    <h1 class="p-5"> 
                        A Propos du Produit
                    </h1>
                </div>

                <div class="d-flex">
                    <div class="form-group col-md-6 me-5">
                        <label for="name"> Nom du Produit <span class="text-warning">(*)</span></label>
                        <input type="text" class="form-control" wire:model="name" name="name" id="name" placeholder="Nom" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="slug"> Slug <span class="text-warning">(*)</span></label>
                        <input type="text" class="form-control" wire:model="slug" id="slug" name="slug" placeholder="Slug" required>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group col-md-6 me-5">
                        <label for="sku"> SKU <span class="text-warning">(*)</span></label>
                        <input type="text" class="form-control" wire:model="sku" name="sku" id="sku" placeholder="Code SKU">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="quantity"> Quantité <span class="text-warning">(*)</span></label>
                        <input type="number" class="form-control" wire:model="quantity" id="quantity" name="quantity" placeholder="Quantité" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="smallDescription"> Petite Description <span class="text-warning">(*)</span></label>
                    <textarea type="text" class="form-control" wire:model="smallDescription" id="smallDescription" name="smallDescription" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label for="longDescription"> Longue Description <span class="text-warning">(*)</span></label>
                    <textarea type="text" class="form-control" wire:model="longDescription" id="longDescription" name="longDescription" rows="4" required></textarea>
                </div>
                <div class="d-flex">
                    <div class="form-group col-md-6 me-5">
                        <label for="originalPrice"> Prix de base <span class="text-warning">(*)</span></label>
                        <input type="number" class="form-control"  wire:model="originalPrice" name="originalPrice" id="originalPrice" placeholder="7000" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Prix <span class="text-warning">(*)</span></label>
                        <input type="number" class="form-control" wire:model="price" id="price" name="price" placeholder="6000" required>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="form-group col-md-6 me-5">
                        <label for="metatitle">Meta Titre <span class="text-warning">(*)</span></label>
                        <input type="text" class="form-control" wire:model="metatitle" name="metatitle" id="metatitle" placeholder="metatitle" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="metakeyword">Meta Mots clé <span class="text-warning">(*)</span></label>
                        <input type="text" class="form-control" wire:model="metakeyword" id="metakeyword" name="metakeyword" placeholder="meta mots clé" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="metadescription">Meta Description <span class="text-warning">(*)</span></label>
                    <textarea type="text" class="form-control" wire:model="metadescription" id="metadescription" name="metadescription" rows="3" required></textarea>
                </div>
  
                <div class="form-group m-5">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" wire:model.live="status" id="status">
                        <label class="form-check-label" for="status">Status: {{ ($status == 0) ? 'inactive' : 'active'}}</label>
                    </div>
                </div>
                <div class="form-group col-md-6 my-5">
                    <label for="discount"> Réduction </label>
                    <input type="number" class="form-control" wire:model="discount" name="discount" id="discount" placeholder="20" min="1" max="99">
                </div>
                @if ($currentStep > 1)
                <button class="btn btn-warning pull-right" wire:click="back({{ $currentStep }})" type="button" ><i class="mdi mdi-keyboard-backspace"></i>Précédant</button>
                @endif
                <button class="btn btn-primary pull-right float-end" wire:click="secondStepSubmit" type="button" >Suivant<i class="mdi mdi-trending-neutral"></i></button>
            </div>
        </div>
    </div>
    
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="my-5 text-center">
                    <h1 class="p-5"> 
                        Options
                    </h1>
                </div>
  
                <div class="form-group">
                    <label for="description">Product Status</label><br/>
                    <label class="radio-inline"><input type="radio" wire:model="status" value="1" {{{ $status == '1' ? "checked" : "" }}}> Active</label>
                    <label class="radio-inline"><input type="radio" wire:model="status" value="0" {{{ $status == '0' ? "checked" : "" }}}> DeActive</label>
                    @error('status') <span class="error">{{ $message }}</span> @enderror
                </div>
  
                <div class="form-group">
                    <label for="description">Product Stock</label>
                    <input type="text" wire:model="quantity" class="form-control" id="productAmount"/>
                    @error('quantity') <span class="error">{{ $message }}</span> @enderror
                </div>
  
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Next</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Back</button>
            </div>
        </div>
    </div>

    {{--
    <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Validation</h3>
  
                <table class="table">
                    <tr>
                        <td>Product Name:</td>
                        <td><strong>{{$name}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Amount:</td>
                        <td><strong>{{$amount}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product status:</td>
                        <td><strong>{{$status ? 'Active' : 'DeActive'}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Description:</td>
                        <td><strong>{{$description}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Stock:</td>
                        <td><strong>{{$stock}}</strong></td>
                    </tr>
                </table>
  
                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Back</button>
            </div>
        </div>
    </div> --}}
</div>