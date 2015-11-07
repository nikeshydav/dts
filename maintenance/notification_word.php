<?php

ini_set("display_errors", "off");
header("Content-Type: application/vnd.ms-word");
//header("Content-disposition: inline; filename=search-".$_GET['application']."-".date('dmY-H:i:s') .".doc");
header("Content-disposition: inline; filename=search-" . $_GET['application'] . "_" . $_GET['compare_title'] . ".doc");
header("Pragma: no-cache");
header("Expires: 0");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo '<body><table align="center" width="800" border="0">
  <tr>
    <td width="171" align="left"><img src="http://algindia.in/maintenancenew/images/welcome_word1.jpg" /></td>
    <td width="819"><div align="right"><b>ALG India Law Offices</b><br />
      30 Siri Fort Road,<br />
      New Delhi - 110049<br />
      (T) : +91.11.2625.2244<br />
      (F) : +91.11.2625.1585<br />
      (E): trademarks@algindia.com<br />
    </div></td>
  </tr>
  <tr>
    <td colspan="2"><hr /></td>
  </tr>
  <tr>
    <td colspan="2">';

$app_id = $_GET['id'];
$fid = $_GET['notice_id'];
$paragraph = $_GET['paragraph'];

include "class.docket.php";
$obj = new docket();

$sql_noti = "select status_id from notifications where app_id = $app_id and fid = $fid";
$res_noti = mysql_query($sql_noti);
$row_noti = mysql_fetch_array($res_noti);
$status_id = $row_noti['status_id'];

$sql_status = "select status_name from status where id = $status_id";
$res_status = mysql_query($sql_status);
$row_status = mysql_fetch_array($res_status);
$status_name = $row_status['status_name'];

$sql = "select *,(SELECT name FROM user WHERE id = a.applicant) AS applicant from application a where id = $app_id";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$appli = $row['application_no'];
$class = $row['classes'];
$trademark = $row['mark'];
$jurisdiction = $row['jurisdiction'];
$applicant = $row['applicant'];
$fillingdate = $row['filing_date'];
$date_filling = date('F d, Y', strtotime($fillingdate));
$currentDate = date("d.m.Y");

$para11 = "We, ALG India Law Offices, on behalf of our client <b>$applicant</b> (the Registrant), hereby request you to kindly expedite the process of issuance of Registration Certificate [No. 558270 dated September 21, 2006] under Section 23(2) of the Trade Marks Act, 1999 for the subject registration with as of date $date_filling.
<br><br> 
We shall be grateful if the needful is done at the earliest.";
$para12 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b> (the Registrant) wish to inform you that we have submitted the original Registration Certificate [No. 1112928 dated August 20, 2013] pertaining to the subject registration on $date_filling at the TM Office for corrections of errors in the Registration Certificate.
<br><br>
We hereby request you to kindly have the corrections made and expedite the process of issuance of fresh and corrected Registration Certificate under Section 23(4) of the Trade Marks Act, 1999 at the earliest.
";
$para13 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b>, would like to inform you that the Form TM-24/TM-33/TM-34/TM-50 [filed on December 30, 2011 for recordal of assignment/ recordal of merger/ change of registrant’s name/ change of legal entity/ change of registrant’s principal address/ change of address of service] in the subject registration with as of date $date_filling is yet to be taken on record by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and the necessary order/s for recordal under Section 45/58 of the Trade Marks Act, 1999 or Rule 91 of the Trade Marks Rules, 2002 be passed.
    ";
$para14 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b>, would like to inform you that the Form TM-35 [filed on December 30, 2011 for cancellation of entry in the register of trademarks] in the subject registration with as of date $date_filling is yet to be taken on record by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and the necessary order/s for recordal under Section 58(1)(c) of the Trade Marks Act, 1999 be passed.
<br><br>
If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.
";
$para15 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b>, would like to inform you that the Form TM-38 [filed on December 30, 2011 for alteration of the mark] in the subject registration with as of date $date_filling is yet to be taken on record by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and the necessary order/s for recordal under Section 59 of the Trade Marks Act, 1999 be passed.
<br><br>
If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.
";
$para16 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b> (the Registrant) hereby request you to kindly fix a fresh date of hearing in the subject registration with as of date $date_filling, pursuant to the Form TM-57 filed by us on August 6, 2010 for review of the Registrar’s decision/order dated June 7, 2010 under Section 127(c) of the Trade Marks Act, 1999.
   ";
$para17 = "We, ALG India Law Offices, on behalf of our client <b>$applicant</b> (the Registrant), hereby request you to kindly expedite the process of issuance of Duplicate Registration Certificate [having No. 558270 dated September 21, 2006] pursuant to the Form TM-59 filed on February 13, 2012 in the subject registration with as of date $date_filling under Rule 62(3) of the Trade Marks Rules, 2002.
 <br><br>
