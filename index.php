
<?php 

  include_once 'inc/db_config.php';
  include_once 'inc/header.php';
  include_once 'vendor/chart/fusioncharts.php';


  
  include_once 'inc/nav.php';
?>

<div class="content-wrapper">


    <?php if (!isset($_SESSION["user_loged"]) ){ ?>
      <div class="row">
        

          <?php 
            $Discount_offer = DB_Query("SELECT pricing.*, services.service_name, cloths.cloth_type FROM pricing INNER JOIN services ON (pricing.service_id=services.id) INNER JOIN cloths ON (pricing.cloth_id=cloths.id) WHERE `discount`>0");
                $i = 1; 
                while ($data_tbl = mysqli_fetch_assoc($Discount_offer)) {
                  extract($data_tbl);

                  


           ?>

              <div class="col-xl-3 col-lg-5" style="margin: 20px">
                <div class="card text-white bg-success o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fa fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">Service Name: <?= $service_name ?> </div>
                    <div class="mr-5">Cloth Type: <?= $cloth_type ?> </div>
                    <br/>
                    <div class="mr-5">Price: <?= $price ?> BDT</div>
                    <br/>
                    <div class="mr-5">Discount:  <?= $discount ?> %</div>
                  </div>
                  <form action="order.php" method="post">
                    <input type="hidden" value="<?= $cloth_id ?>" name="i_cloth_type">
                    <input type="hidden" value="<?= $service_id ?>" name="i_service_name">

                    
                      <button type="submit" class="card-footer text-white clearfix small z-1" >
                        <span class="float-left" style=" font-weight:bold;">Order Now</span>
                        <span class="float-right">
                          <i class="fa fa-angle-right" style="font-weight:bold;"></i>
                        </span>
                      </button>

                  </form>
                  
                </div>
              </div>


            
          <?php } 
        } else{ ?>


        <?php 
          if ( $_SESSION["user_role"]==1 || $_SESSION["user_role"]==2){ ?>

            <div class="row">

              <?php 

            $Discount_offer = DB_Query("SELECT pricing.*, services.service_name, cloths.cloth_type FROM pricing INNER JOIN services ON (pricing.service_id=services.id) INNER JOIN cloths ON (pricing.cloth_id=cloths.id) WHERE `discount`>0");
                $i = 1; 
                while ($data_tbl = mysqli_fetch_assoc($Discount_offer)) {
                  extract($data_tbl);

                  


           ?>

              <div class="col-xl-3 col-lg-5" style="margin: 20px">
                <div class="card text-white bg-success o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fa fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">Service Name: <?= $service_name ?> </div>
                    <div class="mr-5">Cloth Type: <?= $cloth_type ?> </div>
                    <br/>
                    <div class="mr-5">Price: <?= $price ?> BDT</div>
                    <br/>
                    <div class="mr-5">Discount:  <?= $discount ?> %</div>
                  </div>
                  <form action="order.php" method="post">
                    <input type="hidden" value="<?= $cloth_id ?>" name="i_cloth_type">
                    <input type="hidden" value="<?= $service_id ?>" name="i_service_name">

                    
                      <button type="submit" class="card-footer text-white clearfix small z-1" >
                        <span class="float-left" style=" font-weight:bold;">Order Now</span>
                        <span class="float-right">
                          <i class="fa fa-angle-right" style="font-weight:bold;"></i>
                        </span>
                      </button>

                  </form>
                </div>
              </div>




          <?php }
        } elseif ($_SESSION["user_role"]==0){ 

            $arrData = array(
            "chart" => array(
                "caption" => "Last 30 days Oders Report",
                "paletteColors" => "#0075c2",
                "bgColor" => "#ffffff",
                "borderAlpha"=> "20",
                "canvasBorderAlpha"=> "0",
                "usePlotGradientColor"=> "0",
                "plotBorderAlpha"=> "10",
                "showXAxisLine"=> "1",
                "xAxisLineColor" => "#999999",
                "showValues" => "0",
                "divlineColor" => "#999999",
                "divLineIsDashed" => "1",
                "showAlternateHGridColor" => "0"
              )
          );

          $arrData["data"] = array();

          $sql_result = DB_Query("SELECT order_date, SUM(grand_total) AS grand_total FROM orders GROUP BY orders.order_date DESC LIMIT 30");
            
          while($row = mysqli_fetch_array($sql_result)) {
          array_push($arrData["data"], array(
              "label" => $row["order_date"],
              "value" => $row["grand_total"]
              )
          );
          }

            $jsonEncodedData = json_encode($arrData);

            $columnChart = new FusionCharts("column2D", "myFirstChart" , 1200, 700, "chart-1", "json", $jsonEncodedData);

            // Render the chart
            $columnChart->render();



            ?>

            <div class="container-fluid">

              <span id="chart-1" class="chart" style="height:500px"><!-- Fusion Charts will render here--></span>
            
          </div>
          <!-- /.container-fluid-->
            
          <?php } 
        }?>

    

    </div>


	
		
<?php 
	include_once 'inc/footer.php';
?>