				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Server Status</h3>
					</div>
					<div class="panel-body">
						<table class="table table-condensed table-content table-striped">
							<tbody>
								<tr>
									<?php
										$status = true;
										if ($config['status']['status_check']) {
											@$sock = fsockopen ($config['status']['status_ip'], $config['status']['status_port'], $errno, $errstr, 1);
											if(!$sock) {
												echo '<td colspan=2>Status: <span class="label label-danger pull-right">Offline!</span></td>';
												$status = false;
											}
											else {
												$info = chr(6).chr(0).chr(255).chr(255).'info';
												fwrite($sock, $info);
												$data='';
												while (!feof($sock))$data .= fgets($sock, 1024);
												fclose($sock);
												echo '<td colspan=2>Status: <span class="label label-success pull-right">Online!</span></td>';
											}
										}
									?>
								</tr>
								<?php if ($status) { ?>
								<tr>
									<td><a href="onlinelist.php"><?php echo user_count_online(); ?> players online</a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
