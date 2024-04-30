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

    public $category;
    #[Validate]
    public $name;
    #[Validate]
    public $description;
    #[Validate]
    public $image;
    public $oldImage;

    public function mount($category)
    {
        // Fetch the category details from the database and populate the properties
        $this->category = Category::findOrFail($category);
        $this->name = $this->category->name;
        $this->description = $this->category->description;
        // Set the initial value of the old image
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

        // Update category details
        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        // Check if a new image is uploaded
        if ($this->image) {
            // Delete old image if exists
            if ($this->category->image) {
                // Delete old image from storage
                Storage::delete('public/images/' . $this->category->image);
            }
            // Upload new image
            $imageName = time() . '-' . $this->image->getClientOriginalName();
            $this->image->storeAs('public/images', $imageName);

            // Update category with new image
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
