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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonend/register1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <!--end::Footer-->
      <main class="app-main">
        <div class="app-content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h3 class="card-title"></h3>
                  </div>
                  <div class="card-body">

                 
                  <form action="add-user_api.php" method="post" >
                <div class="form-group">
                <label for="first_name">ชื่อ:</label>
                <input type="text" class="form-control" id="first_name" placeholder="กรุณากรอกชื่อ" name="first_name" required value="<?php echo $row->first_name; ?>">
                </div>
                <div class="form-group">
                <label for="last_name">นามสกุล:</label>
                <input type="text" class="form-control" id="last_name" placeholder="กรุณากรอกนามสกุล" name="last_name" required value="<?php echo $row->last_name; ?>">
                </div>
                <div class="form-group">
                 <label for="gender">เพศ:</label>
                 <select class="form-control" id="gender" name="gender" required>
                  <option value="">-- เลือกเพศ --</option>
                 <option value="ชาย" <?php if ($row->gender == "ชาย") echo "selected"; ?>>ชาย</option>
                  <option value="หญิง" <?php if ($row->gender == "หญิง") echo "selected"; ?>>หญิง</option>
                </select>
                </div>

                <div class="form-group">
                <label for="organization">หน่วยงาน:</label>
                <input type="text"  class="form-control" id="organization" placeholder="กรุณากรอกหน่วยงาน" name="organization" required value="<?php echo $row->organization; ?>">
                </div>
                <div class="form-group">
                <label for="school">โรงเรียน:</label>
                <input type="text" class="form-control" id="school" placeholder="กรุณากรอกชื่อโรงเรียน" name="school" required value="<?php echo $row->school; ?>">
                </div>
                <div class="form-group">
                <label for="grade">ระดับชั้น:</label>
                <input type="text" class="form-control" id="grade" placeholder="กรุณากรอกระดับชั้น" name="grade" required value="<?php echo $row->grade; ?>">
                </div>
                <div class="form-group">
                          <label for="activities">กิจกรรม:</label>
                          <select class="form-control" id="activities" name="activities" required>
                            <?php
                              $activites = "SELECT * FROM manageactivity";
                              $activites = $pdo->prepare($activites);
                              $activites->execute();
                              $categories = $activites->fetchAll(PDO::FETCH_OBJ);
                              foreach ($categories as $row) {
                                  echo "<option value='" . $row->ma_name. "'" . ($row->ma_name == $row->ma_name ? ' selected' : '') . ">" . $row->ma_name . "</option>";
                              }
                            ?>
                          </select>
                            </div>
        
        <button type="submit" class="btn btn-success" name="save" id="save">บันทึก</button>
            </form>
                  </div>

