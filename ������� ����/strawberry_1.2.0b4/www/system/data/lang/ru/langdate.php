<?php
#_strawberry
if (!defined("str_lang")) {
	header("Location: ../../../../index.php");
	exit;
}
////////////
// Config
$langdateweekdays = array("�����������","�����������","�������","�����","�������","�������","�������");
$langdateshortweekdays = array("��","��","��","��","��","��","��");
$langdatemonths = array("������","�������","�����","������","���","����","����","�������","��������","�������","������","�������");
$langdateshortmonths = array("������","�������","�����","������","���","����","����","�������","��������","�������","������","�������");

////////////
// Set config to date safe values
foreach ($langdateweekdays as $langdatename => $langdatevalue)
  $langdateweekdays[$langdatename] = preg_replace("/./", "\\\\\\0", $langdatevalue);
foreach ($langdateshortweekdays as $langdatename => $langdatevalue)
  $langdateshortweekdays[$langdatename] = preg_replace("/./", "\\\\\\0", $langdatevalue);
foreach ($langdatemonths as $langdatename => $langdatevalue)
  $langdatemonths[$langdatename] = preg_replace("/./", "\\\\\\0", $langdatevalue);
foreach ($langdateshortmonths as $langdatename => $langdatevalue)
  $langdateshortmonths[$langdatename] = preg_replace("/./", "\\\\\\0", $langdatevalue);

////////////
// Declare the function
function langdate($langdateformat, $langdatetimestamp = ''){
global $langdateshortweekdays, $langdatemonths, $langdateweekdays, $langdateshortmonths, $config;

	$langdatetimestamp = ($langdatetimestamp ? $langdatetimestamp : time);

	$langdateformat = preg_replace("/(?<!\\\\)D/", $langdateshortweekdays[date("w", $langdatetimestamp)], $langdateformat);
	$langdateformat = preg_replace("/(?<!\\\\)F/", $langdatemonths[date("n", $langdatetimestamp) - 1], $langdateformat);
	$langdateformat = preg_replace("/(?<!\\\\)l/", $langdateweekdays[date("w", $langdatetimestamp)], $langdateformat);
	$langdateformat = preg_replace("/(?<!\\\\)M/", $langdateshortmonths[date("n", $langdatetimestamp) - 1], $langdateformat);

	$result = date($langdateformat, $langdatetimestamp);
	$result = run_filters('langdate', $result);

return $result;
}
?>