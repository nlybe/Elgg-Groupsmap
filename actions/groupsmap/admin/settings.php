<?php
/**
 * Elgg groupsmap plugin
 * @package GroupsMap 
 */

$plugin = elgg_get_plugin_from_id('groupsmap');

$params = get_input('params');
foreach ($params as $k => $v) {
	if (!$plugin->setSetting($k, $v)) {
		register_error(elgg_echo('plugins:settings:save:fail', array('groupsmap')));
		forward(REFERER);
	}
}


system_message(elgg_echo('groupsmap:settings:save:ok'));
forward(REFERER);
