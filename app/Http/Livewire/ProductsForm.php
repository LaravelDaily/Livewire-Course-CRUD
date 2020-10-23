<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsForm extends Component
{
    use WithFileUploads;

    public $categories;
    public Product $product;
    public $productCategories;
    public $photo;

    protected $rules = [
        'product.name' => 'required|min:5',
        'product.description' => 'required|max:500',
        'product.color' => 'string',
        'product.in_stock' => 'boolean',
        'product.stock_date' => 'date',
        'productCategories' => 'required|array',
        'photo' => 'image',
    ];

    protected $validationAttributes = [
        'productCategories' => 'Categories'
    ];

    public function mount(Product $product)
    {
        $this->categories = Category::all();
        $this->product = $product ?? new Product();
        $this->productCategories = $this->product->categories()->pluck('id');
    }

    public function render()
    {
        return view('livewire.products-form');
    }

    public function save()
    {
        $this->validate();

        $filename = $this->photo->store('products', 'public');
        $this->product->photo = $filename;

        $this->product->save();
        $this->product->categories()->sync($this->productCategories);

        return redirect()->route('products.index');
    }

    public function updatedProductName()
    {
        $this->validateOnly('product.name');
    }
}
