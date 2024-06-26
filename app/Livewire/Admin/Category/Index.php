<?php

namespace App\Livewire\Admin\Category;

use App\Exports\CategoriesExport;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class Index extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public $perPage=10,$selectedCategory,$categoryId;
    public $search="";
    public $isOpen = false;
    public $isEdit = false;


    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function openEdit($category)
    {
        $this->isEdit = true;
        // dd($category);
        $this->categoryId = $category;
    }

    public function closeEdit()
    {
        $this->isEdit = false;
    }
    public function render()
    {
        return view('livewire.admin.category.index', [
            'categories' => Category::search($this->search)->paginate($this->perPage),
        ]);

    }

    public function delete($id){
         $category=Category::find($id);
         if($category){
            $category->delete();
         }
    }


    public function export()
    {
        $categories = Category::search($this->search)->get();

        return Excel::download(new CategoriesExport($categories), 'categories.xlsx');
    }

}
