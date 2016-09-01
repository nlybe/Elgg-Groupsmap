<?php
/**
 * Elgg groupsmap plugin language pack
 * @package GroupsMap 
 */

$language = array(

    //Menu items and titles
    'groupsmap' => "Map of Groups",
    'groupsmap:menu' => "Map of Groups",
    'groupsmap:all' => "Map of Groups",
    'groupsmap:allgroups' => "All Groups",
    'groupsmap:map' => "Map",
    'admin:settings:groupsmap' => "Map of Groups",
    'groups:newest' => "Newest",
    'groups:popular' => "Popular",
    
    //search 
    'groupsmap:search' => "Search groups by location",
    'groupsmap:search:location' => "location",
    'groupsmap:search:radius' => "radius (meters)",
    'groupsmap:search:radius:meters' => "radius (meters)",
    'groupsmap:search:radius:km' => "radius (km)",
    'groupsmap:search:radius:miles' => "radius (miles)",
    'groupsmap:search:meters' => "meters",
    'groupsmap:search:km' => "km",
    'groupsmap:search:miles' => "miles",    
    'groupsmap:search:showradius' => "Show search area",
    'groupsmap:search:submit' => "Search",
    'groupsmap:mylocationsis' => "My location is: ",
    'groupsmap:searchbyname' => "Search groups by name",
    'groupsmap:search:name' => "name",
    'groupsmap:search:searchname' => "Group search for %s and nearby",
    'groupsmap:search:usernotfound' => "Groups not found",
    'groupsmap:search:usersfound' => "Groups found",
    'groupsmap:search:around' => "Groups nearby on groups found",  
    'groupsmap:settings:groupsmap:disabled' => 'The AgoraMap Maps Api plugin is not enabled',
    'groupsmap:groups:newest' => 'Map with %s newest groups',  
    'groupsmap:groups:nearby:search' => 'Groups near "%s"',  
    
    //js alerts
    'groupsmap:map:1' => "Please enter a valid default location on admin section",
    'groupsmap:map:2' => "No valid search address",
    'groupsmap:map:3' => "Geocode was not successful for the following reason",
    
    // settings
    'groupsmap:settings:markericon' => 'Marker Icon', 
    'groupsmap:settings:markericon:blue-light' => 'Blue light', 
    'groupsmap:settings:markericon:blue' => 'Blue', 
    'groupsmap:settings:markericon:green' => 'Green', 
    'groupsmap:settings:markericon:grey' => 'Grey', 
    'groupsmap:settings:markericon:orange' => 'Orange', 
    'groupsmap:settings:markericon:pink' => 'Pink', 
    'groupsmap:settings:markericon:purple-light' => 'Purple light', 
    'groupsmap:settings:markericon:purple' => 'Purple', 
    'groupsmap:settings:markericon:red' => 'Red', 
    'groupsmap:settings:markericon:yellow' => 'Yellow', 
    'groupsmap:settings:markericon:note' => 'Select the color of marker for groups on map', 
    'groupsmap:settings:sidebar_list' => 'Display list of groups on sidebar', 
    'groupsmap:settings:sidebar_list:note' => 'Select if you want to display list of groups in sidebar. The groups will be clickable displaying the info window of group on map.',    
    'groupsmap:settings:groupstab' => 'Add "Map of Groups" tab on Elgg Groups Page', 
    'groupsmap:settings:groupstab:note' => 'Select if you want to add a "Map of Groups" tab on Elgg Groups Page (domain/groups). <strong>Important</strong>: You have to put groupsmap plugin after Groups plugin in Administration/Configure/Plugins',    
    'groupsmap:settings:maponmenu' => 'Add "Map of Groups" item on site menu', 
    'groupsmap:searchnearby' => 'Search nearby groups',
    'groupsmap:settings:maponmenu:note' => 'Select if you want to add a "Map of Groups" item on site menu. ',      
    'groupsmap:settings:no' => 'No', 
    'groupsmap:settings:yes' => 'Yes',
    'groupsmap:settings:batch' => 'Batch Groups Geolocation',
    'groupsmap:settings:batch:start' => 'Start Geolocation',
    'groupsmap:settings:batch:note' => 'If you have already groups on your Elgg site, click on this button for converting groups location to coordinates.<br />You have to do it <strong>just once</strong> before you start using this plugin.',
    'groupsmap:settings:searchbyname' => 'Search groups by name', 
    'groupsmap:settings:searchbyname:note' => 'Select if display "Search groups by name" form (sidebar). ',  
    'groupsmap:settings:groupsmap:notenabled' => 'Kanellga Maps Api is not enabled. Map of groups cannot be displayed',
    'groupsmap:settings:tabs:general_options' => 'General Options', 
    'groupsmap:settings:tabs:groups_geolocation' => 'Groups Geolocation', 
    'groupsmap:settings:save:ok' => 'Settings were successfully saved', 
    'groupsmap:settings:geolocation:results' => 'Geolocation Results',  
    'groupsmap:settings:initial_load:title' => 'Initial map',
    'groupsmap:settings:initial_load:note' => 'Select what to show on initial map',
    'groupsmap:settings:initial_load:all' => 'All groups',
    'groupsmap:settings:initial_load:newest' => 'Newest groups',
    'groupsmap:settings:initial_load:mylocation' => 'User\'s location',
    'groupsmap:settings:initial_load:newest_no' => 'No of newest groups',
    'groupsmap:settings:initial_load:newest_no:note' => 'If <strong>Newest groups</strong> selected, enter the number of newest groups to display.',
    'groupsmap:settings:initial_load:mylocation_radius' => 'Radius',
    'groupsmap:settings:initial_load:mylocation_radius:note' => 'If <strong>User\'s location</strong> selected, enter the default radius for searching around user\'s location.',
    'groupsmap:settings:amap_maps_api:notenabled' => 'The Maps Api plugin is not enable',
 
    // widget
    'groupsmap:widgets:title' => 'Location Map', 
    'groupsmap:widgets:detail' => 'Show group location on map', 
    'groupsmap:widgets:nolocationdefined' => 'Location has not been defined for this group', 
    'groupsmap:widgets:settings:zoom' => 'Select zoom level on map: ',    
    'groupsmap:widgets:settings:mapheight' => 'Enter a numeric value for the height of the map (in pixels): ', 
);

add_translation("en", $language);
