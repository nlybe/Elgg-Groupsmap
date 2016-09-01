<?php
/**
 * Elgg Maps of Groups plugin
 * @package groupsmap 
 */

$entity = elgg_extract('entity', $vars);

$box_color = elgg_extract('box_color', $vars);

// If image support get the icon.
$icon = elgg_view_entity_icon($entity, 'tiny', array('img_class' => 'elgg-photo'));

$output = '<div class="map_entity_block '.$box_color.'">';
$output .= $icon;
$output .= '<a id="'.$entity->getGUID().'" class="entity_m">'.$entity->name.'</a>';
$output .= '<br />'.$entity->location;
if ($entity->getVolatileData('distance_from_user')) {
	$output .= '<br />'.$entity->getVolatileData('distance_from_user');
}
$output .= '</div>';

echo $output;
