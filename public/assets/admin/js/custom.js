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

    // Update Admins Status
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

    // Update Sections Status
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

    // Append Categories Level
    $('#section_id').change(function(){
        var section_id = $(this).val();
        // alert(section_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'get',
            url:'/admin/append-categories-level',
            data:{section_id:section_id},
            success:function(resp){
                $('#appendCategoriesLevel').html(resp);
                // alert('good');
            },error:function(){
                alert('خطأ');
            }
        });
    });

    // Update Brands Status
    $(document).on("click",".updateBrandStatus",function () {

    var status  = $(this).children("em").attr("status");
    var brand_id = $(this).attr("brand_id");
    // alert(admin_id);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/admin/update-brand-status',
        data: {
            status:status,
            brand_id:brand_id
        },
        success:function(resp){
            if (resp['status']== 0)
            {
                $("#brand-"+brand_id).html("<em class='icon ni ni-cross-fill-c text-danger' status='Inactive' style='font-size: 25px'></em>");
            }
            else if (resp['status']== 1)
            {
                $("#brand-"+brand_id).html("<em class='icon ni ni-check-fill-c text-success' status='Active' style='font-size: 25px'></em>");
            }
            // alert(resp);
        },
        error:function(){
            alert("Error");
        }
    })
    });

    // Update Products Status
    $(document).on("click",".updateProductStatus",function () {

        var status  = $(this).children("em").attr("status");
        var product_id = $(this).attr("product_id");
        // alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-product-status',
            data: {
                status:status,
                product_id:product_id
            },
            success:function(resp){
                if (resp['status']== 0)
                {
                    $("#product-"+product_id).html("<em class='icon ni ni-cross-fill-c text-danger' status='Inactive' style='font-size: 25px'></em>");
                }
                else if (resp['status']== 1)
                {
                    $("#product-"+product_id).html("<em class='icon ni ni-check-fill-c text-success' status='Active' style='font-size: 25px'></em>");
                }
                // alert(resp);
            },
            error:function(){
                alert("Error");
            }
        })
    });


    /*=========== Products Attributes Add Remove Input Fields Dynamically =============*/

        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="d-flex mt-2" ><input type="text" name="size[]" value=""class="form-control " placeholder="ادخل الحجم .."  style="display: inline-block; width: 80%;"required/><input type="text" name="sku[]" value=""class="form-control mx-2" placeholder="ادخل وحدة حفظ المخزون SKU .." style="display: inline-block; width: 80%;"required/><input type="text" name="price[]" value=""class="form-control mx-2" placeholder="ادخل السعر .."  style="display: inline-block; width: 80%;"required/><input type="text" name="stock[]" value=""class="form-control mx-2" placeholder="ادخل المخزن .."  style="display: inline-block; width: 80%;"required/><a href="javascript:void(0);" class="remove_button"><strong style="background-color: #f70202;margin-right: 7px;padding: 3px 7.8px;color: white;border-radius: 5px;font-weight: bold;">x</strong></a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });

    /*=========== Products Attributes Add Remove Input Fields Dynamically =============*/


    // Update Attributes Status
        $(document).on("click",".updateAttributeStatus",function () {

            var status  = $(this).children("em").attr("status");
            var attribute_id = $(this).attr("attribute_id");
            // alert(admin_id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-attribute-status',
                data: {
                    status:status,
                    attribute_id:attribute_id
                },
                success:function(resp){
                    if (resp['status']== 0)
                    {
                        $("#attribute-"+attribute_id).html("<em class='icon ni ni-cross-fill-c text-danger' status='Inactive' style='font-size: 25px'></em>");
                    }
                    else if (resp['status']== 1)
                    {
                        $("#attribute-"+attribute_id).html("<em class='icon ni ni-check-fill-c text-success' status='Active' style='font-size: 25px'></em>");
                    }
                    // alert(resp);
                },
                error:function(){
                    alert("Error");
                }
            })
        });


    // Update Banners Status
        $(document).on("click",".updateBannerstatus",function () {

            var status  = $(this).children("em").attr("status");
            var banner_id = $(this).attr("banner_id");
            // alert(admin_id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/update-banner-status',
                data: {
                    status:status,
                    banner_id:banner_id
                },
                success:function(resp){
                    if (resp['status']== 0)
                    {
                        $("#banner-"+banner_id).html("<em class='icon ni ni-cross-fill-c text-danger' status='Inactive' style='font-size: 25px'></em>");
                    }
                    else if (resp['status']== 1)
                    {
                        $("#banner-"+banner_id).html("<em class='icon ni ni-check-fill-c text-success' status='Active' style='font-size: 25px'></em>");
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
