<?php
/**
 * @package Component JoomSquads for Joomla! 3.4
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
 * */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
JHtml::_('behavior.formvalidator');
?>



<div id="j-main-container" class="span10">
    <form action="<?php echo JRoute::_('index.php?option=com_joomsquads&view=application&layout=edit&id=' . (int) $this->item->id); ?>"
          method="post" name="adminForm" id="adminForm" class="form-validate">
        <div class="form-horizontal">
            <fieldset class="adminform">
                <legend><?php echo JText::_('COM_JOOMSQUADS_APPLICATION_DETAILS'); ?></legend>
                <div class="row-fluid">
                    <div class="span6">
                        <?php foreach ($this->form->getFieldset() as $field): ?>
                            <div class="control-group">
                                <div class="control-label"><?php echo $field->label; ?></div>
                                <div class="controls"><?php echo $field->input; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </fieldset>
        </div>
        <input type="hidden" name="task" value="application.edit" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>

