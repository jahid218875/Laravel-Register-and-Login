@extends('layouts.app')
@section('content')
    


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Address</th>
                    <th>Address2</th>
                    <th>city</th>
                    <th>State</th>
                    <th>Zip</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($form as $form_data)
                  <tr>
                    <td>{{$form_data->email}}</td>
                    <td>{{$form_data->password}}</td>
                    <td>{{$form_data->address}}</td>
                    <td>{{$form_data->address2}}</td>
                    <td>{{$form_data->city}}</td>
                    <td>{{$form_data->state}}</td>
                    <td>{{$form_data->zip}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection