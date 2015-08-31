<?php
namespace rsspearlbells;
class pearlData {
    
        public function __construct() {
           
            add_shortcode('pearl_rss_feed_parser_display', array($this,'pearl_rss_feed_parser'));
        }
    
	public function pearl_rss_feed_parser($atts, $content = null)
	{		
             shortcode_atts( array(
		'rss_url' => 'http://static.cricinfo.com/rss/livescores.xml'		
		), $atts ) ;
		
		try
                {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $atts['rss_url']);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml'));
		$data = curl_exec($ch);
		curl_close($ch);
		$doc = new \SimpleXmlElement($data);
                }
                catch(Exception $e)
                {
                    echo $e;exit;
                }
	   
		if(isset($doc->channel))
		{
			$pearl_rss_feed_display = $this->parseRSS($doc,$rss_url);
		}	
		
		return $pearl_rss_feed_display;
		
		
			
	}
	public function parseRSS($xml,$rss_url)
	{
	
		$pearl_rss_parser_show_heading = get_option('pearl_rss_parser_show_heading');
		$pearl_rss_parser_show_title = get_option('pearl_rss_parser_show_title');	
		$pearl_rss_parser_hyperlink_title = get_option('pearl_rss_parser_hyperlink_title');
		$pearl_rss_parser_show_descr = get_option('pearl_rss_parser_show_descr');	
		$pearl_rss_parser_no_of_character = get_option('pearl_rss_parser_no_of_character');	
		$pearl_rss_parser_show_readmore = get_option('pearl_rss_parser_show_readmore');
		$pearl_rss_parser_show_creation_date = get_option('pearl_rss_parser_show_creation_date');
		$pearl_rss_parser_show_pagination = get_option('pearl_rss_parser_show_pagination');
		
		$html = "<div class='pearl_rss'> <div class='pearl_min_height'>";
		 if($pearl_rss_parser_show_heading == 'yes')
			$html.= "<div class='pearl_rss_title'>". $xml->channel->title ."</div>";
		 
		$cnt = count($xml->channel->item);
		
		for( $i=0; $i<$cnt; $i++ )
		{    
                    $url 	= $xml->channel->item[$i]->link;
                    $creation_date = $xml->channel->item[$i]->pubDate;
                    $title 	= strip_tags($xml->channel->item[$i]->title);
                    $desc = htmlentities($xml->channel->item[$i]->description);
                    if($title != '')
                    {	
                           $html .= "<div class='pearl_rss_section'>";
                           if($pearl_rss_parser_show_title == 'yes')
                           {
                             if($pearl_rss_parser_hyperlink_title == 'yes')
                                    $html .= "<a href=".trim($url)." class='pearl_rss_section_title' target='_blank'>". trim($title)."</a>";
                             else
                                   $html .= "<a href='#' class='pearl_rss_section_title' target='_blank'>". trim($title)."</a>";

                           }
                   if($pearl_rss_parser_show_descr =='yes' && $pearl_rss_parser_show_descr != '')
                   {	
                       $html .= "<p>".trim(substr($desc,0,$pearl_rss_parser_no_of_character))."";
                       if( $pearl_rss_parser_show_readmore == 'yes' && $pearl_rss_parser_show_descr != '' )
                              $html .= ". . .<a href='".trim($url)."' class='pearl_rss_read_more' target='_blank'>Read More </a>". trim($creation_date)."";
                       $html.= "</p>";
                   }
                   $html .= "</div>"; 

                   }
		  }
                  $html .= "</div> "; 
			
		if($pearl_rss_parser_show_pagination == 'yes')
                    $html .= "<div class='rss_pagination'></div>";	
		$html .= "</div>" ;
		return $html;
	}
}
?>
