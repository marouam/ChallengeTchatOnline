
jQuery(document).ready(function() {
    // First Page
    // Form to hide or to show
    //Edited BY Majdoul M
	$('.signUpLink').on('click', function () {
      console.log("NOUVEAU ! ");
      $("#contentSignIn").hide();
      $("#contentSignUp").show();
    });

    $('.signInLink').on('click', function () {
      console.log("NOUVEAU ! ");
      $("#contentSignIn").show();
      $("#contentSignUp").hide();
    });

    //
    /*
        Fullscreen background
    */
    $.backstretch("public/images/backgrounds/1.jpg");
    
    /*
        Form validation
    */
    $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.login-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
    
});
