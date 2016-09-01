<?php
/**
 * Elgg Maps of Groups plugin
 * @package groupsmap 
 */

if(!elgg_is_active_plugin("amap_maps_api")){
	register_error(elgg_echo("groupsmap:settings:amap_maps_api:notenabled"));
	forward(REFERER);
}

elgg_load_library('elgg:groupsmap');  
elgg_load_library('elgg:amap_maps_api');
// elgg_load_library('elgg:amap_maps_api_geocoder'); // OBS
elgg_load_library('elgg:amap_maps_api_geo'); 

$user = elgg_get_logged_in_user_entity();

if (amap_ma_not_permit_public_access())	{
	gatekeeper();
}

// Retrieve map width 
$mapwidth = amap_ma_get_map_width();
// Retrieve map height
$mapheight = amap_ma_get_map_height();

// Retrieve map default location
//$defaultlocation = amap_ma_get_map_default_location(); //OBS

if (amap_ma_check_if_add_tab_on_entity_page('groupsmap'))	{
	elgg_push_breadcrumb(elgg_echo('groups'), "groups");
}

// set breadcrumb
elgg_push_breadcrumb(elgg_echo('groupsmap'));

// set default parameters
$limit = get_input('limit', 0);
$title = elgg_echo('groupsmap:all');
$options = array('type' => 'group', 'full_view' => false);

// get variables
$s_location = $_GET["l"];
$s_radius = (int) $_GET["r"];
$s_keyword = $_GET["q"];
$showradius = $_GET["sr"];
// get initial load option from settings
$initial_load = elgg_get_plugin_setting('initial_load', 'groupsmap');

if ($s_location || $s_keyword) {
    $search_radius_txt = '';
    $s_radius = ($s_radius?$s_radius:AMAP_MA_DEFAULT_RADIUS);
	$search_radius_txt = $s_radius;
	
	// retrieve coords of location asked, if any
	$coords = amap_ma_geocode_location($s_location);
    
    if ($coords) {
		$s_radius = amap_ma_get_default_radius_search($s_radius);
		$search_location_txt = $s_location;
        $s_lat = $coords['lat'];
        $s_long = $coords['long'];
        
		$title = elgg_echo('groupsmap:groups:nearby:search', array($search_location_txt));
    }
    
    // if special params asked, then forget the initial load option from settings
    $initial_load = '';
}

// load the search form
$body_vars = array();
$body_vars['s_action'] = 'groupsmap/nearby_search';
$body_vars['initial_location'] = $search_location_txt;
$body_vars['initial_radius'] = $search_radius_txt;
$body_vars['initial_keyword'] = $s_keyword;
$body_vars['initial_load'] =  $initial_load;
if ($user->location) {
	$body_vars['my_location'] = $user->location;
	if (isset($initial_load) && $initial_load == 'location') {
		$body_vars['initial_location'] = $user->location;
	}
}
$form_vars = array('enctype' => 'multipart/form-data');

$content =  elgg_view_form('amap_maps_api/nearby', $form_vars, $body_vars); 
$content .= elgg_view('amap_maps_api/map_box', array(
    'mapwidth' => $mapwidth,
    'mapheight' => $mapheight,
));

$sidebar = '';
$layout = 'one_column';
if (amap_ma_check_if_add_sidebar_list('groupsmap')) {
	$layout = 'content';
	$sidebar = elgg_view('amap_maps_api/sidebar_elist', array(
		'mapheight' => $mapheight,
		'list_view' => 'groupsmap/sidebar'
	));
}

$params = array(
	'content' => $content,
	'sidebar' => $sidebar,
	'title' => $title,
	'filter_override' => '',
);

$body = elgg_view_layout($layout, $params);

echo elgg_view_page($title, $body);
