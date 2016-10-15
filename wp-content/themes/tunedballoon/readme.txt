= Tuned Balloon =

* by Anariel Design, http://www.anarieldesign.com

- this theme incorporates some part of the code from Twenty Eleven - Thirteen theme - attribution to Twenty Eleven - Twenty Thirteen theme made by the WordPress team,http://wordpress.org/themes/twentyeleven, http://wordpress.org/themes/twentythirteen
License: Distributed under the terms of the GNU GPL
Copyright: Automattic, automattic.com

Tuned Balloon is distributed under the terms of the GNU GPL - read more inside license files

Update December 7 2015.
- new soliloquy slider version, few code clearings
Update September 9 2015.
1. fix for the Deprecating PHP4 style constructors in WordPress 4.3
Update July 10 2015.
1. fix for widget call (from WordPress 4.3) inside the widgets folder - fix for all files Use parent::__construct() instead of $this->WP_Widget().
2. small fix for the favicon icon inside the header.php and header-custom.php files
Version 1.6 - October 31 2014.
1. changes inside “includes” folder-customizer.php - added missing sanitize callback
Version 1.5 - 12 October 2014.
Small fix for the Anariel Home Bio Widget if you are using it outside the middle column on the home page.
1. small fix inside the “widgets” folder - homebio.php file. 
Instead of:
<div class="lines special"> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> </div>

add this:
<div class="lines special one"> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> <span class="line type1"></span> <span class="line type2"></span> <span class="line type3"></span> <span class="line type4"></span> <span class="line type5"></span> </div>

2. changes inside the style.css file.
changes inside: 
.homewidgetbio{background:#cc653b url(images/rausch.png) repeat; padding:10px; margin-bottom:10px; color:#fff}
p.special{text-align:center; margin:23px 0 50px 0; border-top:2px dashed #f6d2ad; padding:25px 0 0 0; font-size:1.1em; font-weight:600; text-shaodow:0 0 1px #000} 

added:
.lines.special.one{margin-top:-10px}

Version 1.4 - 11 August 2014.
-small fix for the mobiles inside the style.css file:
instead of:
/* All Mobile Sizes (devices and browser) */
@media only screen and (max-width:767px){
.buttoncircle{ display:none;}
}
added this:
/* All Mobile Sizes (devices and browser) */
@media only screen and (max-width:767px){
.buttoncircle{ margin-top: 250px;}
}

Version 1.3 - 22 March 2014.
-added WooCommerce plugin support - changes inside functions.php and style.css file
- changes inside “includes” folder - removed custom-styles.php and added customizer.php file
Version 1.2 - 15 January 2014.
-small change inside Widgets folder - socials.php file
Version 1.1 - 29 September 2013.
-more colors and favicon image upload added to the theme customizer (changes inside functions.php file, folder includes and header.php file)
Version 1.0 - 1 September 2013.
-Tune Balloon release date