<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();
?>
<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search');?>" method="post">

	<div class="btn-toolbar">
		<div class="btn-group pull-left">
			<div class="input-group">
			<input type="text" name="searchword" placeholder="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="inputbox form-control" />
				<div class="input-group-addon"><button type="submit"><i class="glyphicon glyphicon-search"></i></button></div>
			</div>
		</div>
<!--		<div class="btn-group pull-left">-->
<!--			<button name="Search" onclick="this.form.submit()" class="btn hasTooltip" title="--><?php //echo JHtml::tooltipText('COM_SEARCH_SEARCH');?><!--"><span class="icon-search"></span>--><?php //echo JText::_('JSEARCH_FILTER_SUBMIT'); ?><!--</button>-->
<!--		</div>-->
		<input type="hidden" name="task" value="search" />
		<div class="clearfix"></div>

	</div>
	<div class="searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
		<?php if (!empty($this->searchword)):?>
			<p class="<?php echo $this->total ? 'info':'error';?>"><?php echo JText::plural('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', '<span class="badge badge-info">' . $this->total . '</span>');?></p>
		<?php endif;?>
	</div>


	<?php if ($this->params->get('search_phrases', 1)) : ?>
		<fieldset class="phrases form-inline col-md-6">
			<legend><?php echo JText::_('COM_SEARCH_FOR');?>
			</legend>
				<div class="phrases-box">
					<?php
					$this->lists['searchphrase'] = preg_replace('#(<label)#','<div class="form-group radio">$1',$this->lists['searchphrase']);
					$this->lists['searchphrase'] = preg_replace('#(/label>)#','$1</div>',$this->lists['searchphrase']);
					?>
				<?php echo $this->lists['searchphrase']; ?>
				</div>

				<div class="form-group ordering-box">
				<label for="ordering" class="ordering">
					<?php echo JText::_('COM_SEARCH_ORDERING');?>
				</label>
				<?php
					$this->lists['ordering'] = preg_replace('#(inputbox)#','$1 form-control',$this->lists['ordering']);
				echo $this->lists['ordering'];?>
				</div>
		</fieldset>
	<?php endif; ?>
	<div class="col-md-6 form-inline">
	<?php if ($this->params->get('search_areas', 1)) : ?>
		<fieldset class="only">
			<legend><?php echo JText::_('COM_SEARCH_SEARCH_ONLY');?></legend>
			<?php foreach ($this->searchareas['search'] as $val => $txt) :
				$checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
			?>
				<div class="form-group">
			<label for="area-<?php echo $val;?>" class="checkbox">
				<input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area-<?php echo $val;?>" <?php echo $checked;?> >
				<?php echo JText::_($txt); ?>
			</label>
				</div>
			<?php endforeach; ?>
		</fieldset>
	<?php endif; ?>

<?php if ($this->total > 0) : ?>

	<div class="form-limit">
		<label for="limit">
			<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
		</label>
		<?php
			$limitBox = preg_replace('#(inputbox)#','$1 form-control',$this->pagination->getLimitBox());

			echo $limitBox;
		?>
	</div>
<p class="counter">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>

<?php endif; ?>
	</div>
	<div class="clear"></div>
	<div class="form-group text-center">
		<button type="submit" class="btn btn-primary pull-right">Actualiser</button>
	</div>
</form>
