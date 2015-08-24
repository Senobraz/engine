<?php
$activeAlias = $params[0] ? $params[0] : $alias;

$section = (array) $data->getSection($activeAlias);
if (!$section) {
	echo '<p  class="not-found" style="text-align: center">' . 'не найден раздел' . '</p>';
	return;
}

$sectionData = $data->getSectionData($section['alias']);
$sectionsData = $data->getSectionsData('section_services', $section['id']);

App::SetProperty('page_title', $section['title']);
App::SetProperty('title', $section['title']);

if ($activeAlias != $alias) {
	$chainSection = $data->getChainSection($section['id']);

	App::SetProperty('breadcrumbs', val('pages.show.breadcrumbs', [
		'no_leaf' => 1,
		'adds' => $chainSection
	]));
}

if ($sectionData['seo_title'])
	App::SetProperty('title', $sectionData['seo_title']);
if ($sectionData['seo_description'])
	App::SetProperty('description', $sectionData['seo_description']);
if ($sectionData['seo_keywords'])
	App::SetProperty('keywords', $sectionData['seo_keywords']);
?>

<? if (count($sectionsData) > 0) : ?>	
	<? foreach ($sectionsData as $section) : ?>
	
	<? endforeach; ?>
<? else: ?>
	<? mod("catalog.show.$sectionData[alias]",[
			'view' => '',
			'mode' => 'list',			
			'order' => '',			
		])?>
<? endif ?>

