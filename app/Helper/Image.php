<?php
namespace App\Helper;

class Image
{
 // $get_name_image = $file->getClientOriginalName(); ---- lấy tên và đuôi  của ảnh
    // $name_image = current(explode('.', $get_name_image));    --- lấy phần tên
    // $name: tên ảnh trong database, tên ảnh hiện tại vb   
    // $fodel: nơi lưu ảnh
    // $id : nối id người thêm sửa ảnh
    // $Slug: lấy tên ảnh theo slug truyền vào
    // $File : file ảnh 
    public function UploadImage($file, $folder, $id, $slug=""){
        if($file){
            $path = 'uploads/'.$folder.'/';
            $new_name = $slug .'-'. rand(0, 99).'-'.$id.'.'.$file->getClientOriginalExtension();
            $file->move($path, $new_name);
            return $new_name;
        }
        return redirect()->back()->with('erros','Lỗi chọn ảnh');
    }
   
    public function UpdateImage($file, $folder, $id, $slug="",$old_name ){
        $this->DelImage($folder,$old_name);
       $data= $this->UploadImage( $file, $folder, $id, $slug);
       return $data;
    }
    public function DelImage($folder,$name){
        if (!empty($name)) {
            $path_del = 'uploads/'.$folder.'/' . $name;
            if (file_exists($path_del)) {
                unlink($path_del);
            }
        }
    }
    public function ImageList($images, $folder,$id,$slug){
        $nameImages = '';
        if ($images) {
            foreach ($images as $imageItem) {
                if ($nameImages != null) {
                    $nameImages = $nameImages . '!' . $this->UploadImage($imageItem, $folder, $id, $slug);
                } else {
                    $nameImages = $this->UploadImage($imageItem, $folder,$id, $slug);
                }
            }
        }
        return $nameImages;
    }
}