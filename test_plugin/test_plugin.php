<?php

/* 

Plugin Name: Test
Description: dont know
Version: 1.0
Author: Saba
Author URI: github.com/SabaGiorkhelidze 

*/

// function addSentanceToEnd($content)
// {
//     if (is_page() && is_main_query()) {  #avoids to add this line to all the pages and posts and content like navbar sidebar etc. 
//         return $content . ' <p>This was added by me: Saba</p>';
//     }
//     return $content;
// }

// add_filter('the_content', 'addSentanceToEnd')





add_action('admin_menu', "WordCountPlugginToSettingsLink");



function WordCountPlugginToSettingsLink()
{
    # adds new link to a settings dropwdown
    /* args(1,2,3,4,5) 
        1 - title of the doc page (<title>My web app</title> or something like that)
        2 - title of the menu (which will be clicked by user when hovering on settings menu)
        3 - Permissions, capabilities (who will see this)
        4 - slug, shortname (we use it for end of an url)
        5 - function that outputs html content


        */

    add_options_page(
        "Word Count Settings",
        "Word Count",
        "manage_options",
        "word count settings page",
        "settingsPageHTML"
    );
}

function settingsPageHTML()
{ ?>
Hello from new plugin    
<?php }

?>