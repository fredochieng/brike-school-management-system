<?php 
$edit_data = $this->db->get_where('enroll', array(
	'student_id' => $param2, 'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description
))->result_array();
foreach ($edit_data as $row)
?>
<div class="modal-header">
    <h4 class="modal-title"><i class="entypo-user-add"></i><span>Edit Student</span></h4>
</div>
<div class="panel-body">
    <?php echo form_open(site_url('admin/student/do_update/' . $row['student_id'] . '/' . $row['class_id']), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
    <!-- <div class="row">
        <div class="col-md-5">

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo'); ?></label>

                <div class="col-sm-5">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;"
                            data-trigger="fileinput">
                            <img src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']); ?>"
                                alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"
                            style="max-width: 200px; max-height: 150px"></div>
                        <div>
                            <span class="btn btn-white btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="userfile" accept="image/*">
                            </span>
                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> -->
    <div class="row">
        <div class="col-md-3">

            <div class="form-group">
                <label for="field-1" class="control-label"><?php echo get_phrase('class'); ?></label>
                <input type="text" class="form-control" name="class" disabled
                    value="<?php echo $this->db->get_where('class', array('class_id' => $row['class_id']))->row()->name; ?>">
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">

            <div class="form-group">
                <label for="field-2" class="control-label"><?php echo get_phrase('section'); ?></label>

                <select name="section_id" class="form-control selectboxit">
                    <option value=""><?php echo get_phrase('select_section'); ?></option>
                    <?php
																			$sections = $this->db->get_where('section', array('class_id' => $row['class_id']))->result_array();
																			foreach ($sections as $row2) :
																			?>
                    <option value="<?php echo $row2['section_id']; ?>"
                        <?php if ($row['section_id'] == $row2['section_id']) echo 'selected'; ?>>
                        <?php echo $row2['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('id'); ?></label>


                <input type="text" class="form-control" name="student_code"
                    value="<?php echo $this->db->get_where('student', array(
																											'student_id' => $row['student_id']
																										))->row()->student_code; ?>">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">

            <div class="form-group">
                <label for="field-2" class="control-label"><?php echo get_phrase('parent'); ?></label>

                <select name="parent_id" class="form-control select2" data-validate="required"
                    data-message-required="<?php echo get_phrase('value_required'); ?>">
                    <option value=""><?php echo get_phrase('select'); ?></option>
                    <?php 
																			$parents = $this->db->get('parent')->result_array();
																			$parent_id = $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->parent_id;
																			foreach ($parents as $row3) :
																			?>
                    <option value="<?php echo $row3['parent_id']; ?>"
                        <?php if ($row3['parent_id'] == $parent_id) echo 'selected'; ?>>
                        <?php echo $row3['name']; ?>
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
                <label for="field-2" class="control-label"><?php echo get_phrase('birthday'); ?></label>

                <input type="text" class="form-control datepicker" name="birthday"
                    value="<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->birthday; ?>"
                    data-start-view="2">
            </div>

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="field-2" class="control-label"><?php echo get_phrase('gender'); ?></label>


                <select name="sex" class="form-control selectboxit">
                    <?php
																			$gender = $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->sex;
																			?>
                    <option value=""><?php echo get_phrase('select'); ?></option>
                    <option value="male" <?php if ($gender == 'male') echo 'selected'; ?>>
                        <?php echo get_phrase('male'); ?></option>
                    <option value="female" <?php if ($gender == 'female') echo 'selected'; ?>>
                        <?php echo get_phrase('female'); ?></option>
                </select>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">

            <div class="form-group">
                <label for="field-1" class="control-label"><?php echo get_phrase('class'); ?></label>
                <input type="text" class="form-control" name="class" disabled
                    value="<?php echo $this->db->get_where('class', array('class_id' => $row['class_id']))->row()->name; ?>">
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">

            <div class="form-group">
                <label for="field-2" class="control-label"><?php echo get_phrase('section'); ?></label>

                <select name="section_id" class="form-control selectboxit">
                    <option value=""><?php echo get_phrase('select_section'); ?></option>
                    <?php
																			$sections = $this->db->get_where('section', array('class_id' => $row['class_id']))->result_array();
																			foreach ($sections as $row2) :
																			?>
                    <option value="<?php echo $row2['section_id']; ?>"
                        <?php if ($row['section_id'] == $row2['section_id']) echo 'selected'; ?>>
                        <?php echo $row2['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('id'); ?></label>


                <input type="text" class="form-control" name="student_code"
                    value="<?php echo $this->db->get_where('student', array(
																											'student_id' => $row['student_id']
																										))->row()->student_code; ?>">

            </div>
        </div>
    </div>

</div>