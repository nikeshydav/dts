<?php

ini_set("display_errors", "off");
$app_id = $_GET['id'];
$fid = $_GET['notice_id'];
//$paragraph = $_GET['paragraph'];

include "class.docket.php";
$obj = new docket();

$sql_noti = "select status_id from notifications where app_id = '$app_id' and fid = '$fid'";
$res_noti = mysql_query($sql_noti);
$row_noti = mysql_fetch_array($res_noti);
$status_id = $row_noti['status_id'];

$sql_status = "select status_name from status where id = '$status_id'";
$res_status = mysql_query($sql_status);
$row_status = mysql_fetch_array($res_status);
$status_name = str_replace('*','',$row_status['status_name']);
$status_name = str_replace('Review','',$status_name);

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

$para11a = "We, ALG India Law Offices, on behalf of our client ";
$para11b = "$applicant"; 
$para11c = " (the Registrant), hereby request you to kindly expedite issuance of Registration Certificate [No. ";
$para11d = "558270";
$para11e = " dated "; 
$para11f = "September 21, 2006";
$para11g = "] under Section 23(2) of the Trade Marks Act, 1999 for the subject Registration as of $date_filling.";

$para12a = "We, ALG India Law Offices, on behalf of our client, ";
$para12b = "$applicant";
$para12c = " (the Registrant) wish to inform that we have submitted the original Registration [Certificate No. ";
$para12d = "1112928";
$para12e = " dated "; 
$para12f = "August 20, 2013";
$para12g = "] for the subject Registration on "; 
$para12h = "$date_filling"; 
$para12i = " at the TM Office for corrections of errors there in.";

$para13a = "We, ALG India Law Offices, on behalf of our client, ";
$para13b = "$applicant";
$para13c = ", would like to draw attention to the "; 
$para13d = "Form TM-24/TM-33/TM-34/TM-50 ";
$para13e = " [filed on "; 
$para13f = "December 30, 2011 ";
$para13g = "for ";
$para13h = "recordal of assignment/ recordal of merger/ change of registrant's name/ change of legal entity/ change of registrant's principal address/ change of address of service";
$para13i = "] in the subject Registration. This is yet to be taken on record by the TM Office. You are requested to expedite the same and pass necessary order/s for recordal under "; 
$para13j = "Section 45/58 of the Trade Marks Act, 1999 and Rule 91 of the Trade Marks Rules, 2002"; 


$para14a = "We, ALG India Law Offices, on behalf of our client, ";
$para14b = "$applicant";
$para14c = ", would like to inform that the ";
$para14d = "Form TM-35 ";
$para14e = "[filed on ";
$para14f = "December 30, 2011"; 
$para14g = " for cancellation of entry in the register of trademarks] for the subject registration is yet to be allowed by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and necessary order/s for cancellation under Section 58(1)(c) of the Trade Marks Act, 1999 be passed.";

$para15a = "We, ALG India Law Offices, on behalf of our client, ";
$para15b = "$applicant";
$para15c = ", would like to inform that Form TM-38 [filed on ";
$para15d = "Form TM-38 ";
$para15e = "[filed on ";
$para15f = "December 30, 2011"; 
$para15g = " for alteration of the mark] in the subject registration is yet to be allowed by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and that the necessary order/s under Section 59 of the Trade Marks Act, 1999 be passed for the mark to be altered.";

$para16a = "We, ALG India Law Offices, on behalf of our client, ";
$para16b = "$applicant";
$para16c = " (the Registrant) hereby request you to kindly schedule a hearing in the subject Registration, pursuant to the Form TM-57 filed by us on ";
$para16d = "August 6, 2010"; 
$para16e = " for review of the Registrar's decision/order dated "; 
$para16f = "June 7, 2010";
$para16g = " under Section 127(c) of the Trade Marks Act, 1999.";

