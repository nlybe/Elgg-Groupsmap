<?php
/**
 * Elgg groupsmap plugin
 * @package GroupsMap 
 */

elgg_admin_gatekeeper();

if (elgg_is_active_plugin("amap_maps_api")) {
    elgg_load_library('elgg:amap_maps_api');
    // elgg_load_library('elgg:amap_maps_api_geocoder'); // OBS

    $options = array('type' => 'group', 'full_view' => false, 'limit' => 0);
    $groups = elgg_get_entities($options);

    foreach ($groups as $u) {

        // backward compatibility
        if (!isset($u->location) || !$u->location) {
            if (isset($u->grouplocation) && !empty($u->grouplocation)) {
                $u->location = $u->grouplocation;
                $u->save();
            }
        }

        //if (!isset($u->grouplocation) || !$u->grouplocation) {
        if (!isset($u->location) || !$u->location) {
            echo $u->name . ': not location set';
        } else {
            // function below is required when groups saved location before enable groups map plugin
            if (!$u->getLatitude() || !$u->getLongitude()) {
                sleep(1);
                $vars['value'] = $u->location;
                if (is_array($vars['value'])) {
                    $vars['value'] = implode(', ', $vars['value']);
                    $location = elgg_view('output/tag', $vars);
                    //echo elgg_view('output/tag', $vars);
                } else {
                    $location = $u->location;
                }
                $location = strip_tags($location);

                $ccc = amap_ma_save_object_coords($location, $u, 'amap_maps_api');
                if ($ccc)
                    echo $u->name . ': geolocation DONE<br/>';
                else {
                    echo $u->name . ': geolocation failed, ' . $location . '<br/>';
                }
            } else {
                echo $u->name . ': is OK<br/>';
            }

            // keeps it flowing to the browser
            flush();
            // 50000 microseconds keeps things flowing in safari, IE, firefox, etc
            usleep(50000);
        }
    }

    echo "Geolocation finished for all groups";


    // Create a new table that will hold geometry data for entities
    $prefix = elgg_get_config('dbprefix');
    $tables = get_db_tables();

    if (in_array("{$prefix}entity_geometry", $tables)) {
        set_time_limit(0);

        // Populate geometry table with know information about entities
        $batch = new ElggBatch('elgg_get_entities_from_metadata', array(
            'metadata_name_value_pairs' => array(
                array('name' => 'geo:lat', 'value' => null, 'operand' => 'NOT NULL'),
                array('name' => 'geo:lat', 'value' => '0', 'operand' => '!='),
                array('name' => 'geo:long', 'value' => null, 'operand' => 'NOT NULL'),
                array('name' => 'geo:long', 'value' => '0', 'operand' => '!='),
            ),
            'order_by' => 'e.guid ASC',
            'limit' => 0
        ));

        $i = $k = 0;
        foreach ($batch as $b) {
            if (elgg_instanceof($b)) {
                $lat = $b->getLatitude();
                $long = $b->getLongitude();
                if ($lat && $long) {
                    $query = "INSERT INTO {$prefix}entity_geometry (entity_guid, geometry)
						VALUES ({$b->guid}, GeomFromText('POINT({$lat} {$long})'))
						ON DUPLICATE KEY UPDATE geometry=GeomFromText('POINT({$lat} {$long})')";

                    if (insert_data($query)) {
                        $i++;
                    }
                } else {
                    $k++;
                }
            }
        }

        elgg_add_admin_notice("geo:import", "'{$prefix}entity_geometry' has been populated with information about the location of $i entities; geographic coordinates for $k entities were incorrect");
    }
} else {
    register_error(elgg_echo("groupsmap:settings:amap_maps_api:notenabled"));
    forward(REFERER);
}	
