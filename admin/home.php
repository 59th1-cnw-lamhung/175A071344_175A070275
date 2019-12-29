
<?php require_once("../includes/connection.php"); ?>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   
  <!-- Custom fonts FOR this template-->
  <link href="../style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   
  <!-- Custom styles FOR this template-->
  <link href="../style/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">


<div class="row" style="width: 90%; margin: 0px auto" >

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-3 mb-2">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng số tài khoản</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      
                      <?php 
                        $sql = "SELECT * FROM taikhoan";
                        $query = mysqli_query($conn,$sql);
                        echo mysqli_num_rows($query);
                      ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-3 mb-2">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Số tài khoản giảng viên</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                        <?php 
                        $sql = "SELECT * FROM giangvien";
                        $query = mysqli_query($conn,$sql);
                        echo mysqli_num_rows($query);
                      ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-3 mb-2">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Số tài khoản quản lý</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                        <?php 
                        $sql = "SELECT * FROM quanly";
                        $query = mysqli_query($conn,$sql);
                        echo mysqli_num_rows($query);
                      ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-3 mb-2">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Số bài viết</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                          $sql = "SELECT * FROM baiviet";
                          $query = mysqli_query($conn,$sql);
                          echo mysqli_num_rows($query);
                        ?>  
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
