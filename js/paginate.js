(function($){
    $.fn.paginate = function(options) {
       
        var paginationContainer = this;
        var itemsToPaginate;
        
        var defaults = {
         'items_per_page' : 3
        }
      
        var settings = {};
        $.extend( settings, defaults, options );
        itemsToPaginate = $(settings.itemsToPaginate);
        pageCount = Math.ceil( itemsToPaginate.length / settings.items_per_page );
        $('<ul></ul>').prependTo(paginationContainer);
        
        for(index = 1 ; index <= pageCount; index++)
        {
             paginationContainer.find('ul').append('<li>'+index+'</li>');
        }
        
        itemsToPaginate.filter(':gt('+(settings.items_per_page-1)+')').hide();
        
        paginationContainer.find('ul li').on( "click", function(){
            var selectedText = $(this).text();
            var itemsToHide = itemsToPaginate.filter(':lt('+ ( selectedText - 1 ) *settings.items_per_page + ')').hide();
            $.merge(itemsToHide,itemsToPaginate.filter(':gt('+( ( selectedText * settings.items_per_page ) -1 )+')').hide());
            itemsToHide.hide();

            var itemsToShow = itemsToPaginate.not(itemsToHide);
            itemsToShow.show();

        });
    }
}(jQuery));

