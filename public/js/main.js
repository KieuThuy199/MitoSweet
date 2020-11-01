// Xem hình ảnh trước khi upload
function previewImg(event) {
    // Gán giá trị các file vào biến files
    var files = document.getElementById('img').files;

    // Show khung chứa ảnh xem trước
    $('.change-form .box-preview-img').show();

    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
        // Thêm thẻ img theo i
        $('.change-form .box-preview-img').append('<img src="" id="' + i +'">');

        // Thêm src vào mỗi thẻ img theo id = i
        $('.change-form .box-preview-img img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }
}

function xacnhan() {
    confirm('Bạn có chắc chắn xóa không?');
    // var ids = [];
    // $(".id-check:checked").each(function() {
    //     ids.push($(this).attr('data-id'));
    // });
    // if(ids.length <=0)
    // {
    //     alert("Vui lòng chọn dòng muốn xóa");
    // }
    // else {
    //     var check = confirm("Bạn có chắc chắn xóa không?");
    //     if(check == true){

    //     }
    // }
    //     console.log(ids);
}

function openModal(){
    $('#addModal').modal('show');
}

// $(document).ready(function(){
//     $('#data_news tbody').on('click','tr', function(){
//         $(this).toggleClass('dt-selected');
//     })
// })
