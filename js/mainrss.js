var $jqueryRSS = jQuery.noConflict();
$jqueryRSS(document).ready(function(){
   $jqueryRSS('.pearl_container').each(function(i) {   
    $jqueryRSS(this).siblings('.rss_pagination').paginate({ 
            itemsToPaginate : $jqueryRSS(this).find("div.pearl_rss_section"),
            'items_per_page' : rssPearlpluginOptions.feed_per_page
        }) ;
        });
});
	