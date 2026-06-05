<x-layout.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Edit Table Information</h4>
            <div class="text-right">
                <a href="{{ route('table.index') }}" class="btn btn-outline-secondary me-1">
                    &larr; Back
                </a>

            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('table.update', $table->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Table Number</label>
                    <input name="table_number" type="text" class="form-control" placeholder="eg. Table 1"
                        value="{{ old('table_number', $table->table_number) }}">
                </div>
                <div class="form-group">
                    <label>Table capacity</label>
                    <input name="capacity" type="number" class="form-control"
                        value="{{ old('capacity', $table->capacity) }}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control select2">
                        <option value="available" {{old('status',$table->status)==="available"?'selected':''}} >Available
                        </option>
                        <option value="occupied" {{old('status',$table->status)==="occupied"?'selected':''}}>Occupied</option>
                        <option value="reserved" {{old('status',$table->status)==="reserved"?'selected':''}}>Reserved</option>
                    </select>
                </div>



                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Update</button>

                </div>
            </form>

        </div>
    </div>
</x-layout.admin-layout>
