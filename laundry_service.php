
<?php  
  include_once 'inc/db_config.php';
  include_once 'inc/header.php';
  include_once 'inc/nav.php';
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <button data-toggle="modal" data-target="#addNew" >Add New</button>
        </li>
        <li class="breadcrumb-item active">Laundy Service</li>
      </ol>

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Laundy Service Data
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Number</th>
                  <th>Service Name</th>
                  <th>Service Code</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Number</th>
                  <th>Service Name</th>
                  <th>Service Code</th>
                  <th>Action</th>
                </tr>
              </tfoot>

              <tbody>
                
              <?php 
                $table = DB_Query("SELECT * FROM services");
                $i = 1; 
                while ($data_tbl = mysqli_fetch_assoc($table)) {
                  extract($data_tbl);
                  ?>
                <tr>
                  <td class="text-center">
                    <!-- <input type="checkbox"> -->
                    <?= $i ?>
                  </td>
                  <td><?= $service_name ?></td>
                  <td><?= $service_code ?></td>
                  <td>
                  <button type="submit" name="edit" data-toggle="modal" data-target="#edit_laundry_service<?= $id ?>">
                      <i class="fa fa-pencil text-success"></i>
                    </button>&nbsp;&nbsp;
                    <button type="submit" name="del" data-toggle="modal" data-target="#delete_modal<?= $id ?>">
                      <i class="fa fa-trash text-danger"></i>
                    </button>
                  </td>
                </tr>
              

                <!-- End Edit Modal -->
                <div class="modal fade" id="edit_laundry_service<?= $id ?>">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content form-modal">
                      <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                      
                      <form action="form_submit/edit_laundry_service.php" method="post"  class="product_form">
                        <label for="pro_id">Cloth ID</label>
                        <input type="number" value="<?= $id ?>" id="pro_id" name="service_id" readonly>

                        <label for="pro_name">Service Name</label>
                        <input type="text" id="pro_name" value="<?= $service_name ?>" name="service_name">

                        <label for="pro_code">Service Code</label>
                        <input type="text" id="pro_code" value="<?= $service_code ?>" name="service_code">
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
                <!-- End Edit Modal -->

                <!--Star Delete Modal -->
                <div class="modal fade" id="delete_modal<?= $id ?>">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content form-modal">
                      <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                      
                      <form action="form_submit/delete_item.php" method="post"  class="product_form">
                        <label for="delId">Are you Sure to Delete This Item.</label>
                        <input type="hidden" value="<?= $id ?>" name="id">
                        <input type="hidden" value="services" name="table_name">
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

        
              <?php $i++; } ?>

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
        
        <form action="form_submit/add_new_service.php" method="post" class="product_form">

          <label for="pro_name">Service Name</label>
          <input type="text" id="pro_name" name="service_name">

          <label for="pro_code">Service Code</label>
          <input type="text" id="pro_code" name="service_code">
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