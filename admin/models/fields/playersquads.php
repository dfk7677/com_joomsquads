<?php
/**
 * @package Component JoomSquads for Joomla! 3.4
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
**/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

 
class JFormFieldplayersquads extends JFormField {
 
	protected $type = 'playersquads';
 
	
 
	public function getInput() {
		
		// Get a db connection.
		$db = JFactory::getDbo();
 
		// Create a new query object.
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('id', 'name', 'ordering')));
		$query->from($db->quoteName('#__jsq_squads'));
		$query->order('ordering ASC');
		
		// Reset the query using our newly populated query object.
		$db->setQuery($query);
 
		// Load the results as a list of stdClass objects.
		$results = $db->loadObjectList();
		
		$html='';
		
		
			$html.='<table>';
			$i=0;
			foreach ($results as $value) {
				$query = $db->getQuery(true);
				$query->from($db->quoteName('#__jsq_playerssquads'));		
				$query->select($db->quoteName(array('player_id','squad_id','position','squad_ordering')));
				$query->where($db->quoteName('player_id'). ' = ' . $this->form->getValue('id') . ' AND ' .
								  $db->quoteName('squad_id'). ' = ' .$value->id);
				$db->setQuery($query);
				$row = $db->loadAssoc();
			
				if($row>0){$checked='checked';$disabled='';}
				else{$checked='';$disabled='disabled';}
			
				$html.='<tr>
							<td>'.$value->name.'</td>
							<td> <input type="checkbox" name="squad[]" value="'.$value->id.'" '.$checked.' id="ch'.$i.'" ></td>
							<td> <input type="text" name="position[]" style="width: 100px;" value="'.$row['position'].'" '.$disabled.' id="pos'.$i.'"></td>
							<td> <input type="number" min="1" max="100" name="ordering[]" style="width: 30px;" value="'.$row['squad_ordering'].'" '.$disabled.' id="ord'.$i.'"></td>
						</tr>';
				$i++;
			}
			$html.='</table>';
			
				
		
		
		return $html;		
				
	}
}