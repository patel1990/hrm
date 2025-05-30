<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Transfer Balance')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="all-button-box row d-flex justify-content-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Transfer Balance')): ?>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="#" data-url="<?php echo e(route('transferbalance.create')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto" data-ajax-popup="true" data-title="<?php echo e(__('Create New Transfer Balance')); ?>">
                <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

            </a>
            </div>
        <?php endif; ?>
         
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
            <a href="<?php echo e(route('transfer_balance.export')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto">
                <i class="fa fa-file-excel"></i> <?php echo e(__('Export')); ?>

            </a>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable" >
                            <thead>
                            <tr>
                                <th><?php echo e(__('From Account')); ?></th>
                                <th><?php echo e(__('To Account')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Payment Method')); ?></th>
                                <th><?php echo e(__('Ref#')); ?></th>
                                <th width="3%"><?php echo e(__('Action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $transferbalances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transferbalance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(!empty($transferbalance->account($transferbalance->from_account_id))?$transferbalance->account($transferbalance->from_account_id)->account_name:''); ?></td>
                                    <td><?php echo e(!empty($transferbalance->account($transferbalance->to_account_id))?$transferbalance->account($transferbalance->to_account_id)->account_name:''); ?></td>
                                    <td><?php echo e(\Auth::user()->dateFormat($transferbalance->date)); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($transferbalance->amount)); ?></td>
                                    <td><?php echo e(!empty($transferbalance->payment_type($transferbalance->payment_type_id))?$transferbalance->payment_type($transferbalance->payment_type_id)->name:''); ?></td>
                                    <td><?php echo e($transferbalance->referal_id); ?></td>
                                    <td class="text-right action-btns">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Transfer Balance')): ?>
                                            <a href="#" data-url="<?php echo e(URL::to('transferbalance/'.$transferbalance->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Transfer Balance')); ?>" class="edit-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="fas fa-pencil-alt"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Transfer Balance')): ?>
                                            <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($transferbalance->id); ?>').submit();"><i class="fas fa-trash"></i></a>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['transferbalance.destroy', $transferbalance->id],'id'=>'delete-form-'.$transferbalance->id]); ?>

                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                    </td>
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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/transferbalance/index.blade.php ENDPATH**/ ?>