<?php
/**
 * @package Component JoomSquads for Joomla! 3.4
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
 **/

// Check to ensure this file is included in Joomla!
defined ( '_JEXEC' ) or die ( 'Restricted access' );


/**
 * Squad name
 *
 * @since 0.5.0
 */
class JFormFieldSquadName extends JFormField {
	/**
	 * The form field type.
	 *
	 * @var string
	 * @since 1.6
	 */
	protected $type = 'squadname';
	
	/**
	 * Method to get the field options.
	 *
	 * @return array The field option objects.
	 * @since 1.6
	 */
	public function getInput() {
		// Initialize variables.
		$db = JFactory::getDbo ();
		try {
			$db->transactionStart ();
			$query = $db->getQuery ( true );
			
			$query->select ( 'name');
			$query->from ( $db->quoteName('#__jsq_squads') );
			$query->where ( $db->quoteName('id'). '='.$this->form->getValue ( 'squad_id' ) );
			
			// Get the options.
			$db->setQuery ( $query );
			
			$name = $db->loadResult ();
		} catch ( Exception $e ) {
			// catch any database errors.
			$db->transactionRollback ();
			JErrorPage::render ( $e );
		}
		
		
		return '<input type="text" value="'.$name.'" readonly>';
	}
}