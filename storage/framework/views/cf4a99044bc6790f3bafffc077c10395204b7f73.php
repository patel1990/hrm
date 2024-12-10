<div class="card bg-none card-box">
    <?php echo e(Form::open(array('url'=>'deposit','method'=>'post'))); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('account_id',__('Account'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('account_id',$accounts,null,array('class'=>'form-control select2','placeholder'=>__('Choose Account')))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('amount',__('Amount'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::number('amount',null,array('class'=>'form-control','placeholder'=>__('Amount'),'step'=>'0.01'))); ?>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('date',__('Date'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('date',null,array('class'=>'form-control datepicker'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('income_category_id',__('Category'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('income_category_id',$incomeCategory,null,array('class'=>'form-control select2','placeholder'=>__('Choose A Category')))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('payer_id',__('Payer'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('payer_id',$payers,null,array('class'=>'form-control select2'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('payment_type_id',__('Payment Method'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('payment_type_id',$paymentTypes,null,array('class'=>'form-control select2','placeholder'=>__('Choose Payment Method')))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('referal_id',__('Ref#'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('referal_id',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('description',__('Description'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Description')))); ?>

            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /var/www/html/resources/views/deposit/create.blade.php ENDPATH**/ ?>