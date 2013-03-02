<?php
/**
 * Joomla! component XmlForm
 *
 * @author      Yireo (http://www.yireo.com/)
 * @package     XmlForm
 * @copyright   Copyright (c) 2013 Yireo (http://www.yireo.com/)
 * @license     GNU Public License (GPL) version 3 (http://www.gnu.org/licenses/gpl-3.0.html)
 * @link        http://www.yireo.com/
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

// Get the form
$form = $this->form;
?>
<div class="xmlform xmlform<?php echo $this->params->get('pageclass_sfx') ?>">

<?php if(!empty($this->article)) : ?>
<h1><?php echo $this->article->title; ?></h1>
<hr/>
<?php echo $this->article->text; ?>
<?php else: ?>
<h1><?php echo $this->getTitle(); ?></h1>
<?php endif; ?>
<hr/>

<form id="<?php echo $this->getFormId(); ?>" action="<?php echo $this->getActionUrl(); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">

<?php foreach($form->getFieldsets() as $fieldset): ?>
<fieldset>
    <legend><?php echo $fieldset->label; ?></legend>
    <?php foreach($form->getFieldset($fieldset->name) as $field): ?>
        <div class="control-group">
            <?php echo $field->label; ?>
            <div class="controls">
                <?php echo $field->input; ?>
                <?php $description = (string)$field->description; ?>
                <?php if(!empty($description)) : ?><span class="help-block"><?php echo $description; ?></span><?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</fieldset>
<?php endforeach; ?>

<div class="actions">
    <button class="btn btn-primary" name="submit" type="submit"><span><?php echo JText::_('JSUBMIT'); ?></span></button> 
    <?php echo JText::_('JOR'); ?> 
    <a href="<?php echo JRoute::_('index.php'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
</div>

<?php echo JHtml::_('form.token'); ?>
</form>
</div>
