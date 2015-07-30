<div class="search-body-big" >
    <form action="/<?= $alias ?>.html" method="get">
        <input type="search" name="q" placeholder="Введите запрос" value="<?= $searchquery ?>">
        <button type="submit" class="sr-but"></button>
    </form>
</div>
<? if( count($results) > 0 ) : ?>
<ol>
    <? foreach($results as $result) : ?>
    <li>
        <a href="<?= $result->unescapedUrl ?>" class="sr-title"><?= $result->titleNoFormatting ?></a>
        <div class="sr-desc"><?= $result->content ?></div>
    </li>
    <? endforeach ?>   
</ol>
<div class="pagination">	
	<ul class="pager">
    <? foreach($pages as $page) : ?>
        <? if($page->label == $currentPageIndex+1) : ?>
			<li><a  class="active" href="<?= $alias ?>.html?start=<?= $page->start ?>&q=<?= urlencode($searchquery) ?>"><?= $page->label ?></a></li>
        <? else : ?>
			<li><a href="<?= $alias ?>.html?start=<?= $page->start ?>&q=<?= urlencode($searchquery) ?>"><?= $page->label ?></a></li>
        <? endif ?>	
    <? endforeach; ?>
    </ul>
</div>
<? else: ?>
<div class="no-result">К сожалению, по вашему запросу ничего не найдено.</div>
<? endif ?>