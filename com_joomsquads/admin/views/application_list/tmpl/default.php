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

//JFormHelper::addFieldPath(JPATH_COMPONENT . '/models/fields');
//$squads = JFormHelper::loadFieldType('squads', false);
//$squadsOptions=$squads->getOptions(); 

?>

<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10 application-list">
    
        
    <form action="index.php?option=com_joomsquads&view=application_list" method="post" id="adminForm" name="adminForm">
 <!--       <fieldset id="filter-bar">
	 <div class="filter-select fltrt" style="float:right;">
           Select Squad: <select name="filter_squad_id" class="inputbox" onchange="this.form.submit()">
		<option value=""> All Players </option>
                    <?php echo JHtml::_('select.options', $squadsOptions,
                            'value', 'text', 
                            $this->state->get('filter.squad_id'));?>
			</select>
 
         </div>
        </fieldset><br>
 -->  
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="width: 1%;"><?php echo JText::_('COM_JOOMSQUADS_NUM'); ?></th>
                    <th style="width: 2%;">
                        <?php echo ' ' ?>
                    </th>
                    <th style="width: 2%;">
                        <?php echo JText::_('COM_JOOMSQUADS_ID'); ?>
                    </th>
                    <th style="width: 22%;">
                        <?php echo JText::_('COM_JOOMSQUADS_APPLICATION_NAME'); ?>
                    </th>
                    <th style="width: 15%;">
                        <?php echo JText::_('COM_JOOMSQUADS_APPLICATION_NICKNAME'); ?>
                    </th>
                    <th style="width: 8%;">
                        <?php echo JText::_('COM_JOOMSQUADS_APPLICATION_AGE'); ?>
                    </th>
                    <th style="width: 15%;">
                        <?php echo JText::_('COM_JOOMSQUADS_APPLICATION_SQUAD'); ?>
                    </th>
                    <th style="width: 10%;">
                        <?php echo JText::_('COM_JOOMSQUADS_APPLICATION_DATE_SENT'); ?>
                    </th>
                    <th style="width: 10%;">
                        <?php echo JText::_('COM_JOOMSQUADS_APPLICATION_DATE_REPLIED'); ?>
                    </th>
                    <th style="width: 15%;">
                        <?php echo JText::_('COM_JOOMSQUADS_APPLICATION_STATUS'); ?>
                    </th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="10">
                        <?php echo $this->pagination->getListFooter(); ?>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php if (!empty($this->items)) : ?>
                    <?php
                    foreach ($this->items as $i => $row) :
                        $link = JRoute::_('index.php?option=com_joomsquads&task=application.edit&id=' . $row->id);
                        ?>
                        <tr>
                            <td><?php echo $this->pagination->getRowOffset($i); ?></td>
                            <td>
                                <?php if($row->status==0) {echo JHtml::_('grid.id', $i, $row->id); }?>
                            </td>
                            <td align="center">
                                <?php echo $row->id; ?>
                            </td>
							<td align="center">
                                <?php echo $row->name; ?>
                            </td>
                            <td >
                            	<?php if($row->status==0) {
                            		echo '<a href="'.$link.'" title="'.JText::_('COM_JOOMSQUADS_EDIT_APPLICATION').'">'.
                              		$row->nickname.'</a>';
                            	}
                            	else {echo $row->nickname;}
                            	?>
                            </td>
                            <td align="center">
                                <?php echo $row->age; ?>
                            </td>
                            <td align="center">
                                <?php echo $this->getSquadName($row->squad_id); ?>
                            </td>
                            <td align="center">
                                <?php echo $row->date_sent; ?>
                            </td>
                            <td align="center">
                                <?php echo $row->date_replied; ?>
                            </td>
                            <td align="center">
                                <?php echo $this->getStatus($row->status); ?>
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