<?php
include_once 'phpword/samples/Sample_Header.php';
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// New portrait section
$section = $phpWord->addSection();

ini_set('display_errors', 'off');
$app_id = $_GET['id'];
$fid = $_GET['notice_id'];

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

//$applicanttext = $section->addTextRun(array('bold'=>true));
//$applicanttext->addText(''.$applicant.'',array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true ));
//$phpWord->addTitleStyle(1, array('size' => 12, 'color' => '333333', 'bold' => true));
//$asd = $section->addTitle('I am Title 1', 1);

$para11 = "<p>We, ALG India Law Offices, on behalf of our client, <strong>$applicant</strong> (the Applicant), hereby request you to kindly examine under Rule 37(2) of the Trade Marks Rules, 2002, at the earliest, the subject pending application filed on $date_filling. We further urge you to consider directly issuing an order for advertisement under Section 18(4) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required.</p>";
$para12 = "<p>We, ALG India Law Offices, on behalf of our client, <strong>$applicant</strong> (the Applicant), would like to bring to your attention the request for expedited examination (on Form TM-63) filed by us on September 27, 2013 (copy enclosed) requesting the expedited examination under Rule 38(1) of the Trade Marks Rules, 2002 of the subject application filed on $date_filling. This request was made in light of enforcement of trademark rights with respect to the applied-for mark by the Applicant (enclosed is the declaration filed by us to this effect along with the Form TM-63). We request you to kindly examine the same at the earliest, since the statutorily prescribed three-month period expires on December 26, 2013.</p>";
$para13 .= "<p>We, ALG India Law Offices, on behalf of our client, <strong>$applicant</strong> (the Applicant), hereby request you to kindly refer to our Reply dated February 13, 2013 to the Examination Report for the subject pending application filed on $date_filling.</p>";
$para13 .= "<p>We request you to treat all objections as having been met adequately thereby and accordingly urge you to issue necessary orders for advertisement under Section 18(4) of the Trade Marks Act, 1999. The application may kindly be advertised, even if only provisionally under an order for advertisement before acceptance (ABA Order) under Section 20(1) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required.</p>";
$para14 = "<p>We, ALG India Law Offices, on behalf of our client, <strong>$applicant</strong> hereby request you to kindly expedite the process of publication of the subject application filed on $date_filling, in a forthcoming TM Journal under Section 20(1) of the Trade Marks Act, 1999.</p>";
$para14 .= "<p>The order for advertisement of the subject application has been issued by the Registrar of Trade Marks on January 4, 2012, and any and all compliances due have been made vide our response dated January 16, 2012.</p>";
$para15 = "<p>We, ALG India Law Offices, on behalf of our client, <strong>$applicant</strong> (the Applicant) would like to inform you that the subject application filed on $date_filling was advertised in TM Journal No. 1596-0 dated July 8, 2013 and the statutory period to oppose the same has successfully been completed as per the TM Office records.</p>";
$para15 .= "<p>We hereby request you to kindly accept our subject application finally, and register the same at the earliest under Section 23(1) of the Trade Marks Act, 1999, ensuring that the correct particulars are reflected in the Registration Certificate, as and when the same is issued.</p>";
$para16 = "<p>We, ALG India Law Offices, wish to inform you on behalf of our client, <strong>$applicant</strong> that there are errors in the TM Office online Records of the subject application filed on $date_filling.</p>";
$para17 = "<p>We, ALG India Law Offices, wish to inform you on behalf of our client, <strong>$applicant</strong> that there are errors in the advertisement of the subject application filed on $date_filling, published in TM Journal No. 1640-0 dated May 26, 2014.</p>";
$para18 = "<p>We, ALG India Law Offices, on behalf of our client, <strong>$applicant</strong> would like to inform you that the Form TM-16 [filed on October 1, 2007 for change of address for service in India] in the subject application filed on $date_filling under Section 22 of the Trade Marks Act, 1999 is yet to be taken on record by the TM Office. We are accordingly submitting this letter requesting for the same to be expedited and the necessary order/s be passed.</p>";
$para18 .= "<p>If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.</p>";
$para19 = "<p>We, ALG India Law Offices, on behalf of our client, <strong>$applicant</strong> (the Applicant) hereby request you to kindly fix a fresh date of hearing in the subject application filed on $date_filling, pursuant to the Form TM-57 filed by us on August 6, 2010 for review of the Registrar’s decision/order dated June 7, 2010 under Section 127(c) of the Trade Marks Act, 1999.</p>";
$para110 = "<p>We, ALG India Law Offices, on behalf of our client, <strong>$applicant</strong> (the Applicant) hereby request you to kindly fix a date of hearing on our Form TM-53 filed by us on August 6, 2010 for division of the subject application filed on $date_filling under Rule 104(1) of the Trade Marks Rules, 2002.</p>";

