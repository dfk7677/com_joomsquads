<?php
/**
 * @package Component JoomSquads for Joomla!
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
 * */
// No direct access to this file
defined ( '_JEXEC' ) or die ( 'Restricted access' );

/*
 * JHtml::_('jquery.framework');
 * JHtml::_('script', '/media/com_joomsquads/js/squads.js');
 * JHtml::_('stylesheet', '/media/com_joomsquads/css/squads.css');
 */
?>

<div class="achievements-container">
	
    <?php if (!empty($this->items)) : ?>
    	<table style="width: 100%;">
		<tr>
			<th style="width: 10%;">Place</th>
			<th style="width: 30%;">Squad</th>
			<th style="width: 20%;">Date</th>
			<th style="width: 40%;">Competition</th>
		</tr>
        <?php
					foreach ( $this->items as $i => $row ) :
						
						?>
           
		<tr>
			<td><img
				src="<?php echo JURI::base()."/media/com_joomsquads/images/".$row->place; ?>.png" /></td>
			<td><?php echo $row->squad; ?></td>
			<td><?php echo date_format(date_create($row->date_won),"M Y"); ?></td>
			<td><a target="_blank" href="<?php echo $row->competition_url; ?>"><?php echo $row->competition; ?></a></td>
		</tr>
        <?php endforeach; ?>
        </table>
    <?php endif;?>
    </div>

