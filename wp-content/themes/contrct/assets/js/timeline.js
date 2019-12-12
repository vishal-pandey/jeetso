jQuery(document).ready( function($) {
var $fpAnchors    = $('.flooring-path-anchors-wrapper a'),
        $fpBackground = $('.flooring-path-background'),
        $fpListTerm   = $('.flooring-path-list-wrapper dt'),
        $fpListDef    = $('.flooring-path-list-wrapper dd'),
        $fpBanner     = $('.flooring-path-banner'),
        imagesPath    = ($fpBanner.length ? $fpBanner[0].src.substring(0, $fpBanner[0].src.lastIndexOf("/")) : ''),
         bannerImages  = [
            imagesPath + '/time11.jpg',
            imagesPath + '/time22.jpg',
            imagesPath + '/time33.jpg',
            imagesPath + '/time44.jpg',
            imagesPath + '/time55.jpg',
            imagesPath + '/time66.jpg',
            imagesPath + '/time77.jpg',
                imagesPath + '/11.jpg',
				imagesPath + '/22.jpg',
				imagesPath + '/33.jpg',
				imagesPath + '/44.jpg',
				imagesPath + '/55.jpg',
				imagesPath + '/66.jpg',
				imagesPath + '/77.jpg'
	
			
        ],
        images        = [
            imagesPath + '/time1.png',
            imagesPath + '/time2.png',
            imagesPath + '/time3.png',
            imagesPath + '/time4.png',
            imagesPath + '/time5.png',
            imagesPath + '/time6.png',
            imagesPath + '/time7.png',
                imagesPath + '/int_1.png',
				imagesPath + '/int_2.png',
				imagesPath + '/int_3.png',
				imagesPath + '/int_4.png',
				imagesPath + '/int_5.png',
				imagesPath + '/int_6.png',
                imagesPath + '/int_7.png'
	
       ];

    $.preload(bannerImages);
    $.preload(images);

    $fpAnchors.on('click mouseenter', function(e) {
        var index = $(this).data('index');
        $fpBackground.prop('src', images[index]);
        $fpBanner.prop('src', bannerImages[index]);
});
	
	
	$fpListTerm.on('click', function(e) {
        var index = $(this).data('index');
        $fpBanner.prop('src', bannerImages[index]);
        $fpListDef.slideUp();
        $(this).next().slideDown();
    });
	
	});
	
	jQuery.preload = function() {
    this.each(function(){
        jQuery('<img />').prop('src', this);
    });
}