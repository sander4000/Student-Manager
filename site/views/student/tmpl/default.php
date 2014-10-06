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

?>
<div id="studentmanager-content">
	<p><strong>Student_id</strong>: <?php echo $this->item->studentid; ?></p>
	<p><strong>Student_name</strong>: <?php echo $this->item->studentname; ?></p>
	<p><strong>Classroom_id</strong>: <?php echo $this->item->classroomid; ?></p>
	<p><strong>Parent_id</strong>: <?php echo $this->item->parentid; ?></p>
</div>