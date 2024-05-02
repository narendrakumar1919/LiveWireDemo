<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;
    protected $middleware = ['role:Admin'];
    public $category;
    #[Validate]
    public $name;
    #[Validate]
    public $description;
    #[Validate]
    public $image;
    public $oldImage;
    public $imagePreview;

    public function mount($category)
    {
        if (!auth()->user()->hasRole('Admin')) {
            abort(403, 'Unauthorized.');
        }
        $this->category = Category::findOrFail($category);
        $this->name = $this->category->name;
        $this->description = $this->category->description;
        $this->oldImage = $this->category->image;
    }

    protected $rules = [
        'name' => 'required|string|min:3|max:250',
        'description' => 'required|string|min:10|max:250',
        'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048'
    ];

    public function update()
    {
        $this->validate();

        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        if ($this->image) {
            // $this->imagePreview = $this->image->temporaryUrl();

            if ($this->category->image) {
                Storage::delete('public/images/' . $this->category->image);
            }

            $imageName = time() . '-' . $this->image->getClientOriginalName();
            $this->image->storeAs('public/images', $imageName);

            $this->category->update(['image' => $imageName]);
        }

        session()->flash('success', 'Category successfully updated.');
        return $this->redirect('/admin/category/index', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}
