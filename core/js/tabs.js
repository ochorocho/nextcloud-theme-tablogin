jQuery(document).ready(function() {
    // Override "alternate_login_force" is set in localStorage
    var cookie = document.cookie.split('=');

    if(cookie[1] === "true") {
        $('#login-tabs .active').removeClass('active');
        $('.login-tabs .title:last-child').addClass('active');
        $('#tab-alternate-login').addClass('active');
    }else if(cookie[1] === "false") {
        $('#login-tabs .active').removeClass('active');
        $('.login-tabs .title:first-child').addClass('active');
        $('#tab-login').addClass('active');
    }

    // Show/hide tabs
    $('.login-tabs .title').click(function () {
        $('#login-tabs .active').removeClass('active');

        if($(this).data('tab') === 'tab-alternate-login') {
            $(this).addClass('active');
            $('#tab-alternate-login').addClass('active');

            document.cookie = "nc_alternate_login_force=true; path=/";
        } else {
            $(this).addClass('active');
            $('#tab-login').addClass('active');

            document.cookie = "nc_alternate_login_force=false; path=/";
        }
    });
});
