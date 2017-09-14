<?php
  * @version     1.0.0
  * @package     com_parentalcontrol
  * @copyright   Copyright (C) 2014. All rights reserved.
  * @license     GNU General Public License version 2 or later; see LICENSE.txt
  * @author      chipolla <labushkina@gmail.com>
  */
// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$user = JFactory::getUser();
$userId = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
$canCreate = $user->authorise('core.create', 'com_parentalcontrol');
$canEdit = $user->authorise('core.edit', 'com_parentalcontrol');
$canCheckin = $user->authorise('core.manage', 'com_parentalcontrol');
$canChange = $user->authorise('core.edit.state', 'com_parentalcontrol');
$canDelete = $user->authorise('core.delete', 'com_parentalcontrol');

$setting = ParentalcontrolFrontendHelper::config();
$image_storiage_path = $setting->imagepath.'/';
$display_no=$setting->display_no;
$image_grid=$setting->detailpage_image_grid;
$content_grid=12-$image_grid;
$readmore=$setting->enable_read_more;
$character_limit=$setting->character_limit;
?>

<form action="<?php echo JRoute::_('index.php?option=com_tlptestimonial&view=testimonials'); ?>" method="post" name="adminForm" id="adminForm">
    <?php echo JLayoutHelper::render('default_filter', array('view' => $this), dirname(__FILE__)); ?>
	   <?php if (isset($this->items[0]->state)): ?>
            <?php echo JHtml::_('grid.sort', '', 'a.state', $listDirn, $listOrder); ?>
        <?php endif; ?>
<section class="inner testimonial pb30 signle-list">
<?php
if($display_no==1){
 $i=2; foreach ($this->items as $i => $item) : ?>

 <?php endforeach;
   }?>
</section>
     <?php echo $this->pagination->getListFooter(); ?>

    <?php if ($canCreate): ?>
        <a href="<?php echo JRoute::_('index.php?option=com_tlptestimonial&task=testimonialform.edit&id=0', false, 2); ?>"
           class="btn btn-success btn-small"><i
                class="icon-plus"></i> <?php echo JText::_('COM_TLPTESTIMONIAL_ADD_ITEM'); ?></a>
    <?php endif; ?>

    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="boxchecked" value="0"/>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
    <?php echo JHtml::_('form.token'); ?>
</form>

<script type="text/javascript">

    jQuery(document).ready(function () {
        jQuery('.delete-button').click(deleteItem);
    });

    function deleteItem() {
        var item_id = jQuery(this).attr('data-item-id');
        if (confirm("<?php echo JText::_('COM_TLPTESTIMONIAL_DELETE_MESSAGE'); ?>")) {
            window.location.href = '<?php echo JRoute::_('index.php?option=com_tlptestimonial&task=testimonialform.remove&id=', false, 2) ?>' + item_id;
        }
    }
</script>
