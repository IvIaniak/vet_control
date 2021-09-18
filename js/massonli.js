$.fn.massonli = function(options) {

    var settings = $.extend({
         'maxcolons': 5 ,
            'speed': 0.2,
        'animation': 'ease-out'
    }, options);

	var    $selector = this,
		    pointimg = $selector.find('.masonlipoint').length,
             withmas =  Math.floor($('.mediafoto').width()),
		    columnis = settings.maxcolons,
            minwith = 1200/(columnis)*0.85,
			 padding = 10,
             maxhith = 0,
            pointwith =(withmas-((columnis)*padding))/columnis,
			  maasiv = new Array(columnis);

              $('.masonlipoint').css('transition','all '+settings.speed+'s '+settings.animation+'');

            pointwith = Math.floor((withmas-((columnis)*padding))/columnis);
            pointwith=pointwith-padding/columnis;
            if (columnis > settings.maxcolons){
                columnis = settings.maxcolons;
            }
            if (pointwith < minwith){
                columnis= Math.floor(withmas/(minwith+padding));
                if (columnis > settings.maxcolons){
                    columnis = settings.maxcolons;
                }
                pointwith = (withmas-((columnis)*padding))/columnis;
                pointwith=pointwith-padding/columnis;
            }

    $('.masonlipoint').css('width',pointwith+'px');

        		for (var i=0; i<columnis; i++) {
        			maasiv[i]=0;
        		}
			$selector.find('.masonlipoint').each(function() {

                var
					mincolumn = maasiv[0],
				 columnnumber = 0;

                 for (var i=0; i<=columnis; i++) {
                     if (maasiv[i]<mincolumn) {
                         columnnumber = i;
                     }
                     mincolumn = maasiv[columnnumber];
                 }

                 if (columnnumber == 0) {
                     $(this).css('left',padding);
                     $(this).css('top',maasiv[columnnumber]+padding);
                 } else {
                     $(this).css('left',(columnnumber)*(pointwith+padding)+padding);
                     $(this).css('top',maasiv[columnnumber]+padding);
                 }


                      maasiv[columnnumber] = maasiv[columnnumber] + $(this).height()+padding;
                        maxhith=maasiv[columnnumber];

		    });
            maxhith=maxhith+padding;
$('.mediafoto').css('height', maxhith+'px');
}
