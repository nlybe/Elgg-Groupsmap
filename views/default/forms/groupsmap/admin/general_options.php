<?php
/**
 * Elgg groupsmap plugin
 * @package GroupsMap 
 */

$plugin = elgg_get_plugin_from_id('groupsmap');

$potential_groups_yesno = array(
    GROUPSMAP_GENERAL_NO => elgg_echo('groupsmap:settings:no'),
    GROUPSMAP_GENERAL_YES => elgg_echo('groupsmap:settings:yes'),
); 

// initial choice for loading map
$initial_load = $plugin->initial_load;
if (!$initial_load)
	$initial_load = 'all';
	
$options = array();
$options[elgg_echo('groupsmap:settings:initial_load:all')] = 'all';
$options[elgg_echo('groupsmap:settings:initial_load:newest')] = 'newest';
$options[elgg_echo('groupsmap:settings:initial_load:mylocation')] = 'location';
	
$initial = '<div class="amap_settings_box">';
$initial .= '<div class="elgg-subtext">'.elgg_echo('groupsmap:settings:initial_load:note').'</div>';
$initial .= elgg_view('input/radio', array('name' => 'params[initial_load]', 'value' => $initial_load, 'options' => $options));
$initial .= '</div>';

// no of newest groups
$initial .= '<div class="amap_settings_box">';
$initial .= "<div class='txt_label'>" . elgg_echo('groupsmap:settings:initial_load:newest_no') . ": </div>";
$initial .= elgg_view('input/text', array('name' => 'params[newest_no]', 'value' => (is_numeric($plugin->newest_no)?$plugin->newest_no:AMAP_MA_NEWEST_NO_DEFAULT), 'class' => 'txt_small'));
$initial .= "<span class='elgg-subtext'>".elgg_echo('groupsmap:settings:initial_load:newest_no:note')."</span>";
$initial .= '</div>';

// default radius
$initial .= '<div class="amap_settings_box">';
$initial .= "<div class='txt_label'>" . elgg_echo('groupsmap:settings:initial_load:mylocation_radius') . ": </div>";
$initial .= elgg_view('input/text', array('name' => 'params[mylocation_radius]', 'value' => (is_numeric($plugin->mylocation_radius)?$plugin->mylocation_radius:AMAP_MA_RADIUS_DEFAULT), 'class' => 'txt_small'));
$initial .= "<span class='elgg-subtext'>".elgg_echo('groupsmap:settings:initial_load:mylocation_radius:note')."</span>";
$initial .= '</div>';
echo elgg_view_module("inline", elgg_echo('groupsmap:settings:initial_load:title'), $initial);

// show list on sidebar
$sidebar_list = $plugin->sidebar_list;
if(empty($sidebar_list)){
	$sidebar_list = GROUPSMAP_GENERAL_YES;
}    
$sidebar_list_view = '<div class="amap_settings_box">';
$sidebar_list_view .= elgg_view('input/dropdown', array('name' => 'params[sidebar_list]', 'value' => $sidebar_list, 'options_values' => $potential_groups_yesno));
$sidebar_list_view .= "<span class='elgg-subtext'>" . elgg_echo('groupsmap:settings:sidebar_list:note') . "</span>";
$sidebar_list_view .= '</div>';
echo elgg_view_module("inline", elgg_echo('groupsmap:settings:sidebar_list'), $sidebar_list_view);

// add tab on elgg groups page
$customtab = $plugin->customtab;
if(empty($customtab)){
	$customtab = GROUPSMAP_GENERAL_YES;
}    
$groupstabfield = '<div class="amap_settings_box">';
$groupstabfield .= elgg_view('input/dropdown', array('name' => 'params[customtab]', 'value' => $customtab, 'options_values' => $potential_groups_yesno));
$groupstabfield .= "<span class='elgg-subtext'>" . elgg_echo('groupsmap:settings:groupstab:note') . "</span>";
$groupstabfield .= '</div>';
echo elgg_view_module("inline", elgg_echo('groupsmap:settings:groupstab'), $groupstabfield);

// add tab on elgg groups page
$maponmenu = $plugin->maponmenu;
if(empty($maponmenu)){
	$maponmenu = GROUPSMAP_GENERAL_YES;
}    
$groupmaponmenufield = '<div class="amap_settings_box">';
$groupmaponmenufield .= elgg_view('input/dropdown', array('name' => 'params[maponmenu]', 'value' => $maponmenu, 'options_values' => $potential_groups_yesno));
$groupmaponmenufield .= "<span class='elgg-subtext'>" . elgg_echo('groupsmap:settings:maponmenu:note') . "</span>";
$groupmaponmenufield .= '</div>';
echo elgg_view_module("inline", elgg_echo('groupsmap:settings:maponmenu'), $groupmaponmenufield);

/* temporarily commented (???)
// set if show 'search by name' form
$searchbyname = $plugin->searchbyname;
if(empty($searchbyname)){
        $searchbyname = GROUPSMAP_GENERAL_YES;
}    
$searchbynamefield = elgg_view('input/dropdown', array('name' => 'params[searchbyname]', 'value' => $searchbyname, 'options_values' => $potential_groups_yesno));
$searchbynamefield .= "<div class='elgg-subtext'>" . elgg_echo('groupsmap:settings:searchbyname:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('groupsmap:settings:searchbyname'), $searchbynamefield);
*/

// set marker
$markericon = $plugin->markericon;
if(empty($markericon)){
        $markericon = 'group';
}    
$potential_icon = array(
    "group-blue-light" => elgg_echo('groupsmap:settings:markericon:blue-light'),
    "group-blue" => elgg_echo('groupsmap:settings:markericon:blue'),
    "group-green" => elgg_echo('groupsmap:settings:markericon:green'),
    "group-grey" => elgg_echo('groupsmap:settings:markericon:grey'),
    "group-orange" => elgg_echo('groupsmap:settings:markericon:orange'),
    "group-pink" => elgg_echo('groupsmap:settings:markericon:pink'),
    "group-purple-light" => elgg_echo('groupsmap:settings:markericon:purple-light'),
    "group-purple" => elgg_echo('groupsmap:settings:markericon:purple'),
    "group-red" => elgg_echo('groupsmap:settings:markericon:red'),
    "group-yellow" => elgg_echo('groupsmap:settings:markericon:yellow'),
); 

$map_icon = '<div class="amap_settings_box">';
$map_icon .= elgg_view('input/dropdown', array('name' => 'params[markericon]', 'value' => $markericon, 'options_values' => $potential_icon));
$map_icon .= "<span class='elgg-subtext'>" . elgg_echo('groupsmap:settings:markericon:note') . "</span>";
$map_icon .= '</div>';
echo elgg_view_module("inline", elgg_echo('groupsmap:settings:markericon'), $map_icon);

echo elgg_view('input/submit', array('value' => elgg_echo("save")));
