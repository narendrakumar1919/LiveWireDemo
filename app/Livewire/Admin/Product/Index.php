<?php

namespace App\Livewire\Admin\Product;

use App\Exports\Admin\ProductExport;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public $perPage=10,$selectedCategory,$categoryId;
    public $search="";


    public function render()
    {
        $productModel=Product::search($this->search)->with('category')->paginate($this->perPage);
        return view('livewire.admin.product.index', [
            'products' => $productModel,
        ]);
    }

    public function status($status,$productId)
    {
        if($status==0){
           $updatedStatus=1;
           $productStatus= Product::findOrFail($productId);
           $productStatus->update(['status' => $updatedStatus]);
        }else{
            $updatedStatus=0;
            $productStatus= Product::findOrFail($productId);
            $productStatus->update(['status' => $updatedStatus]);
        }
    }

    public function delete($id){
        $product=Product::find($id);
        if($product){
           $product->delete();
        }
   }


   public function export()
   {
       $products = Product::search($this->search)->get();

       return Excel::download(new ProductExport($products), 'products.xlsx');
   }

}
