<?php
$page = 'guest';
    include "./partials/atas.php";
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id= $_GET['id'];
        $query_check = mysqli_query($connection, "SELECT * FROM users WHERE user_id = $id");
        if(mysqli_num_rows($query_check) == 1){
          $data= mysqli_fetch_assoc($query_check);
          
        }
        else{
          header('location: ./guest.php');
        }
      }
      else{
        header('location: ./guest.php');
      }
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Guest</h5>
                                          <p class="m-b-0">Selamat datang di dashboard guest ProdiKU</p>
                                      </div>
                                  </div>
                                  
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Hover table card start -->
                                        <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Edit Guest</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <form class="form-material" method="POST" action="./process/edit_guest.process.php">
                                                            <input type="hidden" name="id" value="<?= $id ?>">
                                                            <div class="form-group form-default">
                                                                <input type="email" name="email" class="form-control" required="" value="<?= $data['email'] ?>">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Email</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="password" name="password" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Password Baru</label>
                                                            </div>

                                                            <div class="form-group form-default">
                                                                <input type="password" name="repassword" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Masukkan Re-password</label>
                                                            </div>

                                                            <input type="submit" name="submit" class="btn btn-success waves-effect waves-light" value="Edit">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- Hover table card end -->
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
<?php
    include "./partials/bawah.php";
?>              