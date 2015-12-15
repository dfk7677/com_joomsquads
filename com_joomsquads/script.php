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

/**
 * Script file of JoomSquads component
 */
class com_joomsquadsInstallerScript {

    /**
     * method to install the component
     *
     * @return void
     */
    function install($parent) {
        // $parent is the class calling this method
        $parent->getParent()->setRedirectURL('index.php?option=com_joomsquads');
        // create a folder inside your images folder
        
        if(!JFolder::exists(JPATH_ROOT . DIRECTORY_SEPARATOR.'images'.
                DIRECTORY_SEPARATOR.
                'com_joomsquads'.DIRECTORY_SEPARATOR.'squads')) {
            $path = JPATH_SITE . DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.
                 'com_joomsquads';
            $folder = 'squads';
            JFolder::create( $path .DIRECTORY_SEPARATOR. $folder, 0755 );
        }
        if(!JFolder::exists(JPATH_ROOT . DIRECTORY_SEPARATOR.'images'.
                DIRECTORY_SEPARATOR.
                'com_joomsquads'.DIRECTORY_SEPARATOR.'players')) {
            $path = JPATH_SITE . DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.
                 'com_joomsquads';
            $folder = 'players';
            JFolder::create( $path .DIRECTORY_SEPARATOR. $folder, 0755 );
        }
    }

    /**
     * method to uninstall the component
     *
     * @return void
     */
    function uninstall($parent) {
        echo '<p>' . JText::_('COM_JOOMSQUADS_UNINSTALL_TEXT') . '</p>';
    }

    /**
     * method to update the component
     *
     * @return void
     */
    function update($parent) {
        // $parent is the class calling this method
        if(!JFolder::exists(JPATH_ROOT . DIRECTORY_SEPARATOR.'images'.
                DIRECTORY_SEPARATOR.
                'com_joomsquads'.DIRECTORY_SEPARATOR.'squads')) {
            $path = JPATH_SITE . DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.
                 'com_joomsquads';
            $folder = 'squads';
            JFolder::create( $path .DIRECTORY_SEPARATOR. $folder, 0755 );
        }
        if(!JFolder::exists(JPATH_ROOT . DIRECTORY_SEPARATOR.'images'.
                DIRECTORY_SEPARATOR.
                'com_joomsquads'.DIRECTORY_SEPARATOR.'players')) {
            $path = JPATH_SITE . DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.
                 'com_joomsquads';
            $folder = 'players';
            JFolder::create( $path .DIRECTORY_SEPARATOR. $folder, 0755 );
        }
        echo '<p>' . JText::sprintf('COM_JOOMSQUADS_UPDATE_TEXT', $parent->get('manifest')->version) . '</p>';
    }

    /**
     * method to run before an install/update/uninstall method
     *
     * @return void
     */
    function preflight($type, $parent) {
        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
        //echo '<p>' . JText::_('COM_JOOMSQUADS_PREFLIGHT_' . $type . '_TEXT') . '</p>';
    }

    /**
     * method to run after an install/update/uninstall method
     *
     * @return void
     */
    function postflight($type, $parent) {
        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
        //echo '<p>' . JText::_('COM_JOOMSQUADS_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
    }

}
