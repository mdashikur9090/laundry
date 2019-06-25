
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
                    <button type="submit" name="del" data-toggle="modal" data-target="#del_modal<?= $exp_id ?>">
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
                      
                      <form action="form_submit/edit_expence_type.php" method="post"  class="product_form">
                        <label for="pro_id">Empence Id</label>
                        <input type="number" value="<?= $exps_id ?>" id="pro_id" name="expence_id" readonly>

                        <label for="pro_name">Expence Type</label>
                        <input type="text" id="pro_name" value="<?= $exps_type ?>" name="exps_type">

                        <label for="pro_code">Expence Code</label>
                        <input type="text" id="pro_code" value="<?= $exps_code ?>" name="exps_code">
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
        
              <?php  } ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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

        <!-- <div class="text-center">
          <span class="xit bg-danger" data-dismiss="modal">Close</span>
        </div> -->
      </div>
      
    </div>
  </div>

  


  
    
<?php 
  include_once 'inc/footer.php';
?>