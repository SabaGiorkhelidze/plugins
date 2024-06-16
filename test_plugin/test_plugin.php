<?php

/* 

Plugin Name: Test
Description: dont know
Version: 1.0
Author: Saba
Author URI: github.com/SabaGiorkhelidze 

*/

function addSentanceToEnd($content)
{
    if (is_page() && is_main_query()) {  #avoids to add this line to all the pages and posts and content like navbar sidebar etc. 
        return $content . ' <p>This was added by me: Saba</p>';
    }
    return $content;
}

add_filter('the_content', 'addSentanceToEnd')

?>