<?php
/*------------------------------------------------------------------------
# studentmanagerzero.php - Student Manager Component
# ------------------------------------------------------------------------
# author    Sander Crombeen
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   voipcentral.nl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * studentid Form Field class for the Studentmanager component
 */
class JFormFieldstudentmanagerzero extends JFormFieldList
{
	/**
	 * The studentid field type.
	 *
	 * @var		string
	 */
	protected $type = 'studentmanagerzero';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__studentmanager_student.id as id, #__studentmanager_student.studentid as studentid');
		$query->from('#__studentmanager_student');
		$db->setQuery((string)$query);
		$items = $db->loadObjectList();
		$options = array();
		if($items){
			foreach($items as $item){
				$options[] = JHtml::_('select.option', $item->id, ucwords($item->studentid));
			};
		};
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
?>