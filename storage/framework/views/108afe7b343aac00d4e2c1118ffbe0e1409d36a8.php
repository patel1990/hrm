<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Expense')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="all-button-box row d-flex justify-content-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Expense')): ?>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="all-button-box">
                    <a href="#" data-url="<?php echo e(route('expense.create')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto"
                        data-ajax-popup="true" data-title="<?php echo e(__('Create New Expense')); ?>">
                        <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                    </a>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
            <div class="all-button-box">
                <a href="<?php echo e(route('expense.export')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto">
                    <i class="fa fa-file-excel"></i> <?php echo e(__('Export')); ?>

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
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Account')); ?></th>
                                    <th><?php echo e(__('Payee')); ?></th>
                                    <th><?php echo e(__('Amount')); ?></th>
                                    <th><?php echo e(__('Category')); ?></th>
                                    <th><?php echo e(__('Ref#')); ?></th>
                                    <th><?php echo e(__('Payment')); ?></th>
                                    <th><?php echo e(__('Date')); ?></th>
                                    <th width="3%"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(!empty($expense->account($expense->account_id)) ? $expense->account($expense->account_id)->account_name : ''); ?>

                                        </td>
                                        <td><?php echo e(!empty($expense->payee($expense->payee_id)) ? $expense->payee($expense->payee_id)->payee_name : ''); ?>

                                        </td>
                                        <td><?php echo e(\Auth::user()->priceFormat($expense->amount)); ?></td>
                                        <td><?php echo e(!empty($expense->expense_category($expense->expense_category_id)) ? $expense->expense_category($expense->expense_category_id)->name : ''); ?>

                                        </td>
                                        <td><?php echo e($expense->referal_id); ?></td>
                                        <td><?php echo e(!empty($expense->payment_type($expense->payment_type_id)) ? $expense->payment_type($expense->payment_type_id)->name : ''); ?>

                                        </td>
                                        <td><?php echo e(\Auth::user()->dateFormat($expense->date)); ?></td>
                                        <td class="text-right action-btns">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Expense')): ?>
                                                <a href="#" data-url="<?php echo e(URL::to('expense/' . $expense->id . '/edit')); ?>"
                                                    data-size="lg" data-ajax-popup="true"
                                                    data-title="<?php echo e(__('Edit Expense')); ?>" class="edit-icon"
                                                    data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Expense')): ?>
                                                <a href="#" class="delete-icon" data-toggle="tooltip"
                                                    data-original-title="<?php echo e(__('Delete')); ?>"
                                                    data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                    data-confirm-yes="document.getElementById('delete-form-<?php echo e($expense->id); ?>').submit();"><i
                                                        class="fas fa-trash"></i></a>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['expense.destroy', $expense->id], 'id' => 'delete-form-' . $expense->id]); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/expense/index.blade.php ENDPATH**/ ?>