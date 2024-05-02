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

                    @if(auth()->user()->hasPermissionTo('create categories'))
                    {{-- <a href="{{ route('category.create') }}" class="btn btn-primary" wire:navigate>Add Categories</a> --}}
                    <button wire:click="openModal" class="btn btn-primary">Add Categories</button>
                    @endif

                    @if($isOpen && auth()->user()->hasPermissionTo('create categories'))
                    <div class="modal" tabindex="-1" role="dialog" style="display: block; background-color: rgba(0, 0, 0, 0.5);">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="max-height: 530px; overflow-y: auto;">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <livewire:admin.category.create />
                            </div>
                        </div>
                    </div>
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
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action 5</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr wire:key="{{ $category->id }}">
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td><img src="{{ asset('storage/images/' . $category->image) }}" alt=""
                                                height="70px" width="70px"></td>
                                        <td><button wire:click="delete({{ $category->id }})"  wire:confirm="Are you sure you want to delete this post?"><i
                                            class="si si-trash"></i></button>
                                            {{-- <a href="{{route('category.edit',$category->id)}}" wire:navigate>edit</a> --}}
                                            <button wire:click="openEdit({{$category->id}})">edit</button>
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
                            {{ $categories->links('livewire::bootstrap') }}
                        </div>
                    </div>

                </div>

                <!-- END Page Content -->
            </div>
            @if($isEdit && auth()->user()->hasPermissionTo('create categories'))
            <div class="modal" tabindex="-1" role="dialog" style="display: block; background-color: rgba(0, 0, 0, 0.5);">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="max-height: 530px; overflow-y: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeEdit">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <livewire:admin.category.edit :category="$categoryId" />
                    </div>
                </div>
            </div>
            @endif
    </main>

</div>

