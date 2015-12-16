<?php

/**
 * @package     Joomla.Administrator
 * @subpackage  com_jesport
 *
 * @copyright   Copyleft 2015 dfk_7677
 * @license     GNU General Public License version 3
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HTML View class for the JeSport Component
 *
 * @since  0.0.1
 */
class JeSportViewplayer extends JViewLegacy {

    /**
     * Display the JeSport player view
     *
     * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
     *
     * @return  void
     */
    function display($tpl = null) {
        // Assign data to the view
        $this->player = $this->getModel()->getPlayer();

        // Display the view
        parent::display($tpl);
    }

}
