@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Product</h1>

    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Product</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name *</label>
                    <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="product_slug" class="form-control" value="{{ old('product_slug') }}">
                </div>
                <div class="form-group">
                    <label for="">Old Price</label>
                    <input type="text" name="product_old_price" class="form-control" value="{{ old('product_old_price') }}">
                </div>
                <div class="form-group">
                    <label for="">Current Price *</label>
                    <input type="text" name="product_current_price" class="form-control" value="{{ old('product_current_price') }}">
                </div>
				<div class="row"> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Select Category *</label>
                            <select name="category_id" id="category" class="form-control">
								<option value="">Select</option>
                               <?php
									echo \App\Models\Admin\ProductCategory::printTree($tree);
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
                    <label for="">Stock </label>
                    <input type="text" name="product_stock" class="form-control" value="{{ old('product_stock') }}">
                </div>
                <div class="form-group">
                    <label for="">Content *</label>
                    <textarea name="product_content" class="form-control editor" cols="30" rows="10">{{ old('product_content') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Short Content *</label>
                    <textarea name="product_content_short" class="form-control h_100" cols="30" rows="10">{{ old('product_content_short') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Return Policy</label>
                    <textarea name="product_return_policy" class="form-control editor" cols="30" rows="10">{{ old('product_return_policy') }}</textarea>
                </div>
				<div class="form-group">
                    <label for="">Add More Tabs</label>
                    <a href="javascript:;" class="add_more btn btn-primary">Add</a>
                </div>
				<div class="tabs"></div>
                <div class="form-group">
					<label class="control-label">{{__("Image")}}</label>
					<?php use App\Http\Controllers\Controller; ?>
					<?php Controller::fileupload(); ?>
				</div>
                <div class="form-group">
                    <label for="">Order</label>
                    <input type="text" name="product_order" class="form-control" value="{{ old('product_order', '0') }}">
                </div>
                <div class="form-group">
                    <label for="">Status *</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="product_status" id="rr1" value="Show" checked>
                            <label class="form-check-label font-weight-normal" for="rr1">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="product_status" id="rr2" value="Hide">
                            <label class="form-check-label font-weight-normal" for="rr2">Hide</label>
                        </div>
                    </div>
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
	
	$(document).delegate('.remove_tab', 'click', function(){
		$(this).parent().parent().remove();
	});
	$('.add_more').on('click', function(){
		var html = '<div class="mydiv"><div class="form-group "><label for="">Tab Name</label><input type="text" name="tabname[]" class="form-control" value=""></div><div class="form-group"><label for="">Content</label><textarea name="tabdesc[]" class="form-control editors h_100" cols="30" rows="10"></textarea></div><div class="form-group"><a href="javascript:;" class="remove_tab">Remove</a></div></div>';
		$('.tabs').append(html);
		 $('.editors').summernote({
        tabsize: 2,
        height: 300,
		toolbar: [
		
		 ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['fontname', 'fontsize', 'underline', 'strikethrough', 'superscript', 'subscript']],
    ['color', ['color']],
    ['para', ['style','ul', 'ol', 'paragraph', 'height']],
	 ['insert', ['picture', 'link', 'video', 'table', 'hr']],
	 ['misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help']]
  
		 ]
    });
	});
	
	$('#category').on('change', function(){
		var v = $('#category option:selected').val();
		$('#subcategory').prop('disabled', true);
		$.ajax({
			 url:'https://aideascent.com/admin/getsubcategory/product',
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