<?php
/**
 *  @package AkeebaSubs
 *  @copyright Copyright (c)2010-2012 Nicholas K. Dionysopoulos
 *  @license GNU General Public License version 3, or later
 */

defined('_JEXEC') or die();

$this->loadHelper('message');
require_once JPATH_ADMINISTRATOR.'/components/com_akeebasubs/helpers/image.php';

if(preg_match('/^([^\(]+)\(([^\)]+)\)/', $this->item->title, $match)) {
    $short_title = $match[2];
} else {
    $short_title = $this->item->title;
}
?>

<table class="table packages">
    <tbody>
        <tr>
            <td class="package"><?php echo $this->escape($short_title) ?></td>
            <td class="price">&euro; <?php echo number_format($this->item->price, 2) ?></td>
            <td class="description"><?php echo $this->escape($this->item->description) ?></td>
        </tr>
    </tbody>
</table>

