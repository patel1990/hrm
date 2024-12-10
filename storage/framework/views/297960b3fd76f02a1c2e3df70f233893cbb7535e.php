<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Holiday')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
  
        <div class="all-button-box row d-flex justify-content-end mt-2">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Holiday')): ?>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="all-button-box">
                <a href="#" data-url="<?php echo e(route('holiday.create')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto" data-ajax-popup="true" data-title="<?php echo e(__('Create New Holiday')); ?>">
                    <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                </a>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="all-button-box">
                <a href="<?php echo e(route('holidays.export')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fa fa-file-excel"></i> <?php echo e(__('Export')); ?>

                </a>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="all-button-box">
                    <a href="#" class="btn btn-xs btn-white btn-icon-only width-auto"
                        data-url="<?php echo e(route('holidays.file.import')); ?>" data-ajax-popup="true"
                        data-title="<?php echo e(__('Import Holiday CSV file')); ?>">
                        <i class="fa fa-file-csv"></i> <?php echo e(__('Import')); ?>

                    </a>
                </div>
            </div>
            <div class="col-auto">
                <div class="all-button-box">
                <a href="<?php echo e(route('holiday.calender')); ?>" class="action-btn" data-toggle="tooltip" data-original-title="<?php echo e(__('Calender View')); ?>">
                    <i class="fa fa-calendar"></i>
                </a>
                </div>
            </div>
        </div>
   


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-0">
                    <?php echo e(Form::open(array('route' => array('holiday.index'),'method'=>'get','id'=>'holiday_filter'))); ?>

                    <div class="row d-flex justify-content-end mt-2">

                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                            <div class="all-select-box">
                                <div class="btn-box">
                                    <?php echo e(Form::label('start_date',__('Start Date'),['class'=>'text-type'])); ?>

                                    <?php echo e(Form::text('start_date',isset($_GET['start_date'])?$_GET['start_date']:'',array('class'=>'month-btn form-control datepicker'))); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                            <div class="all-select-box">
                                <div class="btn-box">
                                    <?php echo e(Form::label('end_date',__('End Date'),['class'=>'text-type'])); ?>

                                    <?php echo e(Form::text('end_date',isset($_GET['end_date'])?$_GET['end_date']:'',array('class'=>'month-btn form-control datepicker'))); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-auto mt-auto mb-3">
                            <a href="#" class="apply-btn" onclick="document.getElementById('holiday_filter').submit(); return false;" data-toggle="tooltip" data-original-title="<?php echo e(__('apply')); ?>">
                                <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                            </a>
                            <a href="<?php echo e(route('holiday.index')); ?>" class="reset-btn" data-toggle="tooltip" data-original-title="<?php echo e(__('Reset')); ?>">
                                <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
                            </a>

                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Occasion')); ?></th>
                                <?php if(Gate::check('Edit Holiday') || Gate::check('Delete Holiday')): ?>
                                    <th width="3%"><?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            <?php $__currentLoopData = $holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(\Auth::user()->dateFormat($holiday->date)); ?></td>
                                    <td><?php echo e($holiday->occasion); ?></td>
                                    <?php if(Gate::check('Edit Holiday') || Gate::check('Delete Holiday')): ?>
                                        <td class="text-right action-btns">
                                            <span>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Holiday')): ?>
                                                    <a href="#" class="edit-icon" data-url="<?php echo e(route('holiday.edit',$holiday->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Holiday')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Holiday')): ?>
                                                    <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($holiday->id); ?>').submit();">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['holiday.destroy', $holiday->id],'id'=>'delete-form-'.$holiday->id]); ?>

                                                    <?php echo Form::close(); ?>

                                                <?php endif; ?>
                                            </span>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/holiday/index.blade.php ENDPATH**/ ?>