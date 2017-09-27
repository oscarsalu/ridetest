<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
			<form class="form-horizontal" method="post" action="<?= site_url('bookrid/create_bookrid') ?>">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Add Bookrid</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Booked ride<span style="color:red">*</span></label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="getrideid" id="getrideid" value="<?php if(!empty($obj['getrideid'])){ echo $obj['getrideid'];} ?>">
								<span class="alert-msg  error"><?php echo form_error('getrideid'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Name<span style="color:red">*</span></label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="bookerid" id="bookerid" value="<?php if(!empty($obj['bookerid'])){ echo $obj['bookerid'];} ?>">
								<span class="alert-msg  error"><?php echo form_error('bookerid'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Time Booked<span style="color:red">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="timebooked" id="timebooked" class="form_datetime" size="12" readonly value="<?php if(!empty($obj['timebooked'])){ echo $obj['timebooked'];} ?>">
								<span class="alert-msg  error"><?php echo form_error('timebooked'); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Created At<span style="color:red">*</span></label>
							<div class="col-sm-10">
								<input class="form-control" type="text" name="createdAt" id="createdAt" value="<?php if(!empty($obj['createdAt'])){ echo $obj['createdAt'];} ?>">
								<span class="alert-msg  error"><?php echo form_error('createdAt'); ?></span>
							</div>
						</div>
						<div class="box-footer">
						<button type="reset" class="btn  btn-danger pull-left"> cancel </button>
						<?php echo form_submit('submit', 'Save','class="btn btn-lg btn-success pull-right"');?>
						</div>
					</div><!-- /.box-body -->
				</div><!--box box-success-->
			</div>
		</div>
	</section>
<script type="text/javascript">
	$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});
</script>
