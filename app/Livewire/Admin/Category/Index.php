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

    public $perPage=10;
    public $search="";
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
