<?php
	include_once('./php/header.php');
?>

    <div class="container-fluid">
      <div class="row">	        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>
          <h2 class="sub-header">Welcome <?php echo $_SESSION(‘FULL_NAME’); ?></h2>
        </div>
      </div>
    </div>
<?php
	include_once('./php/footer.php');
?>