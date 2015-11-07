<?php
ini_set("display_errors", "off");
require_once 'include/session.php';
?>
<html> 
 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <title>Event Calendar</title>
   <link rel="stylesheet" href="css/menu.css" />
   <style>
       .date_box a {
           display: block;
height: 100%;
width: 100%;
       }
   </style>
 </head>
 <body>
     <?php
	include_once 'include/menu.php';
?>
     <div style="text-align: center" class="welcome"><h3>Welcome <?php echo ucfirst($_SESSION['username']) ?>!</h3></div>
<?php
class Calendar
{
	function Calendar($date)
	{
		if(empty($date)) $date = time();
		define('NUM_OF_DAYS', date('t',$date));
		define('CURRENT_DAY', date('j',$date));
		define('CURRENT_MONTH_A', date('F',$date));
		define('CURRENT_MONTH_N', date('n',$date));
		define('CURRENT_YEAR', date('Y',$date));
		define('START_DAY', date('w', mktime(0,0,0,CURRENT_MONTH_N,0, CURRENT_YEAR)));
		define('COLUMNS', 7);
		define('PREV_MONTH', $this->prev_month());
		define('NEXT_MONTH', $this->next_month());
	}

	function prev_month()
	{
		return mktime(0,0,0,
				(CURRENT_MONTH_N == 1 ? 12 : CURRENT_MONTH_N - 1),
				(checkdate((CURRENT_MONTH_N == 1 ? 12 : CURRENT_MONTH_N - 1), CURRENT_DAY, (CURRENT_MONTH_N == 1 ? CURRENT_YEAR - 1 : CURRENT_YEAR)) ? CURRENT_DAY : 1),
				(CURRENT_MONTH_N == 1 ? CURRENT_YEAR - 1 : CURRENT_YEAR));
	}
	
	function next_month()
	{
		return mktime(0,0,0,
				(CURRENT_MONTH_N == 12 ? 1 : CURRENT_MONTH_N + 1),
				(checkdate((CURRENT_MONTH_N == 12 ? 1 : CURRENT_MONTH_N + 1) , CURRENT_DAY ,(CURRENT_MONTH_N == 12 ? CURRENT_YEAR + 1 : CURRENT_YEAR)) ? CURRENT_DAY : 1),
				(CURRENT_MONTH_N == 12 ? CURRENT_YEAR + 1 : CURRENT_YEAR));
	}

	function makeCalendar(){
		echo '<table border="2" cellspacing="4" align="center" width="100%" height="80%" id="eventtable"><tr>';
		echo '<td width="30"><a class="datelink" href="?date='.PREV_MONTH.'">&lt;&lt;</a></td>';
		echo '<td colspan="5" style="text-align:center" class="current_month">'.CURRENT_MONTH_A .' - '. CURRENT_YEAR.'</td>';
		echo '<td width="30"><a class="datelink"  href="?date='.NEXT_MONTH.'">&gt;&gt;</a></td>';
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
		
		for($i = 1; $i <= NUM_OF_DAYS; $i++)
		{
			
			/*$event_events='';
			$event_query = 'SELECT * FROM `event_calendar` where particular_date="'.CURRENT_YEAR.'-'.CURRENT_MONTH_N.'-'.$i.'"';
			$event_res = mysql_query($event_query);
			while ($event_row = mysql_fetch_array($event_res)) {
	                       $event_events .= '<div class="event">'.substr($event_row['events'], 0, 20) .'</div>';
				}*/
			
                    if($i == CURRENT_DAY && CURRENT_MONTH_N == date('M') )
                        echo '<td class="date_box"><a href="notifications.php?particular_date='.CURRENT_YEAR.'-'.CURRENT_MONTH_N.'-'.$i.'">'.$i .'</a><span>'.$event_events.'</span></td>';
		     else
			echo '<td class="date_box"><a style="text-decoration:none;color:#000000" href="notifications.php?particular_date='.CURRENT_YEAR.'-'.CURRENT_MONTH_N.'-'.$i.'">'.$i.'</a><span>'.$event_events.'</span></td>';
					
			if((($i + START_DAY) % COLUMNS) == 0 && $i != NUM_OF_DAYS)
			{
				echo '</tr><tr>';
				$rows++;
			}
		}
		echo str_repeat('<td>&nbsp;</td>', (COLUMNS * $rows) - (NUM_OF_DAYS + START_DAY)).'</tr></table>';
	}
        
//        function current_month_year() {
//                echo '<table align="center"  border="1px">';
//                echo '<td width="30"><a class="datelink" href="?current_calendar=yes&new_date='.PREV_MONTH.'">&lt;&lt;</a></td>';
//		echo '<td colspan="5" style="text-align:center" class="current_month">'.CURRENT_MONTH_A .' - '. CURRENT_YEAR.'</td>';
//		echo '<td width="30"><a class="datelink"  href="?current_calendar=yes&new_date='.NEXT_MONTH.'">&gt;&gt;</a></td>';
//		echo '</tr><tr>';
//                echo '<td><b>Sr.No.</b></td><td><b>Events Date</b></td><td><b>Current Events</b></td></tr>';
//         
//                 $query = "SELECT * FROM `event_calendar` where current_month_year='".CURRENT_MONTH_N.'-'.CURRENT_YEAR."'";
//                 $event_res = mysql_query($query);
//                 $i = 0;
//                 while ($event_row = mysql_fetch_array($event_res)) {
//                 $i++;
//                 $event_id = $event_row['id'];
//                 $current_events = $event_row['events'];
//                 $events_date = $event_row['particular_date'];
//                 $new_date = date('d M,Y', strtotime($events_date));
//                 
//                 echo '<tr><td>' . $i . '</td><td>' . $new_date . '</td><td>' . $current_events . '</td></tr>';
//                 }
//        }
}

//if ($_REQUEST['current_calendar'] != 'yes') { ?>
<!--    <title>Event Calendar</title>-->
    <?php
$cal = new Calendar($_GET['date']);
$cal->makeCalendar();
//}
?>
 <!--     current calendar-->
<?php //if ($_REQUEST['current_calendar'] == 'yes') { ?>
<!-- <title>Current Events</title>-->
<?php
//$cal = new Calendar($_GET['new_date']);
//$cal->current_month_year();
//}
?>
</body>
 </html>
