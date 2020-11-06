// // Xem hình ảnh trước khi upload
// function previewImg(event) {
//     // Gán giá trị các file vào biến files
//     var files = document.getElementById('img').files;

//     // Show khung chứa ảnh xem trước
//     $('.change-form .box-preview-img').show();

//     // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
//     for (i = 0; i < files.length; i++)
//     {
//         // Thêm thẻ img theo i
//         $('.change-form .box-preview-img').append('<img src="" id="' + i +'">');

//         // Thêm src vào mỗi thẻ img theo id = i
//         $('.change-form .box-preview-img img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
//     }
// }
// Giới hạn chuỗi nội dung hiện ra màn hình
$('.compact').each(function (f) {
    var newstr = $(this).text();
    if (newstr.length >= 25) {
        newstr = newstr.substring(0,25);
        $(this).text(newstr + '...');
    }else{
        $(this).text(newstr);
    }
});

function openModal(){
    $('#addModal').modal('show');
}

$('.btn-del-show').click(function(){
    if ($('.btn-gr').hasClass('d-none')){
        $('.btn-gr').removeClass('d-none');
    }else{
        $('.btn-gr').addClass('d-none');
    }
})
$('.btn-search-show').click(function(){
    if ($('.search-form').hasClass('d-none')){
        $('.search-form').removeClass('d-none');
    }else{
        $('.search-form').addClass('d-none');
    }
})

$("#checkAll").click(function () {
    $(".check").not(this).prop('checked', this.checked);
});
