<?php
/**
 * Elgg Maps of Groups plugin
 * @package groupsmap
 *
 * All hooks are here
 */

/**
 * Add a new tab for maps on Groups list views
 * 
 * @param type $hook
 * @param type $type
 * @param type $menu
 * @param type $params
 * @return type
 */
function add_groups_map_tab($hook, $type, $menu, $params) {
    if(elgg_is_active_plugin('amap_maps_api') && amap_ma_check_if_add_tab_on_entity_page('groupsmap')) {
        if(elgg_in_context('groups')) {
            $filter_context = $params['filter_context'];
            $options = array(
                'name' => 'groupsmap',
                'text' => elgg_echo("groupsmap:menu"),
                'href' => "groupsmap",
                'priority' => '600',
            );	
            if ($filter_context == 'groupsmap') {
                $options['selected'] = true;
            }
            $menu[] = ElggMenuItem::factory($options);		
        }
        return $menu;
    }
}

