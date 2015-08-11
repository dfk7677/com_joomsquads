<?php

/**
 * @package Component JoomSquads for Joomla! 3.4
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
 * */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

class JFormFieldplayersquads extends JFormField {

    protected $type = 'playersquads';

    public function getInput() {

        $db = JFactory::getDbo();
        try {
            $db->transactionStart();
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->select($db->quoteName(array('id', 'name', 'ordering')));
            $query->from($db->quoteName('#__jsq_squads'));
            $query->order('ordering ASC');
            $db->setQuery($query);
            $results = $db->loadObjectList();
            $db->transactionCommit();
        } catch (Exception $e) {
            // catch any database errors.
            $db->transactionRollback();
            JErrorPage::render($e);
        }

        $html = '<table><tr><th>Squad</th><th>Is member?</th><th>Position</th>' .
                '<th>Ordering</th</tr>';
        $i = 0;

        foreach ($results as $value) {
            $db = JFactory::getDbo();
            try {
                $db->transactionStart();
                $query = $db->getQuery(true);
                $query->from($db->quoteName('#__jsq_playerssquads'));
                $query->select($db->quoteName(array('player_id', 'squad_id', 'position', 'squad_ordering')));
                $query->where($db->quoteName('player_id') . ' = ' . $this->form->getValue('id') . ' AND ' .
                        $db->quoteName('squad_id') . ' = ' . $value->id);
                $db->setQuery($query);
                $row = $db->loadAssoc();
                $db->transactionCommit();
            } catch (Exception $e) {
                // catch any database errors.
                $db->transactionRollback();
                JErrorPage::render($e);
            }

            if ($row > 0) {
                $checked = 'checked';
                $disabled = '';
            } else {
                $checked = '';
                $disabled = 'disabled';
            }

            $html.='<tr><td>' . $value->name . '</td>
		<td> <input type="checkbox" name="squad[]" value="' . 
                    $value->id . '" ' . $checked . ' id="ch' . $i . '" 
                        style="float: left; margin: 0 auto;width: 100%;"></td>
	<td> <input type="text" name="position[]" style="width: 100px;" 
        value="' . $row['position'] . '" ' . $disabled . ' id="pos' . $i . '"></td>
	<td> <input type="number" min="1" max="100" name="ordering[]" 
        style="width: 30px;" value="' . $row['squad_ordering'] . '" ' . 
                    $disabled . ' id="ord' . $i . '"></td>
	</tr>';
            $i++;
        }
        $html.='</table>';
        return $html;
    }

}
