(function($) {



    var filterButtons = $('#ajax-filter button');
    var results = $( '#posts-filter_results' );
    
	$(document).on( 'click', '#ajax-filter button', function( event ) {
        var button = $(this);
        var categoryValue = button.attr("value");
        filterButtons.removeClass('active');
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
                results.text('Carregando...'); 
			},
            success: function( response ) {
                button.addClass('active');
                results.html( response );
                setTimeout(function(){
                    $('.posts').scrollintoview({
                        duration: 1000,
                        direction: "vertical"
                    });
                },500);
            }
        });
    })
    
    $(document).on( 'click', '#ajax-search button', function( event ) {
        var searchValue = $('#ajax-search input').val();
        event.preventDefault();
        filterButtons.removeClass('active');
        $.ajax({
            url: ajaxSetting.ajaxurl,
            type: 'POST',
            dataType: "html",
            data: {
                action: 'ajax_search',
                search: searchValue
            },
            beforeSend : function () {
                results.text('Carregando...'); 
			},
            success: function( response ) {
                 results.html( response ); 
            }
        })  
    })
    
})(jQuery);