@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        
        <div class="d-flex align-items-end flex-wrap">
            <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Tableau de bord&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Categoies</p>
            </div>
        </div>


        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Striped Table</h4>
                <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Nom
                        </th>
                        <th>
                          Image
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Sous catégorie(s)
                        </th>
                        <th>
                          Actions
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                        <tr>
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td class="py-1">
                          @if ($category->picture)
                          <img src="{{ $category->picture }}" alt="image"/>
                          @else
                          <img src="{{ asset('assets/images/no_image.jpg') }}" alt="image"/>
                          @endif
                        </td>
                        <td>
                          {!! ($category->status == '0') ? "<span class='text-danger'>inactive</span>" : "<span class='text-success'>active</span>" ; !!}
                        </td>
                        <td>
                          @foreach ($subcategories as $subcategory)
                            @if ($category->id == $subcategory->parent_id)
                              {{ $subcategory->name }}
                            @endif
                          @endforeach
                          
                        </td>
                        <td>
                          <div class="m-2">
                            <a href="{{ route('admin.category.edit', $category->slug) }}"><i class="mdi mdi-pencil-box menu-icon"></i></a>
                            <a href=""><i class="mdi mdi-delete menu-icon text-danger"></i></a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
@endsection