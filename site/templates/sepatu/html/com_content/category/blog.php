<?php
/**
 * @package        Joomla.Site
 * @subpackage    com_content
 * @copyright    Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');
?>

<div class="blog<?php echo $this->pageclass_sfx;?> row-fluid">

    <?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
    <div class="category-desc">
        <?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
        <img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
        <?php endif; ?>
        <?php if ($this->params->get('show_description') && $this->category->description) : ?>
        <?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
        <?php endif; ?>
        <div class="clr"></div>
    </div>
    <?php endif; ?>

    <?php $leadingcount=0 ; ?>
    <?php if (!empty($this->lead_items)) : ?>
    <div class="items-leading row-fluid">
        <?php foreach ($this->lead_items as &$item) : ?>
        <div class="item-leading leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
            <?php
                    $this->item = &$item;
                    echo $this->loadTemplate('item');
                ?>
        </div>
        <?php
                $leadingcount++;
            ?>
        <?php endforeach; ?>
        <span class="row-separator"></span>
    </div>
    <?php endif; ?>

    <?php
    $introcount = (count($this->intro_items));
    $counter = 1;
    ?>
    <?php if (!empty($this->intro_items)) : ?>
        <div class="items-row row-fluid">
        <?php foreach ($this->intro_items as $key => &$item) : ?>
            <?php 
            $key= ($key-$leadingcount)+1;
            $rowcount=( ((int)$key-1) %    (int) $this->columns) +1;
            $row = $counter / $this->columns ;
            ?>
    
            <?php if ($counter == 1 || $counter == floor($introcount / 2) + 2) : ?><div class="span6"><?php endif; ?>

            <div class="item item<?php echo $counter; ?>">
                <?php
               $this->item = &$item;
               echo $this->loadTemplate('item');
               ?>
            </div>

            <?php if ($counter == floor($introcount / 2) + 1 || $counter == $introcount) : ?></div><?php endif; ?>
            <?php $counter++; ?>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>
