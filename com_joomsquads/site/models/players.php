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
 * Players Model
 *
 * @since 0.2.1
 */
class JoomsquadsModelPlayers extends JModelList {
	// private $squad_id;
	protected function getListQuery() {
		$jinput = JFactory::getApplication ()->input;
		$squad_id = $jinput->get ( 'id', 1, 'INT' );
		
		$db = JFactory::getDbo ();
		$query = $db->getQuery ( true );
		$query->select ( array (
				'p.*',
				'ps.squad_id',
				'ps.squad_ordering',
				'ps.position' 
		) );
		$query->from ( $db->quoteName ( '#__jsq_players', 'p' ) );
		$query->leftJoin ( $db->quoteName ( '#__jsq_playerssquads', 'ps' ) . ' ON (' . $db->quoteName ( 'p.id' ) . ' = ' . $db->quoteName ( 'ps.player_id' ) . ')' );
		$query->order ( 'ps.squad_ordering ASC' );
		$query->group ( $db->quoteName ( 'p.nickname' ) );
		$query->where ( 'ps.squad_id=' . $squad_id );
		return $query;
	}
	function getSquadName() {
		$jinput = JFactory::getApplication ()->input;
		$squad_id = $jinput->get ( 'id', 1, 'INT' );
		$db = JFactory::getDbo ();
		
		try {
			$db->transactionStart ();
			$query = $db->getQuery ( true );
			$query->select ( 's.name' );
			$query->from ( $db->quoteName ( '#__jsq_squads', 's' ) );
			$query->where ( 's.id=' . $squad_id );
			$db->setQuery ( $query );
			$results = $db->loadResult ();
			$db->transactionCommit ();
		} catch ( Exception $e ) {
			// catch any database errors.
			$db->transactionRollback ();
			JErrorPage::render ( $e );
		}
		return $results;
	}
	protected function populateState($ordering = null, $direction = null) {
		// Initialise variables.
		$this->setState ( 'list.limit', 0 );
	}
}
