<?php

namespace App\View\Components;


class Recusive
{
    private $data;
    private $htmlSelect = '';
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function cateList($parentId, $id = 0, $text = "")
    {

        foreach ($this->data as $cate) {
            if ($cate['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $cate['id']) {
                    $this->htmlSelect .= "<option selected value='" . $cate['id'] . "'>" . $text . $cate['categoryName'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='" . $cate['id'] . "'>" . $text . $cate['categoryName'] . "</option>";
                }
                $this->cateList($parentId, $cate['id'], $text . '&ensp;  ');
            }
        }

        return $this->htmlSelect;
    }
    public function cateEdit($data, $id = 0, $text = "")
    {
      
        foreach ($this->data as $cate) {
            if ($cate['parent_id'] == $id) {
                if (!empty($data) && in_array($cate['id'],$data)==true ) {
                    $this->htmlSelect .= "<option selected value='" . $cate['id'] . "'>" . $text . $cate['categoryName'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='" . $cate['id'] . "'>" . $text . $cate['categoryName'] . "</option>";
                }
                $this->cateEdit($data, $cate['id'], $text . ' &ensp; ');
            }
        }

        return $this->htmlSelect;
    }
}
