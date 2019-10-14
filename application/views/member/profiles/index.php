<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<hr>
<?echo $myproduct ;die;?>
<div class="container bootstrap snippet">
	<div class="row">
		<div class="col-sm-10"><h1>User name</h1></div>
		<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
	</div>
	<div class="row">
		<div class="col-sm-3"><!--left col-->


			<div class="text-center">
				<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
				<h6>Upload a different photo...</h6>
				<input type="file" class="text-center center-block file-upload">
			</div></hr><br>


			<div class="panel panel-default">
				<div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
				<div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
			</div>


			<ul class="list-group">
				<li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
				<li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
			</ul>

			<div class="panel panel-default">
				<div class="panel-heading">Social Media</div>
				<div class="panel-body">
					<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
				</div>
			</div>

		</div><!--/col-3-->
		<div class="col-sm-9">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
				<li><a data-toggle="tab" href="#allproducts">All products</a></li>
				<li><a data-toggle="tab" href="#myproducts">My products</a></li>
<!--				<li ><a  href="/ciadmin2/member/profiles">Home</a></li>-->
<!--				<li><a href="/ciadmin2/member/allproducts">All products</a></li>-->
<!--				<li><a  href="/ciadmin2/member/myproduct">My products</a></li>-->
			</ul>


			<div class="tab-content">
				<div class="tab-pane active" id="home">
					<hr>
					<form class="form" action="/ciadmin2/member/edit" method="post" id="registrationForm">
						<div class="form-group">

							<div class="col-xs-6">
								<label for="first_name"><h4>First name</h4></label>
								<input type="text" class="form-control" name="first_name" value = "<?php print_r($user_info[0]['first_name'])?>"id="first_name" placeholder="first name" title="enter your first name if any.">
							</div>
						</div>
						<div class="form-group">

							<div class="col-xs-6">
								<label for="last_name"><h4>Last name</h4></label>
								<input type="text" class="form-control" name="last_name" value = "<?php print_r($user_info[0]['last_name'])?>" id="last_name" placeholder="last name" title="enter your last name if any.">
							</div>
						</div>


						<div class="form-group">

							<div class="col-xs-6">
								<label for="email"><h4>Email</h4></label>
								<input type="email" class="form-control" name="email" value = "<?php print_r($user_info[0]['email_addres'])?>"id="email" placeholder="you@email.com" title="enter your email.">
							</div>
						</div>
						<div class="form-group">

							<div class="col-xs-6">
								<label for="username"><h4>Username</h4></label>
								<input type="text" class="form-control" name="user_name" value = "<?php print_r($user_info[0]['user_name'])?>"id="username" placeholder="you@email.com" title="enter your username.">
							</div>
						</div>

						<div class="form-group">

							<div class="col-xs-6">
								<label for="password"><h4>Password</h4></label>
								<input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
							</div>
						</div>
						<div class="form-group">

							<div class="col-xs-6">
								<label for="password2"><h4>Verify</h4></label>
								<input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<br>
								<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
								<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane" id = 'allproducts'>
					<table class="table table-striped table-bordered table-condensed">
						<thead>
						<tr>
							<th class="header">ID</th>
							<th class="yellow">Description</th>
							<th class="yellow header headerSortDown">Stock</th>
							<th class="red header">Cost Price</th>
							<th class="red header">Sell Price</th>
							<th class="red header">Count</th>
							<th class="red header">Buy</th>

						</tr>
						</thead>
						<tbody>
						<?php foreach($all_products as $row){ ?>
						<tr>
							<td><?=$row['id']?></td>;
							<td><?=$row['description']?></td>;
							<td><?=$row['stock']?></td>;
							<td><?=$row['cost_price']?></td>';
							<td><?=$row['sell_price']?></td>';
							<!--             data-url="buy/--><?//=$row['id']?><!--"-->
							<td><input type = "number" name="count" id="count_<?=$row['id'] ?>"></td>';
							<td><a href="javascript:;" onclick = "countFunction(this,'<?php echo $row['id']; ?>')">Buy</a></td>;

							<?php } ?>
						</tbody>
					</table>
					<script>
						function countFunction(a, b) {

							// console.log(b);die;

							var inputVal = $('#count_'+b);
							var newUrl = "buy/"+b+"/"+ inputVal.val();
							// var newUrl = "buy?id="+b+"&value="+ inputVal.val();
							//newUrl += inputVal.val();
							//console.log( newUrl);
							window.location.href = newUrl; // redirect e anum nor url_i vra
						}
					</script>
				</div>
				<div class="tab-pane" id = 'myproducts'>

					<table class="table table-striped table-bordered table-condensed">
						<thead>
						<tr>
							<th class="header">ID</th>
							<th class="yellow">Description</th>
							<th class="yellow header headerSortDown">Stock</th>
							<th class="red header">Cost Price</th>
							<th class="red header">Sell Price</th>
							<th class="red header">Count</th>
							<!--        <th class="red header">Buy</th>-->

						</tr>
						</thead>
						<tbody>
						<?php
						echo"<pre>";

						// print_r($myproduct);die;
						foreach($myproduct as $row)
						{
							//  echo"<pre>";

							// print_r($row);
							echo '<tr>';
							echo '<td>'.$row['id'].'</td>';
							echo '<td>'.$row['description'].'</td>';
							echo '<td>'.$row['stock'].'</td>';
							echo '<td>'.$row['cost_price'].'</td>';
							echo '<td>'.$row['sell_price'].'</td>';
							echo '<td>'.$row['count'].'</td>';

						}
						?>
						</tbody>
					</table>
				</div>
			</div><!--/tab-pane-->
		</div><!--/tab-content-->

	</div><!--/col-9-->
</div><!--/row-->
