<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $photo = Photo::orderBy('photo_order')->get();
        return view('admin.photo.index', compact('photo'));
    }
	
	public function getlist(Request $request)
    {
        $photo = Photo::orderBy('id', 'DESC')->simplePaginate(10);
        return view('admin.photo.list', compact('photo'));
    }
	
	public function updateAction(Request $request)
	{	
		$status 			= 	0;
		$method 			= 	$request->method();	
		if ($request->isMethod('post')) 
		{
			$requestData 	= 	$request->all();

			$requestData['id'] = trim($requestData['id']);
			$requestData['current_status'] = trim($requestData['current_status']);
			$requestData['table'] = trim($requestData['table']);
			
				if(isset($requestData['id']) && !empty($requestData['id']) && isset($requestData['current_status']) && isset($requestData['table']) && !empty($requestData['table'])) 
				{
					$tableExist = Schema::hasTable(trim($requestData['table']));
					
					if($tableExist)
					{
						$recordExist = DB::table($requestData['table'])->where('id', $requestData['id'])->exists();
						
						if($recordExist)
						{
							if($requestData['current_status'] == 0)
							{
								$updated_status = 1;
								$message = 'Record has been enabled successfully.';
							}
							else
							{
								$updated_status = 0;
								$message = 'Record has been disabled successfully.';
							}		
					
							$response 	= 	DB::table($requestData['table'])->where('id', $requestData['id'])->update(['status'=> $updated_status]);	
							if($response) 
							{
								$status = 1;	
							} 
							else 
							{
								$message = 'Please try again';
							}
						}
						else
						{
							$message = 'ID does not exist, please check it once again.';
						}							
					}	
					else
					{
						$message = 'Table does not exist, please check it once again.';	
					}	
				} 
				else 
				{
					$message = 'Id OR Current Status OR Table does not exist, please check it once again.';		
				}
					
		} 
		else 
		{
			$message = 'Please try again';
		}
		echo json_encode(array('status'=>$status, 'message'=>$message));
		die;
	}
	
	 public function uploadlist(Request $request)
    {
        
		$requestData 		= 	$request->all();
         if($files=$request->file('files')){
			foreach($files as $filename){
				$photo = new Photo();
				$statement = DB::select("SHOW TABLE STATUS LIKE 'photos'");
				$ai_id = $statement[0]->Auto_increment;
				$ext = $filename->getClientOriginalExtension();
				$final_name = 'photo-'.$ai_id.'.'.$ext;
				$filename->move(public_path('uploads/'), $final_name);

				  $data['photo_name'] = $final_name;
				  $photo->fill($data)->save();
			}
		}	
			 $photo = Photo::orderBy('id', 'DESC')->simplePaginate(10);
        return view('admin.photo.list', compact('photo'));
    }

    public function create()
    {
        return view('admin.photo.create');
    }

    public function store(Request $request)
    {
        $photo = new Photo();
        $data = $request->only($photo->getFillable());

        $request->validate([
            'photo_name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_order' => 'numeric|min:0|max:32767'
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'photos'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo_name')->extension();
        $final_name = 'photo-'.$ai_id.'.'.$ext;
        $request->file('photo_name')->move(public_path('uploads/'), $final_name);
        $data['photo_name'] = $final_name;

        $photo->fill($data)->save();
        return redirect()->route('admin.photo.index')->with('success', 'Photo is added successfully!');
    }

    public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        return view('admin.photo.edit', compact('photo'));
    }

    public function update(Request $request, $id)
    {
        $photo = Photo::findOrFail($id);
        $data = $request->only($photo->getFillable());

        if($request->hasFile('photo_name')) {
            $request->validate([
                'photo_name' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'photo_order' => 'numeric|min:0|max:32767'
            ]);
            unlink(public_path('uploads/'.$photo->photo_name));
            $ext = $request->file('photo_name')->extension();
            $final_name = 'photo-'.$id.'.'.$ext;
            $request->file('photo_name')->move(public_path('uploads/'), $final_name);
            $data['photo_name'] = $final_name;
        } else {
            $request->validate([
                'photo_order' => 'numeric|min:0|max:32767'
            ]);
            $data['photo_name'] = $photo->photo_name;
        }

        $photo->fill($data)->save();
        return redirect()->route('admin.photo.index')->with('success', 'Photo is updated successfully!');
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        unlink(public_path('uploads/'.$photo->photo_name));
        $photo->delete();
        return Redirect()->back()->with('success', 'Photo is deleted successfully!');
    }
}
