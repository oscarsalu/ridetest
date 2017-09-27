<!-- Main content -->
<section class="content">
<!-- Default box -->
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">Available Rides</h3>
			<div class="box-tools pull-right">
				<div class="btn-group">
					<a href="<?= site_url('getride/create_getride/'); ?>"><i class="fa fa-plus"></i>Share Ride</a>
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
							<th>Origin</th>
							<th>Destination</th>
							<th>Capacity</th>
							<th>Driver/Owner</th>
							<th>Vehicle Number</th>
							<th>Departer time</th>
							<th>Created On</th>
							<th>Book Ride</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=0; ?>
					<?php foreach ($getride as $row): ?>
					<?php $i++; ?>
						<tr>
							<td><?= $i; ?></td>
							<td><?= $row->origin; ?></td>
							<td><?= $row->destination; ?></td>
							<td><?= $row->capacity; ?></td>
							<td><?= $row->first_name.' '.$row->last_name; ?></td>
							<td><?= $row->vehiclename; ?></td>
							<td><?= $row->time; ?></td>
							<td><?= $row->createdat; ?></td>
							<td><a href="<?= site_url('bookrid/bookride/'.$row->id); ?>" data-toggle="tooltip"  title="book" class="btn btn-info btn-xs"><i class="fa fa-shopping-cart"></i></a></td>
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
