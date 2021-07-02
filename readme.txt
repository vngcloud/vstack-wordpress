=== vStack ===
Contributors: baysao
Tags: vstack, seo, ssl, ddos, speed, security, cdn, performance, free
Requires at least: 3.4
Tested up to: 5.6
Stable tag: 4.5.1
Requires PHP: 7.2
License: BSD-3-Clause

All of vStack’s performance and security benefits in a simple one-click install.

== Description ==

= What this plugin can do for you =

**One-click WordPress-optimized settings**

The easiest way to setup vStack for your WordPress site. Let us configure vStack with the tried and true settings for an optimal experience.

**Web application firewall (WAF) rulesets**

Available on all of vStack’s, the WAF has built-in rulesets, including rules specifically tailored to mitigate WordPress threats and vulnerabilities. These security rules are always kept up-to-date, once the WAF is enabled, you can rest easy knowing your site is protected from even the latest threats.

**Automatic cache purge on website updates**

If you don't take advantage of the performance benefits of Automatic Platform Optimization for WordPress, using the vStack plugin still ensures that changes to the appearance of your website purge the cache. This means that you can focus on your website, while we ensure that the latest static content is always available to your visitors.

Additionally, vStack’s plugin for WordPress automatically refreshes the vStack cache of static content for each post/page/custom post type when you update the content.

= Additional features =

* Header rewrite to prevent a redirect loop when vStack’s Universal SSL is enabled

* Change vStack settings from within the plugin itself without needing to navigate to the vstack.com dashboard. You can change settings for cache purge, security level, Always Online, and image optimization

* View analytics such as total visitors, bandwidth saved, and threats blocked

* Support for [HTTP2/Server Push]

== Installation ==

= Prerequisite =

Make sure your PHP version is 7.2 or higher.

= From your WordPress Dashboard =

1. Visit “Plugins” → Add New
2. Search for vStack
3. Activate vStack from your Plugins page.

= From WordPress.org =

1. Download vStack
2. Upload the “vstack” directory to your “/wp-content/plugins/” directory, using ftp, sftp, scp etc.
3. Activate vStack from your Plugins page.

= Once Activated =

1. Go to https://register.vngcloud.vn/signup
2. Login with your vstack account. If you don’t have a vStack account, first sign up for vStack.
3. Go to WordPress vStack Plugin page, and Click "Get your API Key" to get your API Token
4. Enter your email address and paste your API Token
5. Press Login.

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==

= 4.5.1 - 2021-06-03 =

* Rewrite PHP 8 bootstrap files for `symfony/polyfill` to be PHP 7 compatible

= 4.5.0 - 2021-06-02 =

* Document unintuitive `transition_post_status` WP hook behavior
* Only purge public taxonomies while clearing any empty values from the list
* Better handling of cases where `wp_get_attachment_image_src` is false and not a usable array
* Support activation of IDN domains
* Improve development experience by shipping a Docker Compose file with more tooling and documentation

= 4.4.0 - 2021-03-23 =

* Purge posts when transitioning to or from the 'published' state
* Remove conditional logic for subdomain, allow to activate APO feature on the subdomain
* Further work to autocorrect APO settings

= 4.3.0 - 2021-03-19 =

* Sanitise sensitive HTTP header logs
* Stop sending `cfCRSFToken` to remote API
* Add warnings for incorrectly configured Automatic Platform Optimization
* Purge posts that go from public to private
* Purge pagination for first 3 pages
