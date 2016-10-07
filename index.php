<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.hannut2
 *
 * @copyright   Copyright (C) 2016 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$app = JFactory::getApplication();


// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "col-sm-6";
}
elseif ($this->countModules('position-7') && !$this->countModules('position-8'))
{
	$span = "col-sm-9";
}
elseif (!$this->countModules('position-7') && $this->countModules('position-8'))
{
	$span = "col-sm-9";
}
else
{
	$span = "col-sm-12";
}

// Position 9 et 10
if ($this->countModules('position-9') && $this->countModules('position-10'))
{
	$span2 = "col-sm-6";
}elseif ($this->countModules('position-9') && !$this->countModules('position-10'))
{
	$span2 = "col-sm-12";
}elseif (!$this->countModules('position-9') && $this->countModules('position-10'))
{
	$span2 = "col-sm-12";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="" lang="" >
<head>
	<meta charset="utf-8">
	<jdoc:include type="head" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- More bootstrap files -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- Customs features -->
    <link rel="shortcut icon" href="http://www.hannutentransition.be/templates/hannut2/icon/favicon.ico"/>
	<link rel="stylesheet" href="<?php echo $this->baseurl . '/templates/' . $this->template . '/css/color.css' ?>">

</head>

<body>
<!-- Menu Connexion -->
 <div class="container">
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#connectNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="connectNavbar">
			<?php if ($this->countModules('position-4')) : ?> 
				<jdoc:include type="modules" name="position-4" style="none" />
			<?php endif; ?>
			<ul class="nav navbar-nav navbar-right">
				<li><jdoc:include type="modules" name="position-0" style="none" /></li>
			</ul>
		</div>
	</nav>
</div>

<!-- Menu Navigation -->
<div class="container">
	<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#surfNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="surfNavbar">
			<jdoc:include type="modules" name="position-1" style="none" />
		</div>
	</nav>
</div>

 <div class="container">
	<div class="row">
	<!-- Gauche -->
	<?php if ($this->countModules('position-8')) : ?>
		<!-- Begin Sidebar -->
		<div id="sidebar" class="col-sm-3">
			<div class="sidebar-nav">
				<jdoc:include type="modules" name="position-8" style="xhtml" />
			</div>
		</div>
		<!-- End Sidebar -->
	<?php endif; ?>
	
	<!-- Centre -->
		<main id="content" role="main" class="<?php echo $span; ?>">
		<!-- Begin Content -->
		<jdoc:include type="modules" name="position-3" style="xhtml" />
		<jdoc:include type="modules" name="position-5" style="xhtml" />
		<jdoc:include type="message" />
		<jdoc:include type="component" />
		<?php  if ($this->countModules('position-6') || $this->countModules('position-11')):  ?>
			<div class="row item-mod" style="padding: 20px;margin:0;overflow: auto;"> 
				<div class="col-sm-6"> 
					<jdoc:include type="modules" name="position-6" />
				</div>
				<div class="col-sm-6"> 
					<jdoc:include type="modules" name="position-11" />
				</div>
			</div>
			<div class="clearfix"></div>
		<?php endif; ?>
					
		<?php  if ($this->countModules('position-12') || $this->countModules('position-13')):  ?>
			<div class="row">
				<div class="col-sm-6"> 
					<jdoc:include type="modules" name="position-12"  />
				</div>
				<div class="col-sm-6"> 
					<jdoc:include type="modules" name="position-13" />
				</div>   
			</div>
			<div class="clearfix"></div>
		<?php endif; ?> 
					
		<jdoc:include type="modules" name="position-2" />
		
		<div class="row">

			<?php if ($this->countModules('position-9')) : ?>
				<div class="<?php echo $span2; ?>">
					<jdoc:include type="modules" name="position-9" style="xhtml" />
				</div>
			<?php endif; ?>
			<?php if ($this->countModules('position-10')) : ?>
				<div class="<?php echo $span2; ?>">
					<jdoc:include type="modules" name="position-10" style="xhtml" />
				</div>   
			<?php endif; ?>
		</div>
		
		<div class="clearfix"></div> 
		<!-- End Content -->
		</main>
				
	<!-- Droite -->
	<?php if ($this->countModules('position-7')) : ?>
		<!-- Begin Right Sidebar -->
		<div id="aside" class="col-sm-3">		 
			<jdoc:include type="modules" name="position-7" style="well" />		 
		</div>
		<!-- End Right Sidebar -->
	<?php endif; ?>
	</div>
   
</div>
</body>
</html>

