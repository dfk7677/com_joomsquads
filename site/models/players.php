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
 * Players Model
 *
 * @since  0.0.1
 */
class JoomSquadsModelplayers extends JModelItem
{
	/**
	 * @var array players
	 */
	protected $players;
	
	
	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'JoomSquads', $prefix = 'playersTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
 
	/**
	 * Get the players
         *
	 * @return  player to be displayed
	 */
	public function getPlayers()
	{
		$jinput = JFactory::getApplication()->input;
		$id     = $jinput->get('id', 1, 'INT');
 
		$table = $this->getTable();
 
		// Load players
		$this->players = $table->loadSquadPlayers($id);
		
				
		return $this->players;
	}
}