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

//popup
function openModal(){
    $('#addModal').modal('show');
}

// load page
$('.reload').click(function() {
    location.reload();
})

// show xóa nhiều trường
$('.btn-del-show').click(function(){
    if ($('.btn-gr').hasClass('d-none')){
        $('.btn-gr').removeClass('d-none');
    }else{
        $('.btn-gr').addClass('d-none');
    }
})

// chọn nhiều trg để xóa
$("#checkAll").click(function () {
    $(".check").not(this).prop('checked', this.checked);
});

// truyền id để xóa nhiều (Tin tức)
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

// truyền id để xóa nhiều (hướng dẫn)
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

// search
$("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search-body tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

// thêm video
$('.add-video').click(function(){
    let a ='';
    a += `  <div class="add-video">
                <input class="form-control" name="name-video" placeholder="Tên video...">
                <textarea class="form-control" name="video" placeholder="Đường link video..."></textarea>
                <a class="deletevideo" style="color:2e1503; cursor: pointer;" onclick="remove()">Xóa</a>
            </div>`;
    $('.form-add-video').append(a);
})
function remove(){
    $('.add-video').remove();
}