$para21 = "<p>We shall be grateful if the needful is done at the earliest.</p>";
$para21 .= "<p>We also request an interview/hearing to press our request.</p>";
$para21 .= "<p><strong>Enclosed: </strong>Power of Attorney</p>";
$para21 .= "<p>All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.</p>";
$para22 = "<p><strong>Enclosed: </strong>Power of Attorney</p>";
$para22 .= "<p>All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.</p>";
$para23 = "<p>We further urge you to consider directly issuing an order for advertisement under Section 20(1) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required.<p>";
$para23 .= "<p>We shall be grateful if the needful is done at the earliest.<p>";
$para23 .= "<p><strong>Enclosed: </strong>Power of Attorney</p>";
$para23 .= "<p>All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.<p>";
$para24 = "<p>We further urge you to consider directly issuing an order for advertisement under Section 20(1) of the Trade Marks Act, 1999. We undertake to make any necessary compliance filings, if required.<p>";
$para24 .= "<p><strong>Enclosed: </strong>Power of Attorney</p>";
$para24 .= "<p>All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.<p>";
$para25 = "<p>In the TM Office online records, we note the following errors: - </p>";
$para25 .= "<p>1.</p>";	
$para25 .= "<p>2.</p>";	
$para25 .= "<p>3.</p>";	
$para25 .= "<p>The learned Registrar is respectfully requested to rectify the TM Office online records, and ensure that the advertisement of the mark when published in TM Journal contains the correct particulars. If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.<p>";
$para26 = "<p>In the advertisement, we note the following errors: - </p>";
$para26 .= "<p>1.</p>";	
$para26 .= "<p>2.</p>";	
$para26 .= "<p>3.</p>";	
$para26 .= "<p>The learned Registrar is respectfully requested to rectify the TM Office online records, publish a corrigendum to this effect and ensure that the certificate of registration of the mark, when issued, contains the correct particulars of the Applicant. If any further clarification is required, a hearing/ interview may kindly be scheduled and intimated to us.</p>";
$para27 = "<p><strong>Enclosed: </strong>Power of Attorney</p>";
$para27 .= "<p>Form TM-57</p>";
$para27 .= "<p>Copy of Order dated June 7, 2010</p>";
$para27 .= "<p>All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.<p>";
$para28 = "<p><strong>Enclosed: </strong>Power of Attorney</p>";
$para28 .= "<p>Form TM-53</p>";
$para28 .= "<p>All communications relating to this application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.</p>";
$para_footer = "Encl: 	Copy of Online Records
Copy of Additional Representation
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
    case 'reminderletterearlyexamination':
        $para1 = $para11;
        $para2 = $para22;
        break;
    case '*followupletterearlyexamination':
        $para1 = $para11;
        $para2 = $para22;
        break;
    case 'requestlettertm63':
        $para1 = $para12;
        $para2 = $para23;
        break;
    case 'reminderlettertm63':
        $para1 = $para12;
        $para2 = $para24;
        break;
    case '*followuplettertm63':
        $para1 = $para12;
        $para2 = $para24;
        break;
    case 'requestletterearlyexamination':
        $para1 = $para11;
        $para2 = $para21;
        break;
    case 'requestletterorderforadvertisement':
        $para1 = $para13;
        $para2 = $para21;
        break;
    case 'reminderletterorderforadvertisement':
        $para1 = $para13;
        $para2 = $para22;
        break;
    case 'requestletteradvertisement':
        $para1 = $para14;
        $para2 = $para21;
        break;
    case 'reminderletteradvertisement':
        $para1 = $para14;
        $para2 = $para22;
        break;
    case 'requestletterfinalacceptance':
        $para1 = $para15;
        $para2 = $para22;
        break;
    case 'reminderletterfinalacceptance':
        $para1 = $para15;
        $para2 = $para22;
        break;
    case 'reminderlettercorrectionoferrorsinonlinerecords':
        $para1 = $para16;
        $para2 = $para25;
        $para_footer1 = $para_footer;
        break;
    case '*followuplettercorrectionoferrorsinonlinerecords':
        $para1 = $para16;
        $para2 = $para25;
        $para_footer1 = $para_footer;
        break;
    case 'reminderlettercorrectionoferrorsinjournaladvertisement':
        $para1 = $para17;
        $para2 = $para26;
        $para_footer1 = $para_footer;
        break;
    case '*followuplettercorrectionoferrorsinjournaladvertisement':
        $para1 = $para17;
        $para2 = $para26;
        $para_footer1 = $para_footer;
        break;
    case 'requestlettertm16':
        $para1 = $para18;
        $para2 = $para22;
        break;
    case 'reminderlettertm16':
        $para1 = $para18;
        $para2 = $para22;
        break;
    case '*followuplettertm16':
        $para1 = $para18;
        $para2 = $para22;
        break;
    case 'requestlettertm57':
        $para1 = $para19;
        $para2 = $para27;
        break;
    case 'reminderlettertm57':
        $para1 = $para19;
        $para2 = $para27;
        break;
    case '*followuplettertm57':
        $para1 = $para19;
        $para2 = $para27;
        break;
    case 'requestlettertm53':
        $para1 = $para110;
        $para2 = $para28;
        break;
    case 'reminderlettertm53':
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

