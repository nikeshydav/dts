<?php
class notifications {
    
    function notifications_list() {
       $sql = "select n.fid,a.id,a.application_no,n.status_id,s.status_name from application a,notifications n, status s  where a.id=n.app_id  and s.id=n.status_id  AND n.notify_status=0";
        $res = mysql_query($sql);
        $i = 0;
        while ($row = mysql_fetch_array($res)) {
            $i++;
            $id = $row['id'];
            $notice_id = $row['fid'];
            $app_no = $row['application_no'];
            $title = $row['status_name'];
            $sid = mt_rand(1, 1000000);
            $compare_title = str_replace('-', '', $title);
           $compare_title = strtolower(str_replace(' ', '', $compare_title));
            switch ($compare_title) {
                case '*followupletteradvertisement':
                    $letter= '*followupletteradvertisement';
                    $paragraph = 'this is testing';
                    break;
                case '*followupletterfinalacceptance':
                    $letter= '*followupletterfinalacceptance';
                    $paragraph = '';
                    break;
                case '*followupletterorderforadvertisement':
                    $letter= '*followupletterorderforadvertisement';
                    break;
                case 'reminderletterearlyexamination':
                    $letter= 'reminderletterearlyexamination';
                    break;
                case '*followupletterearlyexamination':
                    $letter= '*followupletterearlyexamination';
                    break;
                case 'requestlettertm63':
                    $letter= 'requestlettertm63';
                    break;
                case 'reminderlettertm63':
                    $letter= 'reminderlettertm63';
                    break;
                case '*followuplettertm63':
                    $letter= '*followuplettertm63';
                    break;
                case 'requestletterearlyexamination':
                    $letter= 'requestletterearlyexamination';
                    break;
                case 'requestletterorderforadvertisement':
                    $letter= 'requestletterorderforadvertisement';
                    break;
                case 'reminderletterorderforadvertisement':
                    $letter= 'reminderletterorderforadvertisement';
                    break;
                case 'requestletteradvertisement':
                    $letter= 'requestletteradvertisement';
                    break;
                case 'reminderletteradvertisement':
                    $letter= 'reminderletteradvertisement';
                    break;
                case 'requestletterfinalacceptance':
                    $letter= 'requestletterfinalacceptance';
                    break;
                case 'reminderletterfinalacceptance':
                    $letter= 'reminderletterfinalacceptance';
                    break;
                case 'reminderlettercorrectionoferrorsinonlinerecords':
                    $letter= 'reminderlettercorrectionoferrorsinonlinerecords';
                    break;
                case '*followuplettercorrectionoferrorsinonlinerecords':
                    $letter= '*followuplettercorrectionoferrorsinonlinerecords';
                    break;
                case 'reminderlettercorrectionoferrorsinjournaladvertisement':
                    $letter= 'reminderlettercorrectionoferrorsinjournaladvertisement';
                    break;
                case '*followuplettercorrectionoferrorsinjournaladvertisement':
                    $letter= '*followuplettercorrectionoferrorsinjournaladvertisement';
                    break;
                case 'requestlettertm16':
                    $letter= 'requestlettertm16';
                    break;
                case 'reminderlettertm16':
                    $letter= 'reminderlettertm16';
                    break;
                case '*followuplettertm16':
                    $letter= '*followuplettertm16';
                    break;
                case 'requestlettertm57':
                    $letter= 'requestlettertm57';
                    break;
                case 'reminderlettertm57':
                    $letter= 'reminderlettertm57';
                    break;
                case '*followuplettertm57':
                    $letter= '*followuplettertm57';
                    break;
                case 'requestlettertm53':
                    $letter= 'requestlettertm53';
                    break;
                case 'reminderlettertm53':
                    $letter= 'reminderlettertm53';
                    break;
                case '*followuplettertm53':
                    $letter= '*followuplettertm53';
                    break;
                default:
                    $letter = '';
                    break;
            }
            
           echo '<tr><td>' . $i . '</td><td>"<u>' . $title . '</u>" is pending for ' . $app_no . '</td><td><a href="update_notification.php?action=edit&id=' . $id . '&notice_id=' . $notice_id . '"><img class="icon" src="images/done.png" alt="Done" title="Done" /></a>';
           if ($_SESSION['role'] != 'associate') {
                echo '<a href="update_notification.php?action=delete&id=' . $id . '&notice_id=' . $notice_id . '"><img class="icon" src="images/delete.png" alt="Del" title="Delete" /></a>';
            }
            if($letter!=''){
                echo '<a href="notification_word1.php?id=' . $id . '&notice_id=' . $notice_id . '&application='. $app_no .'&compare_title=' . $compare_title .'">download letter</a>';
            }
            //echo '<a href="update_notification.php?action=snooze&id=' . $id . '&notice_id=' . $notice_id . '"><img class="icon" src="images/snooze.png" alt="Snooze" title="Snooze" /></a></td></tr>';
        }
    }

    function notifications_list_for_toe($particular_date) {

        $sql = "select toe,(select application_no from application where id=n.app_id)as application_no,(select status_name from status where id=n.status_id)as status_name from notifications n where DATE(toe)='$particular_date'";
        //exit();
        $res = mysql_query($sql);
        $i = 0;
        while ($row = mysql_fetch_array($res)) {
            $i++;
            $id = $row['id'];
            $notice_id = $row['fid'];
            $app_no = $row['application_no'];
            $title = $row['status_name'];
            $sid = mt_rand(1, 1000000);
            echo '<tr><td>' . $i . '</td><td>"<u>' . $title . '</u>" is pending for ' . $app_no . '</td></tr>';
        }
    }
}
?>
