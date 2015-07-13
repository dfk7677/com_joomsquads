<?php
/**
 * @package Component JoomSquads for Joomla! 3.4
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
**/
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>

<table>
<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$link = JRoute::_('index.php?option=com_joomsquads&view=players&id=' . $row->id);
				?>
<tr>
<td width="12%">Name: </td><td width="25%"><?php echo $row->name; ?>
</tr>
<tr>
<td>Short Name: </td><td><?php echo $row->short_name; ?></td>
</tr>
<?php endforeach; ?>
			<?php endif; ?>
</table>

