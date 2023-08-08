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
                <a href="/cylinders" class="nav-link">
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
            <a href="/list/of/payments" class="nav-link   active">
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
                <div class="card card-info card-outline">
                    <div class="card-header">
                      <h3 class="card-title">List Of Customers</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      
                     
                      <br><br>
                      <table id="example1" class="table table-bordered table-striped"   >
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date Of Order</th>
                            <th>Quantity</th>
                            <th>Amount Paid</th>
                            <th>Phone Number</th>
                            <th>Date Of Order</th>
                          </tr>
                        </thead>
                        <tbody>


                        
                          @foreach($payments as $payment)
                          <tr>

                            <td>{{$payment->first_name}}</td>
                            <td>{{ $payment->other_names}}
                            </td>
                            <td>{{ $payment->date_of_order}}</td>
                            <td>{{ $payment->quantity}}</td>
                            <td>{{ $payment->amount_paid}}</td>
                            <td>{{ $payment->payment_number}}</td>
                            <td>{{ $payment->created_at}}</td>
                          </tr>
                          
                          @endforeach
                        
                       
                        
                       
                        </tbody>
                        <tfoot>
                       
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>

               
            </div>
           
        </div>
        <!-- /.row -->
    </div>
            </div> 
            @endsection