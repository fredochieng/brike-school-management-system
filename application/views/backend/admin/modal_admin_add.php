<div class="modal-header">
    <h4 class="modal-title"><i class="entypo-user-add"></i><span>Add Admin</span></h4>
</div>
<div class="panel-body">
    <?php echo form_open(site_url('admin/admin/create/'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
    <div class="row">
        <div class="col-md-5">

            <div class="form-group">
                <label for="field-1" class="control-label">
                    <?php echo get_phrase('first_name'); ?></label>

                <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>"
                    autofocus value="">
            </div>

        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">

            <div class="form-group">
                <label for="field-1" class="control-label">
                    <?php echo get_phrase('last_name'); ?></label>

                <input type="text" class="form-control" name="last_name" data-validate="required" data-message-required="<?php echo get_phrase('value_required'); ?>"
                    autofocus value="">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-5">

            <div class="form-group">
                <label for="field-1" class="control-label">
                    <?php echo get_phrase('email'); ?></label>
                <input type="text" class="form-control" name="email" value="" data-validate="required">
            </div>

        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">

            <div class="form-group">
                <label for="field-2" class="control-label">
                    <?php echo get_phrase('phone'); ?></label>

                <input type="text" class="form-control" name="phone" value="" data-validate="required">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-5">

            <div class="form-group">
                <label for="field-2" class="control-label">
                    <?php echo get_phrase('address'); ?></label>

                <input type="text" class="form-control" name="address" value="">
            </div>

        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">

            <div class="form-group">
                <label for="field-2" class="control-label">
                    <?php echo get_phrase('password'); ?></label>
                <input type="password" class="form-control" name="password" value="" data-validate="required">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-block">
                        <?php echo get_phrase('add_admin'); ?></button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>