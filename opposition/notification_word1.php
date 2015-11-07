<?php
//ini_set('display_errors', 'off');
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
//$status_name = str_replace('*','',$row_status['status_name']);
$status_name = $row_status['status_name'];
$placeholders = array('*', 'Apln', 'Oppn', 'Regn', 'Rctn');
$status_name_new = array('', 'Application', 'Opposition', 'Registration', 'Rectification');
$status_name_new = str_replace($placeholders, $status_name_new, $status_name);

$sql = "select *,(SELECT name FROM user WHERE id = a.applicant) AS applicant from application a where id = $app_id";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$appli = $row['application_no'];
$rctn_no = $row['rctn_no'];
$class = $row['classes'];
$trademark = $row['mark'];
$client_marks = $row['client_marks'];
$jurisdiction = $row['jurisdiction'];
$placeholdersCity = array('DEL', 'KOL', 'MUM', 'CHE', 'AMD');
$jurisdiction_new = array('New Delhi', 'Kolkata', 'Mumbai', 'Chennai', 'Ahmedabad');
$jurisdiction_new = str_replace($placeholdersCity, $jurisdiction_new, $jurisdiction);
$applicant = str_replace('&', 'and', $row['applicant']);
$fillingdate = $row['filing_date'];
$date_filling = date('F d, Y', strtotime($fillingdate));
$currentDate = date("d.m.Y"); //die();

$para11a = "We, ALG India Law Offices, on behalf of our client, ";
$para11b = "$applicant";
$para11c = " (the Opponent), wish to inform that as per our records the TM Office is yet to issue the service letter in respect of our Notice of Opposition filed on ";
$para11d = "June 4, 2013.";
$para11e = " As per Section 21(2) of the Trade Marks Act, 1999, read with Rule 47(7) of the Trade Marks Rules, 2002, the Hon'ble Registrar shall serve a copy of the Notice of Opposition upon the Applicant and such a copy of the Notice of Opposition shall ordinarily be served upon the Applicant within three months of the receipt of the Notice of Opposition by the TM Office.";
$para11f = "In light of the above, it is requested that the Hon'ble Registrar may be pleased to expedite the process of service of the Notice of Opposition upon the Applicant.";

$para12a = "We, ALG India Law Offices, on behalf of our client, ";
$para12b = "$applicant";
$para12c = " (the Opponent), wish to inform that as per our records the TM Office is yet to issue the service letter in respect of our Notice of Opposition filed on ";
$para12d = "June 4, 2013.";
$para12e = " As per Section 21(2) of the Trade Marks Act, 1999, read with Rule 47(7) of the Trade Marks Rules, 2002, the Hon'ble Registrar shall serve a copy of the Notice of Opposition upon the Applicant and such a copy of the Notice of Opposition shall ordinarily be served upon the Applicant within three months of the receipt of the Notice of Opposition by the TM Office.";
$para12f = "In light of the above it is requested that the Hon'ble Registrar may be pleased to expedite the process of service of the Notice of Opposition upon the Applicant.";
$para12g = "We have filed a similar request on ";
$para12h = "....";
$para12i = " already, and shall be grateful if the needful is done at the earliest.";

$para13a = "We, ALG India Law Offices, on behalf of our client, ";
$para13b = "$applicant";
$para13c = " (the Opponent), would like to bring to your attention that the above referenced Notice of Opposition was served upon the Applicant vide TM Office letter (dispatch) dated ";
$para13d = "October 14, 2013.";
$para13e = " In case the Counter-Statement has been filed by the Applicant within the stipulated time period of two months from the date of receipt of the copy of the Notice of Opposition by the Applicant (as per Section 21(2) of the Trade Marks Act, 1999 read with Rule 49 of the Trade Marks Rules, 2002), the Hon'ble Registrar, in pursuance of Section 21(3) of the Trade Marks Act, 1999, shall serve a copy of the Counter-Statement upon the Opponent.";
$para13f = "In light of the above, the Hon’ble Registrar is requested to expedite the service of the Counter-Statement, if any, upon the Opponent.";

$para14a = "We, ALG India Law Offices, on behalf of our client, ";
$para14b = "$applicant";
$para14c = " (the Opponent), would like to bring to your attention that the above referenced Notice of Opposition was served upon the Applicant vide TM Office letter (dispatch) dated ";
$para14d = "October 14, 2013.";
$para14e = " In case the Counter-Statement has been filed by the Applicant within stipulated time period of two months from the date of receipt of the copy of the Notice of Opposition by the Applicant (as per Section 21(2) of the Trade Marks Act, 1999 read with Rule 49 of the Trade Marks Rules, 2002), the Hon'ble Registrar, in pursuance of Section 21(3) of the Trade Marks Act, 1999, shall serve a copy of the Counter-Statement upon the Opponent.";
$para14f = "In light of the above, the Hon’ble Registrar is requested to expedite the service of the Counter-Statement, if any, upon the Opponent.";
$para14g = "We have filed similar request on ";
$para14h = "....";
$para14i = " already, and shall be grateful if the needful is done at the earliest.";

$para15a = "We, ALG India Law Offices, on behalf of our client, ";
$para15b = "$applicant";
$para15c = " (the Opponent), would like to bring to your attention that the Notice of Opposition [TM-5] filed by the Opponent was served upon the Applicant vide TM Office letter (dispatch) dated ";
$para15d = "November 10, 2008.";
$para15e = " As per our records, the Applicant has failed to file its Counter-Statement [TM-6] in the subject Opposition within the stipulated time period of two months (from the date of service of the Notice of Opposition) as required under Section 21(2) of the Trade Marks Act, 1999 read with Rule 49 of the Trade Marks Rules, 2002 and therefore the subject Application is deemed to have been abandoned by the Applicant under Section 21(2) of the Trade Marks Act, 1999.";
$para15f = "It is therefore requested that the Hon'ble Registrar may be pleased to expedite passing of an order treating the abovementioned Application as 'abandoned' along with costs.";

