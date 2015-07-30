<?php

    if(!$searchresult)
    {
        echo '<div class="searchresultcount">По вашему запросу ничего не найдено.</div>';
        return;
    }

    echo '<div class="searchresultcount">Всего найдено: '.$resultCount.'</div>';

    $formattedresults = '';
    foreach($results as $result)
    {
        if($result->GsearchResultClass == 'GwebSearch')
        {
            $formattedresults .= '
            <div class="searchresult">
            <h3><a href="' . $result->unescapedUrl . '">' . $result->titleNoFormatting . '</a></h3>
            <p class="resultdesc">' . $result->content . '</p>
            <!--p class="resulturl">' . $result->visibleUrl . '</p-->
            </div>';
        }
    }



    echo $formattedresults;

    $cursor = '';

    echo '<div class="searchpager">';

    foreach($pages as $page)
    {
        if($page->label == $currentPageIndex+1)
        {
            $cursor .= ' <span class="current">'.$page->label.'</span>';
        }
        else
        {
            $cursor .= ' <span><a href="'.$alias.'.html?start='.$page->start.'&q='.urlencode($searchquery).'">'.$page->label.'</a></span>';
        }

    }

    echo $cursor;

    echo '</div>';

?>

<div class="search-body-big" >
    <form action="/search.html" method="get">
        <input type="search" name="q" placeholder="Введите запрос">
        <button type="submit" class="sr-but"></button>
    </form>
</div>
<? if(!$searchresult) : ?>
<div class="no-result">К сожалению, по вашему запросу ничего не найдено.</div>
<? else: ?>
<ol>
    <? foreach($results as $result) : ?>
    <li>
        <a href="<?= $result->unescapedUrl ?>" class="sr-title"><?= $result->titleNoFormatting ?></a>
        <div class="sr-desc"><?= $result->content ?></div>
    </li>
    <? endforeach ?>   
</ol>

<? endif ?>