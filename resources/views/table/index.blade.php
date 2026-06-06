<x-layout.admin-layout>

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Table Info</h4>
                <div class="text-right">
                    <a href="{{ route('table.create') }}" class="btn btn-success mr-1" type="submit">+ Add Table</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Table Number</th>
                            <th>Capacity</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($tables as $table)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $table->table_number }}</td>
                                <td>{{ $table->capacity }}</td>
                                <td>{{ $table->created_at->diffForHumans() }}</td>
                                <td>
                                    <select name="status" class="form-control select2 status-select"
                                        data-id="{{ $table->id }}">
                                        <option value="available"
                                            {{ $table->status === 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="occupied" {{ $table->status === 'occupied' ? 'selected' : '' }}>
                                            Occupied</option>
                                        <option value="reserved" {{ $table->status === 'reserved' ? 'selected' : '' }}>
                                            Reserved</option>
                                    </select>



                                </td>

                                <td class="d-flex gap-2">
                                    <a href="{{ route('table.edit', $table->id) }}"
                                        class="btn btn-primary mr-2">Edit</a>
                                    <form action="{{ route('table.destroy', $table->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        {{-- sweet alert button --}}
                                        {{-- <button class="btn btn-danger" id="swal-6" type="submit">Delete</button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>

            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <!-- Laravel will automatically render the <ul> and <li> tags here -->
                    {{ $tables->links() }}
                </nav>
            </div>

        </div>
    </div>

    <script>
        // js code to update the table status
        document.querySelectorAll('.status-select').forEach(select => {
            select.addEventListener('change', async function() {
                const tableId = this.getAttribute('data-id');
                const statusValue = this.value;

                try {
                    const response = await fetch(`/table/${tableId}/status`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-token': '{{ csrf_token() }}'

                        },
                        body: JSON.stringify({
                            status: statusValue
                        }),
                    });
                    if (!response.ok) {
                        throw new Error('Network Error')
                    }
                    const data = await response.json();

                    alert(data.message);


                } catch (error) {
                    alert(error);

                }



            });
        });
    </script>
</x-layout.admin-layout>
