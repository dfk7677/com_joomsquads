<?php
/**
 * @package Component JoomSquads for Joomla! 3.4
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
**/
 
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

class JoomSquadsHelper extends JHelperContent
{
    public static function addSubmenu($vName)
    {
        JHtmlSidebar::addEntry(
            JText::_('COM_JOOMSQUADS_INFORMATION'),
            'index.php?option=com_joomsquads'
        );
		JHtmlSidebar::addEntry(
            JText::_('COM_JOOMSQUADS_CONFIGURATION'),
            'index.php?option=com_joomsquads&view=configuration'
        );
		JHtmlSidebar::addEntry(
            JText::_('COM_JOOMSQUADS_SQUADS'),
            'index.php?option=com_joomsquads&view=squad_list'
        );
		JHtmlSidebar::addEntry(
            JText::_('COM_JOOMSQUADS_PLAYERS'),
            'index.php?option=com_joomsquads&view=player_list'
        );
		
    }
}