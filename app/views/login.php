<?php require_once '../partials/template.php'; ?>

<?php function get_page_content() { ?>
	
	<div class="container">
		<div class="jumbotron bg-dark text-light text-center mt-5">
			<h4>Login</h4>
		</div> <!-- end jumbo -->

		<form>
			<div class="form-group">
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
				<span class="validation"></span>
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
				<span class="validation"></span>
			</div>

			<div class="text-center py-4">
				<a href="./register.php" class="btn btn-secondary">Register</a>
				<button type="submit" class="btn btn-primary" id="login">Login</button>
			</div>
		</form>
	</div> <!-- end container -->

<?php } ?>