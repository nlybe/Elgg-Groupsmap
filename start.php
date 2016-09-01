<?php
/**
 * Elgg Maps of Groups plugin
 * @package groupsmap 
 */

require_once(dirname(__FILE__) . "/lib/hooks.php");

elgg_register_event_handler('init', 'system', 'groupsmap_init');

define('GROUPSMAP_GENERAL_YES', 'yes');	// general purpose string for yes
define('GROUPSMAP_GENERAL_NO', 'no');	// general purpose string for no
 
/**
 * GroupsMap plugin initialization functions.
 */
function groupsmap_init() {  
	
    // register a library of helper functions
    elgg_register_library('elgg:groupsmap', elgg_get_plugins_path() . 'groupsmap/lib/groupsmap.php');	

    // load maps api libraries if it's enabled
    if(elgg_is_active_plugin('amap_maps_api')){
        elgg_load_library('elgg:amap_maps_api');  

        // Site navigation: add if enabled in settings
        if (amap_ma_check_if_map_menu_item('groupsmap'))	{
            $item = new ElggMenuItem('groupsmap', elgg_echo('groupsmap:menu'), 'groupsmap');
            elgg_register_menu_item('site', $item); 
        }
    }
	
    // Add admin menu item
    elgg_register_admin_menu_item('configure', 'groupsmap', 'settings');   	
    
    // Extend CSS
    elgg_extend_view('css/elgg', 'groupsmap/css');
 
    // Add filter-menu on groups
    elgg_register_plugin_hook_handler('register', 'menu:filter', 'add_groups_map_tab');
        
    // Register ajax view for groups geolocation
    elgg_register_ajax_view('groupsmap/geolocategroups');

    // Register a page handler, so we can have nice URLs
    elgg_register_page_handler('groupsmap', 'groupsmap_page_handler');
    
    // Register a handler for create groups
    elgg_register_event_handler('create', 'group', 'groupsmap_geolocation');
    // Register a handler for update groups
    elgg_register_event_handler('update', 'group', 'groupsmap_geolocation');	
    
    // Register widget
    elgg_register_widget_type('groupsmap',elgg_echo("groupsmap:widgets:title"),elgg_echo("groupsmap:widgets:detail"), array('groups'), false);    
	
    // Register actions
    $action_path = elgg_get_plugins_path() . 'groupsmap/actions/groupsmap';
    elgg_register_action('groupsmap/admin/general_options', "$action_path/admin/settings.php", 'admin');	
    elgg_register_action('groupsmap/nearby_search', "$action_path/nearby_search.php", 'public');     

}

/**
 *  Dispatches groupsmap pages.
 *
 * @param array $page
 * @return bool
 */
function groupsmap_page_handler($page) {
	$vars = array();
	$vars['page'] = $page[0];

	$resource_vars = array();
	echo elgg_view_resource('groupsmap/nearby', $resource_vars);
    
	return true;
}

/**
 * Geolocate Group based on location field
 */
function groupsmap_geolocation($event, $object_type, $object) {
	$latitude = get_input("latitude");
	$longitude = get_input("longitude");
	if ($latitude && $longitude)	{
		$object->setLatLong($latitude,$longitude);
	}
	else {
		$location = $object->location;
		$country = $object->country;
		if ($location || $country) {
			$loc_to_geo = ($location?$location:'');
			if ($country) {
				$loc_to_geo = ($loc_to_geo?$loc_to_geo.', '.$country:$country);
			}
			
			$ccc = amap_ma_save_object_coords($loc_to_geo, $object, 'amap_maps_api');
		}		
		else if (!$location && !$country) {
			$object->setLatLong('','');
		}
	}

	return true;
}
