<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    protected $middleware = ['role:Admin'];
    #[Validate]
    public $name;
    #[Validate]
    public $description;
    #[Validate]
    public $image;
    public function mount(){
        if (!auth()->user()->hasRole('Admin')) {
            abort(403, 'Unauthorized.');
        }
    }
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:250',
            'description' => 'required|string|min:10|max:250',
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048'
        ];
    }

    public function creates()
    {
        $this->validate();

        $imageName = time() . '-' . $this->image->getClientOriginalName();
        $this->image->storeAs('public/images', $imageName);

        Category::create([
            'name' => $this->name,
            'description' => $this->description,
            'image' => $imageName,
        ]);

        session()->flash('success', 'Category successfully created.');

        return $this->redirect('/admin/category/index', navigate: true);
    }
    public function render()
    {
        return view('livewire.admin.category.create');
    }
}
