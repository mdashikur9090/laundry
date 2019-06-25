
<?php  
  include_once 'inc/db_config.php';
  include_once 'inc/header.php';

  if (!isset($_SESSION["user_loged"])) {

    header('Location: login.php');
  }elseif ($_SESSION["user_role"]!=0) {
    # code...
    header('Location: index.php');
  }

  
  include_once 'inc/nav.php';
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <button data-toggle="modal" data-target="#addNewEmployee" >Add New</button>
        </li>
        <li class="breadcrumb-item active">Employee</li>
      </ol>

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Employee Data Table
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Number</th>
                  <th>Join Date</th>
                  <th>Frist Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>address</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Status</th>
                  <th>passwords</th>
                  <th>Leave Date</th>
                  <th>Mothly Salary</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Number</th>
                  <th>Join Date</th>
                  <th>Frist Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>address</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Status</th>
                  <th>passwords</th>
                  <th>Leave Date</th>
                  <th>Mothly Salary</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              <?php 
                $table = DB_Query("SELECT * FROM employee");
                $i = 1; 
                while ($data_tbl = mysqli_fetch_assoc($table)) {
                  extract($data_tbl);
                  ?>
              
                <tr>
                  <td class="text-center">
                    <!-- <input type="checkbox"> -->
                    <?= $emp_id ?>
                  </td>
                  <td><?= $join_date ?></td>
                  <td><?= $first_name ?></td>
                  <td><?= $last_name ?></td>
                  <td><?= $gender ?></td>
                  <td><?= $address ?></td>
                  <td><?= $email_id ?></td>
                  <td><?= $mobile ?></td>
                  <td><?= $status ?></td>
                  <td><?= $password ?></td>
                  <td><?= $leave_date ?></td>
                  <td><?= $salary ?></td>
                  <td>
                  <button type="submit" name="edit" data-toggle="modal" data-target="#edit_employee_modal<?= $emp_id ?>">
                      <i class="fa fa-pencil text-success"></i>
                    </button>&nbsp;&nbsp;
                    <button type="submit" name="del" data-toggle="modal" data-target="#delete_modal<?= $emp_id ?>"">
                      <i class="fa fa-trash text-danger"></i>
                    </button>
                  </td>
                </tr>


                <!--Start Modals-->

                  <div class="modal fade" id="edit_employee_modal<?= $emp_id ?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content form-modal">
                        <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                        
                        <form action="form_submit/edit_employee.php" method="post" class="product_form">


                          <label for="employee_id">Employee ID</label>
                          <input type="number" id="employee_id" value="<?= $emp_id ?>" name="emp_id" readonly>

                          <label for="join_date">Join Date</label>
                          <input type="Date" id="join_date" value="<?= $join_date ?>" name="join_date" required>

                          <label for="first_name">First Name</label>
                          <input type="text" id="first_name" value="<?= $first_name ?>" name="first_name" required>

                          <label for="last_name">Last Name</label>
                          <input type="text" id="last_name" value="<?= $last_name ?>" name="last_name" required>

                          <label for="gender">Gender</label>
                          <select id="gender" name="gender" required>
                            <option value="Male"

                                <?php if ($gender == "Male" ) { ?>
                                  selected="selected"
                                <?php } ?>

                            > Male </option>

                            <option value="Female"

                                <?php if ($gender == "Female" ) { ?>
                                  selected="selected"
                                <?php } ?>

                            > Female </option>

                            </select>

                            <label for="address">Address</label>
                            <textarea type="text" id="address" name="address" required ><?= $address ?></textarea>
                          

                          <label for="email_id">Email</label>
                          <input type="text" id="email_id" value="<?= $email_id ?>" name="email_id" required>

                          <label for="mobile_num">Mobile</label>
                          <input type="text" id="mobile_num" value="<?= $mobile ?>" name="mobile" required>
                          
                          

                          <label for="passcode">Password</label>
                          <input type="text" id="passcode" value="<?= $password ?>" name="password" required>

                          <label for="status" required>Status</label>
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

                          <label for="leave_date">Leave Date</label>
                          <input type="Date" placeholder="Leave blank if u want." id="leave_date" value="<?= $leave_date ?>"  name="leave_date"  >

                          
                          <label for="salary">Salary</label>
                          <input type="text" id="salary" value="<?= $salary ?>" name="salary" required>

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
                  <div class="modal fade" id="delete_modal<?= $emp_id ?>">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content form-modal">
                        <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                        
                        <form action="form_submit/delete_item.php" method="post"  class="product_form">
                          <label for="delId">Are you Sure to Delete This Item.</label>
                          <input type="hidden" value="<?= $emp_id ?>" name="id">
                          <input type="hidden" value="employee" name="table_name">
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


                  <!--Start Modals-->

                  <div class="modal fade" id="addNewEmployee">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content form-modal">
                        <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                        
                        <form action="form_submit/add_employee.php" method="post" class="product_form">

                          <label for="join_date">Join Date</label>
                          <input type="Date" id="join_date" name="join_date" required>

                          <label for="first_name">First Name</label>
                          <input type="text" id="first_name"  name="first_name" required>

                          <label for="last_name">Last Name</label>
                          <input type="text" id="last_name"  name="last_name" required>

                          <label for="gender">Gender</label>
                          <select id="gender" required name="gender">
                            <option value="Male"> Male </option>
                            <option value="Female"> Female </option>
                          </select>

                          <label for="birth_date">Date Of Birth</label>
                          <input type="Date" id="birth_date"  name="birth_date" required>

                          <label for="address">Address</label>
                          <textarea type="text" id="address" name="address" required></textarea>

                          <label for="email_id">Email</label>
                          <input type="text" id="email_id" name="email_id" required>

                          <label for="mobile_num">Mobile</label>
                          <input type="text" id="mobile_num" name="mobile" required>

                          <label for="status">Status</label>
                          <select id="status" required name="status">
                            <option value="enable"> Enable </option>
                            <option value="disable"> Disable </option>
                          </select>

                          <label for="passcode">Password</label>
                          <input type="text" id="passcode"  name="password" required>

                          <label for="salary">Salary</label>
                          <input type="Number" id="salary" name="salary" required>

                          

                          <br><br>
                          <div class="text-center text-uppercase">
                            <button type="submit" class="btn-lg btn-success">save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="btn-lg btn-info">reset</button>
                          </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>




  <!--End Modals-->




  
    
<?php 
  include_once 'inc/footer.php';
?>