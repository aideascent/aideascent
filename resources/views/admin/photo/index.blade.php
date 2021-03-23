@extends('admin.admin_layouts')
@section('admin_content')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
</style>
    <h1 class="h3 mb-3 text-gray-800">Photos</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 mt-2 font-weight-bold text-primary">View Photos</h6>
            <div class="float-right d-inline">
                <a href="{{ route('admin.photo.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="card-body">
		<div class="custom-error-msg">
				</div>	
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Caption</th>
                        <th>Show</th>
                        <th>Order</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($photo as $row)
                        <tr id="id_{{@$list->id}}">
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('public/uploads/'.$row->photo_name) }}" alt="" class="w_200"></td>
                            <td>{{ $row->photo_caption }}</td>
                            <td><label class="switch">
								<input type="checkbox" class="change-status" data-id="{{@$row->id}}"  data-status="{{@$row->status}}" data-table="photos" {{@$row->status == 1 ? "checked" : ""}}>
								<span class="slider round"></span>
							</label></td>
                            <td>{{ $row->photo_order }}</td>
                            <td>
                                <a href="{{ URL::to('admin/photo-gallery/edit/'.$row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ URL::to('admin/photo-gallery/delete/'.$row->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection