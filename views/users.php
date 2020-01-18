<?php Flight::render( 'partials/header' ); ?>

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
	<!-- Table -->
	<div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header border-0">
					<div class="float-left">
						<h3 class="mb-0">Users</h3>
					</div>
					<div class="float-right">
						<a href="<?php echo get_url( 'users/add' ); ?>" class="btn btn-success right">Add User</a>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table align-items-center table-flush">
						<thead class="thead-light">
							<tr>
								<th scope="col">Username</th>
								<th scope="col">Password</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($users as $user) { ?>
							<tr>
								<th scope="row">
									<div class="media align-items-center">
										<a href="#" class="avatar rounded-circle mr-3">
											<img alt="Image placeholder" src="<?php echo $asset_url; ?>/img/theme/bootstrap.jpg">
										</a>
										<div class="media-body">
											<span class="mb-0 text-sm"><?php echo $user['username']; ?></span>
										</div>
									</div>
								</th>
								<td>
									****
								</td>
								<td>
									<a href="<?php echo get_url( 'users/edit/' . $user['username'] ); ?>" class="btn btn-info">Edit</a>
									<a href="<?php echo get_url( 'users?us=' . $user['username'] ); ?>" class="delete btn btn-danger">Delete</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<?php
				Flight::render( 'partials/pagination', array(
					'pagination_url' => get_url('users'),
					'page' => $page,
					'total_pages' => $total_pages
				) );
				?>
			</div>
		</div>
	</div>
</div>

<?php Flight::render( 'partials/footer' ); ?>