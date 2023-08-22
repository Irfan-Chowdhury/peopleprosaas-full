@extends('landlord.super-admin.layouts.master')
@section('landlord-content')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/kendo.default.v2.min.css') }}" type="text/css">
    <style>

    </style>
@endpush


    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>{{ trans('file.Add Package') }}</h4>
                        </div>
                        <div class="card-body">
                            <p class="italic">
                                <small>{{ trans('file.The field labels marked with * are required input fields') }}.</small>
                            </p>
                            <form id="submitForm" action="{{ route('package.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    @include('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Name',
                                        'fieldType' => 'text',
                                        'nameData' => 'name',
                                        'placeholderData' => 'Basic',
                                        'isRequired' => false,
                                    ])

                                    @include('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Free Trial',
                                        'fieldType' => 'checkbox',
                                        'nameData' => 'is_free_trial',
                                        'placeholderData' => null,
                                        'isRequired' => false,
                                        'valueData' => 1,
                                    ])

                                    @include('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Monthly Fee',
                                        'fieldType' => 'number',
                                        'nameData' => 'monthly_fee',
                                        'placeholderData' => '19',
                                        'isRequired' => false,
                                    ])

                                    @include('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Yearly Fee',
                                        'fieldType' => 'number',
                                        'nameData' => 'yearly_fee',
                                        'placeholderData' => '200',
                                        'isRequired' => false,
                                    ])

                                    @include('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Number of User Account (0 = Infinity)',
                                        'fieldType' => 'number',
                                        'nameData' => 'number_of_user_account',
                                        'placeholderData' => '5',
                                        'isRequired' => false,
                                    ])

                                    @include('landlord.super-admin.partials.input-field',[
                                        'colSize' => 6,
                                        'labelName' => 'Number of Employees (0 = Infinity)',
                                        'fieldType' => 'number',
                                        'nameData' => 'number_of_employee',
                                        'placeholderData' => '10',
                                        'isRequired' => false,
                                    ])

                                    <div class="col-md-12 mt-3">
                                        <h4>{{__('Select Features')}}</h4>
                                    </div>

                                    <div class="col-md-4">
                                        <div id="treeview1"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="treeview2"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="treeview3"></div>
                                    </div>

                                    <input type="hidden" name="features[]" id="features">

                                    <div class="col-md-12 mt-2">
                                        <button type="submit" class="btn btn-primary">{{ trans('file.submit') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
<script type="text/javascript" src="{{ asset('js/kendo.all.min.js') }}"></script>
<script type="text/javascript">
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
                        text: "{{trans('User')}}",
                        checked: true,
                        // expanded: false,
                        // items: [
                        //     {
                        //         id: 'view-user',
                        //         text: '{{__('View User')}}',
                        //         checked: true,
                        //     },
                        //     {
                        //         id: 'store-user',
                        //         text: '{{__('Add User')}}',
                        //         checked: true
                        //     },
                        //     {
                        //         id: 'edit-user',
                        //         text: '{{__('Edit User')}}',
                        //         checked: true
                        //     },
                        //     {
                        //         id: 'delete-user',
                        //         text: "{{__('Delete User')}}",
                        //         checked: true
                        //     },
                        //     {
                        //         id: 'last-login-user',
                        //         text: "{{__('Users Last Login')}}",
                        //         checked: true
                        //     },
                        //     {
                        //         id: 'role-access-user',
                        //         text: "{{__('Assign Role')}}",
                        //         checked: true
                        //     }
                        // ],
                        // checkboxes: {
                        //     checkChildren: true // This will make the parent node adopt the checked state of its children
                        // },
                    },
                    {
                        id: 'details-employee',
                        text: "{{trans('Employee Details')}}",
                        checked: false,
                    },

                    {
                        id: 'customize-setting',
                        text: "{{__('Customize Setting')}}",
                        expanded: true,
                        checked: true,
                        items: [
                            {
                                id: 'role',
                                text: "{{trans('Role')}}",
                                checked: true,
                            },
                            {
                                id: 'general-setting',
                                text: "{{__('General Setting')}}",
                                checked: true,
                            },
                            {
                                id: 'mail-setting',
                                text: "{{__('Mail Setting')}}",
                                checked: false,
                            },
                            {
                                id: 'access-variable_type',
                                text: '{{__('Access Variable Type')}}',
                                checked: false,
                            },
                            {
                                id: 'access-variable_method',
                                text: '{{__('Access Variable Method')}}',
                                checked: false,
                            },
                            {
                                id: 'access-language',
                                text: '{{__('Access Language')}}',
                                checked: false,
                            },
                        ]
                    },
                    {
                        id: 'company',
                        text: "{{trans('Company')}}",
                        checked: true,
                    },
                    {
                        id: 'department',
                        text: "{{trans('Department')}}",
                        checked: true,
                    },
                    {
                        id: 'designation',
                        text: "{{trans('Designation')}}",
                        checked: true,
                    },
                    {
                        id: 'location',
                        text: "{{trans('Location')}}",
                        checked: true,
                    },

                    {
                        id: 'core_hr',
                        text: "{{trans('Core HR')}}",
                        expanded: false,
                        items: [
                            {
                                id: 'view-calendar',
                                text: '{{__('View Calendar')}}',
                            },
                            {
                                id: 'promotion',
                                text: "{{trans('Promotion')}}",
                            },

                            {
                                id: 'award',
                                text: "{{trans('Award')}}",
                            },

                            {
                                id: 'transfer',
                                text: "{{trans('Transfer')}}",
                            },

                            {
                                id: 'travel',
                                text: "{{trans('Travel')}}",
                            },

                            {
                                id: 'resignation',
                                text: "{{trans('Resignation')}}",
                            },

                            {
                                id: 'complaint',
                                text: "{{trans('Complaint')}}",
                            },

                            {
                                id: 'warning',
                                text: "{{trans('Warning')}}",
                            },

                            {
                                id: 'termination',
                                text: "{{trans('Termination')}}",
                            },
                        ]
                    },
                ]
            });

            // $(".k-group").hide();
            onCheck();
        });

        let onCheck = () => {
            checkedNodes = [];
            var treeView1 = $('#treeview1').data("kendoTreeView"),
                message;

            checkedNodeIds(treeView1.dataSource.view(), checkedNodes);

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
@endpush
