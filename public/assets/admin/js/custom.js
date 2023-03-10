$(document).ready(function(){

    //check admin password
    $("#current_password").keyup(function(){
        var current_password = $("#current_password").val();
        // alert(currentPassword);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/check-admin-password',
            data:{current_password :current_password},
            success: function(resp){
                // alert(resp);
                if(resp == "false")
                {
                    $("#check_password").html("<font color='red'>كلمة السر  الحالية غير صحيحة !</font>");
                }
                else if(resp == "true")
                {
                    $("#check_password").html("<font color='#854fff'>كلمة السر  الحالية  صحيحة !</font>");
                }
            },error:function(){
                alert('Error');
            }
        });
    });
    
    // Update Admin Status
    $(document).on("click",".updateAdminStatus",function () {
      
        var status  = $(this).children("em").attr("status");
        var admin_id = $(this).attr("admin_id");
        // alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-admin-status',
            data: {
                status:status,
                admin_id:admin_id
            },
            success:function(resp){
                if (resp['status']== 0) 
                {
                    $("#admin-"+admin_id).html("<em class='icon ni ni-cross-fill-c text-danger' status='Inactive' style='font-size: 25px'></em>");
                }
                else if (resp['status']== 1) 
                {
                    $("#admin-"+admin_id).html("<em class='icon ni ni-check-fill-c text-success' status='Active' style='font-size: 25px'></em>");
                }
                // alert(resp);
            },
            error:function(){
                alert("Error");
            }
        })
    });

    // Update Section Status
    $(document).on("click",".updateSectionStatus",function () {
      
        var status  = $(this).children("em").attr("status");
        var section_id = $(this).attr("section_id");
        // alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-section-status',
            data: {
                status:status,
                section_id:section_id
            },
            success:function(resp){
                if (resp['status']== 0) 
                {
                    $("#section-"+section_id).html("<em class='icon ni ni-cross-fill-c text-danger' status='Inactive' style='font-size: 25px'></em>");
                }
                else if (resp['status']== 1) 
                {
                    $("#section-"+section_id).html("<em class='icon ni ni-check-fill-c text-success' status='Active' style='font-size: 25px'></em>");
                }
                // alert(resp);
            },
            error:function(){
                alert("Error");
            }
        })
    });

    // Update Category Status
    $(document).on("click",".updateCategoryStatus",function () {
      
        var status  = $(this).children("em").attr("status");
        var category_id = $(this).attr("category_id");
        // alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-category-status',
            data: {
                status:status,
                category_id:category_id
            },
            success:function(resp){
                if (resp['status']== 0) 
                {
                    $("#category-"+category_id).html("<em class='icon ni ni-cross-fill-c text-danger' status='Inactive' style='font-size: 25px'></em>");
                }
                else if (resp['status']== 1) 
                {
                    $("#category-"+category_id).html("<em class='icon ni ni-check-fill-c text-success' status='Active' style='font-size: 25px'></em>");
                }
                // alert(resp);
            },
            error:function(){
                alert("Error");
            }
        })
    });
    // Confirm Delete
    // $(".confirmDelete").click(function(){
    //     var title = $(this).attr("title");
    //     if(confirm("هل انت متأكد من حذف هذة البيانات؟ "))
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // });


});