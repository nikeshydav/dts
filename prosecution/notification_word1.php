<?php
ini_set('display_errors', 'off');
$app_id = $_GET['id'];
$fid = $_GET['notice_id'];

include "class.docket.php";
$obj = new docket();

$sql_noti = "select status_id from notifications where app_id = '$app_id' and fid = '$fid'";
 /*if($sql_noti === FALSE) {
                    die( "select status_id from notifications where app_id = $app_id and fid = $fid" . mysql_error()); 
                }*/
$res_noti = mysql_query($sql_noti);
$row_noti = mysql_fetch_array($res_noti);
$status_id = $row_noti['status_id'];

$sql_status = "select status_name from status where id = '$status_id'";
$res_status = mysql_query($sql_status);
$row_status = mysql_fetch_array($res_status);
$status_name = str_replace('*','',$row_status['status_name']);

$sql = "select *,(SELECT name FROM user WHERE id = a.applicant) AS applicant from application a where id = '$app_id'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$appli = $row['application_no'];
$class = $row['classes'];
$trademark = $row['mark'];
$jurisdiction = $row['jurisdiction'];
$applicant = str_replace('&','and',$row['applicant']);
$fillingdate = $row['filing_date'];
$date_filling = date('F d, Y', strtotime($fillingdate));
$currentDate = date("d.m.Y");

$para11a = "We, ALG India Law Offices, on behalf of our client, ";
$para11b = "$applicant";
$para11c = " (the Applicant), hereby request you to kindly examine under Rule 37(2) of the Trade Marks Rules, 2002, at the earliest, the subject pending Application filed on $date_filling. We further urge you to consider directly issuing an order for advertisement under Section 18(4) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required.";

$para12a = "We, ALG India Law Offices, on behalf of our client, ";
$para12b = "$applicant";
$para12c = " (the Applicant), would like to bring to your attention the request for expedited examination (on Form TM-63) filed by us on ";
$para12d = "September 27, 2013";
$para12e = " (copy enclosed) requesting the expedited examination under Rule 38(1) of the Trade Marks Rules, 2002 of the subject Application filed on $date_filling. This request was made in light of enforcement of trademark rights with respect to the applied-for mark by the Applicant (enclosed is the declaration filed by us to this effect along with the Form TM-63). We request you to kindly examine the same at the earliest, since the statutorily prescribed three-month period expires on ";
$para12f = "December 26, 2013.";

$para13a = "We, ALG India Law Offices, on behalf of our client, ";
$para13b = "$applicant";
$para13c = " (the Applicant), hereby request you to kindly refer to our Reply dated ";
$para13d = "February 13, 2013";
$para13e = " to the Examination Report for the subject pending Application filed on $date_filling.";
$para13f = "We request you to treat all objections as having been met adequately thereby and accordingly urge you to issue necessary orders for advertisement under Section 18(4) of the Trade Marks Act, 1999. The application may kindly be advertised, even if only provisionally under an order for advertisement before acceptance (ABA Order) under Section 20(1) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required.";

$para14a = "We, ALG India Law Offices, on behalf of our client, ";
$para14b = "$applicant";
$para14c = ", hereby request you to kindly expedite the process of publication of the subject Application filed on $date_filling, in a forthcoming TM Journal under Section 20(1) of the Trade Marks Act, 1999.";
$para14d = "The order for advertisement of the subject Application has been issued by the Registrar of Trade Marks on ";
$para14e = "January 4, 2012";
$para14f = ", and any and all compliances due have been made vide our response dated ";
$para14g = "January 16, 2012.";

$para15a = "We, ALG India Law Offices, on behalf of our client, ";
$para15b = "$applicant";
$para15c = " (the Applicant) would like to inform you that the subject Application filed on $date_filling was advertised in TM Journal No. ";
$para15d = "1596-0";
$para15e = " dated ";
$para15f = "July 8, 2013";
$para15g = " and the statutory period to oppose the same has successfully been completed as per the TM Office records.";
$para15h = "We hereby request you to kindly accept our subject Application finally, and register the same at the earliest under Section 23(1) of the Trade Marks Act, 1999, ensuring that the correct particulars are reflected in the Registration Certificate, as and when the same is issued.";

$para16a = "We, ALG India Law Offices, wish to inform you on behalf of our client, ";
$para16b = "$applicant";
$para16c = " that there are errors in the TM Office online Records of the subject Application filed on $date_filling.";

