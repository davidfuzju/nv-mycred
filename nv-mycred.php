<?php

/**
 * Plugin Name: NV MyCred
 * Description: A plugin to handle different cases using a shortcode and var parameter.
 * Version: 1.0
 * Author: Your Name
 */

// Make sure the plugin is not accessed directly
if (!defined("ABSPATH")) {
  exit();
}

// Register a shortcode
function nv_mycred_shortcode($atts)
{
  // Extract attributes and define defaults
  $atts = shortcode_atts(
    [
      "var" => "", // Default value for var is an empty string
    ],
    $atts,
    "nv_mycred"
  );

  // Based on the 'var' value, execute different logic
  switch ($atts["var"]) {
    case "display_credit_per_product":
      if (!is_product()) {
        error_log(
          "nv-mycred shortcode should be used in a single product page"
        );
        return "";
      }

      $product = wc_get_product(get_the_ID());

      if (!$product->is_type("simple")) {
        error_log(
          "nv-mycred shortcode should be used in a product type 'simple'"
        );
        return "";
      }

      if (!function_exists('mycred_get_point_type_name')) {
        error_log('mycred_get_point_type_name is not defined. Please make sure to include the mycred plugin.');
        return "";
      }

      $mycred_rewards = get_post_meta(get_the_ID(), "mycred_reward", true);

      // Use array_filter to find the 'nvc' point type rewards
      $nvc_rewards = array_filter(
        $mycred_rewards,
        function ($mycred_reward_value, $mycred_reward_key) {
          // Return true if the point type name is 'nvc', filtering those elements
          return $mycred_reward_key == "nvc";
        },
        ARRAY_FILTER_USE_BOTH
      );

      // Ensure there are items in $nvc_rewards
      if (empty($nvc_rewards)) {
        error_log('No NVC rewards found.');
        return '';
      }

      // Get the first element from the filtered array
      $mycred_reward_key = array_key_first($nvc_rewards); // Get the first key
      $mycred_reward_value = $nvc_rewards[$mycred_reward_key]; // Get the corresponding value

      $is_plural_reward = $mycred_reward_value < 2;

      // Get the point type name
      $mycred_point_type_name = mycred_get_point_type_name(
        $mycred_reward_key,
        $is_plural_reward
      );

      // Combine the key and value into a string
      $result_string = "{$mycred_reward_value} {$mycred_point_type_name}";

      // Output the result
      return $result_string;
    default:
      return "No valid case selected.";
  }
}

// Register the shortcode
add_shortcode("nv_mycred", "nv_mycred_shortcode");
