<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" >
  <div class="container-fluid">
 
    <!-- Sidebar Toggle -->
    <a class="navbar-brand" href="#">
      <i class="bi bi-list fs-3"></i>
    </a>

    <!-- Navbar Items (Center) -->
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
      </ul>
    </div>

    <!-- Navbar Items (Right) -->
    <ul class="navbar-nav ms-auto align-items-center">
      <!-- Search -->
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-search fs-5"></i></a>
      </li>

      <!-- Messages Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-chat-text fs-5"></i>
          <span class="badge bg-danger rounded-pill">3</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end p-3">
          <li><a class="dropdown-item" href="#">New message from John</a></li>
          <li><a class="dropdown-item" href="#">Meeting reminder</a></li>
          <li><a class="dropdown-item" href="#">System update available</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-center" href="#">View all messages</a></li>
        </ul>
      </li>

      <!-- Notifications Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell-fill fs-5"></i>
          <span class="badge bg-warning rounded-pill">15</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end p-3">
          <li><a class="dropdown-item" href="#">You have 4 new messages</a></li>
          <li><a class="dropdown-item" href="#">3 new reports available</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-center" href="#">See all notifications</a></li>
        </ul>
      </li>

      <!-- User Profile Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown">
          <img src="../admin/assets/img/images.png" class="rounded-circle shadow" width="32" height="32">
          <span class="ms-2 d-none d-md-inline">Admin</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end p-3">
          <li class="text-center">
            <img src="../admin/assets/img/images.png" class="rounded-circle shadow" width="60" height="60">
            <p class="mt-2 mb-1">Alexander Pierce</p>
            <small class="text-muted">Web Developer</small>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><a class="dropdown-item text-danger" href="#">Sign out</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