$para16a = "We, ALG India Law Offices, on behalf of our client, ";
$para16b = "$applicant";
$para16c = " (the Opponent), would like to bring to your attention that the Notice of Opposition [TM-5] filed by the Opponent was served upon the Applicant vide TM Office letter (dispatch) dated ";
$para16d = "November 10, 2008.";
$para16e = " As per our records, the Applicant has failed to file its Counter-Statement [TM-6] in the subject Opposition within the stipulated time period of two months (from the date of service of the Notice of Opposition) as required under Section 21(2) of the Trade Marks Act, 1999 read with Rule 49 of the Trade Marks Rules, 2002 and therefore the subject Application is deemed to have been abandoned by the Applicant under Section 21(2) of the Trade Marks Act, 1999.";
$para16f = "It is therefore requested that the Hon'ble Registrar may be pleased to expedite passing of an order treating the abovementioned Application as 'abandoned' along with costs.";
$para16g = "We have filed a similar requests on ";
$para16h = "....";
$para16i = " already, and shall be grateful if the needful is done at the earliest.";

$para151a = "We, ALG India Law Offices, on behalf of our client, ";
$para151b = "$applicant";
$para151c = " (the Opponent), would like to bring to your attention that the Notice of Opposition [TM-5] filed by the Opponent was served upon the Applicant vide TM Office letter (dispatch) dated ";
$para151d = "November 10, 2008.";
$para151e = " As per our records, the Applicant has failed to file its Counter-Statement [TM-6] in the subject Opposition within the stipulated time period of two months (from the date of service of the Notice of Opposition) as required under Section 21(2) of the Trade Marks Act, 1999 read with Rule 49 of the Trade Marks Rules, 2002 and therefore, the subject Application is deemed to have been abandoned by the Applicant under Section 21(2) of the Trade Marks Act, 1999.";
$para151f = "It is therefore requested that the Hon'ble Registrar may be pleased to expedite passing of an order treating the abovementioned Application as 'Abandoned' along with costs.";
$para151g = "We have filed a similar requests on ";
$para151h = "....";
$para151i = " already, and shall be grateful if the needful is done at the earliest.";

$para17a = "We, ALG India Law Offices, on behalf of our client, ";
$para17b = "$applicant";
$para17c = " (the Applicant), would like to bring to your attention that the above referenced Notice of Opposition was filed by the Opponent on ";
$para17d = "October 21, 2013";
$para17e = " as per the TM Office online status page.";
$para17f = "The Applicant is yet to be served with a copy of such Notice of Opposition. As per Section 21(2) of the Trade Marks Act, 1999, read with Rule 47(7) of the Trade Marks Rules, 2002, the Hon’ble Registrar shall serve a copy of the Notice of Opposition upon the Applicant and such a copy of the Notice of Opposition shall ordinarily be served upon the Applicant within three months of the receipt of the Notice of Opposition by the TM Office.";
$para17g = "In light of the above, the Hon'ble Registrar is requested to serve a copy of the Notice of Opposition upon the Applicant as expeditiously as possible.";

$para18a = "We, ALG India Law Offices, on behalf of our client, ";
$para18b = "$applicant";
$para18c = " (the Applicant), would like to bring to your attention that the above referenced Notice of Opposition was filed by the Opponent on ";
$para18d = "October 21, 2013";
$para18e = " as per the TM Office online status page.";
$para18f = "The Applicant is yet to be served with a copy of such Notice of Opposition. As per Section 21(2) of the Trade Marks Act, 1999, read with Rule 47(7) of the Trade Marks Rules, 2002, the Hon’ble Registrar shall serve a copy of the Notice of Opposition upon the Applicant and such a copy of the Notice of Opposition shall ordinarily be served upon the Applicant within three months of the receipt of the Notice of Opposition by the TM Office.";
$para18g = "In light of the above, the Hon'ble Registrar is requested to serve a copy of the Notice of Opposition upon the Applicant as expeditiously as possible.";
$para18h = "We have filed a similar request on ";
$para18i = "....";
$para18j = " already, and shall be grateful if the needful is done at the earliest.";

$para152a = "We, ALG India Law Offices, on behalf of our client, ";
$para152b = "$applicant";
$para152c = " (the Applicant), would like to bring to your attention that the above referenced Notice of Opposition was filed by the Opponent on ";
$para152d = "October 21, 2013";
$para152e = " as per the TM Office online status page.";
$para152f = "The Applicant is yet to be served with a copy of such Notice of Opposition. As per Section 21(2) of the Trade Marks Act, 1999, read with Rule 47(7) of the Trade Marks Rules, 2002, the Hon’ble Registrar shall serve a copy of the Notice of Opposition upon the Applicant and such a copy of the Notice of Opposition shall ordinarily be served upon the Applicant within three months of the receipt of the Notice of Opposition by the TM Office.";
$para152g = "In light of the above, the Hon'ble Registrar is requested to serve a copy of the Notice of Opposition upon the Applicant as expeditiously as possible.";
$para152h = "We have filed a similar requests on ";
$para152i = "....";
$para152j = " already, and shall be grateful if the needful is done at the earliest.";

$para19a = "We, ALG India Law Offices, on behalf of our client, ";
$para19b = "$applicant";
$para19c = " (the Applicant), would like to bring to your attention that the Counter-Statement [TM-6] filed by the Applicant on ";
$para19d = "September 3, 2012";
$para19e = " is yet to be served upon the Opponent.";
$para19f = "As per Section 21(3) of the Trade Marks Act, 1999 read with Rule 49 of the Trade Marks Rules, 2002, the Hon'ble Registrar shall serve a copy of the Counter-Statement upon the Opponent and such a copy of the Counter-Statement shall ordinarily be served upon the Opponent within two months from the date of receipt of the Counter-Statement by the Registrar.";
$para19g = "In light of the above, the Hon’ble Registrar is requested to serve a copy of the Counter-Statement upon the Opponent as expeditiously as possible so that the Opposition can proceed further.";

$para110a = "We, ALG India Law Offices, on behalf of our client, ";
$para110b = "$applicant";
$para110c = " (the Applicant), would like to bring to your attention that the Counter-Statement [TM-6] filed by the Applicant on ";
$para110d = "September 3, 2012";
$para110e = " is yet to be served upon the Opponent.";
$para110f = "As per Section 21(3) of the Trade Marks Act, 1999 read with Rule 49 of the Trade Marks Rules, 2002, the Hon'ble Registrar shall serve a copy of the Counter-Statement upon the Opponent and such a copy of the Counter-Statement shall ordinarily be served upon the Opponent within two months from the date of receipt of the Counter-Statement by the Registrar.";
$para110g = "In light of the above, the Hon’ble Registrar is requested to serve a copy of the Counter-Statement upon the Opponent as expeditiously as possible so that the Opposition can proceed further.";
$para110h = "We have filed similar request on ";
$para110i = "....";
$para110j = " already, and shall be grateful if the needful is done at the earliest.";

