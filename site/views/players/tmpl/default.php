<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_jesport
 *
 * @copyright   Copyleft 2015 dfk_7677
 * @license     GNU General Public License version 3
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>

<table>
<tr>
<td width="12%">Nickname: </td><td width="25%"><?php echo $this->player->nickname; ?>
</tr>
<tr>
<td>Real Name: </td><td><?php echo $this->player->first_name.' '.$this->player->last_name; ?></td>
</tr>
</table>