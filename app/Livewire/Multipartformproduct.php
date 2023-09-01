<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;

class Multipartformproduct extends Component
{

    //models
    public $brands;
    public $categories;
    public $subCategories;
    //end models

    public $currentStep = 1;
    public $currentStepChild = 1;

    public $name, $slug, $smallDescription, $longDescription, $sku, $originalPrice, $price;
    public $quantity = 1, $discount = null, $brand_id = null, $weight, $trending = false, $status = 0;
    public $subCategory_id, $metatitle, $metakeyword, $metadescription;

    public $successMessage = '';

    public function mount($categories)
    {
        $this->categories = $categories;
    }

    public function categoryChoosen(int $id)
    {
        $this->subCategories = Category::where('parent_id', $id)->get();

        $this->currentStepChild = 2;
    }

    public function subCategoryChoosen(int $id)
    {
        $this->brands = Brand::where('category_id', $id)->get();

        $this->currentStepChild = 3;
    }

    public function render()
    {
        return view('livewire.multipartformproduct');
    }

    public function back(int $currentStepChild)
    {
        $this->currentStepChild = $currentStepChild - 1;
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'subCategory_id' => 'required',
            'brand_id' => 'nullable',
        ]);
 
        $this->currentStep = 2;
    }
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'subCategory_id' => 'required',
            'brand_id' => 'nullable',
        ]);
 
        $this->currentStep = 3;
    }

    // public function updated()
    // {
    //     $this->status;
    // }
}
