@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Shop Setting</h1>

    <form action="{{ url('admin/setting/general/shopsettings/update') }}" method="post">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
						
						<div class="form-group">
                            <label for="">Number of Post in Body section</label>
                            <input name="no_of_post_body_shop" class="form-control" type="number" value="{{ $general_setting->no_of_post_body_shop }}">
                        </div>
                        <div class="form-group">
                            <label for="">Number of Post in Right section</label>
                            <input name="no_of_post_right_shop" class="form-control" type="number" value="{{ $general_setting->no_of_post_right_shop }}">
                        </div>
                       
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
			 
        </div>
    </form>

@endsection