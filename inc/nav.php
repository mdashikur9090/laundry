<!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Laundry System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <?php if (!isset($_SESSION["user_loged"])) {
          # code...
          ?>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="New Order">
          <a class="nav-link" href="order.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">New Order</span>
          </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Orders">
          <a class="nav-link" href="order_list.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">My Orders</span>
          </a>
          </li>

          

        <?php }else { ?>

          <?php if ($_SESSION["user_role"]==0 || $_SESSION["user_role"]==1) {
          # code...
          ?>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Master">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#master" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-wrench"></i>
              <span class="nav-link-text">Master</span>
            </a>
            <ul class="sidenav-second-level collapse" id="master">
              <li>
                <a href="cloths.php">Cloth Type</a>
              </li>
              <li>
                <a href="laundry_service.php">Laundry Services</a>
              </li>
              <li>
                <a href="pricing.php">Price List</a>
              </li>
              <li>
                <a href="customer.php">Customer</a>
              </li>

              <?php 
                if ($_SESSION["user_role"]==0) {
                    
              ?>
                      <li>
                        <a href="employee.php">Employee</a>
                      </li>

                      <li>
                        <a href="expence_type.php">Expence Type</a>
                      </li>
                      <li>
                        <a href="expences.php">Expences</a>
                      </li>

              <?php } ?>

              
            </ul>
          </li>


          <?php 
                if ($_SESSION["user_role"]==1) {
                    
              ?>


          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="New Order">
          <a class="nav-link" href="order.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">New Order</span>
          </a>
          </li>

        <?php } ?>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Orders">
          <a class="nav-link" href="order_list.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Orders</span>
          </a>
          </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
          <a class="nav-link" href="profile.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Profile</span>
          </a>
        </li>



        <?php } else { ?>


          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="New Order">
          <a class="nav-link" href="order.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">New Order</span>
          </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Orders">
          <a class="nav-link" href="order_list.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">My Orders</span>
          </a>
          </li>




         <?php } }?>



        

        
        


        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>