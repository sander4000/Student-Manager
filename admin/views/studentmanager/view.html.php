<?php
/*------------------------------------------------------------------------
# view.html.php - Student Manager Component
# ------------------------------------------------------------------------
# author    Sander Crombeen
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   voipcentral.nl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * studentmanager View
 */
class StudentmanagerViewstudentmanager extends JViewLegacy
{
	/**
	 * Studentmanager view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Include helper submenu
		StudentmanagerHelper::addSubmenu('studentmanager');

		// Get data from the model
		$items = $this->get('Items');
		//var_export($items);
		$pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		};

		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;
		$this->state		= $this->get('State');


		// Preprocess the list of items to find ordering divisions.
		// TODO: Complete the ordering stuff with nested sets
		foreach ($this->items as &$item)
		{
			$item->order_up = true;
			$item->order_dn = true;
		}



		// Set the toolbar
		$this->addToolBar();
		// Show sidebar
		$this->sidebar = JHtmlSidebar::render();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		$canDo = StudentmanagerHelper::getActions();
		JToolBarHelper::title(JText::_('Studentmanager Manager'), 'studentmanager');
		if($canDo->get('core.create')){
			JToolBarHelper::addNew('student.add', 'JTOOLBAR_NEW');
		};
		if($canDo->get('core.edit')){
			JToolBarHelper::editList('student.edit', 'JTOOLBAR_EDIT');
		};
		if($canDo->get('core.delete')){
			JToolBarHelper::deleteList('', 'studentmanager.delete', 'JTOOLBAR_DELETE');
		};
		if($canDo->get('core.admin')){
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_studentmanager');
		};

		$db   = JFactory::getDbo();



$db   = JFactory::getDbo();
//$query = "SELECT * FROM #__confplan_classes";
//$query->order('id DESC');
//$query->order('name ASC');

$query = $db->getQuery(true);
$query->select($db->quoteName(array('id', 'name')));
$query->from($db->quoteName('#__confplan_classes'));
$query->order('name ASC');

$db->setQuery($query); 
$rows = $db->loadObjectList(); 
$options = array();
foreach ($rows as $row) {
   $options[] = JHtml::_('select.option', "$row->id", JText::_($row->name));
}


	//show Trash and All option only
//$options        = array();       
//$options[]      = JHtml::_('select.option', '2', 'JTRASHED');
//$options[]      = JHtml::_('select.option', '1', 'JALL');
JHtmlSidebar::addFilter(
    JText::_('COM_STUDENTMANAGER_STUDENTMANAGER_FORM_LABEL_FILTER'),
    'filter_classroomsearch',
    JHtml::_('select.options', $options, "value", "text", $this->state->get('filter.classroomsearch'), true)
);

	}

	/**
	 * Method to set up the document properties
	 *
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('Studentmanager Manager - Administrator'));
	}
     protected function getSortFields()
	{
		return array(
			'studentid' => JText::_('StudentID'),
			'studentname' => JText::_('Student Name'),
			'classroomid' => JText::_('Classroom')
	
		);
	}
}
?>