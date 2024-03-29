<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>CodeIgniter Admin Sample Project</title>
	<meta charset="utf-8">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap1.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">

			<ul class="nav">
				<li <?php if($this->uri->segment(2) == 'products'){echo 'class="active"';}?>>
					<a href="<?php echo base_url(); ?>admin/products">Products</a>
				</li>
				<li <?php if($this->uri->segment(2) == 'manufacturers'){echo 'class="active"';}?>>
					<a href="<?php echo base_url(); ?>admin/manufacturers">Manufacturers</a>
				</li>
				<li <?php if($this->uri->segment(2) == 'categories'){echo 'class="active"';}?>>
					<a href="<?php echo base_url(); ?>admin/categories">Categories</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo base_url(); ?>admin/logout" style="color:red"">Logout</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
