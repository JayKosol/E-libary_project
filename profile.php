
<?php
$username=NULL;
if (isset($_COOKIE['logincookie'])) {
      //print_r($_COOKIE['logincookie']);
    $identity = unserialize($_COOKIE['logincookie']);
    $username = $identity['uname'];
//     print_r($identity);
} else if (isset($_SESSION['username'])) {

    //read session
    
    $username = $_SESSION['username'];
}
if (isset($username)) {
?>

<!-- @profile -->
<div class="profile-content">
<div class="profile">
      <div style="height:20px;width:20px">
      <i class="bi bi-person-circle"></i>
      </div>
      <div class="profile-detail">
            <div class="name_job">
                  <div class="name"><?php echo $username ?? "" ?></div>
                  <div class="job">
                        <span>Administrator</span>
                        <form method="POST" action="logout.php">
                              <button type="submit" style="background: none;border:none"  >
                                    <div >
                                          <i class="bi bi-box-arrow-left" id="btn-logout"></i>
                                    </div>
                              </button>
                        </form>

                  </div>
                        
            </div>
            
      </div>
</div>
</div>
<?php
}
?>