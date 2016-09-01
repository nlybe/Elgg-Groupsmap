<?php
/**
 * Elgg Map of Groups plugin
 * @package groupsmap 
 */

// retrieve location of entity
function groupsmap_get_group_location_str($entity) {
    $loc_to_geo = '';
    $location = $entity->location;
    $country = $entity->country;
    if ($location || $country) {
        $loc_to_geo = ($location?$location:'');
        if ($country) {
            $loc_to_geo = ($loc_to_geo?$loc_to_geo.', '.$country:$country);
        }
    }	

    return $loc_to_geo;
}
