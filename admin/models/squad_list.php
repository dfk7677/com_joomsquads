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
 * squad list Model
 *
 * @since  0.0.1
 */
class JoomSquadsModelSquad_list extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
 
		// Create the base select statement.
		$query->select('*')
				->from($db->quoteName('#__jsq_squads'))
				->order('ordering ASC');
		return $query;
	}
	
	
	
}