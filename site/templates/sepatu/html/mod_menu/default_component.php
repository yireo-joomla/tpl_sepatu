<?php
/**
 * @package        Joomla.Site
 * @subpackage    mod_menu
 * @copyright    Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? $item->anchor_css : '';
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';
if ($item->menu_image) {
    $item->params->get('menu_text', 1 ) ?
    $linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
    $linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';
} else { 
    $linktype = $item->title;
}

// Extra Bootstrap data
$extraData = '';
$bCaret = '';
$keepUrl = false;
if(preg_match('/dropdown/' , $class_sfx) && $item->deeper) {    
    $bCaret = '<b class="caret"></b>';
    $class .= ' dropdown-toggle';
    if($keepUrl) {
        $extraData = 'role="button" data-toggle="dropdown" data-target="#" id="item'.$item->id.'" ';
    } else {
        $extraData = 'data-toggle="dropdown" id="item'.$item->id.'" ';
        $item->flink = '#';
    }
}

switch ($item->browserNav) :
    default:
    case 0:
?><a <?php echo $extraData; ?> class="<?php echo trim($class); ?>" href="<?php echo $item->flink; ?>" <?php echo $title; ?>><?php echo $linktype; ?><?php echo $bCaret; ?></a><?php
        break;
    case 1:
        // _blank
?><a <?php echo $extraData; ?> class="<?php echo trim($class); ?>" href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?><?php echo $bCaret; ?></a><?php
        break;
    case 2:
    // window.open
?><a <?php echo $extraData; ?> class="<?php echo trim($class); ?>" href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?><?php echo $bCaret; ?></a>
<?php
    break;
endswitch;
