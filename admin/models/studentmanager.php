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
	 * @return	string	An SQL query
	 */




	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param   string  $id    A prefix for the store id.
	 *
	 * @return  string  A store id.
	 * @since   1.6
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id .= ':' . $this->getState('filter.search');
		$id .= ':' . $this->getState('filter.classroomsearch');
		//$id .= ':' . $this->getState('filter.published');
		//$id .= ':' . $this->getState('filter.category_id');
		//$id .= ':' . $this->getState('filter.language');

		return parent::getStoreId($id);
	}







	protected function getListQuery()
	{
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

		// Select some fields
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.studentid, a.studentname, a.checked_out, a.checked_out_time, a.classroomid'
			)
		);
		//$query->select('*');

		// From the studentmanager_student table
		$query->from('#__studentmanager_student AS a');


				// Join over the users for the linked user.
		$query->select('ul.name AS classroomname')
			->join('LEFT', '#__confplan_classes AS ul ON ul.id=classroomid');


		//$classroomsearch = $this->getState('filter.classroomsearch');
		// Filter on the language.
		if ($classroomsearch = $this->getState('filter.classroomsearch'))
		{
			$query->where('classroomid = ' . $db->quote($classroomsearch));
		}
		


		$search = $this->getState('filter.search');
		if (!empty($search))
		{



				$search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
				$query->where('(studentname LIKE ' . $search . ')');
		}

		        $query->order($db->escape($this->getState('list.ordering', 'default_sort_column')).' '.
                $db->escape($this->getState('list.direction', 'ASC')));
		//echo $search;
		//echo $query;
		//echo $classroomsearch;

		return $query;

	}


     public function __construct($config = array())
        {   
                $config['filter_fields'] = array(
                        'studentid',
                        'studentname',
                        'classroomname',                        
                        // ...
                        
                );
                parent::__construct($config);
        }




	protected function populateState($ordering = null, $direction = null) {
		$search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
		$classroomsearch = $this->getUserStateFromRequest($this->context . '.filter.classroomsearch', 'filter_classroomsearch');

		$this->setState('filter.classroomsearch', $classroomsearch);
		$this->setState('filter.search', $search);
        parent::populateState('studentname', 'ASC');
}
}
?>