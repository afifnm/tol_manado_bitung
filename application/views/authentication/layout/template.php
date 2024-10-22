<!DOCTYPE html>
<html>

<head>
	<title>
		<?php echo $title ?>
	</title>
	<link href='<?php echo base_url("assets/upload/logo.png"); ?>' rel='shortcut icon' type='image/x-icon' />
	<!-- meta -->
	<?php require_once('_meta.php') ;?>

	<!-- css -->
	<?php require_once('_css.php') ;?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- jQuery 2.2.3 -->
	<script src="<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
</head>
<style type="text/css">
	background-image {
		opacity: 0.5;
	}
</style>
<body class="hold-transition register-page" style="
background-image: url(<?php echo base_url("assets/upload/login2.jpg"); ?>); 
background-size: cover; 
background-repeat: no-repeat;">
	<div class="wrapper">
		<?php echo $contents ;?>
	</div>
	<!-- js -->
	<?php require_once('_js.php') ;?>
</body>

</html>
