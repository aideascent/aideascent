@extends('admin.admin_layouts')
@section('admin_content')
    <h1 class="h3 mb-3 text-gray-800">Add Feature</h1>

    <form action="{{ url('admin/feature/update/'.$slider->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 mt-2 font-weight-bold text-primary">Add Feature</h6>
                <div class="float-right d-inline">
                    <a href="{{ route('admin.feature.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
              <label for="">Icon **</label>
              <div class="btn-group d-block">
                  <button type="button" class="btn btn-primary iconpicker-component"><i
                          class="{{$slider->icon}}"></i></button>
                  <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                          data-selected="fa-car" data-toggle="dropdown">
                  </button>
                  <div class="dropdown-menu"></div>
              </div>
              <input id="inputIcon" type="hidden" name="icon" value="fas fa-heart">
              @if ($errors->has('icon'))
                <p class="mb-0 text-danger">{{$errors->first('icon')}}</p>
              @endif
              <div class="mt-2">
                <small>NB: click on the dropdown sign to select a icon.</small>
              </div>
              <p id="erricon" class="mb-0 text-danger em"></p>
            </div>
                <div class="form-group">
                    <label for="">Text</label>
                    <input value="{{$slider->title}}" type="text" name="title" class="form-control">
                </div>
               
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>

@endsection
@section('scripts')
  <script>
    $(document).ready(function() {
		$('.icp-dd').iconpicker();
      $('.icp').on('iconpickerSelected', function(event){
        $("#inputIcon").val($(".iconpicker-component").find('i').attr('class'));
      });
    });
  </script>
@endsection