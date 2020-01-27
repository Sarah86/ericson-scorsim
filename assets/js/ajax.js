(function($) {
	$(document).on( 'click', '#posts-filter li a', function( event ) {
        event.preventDefault();

        var button = $(this);

        var categoryValue = button.attr("value");
        
		$.ajax({
            url: ajaxfilter.ajaxurl,
            type: 'POST',
            dataType: "html",
            data: {
                action: 'ajax_filter',
                category: categoryValue,
            },
            beforeSend : function () {
                $( '#posts-filter_results' ).text('Loading...'); 
			},
            success: function( response ) {
                 $( '#posts-filter_results' ).html( response ); 
            }
        })
	})
})(jQuery);