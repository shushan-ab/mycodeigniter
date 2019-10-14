<?php print_r($_FILES);?><div class="container top">

	<ul class="breadcrumb">
		<li>
			<a href="<?php echo site_url("admin"); ?>">
				<?php echo ucfirst($this->uri->segment(1));?>
			</a>
			<span class="divider">/</span>
		</li>
		<li>
			<a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
				<?php echo ucfirst($this->uri->segment(2));?>
			</a>
			<span class="divider">/</span>
		</li>
		<li class="active">
			<a href="#">New</a>
		</li>
	</ul>

	<div class="page-header">
		<h2>
			Adding <?php echo ucfirst($this->uri->segment(2));?>
		</h2>
	</div>

	<?php
	//flash messages
	if(isset($flash_message)){
		if($flash_message == TRUE)
		{
			echo '<div class="alert alert-success">';
			echo '<a class="close" data-dismiss="alert">×</a>';
			echo '<strong>Well done!</strong> new product created with success.';
			echo '</div>';
		}else{
			echo '<div class="alert alert-error">';
			echo '<a class="close" data-dismiss="alert">×</a>';
			echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
			echo '</div>';
		}
	}
	?>

	<?php
	//form data
	$attributes = array('class' => 'form-horizontal', 'id' => '');
	$options_manufacture = array('' => "Select");
	$options_categories = array('' => "Select");
	foreach ($manufactures as $row)
	{
		$options_manufacture[$row['id']] = $row['name'];
	}
	//
	foreach ($categories as $row)
	{
		$options_categories[$row['id']] = $row['name'];
	}
	//form validation
	echo validation_errors();

	//echo form_open('admin/products/add', "enctype=multipart/form-data");
	echo form_open_multipart('admin/products/add');
	?>
	<fieldset>
		<div class="control-group">
			<label for="inputError" class="control-label">Name</label>
			<div class="controls">
				<input type="text" id="" name="name" value="<?php echo set_value('name'); ?>" >
				<!--<span class="help-inline">Woohoo!</span>-->
			</div>
		</div>
		<div class="control-group">
			<label for="inputError" class="control-label">Description</label>
			<div class="controls">
				<input type="text" id="" name="description" value="<?php echo set_value('description'); ?>" >
				<!--<span class="help-inline">Woohoo!</span>-->
			</div>
		</div>
		<div class="control-group">
			<label for="inputError" class="control-label">Stock</label>
			<div class="controls">
				<input type="text" id="" name="stock" value="<?php echo set_value('stock'); ?>">
				<!--<span class="help-inline">Cost Price</span>-->
			</div>
		</div>
		<div class="control-group">
			<label for="inputError" class="control-label">Cost Price</label>
			<div class="controls">
				<input type="text" id="" name="cost_price" value="<?php echo set_value('cost_price'); ?>">
				<!--<span class="help-inline">Cost Price</span>-->
			</div>
		</div>
		<div class="control-group">
			<label for="inputError" class="control-label">Sell Price</label>
			<div class="controls">
				<input type="text" name="sell_price" value="<?php
				set_value('sell_price'); ?>">
				<!--<span class="help-inline">OOps</span>-->
			</div>
		</div>
		<?php
		echo '<div class="control-group">';
		echo '<label for="manufacture_id" class="control-label">Manufacture</label>';
		echo '<div class="controls">';
		//echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

		echo form_dropdown('manufacture_id', $options_manufacture, set_value('manufacture_id'), 'class="span2"');?>

		<div class="control-group">
			<label for="inputError" class="control-label">image</label>
			<div class="controls">
				<input type="file" name="image" >
				<!--<span class="help-inline">OOps</span>-->
			</div>
		</div>
		<?php

		echo '</div>';
		echo '</div>';

		echo '<div class="control-group">';
		echo '<label for="category_id" class="control-label">Category</label>';
		echo '<div class="controls">';
		//echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');

		echo form_dropdown('category_id', $options_categories, set_value('category_id'), 'class="span2"');

		echo '</div>';
		echo '</div>';
		?>
		<div class="form-actions">
			<button class="btn btn-primary" type="submit">Save changes</button>
			<button class="btn" type="reset">Cancel</button>
		</div>
	</fieldset>

	<?php echo form_close(); ?>

</div>

