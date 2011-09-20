=== Dynamic Image Resizer ===
Contributors: Otto42
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=otto%40ottodestruct%2ecom
Tags: dynamic, image, resizer, uploader, jpg, png, gif, photo
Requires at least: 3.2
Tested up to: 3.2.1
Stable tag: trunk

Make your images change sizes dynamically.

== Description ==

Normally when you upload an image to a WordPress site, it creates several differently sized versions of the image automatically. Themes can define custom image sizes as well, increasing the amount of images generated on your server.

This plugin changes the way WordPress creates images to make it generate the images only when they are actually used somewhere, on the fly. Images created thusly will be saved in the normal upload directories, for later fast sending by the webserver. The result is that space is saved (since images are only created when needed), and uploading images is much faster (since it's not generating the images on upload anymore).

"Pretty" permalinks must be enabled for this plugin to function.

Note: This plugin does not work on multisite setups, due to the way WordPress handles file serving in such situations (with ms-files.php).


Want regular updates? Become a fan of my sites on Facebook!
http://www.facebook.com/apps/application.php?id=116002660893
http://www.facebook.com/ottopress

Or follow my sites on Twitter!
http://twitter.com/ottodestruct

== Installation ==

1. Upload plugin to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. There is no configuration screen.

== Frequently Asked Questions ==

= How does this work? =

This plugin does two main things.

First, it sidesteps the part of WordPress that causes the resized images to be generated, and simply tells the WordPress functions that the images already were generated. 

Secondly, it hooks into the normal WordPress 404 handler. When a request is made for an image that is not on the server, the normal WordPress permalink rules will apply and WordPress will be triggered into action. It would normally serve up a 404 page, however the plugin intercepts that and checks to see if a call for an image is being made. If so, and it can find the original image, then it resizes the image, saves it, and serves it back to the browser instead of the 404 page.

In order to do this, it changes the image naming system a little bit. Resized images are normally renamed using a style of "image-123x456.jpg", where the numbers are the width and the height. This remains the case, however a new option is added. For cropped images, the plugin denotes this with the letter "c" at the end of the image filename. This allows the plugin to determine the width, height, and whether to use cropping or not just from the filename, and to create the proper image size.

= I changed themes, but my images stayed the same size. =

This plugin doesn't automagically adjust to new themes and new sizing. The image sizes are specified in the filenames, so all the images in your posts content will still be sized at the same sizes they were before. 

However, if new sizes are defined by the new theme, and those filenames get generated and requested by that theme, the plugin will generate the new sizes as they are retrieved. So while it can't correct all cases, it can correct some of them.

= What about old images lying around? =

The plugin doesn't clean up old images. If old image sizes are left behind and unused after changes, you'll have to manually clean them up. One way is simply to delete all the resized images (not the originals) and let images get regenerated when they get used the next time.

== Changelog ==

= 1.0 = 
* Initial Release

