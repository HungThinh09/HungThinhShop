
$(function(){
    $(".select2-tag").select2({
        tags: true,
        tokenSeparators: [','],
        placeholder: "Nhập ít nhất  1 Tags",

    });
    $(".select2-cate").select2({
        tags: false,
        tokenSeparators: [','],
        placeholder: "Chọn danh mục sản phẩm",
        allowClaer: true

    });     
    $(".select2-role").select2({
        tags: false,
        tokenSeparators: [','],
        placeholder: "Chọn vai trò",
        allowClaer: true

    });           
})