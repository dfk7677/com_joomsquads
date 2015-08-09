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
 * squad Model
 *
 * @since  0.0.1
 */
class JoomSquadsModelPlayer extends JModelAdmin {

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
    public function getTable($type = 'JoomSquads', $prefix = 'playerTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Method to get the record form.
     *
     * @param   array    $data      Data for the form.
     * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
     *
     * @return  mixed    A JForm object on success, false on failure
     *
     * @since   1.6
     */
    public function getForm($data = array(), $loadData = true) {
        // Get the form.
        $form = $this->loadForm(
                'com_joomsquads.player', 'player', array(
            'control' => 'jform',
            'load_data' => $loadData
                )
        );

        if (empty($form)) {
            return false;
        }

        return $form;
    }

    /**
     * Method to get the data that should be injected in the form.
     *
     * @return  mixed  The data for the form.
     *
     * @since   1.6
     */
    protected function loadFormData() {
        // Check the session for previously entered form data.
        $data = JFactory::getApplication()->getUserState(
                'com_joomsquads.edit.player.data', array()
        );

        if (empty($data)) {
            $data = $this->getItem();
        }

        return $data;
    }

    public function save($data) {
        $jinput = JFactory::getApplication()->input;
        $squads = $jinput->get('squad', '', 'ARRAY');
        $positions = $jinput->get('position', '', 'ARRAY');
        $ordering = $jinput->get('ordering', '', 'ARRAY');
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);

        $conditions = array($db->quoteName('player_id') . ' = ' . $data['id']);

        $query->delete($db->quoteName('#__jsq_playerssquads'))->where($conditions);

        $db->setQuery($query);

        $result = $db->execute();

        $i = 0;
        if (is_array($squads)) {

            foreach ($squads as $squad) {
                $query = $db->getQuery(true);
                $columns = array('squad_id', 'player_id', 'position', 'squad_ordering');
                $values = array($squad, $data['id'], $db->quote($positions[$i]), $ordering[$i]);
                $query
                        ->insert($db->quoteName('#__jsq_playerssquads'))
                        ->columns($db->quoteName($columns))
                        ->values(implode(',', $values));
                $db->setQuery($query);
                $db->execute();
                $i++;
            }
        }


        return true;
    }

}
