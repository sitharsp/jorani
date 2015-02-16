<?php
/*
 * This file is part of Jorani.
 *
 * Jorani is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jorani is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jorani.  If not, see <http://www.gnu.org/licenses/>.
 */

CI_Controller::get_instance()->load->helper('language');
$this->lang->load('users', $language);
$this->lang->load('global', $language);?>

<h1><?php echo lang('users_myprofile_title');?></h1>

<div class="row-fluid">
    <div class="span3"><strong><?php echo lang('users_myprofile_field_firstname');?></strong></div>
    <div class="span3"><?php echo $user['firstname'];?></div>
    <div class="span6">&nbsp;</div>
</div>

<div class="row-fluid">
    <div class="span3"><strong><?php echo lang('users_myprofile_field_lastname');?></strong></div>
    <div class="span3"><?php echo $user['lastname'];?></div>
    <div class="span6">&nbsp;</div>
</div>

<div class="row-fluid">
    <div class="span3"><strong><?php echo lang('users_myprofile_field_manager');?></strong></div>
    <div class="span3"><?php echo $manager_label;?></div>
    <div class="span6">&nbsp;</div>
</div>

<div class="row-fluid">
    <div class="span3"><strong><?php echo lang('users_myprofile_field_contract');?></strong></div>
    <div class="span3"><?php echo $contract_label;?>
    <?php if (($this->config->item('ics_enabled') == TRUE) && ($contract_id != 0)) {?>
    &nbsp;(<a id="lnkICS" href="#"><i class="icon-globe"></i> ICS</a>)</div>
    <?php } else {?>
    </div>
    <?php }?>
    <div class="span6">&nbsp;</div>
</div>

<div class="row-fluid">
    <div class="span3"><strong><?php echo lang('users_myprofile_field_position');?></strong></div>
    <div class="span3"><?php echo $position_label;?></div>
    <div class="span6">&nbsp;</div>
</div>

<div class="row-fluid">
    <div class="span3"><strong><?php echo lang('users_myprofile_field_entity');?></strong></div>
    <div class="span3"><?php echo $organization_label;?></div>
    <div class="span6">&nbsp;</div>
</div>

<div class="row-fluid">
    <div class="span3"><strong><?php echo lang('users_myprofile_field_hired');?></strong></div>
    <div class="span3"><?php 
$date = new DateTime($user['datehired']);
echo $date->format(lang('global_date_format'));
?></div>
    <div class="span6">&nbsp;</div>
</div>

<div class="row-fluid">
    <div class="span3"><strong><?php echo lang('users_myprofile_field_identifier');?></strong></div>
    <div class="span3"><?php echo $user['identifier'];?></div>
    <div class="span6">&nbsp;</div>
</div>

<div class="row-fluid"><div class="span12">&nbsp;</div></div>

<script src="<?php echo base_url();?>assets/js/bootbox.min.js"></script>
<script type="text/javascript">
$(function() {
    $('#lnkICS').click(function () {
        bootbox.alert("ICS : <input type='text' class='input-xlarge' id='txtIcsUrl' \n\
                    value='<?php echo base_url() . 'ics/dayoffs/' . $user_id . '/' . $contract_id;?>'\n\
                    onfocus='$(this).select();' />");
    });
});
</script>
