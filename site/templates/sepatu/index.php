<?php
/**
 * Joomla! template Sepatu
 *
 * @author Yireo (info@yireo.com)
 * @copyright Copyright 2013
 * @license GNU Public License
 * @link http://www.yireo.com
 */

defined('_JEXEC') or die;

// Fetch the application
$app = JFactory::getApplication();

// Load jQuery
JHtml::_('jquery.framework');

// Load the template-helper
include_once 'helper.php';
$helper = new SepatuTemplateHelper($this->params);

// Google Fonts
$googleFonts = array('Titillium+Web', 'Oxygen');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <?php echo $helper->getGoogleFonts($googleFonts); ?>
    <?php echo $helper->getStylesheets(); ?>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap.min.js"></script>
    <?php echo $helper->getScripts(); ?>
</head>
<body>

<?php if($this->countModules('mainmenu or logo')) : ?>
<div id="menubar-wrapper" class="container-fluid container-body">
    <div id="container-menubar">
        <div class="row-fluid">
            <div class="span12">
                <div style="float:right">
                    <jdoc:include type="modules" name="mainmenu" style="none" />
                </div>
                <h1 class="sitename"><?php echo $app->getCfg('sitename'); ?></h1>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
    
<?php if ($helper->countModules('top-a') || $helper->countModules('top-b')) : ?>
<div id="top-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <?php $positionPrefix = 'top-a'; include 'layout/module_rows.php'; ?>
            <?php $positionPrefix = 'top-b'; include 'layout/module_rows.php'; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($this->countModules('top-hero')) : ?>
<div id="top-hero-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="hero-unit">
                            <jdoc:include type="modules" name="top-hero" style="none" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($helper->countModules('top-c') || $helper->countModules('top-d')) : ?>
<div id="top-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <?php $positionPrefix = 'top-c'; include 'layout/module_rows.php'; ?>
            <?php $positionPrefix = 'top-d'; include 'layout/module_rows.php'; ?>
        </div>
    </div>
</div>
<?php endif; ?>


<div id="content-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <?php if ($this->countModules('content-hero')) : ?>
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="hero-unit">
                            <jdoc:include type="modules" name="content-hero" style="none" />
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php $positionPrefix = 'content-a'; include 'layout/module_rows.php'; ?>
            <?php $positionPrefix = 'content-b'; include 'layout/module_rows.php'; ?>
            <?php $positionPrefix = 'content-c'; include 'layout/module_rows.php'; ?>
            <?php $positionPrefix = 'content-d'; include 'layout/module_rows.php'; ?>

            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <jdoc:include type="component" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($helper->countModules('bottom-a') || $helper->countModules('bottom-b')) : ?>
<div id="bottom-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <?php $positionPrefix = 'bottom-a'; include 'layout/module_rows.php'; ?>
            <?php $positionPrefix = 'bottom-b'; include 'layout/module_rows.php'; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($helper->countModules('bottomcontent-a') || $helper->countModules('bottomcontent-b')) : ?>
<div id="bottomcontent-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <?php $positionPrefix = 'bottomcontent-a'; include 'layout/module_rows.php'; ?>
            <?php $positionPrefix = 'bottomcontent-b'; include 'layout/module_rows.php'; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($helper->countModules('footer-a') || $helper->countModules('footer-b')) : ?>
<div id="footer-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <?php $positionPrefix = 'footer-a'; include 'layout/module_rows.php'; ?>
            <?php $positionPrefix = 'footer-b'; include 'layout/module_rows.php'; ?>
        </div>
    </div>
</div>
<?php endif; ?>
    
</body>
</html>
