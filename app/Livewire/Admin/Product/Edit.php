<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $product;
    #[Validate]
    public $name;
    #[Validate]
    public $description;
    #[Validate]
    public $image;
    public $oldImage;
    public $imagePreview;
    #[Validate]
    public $date;
    #[Validate]
    public $category_id;

    public function mount($product)
    {

        $this->product = Product::findOrFail($product);
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->date=$this->product->date;
        $this->category_id=$this->product->category_id;
        $this->oldImage = $this->product->image;
    }

    protected $rules = [
        'name' => 'required|string|min:3|max:250',
        'description' => 'required|string|min:10|max:250',
        'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        'date' => 'required|date',
        'category_id' => 'required|exists:categories,id'

    ];

    public function update()
    {
        $this->validate();

        $this->product->update([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'date' => $this->date
        ]);

        if ($this->image) {
            // $this->imagePreview = $this->image->temporaryUrl();

            if ($this->product->image) {
                Storage::delete('public/images/' . $this->product->image);
            }

            $imageName = time() . '-' . $this->image->getClientOriginalName();
            $this->image->storeAs('public/images', $imageName);

            $this->product->update(['image' => $imageName]);
        }

        session()->flash('success', 'product successfully updated.');
        return $this->redirect('/admin/product/index', navigate: true);
    }
    public function render()
    {
        $categories = Category::pluck('name', 'id');
        return view('livewire.admin.product.edit', [
            'categories' => $categories,
        ]);
    }
}
