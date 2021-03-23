@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Partner</h1>

    <form action="{{ route('admin.partners.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Partner</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.partners.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
               <div class="form-group">
					<label class="control-label">{{__("Image")}}</label>
					<?php use App\Http\Controllers\Controller; ?>
					<?php Controller::fileupload(); ?>
				</div>
                <div class="form-group">
                    <label for="">URL</label>
                    <input type="text" name="partner_link" class="form-control">
                </div>
               
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection