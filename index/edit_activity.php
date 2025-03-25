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
    <title>จัดการAdmin</title> 
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../admin/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <?php include("../admin/include/navbar.php"); ?>
      <!--end::Header-->
      <!--begin::Sidebar-->
     <?php include("../admin/include/sidebar.php");?>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <?php include("../admin/include/footer.php");?>
      <!--end::Footer-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">จัดการกิจกรรม</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                  <div class="card-header">Edit activity</div>
                  <div class="card-body">


                    <form action="edit_activity_api.php" method="POST">
                      <?php $editid = $_GET['id'];
                          $sql = "SELECT * FROM manageactivity WHERE ma_id=:eid";
                          $query = $pdo->prepare($sql);
                          $query->bindParam(':eid',$editid,PDO::PARAM_STR);
                          $query->execute();
                          $results = $query->fetchAll(PDO::FETCH_OBJ);

                          if($query->rowCount() >0){
                              foreach($results as $row ){
                      ?>
                      <input type="hidden" name="ma_id" id="eid" value="<?php echo $editid;?>">
                      <div class="form-group">
                          <label for="ma_name">ชื่อกิจกรรม:</label>
                          <input type="text" class="form-control" id="ma_name" placeholder="Enter Name" name="ma_name" required value="<?php echo $row->ma_name; ?>">
                      </div>

                      <div class="form-group">
                          <label for="mal_id">สถานที่กิจกรรม:</label>
                          <select class="form-control" id="mal_id" name="mal_id" required>
                            <?php
                              $mal_sql = "SELECT * FROM managesites";
                              $mal_query = $pdo->prepare($mal_sql);
                              $mal_query->execute();
                              $categories = $mal_query->fetchAll(PDO::FETCH_OBJ);
                              foreach ($categories as $managesites) {
                                  echo "<option value='" . $managesites->mal_id . "'" . ($row->mal_id == $managesites->mal_id ? ' selected' : '') . ">" . $managesites->mal_name . "</option>";
                              }
                            ?>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="ma_date">วันที่:</label>
                          <input type="text" class="form-control" id="ma_date" placeholder="Enter Name" name="ma_date" required value="<?php echo $row->ma_date; ?>">
                      </div>

                      <div class="form-group">
                          <label for="ma_details">รายละเอียด:</label>
                          <input type="text" class="form-control" id="ma_details" placeholder="Enter Name" name="ma_details" required value="<?php echo $row->ma_details; ?>">
                      </div>

                      <div class="form-group">
                          <label for="ma_img">รูปภาพ (URL or File Path):</label>
                          <input type="text" class="form-control" id="ma_img" name="ma_img" value="<?php echo $row->ma_img; ?>">
                      </div>

                      <?php
                          }
                      }
                      ?>
                      <button type="submit" class="btn btn-success" name="update" id="update">Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- Footer -->
     
    </div>

    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="../../dist/js/adminlte.js"></script>
  </body>
</html>
