<?php
namespace rsspearlbells;
class rssOptionsValues {
    
    public function __construct() {
       
    }
    
    public function add_options()
    {
            add_option('pearl_rss_parser_width','94%','','yes');
            add_option('pearl_rss_parser_bg_color','#f0f0f0','','yes');
            add_option('pearl_rss_parser_border_color','#cccccc','','yes');
            add_option('pearl_rss_parser_border_width','1px','','yes');	
            add_option('pearl_rss_parser_border_radius','3px','','yes');	
            add_option('pearl_rss_parser_padding','2%','','yes');
            add_option('pearl_rss_parser_margin','1%','','yes');		
            add_option('pearl_rss_parser_show_heading','yes','','yes');		
            add_option('pearl_rss_parser_heading_font_size','18px','','yes');
            add_option('pearl_rss_parser_heading_font_color','#004080','','yes');
            add_option('pearl_rss_parser_show_title','yes','','yes');
            add_option('pearl_rss_parser_hyperlink_title','yes','','yes');
            add_option('pearl_rss_parser_title_font_size','14px','','yes');		
            add_option('pearl_rss_parser_title_font_color','#cc4a00','','yes');		
            add_option('pearl_rss_parser_show_descr','yes','','yes');
            add_option('pearl_rss_parser_descr_font_size','12px','','yes');
            add_option('pearl_rss_parser_descr_font_color','#000000','','yes');
            add_option('pearl_rss_parser_descr_padding','5px','','yes');		
            add_option('pearl_rss_parser_show_readmore','yes','','yes');
            add_option('pearl_rss_parser_readmore_font_size','12px','','yes');		
            add_option('pearl_rss_parser_readmore_font_color','#004080','','yes');		
            add_option('pearl_rss_parser_show_creation_date','yes','','yes');
            add_option('pearl_rss_parser_creation_date_font_size','11px','','yes');
            add_option('pearl_rss_parser_creation_date_font_color','#004080','','yes');		
            add_option('pearl_rss_parser_show_pagination','yes','','yes');		
            add_option('pearl_rss_parser_pagination_font_size','12px','','yes');
            add_option('pearl_rss_parser_pagination_font_color','#004080','','yes');
            add_option('pearl_rss_parser_no_of_character','150','','yes');
            add_option('pearl_rss_parser_feed_per_page','5','','yes');
            add_option('pearl_rss_items_display','5','','yes');
            add_option('pearl_rss_feed_count','20','','yes');
            add_option('pearl_rss_parser_show_thumbnail','yes','','yes');
    }
    
    public function update_options() {
        
        $ok = false;
        $message = '';
        $optionValues = $_POST;
   
        foreach($optionValues as $key => $value){
            
          if ( get_option( $key ) !== false ) {
            update_option($key,$value);
			$ok = true;
          }
            
        }
        
        if($ok)
        {
            $message = '<div id="message" class="updated fade"><p>Options Saved</p></div>';
        }
        else
        {
            $message = '<div id="message" class="error fade"><p>Failed to save options</p></div> ';

        }
       
        echo $message;
       
        
    }
    
    public function delete_options()
    {
        delete_option('pearl_rss_parser_width');
        delete_option('pearl_rss_parser_bg_color');
        delete_option('pearl_rss_parser_border_color');		
        delete_option('pearl_rss_parser_border_width');
        delete_option('pearl_rss_parser_border_radius');
        delete_option('pearl_rss_parser_padding');
        delete_option('pearl_rss_parser_margin');		
        delete_option('pearl_rss_parser_show_heading');
        delete_option('pearl_rss_parser_heading_font_size');
        delete_option('pearl_rss_parser_heading_font_color');
        delete_option('pearl_rss_parser_show_title');		
        delete_option('pearl_rss_parser_hyperlink_title');
        delete_option('pearl_rss_parser_title_font_size');		
        delete_option('pearl_rss_parser_title_font_color');		
        delete_option('pearl_rss_parser_show_descr');	
        delete_option('pearl_rss_parser_descr_font_size');		
        delete_option('pearl_rss_parser_descr_font_color');
        delete_option('pearl_rss_parser_descr_padding');
        delete_option('pearl_rss_parser_show_readmore');
        delete_option('pearl_rss_parser_readmore_font_size');
        delete_option('pearl_rss_parser_readmore_font_color');		
        delete_option('pearl_rss_parser_show_creation_date');
        delete_option('pearl_rss_parser_creation_date_font_size');
        delete_option('pearl_rss_parser_creation_date_font_color');
        delete_option('pearl_rss_parser_show_pagination');
        delete_option('pearl_rss_parser_pagination_font_size');
        delete_option('pearl_rss_parser_pagination_font_color');
        delete_option('pearl_rss_parser_no_of_character');
        delete_option('pearl_rss_parser_feed_per_page');
        delete_option('pearl_rss_feed_count');
        delete_option('pearl_rss_parser_show_thumbnail');
    }
    
   
    
}
?>
