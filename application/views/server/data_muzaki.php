<div class="row">
	<div class="col-lg-4">
		<div class="alert alert-success" data-animate><i class="fa fa-info"></i></div>
	</div>
	<div class="col-lg-8">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($muzaki->result() as $m): ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $m->nama_muzaki ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>