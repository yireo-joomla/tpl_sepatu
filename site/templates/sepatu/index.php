<?php
defined('_JEXEC') or die;

// Fetch the application
$app = JFactory::getApplication();

// Load jQuery
JHtml::_('jquery.framework');

// Load the template-helper
include_once 'helper.php';

// Google Fonts
$googleFonts = array('Titillium+Web', 'Oxygen');

// Custom variables
$urlAccount = JRoute::_('index.php?option=com_magebridge&view=root&request=customer/account');
$urlCart = JRoute::_('index.php?option=com_magebridge&view=root&request=checkout/cart');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <?php echo Sepatu::getGoogleFonts($googleFonts); ?>
    <?php echo Sepatu::getStylesheets(); ?>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap.min.js"></script>
    <?php echo Sepatu::getScripts(); ?>
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
    
<?php if (Sepatu::countModules('top-a') || Sepatu::countModules('top-b')) : ?>
<div id="top-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <?php $positionPrefix = 'top-a'; include 'module_rows.php'; ?>
            <?php $positionPrefix = 'top-b'; include 'module_rows.php'; ?>
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

<?php if (Sepatu::countModules('top-c') || Sepatu::countModules('top-d')) : ?>
<div id="top-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <?php $positionPrefix = 'top-c'; include 'module_rows.php'; ?>
            <?php $positionPrefix = 'top-d'; include 'module_rows.php'; ?>
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

            <?php $positionPrefix = 'content-a'; include 'module_rows.php'; ?>
            <?php $positionPrefix = 'content-b'; include 'module_rows.php'; ?>
            <?php $positionPrefix = 'content-c'; include 'module_rows.php'; ?>
            <?php $positionPrefix = 'content-d'; include 'module_rows.php'; ?>

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

<?php if (Sepatu::countModules('bottom-a') || Sepatu::countModules('bottom-b')) : ?>
<div id="bottom-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <?php $positionPrefix = 'bottom-a'; include 'module_rows.php'; ?>
            <?php $positionPrefix = 'bottom-b'; include 'module_rows.php'; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (Sepatu::countModules('bottomcontent-a') || Sepatu::countModules('bottomcontent-b')) : ?>
<div id="bottomcontent-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <?php $positionPrefix = 'bottomcontent-a'; include 'module_rows.php'; ?>
            <?php $positionPrefix = 'bottomcontent-b'; include 'module_rows.php'; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (Sepatu::countModules('footer-a') || Sepatu::countModules('footer-b')) : ?>
<div id="footer-wrapper" class="container-fluid container-body">
    <div class="row-fluid">
        <div class="span12">
            <?php $positionPrefix = 'footer-a'; include 'module_rows.php'; ?>
            <?php $positionPrefix = 'footer-b'; include 'module_rows.php'; ?>
        </div>
    </div>
</div>
<?php endif; ?>
    
</body>
</html>
