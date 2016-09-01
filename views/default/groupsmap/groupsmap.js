define(function (require) {
	var elgg = require('elgg');
	var $ = require('jquery');
	
	$('.elgg-form-groupsmap-admin-groups-geolocation').submit(function(){
		$('#groups_geolocation-loader').removeClass('hidden');
		$('#groups_geolocation-result').html('');
		elgg.get('ajax/view/groupsmap/geolocategroups', {
			data: $(this).serialize(),
			success: function(data){
				$('#groups_geolocation-result').html(data);
			},
			error: function(jqXHR, textStatus, errorThrown){
				elgg.register_error(elgg.echo('code_review:error:request'));
			},
			complete: function(){
				$('#groups_geolocation-loader').addClass('hidden');
			}
		});

		return false;
	});
});

