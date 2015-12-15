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
 * application controller
 *
 * @since  0.5.0
 */
class JoomSquadsControllerApplication extends JControllerForm {

    protected $view_list = 'application_list';
    
    public function accept()
    {
    	$input = JFactory::getApplication()->input;
    	$pks = $input->get('id','','INT');
    	// Get the model
    	$this->getModel()->reply($pks,1);
    	
    	
    	
    	// Redirect to the list screen.
    	$this->setRedirect(JRoute::_('index.php?option=com_joomsquads&view=application_list', false));
    }
    
    public function reject()
    {
    	$input = JFactory::getApplication()->input;
    	$pks = $input->get('id','','INT');
    	// Get the model
    	$this->getModel()->reply($pks,2);
    	 
    	// Redirect to the list screen.
    	$this->setRedirect(JRoute::_('index.php?option=com_joomsquads&view=application_list', false));
    }
}