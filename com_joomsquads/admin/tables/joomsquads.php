<?php

/**
 * @package Component JoomSquads for Joomla! 3.4
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
 * */
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Table Classes
 *
 * @since  0.1.0
 */
class playerTableJoomSquads extends JTable {

    /**
     * Constructor
     *
     * @param   JDatabaseDriver  &$db  A database connector object
     */
    function __construct(&$db) {
        parent::__construct('#__jsq_players', 'id', $db);
    }

    public function loadSquadPlayers($sid) {
        $db = $this->getDBO();
        try {
            $db->transactionStart();
            $query = $db->getQuery(true);
            $query->select($db->quoteName('*'));
            $query->from($db->quoteName('#__jsq_players'));
            $query->where($db->quoteName('squad_id') . ' = ' . $db->quote($sid));
            $query->order('ordering DEC');
            $db->setQuery($query);
            $results = $db->loadObjectList();
            $db->transactionCommit();
        } catch (Exception $e) {
            // catch any database errors.
            $db->transactionRollback();
            JErrorPage::render($e);
        }
        return $results;
    }

}

class squadTableJoomSquads extends JTable {

    /**
     * Constructor
     *
     * @param   JDatabaseDriver  &$db  A database connector object
     */
    function __construct(&$db) {
        parent::__construct('#__jsq_squads', 'id', $db);
    }

}

class achievementTableJoomSquads extends JTable {

	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  &$db  A database connector object
	 */
	function __construct(&$db) {
		parent::__construct('#__jsq_achievements', 'id', $db);
	}

}

class applicationTableJoomSquads extends JTable {

	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  &$db  A database connector object
	 */
	function __construct(&$db) {
		parent::__construct('#__jsq_applications', 'id', $db);
	}

}


