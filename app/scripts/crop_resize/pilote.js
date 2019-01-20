
	$(document).ready( function(){
		var getUrl = window.location;
		var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

		$('#contain').resizeImage({
			image: baseUrl + '/app/wp-content/uploads/2013/06/horizontal.jpg',
			// imgFormat: 'auto', // Formats: 3/2, 200x360, auto
			// circleCrop: true,
			// zoomable: true,
			// outBoundColor: 'white', // black, white
			btnDoneAttr: '.resize-done'

		}, function( imgResized ){
			$('#move-stats').html( '<img style="margin:10% auto;" src="'+ imgResized +'">' )
		} )
	} )