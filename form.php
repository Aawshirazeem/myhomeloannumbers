<?php
require("fpdf/fpdf.php");
$pdf = new fpdf();
$pdf->Addpage();
if(isset($_POST['btnpdf']))
{

	$firstname = $_POST['username'];
	$lastname = $_POST['address'];
	$phoneno = $_POST['phonenumber'];
	$propertytype = $_POST['propertytype'];
	$salespriceval = $_POST['salesprice'];
	$selectdown = $_POST['dddownpayment'];
	$downpay = $_POST['dpcalculated'];
	$baselon = $_POST['baseloan'];
	$selectmipfinc = $_POST['ddmipfinanced'];
	$mipfincvalue = $_POST['mipfinanced'];
	$totalloan = $_POST['totalloanamount'];
	$loantype = $_POST['loantype'];
	$loantypef = $_POST['loantypef'];
	$loanterm = $_POST['loanterm'];
	$interestrate = $_POST['interestrate'];
	$pandi = $_POST['principalandinterest'];
	$selectproptax = $_POST['ddpropertytaxes'];
	$proptax = $_POST['propertytax'];
	$selecthomeins = $_POST['ddhomeownerinsper'];
	$homeins = $_POST['homeins'];
	$selectmmi = $_POST['ddmmi'];
	$mmivalue =  $_POST['mmi'];
	$totalpayment =  $_POST['totalpayment'];
	
	$originatingfeeper = $_POST['originationgfeeper'];
	$originatingfeeseller = $_POST['originationgfeeseller'];
	$originatingfebyr = $_POST['originationgfeebuyer'];
	$discntpercnt = $_POST['discountpercent'];
	$discntpercnt2 = $_POST['discountpercent2'];
	$discntpercntsel = $_POST['discountpercentseller'];
	$discntpercntbuy = $_POST['discountpercentbuyer'];
	$procfeesell =$_POST['processingfeeseller'];
	$procfeebuy =$_POST['ddprocessingfee'];
	$underwritingsller = $_POST['underwritingseller'];
	$underwritingbuyer = $_POST['ddunderwriting'];
	$wiretransferseller = $_POST['wirefeeseller'];
	$wiretransferbuyer = $_POST['ddwirefee'];
	$appraisalseller = $_POST['appraisalseller'];
	$appraisalbuyer = $_POST['ddappraisal'];
	$creditreportseller = $_POST['reportseller'];
	$creditreportbuyer = $_POST['ddcreditreport'];
	$miscseller = $_POST['miscseller'];
	$miscbuyer = $_POST['ddmisc'];
	$escrowseller = $_POST['escrowseller'];
	$escrowbuyer = $_POST['ddescrow'];
	$docfeeseller = $_POST['docfeeseller'];
	$docfeebuyer = $_POST['dddocfee'];
	$notaryseller = $_POST['notaryseller'];
	$notarybuyer = $_POST['ddnotary'];
	$titleseller = $_POST['titleinsseller'];
	$titlebuyer = $_POST['ddtitleins'];
	$recordindfeeseller = $_POST['recordingseller'];
	$recordindfeebuyer = $_POST['ddrecordingfee'];
	$subtotaseller = $_POST['subtotalseller'];
	$subtotalbuyer = $_POST['subtotalbuyer'];
	$homeinsmonth = $_POST['ddhomeinsmonth'];
	$homeinsbuyer = $_POST['homeinsbuyer'];
	$ddmortage = $_POST['ddmortgageinsmonth'];
	$mortageinsbuyer = $_POST['mortageinsbuyer'];
	$proptaxmonth = $_POST['ddpropertytaxesmonth'];
	$proptaxbuyer = $_POST['propertytaxbuyer'];
	$prepinterest = $_POST['ddprepaidinterestday'];
	$perdaypercent = $_POST['perdaypercent'];
	$preintrstbuy = $_POST['preintrstbuyer'];
	$subtotalc = $_POST['subtotalc'];
	$cashreq = $_POST['cashrequiredabc'];
	$minusescrowbuyer = $_POST['minusescrowbuyer'];
	$minusledger = $_POST['minusledger'];
	$ddpurchaseprice = $_POST['ddpurchaseprice'];
	$purcahsepricepercent = $_POST['purcahsepricepercent'];
	$purchasepricebuyer = $_POST['purchasepricebuyer'];
	$ddloanamount = $_POST['ddloanamount'];
	$loanamountper = $_POST['laonamountpercent'];
	$loanamountbuyer = $_POST['loanamountbuyer'];
	$remainingcashatclosed = $_POST['remainingcashatclosed'];
	
	



$pdf->Setfont("Arial","B",9);
$pdf->cell(0,10,"WELL COME TO MY HOME LOAN",1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(45,10,"FIRST NAME",0,0,"C");
$pdf->cell(50,10,$firstname,1,0,"C");
$pdf->cell(45,10,"LOAN TYPE",0,0,"C");
$pdf->cell(50,10,$loantypef,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");


$pdf->cell(45,10,"LAST NAME",0,0,"C");
$pdf->cell(50,10,$lastname,1,0,"C");
$pdf->cell(45,10,"LOAN TERM",0,0,"C");
$pdf->cell(50,10,$loanterm,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(45,10,"PHONE NO#",0,0,"C");
$pdf->cell(50,10,$phoneno,1,0,"C");
$pdf->cell(45,10,"INTREST RATE",0,0,"C");
$pdf->cell(50,10,$interestrate,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(45,10,"PROPERTY TYPE",0,0,"C");
$pdf->cell(50,10,$propertytype,1,0,"C");
$pdf->cell(45,10,"PRINCIPLE & INTREST",0,0,"C");
$pdf->cell(50,10,$pandi,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(45,10,"SALES PRICE",0,0,"C");
$pdf->cell(50,12,$salespriceval,1,0,"C");
$pdf->cell(45,10,"PROPERTY",0,0,"C");
$pdf->cell(50,10,$selectproptax,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(45,10,"DOWN PAYMENT",0,0,"C");
$pdf->cell(50,10,$selectdown,1,0,"C");
$pdf->cell(45,10,"PROPERTY TAX",0,0,"C");
$pdf->cell(50,10,$proptax,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(45,10,"DOWN Payment VALUE",0,0,"C");
$pdf->cell(50,10,$downpay,1,0,"C");
$pdf->cell(45,10,"HOMW INS",0,0,"C");
$pdf->cell(50,10,$selecthomeins,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(45,10,"BASE LOAN AMT",0,0,"C");
$pdf->cell(50,10,$baselon,1,0,"C");
$pdf->cell(45,10,"INS VALUE",0,0,"C");
$pdf->cell(50,10,$homeins,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(45,10,"MIP FINANC",0,0,"C");
$pdf->cell(50,10,$selectmipfinc,1,0,"C");
$pdf->cell(45,10,"MMI",0,0,"C");
$pdf->cell(50,10,$selectmmi,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");


$pdf->cell(45,10,"FINANC VALUE",0,0,"C");
$pdf->cell(50,10,$mipfincvalue,1,0,"C");
$pdf->cell(45,10,"MMI VALUE",0,0,"C");
$pdf->cell(50,10,$mmivalue,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");


$pdf->cell(45,10,"TOTAL LOAN AMOUNT",0,0,"C");
$pdf->cell(50,10,$totalloan,1,0,"C");
$pdf->cell(45,10,"TOTAL PAYEMENT",0,0,"C");
$pdf->cell(50,10,$totalpayment,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(20,10," ",1,1,"C");
$pdf->cell(0,10,"",0,1,"C");
$pdf->cell(110,10,"NON RECURING CLOSING COST",1,0,"C");
$pdf->cell(45,10,"SELLER",1,0,"C");
$pdf->cell(40,10,"BUYERS",1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(50,10,"ORIGINATING FEE",0,0,"C");
$pdf->cell(60,10,$originatingfeeper,1,0,"C");
$pdf->cell(45,10,$originatingfeeseller,1,0,"C");
$pdf->cell(40,10,$originatingfebyr,1,0,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(50,10,"DISCOUNT POINTS",0,0,"C");
$pdf->cell(30,10,$discntpercnt,1,0,"C");
$pdf->cell(30,10,$discntpercnt2,1,0,"C");
$pdf->cell(45,10,$discntpercntsel,1,0,"C");
$pdf->cell(40,10,$discntpercntbuy,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(110,10,"PROCESSING FEE",1,0,"C");
$pdf->cell(45,10,$procfeesell,1,0,"C");
$pdf->cell(40,10,$procfeebuy,1,0,"C");
$pdf->cell(0,10,"",0,1,"C");


$pdf->cell(110,10,"UNDER WRITING FEE",1,0,"C");
$pdf->cell(45,10,$underwritingsller,1,0,"C");
$pdf->cell(40,10,$underwritingbuyer,1,0,"C");
$pdf->cell(0,10,"",0,1,"C");


$pdf->cell(110,10,"WIRE TRANSFER FEE",1,0,"C");
$pdf->cell(45,10,$wiretransferseller,1,0,"C");
$pdf->cell(40,10,$wiretransferbuyer,1,0,"C");
$pdf->cell(0,10,"",0,1,"C");


$pdf->cell(110,10,"APPRAISAL(prepaid by cr card)",1,0,"C");
$pdf->cell(45,10,$appraisalseller,1,0,"C");
$pdf->cell(40,10,$appraisalbuyer,1,0,"C");
$pdf->cell(0,10,"",0,1,"C");


$pdf->cell(110,10,"CREDIT REPORT",1,0,"C");
$pdf->cell(45,10,$creditreportseller,1,0,"C");
$pdf->cell(40,10,$creditreportbuyer,1,0,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(110,10,"OTHER MISC OR FEE PAD",1,0,"C");
$pdf->cell(45,10,$miscseller,1,0,"C");
$pdf->cell(40,10,$miscbuyer,1,0,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(110,10,"ESCROW",1,0,"C");
$pdf->cell(45,10,$escrowseller,1,0,"C");
$pdf->cell(40,10,$escrowbuyer,1,0,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(110,10,"DOC PREP. FEE",1,0,"C");
$pdf->cell(45,10,$docfeeseller,1,0,"C");
$pdf->cell(40,10,$docfeebuyer,1,0,"C");
$pdf->cell(0,10,"",0,1,"C");


$pdf->cell(110,10,"NOTARY FEE",1,0,"C");
$pdf->cell(45,10,$notaryseller,1,0,"C");
$pdf->cell(40,10,$notarybuyer,1,0,"C");
$pdf->cell(0,10,"",0,1,"C");


$pdf->cell(110,10,"TITLE INSURANCE FEE",1,0,"C");
$pdf->cell(45,10,$titleseller,1,0,"C");
$pdf->cell(40,10,$titlebuyer,1,0,"C");
$pdf->cell(0,10,"",0,1,"C");


$pdf->cell(110,10,"RECORDING FEE",1,0,"C");
$pdf->cell(45,10,$recordindfeeseller,1,0,"C");
$pdf->cell(40,10,$recordindfeebuyer,1,1,"C");
$pdf->cell(85,10,"",0,1,"C");
$pdf->cell(110,10,"SUB TOTAL",1,0,"C");
$pdf->cell(45,10,$subtotaseller,1,0,"C");
$pdf->cell(40,10,$subtotalbuyer,1,1,"C");
$pdf->cell(0,10,"",0,1,"C");

$pdf->cell(110,10,"PREPAID AND IMPOUND CHARGES....",1,0,"C");
$pdf->cell(85,10,"",1,1,"C");
$pdf->cell(50,10,"HOME OWNER INSURANCE",0,0,"C");
$pdf->cell(60,10,"MONTHS",0,0,"C");
$pdf->cell(45,10,$homeinsmonth,1,0,"C");
$pdf->cell(40,10,$homeinsbuyer,1,1,"C");

$pdf->cell(50,10,"MORTAGE INSURANCE",0,0,"C");
$pdf->cell(60,10,"MONTHS",0,0,"C");
$pdf->cell(45,10,$ddmortage,1,0,"C");
$pdf->cell(40,10,$mortageinsbuyer,1,1,"C");

$pdf->cell(50,10,"PROPERTY TAXES",0,0,"C");
$pdf->cell(60,10,"MONTHS",0,0,"C");
$pdf->cell(45,10,$proptaxmonth,1,0,"C");
$pdf->cell(40,10,$proptaxbuyer,1,1,"C");

$pdf->cell(40,10,"PREPAID INTREST",1,0,"C");
$pdf->cell(25,10,"DAYS",1,0,"C");
$pdf->cell(20,10,$prepinterest,1,0,"C");
$pdf->cell(25,10,"PER DAYS",1,0,"C");
$pdf->cell(45,10,$perdaypercent,1,0,"C");
$pdf->cell(40,10,$preintrstbuy,1,1,"C");



$pdf->cell(110,10,"SUB TOTAL ( C )....",1,0,"C");
$pdf->cell(85,10,$subtotalc,1,1,"C");

$pdf->cell(110,10,"TOTAL CASH REQUIRED TO CLOSE (A + B + C)",1,0,"C");
$pdf->cell(85,10,$cashreq,1,1,"C");

$pdf->cell(85,10,"",0,1,"C");
$pdf->cell(85,10,"",0,1,"C");
$pdf->cell(85,10,"",0,1,"C");

$pdf->cell(110,10,"MINUS INITIAL DEPOSIT TO ESCROW:",1,0,"C");
$pdf->cell(85,10,$minusescrowbuyer,1,1,"C");
$pdf->cell(85,10,"",0,1,"C");

$pdf->cell(110,10,"MINUS UP FRONT FEES TO LENDER (Appraisal/Credit)",1,0,"C");
$pdf->cell(85,10,$minusledger,1,1,"C");
$pdf->cell(85,10,"",0,1,"C");

$pdf->cell(50,10,$ddpurchaseprice,0,0,"C");
$pdf->cell(60,10,$purcahsepricepercent,0,0,"C");
$pdf->cell(45,10,"% PURCH PRICE",1,0,"C");
$pdf->cell(40,10,$purchasepricebuyer,1,1,"C");

$pdf->cell(50,10,$ddloanamount,0,0,"C");
$pdf->cell(60,10,$loanamountper,0,0,"C");
$pdf->cell(45,10,"% LOAN AMOUNT",1,0,"C");
$pdf->cell(40,10,$loanamountbuyer,1,1,"C");

$pdf->cell(110,10,"REMAINING CASH REQUIRED AT CLOSING:",1,0,"C");
$pdf->cell(85,10,$remainingcashatclosed,1,1,"C");

$pdf->output();
}
?>