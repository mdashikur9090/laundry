
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
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <button data-toggle="modal" data-target="#addNew" >Add New</button>
        </li>
        <li class="breadcrumb-item active">Expence Type</li>
      </ol>

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Expence Data
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Number</th>
                  <th>Expence Date</th>
                  <th>Expence Type</th>
                  <th>Pay To</th>
                  <th>Expence Amount</th>
                  <th>Expence Paid By</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Number</th>
                  <th>Expence Date</th>
                  <th>Expence Type</th>
                  <th>Pay To</th>
                  <th>Expence Amount</th>
                  <th>Expence Paid By</th>
                  <th>Action</th>
                </tr>
              </tfoot>

              <tbody>
                
              <?php 
                $table = DB_Query("SELECT * FROM expenses");
                while ($data_tbl = mysqli_fetch_assoc($table)) {
                  extract($data_tbl);
                  ?>
                <tr>
                  <td class="text-center">
                    <!-- <input type="checkbox"> -->
                    <?= $exp_id ?>
                  </td>
                  <td><?= $exps_date ?></td>
                  <td><?= $exp_type ?></td>
                  <td><?= $pay_to ?></td>
                  <td><?= $exp_amt ?></td>
                  <td><?= $exp_paidby ?></td>
                  <td>
                  <button type="submit" name="edit" data-toggle="modal" data-target="#edit_expence_modal<?= $exp_id ?>">
                      <i class="fa fa-pencil text-success"></i>
                    </button>&nbsp;&nbsp;
                    <button type="submit" name="del" data-toggle="modal" data-target="#delete_modal<?= $exp_id ?>">
                      <i class="fa fa-trash text-danger"></i>
                    </button>
                  </td>
                </tr>
              

                <!-- Modal -->
                <div class="modal fade" id="edit_expence_modal<?= $exp_id ?>">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content form-modal">
                      <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                      
                      <form action="form_submit/edit_expences.php" method="post"  class="product_form">
                        <label for="exp_id">Empence Id</label>
                        <input type="number" value="<?= $exp_id ?>" id="exp_id" name="exp_id" readonly>

                        <label for="exps_date">Expence Date</label>
                        <input type="Date" id="exps_date" value="<?= $exps_date ?>" name="exps_date">

                        <label for="exp_type_id">Expence Type</label>
                        <select id="exp_type_id" name="exp_type_id">
                          <?php
                            $sql_query="SELECT expense_type.exps_id, expense_type.exps_type FROM `expenses` INNER JOIN expense_type ON(expenses.exp_type=expense_type.exps_id) WHERE `exp_id`=".$exp_id.";";
                            $sql_result = DB_Query($sql_query);
                            while ($row = mysqli_fetch_assoc($sql_result)) {
                                  extract($row);
                          ?>

                            <option value="<?= $exps_id ?>"
                              <?php if ($exp_type==$exps_id): ?>
                                selected="selected"
                              <?php endif ?>
                              ><?= $exps_type ?></option>

                          <?php } ?>
                        </select>
                        

                        <label for="pay_to">Pay_to</label>
                        <input type="text" id="pay_to" value="<?= $pay_to ?>" name="pay_to">

                        <label for="exp_amt">Expence Code</label>
                        <input type="number" id="exp_amt" value="<?= $exp_amt ?>" name="exp_amt">

                        <label for="exp_paidby">Expence Paid By</label>
                        <input type="text" id="exp_paidby" value="<?= $exp_paidby ?>" name="exp_paidby">
                        <br><br>
                        <div class="text-center text-uppercase">
                          <button type="submit" class="btn-lg btn-success">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Edit Modal -->

                  <?php if ($_SESSION["user_role"]==0): ?>

                    <!--Star Delete Modal -->
                  <div class="modal fade" id="delete_modal<?= $exp_id ?>">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content form-modal">
                        <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                        
                        <form action="form_submit/delete_item.php" method="post"  class="product_form">
                          <label for="delId">Are you Sure to Delete The ID Number <?= $exp_id ?>.</label>
                          <input type="hidden" value="<?= $exp_id ?>" name="id">
                          <input type="hidden" value="expenses" name="table_name">
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
        
              <?php  } ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated</div>
      </div>
    </div>
    <!-- /.container-fluid-->
  </div>



  <!-- Modal -->
  <div class="modal fade" id="addNew">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content form-modal">
        <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
        
        <form action="form_submit/add_expence.php" method="post" class="product_form">

          <label for="exps_date">Expence Date</label>
          <input type="Date" id="exps_date" name="exps_date">

          <label for="exps_type">Expence Type</label>
          <select id="exps_type" name="exps_type">
            <?php
              $sql_query="SELECT * FROM `expense_type ";
              $sql_result = DB_Query($sql_query);
              while ($row = mysqli_fetch_assoc($sql_result)) {
                    extract($row);
            ?>

              <option value="<?= $exps_type ?>"><?= $exps_type ?></option>

            <?php } ?>
          </select>

          <label for="pay_to">Pay To</label>
          <input type="text" id="pay_to" name="pay_to">

          <label for="amount">Amount</label>
          <input type="text" id="amount" name="amount">

          <br><br>
          <div class="text-center text-uppercase">
            <button type="submit" class="btn-lg btn-success">Save</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="reset" class="btn-lg btn-info">Reset</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>

  


  
    
<?php 
  include_once 'inc/footer.php';
?>