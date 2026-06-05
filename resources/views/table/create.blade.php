<x-layout.admin-layout>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Add Table Information</h4>
            <div class="text-right">
                <a href="{{ route('table.index') }}" class="btn btn-outline-secondary me-1">
                    &larr; Back
                </a>

            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('table.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Table Number</label>
                    <input name="table_number" type="text" class="form-control" placeholder="eg. Table 1">
                </div>
                <div class="form-group">
                    <label>Table capacity</label>
                    <input name="capacity" type="number" class="form-control">
                </div>

                <div class="form-group">
                    <label>status</label>
                    <select name="status" class="form-control select2">
                        <option value="available">Available</option>
                        <option value="occupied">Occupied</option>
                        <option value="reserved">Reserved</option>
                    </select>
                </div>


                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Save</button>

                </div>
            </form>

        </div>
    </div>
</x-layout.admin-layout>
