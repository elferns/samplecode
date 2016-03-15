<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
        	<form name="login" id="loginForm" method="post" action="<?php echo $form_action; ?>">
	            <div class="form-login">
	            <h4>Welcome to booking portal</h4>
		           	<div class="form-group">

			            <input type="email" class="form-control" id="inputEmail" name="inputEmail" required placeholder="Email">
			            <div class="help-block with-errors"></div>

			        </div>

			        <div class="form-group">

			           <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
			           <div class="help-block with-errors"></div>

			        </div>

			        <button type="submit" class="btn btn-primary">Login</button>
	            </div>
        	</form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {

$('#inputEmail').val('');
$('#inputPassword').val('');

$('#loginForm')
        .bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                email: {
                    validators: {
                    	notEmpty: {
                            message: 'The email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        },
                        different: {
                            field: 'username',
                            message: 'The password cannot be the same as username'
                        }
                    }
                }
            }
        })
 });
</script>