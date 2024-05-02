<div>
    <main id="main-container">


        <!-- Page Content -->
        <div class="content">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Categories</h3>

                    @if (auth()->user()->hasPermissionTo('create categories'))
                        <a href="{{ route('product.create') }}" class="btn btn-primary" wire:navigate>Add Product</a>
                        {{-- <button wire:click="openModal" class="btn btn-primary">Add Products</button> --}}
                    @endif

                </div>

                <div class="block-header block-header-default">

                    <button wire:click="export()">Export Data</button>
                </div>
                <div class="block-header block-header-default">

                    <input type="text" placeholder="search" wire:model.live="search">

                </div>

                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <div class="container">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action 5</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr wire:key="{{ $product->id }}">
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->date }}</td>
                                        <td><button class="btn {{ $product->status == 0 ? 'btn-success' : 'btn-danger' }}"
                                                data-toggle="tooltip" title="Change Status"
                                                wire:click="status({{$product->status}},{{$product->id}})"
                                                wire:confirm="Are you sure you want to Not-Active this product?">
                                                @if ($product->status == 0)
                                                    active
                                                @else
                                                    Not-active
                                                @endif
                                            </button></td>
                                        <td>{{ $product->description }}</td>
                                        <td><img src="{{ asset('storage/images/'.$product->image) }}" alt=""
                                                height="70px" width="70px"></td>
                                        <td><button wire:click="delete({{ $product->id }})"
                                                wire:confirm="Are you sure you want to delete this post?"><i
                                                    class="si si-trash"></i></button>
                                            <a href="{{route('product.edit',$product->id)}}" wire:navigate>edit</a>
                                            {{-- <button wire:click="openEdit({{ $product->id }})">edit</button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="py-4 px-3">
                            <div class="flex">
                                <div class="flex space-x-4 items-center mb-3">
                                    <label>Per Page</label>
                                    <select wire:model.live="perPage">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            {{ $products->links('livewire::bootstrap') }}
                        </div>
                    </div>

                </div>

                <!-- END Page Content -->
            </div>
    </main>

</div>
