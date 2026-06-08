<x-layout.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Add menu Information</h4>
            <div class="text-right">
                <a href="{{ route('menu.index') }}" class="btn btn-outline-secondary me-1">
                    &larr; Back
                </a>

            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name </label>
                    <input name="name" type="text" class="form-control" placeholder="eg. Burger">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Select the Category</label>
                    <select name="category_id" class="form-control select2" required>
                        <option value="" disabled selected>-- Choose a Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input name="price" type="number" class="form-control">
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="summernote"> {{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input name="image" type="file" class="form-control">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <!-- Label for the field -->
                    <label for="isAvailableToggle">Availability Status</label>

                    <!-- Bootstrap Toggle Switch Container -->
                    <div class="custom-control custom-switch">
                        <!-- Hidden input ensures a '0' is sent if the checkbox is unchecked -->
                        <input type="hidden" name="is_available" value="0">

                        <input type="checkbox" name="is_available" value="1" class="custom-control-input"
                            id="isAvailableToggle" checked>
                        <label class="custom-control-label" for="isAvailableToggle">Available</label>
                        @error('is_available')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>




                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Save</button>

                </div>
            </form>

        </div>
    </div>
</x-layout.admin-layout>
