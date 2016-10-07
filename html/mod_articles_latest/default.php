<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="latestnews<?php echo $moduleclass_sfx; ?>">
	<div class="row">
		<h2 style="margin: 20px;">Derniers articles</h2>
	</div>
  	<?php foreach ($list as $item) :  ?>
	 
	    <?php $images = json_decode($item->images);
			      if (isset($images->image_intro) && !empty($images->image_intro)) {
					 $image = json_decode($item->images)->image_intro; 
				  } else {
					  $image = "/joomla/images/hannut/no_image.jpg";
				  }
				  
				  $caracters = 100;
				  $titlelen = strlen ($item->title );
				  if ($titlelen > 50){
					  $caracters = 75;
				  }
				  
	    ?>
		<div class="row" style="padding-bottom:10px;">
		<a href="<?php echo $item->link; ?>" itemprop="url" style="color:#05676e;" >
						<b><?php echo $item->title; ?></b>
					</a>
		</div>
		<div class="clearfix"></div>
		<div class="row" style="padding-bottom:15px;">
			<div class="col-sm-4" style="padding:0; margin:0;">
				<a  href="<?php echo $item->link; ?>" itemprop="url">
					<img src="<?php echo $image; ?>" class="img-fluid" alt="<?php echo $item->title; ?>" style="max-width: 100%;height: auto;" />
				</a>
			</div>
			<div class="col-sm-8" style="padding:0; margin:0;">
				
				<p><?php echo  $item->introtext; ?></p>
			</div>
			<br>
		</div>
		<div class="clearfix"></div>
	<?php endforeach; ?>		
  </div>

