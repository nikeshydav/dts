<?php
ini_set("display_errors", "off");
require_once 'include/session.php';
require_once 'configure/connectivity.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Event Calendar</title>
        <link rel="stylesheet" href="css/menu.css" />
        <style>
            .date_box{vertical-align: top;width: 14%;height:90px}
            .date_box a {display: block;height: 100%;width: 100%; }
        </style>
    </head>
    <body>
        <?php
        include_once 'include/menu.php';
        ?>
        <div style="text-align: center" class="welcome"><h3>Welcome <?php echo ucfirst($_SESSION['username']) ?>!</h3></div>
        <?php

        class Calendar {

            function Calendar($date) {
                if (empty($date))
                    $date = time();
                define('NUM_OF_DAYS', date('t', $date));
                define('CURRENT_DAY', date('j', $date));
                define('CURRENT_MONTH_A', date('F', $date));
                define('CURRENT_MONTH_N', date('n', $date));
                define('CURRENT_YEAR', date('Y', $date));
                define('START_DAY', date('w', mktime(0, 0, 0, CURRENT_MONTH_N, 0, CURRENT_YEAR)));
                define('COLUMNS', 7);
                define('PREV_MONTH', $this->prev_month());
                define('NEXT_MONTH', $this->next_month());
            }

            function prev_month() {
                return mktime(0, 0, 0, (CURRENT_MONTH_N == 1 ? 12 : CURRENT_MONTH_N - 1), (checkdate((CURRENT_MONTH_N == 1 ? 12 : CURRENT_MONTH_N - 1), CURRENT_DAY, (CURRENT_MONTH_N == 1 ? CURRENT_YEAR - 1 : CURRENT_YEAR)) ? CURRENT_DAY : 1), (CURRENT_MONTH_N == 1 ? CURRENT_YEAR - 1 : CURRENT_YEAR));
            }

            function next_month() {
                return mktime(0, 0, 0, (CURRENT_MONTH_N == 12 ? 1 : CURRENT_MONTH_N + 1), (checkdate((CURRENT_MONTH_N == 12 ? 1 : CURRENT_MONTH_N + 1), CURRENT_DAY, (CURRENT_MONTH_N == 12 ? CURRENT_YEAR + 1 : CURRENT_YEAR)) ? CURRENT_DAY : 1), (CURRENT_MONTH_N == 12 ? CURRENT_YEAR + 1 : CURRENT_YEAR));
            }

            function makeCalendar() {
                echo '<table border="2" cellspacing="4" align="center" width="100%" height="80%" id="eventtable"><tr>';
                echo '<td width="30"><a class="datelink" href="?date=' . PREV_MONTH . '">&lt;&lt;</a></td>';
                echo '<td colspan="5" style="text-align:center" class="current_month">' . CURRENT_MONTH_A . ' - ' . CURRENT_YEAR . '</td>';
                echo '<td width="30"><a class="datelink"  href="?date=' . NEXT_MONTH . '">&gt;&gt;</a></td>';
                echo '</tr><tr>';
                echo '<td width="30"><strong>Mon</strong></td>';
                echo '<td width="30"><strong>Tue</strong></td>';
                echo '<td width="30"><strong>Wed</strong></td>';
                echo '<td width="30"><strong>Thu</strong></td>';
                echo '<td width="30"><strong>Fri</strong></td>';
                echo '<td width="30"><strong>Sat</strong></td>';
                echo '<td width="30"><strong>Sun</strong></td>';
                echo '</tr><tr>';
                echo str_repeat('<td>&nbsp;</td>', START_DAY);

                $rows = 1;

                for ($i = 1; $i <= NUM_OF_DAYS; $i++) {
                    $alert = $tot_notifications = '';
                    $a_tot = 0;
                    $s = "select a.id, a.fid, a.alert, a.toa,ap.application_no, ap.mark, count(*) as tot from alert a, application ap where a.toa='" . CURRENT_YEAR . "-" . date('m') . "-" . $i . "' and a.toa!='0000-00-00' and a.status='0' and a.del='0000-00-00' and ap.id=a.fid";
                    $sql_alert = mysql_query($s);
                    while ($r_alert = mysql_fetch_array($sql_alert)) {
                        $alert .= $r_alert['alert'] . ", ";
                        $a_tot = $r_alert['tot'];
                    }
                    
                    
                    $s = "select count(*) as tot from alert a where a.toa='" . CURRENT_YEAR . "-" . date('m') . "-" . $i . "' and a.toa!='0000-00-00' and a.status=0 and a.del='0000-00-00' and a.fid=0 GROUP BY a.id";
                    $sql_alert = mysql_query($s);
                    while ($r_alert = mysql_fetch_array($sql_alert)) {
                        $a_tot = $a_tot + $r_alert['tot'] ;
                    }
                    
                    

                    $sql_notifications = mysql_query("select toe,(select application_no from application where id=n.app_id)as application_no,(select status_name from status where id=n.status_id)as status_name from notifications n where DATE(toe)='" . CURRENT_YEAR . "-" . date('m') . "-" . $i . "'");
                    while ($r_notifications = mysql_fetch_array($sql_notifications)) {
                        $tot_notifications .= $r_notifications['alert'] . ", ";
                    }


                    if ($i == CURRENT_DAY && CURRENT_MONTH_N == date('M')) {
                        $style = ' style="background:#999999" ';
                    }
                    echo '<td class="date_box" ' . $style . '><div>&nbsp;</div><div>' . $i . '</div>';
                    if ($tot_notifications != '') {
                        echo '<div><a href="notifications.php?particular_date=' . CURRENT_YEAR . '-' . CURRENT_MONTH_N . '-' . $i . '">Notifications</a></div>';
                    }
                    if ($a_tot != 0 && $_SESSION['role'] == 'admin') {
                        echo '<div><a href="alert.php?particular_date=' . CURRENT_YEAR . '-' . CURRENT_MONTH_N . '-' . $i . '">Alerts(' . $a_tot . ')</a></div>';
                    }
                    
                    if ($_SESSION['role'] == 'admin') {
                        echo '<div><a href="addAlert.php?particular_date=' . CURRENT_YEAR . '-' . CURRENT_MONTH_N . '-' . $i . '">Add Alert</a></div>';
                    }

                    echo '</td>';

                    if ((($i + START_DAY) % COLUMNS) == 0 && $i != NUM_OF_DAYS) {
                        echo '</tr><tr>';
                        $rows++;
                    }
                }

                echo str_repeat('<td>&nbsp;</td>', (COLUMNS * $rows) - (NUM_OF_DAYS + START_DAY)) . '</tr></table>';
            }

        }

        $cal = new Calendar($_GET['date']);
        $cal->makeCalendar();
        ?>
    </body>
</html>
