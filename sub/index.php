<?php
if ($config['UseChangelogTicker']) {
	//////////////////////
	// Changelog ticker //
	// Load from cache
	$changelogCache = new Cache('engine/cache/changelog');
	$changelogs = $changelogCache->load();

	if (isset($changelogs) && !empty($changelogs) && $changelogs !== false) {
		?>
		<table id="changelogTable">
			<tr class="yellow">
				<td colspan="2">Latest Changelog Updates (<a href="changelog.php" style="color: darkorange;">Click here to see full changelog</a>)</td>
			</tr>
			<?php
			for ($i = 0; $i < count($changelogs) && $i < 5; $i++) {
				?>
				<tr>
					<td><?php echo getClock($changelogs[$i]['time'], true, true); ?></td>
					<td><?php echo $changelogs[$i]['text']; ?></td>
				</tr>
				<?php
			}
			?>
		</table>
		<?php
	} else echo "No changelogs submitted.";
}
$cache = new Cache('engine/cache/news');
if ($cache->hasExpired()) {
	$news = fetchAllNews();
	
	$cache->setContent($news);
	$cache->save();
} else {
	$news = $cache->load();
}

// Design and present the list
if ($news) {
	function TransformToBBCode($string) {
		$tags = array(
			'[center]{$1}[/center]' => '<center>$1</center>',
			'[b]{$1}[/b]' => '<b>$1</b>',
			'[size={$1}]{$2}[/size]' => '<font size="$1">$2</font>',
			'[img]{$1}[/img]'    => '<a href="$1" target="_BLANK"><img src="$1" alt="image" style="width: 100%"></a>',
			'[link]{$1}[/link]'    => '<a href="$1">$1</a>',
			'[link={$1}]{$2}[/link]'   => '<a href="$1" target="_BLANK">$2</a>',
			'[color={$1}]{$2}[/color]' => '<font color="$1">$2</font>',
			'[*]{$1}[/*]' => '<li>$1</li>',
		);

		foreach ($tags as $tag => $value) {
			$code = preg_replace('/placeholder([0-9]+)/', '(.*?)', preg_quote(preg_replace('/\{\$([0-9]+)\}/', 'placeholder$1', $tag), '/'));
			$string = preg_replace('/'.$code.'/i', $value, $string);
		}

		return $string;
	}
	foreach ($news as $n) {
		?>

		<div class="panel panel-default">
	    	<div class="panel-heading"><?php echo getClock($n['date'], true); ?> | <?php echo TransformToBBCode($n['title']); ?> Published by <?php echo '<a href="characterprofile.php?name='. $n['name'] .'">'. $n['name'] .'</a>'; ?>.</div>
	    	<div class="panel-body">
	    		<?php echo TransformToBBCode(nl2br($n['text'])); ?>
	    	</div>
	  </div>
		<?php
	}
}
?>