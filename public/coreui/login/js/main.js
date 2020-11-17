$(function(){
	$.validate({
        modules : 'security'
    });

    let url = window.location.href;
    let arr = url.split("/");
    let base_url = arr[0] + "//" + arr[2]
    

    $('.btn-login').html('<i class="fa fa-sign-in px-1"></i> NEXT');

})