$para111a = "We, ALG India Law Offices, on behalf of our client, ";
$para111b = "$applicant";
$para111c = " (the Applicant), wish to inform you that the Counter-Statement [TM-6] filed by the Applicant was served upon the Opponent vide TM Office letter dated ";
$para111d = "May 22, 2008.";
$para111e = " As per our records, the Opponent has failed to file any evidence in support of its opposition or a statement in lieu thereof [under Rule 50 of the Trade Marks Rules, 2002] within the statutory time period.";
$para111f = "In light of the above, it is requested that the Hon’ble Registrar may be pleased to pass an appropriate order treating the abovementioned Opposition as abandoned under Rule 50(2) of the Trade Marks Rules, 2002 along with costs.";

$para112a = "We, ALG India Law Offices, on behalf of our client, ";
$para112b = "$applicant";
$para112c = " (the Applicant), wish to inform you that the Counter-Statement [TM-6] filed by the Applicant was served upon the Opponent vide TM Office letter dated ";
$para112d = "May 22, 2008.";
$para112e = " As per our records, the Opponent has failed to file any evidence in support of its opposition or a statement in lieu thereof [under Rule 50 of the Trade Marks Rules, 2002] within the statutory time period.";
$para112f = "In light of the above, it is requested that the Hon’ble Registrar may be pleased to pass an appropriate order treating the abovementioned Opposition as abandoned under Rule 50(2) of the Trade Marks Rules, 2002 along with costs.";
$para112g = "We have filed similar request on ";
$para112h = "....";
$para112i = " already, and shall be grateful if the needful is done at the earliest.";

$para113a = "We, ALG India Law Offices, on behalf of our client, ";
$para113b = "$applicant";
$para113c = " (the Rectificant), wish to inform you that the Rectification Application [TM-26] along with accompanying Statement of Case for Rectification was filed by the Rectificant at the TM Office on ";
$para113d = "August 3, 2010.";
$para113e = " As per Rule 92 of the Trade Marks Rules, 2002, the Registrar shall ordinarily within one month from the date of filing of Rectification Application transmit a copy of the Rectification Application and the accompanying Statement of Case to the registered proprietor. As per our records, service of the Rectification Application and the Statement of Case upon the registered proprietor is still pending.";
$para113f = "In light of the above it is requested that the Hon'ble Registrar may be pleased to expedite service of the Rectification Application and the Statement of Case upon the registered proprietor.";

$para114a = "We, ALG India Law Offices, on behalf of our client, ";
$para114b = "$applicant";
$para114c = " (the Rectificant), wish to inform you that the Rectification Application [TM-26] along with accompanying Statement of Case for Rectification was filed by the Rectificant at the TM Office on ";
$para114d = "August 3, 2010.";
$para114e = " As per Rule 92 of the Trade Marks Rules, 2002, the Registrar shall ordinarily within one month from the date of filing of Rectification Application transmit a copy of the Rectification Application and the accompanying Statement of Case to the registered proprietor. As per our records, service of the Rectification Application and the Statement of Case upon the registered proprietor is still pending.";
$para114f = "In light of the above it is requested that the Hon'ble Registrar may be pleased to expedite service of the Rectification Application and the Statement of Case upon the registered proprietor.";
$para114g = "We have filed similar request on ";
$para114h = "....";
$para114i = " already, and shall be grateful if the needful is done at the earliest.";

$para115a = "We, ALG India Law Offices, on behalf of our client, ";
$para115b = "$applicant";
$para115c = " (the Rectificant), would like to point out that our Rectification Application [Form TM-26] along with the Statement of Case filed by the Rectificant, was served upon the Registrant vide TM Office letter (dispatch) dated ";
$para115d = "January 21, 2014.";
$para115e = " It is submitted that the service of the Counter-Statement upon the Rectificant is still pending. In case the Counter-Statement has been filed by the Registrant within the stipulated time period of two months (extendable by one month) from the date of receipt of the copy of the Rectification Petition by the Registrant (as per Rule 93 of the Trade Marks Rules, 2002), the Hon’ble Registrar, shall serve a copy of the Counter-Statement upon the Rectificant.";
$para115f = "In light of the above, it is requested that the Hon'ble Registrar be pleased to expedite service of the Counter-Statement, if any, upon the Rectificant.";

$para116a = "We, ALG India Law Offices, on behalf of our client, ";
$para116b = "$applicant";
$para116c = " (the Rectificant), would like to point out that our Rectification Application [Form TM-26] along with the Statement of Case filed by the Rectificant, was served upon the Registrant vide TM Office letter (dispatch) dated ";
$para116d = "January 21, 2014.";
$para116e = " It is submitted that the service of the Counter-Statement upon the Rectificant is still pending. In case the Counter-Statement has been filed by the Registrant within the stipulated time period of two months (extendable by one month) from the date of receipt of the copy of the Rectification Petition by the Registrant (as per Rule 93 of the Trade Marks Rules, 2002), the Hon’ble Registrar, shall serve a copy of the Counter-Statement upon the Rectificant.";
$para116f = "In light of the above, it is requested that the Hon'ble Registrar be pleased to expedite service of the Counter-Statement, if any, upon the Rectificant.";
$para116g = "We have filed similar request on ";
$para116h = "....";
$para116i = " already, and shall be grateful if the needful is done at the earliest.";

$para153a = "We, ALG India Law Offices, on behalf of our client, ";
$para153b = "$applicant";
$para153c = " (the Rectificant), would like to point out that our Rectification Application [Form TM-26] along with the Statement of Case filed by the Rectificant, was served upon the Registrant vide TM Office letter (dispatch) dated ";
$para153d = "January 21, 2014.";
$para153e = " It is submitted that the service of the Counter-Statement upon the Rectificant is still pending. In case the Counter-Statement has been filed by the Registrant within the stipulated time period of two months (extendable by one month) from the date of receipt of the copy of the Rectification Application by the Registrant (as per Rule 93 of the Trade Marks Rules, 2002), the Hon’ble Registrar, shall serve a copy of the Counter-Statement upon the Rectificant.";
$para153f = "In light of the above, it is requested that the Hon'ble Registrar be pleased to expedite service of the Counter-Statement, if any, upon the Rectificant.";
$para153g = "We have filed similar request on ";
$para153h = "....";
$para153i = " already, and shall be grateful if the needful is done at the earliest.";

