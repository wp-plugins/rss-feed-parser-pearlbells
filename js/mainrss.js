var $jqueryRSS = jQuery.noConflict();
$jqueryRSS(document).ready(function(){
    styleRssParser();
    $jqueryRSS('.rss_pagination').paginate({ 
            itemsToPaginate : $jqueryRSS(".pearl_rss_section"),
            'items_per_page' : rssPearlpluginOptions.feed_per_page
        }) ;
});

function styleRssParser()
{

    $jqueryRSS('.pearl_rss').css({
            "background-color" : rssPearlpluginOptions.backgroundColor,
            "width"            : rssPearlpluginOptions.pearl_rss_width,
            "padding"          : rssPearlpluginOptions.pearl_padding,
            "margin"           : rssPearlpluginOptions.pearl_margin,
            "border-width"     : rssPearlpluginOptions.border_width,
            "border-style"     : "solid",
            "border-color"     : rssPearlpluginOptions.border_color});

   $jqueryRSS('.pearl_rss_title').css({
            "color"            : rssPearlpluginOptions.heading_font_color,		  
            "font-size"        : rssPearlpluginOptions.heading_font_size
   });

   $jqueryRSS('.pearl_rss_read_more ').css({
            "color":rssPearlpluginOptions.read_more_color,		  
            "font-size":rssPearlpluginOptions.read_font_size
   });

   $jqueryRSS('.pearl_rss_section_title').css({
            "color":rssPearlpluginOptions.title_font_color,		 
            "font-size":rssPearlpluginOptions.title_font_size
   });

    $jqueryRSS('.rss_pagination').css({
            "color":rssPearlpluginOptions.pagination_color,		 
            "font-size":rssPearlpluginOptions.pagination_font_size
   });

    $jqueryRSS('.pearl_rss_section p').css({
            "padding":rssPearlpluginOptions.descr_padding,
            "color":rssPearlpluginOptions.descr_font_color,		 
            "font-size":rssPearlpluginOptions.descr_font_size
   });	

}
	