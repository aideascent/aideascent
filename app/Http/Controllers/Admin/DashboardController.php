<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\ServiceCategory;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.home');
    }
	
	public function getsubcategory(Request $request, $type = Null){
		ob_start();
		$categories = array();
		if($type == 'blog'){
			$categories = Category::where('parent',$request->cat_id)->orderby('category_name','ASC')->get();
		}
		if($type == 'product'){
			$categories = ProductCategory::where('parent',$request->cat_id)->orderby('category_name','ASC')->get();
		}
		if($type == 'service'){
			$categories = ServiceCategory::where('parent',$request->cat_id)->orderby('category_name','ASC')->get();
		}
		?>
		<option value="">Select</option>
		<?php
		foreach($categories as $categor){
			?>
				<option value="<?php echo $categor->id; ?>"><?php echo $categor->category_name; ?></option>
			<?php
		}
		return ob_get_clean();
	}
}