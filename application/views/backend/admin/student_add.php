<script type="text/javascript">
    function get_class_sections(class_id) {

        $.ajax({
            url: '<?php echo site_url('
            admin / get_class_section / '); ?>' + class_id,
            success: function(response) {
                jQuery('#section_selector_holder').html(response);
            }
        });
    }

    // function get_county_subcounties(county_id) {

    //     $.ajax({
    //         url: '<?php echo site_url('
    //         admin / get_county_subcounties / '); ?>' + county_id,
    //         success: function(response) {
    //             jQuery('#subcounty_selector_holder').html(response);
    //         }
    //     });

    // }
</script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('addmission_form'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('admin/student/create/'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                <h5 style="color:green; font-weight:bold">Student Information</h5>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" data-validate="required"
                            placeholder="Enter First Name"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="middle_name" data-validate="required"
                            placeholder="Enter Middle Name"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" data-validate="required"
                            placeholder="Enter Last Name"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>

                <div class="clear"></div>
                <br />
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="sex" class="form-control selectboxit" data-validate="required" id="sex"
                            data-message-required="<?php echo get_phrase('value_required'); ?>">
                            <option value="">
                                <?php echo get_phrase('select_gender'); ?>
                            </option>
                            <option value="male">
                                <?php echo get_phrase('male'); ?>
                            </option>
                            <option value="female">
                                <?php echo get_phrase('female'); ?>
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control datepicker" name="birthday" data-validate="required"
                            placeholder="Date of Birth" value="" data-start-view="2"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="birth_certificate_number" data-validate="required"
                            placeholder="Enter Birth Certificate No"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>
                <div class="clear"></div>
                <br />
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="county_id" class="form-control select2" data-validate="required" id="county_id"
                            data-message-required="<?php echo get_phrase('value_required'); ?>"
                            onchange="return get_county_subcounties(this.value)">
                            <option value="">
                                <?php echo get_phrase('select_county'); ?>
                            </option>
                            <?php
                            $classes = $this->db->get('county')->result_array();
                            foreach ($classes as $row) :
                            ?>
                            <option value="<?php echo $row['county_id']; ?>">
                                <?php echo $row['name']; ?>
                            </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="subcounty_id" class="form-control select2" id="subcounty_selector_holder">
                            <option value="">
                                <?php echo get_phrase('select_county_first'); ?>
                            </option>

                        </select>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" name="address" data-validate="required"
                            placeholder="Enter Address"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>
                <div class="clear"></div>
                <br />

                <h5 style="color:green; font-weight:bold">Parent/Guardian Information</h5>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-2" class="control-label"><?php echo get_phrase('parent'); ?></label>
                        <select name="parent_id" class="form-control select2" required>
                            <option value=""><?php echo get_phrase('select'); ?></option>
                            <?php
                            $parents = $this->db->get('parent')->result_array();
                            foreach ($parents as $row) :
                            ?>
                            <option value="<?php echo $row['parent_id']; ?>">
                                <?php echo $row['id_number'] . " " . "-" . " " . $row['first_name'] . " " . $row['l_name']; ?>
                            </option>
                            <?php
                            endforeach;
                            ?>
                        </select>

                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-2" class="control-label"><?php echo get_phrase('email'); ?></label>
                        <input type="email" class="form-control" name="email" data-validate="required"
                            placeholder="Enter Email Address"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <!-- <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" data-validate="required"
                            placeholder="Enter First Name"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="l_name" data-validate="required"
                            placeholder="Enter Last Name"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="id_number" data-validate="required"
                            placeholder="Enter ID Number"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>
                <div class="clear"></div>
                <br />
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" data-validate="required"
                            placeholder="Enter Email Address"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" data-validate="required"
                            placeholder="Enter Phone Number"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="alt_phone" data-validate="required"
                            placeholder="Enter Alternative Phone Number"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" value="" autofocus
                            required>
                    </div>
                </div> -->
                <div class="clear"></div>
                <br />

                <h5 style="color:green; font-weight:bold">Admission Information</h5>
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="class_id" class="form-control" data-validate="required" id="class_id"
                            data-message-required="<?php echo get_phrase('value_required'); ?>"
                            onchange="get_class_sections(this.value)">
                            <option value="">
                                <?php echo get_phrase('select_class'); ?>
                            </option>
                            <?php
                            $classes = $this->db->get('class')->result_array();
                            foreach ($classes as $row) :
                            ?>
                            <option value="<?php echo $row['class_id']; ?>">
                                <?php echo $row['name']; ?>
                            </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="section_id" class="form-control" id="section_selector_holder">
                            <option value="">
                                <?php echo get_phrase('select_class_first'); ?>
                            </option>

                        </select>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="student_code"
                            value="<?php echo substr(md5(uniqid(rand(), true)), 0, 7); ?>" data-validate="required"
                            id="class_id" data-message-required="<?php echo get_phrase('value_required'); ?>">
                    </div>
                </div>
                <div class="clear"></div>
                <br />
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="dormitory_id" class="form-control selectboxit">
                            <option value="">
                                <?php echo get_phrase('select_dormitory'); ?>
                            </option>
                            <?php
                            $dormitories = $this->db->get('dormitory')->result_array();
                            foreach ($dormitories as $row) :
                            ?>
                            <option value="<?php echo $row['dormitory_id']; ?>">
                                <?php echo $row['name']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="file" class="form-control" name="userfile" accept="image/*"
                            placeholder="Placeholder">
                    </div>
                </div>
                <div class="clear"></div>
                <br />
                <!-- <div class="col-md-6"> -->

                <!-- <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;"
                            data-trigger="fileinput">

                            <img src="<?php echo base_url('uploads/200x200.png'); ?>" />
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"
                            style="max-width: 200px; max-height: 150px"></div>
                        <div>
                            <span class="btn btn-blue btn-file">
                                <span class="fileinput-new">Select Student Image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="userfile" accept="image/*">
                            </span>
                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div> -->
                <!-- </div> -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-success btn-block">
                            <?php echo get_phrase('admit_student'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    function get_class_sections(class_id) {

        $.ajax({
            url: '<?php echo site_url('
            admin / get_class_section / '); ?>' + class_id,
            success: function(response) {
                jQuery('#section_selector_holder').html(response);
            }
        });
    }

    // function get_county_subcounties(county_id) {

    //     $.ajax({
    //         url: '<?php echo site_url('
    //         admin / get_county_subcounties / '); ?>' + county_id,
    //         success: function(response) {
    //             jQuery('#subcounty_selector_holder').html(response);
    //         }
    //     });

    // }
</script>