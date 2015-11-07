<?php
require_once 'include/session.php';
ini_set('display_errors', 'off');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Alert List</title>
        <link rel="stylesheet" href="css/custom.css" />
        <link rel="stylesheet" href="css/menu.css" />
        <?php if ($_SESSION['role'] == '1' || $_SESSION['role'] == '2') { ?>
            <style type="text/css" media="screen">
                @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
                @import "../queries/media/css/demo_page.css";
                @import "../queries/media/css/demo_table.css";
                @import "../queries/media/css/demo_table_jui.css";
                @import "../queries/media/css/themes/base/jquery-ui.css";
                @import "../queries/media/css/themes/smoothness/jquery-ui-1.7.2.custom.css";
                .dataTables_info { padding-top: 0; }
                .dataTables_paginate { padding-top: 0; }
                .css_right { float: right; }
                #example_wrapper .fg-toolbar { font-size: 0.8em }
                #theme_links span { float: left; padding: 2px 10px; }
            </style>
            <script type="text/javascript" src="../queries/media/js/complete.js"></script>
            <script src="../queries/media/js/jquery.min.js" type="text/javascript"></script>
            <script src="../queries/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="../queries/media/js/jquery.dataTables.editable.js"></script>
            <script src="../queries/media/js/jquery.jeditable.js" type="text/javascript"></script>
            <script src="../queries/media/js/jquery-ui.js" type="text/javascript"></script>
            <script src="../queries/media/js/jquery.validate.js" type="text/javascript"></script>
            <script src="../queries/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
            <script type="text/javascript" charset="utf-8">
                $(document).ready(function () {
                    var id = -1;//simulation of id
                    $('#example').dataTable({bJQueryUI: true,
                        "sPaginationType": "full_numbers"
                    }).makeEditable({
                        sUpdateURL: "include/UpdateAlert.php", "aoColumns": [
                            {},
                            {},
                            {},
                            {}, {},
                            {
                                indicator: 'Saving...',
                                tooltip: '.',
                                type: 'text',
                                submit: 'Save'
                            }
                        ],
                        sAddHttpMethod: "GET",
                        sDeleteURL: "include/DeleteAlert.php",
                        oDeleteRowButtonOptions: {
                            label: "Remove",
                            icons: {primary: 'ui-icon-trash'}
                        },
                        sAddDeleteToolbarSelector: ".dataTables_length"

                    }).columnFilter({sPlaceHolder: "foot:after",
                        aoColumns: [
                            {},
                            {type: "text"},
                            {type: "text"},
                            {type: "text"},
                            {type: "text"},
                            {type: "text"},
                            {type: "text"},
                        ]
                    });

                });
            </script>
        <?php
        } else {
            ?>
            <style type="text/css" media="screen">



                .dataTables_info { padding-top: 0; }
                .dataTables_paginate { padding-top: 0; }
                .css_right { float: right; }
                #example_wrapper .fg-toolbar { font-size: 0.8em }
                #theme_links span { float: left; padding: 2px 10px; }
            </style>
            <?php
        }
        ?>
        <?php
        include "configure/connectivity.php";
        ?>
    </head>
    <body> <?php include_once 'include/menu.php'; ?>
        <div class="content1">
            <div class="welcome"><h3>Welcome <?php echo $_SESSION['username'] ?>!</h3></div>
<?php
if (isset($_GET['particular_date'])) {
    ?>
                <div><b>Alerts For : <?php echo $_GET['particular_date'] ?></b></div>
            <?php }
            ?>
            <table  width="100%" id="example" >
                <thead>
                    <tr>
                        <td></td>
                        <td><b>Alert</b></td>
                        <td><b>ALG File.</b></td>
                        <td><b>ALG Ref.</b></td>
                        <td><b>File</b></td>
                        <td><b>Date</b></td>
                        <td><b>Name</b></td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td></td>
                        <td><b>Alert</b></td>
                        <td><b>ALG File.</b></td>
                        <td><b>ALG Ref.</b></td>
                        <td><b>File</b></td>
                        <td><b>Date</b></td>
                        <td><b>Name</b></td>
                    </tr>
                </tfoot>
                <tbody>
<?php
$i = 1;
$date = (isset($_GET['particular_date'])) ? 'a.toa="' . $_GET['particular_date'] . '"' : 'a.toa<="' . date('Y-m-d') . '"';
$s = "select a.id, a.fid, a.alert,a.alert_name, a.toa,a.file_name, ys.all_alg_data, ft.all_alg_file_data from alert a, application ap, alg_file_type ft, year_serialno ys where " . $date . " and a.toa!='0000-00-00' and a.status=0 and a.del='0000-00-00' and ap.id=a.fid and ap.id=ft.alg_file_app_id and ap.id=ys.alg_app_id GROUP BY a.id";
$res = mysql_query($s);
while ($row = mysql_fetch_array($res)) {
    echo '<tr id="' . $row['id'] . '"><td> &nbsp;</td><td>' . $row['alert'] . '</td><td>' . $row['all_alg_file_data'] . '</td><td>' . $row['all_alg_data'] . '</td><td><a href="alert_upload/' . $row['file_name'] . '" download>' . $row['file_name'] . '</a></td><td>' . $row['toa'] . '</td><td>' . $row['alert_name'] . '</td></tr>';
}

/*
 * For Alerts added from calender page.
 */
$s = "select * from alert a where " . $date . " and a.toa!='0000-00-00' and a.status=0 and a.del='0000-00-00' and a.fid=0 GROUP BY a.id";
$res = mysql_query($s);
while ($row = mysql_fetch_array($res)) {
    echo '<tr id="' . $row['id'] . '"><td> &nbsp;</td><td>' . $row['alert'] . '</td><td>' . $row['dummy_ref'] . '</td><td>' . $row['dummy_file'] . '</td><td><a href="alert_upload/' . $row['file_name'] . '" download>' . $row['file_name'] . '</a></td><td>' . $row['toa'] . '</td><td>' . $row['alert_name'] . '</td></tr>';
}
?>
                </tbody>
            </table>
        </div>
        <style>
            tbody > tr > td:first-child:before{content: "\f096";font-family: FontAwesome;}
            tbody > tr.row_selected > td:first-child:before{content: "\f046";}
        </style>
    </body>
</html>