
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

      <!-- Tables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Customer Data Table
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Number</th>
                  <th>Join Date</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>address</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Status</th>
                  <th>passwords</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Number</th>
                  <th>Join Date </th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>address</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Status</th>
                  <th>passwords</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              <?php 
                $table = DB_Query("SELECT * FROM customers");
                $i = 1; 
                while ($data_tbl = mysqli_fetch_assoc($table)) {
                  extract($data_tbl);
                  $customer_id = $id;
                  ?>
              
                <tr>
                  <td class="text-center">
                    <!-- <input type="checkbox"> -->
                    <?= $id ?>
                  </td>
                  <td><?= $join_date ?></td>
                  <td><?= $first_name ?></td>
                  <td><?= $last_name ?></td>
                  <td><?= $address ?></td>
                  <td><?= $email_id ?></td>
                  <td><?= $mobile ?></td>
                  <td><?= $status ?></td>
                  <td><?= $password ?></td>
                  <td>
                  <button type="submit" name="edit" data-toggle="modal" data-target="#edit_customer_modal<?= $customer_id ?>">
                      <i class="fa fa-pencil text-success"></i>
                    </button>
                    <?php if ($_SESSION["user_role"]==0): ?>

                      &nbsp;&nbsp;
                    <button type="submit" name="del" data-toggle="modal" data-target="#delete_modal<?= $customer_id ?>">
                      <i class="fa fa-trash text-danger"></i>
                    </button>
                      
                    <?php endif ?>
                  </td>
                </tr>

                <!--Start Modals-->
                  <div class="modal fade" id="edit_customer_modal<?= $customer_id ?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content form-modal">
                        <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                        
                        <form action="form_submit/edit_customer.php" method="post" class="product_form">


                          <label for="customer_id">Customer ID</label>
                          <input type="number" id="customer_id" value="<?= $customer_id ?>" name="id" readonly>

                          <label for="join_date">Join Date</label>
                          <input type="text" id="join_date" value="<?= $join_date ?>" name="join_date">

                          <label for="first_name">Last Name</label>
                          <input type="text" id="first_name" value="<?= $first_name ?>" name="first_name">

                          <label for="last_name">First Name</label>
                          <input type="text" id="last_name" value="<?= $last_name ?>" name="last_name">
                          

                          <label for="email_id">Email</label>
                          <input type="text" id="email_id" value="<?= $email_id ?>" name="email_id">

                          <label for="mobile_num">Mobile</label>
                          <input type="text" id="mobile_num" value="<?= $mobile ?>" name="mobile">
                          
                          <label for="address">Address</label>
                          <textarea type="text" id="address" name="address"><?= $address ?></textarea>

                          <label for="passcode">Password</label>
                          <input type="text" id="passcode" value="<?= $password ?>" name="password">

                          <label for="status">Status</label>
                          <select id="status" name="status">
                            <option value="enable"

                                <?php if ($status == "enable" ) { ?>
                                  selected="selected"
                                <?php } ?>

                            > Enable </option>

                            <option value="disable"

                                <?php if ($status == "disable" ) { ?>
                                  selected="selected"
                                <?php } ?>

                            > Disable </option>

                        </select>
                          <br><br>
                          <div class="text-center text-uppercase">
                            <button type="submit" class="btn-lg btn-success">save</button>
                          </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>
                  <!-- End Edit Modal -->

                  <?php if ($_SESSION["user_role"]==0): ?>

                    <!--Star Delete Modal -->
                  <div class="modal fade" id="delete_modal<?= $customer_id ?>">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content form-modal">
                        <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                        
                        <form action="form_submit/delete_item.php" method="post"  class="product_form">
                          <label for="delId">Are you Sure to Delete The Item of <?= $customer_id ?>.</label>
                          <input type="hidden" value="<?= $customer_id ?>" name="id">
                          <input type="hidden" value="customers" name="table_name">
                          <br><br>
                          <div class="text-center text-uppercase">
                            <button type="submit" class="btn-lg btn-success">Yes</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button data-dismiss="modal" class="btn-lg btn-info">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- End Delete Modal -->
                    
                  <?php endif ?>

                  


              
              <?php $i++; } ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated</div>
      </div>
    </div>
    <!-- /.container-fluid-->
  </div>






  
    
<?php 
  include_once 'inc/footer.php';
?>