<div class="card bg-none card-box">
    <?php echo e(Form::open(array('url'=>'payees','method'=>'post'))); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('payee_name',__('Payee Name'))); ?>

                <?php echo e(Form::text('payee_name',null,array('class'=>'form-control','placeholder'=>__('Enter Payee Name')))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('contact_number',__('Contact Number'))); ?>

                <?php echo e(Form::number('contact_number',null,array('class'=>'form-control','placeholder'=>__('Enter Contact Number')))); ?>

            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /var/www/html/resources/views/payees/create.blade.php ENDPATH**/ ?>