<?php 
$edit_data = $this->db->get_where('enroll', array(
    'student_id' => $param2, 'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description
))->result_array();
foreach ($edit_data as $row) :
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('edit_student'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(
                    site_url('admin/student/do_update/' . $row['student_id'] . '/' . $row['class_id']),
                    array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')
                ); ?>
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
                <div class="clear"></div>
                <br />
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('name'); ?></label>
                        <input type="text" class="form-control" name="name" data-validate="required"
                            data-message-required="<?php echo get_phrase('value_required'); ?>"
                            value="<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?>">
                    </div>

                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('class'); ?></label>
                        <input type="text" class="form-control" name="class" disabled
                            value="<?php echo $this->db->get_where('class', array('class_id' => $row['class_id']))->row()->name; ?>">
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="field-2" class="control-label"><?php echo get_phrase('stream'); ?></label>
                        <select name="section_id" class="form-control selectboxit">
                            <option value=""><?php echo get_phrase('select_stream'); ?></option>
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
                <div class="clear"></div>
                <br />
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('admission_number'); ?></label>
                        <input type="text" class="form-control" name="student_code"
                            value="<?php echo $this->db->get_where('student', array(
                                        'student_id' => $row['student_id']
                                    ))->row()->student_code; ?>">
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('parent/guardian'); ?></label>
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
                                <?php echo $row3['first_name'] . " " . $row3['l_name']; ?>
                            </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="field-2" class="control-label"><?php echo get_phrase('date_of_birth'); ?></label>
                        <input type="text" class="form-control datepicker" name="birthday"
                            value="<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->birthday; ?>"
                            data-start-view="2">
                    </div>
                </div>
                <div class="clear"></div>
                <br />
                <!-- Nextttt -->
                <div class="col-sm-3">
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
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('address'); ?></label>
                        <input type="text" class="form-control" name="address"
                            value="<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->address; ?>">
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('phone'); ?></label>
                        <input type="text" class="form-control" name="phone"
                            value="<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->phone; ?>">
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="clear"></div>
                <br />
                <!-- Stoppp -->
                <!-- Nextttt -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="field-2" class="control-label"><?php echo get_phrase('email'); ?></label>
                        <input type="text" class="form-control" name="email"
                            value="<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->email; ?>">
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('dormitory'); ?></label>
                        <select name="dormitory_id" class="form-control selectboxit">
                            <option value=""><?php echo get_phrase('select'); ?></option>
                            <?php
                            $dorm_id = $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->dormitory_id;
                            $dormitories = $this->db->get('dormitory')->result_array();
                            foreach ($dormitories as $row2) :
                            ?>
                            <option value="<?php echo $row2['dormitory_id']; ?>"
                                <?php if ($dorm_id == $row2['dormitory_id']) echo 'selected'; ?>>
                                <?php echo $row2['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('transport_route'); ?></label>
                        <select name="transport_id" class="form-control selectboxit">
                            <option value=""><?php echo get_phrase('select'); ?></option>
                            <?php
                            $trans_id = $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->transport_id;
                            $transports = $this->db->get('transport')->result_array();
                            foreach ($transports as $row2) :
                            ?>
                            <option value="<?php echo $row2['transport_id']; ?>"
                                <?php if ($trans_id == $row2['transport_id']) echo 'selected'; ?>>
                                <?php echo $row2['route_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="clear"></div>
                <br />
                <!-- Stoppp -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit"
                            class="btn btn-success btn-block"><?php echo get_phrase('update_student'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>