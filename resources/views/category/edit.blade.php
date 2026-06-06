<x-layout.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Add Category Information</h4>
            <div class="text-right">
                <a href="{{ route('category.index') }}" class="btn btn-outline-secondary me-1">
                    &larr; Back
                </a>

            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update',$category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Category Name</label>
                    <input name="name" type="text" class="form-control" placeholder="eg. Veg" value="{{old('name',$category->name)}}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="summernote">{{old('description',$category->description)}}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>

                <div class="form-group">
                    <label>status</label>
                    <select name="status" class="form-control select2">
                        <option value="active" {{old('status',$category->status)==='active'?"selected":''}}>Active</option>
                        <option value="inactive" {{old('status',$category->status)==='inactive'?"selected":''}}>Inactive</option>
                    </select>
                </div>


                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">update</button>

                </div>
            </form>

        </div>
    </div>
</x-layout.admin-layout>
