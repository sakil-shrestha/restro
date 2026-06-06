<x-layout.admin-layout>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Category Info</h4>
                <div class="text-right">
                    <a href="{{ route('category.create') }}" class="btn btn-success mr-1" type="submit">+ Add
                        Category</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $category->name }}</td>
                                <td>{!! $category->description !!}</td>

                                <td>
                                    <select name="status" class="form-control select2 status-select"
                                        data-id="{{ $category->id }}">
                                        <option value="active" {{$category->status==="active"?'selected':''}}>Active</option>
                                        <option value="inactive" {{$category->status==="inactive"?'selected':''}}>InActive</option>
                                    </select>

                                </td>

                                <td class="d-flex gap-2">
                                    <a href="{{ route('category.edit', $category->id) }}"
                                        class="btn btn-primary mr-2">Edit</a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
                    {{$categories->links() }}
                </nav>
            </div>

        </div>
    </div>

    <script>
        document.querySelectorAll('.status-select').forEach(select=>{
            select.addEventListener('change',async function(){
                const categoryId=this.getAttribute('data-id');
                const status=this.value;
                console.log(status);

                try{
                    const response=await fetch(`/category/${categoryId}/status`,{
                        method:"PATCH",
                        headers:{
                            "Content-Type":'application/json',
                            "X-CSRF-TOKEN":"{{csrf_token()}}"
                        },
                        body:JSON.stringify({
                            status:status,
                        }),
                    });
                    if(!response.ok)
                    {
                        throw new Error('network error');
                    }
                    const data=await response.json();
                    console.log(data);
                    alert(data.message);

                }catch(error)
                {
                    alert(error);
                }
            });
        });
    </script>

</x-layout.admin-layout>
