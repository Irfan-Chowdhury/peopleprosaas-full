<?php $__env->startSection('landlord-content'); ?>


<div class="container-fluid mb-3">
    <div class="card">
        <div class="card-header"><h3><?php echo e(__('file.Packages')); ?></h3></div>
        <div class="card-body">
            <a href="<?php echo e(route('package.create')); ?>" class="btn btn-info"><i class="dripicons-plus"></i> <?php echo e(trans('file.Add Package')); ?></a>&nbsp;
        </div>
    </div>
</div>



<div class="table-responsive">
    <table id="dataListTable" class="table">
        <thead>
            <tr>
                <th class="not-exported"></th>
                <th><?php echo e(trans('file.Name')); ?></th>
                <th><?php echo e(trans('file.Free Trial')); ?></th>
                <th><?php echo e(trans('file.Monthly Fee')); ?></th>
                <th><?php echo e(trans('file.Yearly Fee')); ?></th>
                <th><?php echo e(trans('file.Total User Account')); ?></th>
                <th><?php echo e(trans('file.Total Employee')); ?></th>
                <th class="not-exported"><?php echo e(trans('file.Action')); ?></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    let dataTableURL = "<?php echo e(route('package.datatable')); ?>";
    let destroyURL = '/super-admin/packages/destroy/';
</script>

<script type="text/javascript">
        (function ($) {
            "use strict";
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let table = $('#dataListTable').DataTable({
                    initComplete: function() {
                        this.api().columns([1]).every(function() {
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );

                                    column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });

                            column.data().unique().sort().each(function(d, j) {
                                select.append('<option value="' + d + '">' + d +
                                    '</option>');
                                $('select').selectpicker('refresh');
                            });
                        });
                    },
                    responsive: true,
                    fixedHeader: {
                        header: true,
                        footer: true
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: dataTableURL,
                    },
                    columns: [{
                            data: 'id',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'name',
                            name: 'name',
                        },
                        {
                            data: 'is_free_trial',
                            name: 'is_free_trial',
                        },
                        {
                            data: 'monthly_fee',
                            name: 'monthly_fee',
                        },
                        {
                            data: 'yearly_fee',
                            name: 'yearly_fee',
                        },
                        {
                            data: 'number_of_user_account',
                            name: 'number_of_user_account',
                        },
                        {
                            data: 'number_of_employee',
                            name: 'number_of_employee',
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                        }
                    ],

                    "order": [],
                    'language': {
                        'lengthMenu': '_MENU_ <?php echo e(__('records per page')); ?>',
                        "info": '<?php echo e(trans('file.Showing')); ?> _START_ - _END_ (_TOTAL_)',
                        "search": '<?php echo e(trans('file.Search')); ?>',
                        'paginate': {
                            'previous': '<?php echo e(trans('file.Previous')); ?>',
                            'next': '<?php echo e(trans('file.Next')); ?>'
                        }
                    },
                    'columnDefs': [{
                            "orderable": false,
                            'targets': [0, 3],
                        },
                        {
                            'render': function(data, type, row, meta) {
                                if (type == 'display') {
                                    data =
                                        '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                                }

                                return data;
                            },
                            'checkboxes': {
                                'selectRow': true,
                                'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                            },
                            'targets': [0]
                        }
                    ],
                    'select': {
                        style: 'multi',
                        selector: 'td:first-child'
                    },
                    'lengthMenu': [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    dom: '<"row"lfB>rtip',
                    buttons: [{
                            extend: 'pdf',
                            text: '<i title="export to pdf" class="fa fa-file-pdf-o"></i>',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'csv',
                            text: '<i title="export to csv" class="fa fa-file-text-o"></i>',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'print',
                            text: '<i title="print" class="fa fa-print"></i>',
                            exportOptions: {
                                columns: ':visible:Not(.not-exported)',
                                rows: ':visible'
                            },
                        },
                        {
                            extend: 'colvis',
                            text: '<i title="column visibility" class="fa fa-eye"></i>',
                            columns: ':gt(0)'
                        },
                    ],
                });
                new $.fn.dataTable.FixedHeader(table);
            });

        })(jQuery);
</script>

<script type="text/javascript" src="<?php echo e(asset('js/landlord/common-js/delete.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/landlord/common-js/alertMessages.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('landlord.super-admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/peopleprosaas/resources/views/landlord/super-admin/pages/packages/index.blade.php ENDPATH**/ ?>