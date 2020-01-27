(function($) {
    
	$(document).on( 'click', '#posts-filter li a', function( event ) {
        var button = $(this);
        var categoryValue = button.attr("value");
        event.preventDefault();
        $.ajax({
            url: ajaxSetting.ajaxurl,
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
    
    $(document).on( 'click', '#ajax-search button', function( event ) {
        var searchValue = $('#ajax-search input').val();
        event.preventDefault();
        $.ajax({
            url: ajaxSetting.ajaxurl,
            type: 'POST',
            dataType: "html",
            data: {
                action: 'ajax_search',
                search: searchValue
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