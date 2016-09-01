<?php
/**
 * Elgg groupsmap plugin
 * @package GroupsMap 
 */

$tab = get_input('tab', 'general_options');

echo elgg_view('navigation/tabs', array(
    'tabs' => array(
        array(
            'text' => elgg_echo('groupsmap:settings:tabs:general_options'),
            'href' => '/admin/settings/groupsmap',
            'selected' => ($tab == 'general_options'),
        ),
        array(
            'text' => elgg_echo('groupsmap:settings:tabs:groups_geolocation'),
            'href' => '/admin/settings/groupsmap?tab=groups_geolocation',
            'selected' => ($tab == 'groups_geolocation'),
        ),
    )
));

switch ($tab) {
    case 'groups_geolocation':
        echo elgg_view('admin/settings/groupsmap/groups_geolocation');
        break;

    default:
    case 'general_options':
        echo elgg_view('admin/settings/groupsmap/general_options');
        break;
}
