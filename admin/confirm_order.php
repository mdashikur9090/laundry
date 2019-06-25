
<?php  
  include_once 'inc/db_config.php';
  include_once 'inc/header.php';

  if (!isset($_SESSION["user_loged"])) {

    header('Location: login.php');
  }

  
  include_once 'inc/nav.php';
?>
	<div class="content-wrapper p-md-5">
		<div class="container">
			<div class="order-form">
				<form action="form_submit/edit_cloth.php" method="post"  class="product_form">
	                <div class="row">
	                	<div class="col-md-6">
		                	<label for="pro_id">Cloth ID</label>
			                <input type="number" value="" id="pro_id" name="cloth_id" readonly>

			                <label for="pro_name">Cloth Name</label>
			                <input type="text" id="pro_name" value="" name="cloth_name">
		                </div>

		                <div class="col-md-6">
		                	<label for="pro_code">Cloth Code</label>
		                	<input type="text" id="pro_code" value="" name="cloth_code">
		                </div>
	                </div>

	                <table class="table table-hover text-center table-striped">
	                	<thead class="bg-primary text-white">
	                		<tr>
	                			<th>id</th>
	                			<th>Short Code</th>
	                			<th>Service</th>
	                			<th>Cloth Type</th>
	                			<th>Qty</th>
	                			<th>Pice</th>
	                			<th>Total</th>
	                			<th>
	                				<button type="button">
	                					<span class="fa fa-plus"></span> Add Item
	                				</button>
	                			</th>
	                		</tr>
	                	</thead>
	                	<tbody>
	                		<tr>
	                			<td>item-01</td>
	                			<td>item-02</td>
	                			<td>item-03</td>
	                			<td>item-04</td>
	                			<td>item-05</td>
	                			<td>item-06</td>
	                			<td>item-07</td>
	                			<td class="text-center">
	                				<a href="#">
	                					<span class="fa fa-trash fa-2x text-danger"></span>
	                				</a>
	                			</td>
	                		</tr>
	                	</tbody>
	                </table>

	                <div class="row">
	                	<div class="col-md-6">
	                		<label for="pro_id">Cloth ID</label>
			                <input type="number" value="" id="pro_id" name="cloth_id" readonly>

			                <label for="pro_name">Cloth Name</label>
			                <input type="text" id="pro_name" value="" name="cloth_name">

			                <label for="pro_code">Cloth Code</label>
		                	<input type="text" id="pro_code" value="" name="cloth_code">
	                	</div>
	                	<div class="col-md-6">
	                		<label for="pro_id">Cloth ID</label>
			                <input type="number" value="" id="pro_id" name="cloth_id" readonly>

			                <label for="pro_name">Cloth Name</label>
			                <input type="text" id="pro_name" value="" name="cloth_name">

			                <label for="pro_code">Cloth Code</label>
		                	<input type="text" id="pro_code" value="" name="cloth_code">
	                	</div>
	                </div>
	                <br><br>
	                <div class="text-center text-uppercase">
	                  <button type="submit" class="btn-lg btn-success">Save</button>
	                  &nbsp;&nbsp;&nbsp;&nbsp;
	                  <button type="reset" class="btn-lg btn-info">Reset</button>
	                </div>

	             </form>
			</div>
		</div>
	

<?php 
	include_once 'inc/footer.php';
?>