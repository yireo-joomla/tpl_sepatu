<?php
defined('_JEXEC') or die;
?>
<?php if (Sepatu::countModules($positionPrefix)) : ?>
<div class="container-fluid" id="container-modules-<?php echo $positionPrefix; ?>">
    <div class="row-fluid">
        <?php $spanNumber = 12 / Sepatu::getPositionCount($positionPrefix); ?>
        <?php if($this->countModules($positionPrefix.'-1')) : ?>
        <div class="span<?php echo $spanNumber; ?>">
            <jdoc:include type="modules" name="<?php echo $positionPrefix; ?>-1" style="xhtml" />
        </div>
        <?php endif; ?>
        <?php if($this->countModules($positionPrefix.'-2')) : ?>
        <div class="span<?php echo $spanNumber; ?>">
            <jdoc:include type="modules" name="<?php echo $positionPrefix; ?>-2" style="xhtml" />
        </div>
        <?php endif; ?>
        <?php if($this->countModules($positionPrefix.'-3')) : ?>
        <div class="span<?php echo $spanNumber; ?>">
            <jdoc:include type="modules" name="<?php echo $positionPrefix; ?>-3" style="xhtml" />
        </div>
        <?php endif; ?>
        <?php if($this->countModules($positionPrefix.'-4')) : ?>
        <div class="span<?php echo $spanNumber; ?>">
            <jdoc:include type="modules" name="<?php echo $positionPrefix; ?>-4" style="xhtml" />
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
