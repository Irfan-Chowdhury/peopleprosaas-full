<?php $__env->startSection('landlord-content'); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/kendo.default.v2.min.css')); ?>" type="text/css">
<?php $__env->stopPush(); ?>


    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4><?php echo e(trans('file.Add Package')); ?></h4>
                        </div>
                        <div class="card-body">
                            <p class="italic">
                                <small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small>
                            </p>
                            <form id="submitForm" action="<?php echo e(route('package.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Name',
                                        'fieldType' => 'text',
                                        'nameData' => 'name',
                                        'placeholderData' => 'Basic',
                                        'isRequired' => true,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Free Trial',
                                        'fieldType' => 'checkbox',
                                        'nameData' => 'is_free_trial',
                                        'placeholderData' => null,
                                        'isRequired' => false,
                                        'valueData' => 1,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Monthly Fee',
                                        'fieldType' => 'number',
                                        'nameData' => 'monthly_fee',
                                        'placeholderData' => '19',
                                        'isRequired' => true,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Yearly Fee',
                                        'fieldType' => 'number',
                                        'nameData' => 'yearly_fee',
                                        'placeholderData' => '200',
                                        'isRequired' => true,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Number of User Account (0 = Infinity)',
                                        'fieldType' => 'number',
                                        'nameData' => 'number_of_user_account',
                                        'placeholderData' => '5',
                                        'isRequired' => true,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Number of Employees (0 = Infinity)',
                                        'fieldType' => 'number',
                                        'nameData' => 'number_of_employee',
                                        'placeholderData' => '10',
                                        'isRequired' => true,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="col-md-12 mt-3">
                                        <h4><?php echo e(__('Select Features')); ?></h4>
                                    </div>

                                    <div class="col-md-4">
                                        <div id="treeview1"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div  id="treeview2"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="treeview3"></div>
                                    </div>

                                    <input type="hidden" name="features[]" id="features">

                                    <div class="col-md-12 mt-2">
                                        <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/kendo.all.min.js')); ?>"></script>