$textcenter1 = $section->addTextRun(array('align' => 'center'));
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

//$textleft2 = $section->addTextRun(array('align' => 'left'));
//$textleft2 = $section->addTable();
//$textleft2->addRow();
//$cell = $textleft2->addCell(10000);
//$textleftrow = $cell->addTextRun(array('align' => 'left'));

//$html = '<h1>Adding element via HTML</h1>';
//$html .= '<p>Some well formed HTML snippet needs to be used</p>';
//$html .= '<p>With for example <strong>some<sup>1</sup> <em>inline</em> formatting</strong><sub>1</sub></p>';
//$html .= '<p>Unordered (bulleted) list:</p>';
//$html .= '<ul><li>Item 1</li><li>Item 2</li><ul><li>Item 2.1</li><li>Item 2.1</li></ul></ul>';
//$html .= '<p>Ordered (numbered) list:</p>';
//$html .= '<ol><li>Item 1</li><li>Item 2</li></ol>';

\PhpOffice\PhpWord\Shared\Html::addHtml($section, $para1);
\PhpOffice\PhpWord\Shared\Html::addHtml($section, $para2);

//$textleft2->addText($para1[0],array('name'=>'Times New Roman', 'size'=>12));
//$textleft2->addText($para1[1],array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true,));
//$textleft2->addText($para1[2],array('name'=>'Times New Roman', 'size'=>12));
//$textleft2->addTextBreak();
//$textleft2->addTextBreak();
//$textleft2->addText($para1[3],array('name'=>'Times New Roman', 'size'=>12));
//
//$textleft4 = $section->addTextRun(array('align' => 'left'));
//$textleft4->addText($para2[0],array('name'=>'Times New Roman', 'size'=>12));
//$textleft4->addTextBreak();
//$textleft4->addTextBreak();
//$textleft4->addText($para2[1],array('name'=>'Times New Roman', 'size'=>12));
//$textleft4->addTextBreak();
//$textleft4->addTextBreak();
//$textleft4->addText($para2[2],array('name'=>'Times New Roman', 'size'=>12, 'bold'=>true,));
//$textleft4->addText($para2[3],array('name'=>'Times New Roman', 'size'=>12));
//$textleft4->addTextBreak();
//$textleft4->addTextBreak();
//$textleft4->addText($para2[4],array('name'=>'Times New Roman', 'size'=>12));

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
echo $path = basename(__FILE__, '.php');
echo write($phpWord, $path, $writers);
#header('location: PHPWord-master/samples/results/notification_word1.docx');
