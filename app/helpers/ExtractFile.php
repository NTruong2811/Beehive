<?php
namespace App\helpers;

use Illuminate\Support\Facades\Storage;

class ExtractFile {
  
    public $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    
    public function ExtractToJOb(){
        // lọc ra danh sách các file trong request
        $fileList = $this->request->allFiles();

        // chuyển chúng thành các mảng key ["video","img"]
        $keys = array_keys($fileList);
        
        $new_request =  $this->request->all();
        // gán lại trả request với key cũ bằng giá trị mới  
        for ($i=0; $i < count($keys); $i++) { 
             $path = Storage::disk('local')->put($keys[$i], $fileList[$keys[$i]]);
             (string)$key = 'path_'.$keys[$i];
             $new_request[$key] = $path;
        }
         
        return  json_decode(json_encode($new_request), false);
    
    }
    
}

?>