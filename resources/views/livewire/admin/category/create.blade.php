<div>
    <main id="main-container">
        {{-- {{ Breadcrumbs::render('categories.create') }} --}}
        <!-- Page Content -->
        <div class="content">
            <div class="block">

                <div class="block-header block-header-default">
                    <h3 class="block-title">Category</h3>
                </div>
                <div class="block-content">
                    <form wire:submit="creates">
                    @include('livewire.admin.category.form')

                    <div class="form-group row">
                        <div class="col-lg-9 ml-auto">

                            {{-- {{ Form::submit('Submit', ['class' => 'btn btn-alt-primary']) }} --}}
                            <button type="submit" class="btn btn-alt-primary">Submit</button>

                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
 
</div>
