<!-- Main content -->
<section class="content">
<!-- Default box -->
	<div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">bookrid List</h3>
			<div class="box-tools pull-right">
				<div class="btn-group">
					<a href="<?= site_url('bookrid/create_bookrid/'); ?>"><i class="fa fa-plus"></i>Add Bookrid</a>
				</div>
			</div>
		</div>
		<div class="box-body">
		<?php if(isset($message)){ ?>
			<div class="alert alert-success"><?= $message ?></div>
		<?php } ?>
				<table  class="table table-bordered table-striped" id="example1">
					<thead>
						<tr>
							<th></th>
							<th>Booked ride</th>
							<th>Name</th>
							<th>Time Booked</th>
							<th>Created At</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=0; ?>
					<?php foreach ($bookrid as $row): ?>
					<?php $i++; ?>
						<tr>
							<td><?= $i; ?></td>
							<td><?= $row->getrideid; ?></td>
							<td><?= $row->bookerid; ?></td>
							<td><?= $row->timebooked; ?></td>
							<td><?= $row->createdAt; ?></td>
							<td><a href="<?= site_url('bookrid/edit_bookrid/'.$row->id); ?>" data-toggle="tooltip"  title="edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>							<a href="<?= site_url('bookrid/delete_bookrid/'.$row->id); ?>" data-toggle="tooltip"  title="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
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
