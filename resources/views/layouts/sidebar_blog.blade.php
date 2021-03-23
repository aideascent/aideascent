<div class="sidebar">
    
	@if(isset($general_setting) && $general_setting->before_cate_code != '')
    <div class="widget">
		<div class="type-1">
		{!! $general_setting->before_cate_code !!}
		</div>
	</div>
	@endif
    <div class="widget">
        <h3>Categories</h3>
        <div class="type-1">
            <ul>
                @foreach($categories as $row)
                    <li><a href="{{ url('category/'.$row->category_slug) }}">{{ $row->category_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
	@if(isset($general_setting) && $general_setting->after_cate_code != '')
    <div class="widget">
		<div class="type-1">
		{!! $general_setting->after_cate_code !!}
		</div>
	</div>
	@endif
    <div class="widget">
        <h3>Recent Posts</h3>
        <div class="type-2">
            <ul>
                @php $i=0 @endphp
                @foreach($blog_items_no_pagi as $row)
				<?php
									$category = \App\Models\Admin\Category::where('id', $row->category_id)->first();
									$subcategory = \App\Models\Admin\Category::where('id', $row->subcategory_id)->first();
									?>
										@if($row->blog_photo != '')
                    @php $i++ @endphp
                   
				
                    <li>
					@if($row->blog_photo != '')
                        <img src="{{ asset('public/uploads/'.$row->blog_photo) }}">
					@else
						<img src="{{ asset('public/uploads/'.$g_setting->logo) }}">
					@endif
                        <a href="{{ url('academy/'.@$category->category_slug.'/'.@$subcategory->category_slug.'/'.$row->blog_slug) }}">{{ $row->blog_title }}</a>
                    </li>
					@endif
                @endforeach
            </ul>
        </div>
    </div>
	@if(isset($general_setting) && $general_setting->after_recent_code != '')
    <div class="widget">
		<div class="type-2">
		{!! $general_setting->after_recent_code !!}
		</div>
	</div>
	@endif
</div>
