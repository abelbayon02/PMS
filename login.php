<?php 
include 'core/config.php';
(isset($_SESSION['user_id']))?header("Location: project/index.php"):"";
?>
<!DOCTYPE html>
<html>
<head>
	<title>PMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Project Management is the key." />
	<link href="assets/images/pms-logo.png" rel="icon">
	<link href="assets/images/pms-logo.png" rel="apple-touch-icon">
   	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
   	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
</head>
<style type="text/css">
	@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css);
	@import url(https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css);

.hm-gradient {
    background-image: url("assets/images/pms-bg2.jpg");
    background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
	height: 100%;

}
.blur{
	backdrop-filter: blur(3px);
    padding: 5px;
    height: 625px;
}
.darken-grey-text {
    color: #2E2E2E;
}
.danger-text {
    color: #ff3547; }
.default-text {
    color: #2BBBAD; 
}
.info-text {
    color: #33b5e5; 
}
.form-white .md-form label {
  color: #fff; 
}
.form-white2 .md-form label {
  color: black; 
}
.form-white input[type=text]:focus:not([readonly]) {
    border-bottom: 1px solid #fff;
    -webkit-box-shadow: 0 1px 0 0 #fff;
    box-shadow: 0 1px 0 0 #fff; 
}
.form-white input[type=text]:focus:not([readonly]) + label {
    color: #fff; 
}
.form-white input[type=password]:focus:not([readonly]) {
    border-bottom: 1px solid #fff;
    -webkit-box-shadow: 0 1px 0 0 #fff;
    box-shadow: 0 1px 0 0 #fff; 
}
.form-white input[type=password]:focus:not([readonly]) + label {
    color: #fff; 
}
.form-white input[type=password], .form-white input[type=text] {
    border-bottom: 1px solid #fff; 
}
.form-white .form-control:focus {
    color: #fff;
}
.form-white .form-control {
    color: #fff;
}
.form-white textarea.md-textarea:focus:not([readonly]) {
    border-bottom: 1px solid #fff;
    box-shadow: 0 1px 0 0 #fff;
    color: #fff; 
}
.form-white textarea.md-textarea  {
    border-bottom: 1px solid #fff;
    color: #fff;
}
.form-white textarea.md-textarea:focus:not([readonly])+label {
    color: #fff;
}
</style>

<body class="hm-gradient">
	<div class="blur">
    <main>
        <!--MDB Forms-->
        
        	<div class="container mt-4">
	            <!-- Grid row -->
	            <div class="row justify-content-end">
	                <!-- Grid column -->
	                <div class="col-md-5">
	                	<form method='POST' id="login-entry">
	                		<div class="card form-white" style="background-color: #00225099!important">
		                        <div class="card-body">
		                            <h3 class="text-center white-text py-3">
		                             <img src='assets/images/pms-logo.png' style="height: 55px;width: 55px;">
		                         	</h3>
		                            <!--Body-->
		                            
		                            <div class="md-form">
		                                <i class="fa fa-user prefix white-text"></i>
		                                <input type="text" id="defaultForm-email1" required name='login_username' id="login_username" class="form-control">
		                                <label for="defaultForm-email1">Username</label>
		                            </div>
		                            <div class="md-form">
		                                <i class="fa fa-lock prefix white-text"></i>
		                                <input type="password" id="defaultForm-pass1" name='login_password' id='login_password' class="form-control">
		                                <label for="defaultForm-pass1">Password</label>
		                            </div>
		                            <div class="text-center">
		                                <button type="submit" id="submit_btn" class="btn btn-outline-white waves-effect waves-light">Login</button>
		                            </div>
		                            <div class="text-center" id="login-alert">
		                                
		                            </div>
		                        </div>
		                    </div>
	                	</form>
	                	<h6 style="text-align: right;padding: 10px;font-size: 13px;color: white;">
		                	<a href="#" data-toggle='modal' data-target='#newAccntModal'>Create New Account</a>
		                </h6>
	                </div>
	                
	                <!-- Grid column -->
	            </div>
	            <!-- Grid row -->
	        </div>
	        <!--MDB Forms--> 
    </main>
    </div>
    <?php require 'project/modals/create_account_modal.php'; ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
<script type="text/javascript">
	$(document).ready( function(){
		$("#login-entry").on("submit", function(e){
			e.preventDefault();
			$("#submit_btn").prop("disabled", true);
			$("#submit_btn").html("<span class='fa fa-spin fa-spinner'></span> Authenticating");
			var url = 'project/ajax/auth.php';
            var data = $(this).serialize();
            $.post(url , data , function(data){
                if(data > 0){
                   	$("#login-alert").html("<h5 style='color:green;text-align:center;' class='animate__animated animate__fadeIn alert alert-success'><span class='fas fa-check-circle'></span> Successfully logged in.<h5>");
                   	window.location = 'project/index.php?access=dashboard';
                }else{
                   setTimeout(function(){
                    $("#login-alert").html("");
                   }, 3000);
                   $("#login-alert").html("<h5 style='color:red;text-align:center;' class='animate__animated animate__shakeX alert alert-danger'><span class='fas fa-exclamation-triangle'></span> Credentials did not matched!<h5>");
                }
                $("#login_password").val("");
                $("#login_username").val("");
                $("#submit_btn").prop("disabled", false);
                $("#submit_btn").html("Login");
            });
		});

		$("#create-new").on("submit", function(e){
			e.preventDefault();
			var url = "project/ajax/create_new_account.php";
			var this_data = $(this).serialize();
			var new_email = $("#new_email").val();
			var login_username = $("#login_username").val();
			$.post("project/ajax/check_email_username_if_exist.php", {
				new_email: new_email,
				login_username: login_username
			}, function(data){
				var if_exist = data.split(",");
				if(if_exist[0] > 0){
					$("#email_exist_response").html("Email Address Already Exist, Please provide different email.");
					$("#email_exist_response").addClass('animate__animated animate__shakeX');
				}else if(if_exist[1] > 0){
					$("#username_exist_response").html("Username Already Exist, Please provide different username.");
					$("#username_exist_response").addClass('animate__animated animate__shakeX');
				}else if(if_exist[0] > 0 && if_exist[1] > 0){
					$("#email_exist_response").html("Email Address Already Exist, Please provide different email.");
					$("#email_exist_response").addClass('animate__animated animate__shakeX');

					$("#username_exist_response").html("Username Already Exist, Please provide different username.");
					$("#username_exist_response").addClass('animate__animated animate__shakeX');
				}else{
					$("#email_exist_response").html("");
					$("#username_exist_response").html("");
					create_new_account(url, this_data);
				}
			})
		});
	});
	function create_new_account(url, this_data){
		$("#create_btn").prop("disabled", true);
		$("#create_btn").html("<span class='fa fa-spin fa-spinner'></span> Loading");
		$.post(url, this_data, function(data){
			if(data > 0){
				$("#register-response").html("Registration Successfully Completed.");
				$("#register-response").addClass("animate__animated animate__fadeIn alert alert-success");
			}else{
				$("#register-response").html("Unable to Save your data, Please try again later.");
				$("#register-response").addClass("animate__animated animate__shakeX alert alert-danger");
			}

			$("#create_btn").html("Save Changes");
		})
	}
</script>
</body> 
</html>