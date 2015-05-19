<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<base href='<?php echo $base_url ?>' >
	<link rel="stylesheet" href="public/template/manager/css/login.css">

    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   

</head>
<body>
	<header>
		
	</header><!-- /header -->
	<section class='login-wraper'>
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Đăng nhập vào hệ thống</h3>
		  </div>
		  <div class="panel-body">
		  	<form method='Post'action="">
		  			<ul class="error">
		  				<?php echo validation_errors();?>
		  			</ul>

		  			<div class="form-group">
		  			  <label for="usr">Tên quản lý:</label>
		  			  <input type="text" class="form-control" id="usr"  value="<?php echo isset($post['username'])?htmlspecialchars($post['username']):'';?>" name="data[username]">
		  			</div>
		  			<div class="form-group">
		  			  <label for="pwd">Mật khẩu:</label>
		  			  <input type="password" class="form-control" id="pwd" name="data[password]">
		  			</div>
		  			<section>
		  				<input type="submit" name="login" value="Đăng nhập" class="btn btn-primary">
		  				<input type="reset" name="reset" value="Làm lại" class="btn btn-danger">
		  			</section>
		  			<hr>
		  			 Quay về trang chủ? <a href="#" >click here </a>
		  		
		  	</form>

		  </div>
		</div>
		
	
		
	</section>
	
	<footer>
		<p>Copyright &copy 2015</p>
	</footer>
	 <script src="public/bootstrap/js/jquery-2.1.3.min.js"></script>
	<script src="public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>