<?php

class notifications {

    function notifications_list() {

        $td = date('Y-m-d');
        $sql = "select n.fid,a.id,a.application_no,n.status_id,s.status_name, n.toe from application a,notifications n, status s  where a.id=n.app_id  and s.id=n.status_id  and (n.snooze='$td' or n.snooze='0000-00-00') AND n.notify_status=0 order by id desc";
        $res = mysql_query($sql);
        $i = 0;
        while ($row = mysql_fetch_array($res)) {
            $i++;
            $id = $row['id'];
            $notice_id = $row['fid'];
            $app_no = $row['application_no'];
            $title = $row['status_name'];
            $dat=$row['toe'];
            $sid = mt_rand(1, 1000000);
            $compare_title = str_replace('-', '', $title);
            $compare_title = strtolower(str_replace(' ', '', $compare_title));
            switch ($compare_title) {
                case 'requestletterissuanceofcertificate':
                    $letter = 'requestletterissuanceofcertificate';
                    $letterFileName = 'request_letter_issuance_of_certificate';
                    break;
                case 'reminderletterissuanceofcertificate':
                    $letter = 'reminderletterissuanceofcertificate';
                    $letterFileName = 'reminder_letter_issuance_of_certificate';
                    break;
                case '*followupletterissuanceofcertificate':
                    $letter = '*followupletterissuanceofcertificate';
                    $letterFileName = '*followup_letter_issuance_of_certificate';
                    break;
                case 'reminderletterreissuanceofcorrectedcertificate':
                    $letter = 'reminderletterreissuanceofcorrectedcertificate';
                    $letterFileName = 'reminder_letter_reissuance_of_corrected_certificate';
                    break;
                case '*followupletterreissuanceofcorrectedcertificate':
                    $letter = '*followupletterreissuanceofcorrectedcertificate';
                    $letterFileName = '*followup_letter_reissuance_of_corrected_certificate';
                    break;
                case 'requestletterrecordalfiling':
                    $letter = 'requestletterrecordalfiling';
                    $letterFileName = 'request_letter_recordal_filing';
                    break;
                case 'reminderletterrecordalfiling':
                    $letter = 'reminderletterrecordalfiling';
                    $letterFileName = 'reminder_letter_recordal_filing';
                    break;
                case '*followupletterrecordalfiling':
                    $letter = '*followupletterrecordalfiling';
                    $letterFileName = '*followup_letter_recordal_filing';
                    break;
                case 'requestlettertm35surrenderofregistration':
                    $letter = 'requestlettertm35surrenderofregistration';
                    $letterFileName = 'request_letter_tm35_surrender_of_registration';
                    break;
                case 'reminderlettertm35surrenderofregistration':
                    $letter = 'reminderlettertm35surrenderofregistration';
                    $letterFileName = 'reminder_letter_tm35_surrender_of_registration';
                    break;
                case '*followuplettertm35surrenderofregistration':
                    $letter = '*followuplettertm35surrenderofregistration';
                    $letterFileName = '*followup_letter_tm35_surrender_of_registration';
                    break;
                case 'requestlettertm38modificationofmark':
                    $letter = 'requestlettertm38modificationofmark';
                    $letterFileName = 'request_letter_tm38_modification_of_mark';
                    break;
                case 'reminderlettertm38modificationofmark':
                    $letter = 'reminderlettertm38modificationofmark';
                    $letterFileName = 'reminder_letter_tm38_modification_of_mark';
                    break;
                case '*followuplettertm38modificationofmark':
                    $letter = '*followuplettertm38modificationofmark';
                    $letterFileName = '*followup_letter_tm38_modification_of_mark';
                    break;
                case 'requestlettertm57review':
                    $letter = 'requestlettertm57review';
                    $letterFileName = 'request_letter_tm57_review';
                    break;
                case 'reminderlettertm57review':
                    $letter = 'reminderlettertm57review';
                    $letterFileName = 'reminder_letter_tm57_review';
                    break;
                case '*followuplettertm57review':
                    $letter = '*followuplettertm57review';
                    $letterFileName = '*followup_letter_tm57_review';
                    break;
                case 'requestlettertm59duplicatecertificate':
                    $letter = 'requestlettertm59duplicatecertificate';
                    $letterFileName = 'request_letter_tm59_duplicate_certificate';
                    break;
                case 'reminderlettertm59duplicatecertificate':
                    $letter = 'reminderlettertm59duplicatecertificate';
                    $letterFileName = 'reminder_letter_tm59_duplicate_certificate';
                    break;
                case '*followuplettertm59duplicatecertificate':
                    $letter = '*followuplettertm59duplicatecertificate';
                    $letterFileName = '*followup_letter_tm59_duplicate_certificate';
                    break;
                case 'requestlettertm70legalcertificate':
                    $letter = 'requestlettertm70legalcertificate';
                    $letterFileName = 'request_letter_tm70_legal_certificate';
                    break;
                case 'reminderlettertm70legalcertificate':
                    $letter = 'reminderlettertm70legalcertificate';
                    $letterFileName = 'reminder_letter_tm70_legal_certificate';
                    break;
                case '*followuplettertm70legalcertificate':
                    $letter = '*followuplettertm70legalcertificate';
                    $letterFileName = '*followup_letter_tm70_legal_certificate';
                    break;
                case 'requestletterinterlocutorypetition':
                    $letter = 'requestletterinterlocutorypetition';
                    $letterFileName = 'request_letter_interlocutory_petition';
                    break;
                case 'reminderletterinterlocutorypetition':
                    $letter = 'reminderletterinterlocutorypetition';
                    $letterFileName = 'reminder_letter_interlocutory_petition';
                    break;
                case '*followupletterinterlocutorypetition':
                    $letter = '*followupletterinterlocutorypetition';
                    $letterFileName = '*followup_letter_interlocutory_petition';
                    break;
                case 'requestlettertm12renewalofregistration':
                    $letter = 'requestlettertm12renewalofregistration';
                    $letterFileName = 'request_letter_tm12_renewal_of_registration';
                    break;
                case 'reminderlettertm12renewalofregistration':
                    $letter = 'reminderlettertm12renewalofregistration';
                    $letterFileName = 'reminder_letter_tm12_renewal_of_registration';
                    break;
                case '*followuplettertm12renewalofregistration':
                    $letter = '*followuplettertm12renewalofregistration';
                    $letterFileName = '*followup_letter_tm12_renewal_of_registration';
                    break;
                case 'requestlettertm13restorationoftrademark':
                    $letter = 'requestlettertm13restorationoftrademark';
                    $letterFileName = 'request_letter_tm13_restoration_of_trademark';
                    break;
                case 'reminderlettertm13restorationoftrademark':
                    $letter = 'reminderlettertm13restorationoftrademark';
                    $letterFileName = 'reminder_letter_tm13_restoration_of_trademark';
                    break;
                case '*followuplettertm13restorationoftrademark':
                    $letter = '*followuplettertm13restorationoftrademark';
                    $letterFileName = '*followup_letter_tm13_restoration_of_trademark';
                    break;
                case 'requestlettertm40reclassification':
                    $letter = 'requestlettertm40reclassification';
                    $letterFileName = 'request_letter_tm40_reclassification';
                    break;
                case 'reminderlettertm40reclassification':
                    $letter = 'reminderlettertm40reclassification';
                    $letterFileName = 'reminder_letter_tm40_reclassification';
                    break;
                case '*followuplettertm40reclassification':
                    $letter = '*followuplettertm40reclassification';
                    $letterFileName = '*followup_letter_tm40_reclassification';
                    break;
                case 'reminderlettercorrectionoferrorsinregistrationcertificate':
                    $letter = 'reminderlettercorrectionoferrorsinregistrationcertificate';
                    $letterFileName = 'reminder_letter_correction_of_errors_in_registration_certificate';
                    break;
                case '*followuplettercorrectionoferrorsinregistrationcertificate':
                case 'followuplettercorrectionoferrorsinregistrationcertificate':
                    $letter = 'followuplettercorrectionoferrorsinregistrationcertificate';
                    $letterFileName = '*followup_letter_correction_of_errors_in_registration_certificate';
                    break;

                /* this is for mail popup starts here */
                case '*mailreseekrenewalinstr':
                    $letter_for_mail = '*mailreseekrenewalinstr';
                    break;
                case '*mailseekrenewalwithsurchargeinstr':
                    $letter_for_mail = '*mailseekrenewalwithsurchargeinstr';
                    break;
                case '*mailchaseforaffidavit':
                    $letter_for_mail = '*mailchaseforaffidavit';
                    break;
                case '*mailchaseforpoa':
                    $letter_for_mail = '*mailchaseforpoa';
                    break;
                case '*mailseekrenewalinstr':
                    $letter_for_mail = '*mailseekrenewalinstr';
                    break;
                /* this is for mail popup end here */

                default:
                    $letter = '';
                    $letterFileName = '';
                    $letter_for_mail = '';
                    break;
            }

            echo '<tr><td>' . $i . '</td><td>"<u>' . $title . '</u>" is pending for ' . $app_no . '</td><td>' . $dat . '</td><td><a href="update_notification.php?action=edit&id=' . $id . '&notice_id=' . $notice_id . '"><img class="icon" src="images/done.png" alt="Done" title="Done" /></a>';
            if ($_SESSION['role'] != 'associate') {
                echo '<a href="update_notification.php?action=delete&id=' . $id . '&notice_id=' . $notice_id . '"><img class="icon" src="images/delete.png" alt="Del" title="Delete" /></a>';
            }
           
            if ($letter != '' && $letter == $compare_title) {
                echo '<a href="notification_word1.php?id=' . $id . '&notice_id=' . $notice_id . '&application=' . $app_no .
                '&compare_title=' . $compare_title . '&letter_filename=' . $letterFileName . '">download letter</a>';
            }
            if ($letter_for_mail != '' && $letter_for_mail == $compare_title) {
                echo '<a class="iframe" href="notification_popup.php?id=' . $id . '&letter_for_mail=' . $letter_for_mail . '">Mail</a>';
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
              $dat=$row['toe'];
            $sid = mt_rand(1, 1000000);
            echo '<tr><td>' . $i . '</td><td>"<u>' . $title . '</u>" is pending for ' . $app_no . '</td><td>' . $dat . '</td></tr>';
        }
    }

}

?>