 <div class="files-wraps view-grid">
						
							
                
@foreach($photo as $row)
	<div class="file-item image/jpeg is-image">

		<div title="au-banner" class="inner">
			<div class="file-thumb">
				<img src="{{ asset('public/uploads/'.$row->photo_name) }}" vfileid="{{$row->id}}" vfile_name="{{$row->photo_name}}" class="w_150">
			</div> 
			<div class="file-name">{{$row->photo_name}}</div> 
			<span class="file-checked-status" style="display: none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M186.301 339.893L96 249.461l-32 30.507L186.301 402 448 140.506 416 110z"></path></svg></span>
		</div>

	</div>	
	@endforeach
    </div>
 {{$photo->appends(request()->query())->links()}}