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

$('.reload').click(function() {
    location.reload();
})

$('.btn-del-show').click(function(){
    if ($('.btn-gr').hasClass('d-none')){
        $('.btn-gr').removeClass('d-none');
    }else{
        $('.btn-gr').addClass('d-none');
    }
})

$("#checkAll").click(function () {
    $(".check").not(this).prop('checked', this.checked);
});

$('.btn-del').click(function(){
    let id = [];
    let a = confirm('Ban có chắc chắn muốn xóa những tin tức này?');
    if (a == true) {
        $(".check:checked").each(function() {
            id.push($(this).val());
        })
        if(id.length > 0){
            $.ajax({
                url: '/news/deleteMul',
                type: 'get',
                data: 'ids=' + id,
                success: function (data) {
                    if (data['status'] == true) {
                        $(".check:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    }
                }
            });
        }else{
            alert('Không có tin tức được chọn!');
        }
    }
})

$('.btn-free').click(function(){
    let id = [];
    let a = confirm('Ban có chắc chắn muốn xóa những tin tức này?');
    if (a == true) {
        $(".check:checked").each(function() {
            id.push($(this).val());
        })
        if(id.length > 0){
            $.ajax({
                url: '/freetutorials/deleteMul',
                type: 'get',
                data: 'ids=' + id,
                success: function (data) {
                    if (data['status'] == true) {
                        $(".check:checked").each(function() {
                            $(this).parents("tr").remove();
                        });
                        alert(data['message']);
                    }
                }
            });
        }else{
            alert('Không có tin tức được chọn!');
        }
    }
})

$("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search-body tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});