$para17a = "We, ALG India Law Offices, wish to inform you on behalf of our client, ";
$para17b = "$applicant";
$para17c = ", that there are errors in the advertisement of the subject Application filed on $date_filling, published in TM Journal No. ";
$para17d = "1640-0";
$para17e = " dated ";
$para17f = "May 26, 2014.";

$para18a = "We, ALG India Law Offices, on behalf of our client, ";
$para18b = "$applicant";
$para18c = ", would like to inform you that the Form TM-16 [filed on ";
$para18d = "October 1, 2007 for change of address for service in India";
$para18e = "] in the subject Application filed on $date_filling under Section 22 of the Trade Marks Act, 1999 is yet to be taken on record by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and the necessary order/s be passed.";
$para18f = "If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.";

$para19a = "We, ALG India Law Offices, on behalf of our client, ";
$para19b = "$applicant";
$para19c = " (the Applicant) hereby request you to kindly fix a fresh date of hearing in the subject Application filed on $date_filling, pursuant to the Form TM-57 filed by us on ";
$para19d = "August 6, 2010";
$para19e = " for review of the Registrar's decision/order dated ";
$para19f = "June 7, 2010";
$para19g = " under Section 127(c) of the Trade Marks Act, 1999.";

$para110a = "We, ALG India Law Offices, on behalf of our client, ";
$para110b = "$applicant";
$para110c = " (the Applicant) hereby request you to kindly fix a date of hearing on our Form TM-53 filed by us on ";
$para110d = "August 6, 2010";
$para110e = " for division of the subject application filed on $date_filling under Rule 104(1) of the Trade Marks Rules, 2002.";

$para21a = "We shall be grateful if the needful is done at the earliest.";
$para21b = "We also request an interview/hearing to press our request.";
$para21c = "Enclosed: ";
$para21d = "Power of Attorney";
$para21e = "All communications relating to this Application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";
$para22a = "Enclosed: ";
$para22b = "Power of Attorney";
$para22c = "All communications relating to this Application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para23a = "We further urge you to consider directly issuing an order for advertisement under Section 20(1) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required.";
$para23b = "We shall be grateful if the needful is done at the earliest.";
$para23c = "Enclosed: ";
$para23d = "Power of Attorney";
$para23e = "All communications relating to this Application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para24a = "We further urge you to consider directly issuing an order for advertisement under Section 20(1) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required.";
$para24b = "Enclosed: ";
$para24c = "Power of Attorney";
$para24d = "All communications relating to this Application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para25a = "In the TM Office online records, we note the following errors: - ";
$para25b = "1.";	
$para25c = "2.";	
$para25d = "3.";	
$para25e = "The learned Registrar is respectfully requested to rectify the TM Office online records, and ensure that the advertisement of the mark when published in TM Journal contains the correct particulars. If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.";

$para26a = "In the advertisement, we note the following errors: - ";
$para26b = "1.";	
$para26c = "2.";	
$para26d = "3.";	
$para26e = "The learned Registrar is respectfully requested to rectify the TM Office online records, publish a corrigendum to this effect and ensure that the certificate of Registration of the mark, when issued, contains the correct particulars of the Applicant. If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.";

$para27a = "Enclosed: ";
$para27b = "Power of Attorney";
$para27c = "Form TM-57";
$para27d = "Copy of Order dated June 7, 2010";
$para27e = "All communications relating to this Application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para28a = "Enclosed: ";
$para28b = "Power of Attorney";
$para28c = "Form TM-53";
$para28d = "All communications relating to this Application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para_footera = "Encl: 	";
$para_footerb = "Copy of Online Records";
$para_footerc = "Copy of Additional Representation";
$para_footerd = "Copy of Power of Attorney";


include_once 'phpword/samples/Sample_Header.php';
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// New portrait section
$section = $phpWord->addSection();

// New Word document
//echo date('H:i:s') , " Create new PhpWord object" , EOL;

