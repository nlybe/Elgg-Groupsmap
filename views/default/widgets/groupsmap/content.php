<?php
/**
 * Elgg Maps of Groups plugin
 * @package groupsmap 
 */

if(elgg_is_active_plugin("amap_maps_api")){
	elgg_load_library('elgg:amap_maps_api');  
	
    // Set map width 
    $mapwidth = '98%';
    // Retrieve map height
    $mapheight = (int) $vars['entity']->mapheight;
    if($mapheight == '' || !is_numeric($mapheight)){
        $mapheight = '300';
    }
    // Retrieve map zoom
    $map_zoom = isset($vars['entity']->zoom) ? $vars['entity']->zoom : amap_ma_get_map_zoom();

	$entity = elgg_get_page_owner_entity();

	if ($entity->location && $entity->getLatitude() && $entity->getLongitude())  {
        
        $entity_map = elgg_view('output/location_map', array(
            'entity' => $entity,
            'show_map' => true,
            'map_width' => $mapwidth,
            'map_height' => $mapheight.'px',
            'map_zoom' => $map_zoom,
            'marker' => amap_ma_get_entity_icon($entity),
        ));
        echo elgg_format_element('div', ['class' => 'entity_map'], $entity_map);
	}
	else    {
        echo elgg_format_element('p', [], elgg_echo("groupsmap:widgets:nolocationdefined"));
	}

}
else
{
	register_error(elgg_echo("membersmap:settings:amap_maps_api:notenabled"));
}	

