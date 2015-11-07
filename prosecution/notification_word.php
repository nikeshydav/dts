<?php

ini_set("display_errors", "off");
header("Content-Type: application/vnd.ms-word");
//header("Content-disposition: inline; filename=search-".$_GET['application']."-".date('dmY-H:i:s') .".doc");
header("Content-disposition: inline; filename=search-".$_GET['application']."_".$_GET['compare_title'].".doc");
header("Pragma: no-cache");
header("Expires: 0");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo '<body><table align="center" width="800" border="0">
  <tr>
    <td width="171" align="left"><img src="http://algindia.in/prosecutionnew/images/welcome_word1.jpg" /></td>
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

//echo "EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)
//				
//Date: $currentDate
//To,
//The Registrar of Trade Marks
//Trade Marks Registry,
//$jurisdiction
//
//
//Ref: Application No. $appli in class(es) $class for the mark $trademark
//
//Sub: $status_name";


$para11 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b> (the Applicant), hereby request you to kindly examine under Rule 37(2) of the Trade Marks Rules, 2002, at the earliest, the subject pending application filed on $date_filling. We further urge you to consider directly issuing an order for advertisement under Section 18(4) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required.<br><br>";
$para12 = "
We, ALG India Law Offices, on behalf of our client, <b>$applicant</b> (the Applicant), would like to bring to your attention the request for expedited examination (on Form TM-63) filed by us on September 27, 2013 (copy enclosed) requesting the expedited examination under Rule 38(1) of the Trade Marks Rules, 2002 of the subject application filed on $date_filling. This request was made in light of enforcement of trademark rights with respect to the applied-for mark by the Applicant (enclosed is the declaration filed by us to this effect along with the Form TM-63). We request you to kindly examine the same at the earliest, since the statutorily prescribed three-month period expires on December 26, 2013.
<br><br>";

$para13 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b> (the Applicant), hereby request you to kindly refer to our Reply dated February 13, 2013 to the Examination Report for the subject pending application filed on $date_filling.
<br><br>
We request you to treat all objections as having been met adequately thereby and accordingly urge you to issue necessary orders for advertisement under Section 18(4) of the Trade Marks Act, 1999. The application may kindly be advertised, even if only provisionally under an order for advertisement before acceptance (ABA Order) under Section 20(1) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required. 
<br><br>";

$para14 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b>, hereby request you to kindly expedite the process of publication of the subject application filed on $date_filling, in a forthcoming TM Journal under Section 20(1) of the Trade Marks Act, 1999.
<br><br>
The order for advertisement of the subject application has been issued by the Registrar of Trade Marks on January 4, 2012, and any and all compliances due have been made vide our response dated January 16, 2012.
<br><br>";

$para15 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b> (the Applicant) would like to inform you that the subject application filed on $date_filling was advertised in TM Journal No. 1596-0 dated July 8, 2013 and the statutory period to oppose the same has successfully been completed as per the TM Office records.
<br><br>
We hereby request you to kindly accept our subject application finally, and register the same at the earliest under Section 23(1) of the Trade Marks Act, 1999, ensuring that the correct particulars are reflected in the Registration Certificate, as and when the same is issued.
<br><br>";

$para16 = "We, ALG India Law Offices, wish to inform you on behalf of our client, <b>$applicant</b>, that there are errors in the TM Office online Records of the subject application filed on $date_filling.<br><br> ";

$para17 = "We, ALG India Law Offices, wish to inform you on behalf of our client, <b>$applicant</b>, that there are errors in the advertisement of the subject application filed on $date_filling, published in TM Journal No. 1640-0 dated May 26, 2014.<br><br>";

$para18 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b>, would like to inform you that the Form TM-16 [filed on October 1, 2007 for change of address for service in India] in the subject application filed on $date_filling under Section 22 of the Trade Marks Act, 1999 is yet to be taken on record by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and the necessary order/s be passed.
<br><br>
If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.<br><br>";

$para19 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b> (the Applicant) hereby request you to kindly fix a fresh date of hearing in the subject application filed on $date_filling, pursuant to the Form TM-57 filed by us on August 6, 2010 for review of the Registrar’s decision/order dated June 7, 2010 under Section 127(c) of the Trade Marks Act, 1999.<br><br>";

$para110 = "We, ALG India Law Offices, on behalf of our client, <b>$applicant</b> (the Applicant) hereby request you to kindly fix a date of hearing on our Form TM-53 filed by us on August 6, 2010 for division of the subject application filed on $date_filling under Rule 104(1) of the Trade Marks Rules, 2002.<br><br>";

$para21 = "We shall be grateful if the needful is done at the earliest.
<br><br>
We also request an interview/hearing to press our request.
<br><br>
<b>Enclosed:</b> Power of Attorney
<br><br>
All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.
<br><br>";

$para22 = "<b>Enclosed:</b> Power of Attorney
<br><br>
All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.
<br><br>";

