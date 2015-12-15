<?php
/**
 * @package Component JoomSquads for Joomla! 
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
 * */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

//JHtml::_('jquery.framework');
//JHtml::_('script', '/media/com_joomsquads/js/squads.js');
//JHtml::_('stylesheet', '/media/com_joomsquads/css/players.css');

?>


<div class="players-container">
<?php if (!empty($this->items)) : ?>
        <?php
        
        foreach ($this->items as $i => $row) :  ?>

<div class="player-container">
    <div class="player-image"><img class="img-responsive" src="<?php echo $row->image; ?>" />
    </div>
    <div class="player-info">
    	
      		<span class="player-name"><?php echo $row->first_name." '<b>".$row->nickname."</b>' ".$row->last_name; ?></span><br>
      		<span class="player-position"><?php echo $row->position; ?></span>
        
    </div>
    
    
</div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>