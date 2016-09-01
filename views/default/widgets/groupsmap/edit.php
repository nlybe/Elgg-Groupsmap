<?php
/**
 * Elgg Maps of Groups plugin
 * @package groupsmap 
 */

$zoom = $vars['entity']->zoom;
if($zoom == '' || !is_numeric($zoom)){
    $zoom = amap_ma_get_map_zoom();
} 

$zoom_box = elgg_echo("groupsmap:widgets:settings:zoom");
$zoom_box .= elgg_view('input/dropdown', array(
    'name' => 'params[zoom]',
    'value' => $zoom,
    'options' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20)
));
echo elgg_format_element('div', ['class' => 'clear_box'], $zoom_box);


$mapheight = $vars['entity']->mapheight;
if($mapheight == '' || !is_numeric($mapheight)){
    $mapheight = '300';
} 

$height_box = elgg_echo("groupsmap:widgets:settings:mapheight");
$height_box .= elgg_view('input/text', array('name' => 'params[mapheight]', 'value' => $mapheight, 'style' => 'width: 100px;' ));
echo elgg_format_element('div', ['class' => 'clear_box'], $height_box);
