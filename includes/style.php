<?php
namespace rsspearlbells;
class rssStyleData {
    
        public function __construct() {
            
            add_action( 'wp_enqueue_scripts', array($this,'safely_add_stylesheet') );
            add_action('wp_head', array($this,'pearl_script'));
            
        }
    
        public function safely_add_stylesheet() {
             wp_enqueue_style( 'pearl_rss_feed_parser', plugins_url('../css/pearl_rss_feed_parser_css.css', __FILE__) );
         }
         
         public function pearl_script()
            {            
                 // create array of all scripts
                $scripts = array( 'jquery' => 'js/jquery.js',
                                  'mainrss' => 'js/mainrss.js',
                                  'paginate' => 'js/paginate.js');
                $pluginOptions = array(
                   'backgroundColor' =>get_option('pearl_rss_parser_bg_color'),
		  'border_color' =>get_option('pearl_rss_parser_border_color'),
		  'pearl_rss_width' =>get_option('pearl_rss_parser_width'),
		  'border_width' =>get_option('pearl_rss_parser_border_width'),
		  'pearl_padding' =>get_option('pearl_rss_parser_padding'),
		  'pearl_margin' =>get_option('pearl_rss_parser_margin'),
			
		  'heading_font_color' =>get_option('pearl_rss_parser_heading_font_color'),
		  'heading_font_size' =>get_option('pearl_rss_parser_heading_font_size'),
		  
		  'title_font_color' => get_option('pearl_rss_parser_title_font_color'),
		  'title_font_size' =>get_option('pearl_rss_parser_title_font_size'),
		  
		  'descr_padding' =>get_option('pearl_rss_parser_descr_padding'),
		  'descr_font_color' => get_option('pearl_rss_parser_descr_font_color'),
		  'descr_font_size' =>get_option('pearl_rss_parser_descr_font_size'),
		  
		  'read_more_color' => get_option('pearl_rss_parser_readmore_font_color'),
		  'read_font_size' =>get_option('pearl_rss_parser_readmore_font_size'),
		  
		  'pagination_color' =>get_option('pearl_rss_parser_pagination_font_color'),
		  'pagination_font_size' =>get_option('pearl_rss_parser_pagination_font_size'),
                  'feed_per_page' => get_option('pearl_rss_parser_feed_per_page'),
		  
		  'creation_date_font_color' => get_option('pearl_rss_parser_creation_date_font_color'),
		  'creation_date_font_size' =>get_option('pearl_rss_parser_creation_date_font_size')
                    );
                foreach($scripts as $key => $sc)
                {
                   wp_deregister_script( $key );
                   wp_register_script( $key, plugin_dir_url(dirname(__FILE__)).$sc , array('jquery') );
                   wp_enqueue_script( $key );  
                }
                wp_localize_script( 'mainrss', 'rssPearlpluginOptions', $pluginOptions ); 
            }
	
}
?>
