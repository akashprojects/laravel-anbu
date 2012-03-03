<style type="text/css">
	<?php echo File::get(Bundle::path('anbu').'public/css/style.css'); ?>
</style>
<div class="anbu">
	<div class="anbu-window">
		<div class="anbu-content-area">
			<div class="anbu-tab-pane anbu-watch">
				<table>
					<tr>
						<th>Name</th>
						<th>Values</th>
					</tr>
					<?php foreach($watch as $name => $value) : ?>
					<tr>
						<td class="anbu-watch-first"><?php echo $name; ?></td>
						<td><pre><?php print_r($value); ?></pre></td>
					<?php endforeach; ?>
					</tr>
				</table>
			</div>
			<div class="anbu-tab-pane anbu-log">
				<table>
					<tr>
						<th>Type</th>
						<th>Message</th>
					</tr>
					<?php foreach($log as $l) : ?>
					<tr>
						<td class="anbu-log-first"><?php echo $l[0]; ?></td>
						<td><pre><?php print_r($l[1]); ?></pre></td>
					<?php endforeach; ?>
					</tr>
				</table>
			</div>
			<div class="anbu-tab-pane anbu-sql">
				<table>
					<tr>
						<th>Time</th>
						<th>Query</th>
					</tr>
					<?php foreach($sql as $s) : ?>
					<tr>
						<td class="anbu-log-first"><?php echo $s[1]; ?>s</td>
						<td><pre><?php print_r($s[0]); ?></pre></td>
					<?php endforeach; ?>
					</tr>
				</table>
			</div>								

		</div>
	</div>
	<ul id="anbu-open-tabs" class="anbu-tabs">
		<li><a data-anbu-tab="anbu-log" class="anbu-tab" href="#">Log</a></li>
		<li><a data-anbu-tab="anbu-watch" class="anbu-tab" href="#">Watch</a></li>
		<li><a data-anbu-tab="anbu-sql" class="anbu-tab" href="#">SQL</a></li>

	
		<li class="anbu-tab-right"><a id="anbu-hide" href="#">&#8614;</a></li>
		<li class="anbu-tab-right"><a id="anbu-close" href="#">&times;</a></li>		
		<li class="anbu-tab-right"><a id="anbu-zoom" href="#">&#8645;</a></li>			
	</ul>

	<ul id="anbu-closed-tabs" class="anbu-tabs">
		<li><a id="anbu-show" href="#">&#8612;</a></li>
	</ul>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
	<?php echo File::get(Bundle::path('anbu').'public/js/script.js'); ?>
</script>