// Add first page header
$header = $section->addHeader();
$header->firstPage();
$table = $header->addTable();
$table->addRow();
$table->addCell(15000)->addImage(
    'images/welcome_word1.jpg',
    array('align' => 'left',)
);
$cell = $table->addCell(4000);
$textrun = $cell->addTextRun(array('align' => 'right'));
$textrun->addText('ALG India Law Offices',array('name'=>'Times New Roman', 'size'=>13, 'bold'=>true));
$textrun->addTextBreak();
$textrun->addText('30 Siri Fort Road,',array('name'=>'Times New Roman', 'size'=>11));
$textrun->addTextBreak();
$textrun->addText('New Delhi-110049',array('name'=>'Times New Roman', 'size'=>11));
$textrun->addTextBreak();
$textrun->addText('(T) : +91.11.2625.2244',array('name'=>'Times New Roman', 'size'=>11));
$textrun->addTextBreak();
$textrun->addText('(F) : +91.11.2625.1585',array('name'=>'Times New Roman', 'size'=>11));
$textrun->addTextBreak();
$textrun->addText('(E): trademarks@algindia.com',array('name'=>'Times New Roman', 'size'=>11));
$underline = $section->addLine(
    array(
        'width' => \PhpOffice\PhpWord\Shared\Drawing::centimetersToPixels(16),
        'height' => \PhpOffice\PhpWord\Shared\Drawing::centimetersToPixels(0),
        'positioning' => 'absolute'
    )
);

/*$textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: '.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));*/


