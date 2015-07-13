<?php
/**
 * @package Component JoomSquads for Joomla! 3.4
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
**/
 
 // No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * HTML View class for the JoomSquads Component
 *
 * @since  0.0.1
 */
class JoomSquadsViewmain extends JViewLegacy
{
	/**
	 * Display the JoomSquads admin main view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		 // Set the toolbar
		$this->addToolBar();
		$this->addSideBar();
		// Display the view
		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}
	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 */
	protected function addToolBar()
	{
		JToolBarHelper::title(JText::_('COM_JOOMSQUADS_MAIN_TITLE'));
		
	}
	
	protected function addSideBar()
	{
		require_once JPATH_COMPONENT . '/helpers/joomsquads.php';
		JoomSquadsHelper::addSubmenu('main');
	}
	
}