We shall be grateful if the needful is done at the earliest.
";
$para18 = "We, ALG India Law Offices, on behalf of our client <b>$applicant</b> (the Registrant), hereby request you to kindly expedite the issuance of Legal Certificate pursuant to the Form TM-70 filed on February 13, 2012 under Section 137 of the Trade Marks Act, 1999 in the subject registration with as of date $date_filling.
 <br><br>
We shall be grateful if the needful is done at the earliest.";
$para19 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b> (the Registrant) hereby request you to kindly fix a date of hearing on the Interlocutory Petition filed by us on August 6, 2010 in the subject registration with as of date $date_filling.
    ";
$para111 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b>, would like to inform you that the Form TM-12 [filed on December 23, 2013] in the subject registration with as of date $date_filling is yet to be taken on record by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and the necessary order/s for renewal under Section 25 of the Trade Marks Act, 1999 be passed.
<br><br>
If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.";
$para112 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b>, would like to inform you that the Form TM-13 along with TM-12 [filed on December 23, 2013] in the subject registration with as of date $date_filling is yet to be taken on record by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and the necessary order/s for restoration and renewal under Section 25(4) of the Trade Marks Act, 1999 be passed.
<br><br>
If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.";
$para113 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b>, would like to inform you that the Form TM-40 [filed on December 23, 2013] in the subject registration with as of date $date_filling is yet to be taken on record by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and the necessary order/s for reclassification of specification under Rule 101(1) of the Trade Marks Rules, 2002 to new class 43 be passed.
<br><br>
If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.
";
$para21 = "<b>Enclosed:</b> Power of Attorney";
$para22 = "<b>Enclosed:</b> Power of Attorney<br>
	      Copy of Letter filed on October 20, 2013";
$para23 = "<b>Enclosed:</b> Power of Attorney<br>
	      Form TM-24/TM-33/TM-34/TM-50";
$para24 = "<b>Enclosed:</b> Power of Attorney<br>
	      Form TM-35";
$para25 = "<b>Enclosed:</b> Power of Attorney<br>
	      Form TM-38";
$para26 = "<b>Enclosed:</b> Power of Attorney<br>
	      Form TM-57<br>
	      Copy of Order dated June 7, 2010";
$para27 = "<b>Enclosed:</b> Power of Attorney<br>
	      Form TM-59";
$para28 = "<b>Enclosed:</b> Power of Attorney<br>
	      Form TM-70";
$para28 = "<b>Enclosed:</b> Power of Attorney<br>
	      Form TM-70";
$para29 = "Power of Attorney<br>
      Interlocutory Petition";
$para210 = "<b>Enclosed:</b> Power of Attorney<br>
      Form TM-12";
$para211 = "<b>Enclosed:</b> Power of Attorney<br>
      Form TM-13<br>
      Form TM-12";
$para212 = "<b>Enclosed:</b> Power of Attorney<br>
      Form TM-40";
$para31 = 'All communications relating to this registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.';


