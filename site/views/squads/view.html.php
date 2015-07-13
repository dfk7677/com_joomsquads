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
class JoomSquadsViewSquads extends JViewLegacy
{
	/**
	 * Display the JoomSquads Squads view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		$this->items		= $this->get('Items');
		//$this->pagination	= $this->get('Pagination');
 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
 
			return false;
		}
		// Display the view
		parent::display($tpl);
	}
}