$para117a = "We, ALG India Law Offices, on behalf of our client, ";
$para117b = "$applicant";
$para117c = " (the Rectificant), would like to point out that our Application for Rectification [Form TM-26] along with the Statement of Case filed by the Rectificant, was served upon the Registrant vide TM Office letter (dispatch) dated ";
$para117d = "January 21, 2014.";
$para117e = " It is submitted that the Registrant was to file its Counter-Statement within a maximum of three months from the date of service of the Rectification Application. No Counter-Statement has been filed till date, which failure to file is wilful and without justification.";
$para117f = "In light of the above, it is requested that the Hon'ble Registrar may be pleased to ";
$para117g = "expunge/rectify";
$para117h = " the mark from the Register.";

$para118a = "We, ALG India Law Offices, on behalf of our client, ";
$para118b = "$applicant";
$para118c = " (the Rectificant), would like to point out that our Application for Rectification [Form TM-26] along with the Statement of Case filed by the Rectificant, was served upon the Registrant vide TM Office letter (dispatch) dated ";
$para118d = "January 21, 2014.";
$para118e = " It is submitted that the Registrant was to file its Counter-Statement within a maximum of three months from the date of service of the Rectification Application. No Counter-Statement has been filed till date, which failure to file is wilful and without justification.";
$para118f = "In light of the above, it is requested that the Hon'ble Registrar may be pleased to ";
$para118g = "expunge/rectify";
$para118h = " the mark from the Register.";
$para118i = "We have filed similar request on ";
$para118j = "....";
$para118k = " already, and shall be grateful if the needful is done at the earliest.";

$para119a = "We, ALG India Law Offices, on behalf of our client, ";
$para119b = "$applicant";
$para119c = " (the Registrant), wish to inform that our Counter-Statement filed on ";
$para119d = "January 21, 2014 ";
$para119e = " is yet to be served upon the Rectificant.";
$para119f = "As per Rule 93 of the Trade Marks Rules, 2002, the Hon'ble Registrar shall serve a copy of the Counter-Statement upon the Rectificant within one month of receipt of the same.";
$para119g = "In light of the above, it is requested that the Hon'ble Registrar may expedite service of our Counter-Statement upon the Rectificant.";

$para120a = "We, ALG India Law Offices, on behalf of our client, ";
$para120b = "$applicant";
$para120c = " (the Registrant), wish to inform that our Counter-Statement filed on ";
$para120d = " January 21, 2014";
$para120e = " is yet to be served upon the Rectificant.";
$para120f = "As per Rule 93 of the Trade Marks Rules, 2002, the Hon'ble Registrar shall serve a copy of the Counter-Statement upon the Rectificant within one month of receipt of the same.";
$para120g = "We have filed similar request on ";
$para120h = "....";
$para120i = " already, and shall be grateful if the needful is done at the earliest.";

$para121a = "We, ALG India Law Offices, on behalf of our client, ";
$para121b = "$applicant";
$para121c = " (the Registrant), would like to point out that we have filed the Counter-Statement at the TM Office on ";
$para121d = "January 21, 2014.";
$para121e = " As per our records, the Rectificant has failed to file an Affidavit of Evidence in support of Rectification or a statement in lieu thereof [under Rule 50 of the Trade Marks Rules, 2002] within the stipulated time period.";
$para121f = "In light of the above' it is requested that the Hon'ble Registrar may be pleased to pass an order treating the abovementioned Rectification Application as 'Abandoned' under Rule 50(2) of the Trade Marks Rules, 2002, along with costs.";

$para122a = "We, ALG India Law Offices, on behalf of our client, ";
$para122b = "$applicant";
$para122c = " (the Registrant), would like to point out that we have filed the Counter-Statement at the TM Office on ";
$para122d = "January 21, 2014.";
$para122e = " As per our records, the Rectificant has failed to file an Affidavit of Evidence in support of Rectification or a statement in lieu thereof [under Rule 50 of the Trade Marks Rules, 2002] within the stipulated time period.";
$para122f = "In light of the above' it is requested that the Hon'ble Registrar may be pleased to pass an order treating the abovementioned Rectification Application as 'Abandoned' under Rule 50(2) of the Trade Marks Rules, 2002, along with costs.";
$para122g = "We have filed similar request on ";
$para122h = "....";
$para122i = " already, and shall be grateful if the needful is done at the earliest.";

$para123a = "We, ALG India Law Offices, on behalf of our client, ";
$para123b = "$applicant";
$para123c = " (the Opponent), wish to inform you that the Applicant has filed a letter for withdrawal of the subject Application at the TM Office on ";
$para123d = "August 29, 2012";
$para123e = " (copy of withdrawal letter enclosed).";
$para123f = "The Hon'ble Registrar is therefore requested to expedite passing of an order treating the subject trademark Application as withdrawn.";

$para124a = "We, ALG India Law Offices, on behalf of our client, ";
$para124b = "$applicant";
$para124c = " (the Opponent), wish to inform you that the Applicant has filed a letter for withdrawal of the subject Application at the TM Office on ";
$para124d = "August 29, 2012";
$para124e = " (copy of withdrawal letter enclosed).";
$para124f = "The Hon'ble Registrar is therefore requested to expedite passing of an order treating the subject trademark Application as withdrawn.";
$para124g = "We have filed similar request on ";
$para124h = "....";
$para124i = " already, and shall be grateful if the needful is done at the earliest.";

$para125a = "We, ALG India Law Offices, on behalf of our client, ";
$para125b = "$applicant";
$para125c = " (the Applicant), wish to inform you that the subject application was published in Trade Marks Journal No. ";
$para125d = "1402-0 on October 16, 2008";
$para125e = " (made available to public on ";
$para125f = "October 16, 2008";
$para125g = "  ), whereas the subject Notice of Opposition was filed by the Opponent only on ";
$para125h = " March 18, 2009 ";
$para125i = " viz. beyond the statutorily prescribed time period of three months.";
$para125j = "In light of Section 21(1) of the Trade Marks Act, 1999 read with Rule 47(1) of the Trade Marks Rules, 2002, the subject Opposition is clearly time barred and should not be taken on record and should be dismissed ab initio.";
$para125k = "In light of the above, it is requested that the Hon'ble Registrar may be pleased to pass an order dismissing the abovementioned Opposition as time barred and allowing the subject Application to proceed for registration.";

