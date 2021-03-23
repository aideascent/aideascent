@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Edit Testimonial</h1>

    <form action="{{ url('admin/testimonial/update/'.$testimonial->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Edit Testimonial</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Designation *</label>
                    <input type="text" name="designation" class="form-control" value="{{ $testimonial->designation }}">
                </div>
                <div class="form-group">
                    <label for="">Comment *</label>
                    <textarea name="comment" class="form-control h_100" cols="30" rows="10">{{ $testimonial->comment }}</textarea>
                </div>
               
               <div class="form-group">
					<label class="control-label">{{__("Image")}}</label>
					<?php use App\Http\Controllers\Controller; ?>
					<?php Controller::fileupload($testimonial->photo); ?>
				</div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </form>

@endsection
