
<div class="card bg-none card-box">
    <?php echo e(Form::model($ip,array('route' => array('edit.ip', $ip->id), 'method' => 'POST'))); ?>

    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('ip',__('IP'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('ip',null,array('class'=>'form-control'))); ?>

        </div>
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>

<?php /**PATH /var/www/html/resources/views/restrict_ip/edit.blade.php ENDPATH**/ ?>