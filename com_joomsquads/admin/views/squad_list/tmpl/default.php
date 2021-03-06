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
?>

<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
    <form action="index.php?option=com_joomsquads&view=squad_list" method="post" id="adminForm" name="adminForm">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th width="1%"><?php echo JText::_('COM_JOOMSQUADS_NUM'); ?></th>
                    <th width="2%">
                        <?php echo JHtml::_('grid.checkall'); ?>
                    </th>
                    <th width="2%">
                        <?php echo JText::_('COM_JOOMSQUADS_ID'); ?>
                    </th>
                    <th width="50%">
                        <?php echo JText::_('COM_JOOMSQUADS_SQUAD_NAME'); ?>
                    </th>
                    <th width="30%">
                        <?php echo JText::_('COM_JOOMSQUADS_SQUAD_SHORT_NAME'); ?>
                    </th>
                    <th width="30%">
                        <?php echo JText::_('COM_JOOMSQUADS_PUBLISHED'); ?>
                    </th>
                    <th width="5%">
                        <?php echo JText::_('COM_JOOMSQUADS_ORDERING'); ?>
                    </th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <?php echo $this->pagination->getListFooter(); ?>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php if (!empty($this->items)) : ?>
                    <?php
                    foreach ($this->items as $i => $row) :
                        $link = JRoute::_('index.php?option=com_joomsquads&task=squad.edit&id=' . $row->id);
                        ?>
                        <tr>
                            <td><?php echo $this->pagination->getRowOffset($i); ?></td>
                            <td>
                                <?php echo JHtml::_('grid.id', $i, $row->id); ?>
                            </td>
                            <td align="center">
                                <?php echo $row->id; ?>
                            </td>

                            <td >
                                <a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_JOOMSQUADS_EDIT_SQUAD'); ?>">
                                    <?php echo $row->name; ?>
                                </a>
                            </td>
                            <td align="center">
                                <?php echo $row->short_name; ?>
                            </td>
                            <td align="center">
                                <?php echo JHtml::_('jgrid.published', $row->published, $i, 'squad_list.'); ?>
                            </td>
                            <td align="center">
                                <?php echo $row->ordering; ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="boxchecked" value="0"/>
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>