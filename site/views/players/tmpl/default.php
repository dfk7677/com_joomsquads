<?php
/**
 * @package Component JoomSquads for Joomla! 3.4
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
 * */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>

<table>
    <tr>
        <td width="12%">Nickname: </td><td width="25%"><?php echo $this->player->nickname; ?>
    </tr>
    <tr>
        <td>Real Name: </td><td><?php echo $this->player->first_name . ' ' . $this->player->last_name; ?></td>
    </tr>
</table>