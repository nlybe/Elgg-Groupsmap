<?php
/**
 * Elgg groupsmap plugin
 * @package GroupsMap 
 */

// batch convert geolocation	

elgg_require_js("groupsmap/groupsmap");

$batchlink = "<div>" . elgg_echo('groupsmap:settings:batch:note') ."</div>";	

echo elgg_view_module("inline", elgg_echo('groupsmap:settings:batch'),"<div class='elgg-text'>".$batchlink."</div>");

echo elgg_view('input/submit', array(
	'name' => 'submit',
	'value' => elgg_echo('groupsmap:settings:batch:start'),
	'style' => 'margin-bottom:10px;',
));


