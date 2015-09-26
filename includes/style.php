<?php
namespace rsspearlbells;
class rssStyleData {
    
        public function __construct() {
            
            add_action( 'wp_enqueue_scripts', array($this,'safely_add_stylesheet') );
            add_action('wp_head', array($this,'pearl_script'));
            
        }
    
        public function safely_add_stylesheet() {
             wp_enqueue_style( 'pearl_rss_feed_parser', plugins_url('../css/pearl_rss_feed_parser_css.css', __FILE__) );
             $custom_css = '
                .pearl_rss {
                     background-color: '.get_option('pearl_rss_parser_bg_color').';
                     border-color: '.get_option('pearl_rss_parser_border_color').';
                     border-style: solid;
                     border-width: '.get_option('pearl_rss_parser_border_width').';
                     border-radius: '.get_option('pearl_rss_parser_border_radius').';
                     padding: '.get_option('pearl_rss_parser_padding').';
                     margin: '.get_option('pearl_rss_parser_margin').';
                     width: '.get_option('pearl_rss_parser_width').';
                }
                .pearl_rss .pearl_rss_title  {
                     color: '.get_option('pearl_rss_parser_heading_font_color').';
                     font-size: '.get_option('pearl_rss_parser_heading_font_size').';  
                }
                .pearl_rss_section .pearl_rss_read_more  {
                     color: '.get_option('pearl_rss_parser_readmore_font_color').';
                     font-size: '.get_option('pearl_rss_parser_readmore_font_size').';
                }
                .pearl_rss_section .pearl_rss_section_title  {
                     color: '.get_option('pearl_rss_parser_title_font_color').';
                     font-size: '.get_option('pearl_rss_parser_title_font_size').';
                }
                .rss_pagination  {
                     color: '.get_option('pearl_rss_parser_pagination_font_color').';
                     font-size: '.get_option('pearl_rss_parser_pagination_font_size').';  
                }
                .pearl_creation_date  {
                     color: '.get_option('pearl_rss_parser_creation_date_font_color').';
                     font-size: '.get_option('pearl_rss_parser_creation_date_font_size').';  
                }
                .pearl_rss_section p  {
                     color: '.get_option('pearl_rss_parser_descr_font_color').';
                     font-size: '.get_option('pearl_rss_parser_descr_font_size').';  
                     padding : '.get_option('pearl_rss_parser_descr_padding').';  
                }
                
                ';
                wp_add_inline_style( 'pearl_rss_feed_parser', $custom_css );
                

         }
         
        public function pearl_script()
        {            
             // create array of all scripts
            $scripts = array( 'jquery' => 'js/jquery.js',
                              'mainrss' => 'js/mainrss.js',
                              'paginate' => 'js/paginate.js');
            $pluginOptions = array( 'feed_per_page' => get_option('pearl_rss_parser_feed_per_page'));
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
