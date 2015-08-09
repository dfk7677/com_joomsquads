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
 * player list Model
 *
 * @since  0.0.1
 */
class JoomSquadsModelPlayer_list extends JModelList {

	public function __construct($config = array()) {
	 	$config['filter_fields']=array('s.squad_id');
		parent::__construct($config);
	}

    /**
     * Method to build an SQL query to load the list data.
     *
     * @return      string  An SQL query
     */
    protected function getListQuery() {
        // Initialize variables.
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        // Create the base select statement.
        $query->select('p.*','s.squad_id');
        $query->from($db->quoteName('#__jsq_players','p'));
	$query->leftJoin($db->quoteName('#__jsq_playerssquads','s') . 
		' ON ('.$db->quoteName('p.id').' = '.$db->quoteName('s.player_id').')');
        $query->order('p.nickname ASC');
        
        // Filter squad
        // @since 0.1.4
        $squad_id = $db->escape($this->getState('filter.squad_id'));
	
	if (!empty($squad_id)) {
           
            $query->where('s.squad_id='.$squad_id );
	}
        
        
        return $query;
    }

    protected function populateState($ordering = null, $direction = null) {
        // Initialise variables.
        $app = JFactory::getApplication('administrator');
        $squad_id = $app->getUserStateFromRequest(
                $this->context . '.filter.squad_id', 'filter_squad_id', '','string');
        $this->setState('filter.squad_id', $squad_id);

        // List state information.
        parent::populateState('p.nickname', 'asc');
    }

}