$para17a = "We, ALG India Law Offices, on behalf of our client ";
$para17b = "$applicant"; 
$para17c = " (the Registrant), hereby request you to kindly expedite the issuance of Duplicate Registration Certificate";
$para17g = "pursuant to the Form TM-59 filed on "; 
$para17h = "February 13, 2012"; 
$para17i = " in the subject Registration under Rule 62(3) of the Trade Marks Rules, 2002.";

$para18a = "We, ALG India Law Offices, on behalf of our client "; 
$para18b = "$applicant";
$para18c = " (the Registrant), hereby request you to kindly expedite the issuance of Legal Certificate pursuant to the Form TM-70 filed on ";
$para18d = "February 13, 2012"; 
$para18e = " for the subject registration under Section 137 of the Trade Marks Act, 1999.";

$para19a = "We, ALG India Law Offices, on behalf of our client, ";
$para19b = "$applicant"; 
$para19c = " (the Registrant) hereby request you to schedule a hearing on the Interlocutory Petition filed by us on "; 
$para19d = "August 6, 2010"; 
$para19e = " in the subject Registration.";

$para110a = "We, ALG India Law Offices, on behalf of our client, ";
$para110b = "$applicant";
$para110c = ", would like to inform that the Form TM-12 [filed on ";
$para110d = "December 23, 2013";
$para110e = "] in the subject Registration for renewal from";
$para110f = "$date_filling";
$para110g = "to";
$para110h = "January 27, 2024";
$para110i = "is yet to be taken on record by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and for necessary order/s for renewal under Section 25 of the Trade Marks Act, 1999 be passed.";

$para111a = "We, ALG India Law Offices, on behalf of our client, ";
$para111b = "$applicant";
$para111c = ", would like to inform that the Form TM-13 along with TM-12 [filed on "; 
$para111d = "December 23, 2013";
$para111e = "] in the subject Registration for restoration and renewal from $date_filling is yet to be allowed by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and for necessary order/s for restoration and renewal under Section 25(4) of the Trade Marks Act, 1999 be passed.";

$para112a = "We, ALG India Law Offices, on behalf of our client, ";
$para112b = "$applicant";
$para112c = ", would like to draw attention to Form TM-40 [filed on "; 
$para112d = "December 23, 2013";
$para112e = "] for the subject Registration. This reclassification is yet to be taken on record by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and the necessary order/s for reclassification of specification under Rule 101(1) of the Trade Marks Rules, 2002 be passed "; 
$para112g = " be passed.";

$para113a = "We, ALG India Law Offices, on behalf of our client, ";
$para113b = "$applicant";
$para113c = ", would like to point out the errors in the Registration Certificate No. "; 
$para113d = "1166458";
$para113e = " dated "; 
$para113f = "April 30, 2014 ";
$para113g = " for the subject registration. These errors are as follows:";
$para113h = " 1.";
$para113i = " 2.";
$para113j = " The original certificate was submitted back at the TM office for correction on";
$para113k = " January 27, 2014";
$para113l = " along with a request letter for correction. The learned Registrar is respectfully requested to correct the records of TM Office and issue a fresh and corrected Registration Certificate with the corrections as filed for. If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.";



$para21a = "We shall be grateful if the needful is done at the earliest.";
$para21b = "Enclosed:";
$para21c = "Power of Attorney";
$para21d = "All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";
$para21e = "We have already filed a letter(s) in this regard on ";
$para21f = "         .";


$para22a ="We hereby request you to kindly have the corrections made and expedite the process of issuance of fresh corrected Registration Certificate under Section 23(4) of the Trade Marks Act, 1999.";
$para22b = "Enclosed:";
$para22c = "Power of Attorney";
$para22d = "Copy of Letter filed on";
$para22e = "October 20, 2013";
$para22f ="All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";
$para22g = "We have already filed letter(s) in this regard on ";
$para22i = "     .";

