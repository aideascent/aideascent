@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Others</h1>

    <form action="{{ url('admin/setting/general/headercode/update') }}" method="post">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
						
						<div class="form-group">
                            <label for="">Number of ads in blog section</label>
                            <input name="no_of_ads" class="form-control" type="number" value="{{ $general_setting->no_of_ads }}">
                        </div>
                        <div class="form-group">
                            <label for="">Header</label>
                            <textarea name="header_code" class="form-control" cols="30" rows="10">{{ $general_setting->header_code }}</textarea>
                        </div>
                       
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
			 <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Body</label>
                            <textarea name="body_code" class="form-control" cols="30" rows="10">{{ $general_setting->body_code }}</textarea>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection