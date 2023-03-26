<?php

?>
<style>
  body {
  padding-top: 3.5rem; /* Set the padding to match the height of the navbar */
}
</style>

<nav class="navbar navbar-light fixed-top bg-primary" style="padding:0;min-height: 3.5rem">
<div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
    <h3 class="text-white mb-0">Brentwood Apartment</h3>
	  	<div class="float-right">
      <a href="#" class="text-white"  id="account_settings">
              <?php
              if (isset($_SESSION['login_name'])) 
               echo $_SESSION['login_name'] ?> </a>
               <a class="text-white ml-3" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
             
        
      </div>
  </div>
</div>
  
</nav>

<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>