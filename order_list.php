
<?php  
  include_once 'inc/db_config.php';
  include_once 'inc/header.php';

  if (!isset($_SESSION["user_loged"])) {

    header('Location: login.php');
  }
  
  include_once 'inc/nav.php';
?>



<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Order List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              
              <?php if ($_SESSION["user_role"]==2) { ?>

                <thead>
                  <tr>
                  <th>Invoice Number</th>
                  <th>Order Date</th>
                  <th>Service name</th>
                  <th>Cloth Type</th>
                  <th>Quartity</th>
                  <th>Total Vat</th>
                  <th>Total price</th>
                  <th>Delivery Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Invoice Number</th>
                  <th>Order Date</th>
                  <th>Service name</th>
                  <th>Cloth Type</th>
                  <th>Quartity</th>
                  <th>Total Vat</th>
                  <th>Total price</th>
                  <th>Delivery Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>

              <tbody>

                <?php 

                  $sqlResult = DB_Query("SELECT orders.`invoice_no`, orders.`order_date`, orders.`customer_id`, orders.`discount`, orders.`total_vat`, orders.`grand_total`, orders.`delivery_date`, orders.`order_status`, services.service_name, cloths.cloth_type, orders_items.qty FROM `orders` INNER JOIN orders_items ON (orders.invoice_no=orders_items.invoice_no) INNER JOIN services ON (orders_items.service_id=services.id) INNER JOIN cloths ON (orders_items.cloth_type=cloths.id) WHERE orders.customer_id=".$_SESSION["user_id"]." ORDER BY orders.order_date DESC");

                  while ($row = mysqli_fetch_assoc($sqlResult)) {
                  extract($row);


                 ?>

             
                <tr>
                  <td><?= $invoice_no ?></td>
                  <td><?= $order_date ?></td>
                  <td><?= $service_name ?></td>
                  <td><?= $cloth_type ?></td>
                  <td><?= $qty ?></td>
                  <td><?= $total_vat ?></td>
                  <td><?= $grand_total ?></td>
                  <td><?= $delivery_date ?></td>
                  <td><?= $order_status ?></td>
                  <td>
                    <?php if($order_status == "Pending"){  ?>
                        <form action="form_submit/delete_item.php" method="post">
                          <input type="hidden" value="orders" name="table_name">
                          <input type="hidden" value="<?= $invoice_no ?>" name="id">
                          <button type="submit" name="update_order">
                              <i class="fa fa-trash text-danger"></i>
                            </button>
                        </form>
                      <?php }  ?>
                  </td>
                </tr>


                <?php } ?>
    
                
              </tbody>

              <?php }else{ ?>


                <thead>
                  <tr>
                  <th>Invoice Number</th>
                  <th>Order Date</th>
                  <th>Service name</th>
                  <th>Cloth Type</th>
                  <th>Quartity</th>
                  <th>Total Vat</th>
                  <th>Total price</th>
                  <th>Delivery Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Invoice Number</th>
                  <th>Order Date</th>
                  <th>Service name</th>
                  <th>Cloth Type</th>
                  <th>Quartity</th>
                  <th>Total Vat</th>
                  <th>Total price</th>
                  <th>Delivery Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>

              <?php 

                  $sqlResult = DB_Query("SELECT orders.`invoice_no`, orders.`order_date`, orders.`customer_id`, orders.`discount`, orders.`total_vat`, orders.`grand_total`, orders.`delivery_date`, orders.`order_status`, services.service_name, cloths.cloth_type, orders_items.qty FROM `orders` INNER JOIN orders_items ON (orders.invoice_no=orders_items.invoice_no) INNER JOIN services ON (orders_items.service_id=services.id) INNER JOIN cloths ON (orders_items.cloth_type=cloths.id)");

                  while ($row = mysqli_fetch_assoc($sqlResult)) {
                  extract($row);


                 ?>

             
                <tr>
                  <form action="form_submit/update_order.php" method="post">
                  <input type="hidden" value="<?= $invoice_no ?>"  name="invoice_no"  >  
                  <td><?= $invoice_no ?></td>
                  <td><?= $order_date ?></td>
                  <td><?= $service_name ?></td>
                  <td><?= $cloth_type ?></td>
                  <td><?= $qty ?></td>
                  <td><?= $total_vat ?></td>
                  <td><?= $grand_total ?></td>
                  <td>
                    <input type="Date" value="<?= $delivery_date ?>" required name="delivery_date" >    
                  </td>
                  <td>
                    <select id="order_status" name="order_status" required>
                        <option value="Delivered"

                            <?php if ($order_status == "Delivered" ) { ?>
                              selected="selected"
                            <?php } ?>

                        > Delivered </option>

                        <option value="Pending"

                            <?php if ($order_status == "Pending" ) { ?>
                              selected="selected"
                            <?php } ?>

                        > Pending </option>

                        </select>                      
                    </td>
                    <td>
                      <button type="submit" name="update_order">
                          <i class="fa fa-check text-success"></i>
                        </button>
                    </form>
                      <?php if($order_status == "Pending"){  ?>
                        <form action="form_submit/delete_item.php" method="post">
                          <input type="hidden" value="orders" name="table_name">
                          <input type="hidden" value="<?= $invoice_no ?>" name="id">
                          <button type="submit" name="update_order">
                              <i class="fa fa-trash text-danger"></i>
                            </button>
                        </form>
                      <?php }  ?>
                    </td>
                    
                </tr>


                <?php } ?>
    
                
              </tbody>


             <?php } ?>

                
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated</div>
      </div>
    </div>
    <!-- /.container-fluid-->




    
  
    
<?php 
  include_once 'inc/footer.php';
?>