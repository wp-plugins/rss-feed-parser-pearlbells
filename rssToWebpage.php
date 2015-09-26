<?php
/*
Plugin Name: Display RSS Feed 
Plugin URI: http://pearlbells.co.uk/
Description:  RSS Feed Parser Pearlbells
Version:  4.0
Author:Pearlbells
Author URI: http://www.pearlbells.co.uk/rss-to-webpage/
License: GPL2
*/
/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version. 

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details. 

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.

*/
namespace rsspearlbells;
include_once 'includes/form.php';
include_once 'includes/data.php';
include_once 'includes/optionsValues.php';
include_once 'includes/style.php';

class rssToWebpage extends \WP_Widget {
    
     private $objOptions;
     private $objData;
     public function __construct() {
         add_action( 'admin_menu', array( $this, 'menu' ) );
         $this->objOptions = new rssOptionsValues;
         $this->objOptions->add_options();
         $this->objData = new pearlData;
         new rssStyleData;
         register_deactivation_hook(__FILE__, array( $this, 'pearl_uninstall' ));
         $params = array( 
                    'description' => 'Display RSS Feeds',
                    'name' => 'RSS Feed');
        parent::__construct('rssToWebpage','',$params);
     }
     
     public function pearl_uninstall() {
         $this->objOptions->delete_options();
     }
     
     public function menu() {
        add_options_page('RSS to Webpage','RSS to Webpage','manage_options',__FILE__,array($this,'opt_page')); 
         
     }
  
     public function opt_page() {
         
         $this->postData();
     }
     
     public function postData() {
         
        if($_REQUEST['submit']) {
            $this->objOptions->update_options();
        }
        
        new rssDisplayForm;
    }
    
    public function form($instance)
    {
        extract($instance);
        ?>
         <p>
            <label for="<?php echo $this->get_field_id('title')?>"> Title : </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title');?>"
                   name="<?php echo $this->get_field_name('title');?>"
                   value="<?php if(isset($title)) echo esc_attr($title);?>"/>
        </p>
         <p>
            <label for="<?php echo $this->get_field_id('rss_url')?>"> URL : </label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('rss_url');?>"
                   name="<?php echo $this->get_field_name('rss_url');?>"
                   value="<?php if(isset($rss_url)) echo esc_attr($rss_url);?>"/>
        </p>
       
        <?php 
    }
    
    public function widget($args , $instance)
    {
        extract($args);
        extract($instance);
        echo $before_title . $title . $after_title;  
       
        $pearl_rss_feed_display = $this->objData->pearl_rss_feed_parser($instance);
        echo '<div class="pearl-rss-widget">'.$pearl_rss_feed_display.'</div>';
    }
     
}
add_action('widgets_init',function ()
{
    register_widget('rsspearlbells\rssToWebpage');
});
?>
