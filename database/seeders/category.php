<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id'=>1,'categoryName'=>'Điện thoại','categorySlug'=>'dien-thoai','status'=>'1','parent_id'=>'0','prioty'=>'1'],
            ['id'=>2,'categoryName'=>'Máy tính','categorySlug'=>'may-tinh','status'=>'1','parent_id'=>'0','prioty'=>'2'],
            ['id'=>3,'categoryName'=>'Đồ gia dụng','categorySlug'=>'do-gia-dung','status'=>'1','parent_id'=>'0','prioty'=>'3'],
            ['id'=>4,'categoryName'=>'Đồ điện từ','categorySlug'=>'do-dien-tu','status'=>'1','parent_id'=>'0','prioty'=>'4'],
            ['id'=>5,'categoryName'=>'Máy lọc nước','categorySlug'=>'may-loc-nuoc','status'=>'1','parent_id'=>'0','prioty'=>'5'],
            ['id'=>6,'categoryName'=>'Điều hòa','categorySlug'=>'dieu-hoa','status'=>'1','parent_id'=>'0','prioty'=>'6'],
            ['id'=>7,'categoryName'=>'laptop','categorySlug'=>'laptop','status'=>'1','parent_id'=>'0','prioty'=>'7'],
        ]);
    }
}
