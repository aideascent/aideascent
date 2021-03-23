@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Customers</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Customers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->customer_name }}</td>
                            <td>{{ $row->customer_email }}</td>
                            <td>
                                @if($row->customer_status == 'Active')
                                    <span class="text-success">{{ $row->customer_status }}</span>
                                @endif

                                @if($row->customer_status == 'Pending')
                                    <span class="text-danger">{{ $row->customer_status }}</span>
                                @endif                                
                            </td>
                            <td>
                                <a href="{{ URL::to('admin/customer/detail/'.$row->id) }}" class="btn btn-info btn-sm btn-block" target="_blank">Detail</a>
                                @if($row->customer_status == 'Active')
                                    <a href="{{ URL::to('admin/customer/make-pending/'.$row->id) }}" class="btn btn-secondary btn-sm btn-block" onClick="return confirm('Are you sure?');">Make Pending</a>
                                @else
                                    <a href="{{ URL::to('admin/customer/make-active/'.$row->id) }}" class="btn btn-secondary btn-sm btn-block" onClick="return confirm('Are you sure?');">Make Active</a>
                                @endif
                                <a href="{{ URL::to('admin/customer/delete/'.$row->id) }}" class="btn btn-danger btn-sm btn-block" onClick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
