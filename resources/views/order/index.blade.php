<x-layout.admin-layout>

    <style>
        :root {
            --espresso: #3c2a21;
            --espresso-light: #5e4534;
            --cream: #faf6f0;
            --gold: #c8963e;
            --gold-light: #e8c988;
        }

        .page-heading {
            font-weight: 700;
            color: var(--espresso);
            letter-spacing: .3px;
        }

        .page-subtext {
            color: #8a7968;
            font-size: 14px;
        }

        /* ---- Order Card ---- */
        .order-card {
            border: none;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(60, 42, 33, .06);
            transition: transform .25s ease, box-shadow .25s ease;
            overflow: hidden;
            height: 100%;
        }

        .order-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 32px rgba(60, 42, 33, .14);
        }

        .order-card .card-top {
            background: linear-gradient(135deg, var(--espresso) 0%, var(--espresso-light) 100%);
            padding: 18px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .order-card .customer-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .order-card .avatar-circle {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--gold);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
            flex-shrink: 0;
        }

        .order-card .customer-name {
            color: #fff;
            font-weight: 600;
            font-size: 15px;
            margin: 0;
        }

        .order-card .table-badge {
            background: rgba(255, 255, 255, .15);
            color: #fff;
            font-size: 12px;
            padding: 3px 10px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 3px;
        }

        .order-card .order-number {
            color: var(--gold-light);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .5px;
        }

        .order-card .card-body {
            padding: 20px 22px;
        }

        .order-card .items-list {
            list-style: none;
            padding: 0;
            margin: 0 0 14px 0;
        }

        .order-card .items-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 9px 0;
            border-bottom: 1px dashed #eee1d0;
            font-size: 14px;
            color: #4a3c32;
        }

        .order-card .items-list li:last-child {
            border-bottom: none;
        }

        .order-card .item-qty {
            background: var(--cream);
            color: var(--espresso);
            font-size: 11px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 6px;
            margin-left: 6px;
        }

        .order-card .item-price {
            font-weight: 600;
            color: var(--espresso);
        }

        .order-card .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--cream);
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 16px;
        }

        .order-card .total-label {
            font-size: 13px;
            color: #8a7968;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .order-card .total-value {
            font-size: 19px;
            font-weight: 700;
            color: var(--espresso);
        }

        .order-card .status-select {
            border-radius: 10px;
            border: 1px solid #e8ddcf;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: 600;
            width: 100%;
            background-color: var(--cream);
            color: var(--espresso);
            margin-bottom: 14px;
        }

        .order-card .status-select:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(200, 150, 62, .15);
        }

        .order-card .card-actions {
            display: flex;
            gap: 10px;
        }

        .order-card .btn {
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            padding: 8px 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            flex: 1;
            border: none;
        }

        .order-card .btn-edit {
            background: var(--cream);
            color: var(--espresso);
        }

        .order-card .btn-edit:hover {
            background: var(--gold-light);
            color: var(--espresso);
        }

        .order-card .btn-delete {
            background: #fdeeee;
            color: #c0392b;
        }

        .order-card .btn-delete:hover {
            background: #f5c6c6;
            color: #a93226;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #8a7968;
        }

        .empty-state i {
            font-size: 40px;
            color: var(--gold-light);
            margin-bottom: 12px;
            display: block;
        }
    </style>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="page-heading mb-0">Orders</h4>
                <span class="page-subtext">{{ count($orders) }} total order{{ count($orders) === 1 ? '' : 's' }}</span>
            </div>
        </div>

        @if (count($orders) === 0)
            <div class="empty-state">
                <i class="fa fa-coffee"></i>
                <h5>No orders yet</h5>
                <p class="mb-0">New orders will appear here as customers place them.</p>
            </div>
        @else
            <div class="row">
                @foreach ($orders as $order)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="order-card">
                            <div class="card-top">
                                <div class="customer-info">
                                    <div class="avatar-circle">
                                        {{ strtoupper(substr($order->customer->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="customer-name">{{ $order->customer->name }}</p>
                                        <span class="table-badge">{{ $order->table->table_number }}</span>
                                    </div>
                                </div>
                                <span class="order-number">#{{ $loop->iteration }}</span>
                            </div>

                            <div class="card-body">
                                <ul class="items-list">
                                    @foreach ($order->orderItems as $item)
                                        <li>
                                            <span>
                                                {{ $item->menuItem->name }}
                                                <span class="item-qty">x{{ $item->quantity }}</span>
                                            </span>
                                            <span class="item-price">Rs. {{ $item->price }}</span>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="total-row">
                                    <span class="total-label">Total</span>
                                    <span class="total-value">
                                        Rs.
                                        {{
                                            $order->orderItems->sum(function ($item) {
                                                return $item->quantity * $item->price;
                                            })
                                        }}
                                    </span>
                                </div>

                                <select name="status" class="form-control select2 status-select"
                                    data-id="{{ $order->id }}">
                                    <option value="pending" {{ old('status', $order->status) === 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="preparing" {{ old('status', $order->status) === 'preparing' ? 'selected' : '' }}>
                                        Preparing</option>
                                    <option value="ready" {{ old('status', $order->status) === 'ready' ? 'selected' : '' }}>
                                        Ready</option>
                                    <option value="served" {{ old('status', $order->status) === 'served' ? 'selected' : '' }}>
                                        Served</option>
                                    <option value="completed" {{ old('status', $order->status) === 'completed' ? 'selected' : '' }}>
                                        Completed</option>
                                    <option value="cancelled" {{ old('status', $order->status) === 'cancelled' ? 'selected' : '' }}>
                                        Cancelled</option>
                                </select>

                                <div class="card-actions">
                                    <a href="{{ route('order.edit', $order->id) }}" class="btn btn-edit">
                                        <i class="fa fa-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('order.destroy', $order->id) }}" method="post" class="flex-fill">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete w-100">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="text-right">
            <nav class="d-inline-block">
                <!-- Laravel will automatically render the <ul> and <li> tags here -->
                {{-- {{ $orders->links() }} --}}
            </nav>
        </div>
    </div>

    <script>
        document.querySelectorAll('.status-select').forEach((select) => {
            select.addEventListener('change', async function() {
                const orderId = this.getAttribute('data-id');
                const status = this.value;
                try {
                    const response = await fetch(`order/${orderId}/status`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                ?.getAttribute('content') ||
                                "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            status: status,
                        }),
                    });
                    const data = await response.json();

                    if (!response.ok) {
                        alert(data.message || 'Failed to update status');
                    }
                    if (data.status) {
                        alert(data.message || 'Status updated successfully');
                    }
                } catch (error) {
                    alert('An error occurred while updating the status');
                }
            });
        });
    </script>

</x-layout.admin-layout>
