<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Project Blood Seeker</a>
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

          
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link" href="inventory.php">
            <i class="fa fa-fw fa-list-alt"></i>
            <span class="nav-link-text">Inventory</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Records</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
             <li>
              <a href="tables.php">Blood Records</a>
            </li>
            <li>
              <a href="donations.php">Blood Donation</a>
            </li>
             <li>
              <a href="addrecord.php">Add Records</a>

            </li>
            <li>
              <a href="requestTable.php">Requested Bloods</a>

            </li>
            <li>
              <a href="donors.php">Donors</a>
            </li>
            
          </ul>
        </li>
<!--         
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link"  href="reports.php">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Reports</span>
          </a> -->

                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#reports" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Reports</span>
          </a>
          <ul class="sidenav-second-level collapse" id="reports">
             <li>
              <a href="reports.php">Checkout Bloods</a>
            </li>
            <li>
              <a href="#">Reactive/Active Bloods</a>
            </li>
             <li>
              <a href="bloodrecordremarks.php">Successfull/Unsuccessfull</a>

            </li>
            <li>
              <a href="#">Requested Bloods</a>

            </li>
            
          </ul>
        </li>


           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link" href="addbranch.php">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Add Branch</span>
          </a>
        </li>
          <!-- <ul class="sidenav-second-level collapse" id="collapseExamplePages">
          <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul> -->
        </li>
      </ul>
      <!-- End of side navbar -->



      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <!-- <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a> -->
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">        
          <a class="btn btn-info btn-lg print_button" id="buttonPrint" onclick="printDiv('printableArea')" href="#"><i class="fa fa-print"></i> <b>Print</br><!--<input type="button" class="btn-primary" id="buttonPrint" onclick="printDiv('printableArea')" value="Print Report"/>--></a>
        </li>

        <li class="nav-item">        
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout
          </a>
        </li>

      </ul>
    </div>
  </nav>


  

