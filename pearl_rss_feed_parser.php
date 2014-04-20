<?php
/*
Plugin Name: RSS Feed Parser Pearlbells
Plugin URI: http://pearlbells.co.uk/
Description:  RSS Feed Parser Pearlbells
Version:  2.0
Author:Pearlbells
Author URI: http://pearlbells.co.uk/contact-page
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
$pearl_rss_feed_parser_class = new pearl_rss_feed_parser_class();
class pearl_rss_feed_parser_class
{

        function safely_add_stylesheet() {
             wp_enqueue_style( 'pearl_rss_feed_parser', plugins_url('css/pearl_rss_feed_parser_css.css', __FILE__) );
         }
	
	function pearl_rss_feed_parser_script()
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

	
	function pearl_rss_feed_parser($atts, $content = null)
	{		
		extract( shortcode_atts( array(
		'rss_url' => 'http://static.cricinfo.com/rss/livescores.xml'		
		), $atts ) );
		// Get the url
		//$url = plugins_url();

	    $rss_url = $rss_url;
		
		$ch = curl_init($rss_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch);
		curl_close($ch);
		$doc = new SimpleXmlElement($data, LIBXML_NOCDATA);
	   
		if(isset($doc->channel))
		{
			$pearl_rss_feed_display = pearl_rss_feed_parser_class::parseRSS($doc,$rss_url);
		}	
		
		return $pearl_rss_feed_display;
		
		
			
	}
	function parseRSS($xml,$rss_url)
	{
	
		$pearl_rss_parser_show_heading = get_option('pearl_rss_parser_show_heading');
		$pearl_rss_parser_show_title = get_option('pearl_rss_parser_show_title');	
		$pearl_rss_parser_hyperlink_title = get_option('pearl_rss_parser_hyperlink_title');
		$pearl_rss_parser_show_descr = get_option('pearl_rss_parser_show_descr');	
		$pearl_rss_parser_no_of_character = get_option('pearl_rss_parser_no_of_character');	
		$pearl_rss_parser_show_readmore = get_option('pearl_rss_parser_show_readmore');
		$pearl_rss_parser_show_creation_date = get_option('pearl_rss_parser_show_creation_date');
		$pearl_rss_parser_show_pagination = get_option('pearl_rss_parser_show_pagination');
		$per = get_option('pearl_rss_parser_feed_per_page');
		
		
		$html = "<div class='pearl_rss'>";
		 if($pearl_rss_parser_show_heading == 'yes')
		 {
			$html.= "<div class='pearl_rss_title'>". $xml->channel->title ."</div>";
		 }
	   
		$cnt = count($xml->channel->item);
		
		$numPages = ceil(($cnt/$per)); // Count Number of pages and round up   
	
	   // This next check finds out what page we have selected, if not we say page 1
		 if (!isset($_GET["pearl"])) {
		 $st = 1;
		 } else {
		 $st = $_GET["pearl"];
		 }
		
		 $currentStart = ($st*$per)-$per; // Find the starting key of the page we are on
		
		 if($currentStart>=0 && $currentStart<$cnt)
		 {
		  for($i=$currentStart; $i<=(($currentStart+$per)-1); $i++)
		 // for($i=0; $i<$cnt; $i++)
		  {    
			 $url 	= $xml->channel->item[$i]->link;
			 $creation_date = $xml->channel->item[$i]->pubDate;
			 $title 	= strip_tags($xml->channel->item[$i]->title);
			 $desc = htmlentities($xml->channel->item[$i]->description);
			  if($title != '')
			  {	
				$html .= "<div class='pearl_rss_section'>";
				if($pearl_rss_parser_show_title =='yes')
				{
				  if($pearl_rss_parser_hyperlink_title == 'yes')
				  {
					 $html .= "<a href=".trim($url)." class='pearl_rss_section_title' target='_blank'>". trim($title)."</a>";
				  }
				  else
				  {
					$html .= "<a href='#' class='pearl_rss_section_title' target='_blank'>". trim($title)."</a>";
				  }
				}
			if($pearl_rss_parser_show_descr =='yes' && $pearl_rss_parser_show_descr != '')
			{	
				 $html .= "<p>".trim(substr($desc,0,$pearl_rss_parser_no_of_character))."";
				if($pearl_rss_parser_show_readmore == 'yes' && $pearl_rss_parser_show_descr != '')
				{
					$html .= ". . .<a href='".trim($url)."' class='pearl_rss_read_more' target='_blank'>Read More </a>". trim($creation_date)."";
				}
				   
				 $html.= "</p>";
			}
			$html .= "</div> "; 
				  
			}
		  }
		}	
		if($pearl_rss_parser_show_pagination == 'yes')
		{	
			// Finally display the page numbers and previous and next links
			 $html .= "<a href='?pearl=".($st-1)."' class='rss_pagination'>Previous</a> - ";		
			 for ( $i = 1; $i <= $numPages; $i += 1) 
			 {
				$html .= "<a href='?pearl=$i' class='rss_pagination'>[$i]</a> ";
			 }
				$html .= "- <a href='?pearl=".($st+1)."'  class='rss_pagination'>Next</a>";
			
		}
		$html .= "</div>" ;
		return $html;
	}
	

	
	
	
	
	function pearl_rss_feed_parser_install()
	{		
		add_option('pearl_rss_parser_width','500px','','yes');
		add_option('pearl_rss_parser_bg_color','#ffffff','','yes');
		add_option('pearl_rss_parser_border_color','#000000','','yes');
		add_option('pearl_rss_parser_border_width','2px','','yes');			
		add_option('pearl_rss_parser_padding','5px','','yes');
		add_option('pearl_rss_parser_margin','5px','','yes');		
		add_option('pearl_rss_parser_show_heading','yes','','yes');		
		add_option('pearl_rss_parser_heading_font_size','14px','','yes');
		add_option('pearl_rss_parser_heading_font_color','#004080','','yes');
		add_option('pearl_rss_parser_show_title','yes','','yes');
		add_option('pearl_rss_parser_hyperlink_title','yes','','yes');
		add_option('pearl_rss_parser_title_font_size','14px','','yes');		
		add_option('pearl_rss_parser_title_font_color','#510028','','yes');		
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
	}
	function pearl_rss_feed_parser_uninstall()
	{
		
		delete_option('pearl_rss_parser_width');
		delete_option('pearl_rss_parser_bg_color');
		delete_option('pearl_rss_parser_border_color');		
		delete_option('pearl_rss_parser_border_width');
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
		
	}
	
	function pearl_rss_feed_parser_menu()
	{
		add_options_page('RSS Feed Parser Pearl ','RSS Feed Parser Pearl','manage_options',__FILE__,array('pearl_rss_feed_parser_class','pearl_rss_feed_parser_menu_page'));  
	}
	function pearl_rss_feed_parser_menu_page()
	{
		?>
        <div class="wrap">
           <h2>RSS Feed Parser Settings</h2>
           <?php
		       if($_REQUEST['submit'])
			   {
				   pearl_rss_feed_parser_class::pearl_rss_feed_parser_update_option();
			   }
			       pearl_rss_feed_parser_class::pearl_rss_feed_parser_print_option();
		   ?>
        </div>
        <?php
	}
	
	function pearl_rss_feed_parser_update_option()
	{
		$ok = false;
		
		if($_REQUEST['pearl_rss_parser_feed_per_page'])
		{
			update_option('pearl_rss_parser_feed_per_page',$_REQUEST['pearl_rss_parser_feed_per_page']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_width'])
		{
			update_option('pearl_rss_parser_width',$_REQUEST['pearl_rss_parser_width']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_bg_color'])
		{
			update_option('pearl_rss_parser_bg_color',$_REQUEST['pearl_rss_parser_bg_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_border_color'])
		{
			update_option('pearl_rss_parser_border_color',$_REQUEST['pearl_rss_parser_border_color']);
			$ok = true;
			
		}		
		if($_REQUEST['pearl_rss_parser_border_width'])
		{
			update_option('pearl_rss_parser_border_width',$_REQUEST['pearl_rss_parser_border_width']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_padding'])
		{
			update_option('pearl_rss_parser_padding',$_REQUEST['pearl_rss_parser_padding']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_margin'])
		{
			update_option('pearl_rss_parser_margin',$_REQUEST['pearl_rss_parser_margin']);
			$ok = true;
			
		}
		
		if($_REQUEST['pearl_rss_parser_show_heading'])
		{
			update_option('pearl_rss_parser_show_heading',$_REQUEST['pearl_rss_parser_show_heading']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_heading_font_size'])
		{
			update_option('pearl_rss_parser_heading_font_size',$_REQUEST['pearl_rss_parser_heading_font_size']);
			$ok = true;
			
		}		
		if($_REQUEST['pearl_rss_parser_heading_font_color'])
		{
			update_option('pearl_rss_parser_heading_font_color',$_REQUEST['pearl_rss_parser_heading_font_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_show_title'])
		{
			update_option('pearl_rss_parser_show_title',$_REQUEST['pearl_rss_parser_show_title']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_hyperlink_title'])
		{
			update_option('pearl_rss_parser_hyperlink_title',$_REQUEST['pearl_rss_parser_hyperlink_title']);
			$ok = true;
			
		}	
		if($_REQUEST['pearl_rss_parser_title_font_size'])
		{
			update_option('pearl_rss_parser_title_font_size',$_REQUEST['pearl_rss_parser_title_font_size']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_title_font_color'])
		{
			update_option('pearl_rss_parser_title_font_color',$_REQUEST['pearl_rss_parser_title_font_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_show_descr'])
		{
			update_option('pearl_rss_parser_show_descr',$_REQUEST['pearl_rss_parser_show_descr']);
			$ok = true;
			
		}	
		
		if($_REQUEST['pearl_rss_parser_descr_font_size'])
		{
			update_option('pearl_rss_parser_descr_font_size',$_REQUEST['pearl_rss_parser_descr_font_size']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_descr_font_color'])
		{
			update_option('pearl_rss_parser_descr_font_color',$_REQUEST['pearl_rss_parser_descr_font_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_descr_padding'])
		{
			update_option('pearl_rss_parser_descr_padding',$_REQUEST['pearl_rss_parser_descr_padding']);
			$ok = true;
			
		}	
		if($_REQUEST['pearl_rss_parser_show_readmore'])
		{
			update_option('pearl_rss_parser_show_readmore',$_REQUEST['pearl_rss_parser_show_readmore']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_readmore_font_size'])
		{
			update_option('pearl_rss_parser_readmore_font_size',$_REQUEST['pearl_rss_parser_readmore_font_size']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_readmore_font_color'])
		{
			update_option('pearl_rss_parser_readmore_font_color',$_REQUEST['pearl_rss_parser_readmore_font_color']);
			$ok = true;
			
		}
		
		if($_REQUEST['pearl_rss_parser_show_creation_date'])
		{
			update_option('pearl_rss_parser_show_creation_date',$_REQUEST['pearl_rss_parser_show_creation_date']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_creation_date_font_size'])
		{
			update_option('pearl_rss_parser_creation_date_font_size',$_REQUEST['pearl_rss_parser_creation_date_font_size']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_creation_date_font_color'])
		{
			update_option('pearl_rss_parser_creation_date_font_color',$_REQUEST['pearl_rss_parser_creation_date_font_color']);
			$ok = true;
			
		}		
		if($_REQUEST['pearl_rss_parser_show_pagination'])
		{
			update_option('pearl_rss_parser_show_pagination',$_REQUEST['pearl_rss_parser_show_pagination']);
			$ok = true;
			
		}
		
		if($_REQUEST['pearl_rss_parser_pagination_font_size'])
		{
			update_option('pearl_rss_parser_pagination_font_size',$_REQUEST['pearl_rss_parser_pagination_font_size']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_pagination_font_color'])
		{
			update_option('pearl_rss_parser_pagination_font_color',$_REQUEST['pearl_rss_parser_pagination_font_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_rss_parser_no_of_character'])
		{
			update_option('pearl_rss_parser_no_of_character',$_REQUEST['pearl_rss_parser_no_of_character']);
			$ok = true;
			
		}
		
		if($ok)
		{?>
           <div id="message" class="updated fade">
           <p>Options Saved</p>
           </div>
        <?php
		}
		else
		{
			?>
           <div id="message" class="error fade">
           <p>Failed to save options</p>
           </div>
        <?php
		}
	}
	
	function pearl_rss_feed_parser_print_option()
	{
		include 'pearl_rss_feed_parser_admin.php';
	}
	
}
add_action('admin_menu',array($pearl_rss_feed_parser_class,'pearl_rss_feed_parser_menu'));
add_action('wp_head', array($pearl_rss_feed_parser_class,'pearl_rss_feed_parser_script'));
add_action( 'wp_enqueue_scripts', array($pearl_rss_feed_parser_class,'safely_add_stylesheet') );
add_shortcode('pearl_rss_feed_parser_display', array($pearl_rss_feed_parser_class,'pearl_rss_feed_parser'));
register_activation_hook(__FILE__,array($pearl_rss_feed_parser_class,'pearl_rss_feed_parser_install'));
register_deactivation_hook(__FILE__,array($pearl_rss_feed_parser_class,'pearl_rss_feed_parser_uninstall'));
?>