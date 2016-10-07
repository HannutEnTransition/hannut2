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
<div class="latestnews<?php echo $moduleclass_sfx; ?>" style="margin: 20px; margin-top: 0px; padding: 0px;">
	<div class="row-fluid" style="padding: 20px;padding-top: 0px">
		<h2>Calendrier</h2>
	</div>
	<?php 
		$nbe=0;
		$jour_semaine = array(1=>"lun", 2=>"mar", 3=>"mer", 4=>"jeu", 5=>"ven", 6=>"sam", 7=>"dim");
		$nom_mois = array(1=>"JANV", 2=>"FEVR", 3=>"MARS", 4=>"AVR", 5=>"MAI", 6=>"JUIN", 7=>"JUIL", 8=>"AOUT", 9=>"SEPT", 10=>"OCT", 11=>"NOV",12=>"DEC");
		$hier = mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
		
		$events = array();
		
		foreach ($list as $item) :  
			$attributes = json_decode($item->attribs);
			if (isset($attributes->event_date)) {
				if (trim($attributes->event_date) != '') {
						list($annee, $mois, $jour) = explode ("-",$attributes->event_date);
						$timestamp = mktime(0,0,0, date($mois), date($jour), date($annee));
						if ($timestamp >$hier){
							$events[$attributes->event_date]=$item;
							$nbe ++;
						}
				
				}
			}
		endforeach; 
		sort($events);
	?>	
		<?php
				if ($nbe == 0){
				echo "Le calendrier est vide.";
				}
		
		?>
		
		<?php foreach ($events as $item) :  ?>
		<div style="border-style: solid;border-width: 1px;margin: 5px;">
		<div class="row-fluid" style="margin: 15px;">
			<div class="col-sm9">
				<a href="<?php echo $item->link; ?>" itemprop="url" style="color:#05676e;" >
						<b><?php echo $item->title; ?></b>
				</a>
				 <?php $attributes = json_decode($item->attribs); 
					list($annee, $mois, $jour) = explode ("-",$attributes->event_date);
					$timestamp = mktime(0,0,0, date($mois), date($jour), date($annee));
					$njour = date("N",$timestamp);
				 ?>
				 <br>
				  <?php echo $attributes->event_place ?>
				 <br>
				  Le <?php echo $attributes->event_date ?>, 
				 <span> <?php echo $attributes->event_information ?></span>
			</div>
			<div class="col-sm-2">
			 <div class="blockvert text-center">
			     <a href="<?php echo $item->link; ?>" itemprop="url" style="color:white" >
			        <?php echo $jour ?>  
					<br>
			        <b><?php echo $nom_mois[intval($mois)]; ?></b> 
					<br>
				    <?php echo $jour_semaine[$njour]; ?>
				</a>
			 </div>
			</div>
			<br>
		</div>
		<?php if (isset ($attributes->event_image)): ?>
		  <?php if (trim($attributes->event_image) != ''): ?>
			<div class="row-fluid" style="margin: 15px; ">
			 <div class="span11">
				<img src="<?php echo $attributes->event_image; ?>"  alt=""/>
			 </div>
			</div>
		 <?php endif; ?>
		<?php endif; ?>
		</div>
	<?php endforeach; ?>	
 
  </div>

