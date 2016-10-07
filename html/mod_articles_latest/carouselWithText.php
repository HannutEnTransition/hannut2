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
<div class="latestnews<?php echo $moduleclass_sfx; ?> ">
	<div id="myCarousel" class="carousel" data-ride="carousel">
		<!-- Indicators  	--> 
		<ol class="carousel-indicators" style="bottom:-30px;">
			<li data-target="#myCarousel" data-slide-to="0" class="active  " ></li>
			<?php 	for ($i = 0; $i < $nbItems; $i++) {  ?>
				 <li data-target="#myCarousel" data-slide-to="<?php echo $i ?>"   ></li> 
			<?php } ?>
		</ol>
	 
		<!-- Wrapper for slides -->
		<div class="carousel-inner" style="margin-bottom: 30px;">
		<?php 
		$status="active";
		foreach ($list as $item) :  ?>
			<?php $images = json_decode($item->images);
			      if (isset($images->image_intro) && !empty($images->image_intro)) {
					 $image = json_decode($item->images)->image_intro; 
				  } else {
					  $image = "/joomla/images/hannut/no_image.jpg";
				  }
		    ?>
	
			<div class="item <?php echo $status; ?>">
			<?php $status=""; ?>
				<div class="row">
					<div class="span3">
						<a href="<?php echo $item->link; ?>" itemprop="url">
							<img src="<?php echo $image; ?>" alt="" />
						</a>
					</div>
					<div class="span9">
						<h3><?php echo $item->title; ?></h3>
						<p><?php echo $item->introtext; ?></p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		
		<!-- Left and right controls --> 
		<a class="left carousel-control" href="#myCarousel" data-slide="prev" style="position: static;"> 
			<span class="sr-only pull-left" style="color: white; font-size: 14px;  border-radius: 15px;  background: #05676e; padding: 5px;">Précédent</span>
		</a> 
		<a class="right carousel-control" href="#myCarousel" data-slide="next" style="position: static;"> 
			<span class="sr-only pull-right" style="color: white; font-size: 14px;  border-radius: 15px;  background:#05676e;  background;padding:5px;">Suivant</span> 
		</a>		
	</div>
		
		
  </div>

