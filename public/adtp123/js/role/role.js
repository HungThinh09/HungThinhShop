$('.parentPer').on('click', function(){
    $(this).parents('.card').find('.chilPer').prop('checked',$(this).prop('checked'));
});

$('.checkall').on('click', function(){
    $(this).parents().find('.chilPer').prop('checked',$(this).prop('checked'));
    $(this).parents().find('.parentPer').prop('checked',$(this).prop('checked'));
});