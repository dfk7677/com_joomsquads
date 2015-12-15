<?php

/**
 * @package Component JoomSquads for Joomla! 3.4
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
 * */
// No direct access to this file
defined ( '_JEXEC' ) or die ( 'Restricted access' );

/**
 * HTML View class for the JoomSquads Component
 *
 * @since 0.0.1
 */
class JoomSquadsViewplayer_list extends JViewLegacy {
	
	/**
	 * Display the JoomSquads admin player list view
	 *
	 * @param string $tpl
	 *        	The name of the template file to parse; automatically searches through the template paths.
	 *        	
	 * @return void
	 */
	function display($tpl = null) {
		// Set the toolbar
		$this->addToolBar ();
		$this->addSideBar ();
		$this->sidebar = JHtmlSidebar::render ();
		
		$this->items = $this->get ( 'Items' );
		$this->pagination = $this->get ( 'Pagination' );
		$this->state = $this->get ( 'State' );
		
		// Check for errors.
		if (count ( $errors = $this->get ( 'Errors' ) )) {
			JError::raiseError ( 500, implode ( '<br />', $errors ) );
			
			return false;
		}
		// Display the view
		parent::display ( $tpl );
	}
	
	/**
	 * Add the page title and toolbar.
	 *
	 * @return void
	 *
	 * @since 1.6
	 */
	protected function addToolBar() {
		JToolBarHelper::title ( JText::_ ( 'COM_JOOMSQUADS_PLAYERS_TITLE' ) );
		JToolBarHelper::addNew ( 'player.add' );
		JToolBarHelper::editList ( 'player.edit' );
		JToolBarHelper::deleteList ( '', 'player_list.delete' );
	}
	protected function addSideBar() {
		require_once JPATH_COMPONENT . '/helpers/joomsquads.php';
		JoomSquadsHelper::addSubmenu ( 'player_list' );
	}
	
	// @since 0.1.4
	protected function getSquads($pid) {
		$db = JFactory::getDbo ();
		try {
			$db->transactionStart ();
			$query = $db->getQuery ( true );
			// Create the base select statement.
			$query->select ( $db->quoteName ( 's.short_name' ) );
			$query->from ( $db->quoteName ( '#__jsq_squads', 's' ) );
			$query->leftJoin ( $db->quoteName ( '#__jsq_playerssquads', 'ps' ) . ' ON (' . $db->quoteName ( 's.id' ) . ' = ' . $db->quoteName ( 'ps.squad_id' ) . ')' );
			$query->where ( 'ps.player_id = ' . $pid );
			$db->setQuery ( $query );
			$result = $db->loadColumn ();
			$db->transactionCommit ();
		} 

		catch ( Exception $e ) {
			// catch any database errors.
			$db->transactionRollback ();
			JErrorPage::render ( $e );
		}
		return implode ( ",", $result );
	}
}