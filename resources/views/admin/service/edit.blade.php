@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Service</h1>

    <form action="{{ url('admin/service/update/'.$service->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Service</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.service.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ $service->name }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $service->slug }}">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $service->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Short Description</label>
                    <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ $service->short_description }}</textarea>
                </div>
               <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Select Category *</label>
                            <select name="category_id" id="category" class="form-control">
                               
								<?php
									echo \App\Models\Admin\ProductCategory::printTree($tree, 0, null, @$service->category_id);
								?>
                            </select>
                        </div>
                    </div>
                </div>
				<div class="row"> 
                    <div class="col-md-4">
                        <div class="form-group">
							<?php
								$categories = \App\Models\Admin\ProductCategory::where('parent',$service->category_id)->orderby('category_name','ASC')->get();
							?>
                            <label for="">Select Sub Category</label>
                            <select name="subcategory_id" id="subcategory" class="form-control">
								<option value="">Select</option>
								<?php
									foreach($categories as $categor){
										?>
											<option value="<?php echo $categor->id; ?>" <?php if($service->subcategory_id == $categor->id){ echo 'selected'; } ?>><?php echo $categor->category_name; ?></option>
										<?php
									}
								?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
					<label class="control-label">{{__("Image")}}</label>
					<?php use App\Http\Controllers\Controller; ?>
					<?php Controller::fileupload($service->photo); ?>
				</div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="seo_title" class="form-control" value="{{ $service->seo_title }}">
                </div>
                <div class="form-group">
                    <label for="">Meta Description</label>
                    <textarea name="seo_meta_description" class="form-control h_100" cols="30" rows="10">{{ $service->seo_meta_description }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
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
			 url:'https://aideascent.com/admin/getsubcategory/service',
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