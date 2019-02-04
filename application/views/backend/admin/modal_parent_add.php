<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('add_parent'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('admin/parent/create/'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('first_name'); ?></label>
                        <input type="text" class="form-control" name="first name" data-validate="required"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" autofocus value="">
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('last_name'); ?></label>
                        <input type="text" class="form-control" name="l_name" data-validate="required"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" autofocus value="">
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('id_number'); ?></label>
                        <input type="text" class="form-control" name="id_number" data-validate="required"
                            data-message-required="<?php echo get_phrase('value_required'); ?>" autofocus value="">
                    </div>
                </div>
                <div class="clear"></div>
                <br />
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-1" class="control-label"><?php echo get_phrase('email'); ?></label>
                        <input type="text" class="form-control" name="email" value="" data-validate="required">
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-2" class="control-label"><?php echo get_phrase('phone'); ?></label>
                        <input type="text" class="form-control" name="phone" value="" data-validate="required">
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-2" control-label"><?php echo get_phrase('alt_phone'); ?></label>
                        <input type="text" class="form-control" name="alt_phone" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit"
                            class="btn btn-success btn-block"><?php echo get_phrase('add_parent'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>