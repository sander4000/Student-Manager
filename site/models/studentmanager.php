<?php
/*------------------------------------------------------------------------
# studentmanager.php - Student Manager Component
# ------------------------------------------------------------------------
# author    Sander Crombeen
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   voipcentral.nl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * Studentmanager Model
 */
class StudentmanagerModelstudentmanager extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields
		$query->select('*');
		// From the studentmanager_student table
		$query->from('#__studentmanager_student');

		return $query;
	}
}
?>