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
            Marques
          </th>
          <th>
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($subcategories as $subcategory)
            <tr>
            <td>
                {{ $subcategory->id }}
            </td>
            <td>
                {{ $subcategory->name }}
            </td>
            <td class="py-1">
                @if ($subcategory->picture)
                <img src="{{ $subcategory->picture }}" alt="image"/>
                @else
                <img src="{{ asset('assets/images/no_image.jpg') }}" alt="image"/>
                @endif
            </td>
            <td>
                {!! ($subcategory->status == '0') ? "<span class='text-danger'>inactive</span>" : "<span class='text-success'>active</span>" ; !!}
            </td>
            <td>
                @foreach ($brands as $brand)
                   @if ($brand->category_id == $subcategory->id)
                   {{-- {{$subcategory->id}} --}}
                     <span class="m-1 p-1 rounded bg-dark text-white">{{ $brand->name }}</span>
                   @endif
                @endforeach
            </td>
            <td>
                <div class="m-2">
                <a href="{{ route('admin.category.edit', $subcategory->slug) }}"><i class="mdi mdi-pencil-box menu-icon"></i></a>
                <a href=""><i class="mdi mdi-delete menu-icon text-danger"></i></a>
                </div>
            </td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>