<?php
    require_once "../../config/connection.php";
    session_start();
    if(!isset($_SESSION['user_login']['dosen_id'])){
        header('location: ../../index.php');
      }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $dosen_id = $_SESSION['user_login']['dosen_id'];
    $query = mysqli_query($connection,"SELECT * FROM dosen WHERE user_id = $dosen_id");
    $data_dosen = mysqli_fetch_assoc($query);
    $nip = $data_dosen['nip'];
?>

<head>
    <title>ProdiKU - Dosen</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      <link rel="shortcut icon" href="../../assets/icon/icon.png">
    <!-- waves.css -->
    <link rel="stylesheet" href="../assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="../assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="../assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
      <link rel="stylesheet" href="../../../css/fontawesome.min.css">
        <link rel="stylesheet" href="../../../css/all.min.css">
        <script src="../../assets/jquery/jquery-3.6.0.min.js"></script>
  </head>

  <body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                  <div class="navbar-logo">
                      <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                          <i class="ti-menu"></i>
                      </a>
                      <div class="mobile-search waves-effect waves-light">
                          <div class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control" placeholder="Enter Keyword">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="./dashboard.php">
                          <h5 style="color:#fff; font-weight:600;">ProdiKU</h5>
                      </a>
                      <a class="mobile-options waves-effect waves-light">
                          <i class="ti-more"></i>
                      </a>
                  </div>
                
                  <div class="navbar-container container-fluid">
                      <ul class="nav-left">
                          <li>
                              <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                          </li>
                          <li class="header-search">
                              <div class="main-search morphsearch-search">
                                  <div class="input-group">
                                      <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                      <input type="text" class="form-control">
                                      <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                  <i class="ti-fullscreen"></i>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav-right">
                          <li class="user-profile header-notification">
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="../assets/images/avatar-user.png" class="img-radius" alt="User-Profile-Image">
                                  <span><?=$_SESSION['user_login']['email']?></span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="./lihat_datadiri.php">
                                          <i class="ti-user"></i> Lihat Data Diri
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                        <a href="./ubah_password.php">
                                          <i class="ti-key"></i> Ubah Password
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                        <a href="../../logout.php">
                                          <i class="ti-layout-sidebar-left"></i> Logout
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                  <img class="img-80 img-radius" src="../assets/images/avatar-user.png" alt="User-Profile-Image">
                                  <div class="user-details">
                                      <span id="more-details"><?= $data_dosen['nama_dosen'] ?><i class="fa fa-caret-down"></i></span>
                                  </div>
                              </div>
        
                              <div class="main-menu-content">
                                  <ul>
                                    <li class="more-details">
                                          <a href="./lihat_datadiri.php"><i class="ti-user"></i>Lihat Data Diri</a>
                                      </li>
                                      <li class="more-details">
                                          <a href="./ubah_password.php"><i class="ti-key"></i>Ubah Password</a>
                                      </li>
                                      <li class="more-details">
                                          <a href="../../logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="p-15 p-b-0">
                              <form class="form-material">
                                  <div class="form-group form-primary">
                                      <input type="text" name="footer-email" class="form-control" required="">
                                      <span class="form-bar"></span>
                                      <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                                  </div>
                              </form>
                          </div>
                          <ul class="pcoded-item pcoded-left-item">
                              <li <?php if($page == "dashboard") echo "class='active'";?>>
                                  <a href="dashboard.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li <?php if($page == "prodi") echo "class='active'";?>>
                                  <a href="prodi.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-files"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Prodi</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>

                              <li class="pcoded-hasmenu <?php if($pages == "jurnal") echo "active";?> <?php if($pages == "jurnal") echo "pcoded-trigger";?>">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-book"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Jurnal</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                    <li <?php if($page == "jurnal_index") echo "class='active'";?>>
                                        <a href="jurnal_index.php" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Jurnal Index</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li <?php if($page == "peringkat_jurnal") echo "class='active'";?>>
                                        <a href="peringkat_jurnal.php" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Peringkat Jurnal</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                  </ul>
                              </li>

                              <li class="pcoded-hasmenu <?php if($pages == "dsn") echo "active";?> <?php if($pages == "dsn") echo "pcoded-trigger";?>">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-user"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Dosen</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                    <li <?php if($page == "haki_dosen") echo "class='active'";?>>
                                        <a href="haki_dosen.php" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Haki Dosen</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li <?php if($page == "publikasi_dosen") echo "class='active'";?>>
                                        <a href="publikasi_dosen.php" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Publikasi Dosen</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                  </ul>
                              </li>

                              <li class="pcoded-hasmenu <?php if($pages == "mhs") echo "active";?> <?php if($pages == "mhs") echo "pcoded-trigger";?>">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-user"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Mahasiswa</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                    <li <?php if($page == "mahasiswa") echo "class='active'";?>>
                                        <a href="mahasiswa.php" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Daftar Mahasiswa</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li <?php if($page == "prestasi_mhs") echo "class='active'";?>>
                                        <a href="prestasi_mhs.php" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Prestasi Mahasiswa</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li <?php if($page == "haki_mhs") echo "class='active'";?>>
                                        <a href="haki_mhs.php" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Haki Mahasiswa</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    
                                    <li <?php if($page == "publikasi_mhs") echo "class='active'";?>>
                                        <a href="publikasi_mhs.php" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Publikasi Mahasiswa</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                  </ul>
                              </li>

                              <li class="pcoded-hasmenu <?php if($pages == "dokumen") echo "active";?> <?php if($pages == "dokumen") echo "pcoded-trigger";?>">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-files"></i></span>
                                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Dokumen</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                    <li <?php if($page == "tipe_dok") echo "class='active'";?>>
                                        <a href="tipe_dokumen.php" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Tipe Dokumen</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li <?php if($page == "dok") echo "class='active'";?>>
                                        <a href="dokumen.php" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Dokumen</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                  </ul>
                              </li>

                              <li <?php if($page == "pubuku") echo "class='active'";?>>
                                  <a href="buku.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-book"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Publikasi Buku</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                              <li <?php if($page == "pengabdian") echo "class='active'";?>>
                                  <a href="pengabdian.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-heart"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Pengabdian</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>

                              <li <?php if($page == "penelitian") echo "class='active'";?>>
                                  <a href="penelitian.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="ti-eye"></i><b>FC</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Penelitian</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                          </ul>       
                  </nav>