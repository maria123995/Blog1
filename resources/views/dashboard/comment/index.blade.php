@extends('dashboard.layouts.app')

@section('title')

comments
@stop
@section('content')
    <div class="widget-box">
        <div class="widget-header">
            <h5 class="widget-title">
                قائمة التعليقات
            </h5>
            <div class="widget-toolbar">
                <a href="{{ route('dashboard.create-comment') }}" class="btn btn-xs btn-primary">
                    <i class="ace-icon fa fa-plus "></i>
                    إضافة
                </a>
            </div>
        </div>

        <div class="widget-body">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12">

                        <div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h3 class="header smaller lighter blue">jQuery dataTables</h3>

                                    <div class="clearfix">
                                        <div class="pull-right tableTools-container"></div>
                                    </div>
                                    <div class="table-header">
                                        Results for "Latest Registered Domains"
                                    </div>

                                    <!-- div.table-responsive -->

                                    <!-- div.dataTables_borderWrap -->
                                    <div>
                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="center">
                                                        <label class="pos-rel">
                                                            <input type="checkbox" class="ace" />
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </th>
                                                    <th>#</th>
                                                    <th>رقم المستخدم</th>
                                                    <th>رقم البوست</th>
                                                    <th>التعليق</th>
                                                    <th>الاجراءات</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php $i = 0; ?>
                                                @isset($comments)
                                                    @foreach ($comments as $comment)
                                                        <?php $i++; ?>
                                                        <tr>
                                                            <td class="center">
                                                                <label class="pos-rel">
                                                                    <input type="checkbox" class="ace" />
                                                                    <span class="lbl"></span>
                                                                </label>
                                                            </td>
                                                            <td> {{ $i }} </td>
                                                            <td> {{ $comment->user_id }} </td>
                                                            <td> {{ $comment->post_id }} </td>
                                                            <td> {{ $comment->comment }}</td>
                                                            <td>
                                                                <div class="hidden-sm hidden-xs action-buttons">
                                                                    <a class="blue" href="#">
                                                                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                                    </a>

                                                                    <a class="green"
                                                                        href="{{ route('dashboard.edit-comment', $comment->id) }}">
                                                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                                    </a>

                                                                    <a class="red"
                                                                        href="{{ route('dashboard.delete-comment', $comment->id) }}">
                                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                                    </a>
                                                                </div>

                                                                <div class="hidden-md hidden-lg">
                                                                    <div class="inline pos-rel">
                                                                        <button
                                                                            class="btn btn-minier btn-yellow dropdown-toggle"
                                                                            data-toggle="dropdown" data-position="auto">
                                                                            <i
                                                                                class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                                        </button>

                                                                        <ul
                                                                            class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                            <li>
                                                                                <a href="#" class="tooltip-info"
                                                                                    data-rel="tooltip" title="View">
                                                                                    <span class="blue">
                                                                                        <i
                                                                                            class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                                    </span>
                                                                                </a>
                                                                            </li>

                                                                            <li>
                                                                                <a href="#" class="tooltip-success"
                                                                                    data-rel="tooltip" title="Edit">
                                                                                    <span class="green">
                                                                                        <i
                                                                                            class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                                    </span>
                                                                                </a>
                                                                            </li>

                                                                            <li>
                                                                                <a href="#" class="tooltip-error"
                                                                                    data-rel="tooltip" title="Delete">
                                                                                    <span class="red">
                                                                                        <i
                                                                                            class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endisset
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="modal-table" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header no-padding">
                                            <div class="table-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">
                                                    <span class="white">&times;</span>
                                                </button>
                                                Results for "Latest Registered Domains
                                            </div>
                                        </div>

                                        <div class="modal-body no-padding">
                                            <table
                                                class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الاسم</th>
                                                        <th>الايميل</th>
                                                        <th>كلمة المرور</th>
                                                        <th>الاجراءات</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td> </td>
                                                        <td></td>
                                                        <td> </td>
                                                        <td> </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="modal-footer no-margin-top">
                                            <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                                                <i class="ace-icon fa fa-times"></i>
                                                Close
                                            </button>

                                            <ul class="pagination pull-right no-margin">
                                                <li class="prev disabled">
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-angle-double-left"></i>
                                                    </a>
                                                </li>

                                                <li class="active">
                                                    <a href="#">1</a>
                                                </li>

                                                <li>
                                                    <a href="#">2</a>
                                                </li>

                                                <li>
                                                    <a href="#">3</a>
                                                </li>

                                                <li class="next">
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-angle-double-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- PAGE CONTENT ENDS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /section:custom/widget-box -->
@endsection

