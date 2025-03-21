<aside class="app-sidebar shadow" style="background-color:hsl(226, 81.10%, 14.50%);" data-bs-theme="dark">

        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="../admin/assets/img/rfid.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Admin กิจกรรม</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item menu-open">
                <a href="editdashbord.php" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                  
                </a>
                
                <ul class="nav nav-treeview">
                </li>
             
             <li class="nav-item">
               <a href="edit-admin.php" class="nav-link ">
               <i class='bx bxs-contact'></i>
                 <p>จัดการAdmin</p>
               </a>
             </li>
                <li class="nav-item">
                    <a href="edit-user.php" class="nav-link">
                    <i class='bx bx-user-pin' ></i>
                      <p>จัดการผู้ใช้งาน</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="edit-plect.php" class="nav-link ">
                    <i class='bx bxs-building-house' ></i>
                      <p>จัดการสถานที่กิจกรรม</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="edit-activity.php" class="nav-link">
                    <i class='bx bxs-landscape'></i>
                      <p>จัดการกิจกรรม</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="trainner.php" class="nav-link">
                    <i class='bx bx-male-female' ></i>
                      <p>ผู้อบรม</p>
                    </a>
                 
                  <li class="nav-item">
                  <a href="logout.php" class="nav-link" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่?');">
                    <i class='bx bxs-home-circle'></i>
                      <p>ออกจากระบบ</p>
                    </a>
                  </li>
                </ul>
              </li>
              
          </nav>
        </div>
       
        <!--end::Sidebar Wrapper-->
      </aside>