$para23 = "We further urge you to consider directly issuing an order for advertisement under Section 20(1) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required. 
<br><br>
We shall be grateful if the needful is done at the earliest.
<br><br>
Enclosed: Power of Attorney
<br><br>
All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.
<br><br>";

$para24 = "We further urge you to consider directly issuing an order for advertisement under Section 20(1) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required. 
<br><br>
Enclosed: Power of Attorney
<br><br>
All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.
<br><br>";

$para25 = "In the TM Office online records, we note the following errors: -
<br><br>
1.	<br><br>
2.	<br><br>
3.	<br><br>

The learned Registrar is respectfully requested to rectify the TM Office online records, and ensure that the advertisement of the mark when published in TM Journal contains the correct particulars. If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.
<br><br>";

$para26 = "In the advertisement, we note the following errors: -
<br><br>
1.	<br>
2.	<br>
3.	<br>

The learned Registrar is respectfully requested to rectify the TM Office online records, publish a corrigendum to this effect and ensure that the certificate of registration of the mark, when issued, contains the correct particulars of the Applicant. If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.
<br><br>";

$para27 = "<b>Enclosed:</b> Power of Attorney<br>
	      Form TM-57<br>
	      Copy of Order dated June 7, 2010<br>

All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.
<br><br>";

$para28 = "<b>Enclosed:</b> Power of Attorney<br>
	      Form TM-53<br>

All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.
<br><br>";

$para_footer = "Encl: 	Copy of Online Records<br>
Copy of Additional Representation<br>
	Copy of Power of Attorney
";

switch ($_GET['compare_title']) {
    case '*followupletteradvertisement':
        $para1 = $para14;
        $para2 = $para22;
        break;
    case '*followupletterfinalacceptance':
        $para1 = $para15;
        $para2 = $para22;
        break;
    case '*followupletterorderforadvertisement':
        $para1 = $para13;
        $para2 = $para22;
        break;
    case '*reminderletterearlyexamination':
        $para1 = $para11;
        $para2 = $para22;
        break;
    case '*followupletterearlyexamination':
        $para1 = $para11;
        $para2 = $para22;
        break;
    case '*requestlettertm63':
        $para1 = $para12;
        $para2 = $para23;
        break;
    case '*reminderlettertm63':
        $para1 = $para12;
        $para2 = $para24;
        break;
    case '*followuplettertm63':
        $para1 = $para12;
        $para2 = $para24;
        break;
    case '*requestletterearlyexamination':
        $para1 = $para11;
        $para2 = $para21;
        break;
    case '*requestletterorderforadvertisement':
        $para1 = $para13;
        $para2 = $para21;
        break;
    case '*reminderletterorderforadvertisement':
        $para1 = $para13;
        $para2 = $para22;
        break;
    case '*requestletteradvertisement':
        $para1 = $para14;
        $para2 = $para21;
        break;
    case '*reminderletteradvertisement':
        $para1 = $para14;
        $para2 = $para22;
        break;
    case '*requestletterfinalacceptance':
        $para1 = $para15;
        $para2 = $para22;
        break;
    case '*reminderletterfinalacceptance':
        $para1 = $para15;
        $para2 = $para22;
        break;
    case '*reminderlettercorrectionoferrorsinonlinerecords':
        $para1 = $para16;
        $para2 = $para25;
        $para_footer1 = $para_footer;
        break;
    case '*followuplettercorrectionoferrorsinonlinerecords':
        $para1 = $para16;
        $para2 = $para25;
        $para_footer1 = $para_footer;
        break;
    case '*reminderlettercorrectionoferrorsinjournaladvertisement':
        $para1 = $para17;
        $para2 = $para26;
        $para_footer1 = $para_footer;
        break;
    case '*followuplettercorrectionoferrorsinjournaladvertisement':
        $para1 = $para17;
        $para2 = $para26;
        $para_footer1 = $para_footer;
        break;
    case '*requestlettertm16':
        $para1 = $para18;
        $para2 = $para22;
        break;
    case '*reminderlettertm16':
        $para1 = $para18;
        $para2 = $para22;
        break;
    case '*followuplettertm16':
        $para1 = $para18;
        $para2 = $para22;
        break;
    case '*requestlettertm57':
        $para1 = $para19;
        $para2 = $para27;
        break;
    case '*reminderlettertm57':
        $para1 = $para19;
        $para2 = $para27;
        break;
    case '*followuplettertm57':
        $para1 = $para19;
        $para2 = $para27;
        break;
    case '*requestlettertm53':
        $para1 = $para110;
        $para2 = $para28;
        break;
    case '*reminderlettertm53':
        $para1 = $para110;
        $para2 = $para28;
        break;
    case '*followuplettertm53':
        $para1 = $para110;
        $para2 = $para28;
        break;
    default:
        $para1 = '';
        $para2 = '';
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
                       
$para1
$para2
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td style='text-align:right'>
    <img src='http://algindia.in/prosecutionnew/images/sign1.png' /><img src='http://algindia.in/prosecutionnew/images/sign2.png' /><br>
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
