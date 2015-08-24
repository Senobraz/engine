<? if (Utils::getVar('alias')): ?>
	<li><a href="/">Главная</a></li>
<? endif ?>
<? foreach ($pages as $row): ?>
	<? if ($row->visible != 1) continue; ?>
	<li>
		<a href="<?= $row->alias ?>.html"><?= $row->title2 ? $row->title2 : $row->title ?></a>		
	</li>
<? endforeach; ?>
<? if ($args->no_leaf): ?>	
	<li>
		<a href="<?= $page->alias ?>.html"><? mod('pages.show.title') ?></a>		
	</li>
	<? if($args->adds) : ?>
		<?
			$items = $args->adds;
			$lastItem = array_pop($items);
		?>
		<? foreach ($items as $item) : ?>
		<li>
			<a href="<?= $page->alias ?>/<?= $item['alias'] ?>/"><?= $item['title'] ?></a>		
		</li>
		<? endforeach ?>
		<li><?= $lastItem['title'] ?></li>
	<? endif ?>
<? else: ?>
	<li><? mod('pages.show.title') ?></li>
<?endif?>
