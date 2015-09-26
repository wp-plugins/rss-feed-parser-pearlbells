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
        $html = "<div class='pearl_rss'> ";
         if(get_option('pearl_rss_parser_show_heading') == 'yes')
                $html.= "<div class='pearl_rss_title'>". $xml->channel->title ."</div>";

        $cnt = get_option('pearl_rss_feed_count');
        $html .= "<div class='pearl_container'> ";
        for( $i=0; $i < $cnt; $i++ )
        {   
            $rssData = $xml->channel->item[$i];
            if(!empty($rssData->title))
            {	
               $html .= "<div class='pearl_rss_section'>";
               if( get_option('pearl_rss_parser_show_title') == 'yes' )
                    $html .= (get_option('pearl_rss_parser_hyperlink_title') == 'yes')? "<a href=". trim($rssData->link)." class='pearl_rss_section_title' target='_blank'>". trim(strip_tags($rssData->title))."</a>" : '<span class="pearl_rss_section_title">'.trim(strip_tags($rssData->title)).'</span>';
               if( $rssData->children( 'media',true ) && ( get_option('pearl_rss_parser_show_thumbnail') == 'yes' ) )
               {
                    $media = $rssData->children('media',true);
                    $thumb = $media->thumbnail[0]->attributes();
                    $html .= '<div class="pearl_rss_left" style="background-image: url('.$thumb['url'].');width: '.$thumb['width'].'px;height: '.$thumb['height'].'px;"></div>';            
               }
               if( get_option('pearl_rss_parser_show_descr') =='yes' && !empty( $rssData->description ) )
               {	
                   $html .= "<p>".trim(substr(strip_tags($rssData->description),0,get_option('pearl_rss_parser_no_of_character')))."";
                   $html .= ( get_option('pearl_rss_parser_show_readmore') == 'yes' )?". . .<a href='".trim($rssData->link)."' class='pearl_rss_read_more' target='_blank'>&nbsp;read more </a>":"";
                   $html .= ( get_option('pearl_rss_parser_show_creation_date') == 'yes' )?"<span class='pearl_creation_date'>".$rssData->pubDate."</span>":"";
                   $html.= "</p>";
               }
               $html .= "</div>"; 
            }
          }
          $html .= "</div> "; 

        if( get_option('pearl_rss_parser_show_pagination') == 'yes')
            $html .= "<div class='rss_pagination'></div>";	
        $html .= "</div>" ;
        return $html;
    }
}
?>
