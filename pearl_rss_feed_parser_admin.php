<?php $default_pearl_rss_parser_width = get_option('pearl_rss_parser_width');
      $default_pearl_rss_parser_bg_color = get_option('pearl_rss_parser_bg_color');
	  $default_pearl_rss_parser_border_color = get_option('pearl_rss_parser_border_color');
      $default_pearl_rss_parser_border_width = get_option('pearl_rss_parser_border_width');
	  $default_pearl_rss_parser_padding = get_option('pearl_rss_parser_padding');	  
	  $default_pearl_rss_parser_margin = get_option('pearl_rss_parser_margin');
	  $default_pearl_rss_show_heading = get_option('pearl_rss_parser_show_heading');
	  $default_pearl_rss_parser_heading_font_color = get_option('pearl_rss_parser_heading_font_color');
	  $default_pearl_rss_parser_heading_font_size = get_option('pearl_rss_parser_heading_font_size');
	  $default_pearl_rss_show_title = get_option('pearl_rss_parser_show_title');
	  $default_pearl_rss_hyperlink_title = get_option('pearl_rss_parser_hyperlink_title');
	  $default_pearl_rss_parser_title_font_color = get_option('pearl_rss_parser_title_font_color');
	  $default_pearl_rss_parser_title_font_size = get_option('pearl_rss_parser_title_font_size');	  
	  $default_pearl_rss_parser_descr_padding = get_option('pearl_rss_parser_descr_padding');
	  $default_pearl_rss_parser_descr_font_color = get_option('pearl_rss_parser_descr_font_color');
	  $default_pearl_rss_parser_descr_font_size = get_option('pearl_rss_parser_descr_font_size');
	  $default_pearl_rss_parser_show_descr = get_option('pearl_rss_parser_show_descr');
	  $default_pearl_rss_parser_no_of_character = get_option('pearl_rss_parser_no_of_character');
	  $default_pearl_rss_parser_show_readmore = get_option('pearl_rss_parser_show_readmore');
	  $default_pearl_rss_parser_readmore_font_color = get_option('pearl_rss_parser_readmore_font_color');
	  $default_pearl_rss_parser_readmore_font_size = get_option('pearl_rss_parser_readmore_font_size');
	  $default_pearl_rss_parser_show_creation_date = get_option('pearl_rss_parser_show_creation_date');
	  $default_pearl_rss_parser_creation_date_font_color = get_option('pearl_rss_parser_creation_date_font_color');
	  $default_pearl_rss_parser_creation_date_font_size = get_option('pearl_rss_parser_creation_date_font_size');
	  $default_pearl_rss_parser_show_pagination = get_option('pearl_rss_parser_show_pagination');
	  $default_pearl_rss_parser_pagination_font_color = get_option('pearl_rss_parser_pagination_font_color');
	  $default_pearl_rss_parser_pagination_font_size = get_option('pearl_rss_parser_pagination_font_size');
	  $default_pearl_rss_parser_feed_per_page = get_option('pearl_rss_parser_feed_per_page');
		?>
      <form method="post">    
           
           <label for="pearl_rss_parser_width">Width :</label>
           <input type="text" name="pearl_rss_parser_width" value="<?php echo $default_pearl_rss_parser_width;?>"/>
           <label for="pearl_rss_parser_bg_color">Bg Color :</label>
           <input type="text" name="pearl_rss_parser_bg_color" value="<?php echo $default_pearl_rss_parser_bg_color;?>"/><br/>
           <label for="pearl_rss_parser_border_color">Border Color :</label>
           <input type="text" name="pearl_rss_parser_border_color" value="<?php echo $default_pearl_rss_parser_border_color;?>"/>
           <label for="pearl_rss_parser_border_width">Border Width :</label>
           <input type="text" name="pearl_rss_parser_border_width" value="<?php echo $default_pearl_rss_parser_border_width;?>"/><br/>       
           <label for="pearl_rss_parser_padding">Padding :</label>
           <input type="text" name="pearl_rss_parser_padding" value="<?php echo $default_pearl_rss_parser_padding;?>"/>
           <label for="pearl_rss_parser_margin">Margin :</label>
           <input type="text" name="pearl_rss_parser_margin" value="<?php echo $default_pearl_rss_parser_margin;?>"/><br/>
           <h3>Heading Settings</h3>
           <label for="pearl_rss_parser_show_heading">Show Heading :</label>
           <input type="radio" name="pearl_rss_parser_show_heading" value="yes"<?php echo $default_pearl_rss_parser_show_heading;?> /> Yes <input type="radio" name="pearl_rss_parser_show_heading" value="no"<?php echo $default_pearl_rss_parser_show_heading;?> /> No<br/>
           <label for="pearl_rss_parser_heading_font_size">Heading Font Size :</label>
           <input type="text" name="pearl_rss_parser_heading_font_size" value="<?php echo $default_pearl_rss_parser_heading_font_size;?>"/>  
		   <label for="pearl_rss_parser_heading_font_color">Heading Font Color :</label>
           <input type="text" name="pearl_rss_parser_heading_font_color" value="<?php echo $default_pearl_rss_parser_heading_font_color;?>"/>
           <h3>Title Settings</h3>
           <label for="pearl_rss_parser_show_title">Show Title:</label>
           <input type="radio" name="pearl_rss_parser_show_title" value="yes"<?php echo $default_pearl_rss_parser_show_title;?> /> Yes <input type="radio" name="pearl_rss_parser_show_title" value="no"<?php echo $default_pearl_rss_parser_show_title;?> /> No<br/>
           <label for="pearl_rss_parser_hyperlink_title">Hyperlink Title:</label>
           <input type="radio" name="pearl_rss_parser_hyperlink_title" value="yes"<?php echo $default_pearl_rss_parser_hyperlink_title;?> /> Yes <input type="radio" name="pearl_rss_parser_hyperlink_title" value="no"<?php echo $default_pearl_rss_parser_hyperlink_title;?> /> No<br/>
            
           <label for="pearl_rss_parser_title_font_size">Title Font Size :</label>
           <input type="text" name="pearl_rss_parser_title_font_size" value="<?php echo $default_pearl_rss_parser_title_font_size;?>"/>
           <label for="pearl_rss_parser_title_font_color">Title Font Color :</label>
           <input type="text" name="pearl_rss_parser_title_font_color" value="<?php echo $default_pearl_rss_parser_title_font_color;?>"/><br/>
           <h3>Description Settings</h3>
           <label for="pearl_rss_parser_show_descr">Show Description :</label>
           <input type="radio" name="pearl_rss_parser_show_descr" value="yes"<?php echo $default_pearl_rss_parser_show_descr;?> /> Yes <input type="radio" name="pearl_rss_parser_show_descr" value="no"<?php echo $default_pearl_rss_parser_show_descr;?> /> No<br/>           
           <label for="pearl_rss_parser_descr_font_size">Font Size (Descr) :</label>
           <input type="text" name="pearl_rss_parser_descr_font_size" value="<?php echo $default_pearl_rss_parser_descr_font_size;?>"/>   <br/>        
           <label for="pearl_rss_parser_descr_font_color">Font Color (Descr) :</label>
           <input type="text" name="pearl_rss_parser_descr_font_color" value="<?php echo $default_pearl_rss_parser_descr_font_color;?>"/>
           <label for="pearl_rss_parser_descr_padding">Padding (descr) :</label>
           <input type="text" name="pearl_rss_parser_descr_padding" value="<?php echo $default_pearl_rss_parser_descr_padding;?>"/>  <br/>
           <h3>Read More Settings</h3>  
           <label for="pearl_rss_parser_show_readmore">Show Read More :</label>
           <input type="radio" name="pearl_rss_parser_show_readmore" value="yes"<?php echo $default_pearl_rss_parser_show_readmore;?> /> Yes <input type="radio" name="pearl_rss_parser_show_readmore" value="no"<?php echo $default_pearl_rss_parser_show_readmore;?> /> No<br/>           
           <label for="pearl_rss_parser_readmore_font_size">Font Size (Read More) :</label>
           <input type="text" name="pearl_rss_parser_readmore_font_size" value="<?php echo $default_pearl_rss_parser_readmore_font_size;?>"/>          
           <label for="pearl_rss_parser_readmore_font_color">Font Color (Read More):</label>
           <input type="text" name="pearl_rss_parser_readmore_font_color" value="<?php echo $default_pearl_rss_parser_readmore_font_color;?>"/>
            <h3>Creation Date Settings</h3>
		
        <label for="pearl_rss_parser_show_creation_date">Show Creation Date :</label>
           <input type="radio" name="pearl_rss_parser_show_creation_date" value="yes"<?php echo $default_pearl_rss_parser_show_creation_date;?> /> Yes <input type="radio" name="pearl_rss_parser_show_creation_date" value="no"<?php echo $default_pearl_rss_parser_show_creation_date;?> /> No<br/>           
           <label for="pearl_rss_parser_creation_date_font_size">Font Size (Creation Date) :</label>
           <input type="text" name="pearl_rss_parser_creation_date_font_size" value="<?php echo $default_pearl_rss_parser_creation_date_font_size;?>"/>   <br/>        
           <label for="pearl_rss_parser_creation_date_font_color">Font Color (Creation Date):</label>
           <input type="text" name="pearl_rss_parser_creation_date_font_color" value="<?php echo $default_pearl_rss_parser_creation_date_font_color;?>"/>
           <h3>Pagination Settings</h3>
         <label for="pearl_rss_parser_show_pagination">Show Pagination :</label>
           <input type="radio" name="pearl_rss_parser_show_pagination" value="yes"<?php echo $default_pearl_rss_parser_show_pagination;?> /> Yes <input type="radio" name="pearl_rss_parser_show_pagination" value="no"<?php echo $default_pearl_rss_parser_show_pagination;?> /> No<br/>           
           <label for="pearl_rss_parser_pagination_font_size">Font Size (Pagination) :</label>
           <input type="text" name="pearl_rss_parser_pagination_font_size" value="<?php echo $default_pearl_rss_parser_pagination_font_size;?>"/>   <br/>        
           <label for="pearl_rss_parser_pagination_font_color">Font Color (Pagination):</label>
           <input type="text" name="pearl_rss_parser_pagination_font_color" value="<?php echo $default_pearl_rss_parser_pagination_font_color;?>"/>
    
           <label for="pearl_rss_parser_no_of_character">No of Characters :</label>
           <input type="text" name="pearl_rss_parser_no_of_character" value="<?php echo $default_pearl_rss_parser_no_of_character;?>"/>
           
           <label for="pearl_rss_parser_feed_per_page">Feeds per page :</label>
           <input type="text" name="pearl_rss_parser_feed_per_page" value="<?php echo $default_pearl_rss_parser_feed_per_page;?>"/>
          
           <input type="submit" name="submit" value="Submit"/>
        </form>
        
         <p>Created by <a href="http://pearlbells.co.uk/" target="_blank">Pearlbells</a><br/> Follow me : <a href="http://twitter.com/#!/pearlbells" target="_blank">Twitter</a><br/>Please Donate : <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=W884YAWEDPA9U" target="_blank">Click Here</a></p>
         <p>Feel free to email me lizeipe@gmail.com for any advice or suggestion.</p>