<?php

/**
 * @package Component JoomSquads for Joomla! 3.4
 * @version GIT: $Id$ In development.
 * @author Dionysis 'dfk_7677' Kapatsoris
 * @copyright (C) 2015 Dionysis Kapatsoris
 * @license http://opensource.org/licenses/GPL-3.0 GNU/GPLv3
 * */
// No direct access to this file
defined ( '_JEXEC' ) or die ( 'Restricted access' );

/**
 * application Model
 *
 * @since 0.5.0
 */
class JoomSquadsModelApplication extends JModelAdmin {
	
	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param string $type
	 *        	The table name. Optional.
	 * @param string $prefix
	 *        	The class prefix. Optional.
	 * @param array $config
	 *        	Configuration array for model. Optional.
	 *        	
	 * @return JTable A JTable object
	 *        
	 * @since 1.6
	 */
	public function getTable($type = 'JoomSquads', $prefix = 'applicationTable', $config = array()) {
		return JTable::getInstance ( $type, $prefix, $config );
	}
	
	/**
	 * Method to get the record form.
	 *
	 * @param array $data
	 *        	Data for the form.
	 * @param boolean $loadData
	 *        	True if the form is to load its own data (default case), false if not.
	 *        	
	 * @return mixed A JForm object on success, false on failure
	 *        
	 * @since 1.6
	 */
	public function getForm($data = array(), $loadData = true) {
		// Get the form.
		$form = $this->loadForm ( 'com_joomsquads.application', 'application', array (
				'control' => 'jform',
				'load_data' => $loadData 
		) );
		
		if (empty ( $form )) {
			return false;
		}
		
		return $form;
	}
	
	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return mixed The data for the form.
	 *        
	 * @since 1.6
	 */
	protected function loadFormData() {
		// Check the session for previously entered form data.
		$data = JFactory::getApplication ()->getUserState ( 'com_joomsquads.edit.application.data', array () );
		
		if (empty ( $data )) {
			$data = $this->getItem ();
		}
		
		return $data;
	}
	public function reply($pks, $status) {
		
		
		$db = JFactory::getDbo ();
		
		try {
			$db->transactionStart ();
			
			$query = $db->getQuery ( true );
			$fields = array (
					$db->quoteName ( 'status' ) . ' = ' .$status,
					$db->quoteName ('date_replied') . ' = NOW() '
			);
			
			// Conditions for which records should be updated.
			$conditions = array (
					$db->quoteName ( 'id' ) . ' = ' . $pks 
			);
			
			$query->update ( $db->quoteName ( '#__jsq_applications' ) )->set ( $fields )->where ( $conditions );
			
			$db->setQuery ( $query );
			$result = $db->execute ();
			
			$db->transactionCommit ();
		} catch ( Exception $e ) {
			// catch any database errors.
			$db->transactionRollback ();
			JErrorPage::render ( $e );
		}
		
		try {
			$db->transactionStart ();
				
			$query = $db->getQuery ( true );
			$query->select($db->quoteName(array('email','nickname')));
			$query->from($db->quoteName('#__jsq_applications'));
			$query->where($db->quoteName('id').' = '.$pks);
				
			$db->setQuery ( $query );
			$row = $db->loadAssoc ();
				
			$db->transactionCommit ();
		} catch ( Exception $e ) {
			// catch any database errors.
			$db->transactionRollback ();
			JErrorPage::render ( $e );
		}
		
		$params = JComponentHelper::getParams( 'com_joomsquads' );
		$mailer = JFactory::getMailer();
		$mailer->setSender('dfk_7677@heat-clan.gr','[ΗΕΑΤ]dfk_7677');
		$mailer->addRecipient($row['email']);
		
		$mailer->isHTML(true);
		$mailer->Encoding = 'base64';
		
		$intro='Γεια σου '.$row['nickname'].',<br>';
		
		//e-mail
		if($status == 1) {
			$mailer->setSubject($params->get('subject_accept'));
			$mailer->setBody($intro.$params->get('accept_email'));
			if($params->get('send_accept')) {
				$mailer->Send();
				
			}
			$add = '';
		}
		else {
			$mailer->setSubject($params->get('subject_reject'));
			$mailer->setBody($intro.$params->get('reject_email'));
			if($params->get('send_reject')) {
				$mailer->Send();
			}
			$add = 'δεν ';
		}
		//mail to moderators
		$mailer = JFactory::getMailer();
		$mailer->setSender('dfk_7677@heat-clan.gr','[ΗΕΑΤ]dfk_7677');
		$mailer->addRecipient(explode(',',$params->get('moderators_emails')));
		$mailer->isHTML(true);
		$mailer->Encoding = 'base64';
		$mailer->setSubject('HEAT Clan - Απάντηση Αίτησης');
		$mailer->setBody('Η αίτηση του/της <b>'.$row['nickname'].'</b> '.$add.'έγινε δεκτή.');
		$mailer->Send();
	}
}
