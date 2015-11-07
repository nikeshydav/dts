<?php

class notifications {

    function notifications_list() {

        $td = date('Y-m-d');
      $sql = "select n.fid,a.id,a.application_no,n.status_id,s.status_name from application a,notifications n, status s  where a.id=n.app_id  and s.id=n.status_id  and (n.snooze='$td' or n.snooze='0000-00-00') AND n.notify_status=0";
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
                case 'requestletterissuanceofcertificate':
                    $letter = 'requestletterissuanceofcertificate';
                    break;
                case 'reminderletterissuanceofcertificate':
                    $letter = 'reminderletterissuanceofcertificate';
                    break;
                case '*followupletterissuanceofcertificate':
                    $letter = '*followupletterissuanceofcertificate';
                    break;
                case 'reminderletterreissuanceofcorrectedcertificate':
                    $letter = 'reminderletterreissuanceofcorrectedcertificate';
                    break;
                case '*followupletterreissuanceofcorrectedcertificate':
                    $letter = '*followupletterreissuanceofcorrectedcertificate';
                    break;
                case 'requestletterrecordalfiling':
                    $letter = 'requestletterrecordalfiling';
                    break;
                case 'reminderletterrecordalfiling':
                    $letter = 'reminderletterrecordalfiling';
                    break;
                case '*followupletterrecordalfiling':
                    $letter = '*followupletterrecordalfiling';
                    break;
                case 'requestlettertm35surrenderofregistration':
                    $letter = 'requestlettertm35surrenderofregistration';
                    break;
                case 'reminderlettertm35surrenderofregistration':
                    $letter = 'reminderlettertm35surrenderofregistration';
                    break;
                case '*followuplettertm35surrenderofregistration':
                    $letter = '*followuplettertm35surrenderofregistration';
                    break;
                case 'requestlettertm38modificationofmark':
                    $letter = 'requestlettertm38modificationofmark';
                    break;
                case 'reminderlettertm38modificationofmark':
                    $letter = 'reminderlettertm38modificationofmark';
                    break;
                case '*followuplettertm38modificationofmark':
                    $letter = '*followuplettertm38modificationofmark';
                    break;
                case 'requestlettertm57':
                    $letter = 'requestlettertm57';
                    break;
                case 'reminderlettertm57':
                    $letter = 'reminderlettertm57';
                    break;
                case '*followuplettertm57':
                    $letter = '*followuplettertm57';
                    break;
                case 'requestlettertm59duplicatecertificate':
                    $letter = 'requestlettertm59duplicatecertificate';
                    break;
                case 'reminderlettertm59duplicatecertificate':
                    $letter = 'reminderlettertm59duplicatecertificate';
                    break;
                case '*followuplettertm59duplicatecertificate':
                    $letter = '*followuplettertm59duplicatecertificate';
                    break;
                case 'requestlettertm70legalcertificate':
                    $letter = 'requestlettertm70legalcertificate';
                    break;
                case 'reminderlettertm70legalcertificate':
                    $letter = 'reminderlettertm70legalcertificate';
                    break;
                case '*followuplettertm70legalcertificate':
                    $letter = '*followuplettertm70legalcertificate';
                    break;
                case 'requestinterlocutorypetition ':
                    $letter = 'requestinterlocutorypetition ';
                    break;
                case 'reminderinterlocutorypetition':
                    $letter = 'reminderinterlocutorypetition';
                    break;
                case '*followupinterlocutorypetition':
                    $letter = '*followupinterlocutorypetition';
                    break;
                case 'requesttm12renewalofregistration':
                    $letter = 'requesttm12renewalofregistration';
                    break;
                case 'remindertm12renewalofregistration':
                    $letter = 'remindertm12renewalofregistration';
                    break;
                case '*followuptm12renewalofregistration':
                    $letter = '*followuptm12renewalofregistration';
                    break;
                case 'requesttm13restorationoftrademark':
                    $letter = 'requesttm13restorationoftrademark';
                    break;
                case 'remindertm13restorationoftrademark':
                    $letter = 'remindertm13restorationoftrademark';
                    break;
                case '*followuptm13restorationoftrademark':
                    $letter = '*followuptm13restorationoftrademark';
                    break;
                case 'requesttm40reclassification':
                    $letter = 'requesttm40reclassification';
                    break;
                case 'remindertm40reclassification':
                    $letter = 'remindertm40reclassification';
                    break;
                case '*followuptm40reclassification':
                    $letter = '*followuptm40reclassification';
                    break;
                default:
                    $letter = '';
                    break;
            }

            echo '<tr><td>' . $i . '</td><td>"<u>' . $title . '</u>" is pending for ' . $app_no . '</td><td><a href="update_notification.php?action=edit&id=' . $id . '&notice_id=' . $notice_id . '"><img class="icon" src="images/done.png" alt="Done" title="Done" /></a>';
            if ($_SESSION['role'] != 'associate') {
                echo '<a href="update_notification.php?action=delete&id=' . $id . '&notice_id=' . $notice_id . '"><img class="icon" src="images/delete.png" alt="Del" title="Delete" /></a>';
            }
            if ($letter != '') {
                echo '<a href="notification_word1.php?id=' . $id . '&notice_id=' . $notice_id . '&application=' . $app_no . '&compare_title=' . $compare_title . '">download letter</a>';
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
