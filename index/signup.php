<?php
session_start();
include("../include/db.php");
error_reporting(0);


?>
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>จัดการผู้ใช้งาน</title>
    <link rel="stylesheet" href="fonend/register1.css">
    <!--begin::Primary Meta Tags-->
    
 
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <link rel="stylesheet" href="register.css">
    <div class="app-wrapper">
      <!--begin::Header-->
      
      <!--end::Footer-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title"></h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">

                 
                  <form action="add-admin-api.php" method="post" >
                    
                <div class="form-group">
                <label for="fullname">FullName:</label>
                <input type="text" class="form-control" id="full_name" placeholder="Enter FullName" name="full_name" required value="<?php echo $row->full_name; ?>">
                </div>
                <div class="form-group">
                <label for="username">UserName:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter UserName" name="username" required value="<?php echo $row->username; ?>">
                </div>
                <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required value="<?php echo $row->email; ?>">
                </div>
                <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" maxlength="10" pattern="[0-9]{10}" title="ตัวเลขสิบหลักเท่านั้น" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" required value="<?php echo $row->mobile; ?>">
                </div>
                <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required value="<?php echo $row->password; ?>">
                </div>
        
        <button type="submit" class="btn btn-success" name="save1" id="save1">save</button>
            </form>
                  </div>



