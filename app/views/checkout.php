<?php require_once '../partials/template.php'; ?>

<?php function get_page_content() {
	if(isset($_SESSION['user']) && $_SESSION['user']['roles_id'] ==2){
	global $conn;
	?>


	<?php 
		if (!isset($_SESSION['user'])) 
			{header("Location: ./login.php");
		}


	?>
	<h1>This is the chekcout page</h1>
	<form method="POST" action="../controllers/placeorder.php">
		<div class="container mt-4">
			<div class="row">
				<div class="col-8">
					<h4>Shipping Address</h4>
				
					<div class="form-group">
					<input type="text" class="form-control" name="addressLine1" value="<?php echo $_SESSION['user']['address']; ?>">
					</div>
				</div> <!-- end col -->
				<div class="col-sm-4">
					<h4>Payment Methods</h4>
					<select name="payment_mode" id="payment_mode" class="form-control">
						<?php
						$payment_mode_query = "SELECT * FROM payment_modes";
						$payment_modes = mysqli_query($conn, $payment_mode_query);
						foreach ($payment_modes as $payment_mode) {
							extract($payment_mode);
							echo "<option value='$id'>$name</option>";
						}
						 ?>
						
					</select>
				</div>

			</div> <!-- end row -->
			<div class="row">
				<h4>Order Summary</h4>
				<div class="col-sm-6">
					<p> Total </p>
				</div>
				<div class="col-sm-6" id="total_pricae">
					<?php 
						$cart_total = 0;

						//var_dump($_SESSION['cart']);

						foreach ($_SESSION['cart'] as $id => $qty) {
							$sql = "SELECT * FROM items WHERE id =$id";
							$result = mysqli_query($conn, $sql);
							$item = mysqli_fetch_assoc($result);


							//var_dump($_SESSION['cart'][$id]);

							$subTotal = $_SESSION['cart'][$id] * $item['price'];
							# code...
							// $cart_total = $cart_total + $subTotal
								$cart_total += $subTotal;

						}

						echo $cart_total;

					?>

				</div> <!-- end total price -->
			</div> <!-- end row -->
			<hr>
			<button type="submit" class="btn btn-success btn-block">Place Order Now</button>

			<div class="row cart-items mt-4">
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="cart-items">
						<thead>
							<tr class="text-center">
								<th colspan="2"> Item Name </th>
								<th> Item Price </th>
								<th> Item Quantity</th>
								<th> Item Subtotal</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($_SESSION['cart'] as $id => $qty) {
								$sql2 = "SELECT * FROM items WHERE id=$id;";
								$result = mysqli_query($conn, $sql2);
								//var_dump($result);

								$item = mysqli_fetch_assoc($result);
								//var_dump($item);
								?>

								<td class="text-center" colspan="2"><?php echo $item['name']; ?></td>
								<td class="text-center"><?php echo $item['price']; ?></td> 
								<td class="text-center"><?php echo $qty; ?></td> 
								<td class="text-center"><?php echo $qty * $item['price']; ?></td> 
						</tbody>
							 <?php } ?>

					</table>
				</div> <!-- end of summary row -->
			</div>	<!-- end container -->
		</div>
		
	</form>

<?php } else {
	header('location: ./error.php');
	
} ?>

<?php } ?>