$para126a = "We, ALG India Law Offices, on behalf of our client, ";
$para126b = "$applicant";
$para126c = " (the Applicant), wish to inform you that the subject application was published in Trade Marks Journal No. ";
$para126d = "1402-0 on October 16, 2008";
$para126e = " (made available to public on ";
$para126f = " October 16, 2008 ";
$para126g = " ), whereas the subject Notice of Opposition was filed by the Opponent only on ";
$para126h = "March 18, 2009";
$para126i = " viz. beyond the statutorily prescribed time period of three months.";
$para126j = "In light of Section 21(1) of the Trade Marks Act, 1999 read with Rule 47(1) of the Trade Marks Rules, 2002, the subject Opposition is clearly time barred and should not be taken on record and should be dismissed ab initio.";
$para126k = "In light of the above it is requested that the Hon'ble Registrar may be pleased to pass an order dismissing the abovementioned Opposition as time barred and allowing the subject Application to proceed for registration.";
$para126l = "We have filed similar request on ";
$para126m = "....";
$para126n = " already, and shall be grateful if the needful is done at the earliest.";

$para127a = "We, ALG India Law Offices, on behalf of our client, ";
$para127b = "$applicant";
$para127c = " (the Applicant), wish to inform you that that the Opponent has withdrawn the subject Opposition vide letter dated ";
$para127d = "August 13, 2013";
$para127e = " filed at the TM Office (copy of withdrawal letter enclosed).";
$para127f = "The Hon'ble Registrar is requested to take the withdrawal letter on record and pass an order treating the Opposition as withdrawn and accepting the application for registration.";

$para128a = "We, ALG India Law Offices, on behalf of our client, ";
$para128b = "$applicant";
$para128c = " (the Applicant), wish to inform you that that the Opponent has withdrawn the subject Opposition vide letter dated ";
$para128d = "August 13, 2013";
$para128e = " filed at the TM Office (copy of withdrawal letter enclosed).";
$para128f = "The Hon'ble Registrar is requested to take the withdrawal letter on record and pass an order treating the Opposition as withdrawn and accepting the application for registration.";
$para128g = "We have filed similar request on ";
$para128h = "....";
$para128i = " already, and shall be grateful if the needful is done at the earliest.";

$para154a = "We, ALG India Law Offices, on behalf of our client, ";
$para154b = "$applicant";
$para154c = " (the Applicant), wish to inform you that that the Opponent has withdrawn the subject Opposition vide letter dated ";
$para154d = "August 13, 2013";
$para154e = " filed at the TM Office (copy of withdrawal letter enclosed).";
$para154f = "The Hon'ble Registrar is requested to take the withdrawal letter on record and pass an order treating the Opposition as withdrawn and accepting the Application for registration.";
$para154g = "We have filed similar request on ";
$para154h = "....";
$para154i = " already, and shall be grateful if the needful is done at the earliest.";

$para129a = "We, ALG India Law Offices, on behalf of our client, ";
$para129b = "$applicant";
$para129c = " (the Rectificant), wish to inform you that the Registrant has requested to surrender its above Referenced Registration vide its letter dated ";
$para129d = "December 4, 2012";
$para129e = " filed at the TM Office (copy of filing attached).";
$para129f = "In light of the above, the Hon'ble Registrar is requested to expedite passing of an order recording the above referenced trademark Registration as surrendered.";


$para130a = "We, ALG India Law Offices, on behalf of our client, ";
$para130b = "$applicant";
$para130c = " (the Rectificant), wish to inform you that the Registrant has requested to surrender its above referenced Registration vide its letter dated ";
$para130d = "December 4, 2012";
$para130e = " filed at the TM Office (copy of filing attached).";
$para130f = "In light of the above, the Hon'ble Registrar is requested to expedite passing of an order recording the above referenced trademark Registration as surrendered.";
$para130g = "We have filed similar request on ";
$para130h = "....";
$para130i = " already, and shall be grateful if the needful is done at the earliest.";

$para131a = "We, ALG India Law Offices, on behalf of our client, ";
$para131b = "$applicant";
$para131c = " , (the Registrant), wish to inform you that the Rectificant has requested for withdrawal of its Rectification Application vide its letter dated ";
$para131d = "December 4, 2012";
$para131e = " filed at the TM Office (copy of letter enclosed).";
$para131f = "In light of the above, the Hon'ble Registrar is requested to expedite passing of an order treating the subject Rectification as withdrawn.";

$para132a = "We, ALG India Law Offices, on behalf of our client, ";
$para132b = "$applicant";
$para132c = " , (the Registrant), wish to inform you that the Rectificant has requested for withdrawal of its rectification application vide its letter dated ";
$para132d = "December 4, 2012";
$para132e = " filed at the TM Office (copy of letter enclosed).";
$para132f = "In light of the above, the Hon'ble Registrar is requested to expedite passing of an order treating the subject Rectification as withdrawn.";
$para132g = "We have filed similar request on ";
$para132h = "....";
$para132i = " already, and shall be grateful if the needful is done at the earliest.";

$para150a = "We, ALG India Law Offices, on behalf of our client, ";
$para150b = "$applicant";
$para150c = " , (the Registrant), wish to inform you that the Rectificant has requested for withdrawal of its Rectification Application vide its letter dated ";
$para150d = "December 4, 2012";
$para150e = " filed at the TM Office (copy of letter enclosed).";
$para150f = "In light of the above, the Hon'ble Registrar is requested to expedite passing of an order treating the above referenced Rectification as withdrawn.";
$para150g = "We have filed similar request on ";
$para150h = "....";
$para150i = " already, and shall be grateful if the needful is done at the earliest.";

$para133a = "We, ALG India Law Offices, on behalf of our client, ";
$para133b = "$applicant";
$para133c = " (the ";
$para133d = "Opponent/Applicant/Registrant/Rectificant";
$para133e = " ), hereby request you to kindly fix a date of hearing in the above referenced  matter. As the evidence stage in the subject ";
$para133f = "opposition/rectification";
$para133g = " has concluded, the opposition/rectification is mature for hearing.";
$para133h = "As per Rule 56 of the Trade Marks Rules, 2002, upon completion of the evidence, if any, the Registrar shall give notice to the parties of the first date of hearing within three months of the completion of the evidence. Since the prescribed time period under Rule 56 has since expired, the Hon’ble Registrar is requested to fix a date of hearing at the earliest so that the Opposition can be decided.";


