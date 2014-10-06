<?php
/*------------------------------------------------------------------------
# edit.php - Student Manager Component
# ------------------------------------------------------------------------
# author    Sander Crombeen
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   voipcentral.nl
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');
$params = $this->form->getFieldsets('params');

?>
<ul class="nav nav-tabs hidden" >
	<li class="active"><a data-toggle="tab" href="#home">tab</a></li>
</ul>
<form action="<?php echo JRoute::_('index.php?option=com_studentmanager&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<div class="row-fluid">
		<div class="span12 form-horizontal">
                    <fieldset>
                    <?php echo $this->form->renderField('studentid'); ?>
                    <?php echo $this->form->renderField('studentname'); ?>
                    <?php echo $this->form->renderField('classroomid'); ?>
                                       
                    </fieldset>
			
		</div>
	</div>
	<div>
		<input type="hidden" name="task" value="student.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>