@extends('layouts.app')
@section('content')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
              <li class="nav-item">
                <a href="/dispatcher/list" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dispatchers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/cylinders" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cylinders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Areas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/list/of/admins" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/gas/orders" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gas Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/gas/exchanges" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gas Exchanges</p>
                </a>
              </li>
          <li class="nav-item">
            <a href="/list/of/customers" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Customers</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/payments" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Payments</p>
            </a>
          </li>
         
        
    </ul>
</nav> 

<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">

</div> 
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            {{-- <div class="card card-info card-outline">
                                <div class="card-header">
                                  <h3 class="card-title">List Of Orders</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                  
                                 
                                  
                                  
                                </div>
                                <!-- /.card-body -->
                              </div>

                           
                        --}}</div> 
                        <div class="col-12">
                            <div class="callout callout-info">
                              <h5><i class="fas fa-info"></i> Note:</h5>
                              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                            </div>
                    </div>
                    <!-- /.row -->
                </div>
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      From
                      <address>
                        <strong>Admin, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: info@almasaeedstudio.com
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      To
                      <address>
                        <strong>John Doe</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>Invoice #007612</b><br>
                      <br>
                      <b>Order ID:</b> 4F3S8J<br>
                      <b>Payment Due:</b> 2/22/2014<br>
                      <b>Account:</b> 968-34567
                    </div>
                    <!-- /.col -->
                  </div>


                {{-- <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>Qty</th>
                          <th>Product</th>
                          <th>Serial #</th>
                          <th>Description</th>
                          <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>1</td>
                          <td>Call of Duty</td>
                          <td>455-981-221</td>
                          <td>El snort testosterone trophy driving gloves handsome</td>
                          <td>$64.50</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Need for Speed IV</td>
                          <td>247-925-726</td>
                          <td>Wes Anderson umami biodiesel</td>
                          <td>$50.00</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Monsters DVD</td>
                          <td>735-845-642</td>
                          <td>Terry Richardson helvetica tousled street art master</td>
                          <td>$10.70</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Grown Ups Blue Ray</td>
                          <td>422-568-642</td>
                          <td>Tousled lomo letterpress</td>
                          <td>$25.99</td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div> --}}
                <!-- /.container-fluid -->
            </div> 
</div>
            @endsection