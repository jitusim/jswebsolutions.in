<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Image; 

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function upload_image($request){
	  if(!empty($request->postImage)){
		 $pdf_path = public_path('uploadsFiles/postImage/');
		  if(!is_dir($pdf_path)){ mkdir($pdf_path, 0755, true); }
			$filename = md5(microtime()).'.'.$request->file('postImage')->getClientOriginalExtension();
			if($request->file('postImage')->getClientOriginalExtension()){
				$request->file('postImage')->move($pdf_path  , $filename);
				return $filename;
			}
			else{ return 100; }
		}
	  else{
		  return $request->postImageCopy;	
		}	
	}
}
