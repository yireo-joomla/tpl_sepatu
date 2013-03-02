<?php

/**
 * @package		Joomla.Site
 * @subpackage	com_weblinks
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$class = ' class="first"';
if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
?>

<ul class="unstyled">
	<?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
	<?php
	if($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
	?>
	<li<?php echo $class; ?>>
		<?php $class = ''; ?>
		<h3 class="item-title"><?php echo $this->escape($item->title); ?></h3>
		<?php if ($this->params->get('show_subcat_desc_cat') == 1) :?>
		<?php if ($item->description) : ?>
		<div class="category-desc"> <?php echo JHtml::_('content.prepare', $item->description, '', 'com_weblinks.categories'); ?> </div>
		<?php endif; ?>
		<?php endif; ?>
        <?php 
        $db = JFactory::getDBO();
        $query = 'SELECT * FROM `#__weblinks` WHERE `catid` = '.$item->id.' AND `state` = 1 ORDER BY `ordering`';
        $db->setQuery($query);
        $weblinks = $db->loadObjectList();
        ?>
        <ul>
        <?php foreach($weblinks as $weblink): ?>
            <li><a href="<?php echo $weblink->url; ?>"><?php echo $weblink->title; ?></a></li> 
        <?php endforeach; ?>
        </ul>
	</li>
	
	<?php endif; ?>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
