
<? foreach ($items as $item) : ?>	
	<? if (!$item['visible']) continue; ?>
	<? if ($item['active']) { ?>
		<li>
			<a  class="active" href="<?= $item['href'] ?>"><?= $item['title'] ?></a>			
		</li>
	<? } else { ?>
		<li>
			<a href="<?= $item['href'] ?>"><?= $item['title'] ?></a>			
		</li>
	<? } ?>
<? endforeach; ?>


