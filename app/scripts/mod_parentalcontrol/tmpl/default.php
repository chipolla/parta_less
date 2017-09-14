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
JHtml::_('bootstrap.framework');
$setting = ParentalcontrolFrontendHelper::config();
?>
<div id="mod-parentalcontrol-main">
    <div id="mod-parentalcontrol" class="">
      <table>
			 <?php $i=0; foreach ($rows as $row){ $i++;?>
          <tr>
              <td><?php echo $row->name; ?></td>
              <?php $j=0; foreach ($row->marks as $mark){ $i++;?>
                <td ><?php echo $mark; ?></td>
              <?php } ?>
              <td><?php echo $row->control; ?></td>
              <td><?php echo $row->comment; ?></td>
          </tr>
     		<?php } ?>
      </table>
      </div>
</div>