switch ($_GET['compare_title']) {

    case '*requestletterissuanceofcertificate':
        $para1 = $para11;
        $para2 = $para21;
        $para3 = $para31;
        break;
    case '*reminderletterissuanceofcertificate':
        $para1 = $para11;
        $para2 = $para21;
        $para3 = $para31;
        break;
    case '*followupletterissuanceofcertificate':
        $para1 = $para11;
        $para2 = $para21;
        $para3 = $para31;
        break;
    case '*requestletterreissuanceofcorrectedcertificate':
        $para1 = $para12;
        $para2 = $para22;
        $para3 = $para31;
        break;
    case '*reminderletterreissuanceofcorrectedcertificate':
        $para1 = $para12;
        $para2 = $para22;
        $para3 = $para31;
        break;
    case '*followupletterreissuanceofcorrectedcertificate':
        $para1 = $para12;
        $para2 = $para22;
        $para3 = $para31;
        break;
    case '*requestletterrecordalfiling':
        $para1 = $para13;
        $para2 = $para23;
        $para3 = $para31;
        break;
    case '*reminderletterrecordalfiling':
        $para1 = $para13;
        $para2 = $para23;
        $para3 = $para31;
        break;
    case '*followupletterrecordalfiling':
        $para1 = $para13;
        $para2 = $para23;
        $para3 = $para31;
        break;
    case '*requestlettertm35surrenderofregistration':
        $para1 = $para14;
        $para2 = $para24;
        $para3 = $para31;
        break;
    case '*reminderlettertm35surrenderofregistration':
        $para1 = $para14;
        $para2 = $para24;
        $para3 = $para31;
        break;
    case '*followuplettertm35surrenderofregistration':
        $para1 = $para14;
        $para2 = $para24;
        $para3 = $para31;
        break;
    case '*requestlettertm38modificationofmark':
        $para1 = $para15;
        $para2 = $para25;
        $para3 = $para31;
        break;
    case '*reminderlettertm38modificationofmark':
        $para1 = $para15;
        $para2 = $para25;
        $para3 = $para31;
        break;
    case '*followuplettertm38modificationofmark':
        $para1 = $para15;
        $para2 = $para25;
        $para3 = $para31;
        break;
    case '*requestlettertm57':
        $para1 = $para16;
        $para2 = $para26;
        $para3 = $para31;
        break;
    case '*reminderlettertm57':
        $para1 = $para16;
        $para2 = $para26;
        $para3 = $para31;
        break;
    case '*followuplettertm57':
        $para1 = $para16;
        $para2 = $para26;
        $para3 = $para31;
        break;
    case '*requestlettertm59duplicatecertificate':
        $para1 = $para17;
        $para2 = $para27;
        $para3 = $para31;
        break;
    case '*reminderlettertm59duplicatecertificate':
        $para1 = $para17;
        $para2 = $para27;
        $para3 = $para31;
        break;
    case '*followuplettertm59duplicatecertificate':
        $para1 = $para17;
        $para2 = $para27;
        $para3 = $para31;
        break;
    case '*requesttm70legalcertificate':
        $para1 = $para18;
        $para2 = $para28;
        $para3 = $para31;
        break;
    case '*remindertm70legalcertificate':
        $para1 = $para18;
        $para2 = $para28;
        $para3 = $para31;
        break;
    case '*followuptm70legalcertificate':
        $para1 = $para18;
        $para2 = $para28;
        $para3 = $para31;
        break;
    case '*requestinterlocutorypetition ':
        $para1 = $para19;
        $para2 = $para29;
        $para3 = $para31;
        break;
    case '*reminderinterlocutorypetition':
        $para1 = $para19;
        $para2 = $para29;
        $para3 = $para31;
        break;
    case '*followupinterlocutorypetition':
        $para1 = $para19;
        $para2 = $para29;
        $para3 = $para31;
        break;
    case '*requesttm12renewalofregistration':
        $para1 = $para111;
        $para2 = $para210;
        $para3 = $para31;
        break;
    case '*remindertm12renewalofregistration':
        $para1 = $para111;
        $para2 = $para210;
        $para3 = $para31;
        break;
    case '*followuptm12renewalofregistration':
        $para1 = $para111;
        $para2 = $para210;
        $para3 = $para31;
        break;
    case '*requesttm13restorationoftrademark':
        $para1 = $para112;
        $para2 = $para211;
        $para3 = $para31;
        break;
    case '*remindertm13restorationoftrademark':
        $para1 = $para112;
        $para2 = $para211;
        $para3 = $para31;
        break;
    case '*followuptm13restorationoftrademark':
        $para1 = $para112;
        $para2 = $para211;
        $para3 = $para31;
        break;
    case '*requesttm40reclassification':
        $para1 = $para113;
        $para2 = $para212;
        $para3 = $para31;
        break;
    case '*remindertm40reclassification':
        $para1 = $para113;
        $para2 = $para212;
        $para3 = $para31;
        break;
    case '*followuptm40reclassification':
        $para1 = $para113;
        $para2 = $para212;
        $para3 = $para31;
        break;
    case '*mailseekrenewalinstr':
        $para1 = $para113;
        $para2 = $para212;
        $para3 = $para31;
        break;
    default:
        $para1 = '';
        $para2 = '';
        $para3 = '';
        $para_footer1 = '';
        break;
}

echo "<b>EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)</b><br>
				
                                                    Date: $currentDate<br>
To,<br>
The Registrar of Trade Marks<br>
Trade Marks Registry,<br>
$jurisdiction<br><br>


<b>Ref: Application No. $appli in class(es) $class for the mark $trademark</b><br><br>

<b>Sub: $status_name</b><br><br>
                       
$para1<br><br>
$para2<br><br>
$para3<br><br>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style='text-align:right'>
    <img src='http://algindia.in/maintenancenew/images/sign1.png' /><img src='http://algindia.in/maintenancenew/images/sign2.png' /><br>
                                            (Sumit Verma) (Mrinal Dubey)<br>
                                            For <b>ALG India Law Offices</b><br>
                                            30 Siri Fort Road,<br>
                                            New Delhi-110049<br>
                                            (E) trademarks@algindia.com<br>
                                            (P) +91 11 2625 2244<br>
                                            Agent Code: 9644</td>
  </tr>
</table>
    
                                            
$para_footer1";


echo "</body>";
echo "</html>";
