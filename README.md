##GroupsMap Plugin for Elgg##

Elgg map plugin for showing groups in Google Maps. GroupsMap requires Profile Manager plugin, based on "location" field and offers multiple search options.

This plugin requires the Maps API plugin (https://github.com/nlybe/Elgg-MapsAPI)

Demo: http://nikos.lyberakis.gr/elgg/groupsmap

== Contents ==

1. Features
2. Installation


###1. Features###

- Option to display groups around current logged-in user's location
- Option to show initially all groups, newest groups or groups around current loggedin user's location
- Optionally, a list of groups, which are displayed on map, is loaded on sidebar
- Search groups on map using location, radius and keyword
- Profile Manager plugin is required (with field named 'location' or groupslocation for Elgg 1.8)
- Based on Google Geocoding API
- Elgg caching of groups location
- Use of MarkerClusterer for improving map view when a large number of groups are there on map
- When multiple markers are located at the same or nearby location, they are splitted so they are clickable
- Option to show search area
- Option to select marker in settings
- Visit group's profile from map
- Option to add "Map of Groups" tab at Elgg Groups page (domain/groups)
- Option to show/hide "Map of Groups" item on site menu
- Tool for batch geolocation of groups already exists on Elgg site
- Multiple configuration options about google maps


###2. Installation###

Requires: Elgg 2.1 or higher

1. Upload amap_maps_api plugin in "/mod/" elgg folder and activate it
2. In "Administration/Configure/Settings/AgoraMap Maps API" you must enter API keys and basic map options
3. In Profile Manager plugin settings, at 'Edit Group Fields' tab create a text field named 'location'. 
4. Upload groupsmap in "/mod/" elgg folder and activate it
5. Optionally in Administration/Configure/Settings/Map of Groups, run once 'Batch Groups Geolocation' for geolocate current groups.
6. In Administration/Configure/Settings/Map of Groups you can configure several plugin options
7. If you are using old version of groupsmap plugin (prior to 1.8.5 or 1.9.5), change the name of the field "grouplocation" to "location" and then repeat step 5.





