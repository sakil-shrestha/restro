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
                {{-- <div class="text-right">
                    <a href="{{ route('order.create') }}" class="btn btn-success mr-1" type="submit">+ Add
                        Category</a>
                </div> --}}
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>

                            <th>customer Name</th>
                            <th>Table Number</th>
                            <th>Order Items</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $order->customer->name }}</td>
                                <td> {{ $order->table->table_number }}</td>
                                <td>

                                    <ul>
                                        @foreach ($order->orderItems as $item)
                                            <li>
                                                {{ $item->menuItem->name }}
                                                ({{ $item->quantity }})
                                                - Rs. {{ $item->price }}
                                            </li>
                                        @endforeach
                                    </ul>

                                </td>
                                <td>
                                    Rs.
                                   {{
                                    $order->OrderItems->sum(function($item){
                                        return $item->quantity*$item->price;
                                    })
                                   }}

                                </td>
                                <td>
                                    <select name="status" class="form-control select2 status-select" data-id="{{$order->id}}">
                                       <option value="pending" {{old('status',$order->status)==='pending'?'selected':''}}>Pending</option>
                                       <option value="preparing" {{old('status',$order->status)==='preparing'?'selected':''}}>Preparing</option>
                                       <option value="ready" {{old('status',$order->status)==='ready'?'selected':''}}>Ready</option>
                                       <option value="served" {{old('status',$order->status)==='served'?'selected':''}}>Served</option>
                                       <option value="completed" {{old('status',$order->status)==='completed'?'selected':''}}>Completed</option>
                                       <option value="cancelled" {{old('status',$order->status)==='cancelled'?'selected':''}}>Cancelled</option>
                                    </select>
                                </td>


                                <td class="d-flex gap-2">
                                    <a href="{{ route('order.edit', $order->id) }}"
                                        class="btn btn-primary mr-2">Edit</a>
                                    <form action="{{ route('order.destroy', $order->id) }}" method="post">
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
                    {{-- {{$order->links() }} --}}
                </nav>
            </div>

        </div>
    </div>

<script>
    document.querySelectorAll('.status-select').forEach((select)=>{
       select.addEventListener('change',async function(){
            const orderId=this.getAttribute('data-id');
            const status=this.value;
            try{
                const response=await fetch(`order/${orderId}/status`,{
                    method:'PATCH',
                    headers:{
                        'Content-Type':'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || "{{ csrf_token() }}" // 2. Added CSRF token
                    },
                    body:JSON.stringify({
                        status:status,
                    }),
                });
                const data= await response.json();


                if(!response.ok)
                {
                    alert(data.message || 'Failed to update status');
                }
                if(data.status)
                {
                    alert(data.message || 'Status updated successfully');
                }


            }catch(error){
                alert('An error occurred while updating the status');
            }
        });
    });
</script>

</x-layout.admin-layout>
