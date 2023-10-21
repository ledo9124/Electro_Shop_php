
<div class="profile-page mt-5 mb-5">
      <div class="container profile-inner">
          <div class="row">
              <ul class="col-3 profile-navbar-left">
                 <li class="border-bottom"><a href="index.php?act=profile">Your profile</a></li> 
              </ul>
  
              <div class="col-9 profile-content">
                <form action="index.php?act=profile-update" method="post" id="profile-avatar" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="profile-photo">
                      <div class="img">
                        <!-- <img src="./view/asset/image/avata.jpg" alt=""> -->
                        <?php 
                          if ($client[0]['client_img']) {
                            echo '
                              <img src="'.$img_path.$client[0]['client_img'].'" alt="">
                            ';
                          }else{ 
                            echo '
                              <img src="./view/asset/image/avata.jpg" alt="">
                            ';
                          }
                        ?>
                      </div>
                      <label for="file"><i class="bi bi-pencil"></i></label>
                    </div>
                    <input  type="file" name="file" id="file" hidden value="<?=$client[0]['client_img']?>">
                    <span class="form-message"></span>
                  </div>

                  <div class="form-group profile-submit">
                    <input type="submit" name="avatar" value="Save">
                    <span class="form-message"></span>
                  </div>
                </form>

                <form action="index.php?act=profile-update" method="post"  id="profile-info">
                  <div class="wrapper-profile border">

                    <div class="title">Basic information</div>
                    <div class="form-group border-bottom">
                      <label for="user_name">User name</label>
                      <div class="profile-input">
                        <input rules="required" type="text" id="user_name" class="user_name" name="user_name" value="<?=$client[0]['user_name']?>">
                        <span class="form-message"></span>
                      </div>
                    </div>
  
                    <div class="form-group border-bottom">
                      <label for="email">Email</label>
                      <div class="profile-input">
                        <input rules="required|email" type="email" id="email" class="email" name="email"  value="<?=$client[0]['client_email']?>">
                        <span class="form-message"></span>
                      </div>
                    </div>
  
                    <div class="form-group">
                      <label for="password">Password</label>
                      <div class="profile-input">
                        <input  rules="required|password" type="text" id="password" class="password" name="password" value="<?=$client[0]['password']?>">
                        <span class="form-message"></span>
                      </div>
                    </div>

                  </div>

                  <div class="form-group profile-submit">
                    <input type="submit" name="submit" value="Save">
                    <span class="form-message"></span>
                  </div>

                </form>
              </div>
          </div>
      </div>
  </div>

  <script src="./view/asset/js/validator2_0.js"></script>
  <script>
    new Validator('#profile-avatar');
    new Validator('#profile-info');
  </script>
