
<?php require_once '../partials/template.php'; ?>


<!-- insert your page content here -->


<?php function get_page_content() { ?>

	<div class="container bg-primary rounded p-3 mt-5">
		<h1 class="text-center"> Register </h1>
		<form id="register_form" action="../controllers/register_endpoint.php" method="POST">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" class="form-control">
				<span></span>
			</div>	
	
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
				<span></span>
			</div>
			<div class="form-group">
				<label for="confirm_password">Confirm Password</label>
				<input type="password" name="confirm_password" id="confirm_password" class="form-control">
				<span></span>
			</div>
			<button id="registerBtn" type="button" class="btn btn-outline-dark btn-block mb-5">Register</button>
		</form>
	</div>
	<script>

		$('#registerBtn').click( () => {
			//put validation here
			let errorFlag = false;
			const username = $('#username').val();
			//username field is empty
			if (username == 0) {
				$('#username').next().css('color', 'red');
				$('#username').next().html('this field is required');
				errorFlag = true;
			} else {
				//username already exists
				$.ajax({
					url : '../controllers/check_username.php',
					method: 'post',
					data: {username:username},
					async: false //you need to complete this before proceeding
				}).done( data => {
					//if uname exists, send me an error. else allow it 
						console.log(data);
					if (data == "meron") {
						$('#username').next().css('color', 'red');
						$('#username').next().html('username is already taken');
						errorFlag = true;
					} else {
						//pag hindi meron, anong mangyayari?
						//username is available
						$('#username').next().css('color', 'green');
						$('#username').next().html('username available');


					}
				});
			}

			const password = $('#password').val();
			const confirmPassword = $('#confirm_password').val();
			

			//password field is empty
			if (password.length == 0) {
				$('#password').next().css('color', 'red');
				$('#password').next().html('this field is required');
				errorFlag = true;
			} else {
				$('#password').next().html(''); //removes the error msg
				//passwords do not match
				if (password !== confirmPassword) {
					$('#confirm_password').next().css('color', 'red');
					$('#confirm_password').next().html('passwords do not match');
					errorFlag = true;
				}
			}
			
			if (errorFlag == false) {
				$('#register_form').submit();
			}
			
		});

			if (true) {

			} else {
				
			}

			
					

					

	</script>
<?php }; ?>
