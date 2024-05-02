<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    #[Validate]
    public $name;
    #[Validate]
    public $description;
    #[Validate]
    public $image;
    public $status=0;
    #[Validate]
    public $date;
    #[Validate]
    public $category_id;
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:250',
            'description' => 'required|string|min:10|max:250',
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'date'=>'required|date',
            'category_id'=>'required|exists:categories,id'
        ];
    }

    public function creates()
    {
        $this->validate();

        $imageName = time() . '-' . $this->image->getClientOriginalName();
        $this->image->storeAs('public/images', $imageName);

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'image' => $imageName,
            'status'=>$this->status,
            'category_id'=>$this->category_id,
            'date'=>$this->date
        ]);

        session()->flash('success', 'Product successfully created.');

        return $this->redirect('/admin/product/index', navigate: true);
    }
    public function render()
    {
        $categories=Category::pluck('name','id');
        return view('livewire.admin.product.create', [
            'categories' => $categories,
        ]);
    }
}
