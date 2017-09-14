<?php
/**
 * @version     1.0.0
 * @package     mod_parentalcontrol
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      chipolla <labushkina@gmail.com>
 */
 // no direct access
defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_parentalcontrol/helpers/parentalcontrol.php';

 //Add database instance
$db= JFactory::getDBO();

//Pass query Limit by count parameter (Check XML)
if($category>0){
	$query="SELECT * FROM #__parentalcontrol_parentalcontrol  WHERE category=$category AND state=1 ORDER BY $ordering LIMIT 0,$parentalcontrolcount";
}else{
	$query="SELECT * FROM #__parentalcontrol_parentalcontrol  WHERE state=1 ORDER BY $ordering LIMIT 0,$parentalcontrolcount";
}
  $query="SELECT #__parentalcontrol_parentalcontrol.key1,
  #__parentalcontrol_parentalcontrol.field1 as Name,
  t1.key2 as T1Key,
  t2.key2 as T2Key,
  t2.field1 as City
  FROM Table1 t1 LEFT JOIN Table2 t2 ON t1.key2 = t2.key2" ;

 //Run The query
$db->setQuery($query);

//Load it as an Object into the variable "$rows
$rows = $db->loadObjectList();