switch ($_GET['compare_title']) {
  
      case 'requestletterearlyexamination':
          
          $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Request Letter - Early Examination',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
    $textcenter3->addTextBreak();        
$textcenter3->addText('Request for interview/hearing',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para11a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para11c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21c,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para21d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderletterearlyexamination':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Reminder Letter - Early Examination',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
    $textcenter3->addTextBreak();        
$textcenter3->addText('Request for interview/hearing',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para11a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para11c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followupletterearlyexamination':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Followup Letter - Early Examination',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
    $textcenter3->addTextBreak();        
$textcenter3->addText('Request for interview/hearing',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
          
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para11a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para11c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestlettertm63':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Request Letter - TM-63',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para12a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para12c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para12e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para23a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para23b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para23c,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para23d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para23e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderlettertm63':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Reminder Letter - TM-63',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para12a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para12c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para12e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para24c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24d,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followuplettertm63':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Followup Letter - TM-63',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para12a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para12c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para12e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para24c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24d,array('name'=>'Times New Roman', 'size'=>12));
        break;
  
    case 'requestletterorderforadvertisement':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
  $textcenter3->addText('Request Letter - Order for Advertisement',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
    $textcenter3->addTextBreak();        
$textcenter3->addText('Request for interview/hearing',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para13a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para13c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para13e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para13f,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21c,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para21d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderletterorderforadvertisement':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
     $textcenter3->addText('Reminder Letter - Order for Advertisement',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
    $textcenter3->addTextBreak();        
$textcenter3->addText('Request for interview/hearing',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para13a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para13c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para13e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para13f,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
      case '*followupletterorderforadvertisement':
          
          $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
      $textcenter3->addText('Followup Letter - Order for Advertisement',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
    $textcenter3->addTextBreak();        
$textcenter3->addText('Request for interview/hearing',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
          
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para13a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para13c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para13e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para13f,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestletteradvertisement':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Request Letter - Advertisement',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para14a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para14c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para14d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14e,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para14f,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14g,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderletteradvertisement':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Reminder Letter - Advertisement',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
                
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para14a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para14c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para14d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14e,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para14f,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14g,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
      case '*followupletteradvertisement':
          
          $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Follow-up Letter - Advertisement',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
          
$textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para14a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para14c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para14d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14e,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para14f,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14g,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
break;
  
    case 'requestletterfinalacceptance':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Request Letter - Final Acceptance and Registration',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para15a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para15c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para15h,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderletterfinalacceptance':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Reminder Letter - Final Acceptance and Registration',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para15a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para15c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para15h,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
      case '*followupletterfinalacceptance':
          
          $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('EXAMINATION, PUBLICATION AND REGISTRATION SECTION (EPR)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Followup Letter - Final Acceptance and Registration',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
          
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para15a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para15c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para15h,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
  
    case 'reminderlettercorrectionoferrorsintmofficeonlinerecords':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('PRE-REGISTRATION AMENDMENT SECTION (PRAS)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Reminder Letter - Correction of Errors in Online Records',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para16a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para16b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para16c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para25a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para25b,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para25c,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para25d,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para25e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para_footera,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para_footerb,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para_footerc,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para_footerd,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followuplettercorrectionoferrorsintmofficeonlinerecords':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('PRE-REGISTRATION AMENDMENT SECTION (PRAS)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Followup Letter - Correction of Errors in Online Records',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para16a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para16b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para16c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para25a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para25b,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para25c,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para25d,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para25e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para_footera,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para_footerb,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para_footerc,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para_footerd,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderlettercorrectionoferrorsinjournaladvertisement':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('PRE-REGISTRATION AMENDMENT SECTION (PRAS)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Reminder Letter - Correction of Errors in Journal Advertisement',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para17a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para17c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para17e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para26a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para26b,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para26c,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para26d,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para26e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para_footera,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para_footerb,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para_footerc,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para_footerd,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followuplettercorrectionoferrorsinjournaladvertisement':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('PRE-REGISTRATION AMENDMENT SECTION (PRAS)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Followup Letter - Correction of Errors in Journal Advertisement',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para17a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para17c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para17e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para26a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para26b,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para26c,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para26d,array('name'=>'Times New Roman', 'size'=>12, 'color'=>'red'));
$textleft->addTextBreak();
$textleft->addText($para26e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para_footera,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para_footerb,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para_footerc,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para_footerd,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestlettertm16':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('PRE-REGISTRATION AMENDMENT SECTION (PRAS)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Request Letter - TM-16',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para18a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para18c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para18e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para18f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderlettertm16':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('PRE-REGISTRATION AMENDMENT SECTION (PRAS)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Reminder Letter - TM-16',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para18a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para18c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para18e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para18f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followuplettertm16':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('PRE-REGISTRATION AMENDMENT SECTION (PRAS)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Followup Letter - TM-16',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para18a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para18c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para18e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para18f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestlettertm57':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('SHOW CAUSE HEARING SECTION (SCH)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Request Letter - TM-57',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para19a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para19c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para19e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para19g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para27b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para27c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para27d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderlettertm57':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('SHOW CAUSE HEARING SECTION (SCH)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Reminder Letter - TM-57',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para19a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para19c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para19e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para19g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para27b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para27c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para27d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followuplettertm57':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('SHOW CAUSE HEARING SECTION (SCH)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Followup Letter - TM-57',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para19a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para19c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para19e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para19g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para27b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para27c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para27d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestlettertm53':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R&A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Request Letter - TM-53',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para110a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para110c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para28b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para28c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28d,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderlettertm53':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R&A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Reminder Letter - TM-53',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para110a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para110c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para28b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para28c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28d,array('name'=>'Times New Roman', 'size'=>12));
 break;
    case '*followuplettertm53':
        
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R&A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction,array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText('Followup Letter - TM-53',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'both'));
$textleft->addText($para110a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para110c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para28b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para28c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28d,array('name'=>'Times New Roman', 'size'=>12));
 break;
    default:
        break;
}

//\PhpOffice\PhpWord\Shared\Html::addHtml($section, $para1);
//\PhpOffice\PhpWord\Shared\Html::addHtml($section, $para2);

$textright2 = $section->addTextRun(array('align' => 'right'));
$textright2->addImage(
    'images/sign1.png',
    array('align' => 'right',)
);
$textright2->addImage(
    'images/sign2.png',
    array('align' => 'right',)
);
$textright2->addTextBreak();
$textright2->addText('(Sumit Verma) (Mrinal Dubey)',array('name'=>'Times New Roman', 'size'=>12));
$textright2->addTextBreak();
$textright2->addText('For',array('name'=>'Times New Roman', 'size'=>12));
$textright2->addText(' ALG India Law Offices',array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textright2->addTextBreak();
$textright2->addText('30 Siri Fort Road,',array('name'=>'Times New Roman', 'size'=>12));
$textright2->addTextBreak();
$textright2->addText('New Delhi-110049',array('name'=>'Times New Roman', 'size'=>12));
$textright2->addTextBreak();
$textright2->addText('(E) trademarks@algindia.com',array('name'=>'Times New Roman', 'size'=>12));
$textright2->addTextBreak();
$textright2->addText('(P) +91 11 2625 2244',array('name'=>'Times New Roman', 'size'=>12));
$textright2->addTextBreak();
$textright2->addText('Agent Code: 9644',array('name'=>'Times New Roman', 'size'=>12));


// Save file
/*echo $path = basename(__FILE__, '.php');
echo write($phpWord, $path, $writers);
header('location: phpword/samples/results/notification_word1.docx');*/
$path = $appli . "_".str_replace('*', '', $_GET['letter_filename']);
write($phpWord, $path, $writers);
header('location: phpword/samples/results/'.$path.".docx");