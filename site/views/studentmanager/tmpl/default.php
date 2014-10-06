<?php
/*------------------------------------------------------------------------
# default.php - Student Manager Component
# ------------------------------------------------------------------------
# author    Sander Crombeen
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   voipcentral.nl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filter.output');
?>
<div id="studentmanager-studentmanager">
	<?php foreach($this->items as $item){ ?>
		<?php
		if(empty($item->alias)){
			$item->alias = $item->studentid;
		};
		$item->alias = JFilterOutput::stringURLSafe($item->alias);
		$item->linkURL = JRoute::_('index.php?option=com_studentmanager&view=student&id='.$item->id.':'.$item->alias);
		?>
		<p><strong>Student_id</strong>: <a href="<?php echo $item->linkURL; ?>"><?php echo $item->studentid; ?></a></p>
		<p><strong>Student_name</strong>: <?php echo $item->studentname; ?></p>
		<p><strong>Classroom_id</strong>: <?php echo $item->classroomid; ?></p>
		<p><strong>Parent_id</strong>: <?php echo $item->parentid; ?></p>
		<p><strong>Link URL</strong>: <a href="<?php echo $item->linkURL; ?>">Go to page</a> - <?php echo $item->linkURL; ?></p>
		<br /><br />
	<?php }; ?>
</div>
