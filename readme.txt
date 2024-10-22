=== NV MyCred ===
Contributors: David FU
Tags: mycred, shortcode, WooCommerce, rewards, points
Requires at least: 5.0
Tested up to: 6.0
Stable tag: 1.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A plugin that integrates with MyCred and WooCommerce to display MyCred points for a specific product using a shortcode.

== Description ==

The **NV MyCred** plugin adds a shortcode that displays MyCred rewards for simple WooCommerce products. It filters out MyCred point types that match the 'nvc' key and displays the amount of NVC rewards available for a product.

**Shortcode:**
- `[nv_mycred var="display_credit_per_product"]`: Use this shortcode on a single product page to display the available NVC points for that product.

**Key Features:**
- Displays MyCred rewards for simple products.
- Filters and displays rewards for the 'nvc' point type.
- Error logging for invalid usage (e.g., using on non-product pages or unsupported product types).

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/nv-mycred` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Make sure you have **WooCommerce** and **MyCred** plugins installed and activated.
4. Use the `[nv_mycred var="display_credit_per_product"]` shortcode on a product page to display the NVC rewards for that product.

== Frequently Asked Questions ==

= Can I use this plugin on variable or grouped products? =
No, this plugin is designed to work specifically with **simple WooCommerce products**.

= Why am I seeing the error "nv-mycred shortcode should be used in a single product page"? =
The shortcode should be used on a single product page in WooCommerce. Make sure you're using the shortcode on a valid WooCommerce product page.

= What does the shortcode `[nv_mycred var="display_credit_per_product"]` do? =
It retrieves and displays the **NVC rewards** for the product on which the shortcode is used.

== Changelog ==

= 1.0 =
* Initial release.
* Added support for displaying 'nvc' point type from MyCred for WooCommerce simple products.

== Upgrade Notice ==

= 1.0 =
Initial release of the plugin.

== License ==
This plugin is licensed under the GPLv2 or later. You can find the full license text here: http://www.gnu.org/licenses/gpl-2.0.html.