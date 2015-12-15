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
 * HTML View class for the JoomSquads Component
 *
 * @since  0.4.0
 */
class JoomSquadsViewAchievement extends JViewLegacy {

    /**
     * View form
     *
     * @var         form
     */
    protected $form = null;

    /**
     * Display the JoomSquads admin squad view
     *
     * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
     *
     * @return  void
     */
    function display($tpl = null) {
        // Get the Data
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');

        // Check for errors.
        if (count($errors = $this->get('Errors'))) {
            JError::raiseError(500, implode('<br />', $errors));

            return false;
        }

        // Set the toolbar
        $this->addToolBar();

        // Display the view
        parent::display($tpl);

        //Set the document
        $this->setDocument();
    }

    /**
     * Add the page title and toolbar.
     *
     * @return  void
     *
     * @since   1.6
     */
    protected function addToolBar() {
        $input = JFactory::getApplication()->input;

        // Hide Joomla Administrator Main menu
        $input->set('hidemainmenu', true);

        $isNew = ($this->item->id == 0);

        if ($isNew) {
            $title = JText::_('COM_JOOMSQUADS_MANAGER_ACHIEVEMENT_NEW');
        } else {
            $title = JText::_('COM_JOOMSQUADS_MANAGER_ACHIEVEMENT_EDIT');
        }
        JToolBarHelper::title($title, 'achievement');
        JToolBarHelper::apply('achievement.apply');
        JToolBarHelper::save('achievement.save');
        JToolBarHelper::cancel(
                'achievement.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE'
        );
    }

    /**
     * Method to set up the document properties
     *
     * @return void
     */
    protected function setDocument() {
        $isNew = ($this->item->id < 1);
        $document = JFactory::getDocument();
        $document->setTitle($isNew ? JText::_('COM_JOOMSQUADS_ACHIEVEMENT_CREATING') :
                        JText::_('COM_JOOMSQUADS_ACHIEVEMENT_EDITING'));
        //$document->addScript(JURI::base() . "components/com_joomsquads/views/achievement/submitbutton.js");
        JText::script('COM_JOOMSQUADS_INVALID_VALUE');
    }

}
