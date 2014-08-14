<?php
/**
 * Right Meow!
 *
 * Comment substitution using Super Troopers "Cat Game" in WordPress comments.
 * Your user comments will be filtered such that the "now"s will become "meow"s.
 *
 * Don't wait, activate right meow!
 *
 * @package   Right Meow!
 * @author    tleen <tl@thomasleen.com>
 * @license   GPL2
 * @link      https://github.com/tleen/wp-right-meow
 * @copyright 2014 Tom Leen
 *
 * @wordpress-plugin
 * Plugin Name:       Right Meow!
 * Plugin URI:        https://github.com/tleen/wp-right-meow
 * Description:       Comment substitution using Super Troopers "Cat Game" in WordPress comments. Don't wait, activate right meow!
 * Version:           1.0.3
 * Author:            tleen
 * Author URI:        http://www.thomasleen.com
 * License:           GPL2
 * License URI:       https://github.com/tleen/wp-right-meow/blob/master/LICENSE
 * GitHub Plugin URI: https://github.com/tleen/wp-right-meow
 * WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}


function wp_right_meow_substitute($text){
// interesting problem, replace without losing case
// will replace only explicit matching cases, then use a generic /i search+r for the rest
  foreach(array(
    'now' => 'meow',
    'NOW' => 'MEOW',
    'Now' => 'Meow'
  ) as $key => $value){
    $text = preg_replace('/\b' . $key . '\b/', $value, $text);
  }

  // replace any nows (nOw, nOW, etc..) left with a lowercase meow
  $text = preg_replace('/\bnow\b/i', 'meow', $text);

  return $text;
}


add_filter('comment_text', 'wp_right_meow_substitute');
