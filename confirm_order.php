
<?php  
  include_once 'inc/db_config.php';
  include_once 'inc/header.php';

  if (!isset($_SESSION["user_loged"])) {

    header('Location: login.php');
  }

  include_once 'inc/nav.php';

if (empty($_POST['order_date']) || empty($_POST['service_name']) || empty($_POST['cloth_type']) || empty($_POST['qty'])) {
	# code...
	header('Location: order.php');
}else{

	$order_date=$_POST['order_date'];
	$service_id=$_POST['service_name'];
	$cloth_id=$_POST['cloth_type'];
	$qty=$_POST['qty'];
}
  
  

  
  


?>
	<div class="content-wrapper p-md-5">
		<div class="container">
			<div class="order-form">
				<form action="form_submit/confirm_order.php" method="post"  class="product_form">
	                <div class="row">
	                	<div class="col-md-6">
		                	<label for="invoice_num">Invoice Number</label>
			                <input type="text" value="<?= uniqid(); ?>" id="invoice_num" name="invoice_num" readonly>

			                <label for="order_date">Order Date</label>
			                <input type="text" id="order_date" value="<?= $order_date ?>" name="order_date">

			                <label for="expect_d_date">Expected Delivery Date</label>
			                <input type="Date" id="expect_d_date" value="" required name="expect_d_date">
		                </div>

		                <div class="col-md-6">
		                	<label for="name">Name</label>
		                	<input type="text" id="name" value="<?= $_SESSION["user_name"] ?>" name="name">

		                	<label for="payment_type">Payment Type</label>
		                	<select id="payment_type" name="payment_type">
		                		<option value="Card">
		                			Debit/Credit Card
			                	</option>
			                	<option value="CashOnDelivery">
		                			Cash On Delivery
			                	</option>
			                </select>
		                </div>
	                </div>

	                <table class="table table-hover text-center table-striped" id="order_list_table">
	                	<thead class="bg-primary text-white">
	                		<tr>
	                			<th>id</th>
	                			<th>Short Code</th>
	                			<th>Service</th>
	                			<th>Cloth Type</th>
	                			<th>Qty</th>
	                			<th>Price</th>
	                			<th>Total</th>
	                			<th>Discount</th>
	                			<th>Vat(%)</th>
	                			<th>Vat Amount</th>
	                			<th>Grand Total</th>
	                		</tr>
	                	</thead>
	                	<tbody>
	                		
	                		<?php 

	                		for ($i=0; $i <count($qty) ; $i++) { 
	                			
	                				# code...
	                			$pricingSQL="SELECT pricing.`short_code`, services.`service_name`, cloths.`cloth_type`, pricing.`vat`, pricing.`price`, pricing.`discount` FROM `pricing` INNER JOIN services ON (pricing.service_id=services.id) INNER JOIN cloths ON (pricing.cloth_id=cloths.id) WHERE pricing.service_id=".$service_id[$i]." AND pricing.cloth_id=".$cloth_id[$i].";";



	                			$sql_result = DB_Query($pricingSQL);
							            while ($row = mysqli_fetch_assoc($sql_result)) {
							                  extract($row);

							                  $total = $qty[$i]*$price;
							                  $dis = ($total/100)*$discount;
							                  $total_vat = (($total-$dis)/100)*$vat;
							                  $grand_total = $total-$dis+$total_vat;
	                		 ?>

	                		<tr>
	                			<td><?= $i+1 ?></td>
	                			<td><?= $short_code ?></td>
	                			<td><?= $service_name ?></td>
	                			<input type="hidden" value="<?= $service_id[$i] ?>" name="service_id[]">
	                			<td><?= $cloth_type ?></td>
	                			<input type="hidden" value="<?= $cloth_id[$i] ?>" name="cloth_id[]">
	                			<td><?= $qty[$i] ?></td>
	                			<input type="hidden" value="<?= $qty[$i] ?>" name="qty[]">
	                			<td><?= $price ?></td>
	                			<td><?= $total ?> </td>
	                			<td><?= $dis ?></td>
	                			<input type="hidden" value="<?= $dis ?>" name="dis[]">
	                			<td><?= $vat ?> </td>
	                			<td><?= $total_vat ?> </td>
	                			<input type="hidden" value="<?= $total_vat ?>" name="total_vat[]">
	                			<td><?= $grand_total ?> </td>
	                			<input type="hidden" value="<?= $grand_total ?>" name="grand_total[]">
	                		</tr>

	                		<?php } } ?>

	                	</tbody>
	                </table>

	                <br><br>

	                <div class="row">
	                	<div class="col-md-6">
		                	<label for="card_number">We Accept</label><br>
			                <img src="avatars/credit-cards.png" alt="Card Accept" height="80%", width="80%">
		                </div>

		                <div class="col-md-6">
		                	<label for="card_number">Card Number</label>
		                	<input type="Number" value="" id="card_number" name="card_number" required >
		                </div>
	                </div>
	                

	                
	                <br><br><br><br>
	                <div class="text-center text-uppercase">
	                  <button type="submit" class="btn-lg btn-success">Confirm Order</button>
	                  &nbsp;&nbsp;&nbsp;&nbsp;
	                  <button type="reset" class="btn-lg btn-info">Cancel</button>
	                </div>



	             </form>
			</div>
		</div>
	

<?php 
	include_once 'inc/footer.php';
?>