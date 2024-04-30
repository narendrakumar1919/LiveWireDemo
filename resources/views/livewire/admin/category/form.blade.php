<div class="form-group row">
    <label class="col-lg-3 col-form-label" for="example-hf-password">Category Name</label>
    <div class="col-lg-7">
        {{-- {{ Form::text('category_name', null, ['class' => 'form-control', 'placeholder' => 'Category Name']) }} --}}
        <input type="text" class="form-control" name="name" placeholder="Category Name" wire:model.blur="name">
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-3 col-form-label" for="example-textarea-input">Description</label>
    <div class="col-lg-7">
        {{-- {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '6', 'placeholder' => 'Description']) }} --}}
        <textarea class="form-control" name="description" rows="6" placeholder="Description"
            wire:model.blur="description"></textarea>
        @if ($errors->has('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-3 col-form-label" for="example-textarea-input">Photo</label>
    <div class="col-lg-7">
        {{-- {{ Form::file('image', ['id' => 'selectImage','accept'=>'image/png,image/gif,image/JPEG,image/jpg']) }} --}}
        <input type="file" name="image" data-toggle="custom-file-input" wire:model.blur="image">
        @if (isset($category->image))
            <img src="{{ asset('storage/images/' . $oldImage) }}" alt="Old Image" class="mt-3"
                style="height:50px; width:50px;" />
        @endif
        {{-- <img id="preview" name='image' src="{{ request()->is('categories/create') ? asset('assets/media/avatars/avatar15.jpg') : asset('assets/media/photos/' . $edit->image) }}" alt="your image" class="mt-3" style="height:50px; width:50px;"/> --}}
        @if ($errors->has('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-9 ml-auto">

        {{-- {{ Form::submit('Submit', ['class' => 'btn btn-alt-primary']) }} --}}
    </div>
</div>