$para134a = "We, ALG India Law Offices, on behalf of our client, ";
$para134b = "$applicant";
$para134c = " (the ";
$para134d = "Opponent/Applicant/Registrant/Rectificant";
$para134e = " ), hereby request you to kindly fix a date of hearing in the above referenced  matter. As the evidence stage in the subject ";
$para134f = "opposition/rectification";
$para134g = " has concluded, the ";
$para134h = "opposition/rectification";
$para134i = " is mature for hearing.";
$para134j = "As per Rule 56 of the Trade Marks Rules, 2002, upon completion of the evidence, if any, the Registrar shall give notice to the parties of the first date of hearing within three months of the completion of the evidence. Since the prescribed time period under Rule 56 has since expired, the Hon’ble Registrar is requested to fix a date of hearing at the earliest so that the Opposition can be decided.";
$para134k = "We have filed similar request on ";
$para134l = "....";
$para134m = " already, and shall be grateful if the needful is done at the earliest.";

$para135a = "We, ALG India Law Offices, on behalf of our client, ";
$para135b = "$applicant";
$para135c = " (the ";
$para135d = "Opponent/Applicant/Registrant/Rectificant";
$para135e = " ), hereby request you to kindly fix a date of hearing in the above referenced  matter. As the evidence stage in the above referenced ";
$para135f = "opposition/rectification";
$para135g = " has concluded, the ";
$para135h = "opposition/rectification";
$para135i = " is mature for hearing.";
$para135j = "As per Rule 56 of the Trade Marks Rules, 2002, upon completion of the evidence, if any, the Registrar shall give notice to the parties of the first date of hearing within three months of the completion of the evidence. Since the prescribed time period under Rule 56 has since expired, the Hon’ble Registrar is requested to fix a date of hearing at the earliest so that the Opposition can be decided.";
$para135k = "We have filed similar request on ";
$para135l = "....";
$para135m = " already, and shall be grateful if the needful is done at the earliest.";

$para21 = 'All communications relating to this Registration may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.';

$para22a = "All communications relating to this ";
$para22b = "Opposition/Application/Registration/Rectification";
$para22c = " may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.";

$para23 = 'All communications relating to this Rectification may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.';
$para24 = 'All communications relating to this Application may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.';
$para28 = 'All communications relating to this Opposition may be sent to the following address in India: - C/o ALG India Law Offices, 30 Siri Fort Road, New Delhi-110049.';

include_once 'phpword/samples/Sample_Header.php';
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// New portrait section
$section = $phpWord->addSection();

// Add first page header
$header = $section->addHeader();
$header->firstPage();
$table = $header->addTable();
$table->addRow();
$table->addCell(15000)->addImage(
        'images/welcome_word1.jpg', array('align' => 'left',)
);
$cell = $table->addCell(4000);
$textrun = $cell->addTextRun(array('align' => 'right'));
$textrun->addText('ALG India Law Offices', array('name' => 'Times New Roman', 'size' => 13, 'bold' => true));
$textrun->addTextBreak();
$textrun->addText('30 Siri Fort Road,', array('name' => 'Times New Roman', 'size' => 11));
$textrun->addTextBreak();
$textrun->addText('New Delhi-110049', array('name' => 'Times New Roman', 'size' => 11));
$textrun->addTextBreak();
$textrun->addText('(T) : +91.11.2625.2244', array('name' => 'Times New Roman', 'size' => 11));
$textrun->addTextBreak();
$textrun->addText('(F) : +91.11.2625.1585', array('name' => 'Times New Roman', 'size' => 11));
$textrun->addTextBreak();
$textrun->addText('(E): trademarks@algindia.com', array('name' => 'Times New Roman', 'size' => 11));
$underline = $section->addLine(
        array(
            'width' => \PhpOffice\PhpWord\Shared\Drawing::centimetersToPixels(16),
            'height' => \PhpOffice\PhpWord\Shared\Drawing::centimetersToPixels(0),
            'positioning' => 'absolute'
        )
);