$para23a = "Enclosed:";
$para23b = "Power of Attorney";
$para23c = "Form TM-24/TM-33/TM-34/TM-50";
$para23d = "All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para24a = "If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.";
$para24b = "Enclosed:";
$para24c = "Power of Attorney";
$para24d = "Form TM-35";
$para24e = "All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para25a = "If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.";
$para25b = "Enclosed:";
$para25c = "Power of Attorney";
$para25d = "Form TM-38";
$para25e = "All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para26a = "Enclosed:";
$para26b = "Power of Attorney";
$para26c = "Form TM-57";
$para26d = "Copy of Order dated June 7, 2010";
$para26e = "All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para27a = "We shall be grateful if the needful is done at the earliest.";
$para27b = "Enclosed:";
$para27c = "Power of Attorney";
$para27d = "Form TM-59";
$para27e = "All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para28a = "We shall be grateful if the needful is done at the earliest.";
$para28b = "Enclosed:";
$para28c = "Power of Attorney";
$para28d = "Form TM-70";
$para28e = "All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para29a = "Enclosed:";
$para29b = "Power of Attorney";
$para29c = "Interlocutory Petition";
$para29d = "All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para210a = "If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.";
$para210b = "Enclosed:";
$para210c = "Power of Attorney";
$para210d = "Form TM-12";
$para210e = "All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para211a = "If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.";
$para211b = "Enclosed:";
$para211c = "Power of Attorney";
$para211d = "Form TM-13";
$para211e = "Form TM-12";
$para211f = "All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para212a = "If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.";
$para212b = "Enclosed:";
$para212c = "Power of Attorney";
$para212d = "Form TM-40";
$para212e = "All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para213a = "Enclosed:";
$para213b = "Copy of Additional Representation";
$para213c = "Copy of Power of Attorney";
$para213d = "All communications relating to this registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";


include_once 'phpword/samples/Sample_Header.php';
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// New portrait section
$section = $phpWord->addSection();


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
$textleft->addText('To,',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry,',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: '.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
*/

switch ($_GET['compare_title']) {

    case 'requestletterissuanceofcertificate':
        
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
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        
           $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para11a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para11c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para11e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para11g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para21c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21d,array('name'=>'Times New Roman', 'size'=>12));

        break;
    case 'reminderletterissuanceofcertificate':
        
        
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
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para11a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para11c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para11e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para11g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para21f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para21c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21d,array('name'=>'Times New Roman', 'size'=>12));

        break;
    case '*followupletterissuanceofcertificate':
        
        
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
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para11a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para11c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para11e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para11f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para11g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para21f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para21c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para21d,array('name'=>'Times New Roman', 'size'=>12));

        break;
    case 'reminderletterreissuanceofcorrectedcertificate':
        
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
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
         $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para12a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para12c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para12e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para12g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12h,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para12i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para22i,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12));

$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para22d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para22e,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22f,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followupletterreissuanceofcorrectedcertificate':
        
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
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para12a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para12c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para12e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para12g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para12h,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para12i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para22i,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para22c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para22d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para22e,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para22f,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestletterrecordalfiling':      
        
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('ASSIGNMENT AND REGISTERED USER SECTION (A&R)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter1->addTextBreak();
$textcenter1->addTextBreak();
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));


         $textleftNew = $section->addTextRun(array('align' => 'left'));
         
