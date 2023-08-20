<?php $__env->startSection('landlord-content'); ?>


    <link rel="stylesheet" href="<?php echo asset('css/kendo.default.v2.min.css') ?>" type="text/css">
    <script type="text/javascript" src="<?php echo asset('js/kendo.all.min.js') ?>"></script>



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
                            <form id="submitForm" action="<?php echo e(route('package.store')); ?>" method="post"></form>
                                <div class="row">
                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Name',
                                        'fieldType' => 'text',
                                        'nameData' => 'name',
                                        'placeholderData' => 'Basic',
                                        'isRequired' => false,
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
                                        'isRequired' => false,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Yearly Fee',
                                        'fieldType' => 'number',
                                        'nameData' => 'yearly_fee',
                                        'placeholderData' => '200',
                                        'isRequired' => false,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Number of User Account (0 = Infinity)',
                                        'fieldType' => 'number',
                                        'nameData' => 'number_of_user_account',
                                        'placeholderData' => '5',
                                        'isRequired' => false,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php echo $__env->make('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Number of Employees (0 = Infinity)',
                                        'fieldType' => 'number',
                                        'nameData' => 'number_of_employee',
                                        'placeholderData' => '10',
                                        'isRequired' => false,
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="col-md-12 mt-3">
                                        <h4><?php echo e(__('Select modules')); ?></h4>
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


                                    <input type="hidden" name="permission_id">
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
<script type="text/javascript">
    (function($) {
        "use strict";

        var checkedNodes;

        let result = <?php echo json_encode($permissionsData); ?>;


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
                                checked: ($.inArray('user', result) >= 0) ? true : false,
                            },
                            {
                                id: 'details-employee',
                                text: "<?php echo e(trans('Employee Details')); ?>",
                                checked: ($.inArray('details-employee', result) >= 0) ? true : false,
                            },

                            {
                                id: 'customize-setting',
                                text: "<?php echo e(__('Customize Setting')); ?>",
                                expanded: true,
                                checked: ($.inArray('customize-setting', result) >= 0) ? true : false,
                                items: [
                                    {
                                        id: 'role',
                                        text: "<?php echo e(trans('Role')); ?>",
                                        checked: ($.inArray('role', result) >= 0) ? true : false,
                                    },
                                    {
                                        id: 'general-setting',
                                        text: "<?php echo e(__('General Setting')); ?>",
                                        expanded: true,
                                        checked: ($.inArray('general-setting', result) >= 0) ? true : false,
                                    },
                                    {
                                        id: 'mail-setting',
                                        text: "<?php echo e(__('Mail Setting')); ?>",
                                        checked: ($.inArray('mail-setting', result) >= 0) ? true : false,
                                    },
                                    {
                                        id: 'access-variable_type',
                                        text: '<?php echo e(__('Access Variable Type')); ?>',
                                        checked: ($.inArray('access-variable_type', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'access-variable_method',
                                        text: '<?php echo e(__('Access Variable Method')); ?>',
                                        checked: ($.inArray('access-variable_method', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'access-language',
                                        text: '<?php echo e(__('Access Language')); ?>',
                                        checked: ($.inArray('access-language', result) >= 0) ? true : false
                                    },
                                ]
                            },

                            {
                                id: 'core_hr',
                                text: "<?php echo e(trans('Core HR')); ?>",
                                expanded: true,
                                checked: ($.inArray('core_hr', result) >= 0) ? true : false,
                                items: [
                                    {
                                        id: 'view-calendar',
                                        text: '<?php echo e(__('View Calendar')); ?>',
                                        checked: ($.inArray('view-calendar', result) >= 0) ? true : false
                                    },
                                    {
                                        id: 'promotion',
                                        text: "<?php echo e(trans('Promotion')); ?>",
                                        checked: ($.inArray('promotion', result) >= 0) ? true : false,
                                    },

                                    {
                                        id: 'award',
                                        text: "<?php echo e(trans('Award')); ?>",
                                        checked: ($.inArray('award', result) >= 0) ? true : false,
                                    },

                                    {
                                        id: 'transfer',
                                        text: "<?php echo e(trans('Transfer')); ?>",
                                        checked: ($.inArray('transfer', result) >= 0) ? true : false,
                                    },

                                    {
                                        id: 'travel',
                                        text: "<?php echo e(trans('Travel')); ?>",
                                        checked: ($.inArray('travel', result) >= 0) ? true : false,
                                    },

                                    {
                                        id: 'resignation',
                                        text: "<?php echo e(trans('Resignation')); ?>",
                                        checked: ($.inArray('resignation', result) >= 0) ? true : false,
                                    },

                                    {
                                        id: 'complaint',
                                        text: "<?php echo e(trans('Complaint')); ?>",
                                        checked: ($.inArray('complaint', result) >= 0) ? true : false,
                                    },

                                    {
                                        id: 'warning',
                                        text: "<?php echo e(trans('Warning')); ?>",
                                        checked: ($.inArray('warning', result) >= 0) ? true : false,
                                    },

                                    {
                                        id: 'termination',
                                        text: "<?php echo e(trans('Termination')); ?>",
                                        checked: ($.inArray('termination', result) >= 0) ? true : false,
                                    },
                                ]
                            },
                            {
                                id: 'timesheet',
                                text: "<?php echo e(trans('Timesheet')); ?>",
                                expanded: true,
                                checked: ($.inArray('timesheet', result) >= 0) ? true : false,
                                items: [

                                    {
                                        id: 'attendance',
                                        text: "<?php echo e(trans('Attendance')); ?>",
                                        checked: ($.inArray('attendance', result) >= 0) ? true : false,
                                    },
                                    {
                                        id: 'office_shift',
                                        text: "<?php echo e(trans('Office Shift')); ?>",
                                        checked: ($.inArray('office_shift', result) >= 0) ? true : false,
                                    },

                                    {
                                        id: 'holiday',
                                        text: "<?php echo e(trans('Holiday')); ?>",
                                        checked: ($.inArray('holiday', result) >= 0) ? true : false,
                                    },
                                    {
                                        id: 'leave',
                                        text: "<?php echo e(trans('Leave')); ?>",
                                        checked: ($.inArray('leave', result) >= 0) ? true : false,
                                    },
                                ]
                            },
                        ]
                    });



            // function that gathers IDs of checked nodes
            function checkedNodeIds(nodes, checkedNodes) {

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

            function getParentIds(node, checkedNodes) {
                if (node.parent() && node.parent().parent() && checkedNodes.indexOf(node.parent().parent().id) == -1) {
                    getParentIds(node.parent().parent(), checkedNodes);
                    checkedNodes.push(node.parent().parent().id);
                }
            }

            // show checked node IDs on datasource change
            function onCheck() {
                checkedNodes = [];
                var treeView1 = $('#treeview1').data("kendoTreeView"),
                    message;
                // var treeView2 = $('#treeview2').data("kendoTreeView"),
                //     message;
                // var treeView3 = $('#treeview3').data("kendoTreeView"),
                //     message;

                //console.log(treeView.dataSource.view());
                //console.log(checkedNodes);

                checkedNodeIds(treeView1.dataSource.view(), checkedNodes);
                // checkedNodeIds(treeView2.dataSource.view(), checkedNodes);
                // checkedNodeIds(treeView3.dataSource.view(), checkedNodes);

                // if (checkedNodes.length > 0) {
                //     message = "IDs of checked nodes: " + checkedNodes.join();
                // } else {
                //     message = "No nodes checked.";
                // }
                // $("#result").html(message);
            }



        });
    })(jQuery);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('landlord.super-admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/packages/create.blade.php ENDPATH**/ ?>