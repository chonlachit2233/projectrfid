<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Dashboard</title>
  <link rel="stylesheet" href="../fortend/fonend/history.css" />
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <div class="profile">
        <div class="avatar"></div>
        <h2>JOHN DON</h2>
        <p>johndon@company.com</p>
      </div>
      <nav>
        <ul>
        <li class="nav-item">
               <a href="../fortend/total.php" class="nav-link ">
               <i class='bx bxs-contact'></i>
                 <p>สรุปเช็คอิน</p>
               </a>
             </li>
                <li class="nav-item">
                    <a href="../fortend/history.php" class="nav-link">
                    <i class='bx bx-user-pin' ></i>
                      <p>ประวัติเช็คอิน</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../fortend/map.php" class="nav-link ">
                    <i class='bx bxs-building-house' ></i>
                      <p>เเผนที่</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../fortend/event.php" class="nav-link">
                    <i class='bx bxs-landscape'></i>
                      <p>กิจกรรม</p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a href="logout.php" class="nav-link" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่?');">
                    <i class='bx bxs-home-circle'></i>
                      <p>ออกจากระบบ</p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
      </nav>
    </aside>


  </div>
</body>
</html>
