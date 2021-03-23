@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Google Addsense</h1>

    <form action="{{ url('admin/setting/general/googleaddsense/update') }}" method="post">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Before Category</label>
                            <textarea name="before_cate_code" class="form-control" cols="30" rows="10">{{ $general_setting->before_cate_code }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">After Category</label>
                            <textarea name="after_cate_code" class="form-control" cols="30" rows="10">{{ $general_setting->after_cate_code }}</textarea>
                        </div>
						 <div class="form-group">
                            <label for="">After Recent Post</label>
                            <textarea name="after_recent_code" class="form-control" cols="30" rows="10">{{ $general_setting->after_recent_code }}</textarea>
                        </div>
						<div class="form-group">
                            <label for="">After Share This</label>
                            <textarea name="after_share_this" class="form-control" cols="30" rows="10">{{ $general_setting->after_share_this }}</textarea>
                        </div>
						<div class="form-group">
                            <label for="">After Posting Comments</label>
                            <textarea name="after_post_comment" class="form-control" cols="30" rows="10">{{ $general_setting->after_post_comment }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
			 <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">After Title</label>
                            <textarea name="after_title" class="form-control" cols="30" rows="10">{{ $general_setting->after_title }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">After Feature Image</label>
                            <textarea name="after_feature_image" class="form-control" cols="30" rows="10">{{ $general_setting->after_feature_image }}</textarea>
                        </div>
						 <div class="form-group">
                            <label for="">Before Share This</label>
                            <textarea name="before_share_this" class="form-control" cols="30" rows="10">{{ $general_setting->before_share_this }}</textarea>
                        </div>
                      <div class="form-group">
                            <label for="">Before Comments</label>
                            <textarea name="after_comments" class="form-control" cols="30" rows="10">{{ $general_setting->after_comments }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection