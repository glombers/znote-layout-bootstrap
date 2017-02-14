				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Information</h3>
					</div>
					<div class="panel-body">
						<table class="table table-condensed table-content table-striped">
							<tbody>
								<tr>
									<td><b>IP:</b></td> <td><?php echo $_SERVER['SERVER_NAME']; ?></td>
								</tr>
								<tr>
									<td><b>Client:</b></td> <td><?php echo ($config['client'] / 100); ?></td>
								</tr>
								<tr>
									<td><b>Type:</b></td> <td>PvP</td>
								</tr>
							</tbody>
						</table>
						<p><a href="http://static.otland.net/ipchanger.exe" class="btn btn-success form-control">Download IP Changer</a></p>
						<a href="downloads.php" class="btn btn-danger form-control">Download Client</a>
					</div>
				</div>