<?

$pager = $args->pager;

if(!$pager)
 return false;

?>
<div class="pagination">	
	<ul class="pager">
		<? if( $pager['pre']['href'] ) : ?>
		<li class="back-page"><a href="<?= $pager['pre']['href']?>"></a></li>
		<? endif ?>
		<? foreach($pager['items'] as $item) : ?>
			<? if($item['active']) : ?>
			<li><span><?=$item['page']?></span></li>
			<? else : ?>
			<li><a href="<?=$item['href']?>"><?=$item['page']?></a></li>
			<? endif ?>	
		<?	endforeach; ?>	
		<? if( $pager['next']['href'] ) : ?>
		<li class="up-page"><a href="<?= $pager['next']['href']?>"></a></li>
		<? endif ?>
	</ul>
</div>