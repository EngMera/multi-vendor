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
    

});