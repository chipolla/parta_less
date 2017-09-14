<?php
/**
 * @version     1.0.0
 * @package     com_parentalcontrol
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      chipolla <labushkina@gmail.com>
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');
$document = JFactory::getDocument();

//if($bscss==1){
$document->addStyleSheet('media/jui/css/bootstrap.css');
//}
// Execute the task.
$controller	= JControllerLegacy::getInstance('Parentalcontrol');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
