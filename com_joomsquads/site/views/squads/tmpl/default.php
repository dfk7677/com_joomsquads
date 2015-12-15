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

/*JHtml::_('jquery.framework');
JHtml::_('script', '/media/com_joomsquads/js/squads.js');
JHtml::_('stylesheet', '/media/com_joomsquads/css/squads.css');*/
?>

<div class="squads-container">

    <?php if (!empty($this->items)) : ?>
        <?php
        foreach ($this->items as $i => $row) :
            $link = JRoute::_('index.php?option=com_joomsquads&view=players&id=' .
                    $row->id);
            ?>
            <div class="squad-container">
            <div class="squad-image"><a href="<?php echo $link ?>">
                    <img class="img-responsive" src="<?php echo $row->image; ?>" /></a></div>
<!--<div class="squad-title"><span><?php echo $row->name; ?></span></div>-->
</div>
        <?php endforeach; ?>
    <?php endif;?>
    </div>

