<div class="sidebar">
 
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
	
    <div class="widget">
        <h3>Recent Posts</h3>
        <div class="type-2">
            <ul>
                @php $i=0 @endphp
                @foreach($blog_items_no_pagi as $row)
				<?php
									$category = \App\Models\Admin\ProductCategory::where('id', $row->category_id)->first();
									$subcategory = \App\Models\Admin\ProductCategory::where('id', $row->subcategory_id)->first();
									?>
                    @php $i++ @endphp
                   
                    <li>
					@if($row->product_featured_photo != '')
                        <img src="{{ asset('public/uploads/'.$row->product_featured_photo) }}">
					@else
						<img src="{{ asset('public/uploads/'.$g_setting->logo) }}">
					@endif
                        <a href="{{ url('product/'.@$category->category_slug.'/'.@$subcategory->category_slug.'/'.$row->product_slug) }}">{{ $row->product_name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
	
</div>
