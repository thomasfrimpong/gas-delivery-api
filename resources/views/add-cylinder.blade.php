@extends('layouts.app')
@section('content')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{-- <li class="nav-item">
           
              </li> --}}
              
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dispatchers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/add/dispatcher/page" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Dispatcher</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dispatcher/list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dispatcher List</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Cylinders
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/add-cylinder" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Cylinder</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Cylinder(s)</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Area
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Area</p>
                </a>
              </li>
              
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="../../index.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Users</p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="../../index.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../index.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Customers</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../../index.html" class="nav-link">
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
                         <div class="col-lg-7 offset-lg-2">
      
                            <div class="card card-info">
                                <div class="card-header">
                                  <h3 class="card-title">Addition Of Cylinder </h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="form-horizontal"  method="post" action="/add/cylinder">
                                  <div class="card-body">
                                    <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-2 col-form-label">Size Of Cylinder</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="" placeholder="Size Of Cylinder" name="size_of_cylinder" required>
                                      </div>
                                    </div>
                                    @csrf
                                    <div class="form-group row">
                                      <label for="inputPassword3" class="col-sm-2 col-form-label">Cost Per Unit</label>
                                      <div class="col-sm-10">
                                        <input type="number" class="form-control" id="" placeholder="Cost Per Unit" name='cost_per_unit' required>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Units Available</label>
                                        <div class="col-sm-10">
                                          <input type="number" class="form-control" id="" name="number_of_units" placeholder="Units Available" required>
                                        </div>
                                      </div>
                                      
                                    
                                  </div>
                                  <!-- /.card-body -->
                                  <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-info">Submit Form</button>
                                    {{-- <button type="submit" class="btn btn-default float-right">Cancel</button> --}}
                                  </div>
                                  <!-- /.card-footer -->
                                </form>
                              </div>
                       
                    </div> 
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div> 
</div>
            @endsection