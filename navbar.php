<?php


$_SESSION['user_type'] = 1;
?>
<!DOCTYPE html>

<head>
    <title>A Web Page</title>
	<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		/*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important*/
	}
</style>
</head>
<body>

<p>

<nav id="sidebar" class='mx-lt-5 bg-dark'>
	
    <div class="sidebar-list">
        <a id='navigate-to-dashboard' href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-tachometer-alt "></i></span> Dashboard</a>
		<a  id='navigate-to-house' href="index.php?page=houses" class="nav-item nav-houses"><span class='icon-field'><i class="fa fa-home "></i></span> Houses</a>
        <?php if($_SESSION['user_type']=== 1) : ?>
    <a  id='navigate-to-house-type' href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-th-list"></i></span> House Type</a>
<?php endif; ?>

        <a  id='navigate-to-tenants' href="index.php?page=tenants" class="nav-item nav-tenants"><span class='icon-field'><i class="fa fa-user-friends "></i></span> Tenants</a>
        <a href="index.php?page=invoices" class="nav-item nav-invoices"><span class='icon-field'><i class="fa fa-file-invoice "></i></span> Payments</a>
        <a href="index.php?page=reports" class="nav-item nav-reports"><span class='icon-field'><i class="fa fa-list-alt "></i></span> Reports</a>
        <a href="index.php?page=notification" class="nav-item nav-notification"><span class='icon-field'><i class="fa fa-bell "></i></span> Notifications</a> 
    </div>

</nav>

</p>

<p>

   

</p>

<p>

    <script>
         $(document).ready(function () {
        $('.nav_collapse').click(function(){
            console.log($(this).attr('href'))
            $($(this).attr('href')).collapse()
        })
        $('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')

        if(JSON.parse(window.localStorage.getItem('user-type')).user_type === '2'){
          document.getElementById('navigate-to-dashboard').style.display = 'none'
          document.getElementById('navigate-to-house').style.display = 'none'
          document.getElementById('navigate-to-house-type').style.display = 'none'
          document.getElementById('navigate-to-tenants').style.display = 'none'
        }

       $("#navigate-to-dashboard").on('click',()=>{
                

       })
    });
    </script>

</p>

</body>
</html>