<?php
/**
 * Plugin Name: WordPress Export posts to JSON
 * Plugin URI: https://adamprocter.co.uk
 * Description: Export all WordPress posts
 * Author: Adam Procter 
 * Author URI: https://adamprocter.co.uk
 * Version: 2024-04-09.1
 **/

/*
 * Usage:
 *      1. Create a new page or post in your WordPress site.
 *      2. Add the shortcode [wordpress_export_to_json] to the page.
 *      3. Run the page.
 *      4. Check your "/wp-content" folder for a file "post-content.json".
 *      If the file did not create, try first creating a blank file "post-content.json"
 *      (your site may not have permission to create file in the directory, but it may be able to update).
 *
 *      You will now have a JSON formatted file with all the post content of your WordPress site.
 */

add_shortcode('wordpress_export_to_json', 'wordpress_export_to_json_handler');

/**
 * The main plugin handler. Processing starts here.
 */
function wordpress_export_to_json_handler($atts = [], $content = null)
{
    $results = [];

    echo "<p>Starting export to JSON.</p>";

    //-- Posts
    $posts = get_posts_by_type("post", "publish");
    $results = extract_post_content($posts);

    //-- Convert the results array to JSON string.
    $json = wp_json_encode($results);

    //-- Write to /wp-content/post_content.json
    write_to_json_file($json, 'post-content.json');

    echo "<p>Export to JSON complete.</p>";
}

function get_posts_by_type($post_type, $post_status = '')
{
    $args = array(
        'post_type'         => $post_type,
        'orderby'           => 'ID',
        'post_status'       => $post_status,
        'order'             => 'DESC',
        'posts_per_page'    => -1 // this will retrive all the post that is published 
    );
    $query_results = new \WP_Query( $args );

    $posts = $query_results->posts;

    return $posts;
}

/**
 * Helper function. Extracts only post content from posts.
 * 
 * @param array $posts Array of posts to extract content from.
 * 
 * @return array Array of post content.
 */
function extract_post_content($posts)
{
    $result = [];

    foreach ($posts as $post)
    {
        $post_content = strip_tags($post->post_content); // Remove HTML tags
        $post_content = trim(preg_replace('/\s+/', ' ', $post_content)); // Remove extra whitespace
        $result[] = $post_content;
    }

    return $result;
}

/**
 * Write the JSON data to a file in the wp-content directory.
 * File will be created if it does not exist.
 * Content will be replaced if the file already exists.
 * 
 * @param string $json The JSON formatted string to write into the file.
 * @param string $filename The name of the file to write the JSON data to.
 * 
 * @return void
 */
function write_to_json_file($json, $filename)
{
    $myfile = fopen(WP_CONTENT_DIR . "/" . $filename, "w+");

    fwrite($myfile, $json);
    fclose($myfile);
}
?>
