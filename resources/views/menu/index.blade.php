<x-layout.admin-layout>

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Menu Info</h4>
                <div class="text-right">
                    <a href="{{ route('menu.create') }}" class="btn btn-success mr-1" type="submit">+ Add Menu</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Menu Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>image</th>
                            <th>is_Available</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $menu->name }}</td>
                                <td> {{ $menu->price }}</td>
                                <td>{{ $menu->category->name }}</td>
                                <td>
                                    {{-- <img src="{{ asset($menu->image) }}" alt="{{ $menu->name }}"
                                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;"> --}}
                                    <img alt="{{ $menu->name }}" src="{{ asset($menu->image) }}"
                                        class="rounded-circle" width="35" data-toggle="tooltip"
                                        title="{{ $menu->name }}">
                                </td>

                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="is_available" value="1"
                                            onChange='toggleStatus(this,{{ $menu->id }})'
                                            class="custom-control-input menu-toggle" id="toggle-{{ $menu->id }}"
                                            data-id="{{ $menu->id }}" {{ $menu->is_available ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="toggle-{{ $menu->id }}">
                                            {{ $menu->is_available ? 'Available' : 'Unavailable' }}
                                        </label>
                                    </div>
                                </td>


                                <td> {{ $menu->description }}</td>


                                {{-- <td>
                                    <select name="status" class="form-control select2 status-select"
                                        data-id="{{ $menu->id }}">
                                        <option value="available"
                                            {{ $menu->status === 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="occupied" {{ $menu->status === 'occupied' ? 'selected' : '' }}>
                                            Occupied</option>
                                        <option value="reserved" {{ $menu->status === 'reserved' ? 'selected' : '' }}>
                                            Reserved</option>
                                    </select> --}}



                                {{-- </td> --}}

                                <td class="d-flex gap-2">
                                    <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-primary mr-2">Edit</a>
                                    <form action="{{ route('menu.destroy', $menu->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        {{-- sweet alert button
                                        <button class="btn btn-danger" id="swal-6" type="submit">Delete</button> --}}
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
                    {{ $menus->links() }}
                </nav>
            </div>

        </div>
    </div>

    <script>
        async function toggleStatus(checkbox,menuId)
        {

            const isAvailable=checkbox.checked?1:0;

            // nextElementSibing is the sibling element of input i.e label tag
            const label=checkbox.nextElementSibling;

             label.textContent=isAvailable?"Available":"Unavailable";
            try{
                const response=await fetch(`/menu/${menuId}/status`,{
                    method:"PATCH",
                    headers:{
                        "Content-Type":'application/json',
                        "X-CSRF-TOKEN":"{{csrf_token()}}",
                        'Accept':'application/json',
                    },
                    body:JSON.stringify({is_available:isAvailable})
                });

                if(!response.ok)
                {
                    throw new Error('network error');
                }
                const data=await response.json();
                alert(data.message);
            }
            catch(error)
            {
                alert("failed to update status");
                checkbox.checked=!checkbox.checked;
                label.textContent=isAvailable?"Available":"Unavailable";
            }
        }
    </script>

</x-layout.admin-layout>
