@extends('admin.admin_layouts')
@section('admin_content')
<?php use App\Http\Controllers\Controller; ?>
    <h1 class="h3 mb-3 text-gray-800">Add Academy</h1>

    <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Academy</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Academy Title *</label>
                    <input type="text" name="blog_title" class="form-control" value="{{ old('blog_title') }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Academy Slug</label>
                    <input type="text" name="blog_slug" class="form-control" value="{{ old('blog_slug') }}">
                </div>
                <div class="form-group">
                    <label for="">Academy Content *</label>
                    <textarea name="blog_content" class="form-control editor" cols="30" rows="10">{{ old('blog_content') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Academy Short Content *</label>
                    <textarea name="blog_content_short" class="form-control h_100" cols="30" rows="10">{{ old('blog_content_short') }}</textarea>
                </div>
				<div class="form-group">
					<label class="control-label">{{__("Image")}}</label>
					<?php Controller::fileupload(); ?>
				</div>
                
                <div class="row"> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Select Category *</label>
                            <select name="category_id" id="category" class="form-control">
								<option value="">Select</option>
                               <?php
									echo \App\Models\Admin\Category::printTree($tree);
								?>
                            </select>
                        </div>
                    </div>
                </div>
				<div class="row"> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Select Sub Category</label>
                            <select name="subcategory_id" id="subcategory" class="form-control">
								<option value="">Select</option>
                              
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Want to send email to subscribers? *</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="send_email_to_subscribers" id="rr1" value="Yes" checked>
                            <label class="form-check-label font-weight-normal" for="rr1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="send_email_to_subscribers" id="rr2" value="No">
                            <label class="form-check-label font-weight-normal" for="rr2">No</label>
                        </div>
                    </div>
                </div>
				<div class="form-group">
					<label for="">Tags</label>
					<input type="text" name="tags" placeholder="" class="form-control" value="{{ old('tags') }}">
					<p>Please put comma seprated Tags</p>
				</div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                </div>
                <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ old('seo_meta_description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
@section('scripts')
<script>
jQuery(document).ready(function($){
	$('#category').on('change', function(){
		var v = $('#category option:selected').val();
		$('#subcategory').prop('disabled', true);
		$.ajax({
			 url:'https://aideascent.com/admin/getsubcategory/blog',
             type:'get',
			 data:{cat_id:v},
			success:function(res){
				$('#subcategory').prop('disabled', false);	
				$('#subcategory').html(res);
			}
		});
	});
});
</script>
@endsection
