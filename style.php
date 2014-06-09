<?php

class rssStyleData {
    
        public function __construct() {
            
            add_action( 'wp_enqueue_scripts', array($this,'safely_add_stylesheet') );
            add_action('wp_head', array($this,'pearl_script'));
            
        }
    
        public function safely_add_stylesheet() {
           //  wp_enqueue_style( 'csv-to-webpage', plugins_url('css/pearl_csv_to_webpage_css.css', __FILE__) );
             wp_enqueue_style( 'pearl_rss_feed_parser', plugins_url('css/pearl_rss_feed_parser_css.css', __FILE__) );
         }
         
	public function pearl_script()
	{
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js');
		wp_enqueue_script( 'jquery' );?>
		<script type="text/javascript">
		var $jquery = jQuery.noConflict(); 
		$jquery(document).ready(function(){
		
		styleRssParser();	
		
		
		});
		function styleRssParser()
 		{
		  var backgroundColor ='<?php echo get_option('pearl_rss_parser_bg_color');?>';
		  var border_color ='<?php echo get_option('pearl_rss_parser_border_color');?>';	  
		  var pearl_rss_width ='<?php echo get_option('pearl_rss_parser_width');?>';	 
		  var border_width ='<?php echo get_option('pearl_rss_parser_border_width');?>';
		  var pearl_padding ='<?php echo get_option('pearl_rss_parser_padding');?>';	
		  var pearl_margin ='<?php echo get_option('pearl_rss_parser_margin');?>';	
			
		  var heading_font_color ='<?php echo get_option('pearl_rss_parser_heading_font_color');?>';
		  var heading_font_size ='<?php echo get_option('pearl_rss_parser_heading_font_size');?>';
		  
		  var title_font_color = '<?php echo get_option('pearl_rss_parser_title_font_color');?>';
		  var title_font_size ='<?php echo get_option('pearl_rss_parser_title_font_size');?>';
		  
		  var descr_padding ='<?php echo get_option('pearl_rss_parser_descr_padding');?>';
		  var descr_font_color = '<?php echo get_option('pearl_rss_parser_descr_font_color');?>';
		  var descr_font_size ='<?php echo get_option('pearl_rss_parser_descr_font_size');?>';
		  
		  var read_more_color = '<?php echo get_option('pearl_rss_parser_readmore_font_color');?>';
		  var read_font_size ='<?php echo get_option('pearl_rss_parser_readmore_font_size');?>';
		  
		  var pagination_color = '<?php echo get_option('pearl_rss_parser_pagination_font_color');?>';
		  var pagination_font_size ='<?php echo get_option('pearl_rss_parser_pagination_font_size');?>';
		  
		  var creation_date_font_color = '<?php echo get_option('pearl_rss_parser_creation_date_font_color');?>';
		  var creation_date_font_size ='<?php echo get_option('pearl_rss_parser_creation_date_font_size');?>';
			  
		   $jquery('.pearl_rss').css({
			   "background-color":backgroundColor,
			   "width":pearl_rss_width,
			   "padding":pearl_padding,
			   "margin":pearl_margin,
			   "border-width":border_width,
			   "border-style":"solid",
			   "border-color": border_color});
			 
			  $jquery('.pearl_rss_title').css({
				"color":heading_font_color,		  
				"font-size":heading_font_size
			  });
			  
			  $jquery('.pearl_rss_read_more ').css({
				"color":read_more_color,		  
				"font-size":read_font_size
			  });
			  
			  $jquery('.pearl_rss_section_title').css({
				  "color":title_font_color,		 
				  "font-size":title_font_size
			  });
			  
			   $jquery('.rss_pagination').css({
				  "color":pagination_color,		 
				  "font-size":pagination_font_size
			  });
			  
			   $jquery('.pearl_rss_section p').css({
				  "padding":descr_padding,
				  "color":descr_font_color,		 
				  "font-size":descr_font_size
			  });	
			   
	 		 }
		
	 
		</script>
		<?php
		
		
	}
	
	// Main plugin function
    
}
?>
