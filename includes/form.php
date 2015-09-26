<?php
namespace rsspearlbells;
class rssDisplayForm {
    
    public function __construct() {

        $this->optionsForm();
        $this->authorDetails();
    }

    public function optionsForm() 
    {
        $yesShowHeading = ( ( get_option('pearl_rss_parser_show_heading') == 'yes' )  ) ? 'checked' : 'unchecked';
        $noShowHeading = ( get_option('pearl_rss_parser_show_heading') == 'no'  ) ? 'checked' : 'unchecked';
        $yesShowTitle = ( ( get_option('pearl_rss_parser_show_title') == 'yes' )  ) ? 'checked' : 'unchecked';
        $noShowTitle = ( get_option('pearl_rss_parser_show_title') == 'no'  ) ? 'checked' : 'unchecked';
        $yesHyperTitle = ( ( get_option('pearl_rss_parser_hyperlink_title') == 'yes' )  ) ? 'checked' : 'unchecked';
        $noHyperTitle = ( get_option('pearl_rss_parser_hyperlink_title') == 'no'  ) ? 'checked' : 'unchecked';	 
        $yesShowDescr = ( ( get_option('pearl_rss_parser_show_descr') == 'yes' )  ) ? 'checked' : 'unchecked';
        $noShowDescr = ( get_option('pearl_rss_parser_show_descr') == 'no'  ) ? 'checked' : 'unchecked'; 
        $yesShowReadMore = ( ( get_option('pearl_rss_parser_show_readmore') == 'yes' )  ) ? 'checked' : 'unchecked';
        $noShowReadMore = ( get_option('pearl_rss_parser_show_readmore') == 'no'  ) ? 'checked' : 'unchecked';
        $yesDate = ( ( get_option('pearl_rss_parser_show_creation_date') == 'yes' )  ) ? 'checked' : 'unchecked';
        $noDate = ( get_option('pearl_rss_parser_show_creation_date') == 'no'  ) ? 'checked' : 'unchecked';	  
        $yesPagination = ( ( get_option('pearl_rss_parser_show_pagination') == 'yes' )  ) ? 'checked' : 'unchecked';
        $noPagination = ( get_option('pearl_rss_parser_show_pagination') == 'no'  ) ? 'checked' : 'unchecked';
        $yesThumb = ( ( get_option('pearl_rss_parser_show_thumbnail') == 'yes' )  ) ? 'checked' : 'unchecked';
        $noThumb = ( get_option('pearl_rss_parser_show_thumbnail') == 'no'  ) ? 'checked' : 'unchecked';
        
        $displayOptionsForm = '

         <form method="post" action="'.$PHP_SELF.'">
         <h1>RSS Settings</h1>
         <label for="pearl_rss_parser_width">Width :</label>
         <input type="text" name="pearl_rss_parser_width" value="'.get_option('pearl_rss_parser_width').'"/>
         <label for="pearl_rss_parser_bg_color">Bg Color :</label>
         <input type="text" name="pearl_rss_parser_bg_color" value="'.get_option('pearl_rss_parser_bg_color').'"/><br/>
         <label for="pearl_rss_parser_border_color">Border Color :</label>
         <input type="text" name="pearl_rss_parser_border_color" value="'.get_option('pearl_rss_parser_border_color').'"/>
         <label for="pearl_rss_parser_border_width">Border Width :</label>
         <input type="text" name="pearl_rss_parser_border_width" value="'.get_option('pearl_rss_parser_border_width').'"/><br/> 
         <label for="pearl_rss_parser_border_width">Border Radius :</label>
         <input type="text" name="pearl_rss_parser_border_radius" value="'.get_option('pearl_rss_parser_border_radius').'"/><br/> 
         <label for="pearl_rss_parser_padding">Padding :</label>
         <input type="text" name="pearl_rss_parser_padding" value="'.get_option('pearl_rss_parser_padding').'"/>
         <label for="pearl_rss_parser_margin">Margin :</label>
         <input type="text" name="pearl_rss_parser_margin" value="'.get_option('pearl_rss_parser_margin').'"/><br/>
         <h3>Heading Settings</h3>
         <label for="pearl_rss_parser_show_heading">Show Heading :</label>
         <input type="radio" name="pearl_rss_parser_show_heading" value="yes" '.$yesShowHeading.' /> Yes 
         <input type="radio" name="pearl_rss_parser_show_heading" value="no" '.$noShowHeading.' /> No<br/>
         <label for="pearl_rss_parser_heading_font_size">Heading Font Size :</label>
         <input type="text" name="pearl_rss_parser_heading_font_size" value="'.get_option('pearl_rss_parser_heading_font_size').'"/>  
         <label for="pearl_rss_parser_heading_font_color">Heading Font Color :</label>
         <input type="text" name="pearl_rss_parser_heading_font_color" value="'.get_option('pearl_rss_parser_heading_font_color').'"/>
         <h3>Title Settings</h3>
         <label for="pearl_rss_parser_show_title">Show Title:</label>
         <input type="radio" name="pearl_rss_parser_show_title" value="yes" '.$yesShowTitle.' /> Yes 
         <input type="radio" name="pearl_rss_parser_show_title" value="no" '.$noShowTitle.'/> No<br/>
         <label for="pearl_rss_parser_hyperlink_title">Hyperlink Title:</label>
         <input type="radio" name="pearl_rss_parser_hyperlink_title" value="yes" '.$yesHyperTitle.' /> Yes
         <input type="radio" name="pearl_rss_parser_hyperlink_title" value="no" '.$noHyperTitle.' /> No<br/>    
         <label for="pearl_rss_parser_title_font_size">Title Font Size :</label>
         <input type="text" name="pearl_rss_parser_title_font_size" value="'.get_option('pearl_rss_parser_title_font_size').'"/>
         <label for="pearl_rss_parser_title_font_color">Title Font Color :</label>
         <input type="text" name="pearl_rss_parser_title_font_color" value="'.get_option('pearl_rss_parser_title_font_color').'"/><br/>
         <h3>Description Settings</h3>
         <label for="pearl_rss_parser_show_descr">Show Description :</label>
         <input type="radio" name="pearl_rss_parser_show_descr" value="yes" '.$yesShowDescr.' /> Yes 
         <input type="radio" name="pearl_rss_parser_show_descr" value="no" '.$noShowDescr.' /> No<br/>           
         <label for="pearl_rss_parser_descr_font_size">Font Size (Descr) :</label>
         <input type="text" name="pearl_rss_parser_descr_font_size" value="'.get_option('pearl_rss_parser_descr_font_size').'"/>   <br/>        
         <label for="pearl_rss_parser_descr_font_color">Font Color (Descr) :</label>
         <input type="text" name="pearl_rss_parser_descr_font_color" value="'.get_option('pearl_rss_parser_descr_font_color').'"/>
         <label for="pearl_rss_parser_descr_padding">Padding (descr) :</label>
         <input type="text" name="pearl_rss_parser_descr_padding" value="'.get_option('pearl_rss_parser_descr_padding').'"/>  <br/>
         <h3>Read More Settings</h3>  
         <label for="pearl_rss_parser_show_readmore">Show Read More :</label>
         <input type="radio" name="pearl_rss_parser_show_readmore" value="yes" '.$yesShowReadMore.' /> Yes 
         <input type="radio" name="pearl_rss_parser_show_readmore" value="no" '.$noShowReadMore.' /> No<br/>           
         <label for="pearl_rss_parser_readmore_font_size">Font Size (Read More) :</label>
         <input type="text" name="pearl_rss_parser_readmore_font_size" value="'.get_option('pearl_rss_parser_readmore_font_size').'"/>          
         <label for="pearl_rss_parser_readmore_font_color">Font Color (Read More):</label>
         <input type="text" name="pearl_rss_parser_readmore_font_color" value="'.get_option('pearl_rss_parser_readmore_font_color').'"/>
         <h3>Creation Date Settings</h3>	
         <label for="pearl_rss_parser_show_creation_date">Show Creation Date :</label>
         <input type="radio" name="pearl_rss_parser_show_creation_date" value="yes" '.$yesDate.' /> Yes 
         <input type="radio" name="pearl_rss_parser_show_creation_date" value="no" '.$noDate.' /> No<br/>           
         <label for="pearl_rss_parser_creation_date_font_size">Font Size (Creation Date) :</label>
         <input type="text" name="pearl_rss_parser_creation_date_font_size" value="'.get_option('pearl_rss_parser_creation_date_font_size').'"/>   <br/>        
         <label for="pearl_rss_parser_creation_date_font_color">Font Color (Creation Date):</label>
         <input type="text" name="pearl_rss_parser_creation_date_font_color" value="'.get_option('pearl_rss_parser_creation_date_font_color').'"/>
         <h3>Pagination Settings</h3>
         <label for="pearl_rss_parser_show_pagination">Show Pagination :</label>
         <input type="radio" name="pearl_rss_parser_show_pagination" value="yes" '.$yesPagination.' /> Yes 
         <input type="radio" name="pearl_rss_parser_show_pagination" value="no" '.$noPagination.' /> No<br/>           
         <label for="pearl_rss_parser_pagination_font_size">Font Size (Pagination) :</label>
         <input type="text" name="pearl_rss_parser_pagination_font_size" value="'.get_option('pearl_rss_parser_pagination_font_size').'"/>   <br/>        
         <label for="pearl_rss_parser_pagination_font_color">Font Color (Pagination):</label>
         <input type="text" name="pearl_rss_parser_pagination_font_color" value="'.get_option('pearl_rss_parser_pagination_font_color').'"/><br/>
         <label for="pearl_rss_parser_no_of_character">No of Characters :</label>
         <input type="text" name="pearl_rss_parser_no_of_character" value="'.get_option('pearl_rss_parser_no_of_character').'"/><br/>     
         <label for="pearl_rss_parser_feed_per_page">Feeds per page :</label>
         <input type="text" name="pearl_rss_parser_feed_per_page" value="'.get_option('pearl_rss_parser_feed_per_page').'"/><br/>
         <label for="pearl_rss_feed_count">Feeds Count :</label>
         <input type="text" name="pearl_rss_feed_count" value="'.get_option('pearl_rss_feed_count').'"/><br/>
         <label for="pearl_rss_parser_show_thumbnail">Show Thumbnail :</label>
         <input type="radio" name="pearl_rss_parser_show_thumbnail" value="yes" '.$yesThumb.' /> Yes 
         <input type="radio" name="pearl_rss_parser_show_thumbnail" value="no" '.$noThumb.' /> No<br/>              
         <input type="submit" name="submit" value="Submit"/>

          </form> ';

        echo $displayOptionsForm;

    }

    public function authorDetails() {

        $details = ' <p>Created by <a href="http://pearlbells.co.uk/" target="_blank">Pearlbells</a><br/> Follow me : <a href="http://twitter.com/#!/pearlbells" target="_blank">Twitter</a><br/>Please Donate : <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=W884YAWEDPA9U" target="_blank">Click Here</a></p>
         <p>Feel free to email me lizeipe@gmail.com for any advice or suggestion.</p>';
        echo $details;

    }
    
}
?>
