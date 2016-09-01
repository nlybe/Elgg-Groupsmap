<?php
/**
 * Elgg groupsmap plugin
 * @package GroupsMap 
 */

//analysis form
echo elgg_view_form('groupsmap/admin/groups_geolocation', array(
    'action' => '#',
    'disable_security' => true,
));

//analysis result
$body = '';
$body .= elgg_view('graphics/ajax_loader', array(
	'id' => 'groups_geolocation-loader'
));
$body .= '<div id="groups_geolocation-result">';

if ($version) {
	$body .= elgg_view('groupsmap/geolocategroups', array(
		'version' => $version,
	));
} else {
	//$body .= elgg_echo('groupsmap:settings:batch:note');
}

$body .= '</div>';

echo elgg_view_module('main', elgg_echo('groupsmap:settings:geolocation:results'), $body, array(
	'class' => 'mbl',
));
