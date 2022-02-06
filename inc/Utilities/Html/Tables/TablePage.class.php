<?php
    require_once("inc/Utilities/Html/Forms/FormHtml.class.php");
    
  class TablePage{

    public static function pageLeftMenu(){
      $leftMenu = ' 
          <!-- Left column -->
          <div class="priori-flex-row" id="page-body">
              <div class="priori-sidebar">
                  <header class="priori-site-header">
                  <i class="fas fa-money-check"></i>
                  <img src="images/dashboard-icon.png" width="50" height="50">
                 
                  <h1>aioRestaurant</h1>
                  </header>
                  <div class="profile-photo-container">
                  <img src="images/profile-photo.jpg" alt="Profile Photo" class="img-responsive">  
                  <div class="profile-photo-overlay"></div>
                  </div>
                      
                  <div class="mobile-menu-icon">
                      <i class="fa fa-bars"></i>
                  </div>
                  <nav class="priori-left-nav">          
                  <ul>
                    <li><a href="?page=dashboard"><i class="fa fa-home fa-fw"></i>Dashboard</a></li>
                    <li><a href="?page=charts"><i class="fa fa-bar-chart fa-fw"></i>Charts</a></li>
                    <li><a class="active" href="?page=tables&tab=employee">
                      <i class="fa fa-users fa-fw"></i>Tables
                    </a></li>
                    <li><a href="login.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
                  </ul>  
                  </nav>
              </div>
          
      ';
      echo $leftMenu;
    }

    public static function tabs(){
      $tabs = '
      <div class="templatemo-content-widget white-bg">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?page=tables&tab=employee">
              Employee
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=tables&tab=product">
              Inventory
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=tables&tab=order">
              Order
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=tables&tab=shipper">
              Shipper
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=tables&tab=supplier">
              Supplier
            </a>
          </li>
        </ul>
      </div>
      ';

      echo $tabs;
    }

    public static function employeeTableContent(Array $employeeArray){
      FormHtml::formEmployee();
      $employeeTable = '
      <div class="row">
      <div class="panel panel-default priori-content-widget white-bg no-padding priori-overflow-hidden">
          <div class="panel-heading priori-position-relative">
            <h2 class="text-uppercase">Employee Table</h2>   
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered priori-user-table">
              <thead>
                <tr>
                  <td>
                    <a href="#" class="white-text priori-sort-by">
                      #Id <span class="caret"></span>
                    </a>
                  </td>
                  <td>
                    <a href="#" class="white-text priori-sort-by">
                      Employee<span class="caret"></span>
                    </a>
                  </td>
                  <td>
                    <a href="#" class="white-text priori-sort-by">
                      Category <span class="caret"></span>
                    </a>
                  </td>
                  <td>
                    <a href="" class="white-text priori-sort-by">
                      Username <span class="caret"></span>
                    </a>
                  </td>
                  <td>
                    Edit Data
                  </td>
                </tr>
              </thead>
              <tbody>';
              for($i = 0; $i < count($employeeArray); $i++){
                $employeeTable .= '
                <tr>
                  <td>'.$employeeArray[$i]->getEmployeeId().'</td>
                  <td>'.$employeeArray[$i]->getFirstName()." ".$employeeArray[$i]->getLastName().'</td>
                  <td>'.$employeeArray[$i]->getUserCategory().'</td>
                  <td>'.$employeeArray[$i]->getUsername().'</td>
                  <td>'.
                    FormHtml::$formEmployee::editEmployee($employeeArray[$i])
                  .'</td>
                </tr> 
                ';
              }
        $employeeTable .= '
                  <tr>
                    <td colspan="5" align="right">'.
                      FormHtml::$formEmployee::addEmployee()
                    .'</td>
                  </tr>
                </tbody>
              </table>    
            </div>                          
          </div>
        </div>
      ';

      echo $employeeTable;
    }
  
    public static function shipperTableContent(Array $shipperArray){
      FormHtml::formShipper();
      $shipperTable = '
      <div class="row">
      <div class="panel panel-default priori-content-widget white-bg no-padding priori-overflow-hidden">
          <div class="panel-heading priori-position-relative">
            <h2 class="text-uppercase">Shipper Table</h2>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered priori-user-table">
              <thead>
                <tr>
                  <td>#Id</td>
                  <td>Shipper</td>
                  <td>Contact Name</td>
                  <td>Email</td>
                  <!-- <td>Edit</td> -->
                </tr>
              </thead>
              <tbody>';
              for($i = 0; $i < count($shipperArray); $i++){
                $shipperTable .= '
                <tr>
                  <td>'.$shipperArray[$i]->getShipperId().'</td>
                  <td>'.$shipperArray[$i]->getShipperName().'</td>
                  <td>'.$shipperArray[$i]->getContactName().'</td>
                  <td>'.$shipperArray[$i]->getEmail().'</td>
                  <!-- <td>
                  //FormHtml::$formShipper::editShipper()
                  </td> -->
                </tr> 
                ';
              }       
        $shipperTable .= '
                  <tr>
                    <td colspan="5" align="right">'.
                      //FormHtml::addShipper()
                      FormHtml::$formShipper::addShipper()
                    .'</td>
                  </tr>
                </tbody>
              </table>    
            </div>                          
          </div>
        </div>
      ';
      echo $shipperTable;
    }

    public static function supplierTableContent(Array $supplierArray){
      FormHtml::formSupplier();
      $supplierTable = '
      <div class="row">
      <div class="panel panel-default priori-content-widget white-bg no-padding priori-overflow-hidden">
          <div class="panel-heading priori-position-relative">
            <h2 class="text-uppercase">Supplier Table</h2>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered priori-user-table">
              <thead>
                <tr>
                  <td>#Id</td>
                  <td>Supplier</td>
                  <td>Contact</td>
                  <td>Email</td>
                  <td>Products</td>
                  <!-- <td>Edit</td> -->
                </tr>
              </thead>
              <tbody>';

              for($i = 0; $i < count($supplierArray); $i++){
                $currentSupplier = "mySupplier".$supplierArray[$i]->getSupplierId();
                $supplierTable .= '
                <tr>
                  <td>'.$supplierArray[$i]->getSupplierId().'</td>
                  <td>'.$supplierArray[$i]->getSupplierName().'</td>
                  <td>'.$supplierArray[$i]->getContactName().'</td>
                  <td>'.$supplierArray[$i]->getEmail().'</td>
                  <td>
                  ';
                  //<!--<td>//FormHtml::$formSupplier::editSupplier($supplierArray[$i])</td>-->
                  $supplierTable .= '
                  <div class="btn-group table-container">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#'.$currentSupplier.'" role="button" aria-expanded="false" aria-controls="'.$currentSupplier.'">
                      Products
                    </a>
                    <div class="collapse table-item" id="'.$currentSupplier.'">
                      <ul style="float: left;">';

                      for($j = 0; $j < count($supplierArray[$i]->getProducts()); $j++){
                        $supplierTable .= '
                          <li class="">
                            <a href="#">'.
                              $supplierArray[$i]->getProducts()[$j]->getProductName()
                          .'</a>
                          </li>
                        ';
                      }
                    $supplierTable .= '
                          </ul>
                      </div>
                  </div>
                  </td>
                </tr> 
                ';
              }       
        $supplierTable .= '
                </tbody>
              </table>    
            </div>                          
          </div>
        </div>';
      echo $supplierTable;
    }

    public static function orderTableContent(Array $orderArray){
      FormHtml::formOrder();
      $orderTable = '
      <div class="row">
      <div class="panel panel-default priori-content-widget white-bg no-padding priori-overflow-hidden">
          <div class="panel-heading priori-position-relative">
            <h2 class="text-uppercase">ORder Table</h2>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered priori-user-table">
              <thead>
                <tr>
                  <td>#Id</td>
                  <td>Order Date</td>
                  <td>Delivery Date</td>
                  <td>Employee</td>
                  <td>Products</td>
                  <td>Edit</td>
                </tr>
              </thead>
              <tbody>';

              for($i = 0; $i < count($orderArray); $i++){
                $currentOrder = "mySupplier".$orderArray[$i]->getOrderId();
                $orderTable .= '
                <tr>
                  <td>'.$orderArray[$i]->getOrderId().'</td>
                  <td>'.$orderArray[$i]->getOrderDate().'</td>
                  <td>'.$orderArray[$i]->getEstimateDeliveryDate().'</td>
                  <td>'.$orderArray[$i]->getEmployeeId().'</td>
                  <td>';

                  $orderTable .= '
                  <div class="btn-group table-container">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#'.$currentOrder.'" role="button" aria-expanded="false" aria-controls="'.$currentOrder.'">
                      Products
                    </a>
                    <div class="collapse table-item" id="'.$currentOrder.'">
                      <ul style="float: left;">';

                      for($j = 0; $j < count($orderArray[$i]->getProducts()); $j++){
                        $orderTable .= '
                          <li class="">
                            <a href="#">'.
                              $orderArray[$i]->getProducts()[$j]->getProductName()
                          .'</a>
                          </li>
                        ';
                      }
                    $orderTable .= '
                          </ul>
                      </div>
                  </div>';

                  $orderTable .= '
                    </div>
                  </div>
                  </td>
                  <td>'.
                    FormHtml::$formOrder::editOrder($orderArray[$i])
                  .'</td>
                </tr> 
                ';
              }       
        $orderTable .= '
                <tr>
                  <td colspan="6" align="right">'.
                    FormHtml::$formOrder::addOrder()
                  .'</td>
                </tr>
                </tbody>
              </table>    
            </div>                          
          </div>
        </div>';
      echo $orderTable;

    }

    public static function productsTableContent(Array $productsArray){
      FormHtml::formProductInventory();
      $productsTable = '
      <div class="row">
      <div class="panel panel-default priori-content-widget white-bg no-padding priori-overflow-hidden">
          <div class="panel-heading priori-position-relative">
            <h2 class="text-uppercase">Product Table</h2>   
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered priori-user-table">
              <thead>
                <tr>
                  <td>
                    <a href="#" class="white-text priori-sort-by">
                      #Id <span class="caret"></span>
                    </a>
                  </td>
                  <td>
                    <a href="#" class="white-text priori-sort-by">
                      Product<span class="caret"></span>
                    </a>
                  </td>
                  <td>
                    <a href="#" class="white-text priori-sort-by">
                      Category <span class="caret"></span>
                    </a>
                  </td>
                  <td>
                    <a href="" class="white-text priori-sort-by">
                      Quantity <span class="caret"></span>
                    </a>
                  </td>
                  <td>
                    Edit Data
                  </td>
                </tr>
              </thead>
              <tbody>';
              for($i = 0; $i < count($productsArray); $i++){
                $productsTable .= '
                <tr>
                  <td>'.$productsArray[$i]->getProductId().'</td>
                  <td>'.$productsArray[$i]->getProductName().'</td>
                  <td>'.$productsArray[$i]->getCategory().'</td>
                  <td>'.$productsArray[$i]->getQuantity().'</td>
                  <td>'.FormHtml::$formProductInventory::editProductInventory($productsArray[$i]).'</td>
                </tr> 
                ';
              }
        $productsTable .= '
                  <tr>
                    <td colspan="5" align="right">'.
                    FormHtml::$formProductInventory::addProductInventory()
                    .'</td>
                  </tr>
                </tbody>
              </table>    
            </div>                          
          </div>
        </div>
      ';
      echo $productsTable;
    }
    
  }