$textleftNew->addText($para13a,array('name'=>'Times New Roman', 'size'=>12));
$textleftNew->addText($para13b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleftNew->addText($para13c,array('name'=>'Times New Roman', 'size'=>12));
$textleftNew->addText($para13d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleftNew->addText($para13e,array('name'=>'Times New Roman', 'size'=>12));
$textleftNew->addText($para13f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleftNew->addText($para13g,array('name'=>'Times New Roman', 'size'=>12));
$textleftNew->addText($para13h,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleftNew->addText($para13i,array('name'=>'Times New Roman', 'size'=>12));
$textleftNew->addText($para13j,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleftNew->addTextBreak();
$textleftNew->addTextBreak();
$textleftNew->addText($para23a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleftNew->addText($para23b,array('name'=>'Times New Roman', 'size'=>12));
$textleftNew->addTextBreak();
$textleftNew->addText($para23c,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleftNew->addTextBreak();
$textleftNew->addTextBreak();
$textleftNew->addText($para23d,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderletterrecordalfiling':
        
          $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('ASSIGNMENT AND REGISTERED USER SECTION (A&R)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter1->addTextBreak();
$textcenter1->addTextBreak();
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
       $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para13a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para13c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para13e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para13g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13h,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para13i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13j,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para23a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para23b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para23c,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para23d,array('name'=>'Times New Roman', 'size'=>12)); 
        break;
    case '*followupletterrecordalfiling':
        
          $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('ASSIGNMENT AND REGISTERED USER SECTION (A&R)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter1->addTextBreak();
$textcenter1->addTextBreak();
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para13a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para13c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para13e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para13g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13h,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para13i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para13j,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para23a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para23b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para23c,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para23d,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestlettertm35surrenderofregistration':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        
        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para14a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para14c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para14e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para14g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para24c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para24d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24e,array('name'=>'Times New Roman', 'size'=>12)); 
        break;
    case 'reminderlettertm35surrenderofregistration':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
       $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para14a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para14c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para14e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para14g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para24c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para24d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24e,array('name'=>'Times New Roman', 'size'=>12));  
        break;
    case '*followuplettertm35surrenderofregistration':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para14a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para14c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para14e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para14f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para14g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para24c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para24d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para24e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestlettertm38modificationofmark':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
       $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para15a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para15c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para25a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para25b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para25c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para25d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para25e,array('name'=>'Times New Roman', 'size'=>12)); 
        break;
    case 'reminderlettertm38modificationofmark':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para15a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para15c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para25a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para25b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para25c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para25d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para25e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followuplettertm38modificationofmark':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para15a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para15c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para15f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para15g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para25a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para25b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para25c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para25d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para25e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestlettertm57review':
        
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
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para16a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para16b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para16c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para16d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para16e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para16f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para16g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para26a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para26b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para26c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para26d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para26e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderlettertm57review':
        
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
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
       $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para16a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para16b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para16c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para16d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para16e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para16f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para16g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para26a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para26b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para26c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para26d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para26e,array('name'=>'Times New Roman', 'size'=>12)); 
        break;
    case '*followuplettertm57review':
        
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
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
       $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para16a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para16b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para16c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para16d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para16e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para16f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para16g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para26a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para26b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para26c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para26d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para26e,array('name'=>'Times New Roman', 'size'=>12)); 
        break;
    case 'requestlettertm59duplicatecertificate':
        
        $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RECORD, INSPECTION AND LEGAL CERTIFICATE (RI & LC)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
          $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para17a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para17c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17h,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para17i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para27c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para27d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderlettertm59duplicatecertificate':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RECORD, INSPECTION AND LEGAL CERTIFICATE (RI & LC)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para17a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para17c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17h,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para17i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para27c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para27d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followuplettertm59duplicatecertificate':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RECORD, INSPECTION AND LEGAL CERTIFICATE (RI & LC)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para17a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para17c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para17h,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para17i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para27c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para27d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para27e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestlettertm70legalcertificate':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RECORD, INSPECTION AND LEGAL CERTIFICATE (RI & LC)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para18a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para18c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para18e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para28c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para28d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderlettertm70legalcertificate':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RECORD, INSPECTION AND LEGAL CERTIFICATE (RI & LC)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
         $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para18a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para18c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para18e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para28c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para28d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followuplettertm70legalcertificate':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RECORD, INSPECTION AND LEGAL CERTIFICATE (RI & LC)',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
         $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para18a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para18c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para18d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para18e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para28c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para28d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para28e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestletterinterlocutorypetition':
        
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
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para19a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para19c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para19e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para29a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para29b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para29c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para29d,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderletterinterlocutorypetition':
        
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
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
         $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para19a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para19c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para19e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para29a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para29b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para29c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para29d,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followupletterinterlocutorypetition':
        
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
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
         $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para19a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para19c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para19d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para19e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para29a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para29b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para29c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para29d,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestlettertm12renewalofregistration':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
         $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para110a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para110c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110h,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para210a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para210b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para210c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para210d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para210e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderlettertm12renewalofregistration':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
       $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para110a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para110c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110h,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para210a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para210b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para210c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para210d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para210e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followuplettertm12renewalofregistration':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para110a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para110c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para110h,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para110i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para210a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para210b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para210c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para210d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para210e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestlettertm13restorationoftrademark':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
       $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para111a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para111b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para111c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para111d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para111e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para211a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para211b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para211c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para211d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para211e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para211f,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderlettertm13restorationoftrademark':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para111a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para111b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para111c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para111d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para111e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para211a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para211b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para211c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para211d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para211e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para211f,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followuplettertm13restorationoftrademark':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para111a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para111b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para111c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para111d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para111e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para211a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para211b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para211c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para211d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para211e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para211f,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'requestlettertm40reclassification':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
         $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para112a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para112b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para112c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para112d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para112e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para112g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para212a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para212b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para212c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para212d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para212e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case 'reminderlettertm40reclassification':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
         $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para112a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para112b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para112c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para112d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para112e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para112g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para212a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para212b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para212c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para212d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para212e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    case '*followuplettertm40reclassification':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para112a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para112b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para112c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para112d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para112e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para112g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para212a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para212b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para212c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para212d,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para212e,array('name'=>'Times New Roman', 'size'=>12));
        break;
    
     case 'reminderlettercorrectionoferrorsinregistrationcertificate':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('PRE-REGISTRATION AMENDMENT SECTION (PRAS) URGENT/PRIORITY
',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para113a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para113b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para113c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para113d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para113e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para113f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para113g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para113h,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para113i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para113j,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para113k,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para113l,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para213a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para213b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para213c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para213d,array('name'=>'Times New Roman', 'size'=>12));
break;
     case 'followuplettercorrectionoferrorsinregistrationcertificate':
        
         $textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('RENEWAL & AMENDMENT (R & A) SECTION',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: '.$currentDate.'',array('name'=>'Times New Roman', 'size'=>12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry',array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText('New Delhi',array('name'=>'Times New Roman', 'size'=>12));

$textcenter2 = $section->addTextRun(array('align' => 'center'));
$textcenter2->addText('Ref: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter2->addText('Registration No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
$textcenter3 = $section->addTextRun(array('align' => 'center'));
$textcenter3->addText('Sub: ',array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
$textcenter3->addText(''.$status_name.'',
        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        
        $textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText($para113a,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para113b,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para113c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para113d,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para113e,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para113f,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para113g,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para113h,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para113i,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para113j,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addText($para113k,array('name'=>'Times New Roman', 'size'=>12, 'bgColor'=>'red'));
$textleft->addText($para113l,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para213a,array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true));
$textleft->addText($para213b,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addText($para213c,array('name'=>'Times New Roman', 'size'=>12));
$textleft->addTextBreak();
$textleft->addTextBreak();
$textleft->addText($para213d,array('name'=>'Times New Roman', 'size'=>12));
break;
       default:
        break;
}


//$para = $para1.$para2;
//\PhpOffice\PhpWord\Shared\Html::addHtml($section, $para1);
//\PhpOffice\PhpWord\Shared\Html::addHtml($section, $para2);
//\PhpOffice\PhpWord\Shared\Html::addHtml($section, $para3);

$textright2 = $section->addTextRun(array('align' => 'right'));
$textright2->addImage(
    'images/sign4.png',
    array('align' => 'right',)
);
$textright2->addImage(
    'images/sign3.png',
    array('align' => 'right',)
);
$textright2->addTextBreak();
$textright2->addText('(Abhimanyu Kumar) (Dushyant Sahni)',array('name'=>'Times New Roman', 'size'=>12));
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
//$path = basename(__FILE__, '.php');
//write($phpWord, $path, $writers);
//header('location: phpword/samples/results/notification_word1.docx');
//$path = $appli . "_".str_replace('*', '', $_GET['compare_title']);
$path = $appli . "_".str_replace('*', '', $_GET['letter_filename']);
echo write($phpWord, $path, $writers);
header('location: phpword/samples/results/'.$path.".docx");