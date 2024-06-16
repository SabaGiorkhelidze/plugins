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



# adds new link to a settings dropwdown
#    add_options_page
/* args(1,2,3,4,5) 
        1 - title of the doc page (<title>My web app</title> or something like that)
        2 - title of the menu (which will be clicked by user when hovering on settings menu)
        3 - Permissions, capabilities (who will see this)
        4 - slug, shortname (we use it for end of an url)
        5 - function that outputs html content
*/

class WordCountAndTimePlugin
{
    function __construct()
    {
        add_action('admin_menu', array($this, "AdminPagePluggin"));
        add_action("admin_init", array($this, 'settings'));
    }

    function settings()
    {
        add_settings_section("wordCountPluginSection", null, null, "word count settings page");
        // (section name, title of section, content on top of the section, page slug)

        add_settings_field(
            "wordCountPluginLocation", // 1. ID - unique identifier for the setting field
            "Display Location",        // 2. Title - label text displayed next to the field
            array($this, 'locationHTML'), // 3. Callback Function - method that outputs the field's HTML
            "word count settings page", // 4. Page - slug of the settings page where the field appears
            "wordCountPluginSection"   // 5. Section - ID of the section within the settings page
        );
        register_setting("wordCountPlugin", "wordCountPluginLocation", array("sanitize_callback" => "sanitize_text_field", "default" => '0'));
        /*
        args
        1 - name of group it belongs to
        2 - actual name for setting
        3 - values also includes default value if none is selected
        */
    }


    function locationHTML()
    { ?>
        <select name="wordCountPluginLocation">
            <option value="0">beginning of post</option>
            <option value="1">end of post</option>
        </select>
    <?php

    }

    function AdminPagePluggin()
    {
        add_options_page(
            "Word Count Settings",
            "Word Count",
            "manage_options",
            "word count settings page",
            array($this, "PageHTML")
        );
    }

    function PageHTML()
    { ?>
        <div class="wrap">
            <h1>Word Count Settings</h1>
            <form action="options.php" method="POST">
                <?php 
                settings_fields("wordCountPlugin");
                    do_settings_sections('word count settings page');
                    submit_button();
                ?>
            </form>
        </div>
<?php }
}


$WordCountAndTimePlugin = new WordCountAndTimePlugin();


?>