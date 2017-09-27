<!-- Main content -->
<section class="content">
<!-- Default box -->
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">Booked List</h3>
			<div class="box-tools pull-right">
				<div class="btn-group">
				</div>
			</div>
		</div>
		<div class="box-body">
		<?php if($this->session->flashdata('message')){ ?>
			<div class="alert alert-info"><?= $this->session->flashdata('message'); ?></div>
		<?php } ?>
				<table  class="table table-bordered table-striped" id="example1">
					<thead>
						<tr>
							<th></th>
							<th>Booked ride</th>
							<th>Name</th>
							<th>Time Booked</th>
							<th>Created At</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=0; ?>
					<?php foreach ($bookrid as $row): ?>
					<?php $i++; ?>
						<tr>
							<td><?= $i; ?></td>
							<td><?= '<small>'.$row->origin.' - '.$row->destination.'('.$row->vehiclename.') </small>'; ?></td>
							<td><?= $row->first_name.' '.$row->last_name; ?></td>
							<td><?= $row->timebooked; ?></td>
							<td><?= $row->createdAt; ?></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			</div>
		<!-- /.box-body -->
	<div class="box-footer">
	</div>
	<!-- /.box-footer-->
</div>
<!-- /.box -->
