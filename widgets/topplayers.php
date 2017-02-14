				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Top 5 Level</h3>
					</div>
					<div class="panel-body">
						<table class="table table-condensed table-content table-striped">
							<tbody>
								<?php
									$cache = new Cache('engine/cache/topPlayer');
									if ($cache->hasExpired()) {
										$players = mysql_select_multi('SELECT `name`, `level`, `experience` FROM `players` WHERE `group_id` < ' . $config['highscore']['ignoreGroupId'] . ' ORDER BY `experience` DESC LIMIT 5;');
										
										$cache->setContent($players);
										$cache->save();
									} else {
										$players = $cache->load();
									}

									if ($players) {
										$count = 1;
										foreach($players as $player) {
											echo "<tr><td class='labelbox' width='50%'>$count - <a href='characterprofile.php?name=". $player['name']. "'>". $player['name']. "</a> <span class='label label-primary' style='float:right;width: 55px;'>Level: ". $player['level'] ."</span></td></<tr>";
											$count++;
										}
									}
									?>
							</tbody>
						</table>
					</div>
				</div>