@section('js')
    <script type="text/javascript">
        jQuery(function($) {
            //initiate dataTables plugin
            var oTable1 =
                $('#dynamic-table')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .dataTable({
                    bAutoWidth: false,
                    "aoColumns": [{
                            "bSortable": false
                        },
                        null, null, null, null,
                        {
                            "bSortable": false
                        }
                    ],
                    "aaSorting": [],

                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,

                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                    //"iDisplayLength": 50
                });
            //oTable1.fnAdjustColumnSizing();


            //TableTools settings
            TableTools.classes.container = "btn-group btn-overlap";
            TableTools.classes.print = {
                "body": "DTTT_Print",
                "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
                "message": "tableTools-print-navbar"
            }

            //initiate TableTools extension
            var tableTools_obj = new $.fn.dataTable.TableTools(oTable1, {
                "sSwfPath": "../assets/js/dataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf", //in Ace demo ../assets will be replaced by correct assets path

                "sRowSelector": "td:not(:last-child)",
                "sRowSelect": "multi",
                "fnRowSelected": function(row) {
                    //check checkbox when row is selected
                    try {
                        $(row).find('input[type=checkbox]').get(0).checked = true
                    } catch (e) {}
                },
                "fnRowDeselected": function(row) {
                    //uncheck checkbox
                    try {
                        $(row).find('input[type=checkbox]').get(0).checked = false
                    } catch (e) {}
                },

                "sSelectedClass": "success",
                "aButtons": [{
                        "sExtends": "copy",
                        "sToolTip": "Copy to clipboard",
                        "sButtonClass": "btn btn-white btn-primary btn-bold",
                        "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
                        "fnComplete": function() {
                            this.fnInfo('<h3 class="no-margin-top smaller">Table copied</h3>\
                                                                                                        <p>Copied ' + (
                                    oTable1
                                    .fnSettings()
                                    .fnRecordsTotal()) +
                                ' row(s) to the clipboard.</p>',
                                1500
                            );
                        }
                    },

                    {
                        "sExtends": "csv",
                        "sToolTip": "Export to CSV",
                        "sButtonClass": "btn btn-white btn-primary  btn-bold",
                        "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
                    },

                    {
                        "sExtends": "pdf",
                        "sToolTip": "Export to PDF",
                        "sButtonClass": "btn btn-white btn-primary  btn-bold",
                        "sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
                    },

                    {
                        "sExtends": "print",
                        "sToolTip": "Print view",
                        "sButtonClass": "btn btn-white btn-primary  btn-bold",
                        "sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",

                        "sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",

                        "sInfo": "<h3 class='no-margin-top'>Print view</h3>\
                                                                                                          <p>Please use your browser's print function to\
                                                                                                          print this table.\
                                                                                                          <br />Press <b>escape</b> when finished.</p>",
                    }
                ]
            });
            //we put a container before our table and append TableTools element to it
            $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));

            //also add tooltips to table tools buttons
            //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
            //so we add tooltips to the "DIV" child after it becomes inserted
            //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
            setTimeout(function() {
                $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
                    var div = $(this).find('> div');
                    if (div.length > 0) div.tooltip({
                        container: 'body'
                    });
                    else $(this).tooltip({
                        container: 'body'
                    });
                });
            }, 200);



            //ColVis extension
            var colvis = new $.fn.dataTable.ColVis(oTable1, {
                "buttonText": "<i class='fa fa-search'></i>",
                "aiExclude": [0, 6],
                "bShowAll": true,
                //"bRestore": true,
                "sAlign": "right",
                "fnLabel": function(i, title, th) {
                    return $(th).text(); //remove icons, etc
                }

            });

            //style it
            $(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')

            //and append it to our table tools btn-group, also add tooltip
            $(colvis.button())
                .prependTo('.tableTools-container .btn-group')
                .attr('title', 'Show/hide columns').tooltip({
                    container: 'body'
                });

            //and make the list, buttons and checkboxed Ace-like
            $(colvis.dom.collection)
                .addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
                .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
                .find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');



            /////////////////////////////////
            //table checkboxes
            $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

            //select/deselect all rows according to table header checkbox
            $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function() {
                var th_checked = this.checked; //checkbox inside "TH" table header

                $(this).closest('table').find('tbody > tr').each(function() {
                    var row = this;
                    if (th_checked) tableTools_obj.fnSelect(row);
                    else tableTools_obj.fnDeselect(row);
                });
            });

            //select/deselect a row when the checkbox is checked/unchecked
            $('#dynamic-table').on('click', 'td input[type=checkbox]', function() {
                var row = $(this).closest('tr').get(0);
                if (!this.checked) tableTools_obj.fnSelect(row);
                else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
            });




            $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
                e.stopImmediatePropagation();
                e.stopPropagation();
                e.preventDefault();
            });


            //And for the first simple table, which doesn't have TableTools or dataTables
            //select/deselect all rows according to table header checkbox
            var active_class = 'active';




            /********************************/
            //add tooltip for small view action buttons in dropdown menu
            $('[data-rel="tooltip"]').tooltip({
                placement: tooltip_placement
            });

            //tooltip placement on right or left
            function tooltip_placement(context, source) {
                var $source = $(source);
                var $parent = $source.closest('table')
                var off1 = $parent.offset();
                var w1 = $parent.width();

                var off2 = $source.offset();
                //var w2 = $source.width();

                if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
                return 'left';
            }

        })
    </script>
@endsection
