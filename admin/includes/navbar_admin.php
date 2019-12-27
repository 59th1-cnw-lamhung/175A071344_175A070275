<!-- Topbar -->
<?php require_once("../includes/connection.php");?>

<nav CLASS="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  
  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" CLASS="btn btn-link d-md-none rounded-circle mr-3">
  <i CLASS="fa fa-bars"></i>
  </button>
  
  <!-- Topbar Search -->
  
  <div CLASS="input-group">
    <input type="text" CLASS="form-control bg-light border-0 small" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
    <div CLASS="input-group-append">
      <button CLASS="btn btn-success" type="button">
      <i CLASS="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
  
  
  <!-- Topbar Navbar -->
  <ul CLASS="navbar-nav ml-auto">
    
    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li CLASS="nav-item dropdown no-arrow d-sm-none">
      <a CLASS="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i CLASS="fas fa-search fa-fw"></i>
      </a>
      <!-- Dropdown - Messages -->
      <div CLASS="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form CLASS="form-inline mr-auto w-100 navbar-search">
          <div CLASS="input-group">
            <input type="text" CLASS="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div CLASS="input-group-append">
              <button CLASS="btn btn-primary" type="button">
              <i CLASS="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    
    <!-- Nav Item - Alerts -->
    
    
    <div CLASS="topbar-divider d-none d-sm-block"></div>
    
    <!-- Nav Item - User Information -->
    <li CLASS="nav-item dropdown no-arrow">
      <a CLASS="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span CLASS="mr-2 d-none d-lg-inline text-gray-600 small">
          <?php
          if(isset($_SESSION['TENTAIKHOAN']))
          {
            $TENTAIKHOAN = $_SESSION['TENTAIKHOAN'];

            $sql = "SELECT * from taikhoan where TENTAIKHOAN = '$TENTAIKHOAN'";
            $query = mysqli_query($conn,$sql);
            $data = mysqli_fetch_array($query);
            $id = $data['ID'];

            if($data['QUYEN'] == 2)
            {

              $sql = "SELECT * from quanly where MAQUANLY = '$id'";
              $query = mysqli_query($conn,$sql);
              $data = mysqli_fetch_array($query);
              echo "<div style='color:green; padding:5px 20px; font-size: 15px'>" .$data['TEN']. " (".$id.") <span style='color:#000'>  Vai trò:</span> Quản lý</div>";
            }

            else if($data['QUYEN'] == 3)
            {

              $sql = "SELECT * from giangvien where MAGIANGVIEN = '$id'";
              $query = mysqli_query($conn,$sql);
              $data = mysqli_fetch_array($query);
              echo "<div style='color:green; padding:5px 20px; font-size: 15px'>" .$data['TEN']. " (".$id.") <span style='color:#000'>  Vai trò:</span> Giảng viên</div>";

            }

            else if ($data['QUYEN'] == '1')
            {
              echo "<div style='color:GREEN; padding:5px 30px;'>ADMIN</div>";
            }
          }

          else
          {
            echo "<div style='color:blue; padding:5px 30px;'> Khách </div>";
          }
          
          ?>

          
        </span>
        <img CLASS="img-profile rounded-circle" src="https://www.mandarinstone.com/app/uploads/2017/09/Geometric-Cube-Decor-Ebony_Dove_White-Swatch.jpg">
      </a>
      <!-- Dropdown - User Information -->
      <div CLASS="dropdown-menu dropdown-menu-right shadow animated-grow-in" aria-labelledby="userDropdown">
        <a CLASS="dropdown-item" href="#" id="profile" role="button" data-toggle="dropdown"><i CLASS="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Cá nhân
        </a>
        <div CLASS="dropdown-list dropdown-menu dropdown-menu-right shadow animated-grow-in" aria-labelledby="profile" style="top: 12px; right: 165px;">
          <h6 CLASS="dropdown-header">
          Message Center
          </h6>
          <p>dvsdhjvbjdshvb</p>
        </div>
        <div CLASS="dropdown-divider"></div>
        <a class="dropdown-item" href="../logout.php">
          <i CLASS="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Đăng xuất
        </a>
      </div>
    </li>
    
  </ul>
  
</nav>
<!-- End of Topbar -->