$textcenter1 = $section->addTextRun(array('align' => 'center'));
$textcenter1->addText('OPPOSITION SECTION', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

$textright = $section->addTextRun(array('align' => 'right'));
$textright->addText('Date: ' . $currentDate . '', array('name' => 'Times New Roman', 'size' => 12));

$textleft = $section->addTextRun(array('align' => 'left'));
$textleft->addText('To', array('name' => 'Times New Roman', 'size' => 12));
$textleft->addTextBreak();
$textleft->addText('The Registrar of Trade Marks', array('name' => 'Times New Roman', 'size' => 12));
$textleft->addTextBreak();
$textleft->addText('Trade Marks Registry', array('name' => 'Times New Roman', 'size' => 12));
$textleft->addTextBreak();
$textleft->addText($jurisdiction_new, array('name' => 'Times New Roman', 'size' => 12));

//$textcenter2 = $section->addTextRun(array('align' => 'center'));
//$textcenter2->addText('Ref: ',
//        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
//$textcenter2->addText('Opposition No. 768592 to Application No. '.$appli.' in class(es) '.$class.' for the mark '.$trademark.'',
//        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
//$textcenter3 = $section->addTextRun(array('align' => 'center'));
//$textcenter3->addText('Sub: ',
//        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true));
//$textcenter3->addText($status_name_new.'',
//        array('name'=>'Times New Roman', 'size'=>12, 'align' => 'center', 'bold'=>true,'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));


switch ($_GET['compare_title']) {

    case 'requestletterserviceofnoticeofoppnonadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Service of Notice of Opposition upon the Applicant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para11a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para11b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para11c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para11d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para11e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para11f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para28, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterserviceofnoticeofoppnonadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Service of Notice of Opposition upon the Applicant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para12a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para12b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para12c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para12d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para12e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para12f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para12g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para12h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para12i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para28, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterserviceofnoticeofoppnonadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Followup Letter - Service of Notice of Opposition upon the Applicant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para12a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para12b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para12c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para12d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para12e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para12f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para12g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para12h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para12i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para28, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterserviceofoppncounterstatementonclient':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Service of Counter-Statement upon the Opponent ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para13a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para13b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para13c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para13d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para13e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para13f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para28, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterserviceofoppncounterstatementonclient':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Service of Counter-Statement upon the Opponent ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para14a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para14b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para14c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para14d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para14e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para14f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para14g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para14h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para14i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para28, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterserviceofoppncounterstatementonclient':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Service of Counter-Statement upon the Opponent ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para14a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para14b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para14c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para14d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para14e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para14f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para14g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para14h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para14i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterorderofabandonmentofapln':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Order for abandonment of Application for failure to file Counter-Statement', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para15a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para15b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para15c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para15d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para15e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para15f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para28, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterorderofabandonmentofapln':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Order for abandonment of Application for failure to file Counter-Statement', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para16a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para16b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para16c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para16d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para16e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para16f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para16g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para16h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para16i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para28, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterorderofabandonmentofapln':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Followup Letter - Order for abandonment of Application for failure to file Counter-Statement', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para151a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para151b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para151c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para151d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para151e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para151f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para151g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para151h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para151i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para28 . "\n\n\n", array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterserviceofnoticeofoppnonclient':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Service of Notice of Opposition upon the Applicant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para17a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para17b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para17c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para17d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para17e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para17f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para17g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterserviceofnoticeofoppnonclient':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks  . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Service of Notice of Opposition upon the Applicant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para18a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para18b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para18c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para18d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para18e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para18f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para18g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para18h, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para18i, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para18j, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterserviceofnoticeofoppnonclient':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks. '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter – Service of Notice of Opposition upon the Applicant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para152a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para152b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para152c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para152d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para152e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para152f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para152g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para152h, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para152i, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para152j, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterserviceofoppncounterstatementonadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks. '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Service of Counter-Statement upon the Opponent', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para19a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para19b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para19c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para19d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para19e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para19f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para19g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterserviceofoppncounterstatementonadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks. '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Service of Counter-Statement upon the Opponent', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para110a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para110b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para110c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para110d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para110e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para110f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para110g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para110h, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para110i, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para110j, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterserviceofoppncounterstatementonadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks. '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter – Service of Counter-Statement upon the Opponent', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para110a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para110b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para110c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para110d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para110e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para110f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para110g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para110h, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para110i, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para110j, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterorderofabandonmentofoppn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks. '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Order for abandonment of Opposition', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para111a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para111b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para111c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para111d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para111e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para111f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterorderofabandonmentofoppn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks. '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Order for abandonment of Opposition', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para112a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para112b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para112c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para112d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para112e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para112f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para112g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para112h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para112i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
    case '*followupletterorderofabandonmentofoppn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks. '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Order for abandonment of Opposition', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para112a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para112b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para112c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para112d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para112e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para112f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para112g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para112h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para112i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterserviceofrctnpetitiononadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Service of Rectification application upon the Registrant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para113a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para113b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para113c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para113d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para113e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para113f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterserviceofrctnpetitiononadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Service of Rectification application upon the Registrant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para114a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para114b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para114c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para114d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para114e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para114f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para114g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para114h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para114i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterserviceofrctnpetitiononadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Service of Rectification Application upon the Registrant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para114a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para114b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para114c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para114d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para114e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para114f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para114g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para114h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para114i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterserviceofctncounterstatementonclient':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Service of Counter-Statement upon the Rectificant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para115a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para115b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para115c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para115d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para115e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para115f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterserviceofrctncounterstatementonclient':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Service of Counter-Statement upon the Rectificant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para116a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para116b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para116c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para116d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para116e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para116f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para116g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para116h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para116i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterserviceofrctncounterstatementonclient':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Service of Counter-Statement upon the Rectificant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para153a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para153b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para153c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para153d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para153e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para153f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para153g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para153h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para153i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterorderofcancellationofregn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Order for Rectification/Cancellation of Registration', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para117a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para117b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para117c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para117d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para117e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para117f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para117g, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para117h, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterorderofcancellationofregn':

        $textcenter2 = $section->addTextRun(array('align' => 'both'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Order for Rectification/Cancellation of Registration', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'left'));
        $textleft->addText($para118a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para118b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para118c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para118d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para118e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para118f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para118g, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para118h, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para118i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para118j, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para118k, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterorderofcancellationofregn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Order for Rectification/Cancellation of Registration', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'left'));
        $textleft->addText($para118a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para118b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para118c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para118d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para118e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para118f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para118g, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para118h, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para118i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para118j, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para118k, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterserviceofrctncounterstatementonadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Service of Counter-Statement upon the Rectificant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para119a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para119b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para119c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para119d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para119e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para119f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para119g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para21, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterserviceofrctncounterstatementonadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Service of Counter-Statement upon the Rectificant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para120a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para120b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para120c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para120d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para120e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para120f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para120g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para120h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para120i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para21, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterserviceofrctncounterstatementonadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Service of Counter-Statement upon the Rectificant', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para120a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para120b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para120c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para120d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para120e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para120f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para120g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para120h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para120i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para21, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterorderofabandonmentofrctn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Order of Abandonment of Rectification', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para121a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para121b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para121c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para121d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para121e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para121f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para21, array('name' => 'Times New Roman', 'size' => 12));
        break;

    case 'reminderletterorderofabandonmentofrctn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Order of Abandonment of Rectification', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para122a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para122b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para122c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para122d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para122e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para122f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para122g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para122h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para122i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para21, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterorderofabandonmentofrctn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Order of Abandonment of Rectification', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para122a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para122b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para122c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para122d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para122e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para122f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para122g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para122h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para122i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para21, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterrecordalofwithdrawalofapln':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Recordal of Withdrawal of Application', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para123a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para123b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para123c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para123d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para123e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para123f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para28, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterrecordalofwithdrawalofapln':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Recordal of Withdrawal of Application', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para124a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para124b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para124c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para124d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para124e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para124f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para124g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para124h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para124i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para28, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterrecordalofwithdrawalofapln':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Recordal of Withdrawal of Application', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para124a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para124b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para124c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para124d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para124e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para124f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para124g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para124h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para124i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para28, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestfordismissaloftimebarredoppnbyadversary':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Dismissal of the Opposition as time-barred', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para125a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para125b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para125c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para125d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para125e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para125f, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para125g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para125h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para125i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para125j, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para125k, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletternoticeofoppndismissedastimebarred':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Dismissal of the Opposition as time-barred', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para126a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para126b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para126c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para126d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para126e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para126f, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para126g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para126h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para126i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para126j, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para126k, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para126l, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para126m, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para126n, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletternoticeofoppndismissedastimebarred':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Dismissal of the Opposition as time-barred', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para126a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para126b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para126c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para126d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para126e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para126f, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para126g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para126h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para126i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para126j, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para126k, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para126l, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para126m, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para126n, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletteraplnproceedtoregistration':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Recordal of Withdrawal of Opposition', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para127a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para127b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para127c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para127d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para127e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para127f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletteraplnproceedtoregistration':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Recordal of Withdrawal of Opposition', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para128a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para128b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para128c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para128d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para128e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para128f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para128g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para128h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para128i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;

    case '*followupletteraplnproceedtoregistration':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Recordal of Withdrawal of Opposition', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para154a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para154b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para154c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para154d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para154e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para154f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para154g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para154h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para154i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para24, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterorderrecordingsurrenderofregn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Recordal of Surrender of Registration', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para129a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para129b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para129c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para129d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para129e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para129f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterorderrecordingsurrenderofregn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Recordal of Surrender of Registration', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para130a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para130b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para130c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para130d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para130e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para130f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para130g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para130h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para130i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterorderrecordingsurrenderofregn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $trademark . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter – Recordal of Surrender of Registration', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para130a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para130b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para130c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para130d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para130e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para130f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para130g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para130h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para130i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para23, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterorderofwithdrawalofrctn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Recordal of withdrawal of Rectification', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para131a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para131b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para131c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para131d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para131e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para131f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para21, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterorderofwithdrawalofrctn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Recordal of withdrawal of Rectification', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para132a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para132b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para132c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para132d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para132e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para132f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para132g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para132h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para132i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para21, array('name' => 'Times New Roman', 'size' => 12));
        break;
        break;
    case '*followupletterorderofwithdrawalofrctn':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Rectification No. ' . $rctn_no . ' to Application No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Recordal of withdrawal of Rectification', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para150a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para150b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para150c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para150d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para150e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para150f, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para150g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para150h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para150i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para21, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'requestletterhearing':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition/Rectification No.', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'bgColor' => 'red', 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addText(' ' . $rctn_no . ' to Application/Registration No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Request Letter - Fixing a date of Hearing', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para133a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para133b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para133c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para133d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para133e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para133f, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para133g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para133h, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'both'));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para22a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para22b, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para22c, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case 'reminderletterhearing':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition/Rectification No.', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'bgColor' => 'red', 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addText(' ' . $rctn_no . ' to Application/Registration No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Reminder Letter - Fixing a date of Hearing', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para134a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para134b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para134c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para134d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para134e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para134f, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para134g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para134h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para134i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para134j, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para134k, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para134l, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para134m, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para22a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para22b, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para22c, array('name' => 'Times New Roman', 'size' => 12));
        break;
    case '*followupletterhearing':

        $textcenter2 = $section->addTextRun(array('align' => 'center'));
        $textcenter2->addText('Ref: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter2->addText('Opposition/Rectification No.', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'bgColor' => 'red', 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addText(' ' . $rctn_no . ' to Application/Registration No. ' . $appli, array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter2->addTextBreak();
        $textcenter2->addText(' in class ' . $class . ' for the mark ' . $client_marks . '', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));
        $textcenter3 = $section->addTextRun(array('align' => 'center'));
        $textcenter3->addText('Sub: ', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true));
        $textcenter3->addText('Follow up Letter - Fixing a date of Hearing', array('name' => 'Times New Roman', 'size' => 12, 'align' => 'center', 'bold' => true, 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));

        $textleft = $section->addTextRun(array('align' => 'both'));
        $textleft->addText($para135a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para135b, array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
        $textleft->addText($para135c, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para135d, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para135e, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para135f, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para135g, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para135h, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para135i, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para135j, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para135k, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para135l, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para135m, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addTextBreak();
        $textleft->addTextBreak();
        $textleft->addText($para22a, array('name' => 'Times New Roman', 'size' => 12));
        $textleft->addText($para22b, array('name' => 'Times New Roman', 'size' => 12, 'bgColor' => 'red'));
        $textleft->addText($para22c, array('name' => 'Times New Roman', 'size' => 12));
        break;
    default:
        break;
}


//$para = $para1.$para2;
//\PhpOffice\PhpWord\Shared\Html::addHtml($section, $para1);
//\PhpOffice\PhpWord\Shared\Html::addHtml($section, $para2);

$textright2 = $section->addTextRun(array('align' => 'right'));
$textright2->addImage(
        'images/sign1.png', array('align' => 'right',)
);
$textright2->addImage(
        'images/sign2.png', array('align' => 'right',)
);
$textright2->addTextBreak();
$textright2->addText('(Sumit Verma) (Mrinal Dubey)', array('name' => 'Times New Roman', 'size' => 12));
$textright2->addTextBreak();
$textright2->addText('For', array('name' => 'Times New Roman', 'size' => 12));
$textright2->addText(' ALG India Law Offices', array('name' => 'Times New Roman', 'size' => 12, 'bold' => true));
$textright2->addTextBreak();
$textright2->addText('30 Siri Fort Road,', array('name' => 'Times New Roman', 'size' => 12));
$textright2->addTextBreak();
$textright2->addText('New Delhi-110049', array('name' => 'Times New Roman', 'size' => 12));
$textright2->addTextBreak();
$textright2->addText('(E) trademarks@algindia.com', array('name' => 'Times New Roman', 'size' => 12));
$textright2->addTextBreak();
$textright2->addText('(P) +91 11 2625 2244', array('name' => 'Times New Roman', 'size' => 12));
$textright2->addTextBreak();
$textright2->addText('Agent Code: 9644', array('name' => 'Times New Roman', 'size' => 12));


// Save file
//$path = basename(__FILE__, '.php');
//write($phpWord, $path, $writers);
//header('location: phpword/samples/results/notification_word1.docx');
$path = $appli . "_".str_replace('*', '', $_GET['letter_filename']);
echo write($phpWord, $path, $writers);
header('location: phpword/samples/results/'.$path.".docx");