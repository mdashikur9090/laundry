
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
        <li class="breadcrumb-item active">Service Price</li>
      </ol>

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Pricing Data Table
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Number</th>
                  <th>Short Code Type</th>
                  <th>Service Name</th>
                  <th>Cloth Type</th>
                  <th>Vat(as %)</th>
                  <th>Price</th>
                  <th>Discount(%)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                 <th>Number</th>
                  <th>Short Code Type</th>
                  <th>Service Name</th>
                  <th>Cloth Type</th>
                  <th>Vat(%)</th>
                  <th>Price</th>
                  <th>Discount(%)</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>

              <?php 
                $table = DB_Query("SELECT pricing.*, services.service_name, cloths.cloth_type FROM pricing INNER JOIN services ON (pricing.service_id=services.id) INNER JOIN cloths ON (pricing.cloth_id=cloths.id)");
                $i = 1; 
                while ($data_tbl = mysqli_fetch_assoc($table)) {
                  extract($data_tbl);

                  $price_id = $id;


                  ?>
              
                <tr>
                  <td class="text-center">
                    <!-- <input type="checkbox"> -->
                    <?= $price_id ?>
                  </td>
                  <td><?= $short_code ?></td>
                  <td><?= $service_name ?></td>
                  <td><?= $cloth_type ?></td>
                  <td><?= $vat ?></td>
                  <td><?= $price ?></td>
                  <td><?= $discount ?></td>
                  <td>
                  <button type="submit" name="edit" data-toggle="modal" data-target="#edit_pricing_modal<?= $price_id ?>">
                      <i class="fa fa-pencil text-success"></i>
                    </button>&nbsp;&nbsp;
                    <button type="submit" name="del" data-toggle="modal" data-target="#delete_modal<?= $price_id ?>">
                      <i class="fa fa-trash text-danger"></i>
                    </button>
                  </td>
                </tr>

                <!-- start modal-->

                <div class="modal fade" id="edit_pricing_modal<?= $price_id ?>">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content form-modal">
                      <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                      
                      <form action="form_submit/edit_price.php" method="post" class="product_form">
                        <label for="id">ID</label>
                        <input type="number" value="<?= $price_id ?>"  name="price_id" readonly>

                        <label for="service_name">Service Name</label>
                        <select id="service_name" name="service_name">

                          <?php
                            $sql_query="SELECT * FROM `services";
                            $sql_result = DB_Query($sql_query);
                            while ($row = mysqli_fetch_assoc($sql_result)) {
                                  extract($row);
                          ?>

                            <option value="<?= $id ?>"

                                <?php if ($service_id == $id ) { ?>
                                  selected="selected"
                                <?php } ?>

                            > <?= $service_name ?>  </option>

                          <?php } ?>

                        </select>
                        <br>
                        <br>
                        <label for="cloth_type">Cloth Type</label>
                        <select id="cloth_type" name="cloth_type">
                          <?php
                            $sql_query="SELECT * FROM `cloths ";
                            $sql_result = DB_Query($sql_query);
                            while ($row = mysqli_fetch_assoc($sql_result)) {
                                  extract($row);
                          ?>

                            <option value="<?= $id ?>"

                                <?php if ($cloth_id == $id ) { ?>
                                  selected="selected"
                                <?php } ?>

                            > <?= $cloth_type ?></option>

                          <?php } ?>
                        </select>



                        <br>
                        <br>
                        <label id="" for="short_code">Short Code</label>
                        <input type="text" value="<?= $short_code ?>" id="short_code" name="short_code" required >

                        <label for="vat">Vat (As Percentage)</label>
                        <input type="text" value="<?= $vat ?>" id="vat" name="vat" required placeholder="Please input Zero if No Vat." >

                        <label for="pricing">Price</label>
                        <input type="text" value="<?= $price ?>" id="pricing" name="pricing" required >

                        <label for="pricing">Discount (As Percentage)</label>
                        <input type="text" value="<?= $discount ?>" name="dis" required placeholder="Please input Zero if No discount." >

                      

                        <br><br>
                        <div class="text-center text-uppercase">
                          <button type="submit" class="btn-lg btn-success">Save</button>
                        </div>
                        
                      </form>
                    </div>
                    
                  </div>
                </div>
                <!-- End Edit Modal -->

                <!--Star Delete Modal -->
                <div class="modal fade" id="delete_modal<?= $price_id ?>">
                  <div class="modal-dialog">
                  
                    <!-- Modal content-->
                    <div class="modal-content form-modal">
                      <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                      
                      <form action="form_submit/delete_item.php" method="post"  class="product_form">
                        <label for="delId">Are you Sure to Delete This Item.</label>
                        <input type="hidden" value="<?= $price_id ?>" name="id">
                        <input type="hidden" value="pricing" name="table_name">
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
        <div class="card-footer small text-muted">Updated</div>
      </div>
    </div>
    <!-- /.container-fluid-->
  </div>



<div class="modal fade" id="addNew">
  <div class="modal-dialog modal-lg">
    <div class="modal-content form-modal">
      <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
      
      <form action="form_submit/add_new_price.php" method="post" class="product_form">

        <label for="service_name">Service Name</label>
        <select id="service_name" required name="service_name">

          <?php
            $sql_query="SELECT * FROM `services";
            $sql_result = DB_Query($sql_query);
            while ($row = mysqli_fetch_assoc($sql_result)) {
                  extract($row);
          ?>

            <option value="<?= $id ?>"><?= $service_name ?></option>

          <?php } ?>

        </select>
        <br>
        <br>
        <label for="cloth_type">Cloth Type</label>
        <select id="cloth_type" required name="cloth_type">
          <?php
            $sql_query="SELECT * FROM `cloths ";
            $sql_result = DB_Query($sql_query);
            while ($row = mysqli_fetch_assoc($sql_result)) {
                  extract($row);
          ?>

            <option value="<?= $id ?>"><?= $cloth_type ?></option>

          <?php } ?>
        </select>
        <br>
        <br>
        <label for="short_code">Short Code</label>
        <input type="text" id="short_code" required name="short_code">

        <label for="vat">Vat (As Percentage)</label>
        <input type="number" id="vat" required name="vat">

        <label for="pricing">Price</label>
        <input type="number" id="pricing" required name="price">

        <label for="discount">Discount (As Percentage)</label>
        <input type="number" id="discount" name="discount" required placeholder="Please input Zero if No discount.">
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