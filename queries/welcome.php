<!DOCTYPE html>
<html><head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <title>Queries-<?php echo date('j-m-y-g-i'); ?></title>
        <script src="media/js/jquery-1.10.2.js"></script>
        <script src="media/js/jquery-ui.js"></script>
        <style type="text/css" media="screen">
            @import "media/css/demo_page.css";
            @import "media/css/demo_table.css";
            @import "media/css/demo_table_jui.css";
            @import "media/css/themes/base/jquery-ui.css";
            /*@import "media/css/themes/smoothness/jquery-ui-1.7.2.custom.css";*/
            .dataTables_info { padding-top: 0; }
            .dataTables_paginate { padding-top: 0; }
            .css_right { float: right; }
            #example_wrapper .fg-toolbar { font-size: 0.8em }
            #theme_links span { float: left; padding: 2px 10px; }
            .ui-dialog{z-index: 9}
        </style>
        <link type="text/css" media="print" rel="stylesheet" href="media/css/print.css" />
        <script type="text/javascript" src="media/js/complete.js"></script>
        <script>
            $(function () {
                $.post("login.php", function (data) {
                    if (data == 'bug') {
                        window.location.href = '/dts/queries/';
                    }
                });
            });</script>
        <script src="media/js/jquery.min.js" type="text/javascript"></script>
        <script src="media/js/jquery-ui.js" type="text/javascript"></script>
        <script src="media/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="media/js/jquery.dataTables.editable.js"></script>
        <script src="media/js/jquery.jeditable.js" type="text/javascript"></script>
        <script src="media/js/jquery.validate.js" type="text/javascript"></script>
        <script src="media/js/jquery.jeditable.datepicker.js" type="text/javascript"></script>
        <script src="media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function () {
                $(".date").datepicker();//"option", "dateFormat", "yy-mm-dd"

                var id = -1; //simulation of id
                $('#example').dataTable({
                    bJQueryUI: true,
                    "sPaginationType": "full_numbers"
                }).makeEditable({
                    sUpdateURL: "UpdateData.php",
                    "aoColumns": [
                        null,
                        {
                            indicator: 'Saving Subject...',
                            tooltip: 'Click to edit subject',
                            type: 'text',
                            submit: 'Save changes'},
                        {
                            indicator: 'Saving date...',
                            tooltip: 'Click to edit date',
                            type: 'datepicker',
                            dateFormat: 'yy-mm-dd',
                            submit: 'Save changes'
                        },
                        {
                            indicator: 'Saving date...',
                            tooltip: 'Click to edit date',
                            type: 'datepicker',
                            dateFormat: 'yy-mm-dd',
                            submit: 'Save changes'
                        },
                        {
                            indicator: 'Saving name...',
                            tooltip: 'Click to edit name',
                            type: 'text',
                            submit: 'Save changes'
                        },
                        {
                            indicator: 'Saving platforms...',
                            tooltip: 'Click to edit DTS',
                            type: 'text',
                            type: 'select',
                                    data: "{'':'Please select...', 'IP.P':'IP.P','IP.O':'IP.O','IP.O':'IP.O', 'IP.M':'IP.M', 'IP.E':'IP.E', 'IP.C':'IP.C', 'IP.D':'IP.D','IP_L':'IP_L','PATN':'PATN','DESN':'DESN'}",
                            submit: 'Save changes'
                        },
                    ],
                    sAddURL: "AddData.php",
                    sAddHttpMethod: "POST",
                    sDeleteHttpMethod: "GET",
                    sDeleteURL: "DeleteData.php",
                    oAddNewRowButtonOptions: {
                        label: "Add New...",
                        icons: {primary: 'ui-icon-plus'}
                    },
                    oDeleteRowButtonOptions: {
                        label: "Remove",
                        icons: {primary: 'ui-icon-trash'}
                    },
                    oAddNewRowFormOptions: {
                        title: 'Add a new query',
                        show: "blind",
                        hide: "explode",
                        modal: true
                    },
                    sAddDeleteToolbarSelector: ".dataTables_length"

                }).columnFilter({sPlaceHolder: "foot:after",
                    aoColumns: [
                        {},
                        {},
                        {},
                        {},
                        {type: "text"},
                        {},
                    ]
                });


                $(".date").datepicker("option", "dateFormat", "yy-mm-dd");

            });
        </script>

    </head>
    <div class="container" id="container">
        <nav style="height: 40px">
            Welcome ,
            <a href="logout.php" style="float: right">Logout</a>
        </nav>

        <form id="formAddNewRow" action="#" title="Add a new query" style="width:600px;min-width:600px">
            <input type="hidden" name="sno" id="sno" value="sno" rel="0" />
            <label for="subject">Subject Line</label><br />
            <input type="text" name="subject" id="subject" rel="1" />
            <br />
            <label for="receipt_date">Receipt Date</label><br />
            <input type="text" name="receipt_date" class="date" rel="2" />
            <br />
            <label for="deletion_date">Deletion date</label><br />
            <input type="text" name="deletion_date" class="date"  rel="3" />
            <br />
            <label for="name">Name</label><br />
            <input type="text" name="name" rel="4" />
            <br />
            <label for="name">DTS</label><br />
            <select name="dts" rel="5" >
                <option value="">Please select...</option>
                <option value="IP.P">IP.P</option>
                <option value="IP.O">IP.O</option>
                <option value="IP.M">IP.M</option>
                <option value="IP.E">IP.E</option>
                <option value="IP.C">IP.C</option>
                <option value="IP.D">IP.D</option>
                <option value="IP_L">IP_L</option>
                <option value="IP.L">IP.L</option>
                <option value="PATN">PATN</option>
                <option value="DESN">DESN</option>
            </select>
            <br />
        </form>
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
            <thead>
                <tr>
                    <th></th>
                    <th>Subject Line</th>
                    <th width="18%">Receipt Date</th>
                    <th width="18%">Deletion date</th>
                    <th>Name</th>
                    <th>DTS</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Subject Line</th>
                    <th width="18%">Receipt Date</th>
                    <th width="18%">Deletion date</th>
                    <th>Name</th>
                    <th>DTS</th>
                </tr>

            </tfoot>
            <tbody>
                <?php
                include_once 'db.php';
                $s = "select * from query";
                $res = mysql_query($s);
                $i = 1;
                while ($row = mysql_fetch_array($res)) {
                    echo '<tr class="odd_gradeX" id="' . $row['id'] . '">'
                    . '<td>' . $i . '</td>'
                    . '<td>' . stripslashes($row['subject']) . '</td>'
                    . '<td>' . $row['receipt_date'] . '</td>'
                    . '<td class="center">' . $row['deletion_date'] . '</td>'
                    . '<td class="center">' . stripslashes($row['name']) . '</td>'
                    . '<td class="center">' . $row['dts'] . '.</td>'
                    . '</tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>