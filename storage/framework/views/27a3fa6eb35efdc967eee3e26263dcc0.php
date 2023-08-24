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
                            <h4><?php echo e(trans('file.Edit Package')); ?></h4>
                        </div>
                        <div class="card-body">
                            <p class="italic">
                                <small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small>
                            </p>
                            <form id="updateForm" action="<?php echo e(route('package.update', $package->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="package_id" id="modelId" value="<?php echo e($package->id); ?>">

                                <div class="row">
                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Name',
                                        'fieldType' => 'text',
                                        'nameData' => 'name',
                                        'placeholderData' => 'Basic',
                                        'isRequired' => false,
                                        'valueData' => $package->name
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Free Trial',
                                        'fieldType' => 'checkbox',
                                        'nameData' => 'is_free_trial',
                                        'placeholderData' => null,
                                        'isRequired' => false,
                                        'isChecked' => $package->is_free_trial ? true : false
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Monthly Fee',
                                        'fieldType' => 'number',
                                        'nameData' => 'monthly_fee',
                                        'placeholderData' => '19',
                                        'isRequired' => false,
                                        'valueData' => $package->monthly_fee ?? null
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Yearly Fee',
                                        'fieldType' => 'number',
                                        'nameData' => 'yearly_fee',
                                        'placeholderData' => '200',
                                        'isRequired' => false,
                                        'valueData' => $package->yearly_fee ?? null
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Number of User Account (0 = Infinity)',
                                        'fieldType' => 'number',
                                        'nameData' => 'number_of_user_account',
                                        'placeholderData' => '5',
                                        'isRequired' => false,
                                        'valueData' => $package->number_of_user_account ?? 0
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Number of Employees (0 = Infinity)',
                                        'fieldType' => 'number',
                                        'nameData' => 'number_of_employee',
                                        'placeholderData' => '10',
                                        'isRequired' => false,
                                        'valueData' => $package->number_of_employee ?? 0
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
    let updateURL = '/super-admin/packages/update/';

    (function($) {
        "use strict";

        var checkedNodes;

        let permissionNames = <?php echo json_encode($permissionNames); ?>;
        console.log(permissionNames);

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
                        checked: ($.inArray('user', permissionNames) >= 0) ? true : false,
                    },
                    {
                        id: 'details-employee',
                        text: "<?php echo e(trans('Employee Details')); ?>",
                        checked: ($.inArray('details-employee', permissionNames) >= 0) ? true : false,
                    },

                    {
                        id: 'customize-setting',
                        text: "<?php echo e(__('Customize Setting')); ?>",
                        expanded: true,
                        checked: ($.inArray('customize-setting', permissionNames) >= 0) ? true : false,
                        items: [
                            {
                                id: 'role',
                                text: "<?php echo e(trans('Role')); ?>",
                                checked: ($.inArray('role', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'general-setting',
                                text: "<?php echo e(__('General Setting')); ?>",
                                checked: ($.inArray('general-setting', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'mail-setting',
                                text: "<?php echo e(__('Mail Setting')); ?>",
                                checked: ($.inArray('mail-setting', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'access-variable_type',
                                text: '<?php echo e(__('Access Variable Type')); ?>',
                                checked: ($.inArray('access-variable_type', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'access-variable_method',
                                text: '<?php echo e(__('Access Variable Method')); ?>',
                                checked: ($.inArray('access-variable_method', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'access-language',
                                text: '<?php echo e(__('Access Language')); ?>',
                                checked: ($.inArray('access-language', permissionNames) >= 0) ? true : false,
                            },
                        ]
                    },
                    {
                        id: 'company',
                        text: "<?php echo e(trans('Company')); ?>",
                        checked: ($.inArray('company', permissionNames) >= 0) ? true : false,
                    },
                    {
                        id: 'department',
                        text: "<?php echo e(trans('Department')); ?>",
                        checked: ($.inArray('department', permissionNames) >= 0) ? true : false,
                    },
                    {
                        id: 'designation',
                        text: "<?php echo e(trans('Designation')); ?>",
                        checked: ($.inArray('designation', permissionNames) >= 0) ? true : false,
                    },
                    {
                        id: 'location',
                        text: "<?php echo e(trans('Location')); ?>",
                        checked: ($.inArray('location', permissionNames) >= 0) ? true : false,
                    },

                    {
                        id: 'core_hr',
                        text: "<?php echo e(trans('Core HR')); ?>",
                        expanded: true,
                        checked: ($.inArray('core_hr', permissionNames) >= 0) ? true : false,
                        items: [
                            {
                                id: 'view-calendar',
                                text: '<?php echo e(__('View Calendar')); ?>',
                                checked: ($.inArray('view-calendar', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'promotion',
                                text: "<?php echo e(trans('Promotion')); ?>",
                                checked: ($.inArray('promotion', permissionNames) >= 0) ? true : false,
                            },

                            {
                                id: 'award',
                                text: "<?php echo e(trans('Award')); ?>",
                                checked: ($.inArray('award', permissionNames) >= 0) ? true : false,
                            },

                            {
                                id: 'transfer',
                                text: "<?php echo e(trans('Transfer')); ?>",
                                checked: ($.inArray('transfer', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'travel',
                                text: "<?php echo e(trans('Travel')); ?>",
                                checked: ($.inArray('travel', permissionNames) >= 0) ? true : false,
                            },

                            {
                                id: 'resignation',
                                text: "<?php echo e(trans('Resignation')); ?>",
                                checked: ($.inArray('resignation', permissionNames) >= 0) ? true : false,
                            },

                            {
                                id: 'complaint',
                                text: "<?php echo e(trans('Complaint')); ?>",
                                checked: ($.inArray('complaint', permissionNames) >= 0) ? true : false,
                            },

                            {
                                id: 'warning',
                                text: "<?php echo e(trans('Warning')); ?>",
                                checked: ($.inArray('warning', permissionNames) >= 0) ? true : false,
                            },

                            {
                                id: 'termination',
                                text: "<?php echo e(trans('Termination')); ?>",
                                checked: ($.inArray('termination', permissionNames) >= 0) ? true : false,
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
                                checked: ($.inArray('attendance', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'office_shift',
                                text: "<?php echo e(trans('Office Shift')); ?>",
                                checked: ($.inArray('office_shift', permissionNames) >= 0) ? true : false,
                            },

                            {
                                id: 'holiday',
                                text: "<?php echo e(trans('Holiday')); ?>",
                                checked: ($.inArray('holiday', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'leave',
                                text: "<?php echo e(trans('Leave')); ?>",
                                checked: ($.inArray('leave', permissionNames) >= 0) ? true : false,
                            },
                        ]
                    },
                    {
                        id: 'payment-module',
                        text: "<?php echo e(trans('Payment Module')); ?>",
                        checked: ($.inArray('payment-module', permissionNames) >= 0) ? true : false,
                    },
                    {
                        id: 'hr_report',
                        text: "<?php echo e(trans('HR Reports')); ?>",
                        checked: ($.inArray('hr_report', permissionNames) >= 0) ? true : false,
                    },

                    {
                        id: 'recruitment',
                        text: "<?php echo e(__('Recruitment')); ?>",
                        expanded: true,
                        checked: ($.inArray('recruitment', permissionNames) >= 0) ? true : false,
                        items: [
                            {
                                id: 'job_post',
                                text: "<?php echo e(trans('Job Post')); ?>",
                                checked: ($.inArray('job_post', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'job_candidate',
                                text: "<?php echo e(trans('Job Candidate')); ?>",
                                checked: ($.inArray('job_candidate', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'job_interview',
                                text: "<?php echo e(trans('Job Interview')); ?>",
                                checked: ($.inArray('job_interview', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'cms',
                                text: "<?php echo e(__('CMS')); ?>",
                                checked: ($.inArray('cms', permissionNames) >= 0) ? true : false,
                            }
                        ]
                    },
                    {
                        id: 'project-management',
                        text: "<?php echo e(trans('Project Management')); ?>",
                        checked: ($.inArray('project-management', permissionNames) >= 0) ? true : false,
                        expanded: true,
                        items: [
                            {
                                id: 'project',
                                text: "<?php echo e(trans('Project')); ?>",
                                checked: ($.inArray('project', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'task',
                                text: "<?php echo e(trans('Task')); ?>",
                                checked: ($.inArray('task', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'client',
                                text: "<?php echo e(trans('Client')); ?>",
                                checked: ($.inArray('client', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'invoice',
                                text: "<?php echo e(trans('Invoice')); ?>",
                                checked: ($.inArray('invoice', permissionNames) >= 0) ? true : false,
                            },
                        ]
                    },
                    {
                        id: 'ticket',
                        text: "<?php echo e(trans('Ticket')); ?>",
                        checked: ($.inArray('ticket', permissionNames) >= 0) ? true : false,
                    },
                    {
                        id: 'file_module',
                        text: "<?php echo e(trans('File Module')); ?>",
                        checked: ($.inArray('file_module', permissionNames) >= 0) ? true : false,
                        expanded: true,
                        items: [
                            {
                                id: 'file_manager',
                                text: "<?php echo e(trans('File Manager')); ?>",
                                checked: ($.inArray('file_manager', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'official_document',
                                text: "<?php echo e(trans('Official Document')); ?>",
                                checked: ($.inArray('official_document', permissionNames) >= 0) ? true : false,
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
                        checked: ($.inArray('event-meeting', permissionNames) >= 0) ? true : false,
                        expanded: true,
                        items: [
                            {
                                id: 'meeting',
                                text: "<?php echo e(trans('Meeting')); ?>",
                                checked: ($.inArray('meeting', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'event',
                                text: "<?php echo e(trans('Event')); ?>",
                                checked: ($.inArray('event', permissionNames) >= 0) ? true : false,
                            },
                        ]
                    },
                    {
                        id: 'assets-and-category',
                        text: "<?php echo e(trans('Assets And Category')); ?>",
                        checked: ($.inArray('assets-and-category', permissionNames) >= 0) ? true : false,
                    },
                    {
                        id: 'finance',
                        text: "<?php echo e(trans('Finance')); ?>",
                        checked: ($.inArray('finance', permissionNames) >= 0) ? true : false,
                        expanded: true,
                        items: [
                            {
                                id: 'account',
                                text: "<?php echo e(trans('Account')); ?>",
                                checked: ($.inArray('account', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'expense',
                                text: "<?php echo e(trans('Expense')); ?>",
                                checked: ($.inArray('expense', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'deposit',
                                text: "<?php echo e(trans('Deposit')); ?>",
                                checked: ($.inArray('deposit', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'payer',
                                text: "<?php echo e(trans('Payer')); ?>",
                                checked: ($.inArray('payer', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'payee',
                                text: "<?php echo e(trans('payee')); ?>",
                                checked: ($.inArray('payee', permissionNames) >= 0) ? true : false,
                            },
                        ]
                    },
                    {
                        id: 'training_module',
                        text: "<?php echo e(trans('Training Module')); ?>",
                        checked: ($.inArray('training_module', permissionNames) >= 0) ? true : false,
                        expanded: true,
                        items: [
                            {
                                id: 'trainer',
                                text: "<?php echo e(trans('Trainer')); ?>",
                                checked: ($.inArray('trainer', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'training',
                                text: "<?php echo e(trans('Training')); ?>",
                                checked: ($.inArray('training', permissionNames) >= 0) ? true : false,
                            },
                        ]
                    },
                    {
                        id: 'announcement',
                        text: "<?php echo e(trans('Announcement')); ?>",
                        checked: ($.inArray('announcement', permissionNames) >= 0) ? true : false,
                    },
                    {
                        id: 'policy',
                        text: "<?php echo e(trans('Policy')); ?>",
                        checked: ($.inArray('policy', permissionNames) >= 0) ? true : false,
                    },
                    {
                        id: 'performance',
                        text: "<?php echo e(trans('Performance')); ?>",
                        checked: ($.inArray('performance', permissionNames) >= 0) ? true : false,
                        expanded: true,
                        items: [
                            {
                                id: 'goal-type',
                                text: "<?php echo e(trans('Goal Type')); ?>",
                                checked: ($.inArray('goal-type', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'goal-tracking',
                                text: "<?php echo e(trans('Goal Tracking')); ?>",
                                checked: ($.inArray('goal-tracking', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'indicator',
                                text: "<?php echo e(trans('Indicator')); ?>",
                                checked: ($.inArray('indicator', permissionNames) >= 0) ? true : false,
                            },
                            {
                                id: 'appraisal',
                                text: "<?php echo e(trans('Appraisal')); ?>",
                                checked: ($.inArray('appraisal', permissionNames) >= 0) ? true : false,
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


        // $(document).ready(function() {
        //     $("#updateForm").on("submit",function(e){
        //         e.preventDefault();
        //         let modelId = $('#modelId').val();
        //         $('#updateButton').text('Updating...');
        //         $.post({
        //             url: updateURL + modelId,
        //             data: new FormData(this),
        //             contentType: false,
        //             cache: false,
        //             processData: false,
        //             dataType: "json",
        //             error: function(response) {
        //                 console.log(response);
        //                 let htmlContent = prepareMessage(response);
        //                 displayErrorMessage(htmlContent);
        //                 $('#updateButton').text('Update');
        //             },
        //             success: function (response) {
        //                 console.log(response);
        //                 displaySuccessMessage(response.success);
        //                 $('#dataListTable').DataTable().ajax.reload();
        //                 $('#updateForm')[0].reset();
        //                 $("#editModal").modal('hide');
        //                 $('#updateButton').text('Update');
        //             }
        //         });
        //     });
        // });

    })(jQuery);
</script>

<script type="text/javascript" src="<?php echo e(asset('js/landlord/common-js/update.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/landlord/common-js/alertMessages.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('landlord.super-admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/packages/edit.blade.php ENDPATH**/ ?>