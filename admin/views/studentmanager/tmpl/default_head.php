<?php
/*------------------------------------------------------------------------
# default_head.php - Student Manager Component
# ------------------------------------------------------------------------
# author    Sander Crombeen
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   voipcentral.nl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

?>
<tr>
	<th width="5">
		<?php echo JText::_('ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>
	<th>
		<?php echo JText::_('Student_ID'); ?>
	</th>
	<th>
            <?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'Student_name', $listDirn, $listOrder); ?>
		<?php //echo JText::_('Student_name'); ?>
	</th>
	<th>
		<?php echo JText::_('Classroom_ID'); ?>
	</th>
	<th>
		<?php echo JText::_('Parent_ID'); ?>
	</th>
</tr>