<script type="text/javascript">
    let storeURL = "<?php echo e(route('package.store')); ?>";

    (function($) {
        "use strict";

        var checkedNodes;

        $(document).ready(function () {
            $("ul#setting").siblings('a').attr('aria-expanded', 'true');
            $("ul#setting").addClass("show");
            $("ul#setting #role-menu").addClass("active");

            $("#treeview1").empty();
            $("#treeview1").kendoTreeView({
                checkboxes: {
                    checkChildren: true
                },
                check: onCheck,

                dataSource: [
                    {
                        id: 'user',
                        text: "<?php echo e(trans('User')); ?>",
                        checked: true,
                    },
                    {
                        id: 'details-employee',
                        text: "<?php echo e(trans('Employee Details')); ?>",
                        checked: true,
                    },

                    {
                        id: 'customize-setting',
                        text: "<?php echo e(__('Customize Setting')); ?>",
                        expanded: true,
                        checked: true,
                        items: [
                            {
                                id: 'role',
                                text: "<?php echo e(trans('Role')); ?>",
                                checked: true,
                            },
                            {
                                id: 'general-setting',
                                text: "<?php echo e(__('General Setting')); ?>",
                                checked: true,
                            },
                            {
                                id: 'mail-setting',
                                text: "<?php echo e(__('Mail Setting')); ?>",
                                checked: true,
                            },
                            {
                                id: 'access-variable_type',
                                text: '<?php echo e(__('Access Variable Type')); ?>',
                                checked: true,
                            },
                            {
                                id: 'access-variable_method',
                                text: '<?php echo e(__('Access Variable Method')); ?>',
                                checked: true,
                            },
                            {
                                id: 'access-language',
                                text: '<?php echo e(__('Access Language')); ?>',
                                checked: true,
                            },
                        ]
                    },
                    {
                        id: 'company',
                        text: "<?php echo e(trans('Company')); ?>",
                        checked: true,
                    },
                    {
                        id: 'department',
                        text: "<?php echo e(trans('Department')); ?>",
                        checked: true,
                    },
                    {
                        id: 'designation',
                        text: "<?php echo e(trans('Designation')); ?>",
                        checked: true,
                    },
                    {
                        id: 'location',
                        text: "<?php echo e(trans('Location')); ?>",
                        checked: true,
                    },

                    {
                        id: 'core_hr',
                        text: "<?php echo e(trans('Core HR')); ?>",
                        expanded: true,
                        items: [
                            {
                                id: 'view-calendar',
                                text: '<?php echo e(__('View Calendar')); ?>',
                            },
                            {
                                id: 'promotion',
                                text: "<?php echo e(trans('Promotion')); ?>",
                            },

                            {
                                id: 'award',
                                text: "<?php echo e(trans('Award')); ?>",
                            },

                            {
                                id: 'transfer',
                                text: "<?php echo e(trans('Transfer')); ?>",
                            },

                            {
                                id: 'travel',
                                text: "<?php echo e(trans('Travel')); ?>",
                            },

                            {
                                id: 'resignation',
                                text: "<?php echo e(trans('Resignation')); ?>",
                            },

                            {
                                id: 'complaint',
                                text: "<?php echo e(trans('Complaint')); ?>",
                            },

                            {
                                id: 'warning',
                                text: "<?php echo e(trans('Warning')); ?>",
                            },

                            {
                                id: 'termination',
                                text: "<?php echo e(trans('Termination')); ?>",
                            },
                        ]
                    },
                ]
            });


            $("#treeview2").empty();
            $("#treeview2").kendoTreeView({
                checkboxes: {
                    checkChildren: true
                },
                check: onCheck,
                dataSource: [
                    {
                        id: 'timesheet',
                        text: "<?php echo e(trans('Timesheet')); ?>",
                        expanded: true,
                        items: [

                            {
                                id: 'attendance',
                                text: "<?php echo e(trans('Attendance')); ?>",
                            },
                            {
                                id: 'office_shift',
                                text: "<?php echo e(trans('Office Shift')); ?>",
                                checked: true,
                            },

                            {
                                id: 'holiday',
                                text: "<?php echo e(trans('Holiday')); ?>",
                            },
                            {
                                id: 'leave',
                                text: "<?php echo e(trans('Leave')); ?>",
                            },
                        ]
                    },
                    {
                        id: 'payment-module',
                        text: "<?php echo e(trans('Payment Module')); ?>",
                    },
                    {
                        id: 'hr_report',
                        text: "<?php echo e(trans('HR Reports')); ?>",
                    },

                    {
                        id: 'recruitment',
                        text: "<?php echo e(__('Recruitment')); ?>",
                        expanded: true,
                        items: [
                            {
                                id: 'job_post',
                                text: "<?php echo e(trans('Job Post')); ?>",
                            },
                            {
                                id: 'job_candidate',
                                text: "<?php echo e(trans('Job Candidate')); ?>",
                            },
                            {
                                id: 'job_interview',
                                text: "<?php echo e(trans('Job Interview')); ?>",
                            },
                            {
                                id: 'cms',
                                text: "<?php echo e(__('CMS')); ?>",
                            }
                        ]
                    },
                    {
                        id: 'project-management',
                        text: "<?php echo e(trans('Project Management')); ?>",
                        expanded: true,
                        items: [
                            {
                                id: 'project',
                                text: "<?php echo e(trans('Project')); ?>",
                            },
                            {
                                id: 'task',
                                text: "<?php echo e(trans('Task')); ?>",
                            },
                            {
                                id: 'client',
                                text: "<?php echo e(trans('Client')); ?>",
                            },
                            {
                                id: 'invoice',
                                text: "<?php echo e(trans('Invoice')); ?>",
                            },
                        ]
                    },
                    {
                        id: 'ticket',
                        text: "<?php echo e(trans('Ticket')); ?>",
                    },
                    {
                        id: 'file_module',
                        text: "<?php echo e(trans('File Module')); ?>",
                        expanded: true,
                        items: [
                            {
                                id: 'file_manager',
                                text: "<?php echo e(trans('File Manager')); ?>",
                            },
                            {
                                id: 'official_document',
                                text: "<?php echo e(trans('Official Document')); ?>",
                            },
                        ]
                    },
                ]
            });


            $("#treeview3").empty();
            $("#treeview3").kendoTreeView({
                checkboxes: {
                    checkChildren: true
                },
                check: onCheck,
                dataSource: [
                    {
                        id: 'event-meeting',
                        text: "<?php echo e(trans('Event and Meeting')); ?>",
                        expanded: true,
                        items: [
                            {
                                id: 'meeting',
                                text: "<?php echo e(trans('Meeting')); ?>",
                            },
                            {
                                id: 'event',
                                text: "<?php echo e(trans('Event')); ?>",
                            },
                        ]
                    },
                    {
                        id: 'assets-and-category',
                        text: "<?php echo e(trans('Assets And Category')); ?>",
                    },
                    {
                        id: 'finance',
                        text: "<?php echo e(trans('Finance')); ?>",
                        expanded: true,
                        items: [
                            {
                                id: 'account',
                                text: "<?php echo e(trans('Account')); ?>",
                            },
                            {
                                id: 'expense',
                                text: "<?php echo e(trans('Expense')); ?>",
                            },
                            {
                                id: 'deposit',
                                text: "<?php echo e(trans('Deposit')); ?>",
                            },
                            {
                                id: 'payer',
                                text: "<?php echo e(trans('Payer')); ?>",
                            },
                            {
                                id: 'payee',
                                text: "<?php echo e(trans('payee')); ?>",
                            },
                        ]
                    },
                    {
                        id: 'training_module',
                        text: "<?php echo e(trans('Training Module')); ?>",
                        expanded: true,
                        items: [
                            {
                                id: 'trainer',
                                text: "<?php echo e(trans('Trainer')); ?>",
                            },
                            {
                                id: 'training',
                                text: "<?php echo e(trans('Training')); ?>",
                            },
                        ]
                    },
                    {
                        id: 'announcement',
                        text: "<?php echo e(trans('Announcement')); ?>",
                    },
                    {
                        id: 'policy',
                        text: "<?php echo e(trans('Policy')); ?>",
                    },
                    {
                        id: 'performance',
                        text: "<?php echo e(trans('Performance')); ?>",
                        expanded: true,
                        items: [
                            {
                                id: 'goal-type',
                                text: "<?php echo e(trans('Goal Type')); ?>",
                            },
                            {
                                id: 'goal-tracking',
                                text: "<?php echo e(trans('Goal Tracking')); ?>",
                            },
                            {
                                id: 'indicator',
                                text: "<?php echo e(trans('Indicator')); ?>",
                            },
                            {
                                id: 'appraisal',
                                text: "<?php echo e(trans('Appraisal')); ?>",
                            },
                        ]
                    },
                ]
            });
            onCheck();
        });

        let onCheck = () => {
            checkedNodes = [];
            var treeView1 = $('#treeview1').data("kendoTreeView"),
                message;
            var treeView2 = $('#treeview2').data("kendoTreeView"),
                message;
            var treeView3 = $('#treeview3').data("kendoTreeView"),
                message;
            checkedNodeIds(treeView1.dataSource.view(), checkedNodes);
            checkedNodeIds(treeView2.dataSource.view(), checkedNodes);
            checkedNodeIds(treeView3.dataSource.view(), checkedNodes);

            console.log(checkedNodes);
            $('#features').val(checkedNodes);
        }

        let checkedNodeIds = (nodes, checkedNodes) => {
            for (var i = 0; i < nodes.length; i++) {
                if (nodes[i].checked) {
                    getParentIds(nodes[i], checkedNodes);
                    checkedNodes.push(nodes[i].id);
                }

                if (nodes[i].hasChildren) {
                    checkedNodeIds(nodes[i].children.view(), checkedNodes);
                }
            }
        }

        let getParentIds = (node, checkedNodes) => {
            if (node.parent() && node.parent().parent() && checkedNodes.indexOf(node.parent().parent().id) == -1) {
                getParentIds(node.parent().parent(), checkedNodes);
                checkedNodes.push(node.parent().parent().id);
            }
        }

    })(jQuery);
</script>

<script type="text/javascript" src="<?php echo e(asset('js/landlord/common-js/store.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/landlord/common-js/alertMessages.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('landlord.super-admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/packages/create.blade.php ENDPATH**/ ?>