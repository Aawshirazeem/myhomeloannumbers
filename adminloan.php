
<?php
include("adminsession.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Home Loan</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <script type="text/javascript">
      function calculate(){
        var salesprice = Math.round(document.getElementById("salesprice").value);
        document.getElementById("salesprice").value = salesprice;
        var downpaymentvalue = document.getElementById("dddownpayment").value;
        var calcdownpaymnt = Math.round((downpaymentvalue/100) * salesprice);
        document.getElementById("dpcalculated").value=calcdownpaymnt;
        
        document.getElementById("baseloan").value=salesprice - calcdownpaymnt;
        mipcalculate();
        principlecalculate();
        propertytaxescalculate();
        homeownerins();
        mmicalculate();        
        totalpayementcalc();
        buyerorignatingfee();
        discountpoointscalcu();
        homeinsmontlycalc();
        mortgeinscalcu();
        downpropertycalcu();
        prepaidintrestcalcu();
        perdaycal();

      }
      function mipcalculate(){

        var mipfincdvalue = document.getElementById("ddmipfinanced").value;
        var baseloanvalue = document.getElementById("baseloan").value;
        var calcubaseloan = Math.round((mipfincdvalue/100)*baseloanvalue);
        document.getElementById("mipfinanced").value=calcubaseloan;

        var integrbaseloan = parseInt(baseloanvalue);
        var integrcalcubaseloan = parseInt(calcubaseloan);
        var sum = integrbaseloan + integrcalcubaseloan ;
        document.getElementById("totalloanamount").value= sum;
       
      }
      function principlecalculate(){
        var amount = document.getElementById("totalloanamount").value;
        var intr = document.getElementById("interestrate").value;
        var years = document.getElementById("loanterm").value;
        var months = years * 12 ;

         var int = intr / 1200;
         var int1 = 1 + int;
         var r1 = Math.pow(int1 , months);
         var pmt = amount * (int * r1) / (r1-1) ;
         var roundpmt = Math.round(pmt);
         document.getElementById("principalandinterest").value = roundpmt; 

      }
      function propertytaxescalculate(){
        var salesprice = document.getElementById("salesprice").value;
        var tax = document.getElementById("ddpropertytaxes").value;
        var percenttax = tax / 100 ;
        var calculatedtax = Math.round((salesprice * percenttax) / 12) ;
        document.getElementById("propertytax").value = calculatedtax;
        downpropertycalcu();
      }
      function homeownerins(){
        var salesprice = document.getElementById("salesprice").value;
        var homeownerinspervalue = document.getElementById("ddhomeownerinsper").value;
        var percentownerinsper = homeownerinspervalue / 100 ;
        var calculatedownerinsper = Math.round((salesprice * percentownerinsper) / 12) ;
        document.getElementById("homeins").value = calculatedownerinsper;
        homeinsmontlycalc();
      }


      function mmicalculate(){
        var mipfincdvalue = document.getElementById("ddmipfinanced").value;
        var ddmmivalue = document.getElementById("ddmmi").value;
        var baseloanvalue = document.getElementById("baseloan").value;
        var ddmmivaluefinal = ddmmivalue / 100 ;
        if(mipfincdvalue == 0){
          var caclmmi = Math.round(( ddmmivaluefinal * baseloanvalue ) / 12 );
          document.getElementById("mmi").value = caclmmi;

        }
        else if(mipfincdvalue == 1.75){
           var calcmmi1 = Math.round((baseloanvalue * 0.0085) / 12) ;          
          document.getElementById("mmi").value = calcmmi1;
          document.getElementById("zero").text = "0.85 %"
        }
        mortgeinscalcu();
      }
      function totalpayementcalc(){
        var principl = parseInt(document.getElementById("principalandinterest").value);
        var propertytex = parseInt(document.getElementById("propertytax").value);
        var homeisu = parseInt(document.getElementById("homeins").value);
        var mmmmiiii = parseInt(document.getElementById("mmi").value);
        var sum = (( principl + propertytex + homeisu + mmmmiiii));
        document.getElementById("totalpayment").value = sum;
      }
      function buyerorignatingfee(){
        var baseloanvalue = document.getElementById("baseloan").value;
        var originationg = document.getElementById("originationgfeeper").value;
        var calculatedorignating = Math.round((originationg / 100) * baseloanvalue );
        document.getElementById("originationgfeebuyer").value = calculatedorignating;
        subtotalbuyercalculation();
      }
      function discountpoointscalcu(){
        var baseloanvalue = document.getElementById("totalloanamount").value;
        var dispercnt1 =  parseInt(document.getElementById("discountpercent").value);
        var dispercnt2 = parseInt(document.getElementById("discountpercent2").value);
        var diff = dispercnt1 - dispercnt2;
        var discountcalculated = Math.round((diff / 100) * baseloanvalue );
        document.getElementById("discountpercentseller").value = discountcalculated;
        document.getElementById("discountpercentbuyer").value = discountcalculated;
        subtotalbuyercalculation();
        subtotalsellercalculation();
      }
      function subtotalbuyercalculation(){
        var originatingbuyer =  parseInt(document.getElementById("originationgfeebuyer").value);
        var discountbuyer =  parseInt(document.getElementById("discountpercentbuyer").value);
        var processingbuyer =  parseInt(document.getElementById("ddprocessingfee").value);
        var underwritingbuyer =  parseInt(document.getElementById("ddunderwriting").value);
        var wiretransferbyer =  parseInt(document.getElementById("ddwirefee").value);
        var appraisalbuyer =  parseInt(document.getElementById("ddappraisal").value);
        var creditreportbuyer =  parseInt(document.getElementById("ddcreditreport").value);
        var miscorfeepadbuyer =  parseInt(document.getElementById("ddmisc").value);
        var escrowbuyer =  parseInt(document.getElementById("ddescrow").value);
        var docprepfeebuyer =  parseInt(document.getElementById("dddocfee").value);
        var notaryfeebuyer =  parseInt(document.getElementById("ddnotary").value);
        var titleinsurancebuyer =  parseInt(document.getElementById("ddtitleins").value);
        var recordingfeebuyer =  parseInt(document.getElementById("ddrecordingfee").value);

        var subtotal = (originatingbuyer + discountbuyer + processingbuyer + underwritingbuyer + wiretransferbyer + appraisalbuyer + creditreportbuyer + miscorfeepadbuyer + escrowbuyer + docprepfeebuyer + notaryfeebuyer + titleinsurancebuyer + recordingfeebuyer);
        document.getElementById("subtotalbuyer").value = subtotal;
        subtotalABCcalcu();
        
      }
      function subtotalsellercalculation(){
        var originatingseller =  parseInt(document.getElementById("originationgfeeseller").value);
        var discountseller =  parseInt(document.getElementById("discountpercentseller").value);
        var processingseller =  parseInt(document.getElementById("processingfeeseller").value);
        var underwritingseller =  parseInt(document.getElementById("underwritingseller").value);
        var wiretransferseller =  parseInt(document.getElementById("wirefeeseller").value);
        var appraisalseller =  parseInt(document.getElementById("appraisalseller").value);
        var creditreportseller =  parseInt(document.getElementById("reportseller").value);
        var miscorfeepadseller =  parseInt(document.getElementById("miscseller").value);
        var escrowseller =  parseInt(document.getElementById("escrowseller").value);
        var docprepfeeseller =  parseInt(document.getElementById("docfeeseller").value);
        var notaryfeeseller =  parseInt(document.getElementById("notaryseller").value);
        var titleinsuranceseller =  parseInt(document.getElementById("titleinsseller").value);
        var recordingfeeseller =  parseInt(document.getElementById("recordingseller").value);

        var subtotalsellervalue = (originatingseller + discountseller + processingseller + underwritingseller + wiretransferseller + appraisalseller + creditreportseller + miscorfeepadseller + escrowseller + docprepfeeseller + notaryfeeseller + titleinsuranceseller + recordingfeeseller);
        document.getElementById("subtotalseller").value = subtotalsellervalue;
       
        
      }
      function homeinsmontlycalc(){
        var hmemonthval = parseInt(document.getElementById("ddhomeinsmonth").value);
        var uphmeins = parseInt(document.getElementById("homeins").value);
        document.getElementById("homeinsbuyer").value = (hmemonthval * uphmeins);
        subtotalCcalcu();
      }


      function mortgeinscalcu(){
        var mrtgvalue = parseInt(document.getElementById("ddmortgageinsmonth").value);
        var upmmivalue = parseInt(document.getElementById("mmi").value);
        document.getElementById("mortageinsbuyer").value = (mrtgvalue * upmmivalue);
        subtotalCcalcu();
      }

      function downpropertycalcu(){
        var ddprptyvalue = parseInt(document.getElementById("ddpropertytaxesmonth").value);
        var upproptytx = parseInt(document.getElementById("propertytax").value);
        document.getElementById("propertytaxbuyer").value = (ddprptyvalue * upproptytx);
        subtotalCcalcu();
      }
      function prepaidintrestcalcu(){
         var ddpreintrst = parseInt(document.getElementById("ddprepaidinterestday").value);
        var prdyprcnt = (document.getElementById("perdaypercent").value);
        document.getElementById("preintrstbuyer").value = Math.round(ddpreintrst * prdyprcnt);
        subtotalCcalcu();
      }
      function subtotalCcalcu(){
        var homec =  parseInt(document.getElementById("homeinsbuyer").value);
        var mortagec =  parseInt(document.getElementById("mortageinsbuyer").value);
        var propertyc =  parseInt(document.getElementById("propertytaxbuyer").value);
        var preinterestc =  parseInt(document.getElementById("preintrstbuyer").value);
        document.getElementById("subtotalc").value=(homec+mortagec+propertyc+preinterestc);
        subtotalABCcalcu();
      }
      function subtotalABCcalcu(){
        var updownpayment =  parseInt(document.getElementById("dpcalculated").value);
        var upsubtotalbuyer =  parseInt(document.getElementById("subtotalbuyer").value);
        var upsubtotalc =  parseInt(document.getElementById("subtotalc").value);
       
        document.getElementById("cashrequiredabc").value=(updownpayment+upsubtotalbuyer+upsubtotalc);
      }
      function purchbuyercalculation(){
        var salesprice = Math.round(document.getElementById("salesprice").value);
        document.getElementById("salesprice").value = salesprice;
        var pidpercent = document.getElementById("purcahsepricepercent").value;
        var calculatedprchbr = Math.round((pidpercent/100) * salesprice);
        document.getElementById("purchasepricebuyer").value=calculatedprchbr;
       
        
      }
      function pctlonamtbyr(){
        var salesprice = Math.round(document.getElementById("salesprice").value);
        document.getElementById("salesprice").value = salesprice;
        var lonatprctvalue = document.getElementById("loanamountpercent").value;
        var calculonbyr = Math.round((lonatprctvalue/100) * salesprice);
        document.getElementById("loanamountbuyer").value=calculonbyr;
        
      }


      function remningcshclosing(){
        var abcvalue =  parseInt(document.getElementById("cashrequiredabc").value);

        var minseccrwbyrvalue =  parseInt(document.getElementById("minusescrowbuyer").value);
        var minslndrbyrvallue =  parseInt(document.getElementById("minuslenderbuyer").value);
        var prchprcebyrvalue =  parseInt(document.getElementById("purchasepricebuyer").value);
        var lonamtbyrvalue =  parseInt(document.getElementById("loanamountbuyer").value);
       
        document.getElementById("remainingcashatclosed").value= (abcvalue - minseccrwbyrvalue - minslndrbyrvallue - prchprcebyrvalue - lonamtbyrvalue);
       
      }

      function perdaycal(){
        
        var blv = document.getElementById("baseloan").value;
        var ir1 = document.getElementById("interestrate").value;
        ir = ir1 / 100;
        var cal1 = blv*ir;
       
        var cal2 = cal1 / 12;
      
        var finalcal = cal2 / 30;
       
        document.getElementById("perdaypercent").value = finalcal;
      }
    </script>
    <script src="js/jquery-3.2.0.min.js"></script>
    <script>



      $(document).ready(function(){
        $("#btncalculate").click(function(){
   
        var c_counter=$("#calid").value;
        $.post("adminloan.php",{counter:c_counter},function(data){
            $("#result").html(data);
        
        });
    });
      });
  
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">My Home Loan</div>
    <div class="address-bar">151 Kalmus Drive, Suite A- 203, Costa Mesa, California 92626</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="customerindex.php">My Home Loan</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="adminindex.php">DASHBOARD</a>
                    </li>
                    <li>
                        <a href="adminprofile.php">MY PROFILE</a>
                    </li>
                    <li>
                        <a href="adminloan.php">CALCULATE LOAN</a>
                    </li>
                    <li>
                        <a href="adminlogout.php">LOGOUT</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
		<form class="form-horizontal" id="myform"  method="post" onsubmit="return false" style="background-color: white;margin-bottom: 20px" action="loan.php">
			
                    <div class="form-group" >
        		          <label for="Date" class="col-md-9 col-md-offset-1 col-sm-2 col-sm-offset-1  col-xs-12 col-xs-offset-3  control-label">Date: <?php echo date('d/m/Y');?></label>
        		        </div>
                        <div id="#result"></div>
        		   <div class="form-group"  >
                            <label for="title"  class="col-md-3 col-md-offset-4 col-sm-3 col-sm-offset-1  col-xs-12 col-xs-offset-2  control-label">PERLIMINARY COST ESTIMATE      </label>   
        		       <div style="float: right;margin-right: 80PX;">
                       <label for="loantype" class="col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-1  col-xs-12 col-xs-offset-5  control-label">Loan Type</label>
                		    <div class="col-md-6 col-sm-6 col-md-offset-0 col-xs-12 col-xs-offset-2">
                                 <select class="form-control"  id="loantype">
                                    <option>FHA</option>
                                    <option>CONVENTIONAL</option>
                                    <option>VA</option>
                                    <option>OTHERS</option>
                                 </select>
                            </div>
        		      </div>
                </div>

              <div class="row">
                  <div class="col-md-5 col-sm-5 col-xs-12 style="float: left;">  
                		  <div class="form-group">
                		      <label for="Name" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-4 control-label">Name</label>
                  		    <div class="col-md-6 col-sm-6 col-md-offset-1 col-xs-12 col-xs-offset-0">
                  		      <input type="text" class="form-control" id="username" name="username" value="<?php echo $name_session; ?>" readonly="true" />
                  		    </div>
                		  </div>
                		  
                		  <div class="form-group">
                		      <label for="phonenumber" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-4 control-label">Phone No.</label>
                  		    <div class="col-md-6 col-md-offset-1 col-xs-12 col-sm-6 col-xs-offset-0">
                  		      <input type="text" class="form-control"  value="Not Required"  id="phonenumber" readonly="true"  name="phonenumber" />
                  		    </div>
                		  </div>
                		  
                		  <div class="form-group">
                		      <label for="address" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-4 control-label">Address</label>
                  		    <div class="col-md-6 col-sm-6 col-md-offset-1 col-xs-12 col-xs-offset-0">
                  		      <input type="text" class="form-control"  value="Not Required"  id="address" name="address" readonly="true" />
                  		    </div>
                		  </div>

                      <div class="form-group" >
                           <label for="propertytype" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-4  control-label">Property Type</label>
                          <div class="col-md-6 col-sm-4 col-md-offset-1 col-xs-12 col-xs-offset-0">
                                     <select class="form-control"  id="propertytype">
                                       <option>Please Select</option>
                                        <option>SFR</option>
                                        <option>CONDO</option>
                                        <option>TOWN HOME</option>
                                        <option>MFCT</option>
                                     </select>
                          </div>
                      </div>

                      <div class="form-group">
                              <label for="salesprice" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-4 control-label">Sales Price</label>
                              <div class="col-md-6 col-sm-6 col-md-offset-1 col-xs-12 col-xs-offset-0">
                              <input type="number" onchange="calculate()" value="0" onfocus="if(this.value=='0') this.value='';" onblur="if(this.value=='') this.value = 0; " class="form-control" id="salesprice" name="salesprice" min=1  />
                              </div>
                      </div>

                      <div class="form-group" >
                            <label for="dddownpayment" class="col-md-4 col-sm-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3  control-label">Select Down Payment</label>
                                <div class="col-md-6 col-sm-6 col-md-offset-1 col-xs-12 col-xs-offset-0">
                                     <select class="form-control "  onchange="calculate()" id="dddownpayment">
                                         
                                        <option value = "3" >3%</option>
                                        <option value = "3.5" >3.5%</option>
                                        <option value = "5" >5%</option>
                                        <option value = "10" >10%</option>
                                        <option value = "15" >15%</option>
                                        <option value = "20" >20%</option>
                                        <option value = "25" >25%</option>
                                        <option value = "30" >30%</option>
                                        <option value = "35" >35%</option>
                                        <option value = "40" >40%</option>
                                        <option value = "45" >45%</option>
                                        <option value = "50" >50%</option>
                                     </select>
                                </div>
                      </div>

                      <div class="form-group">
                              <label for="dpcalculated" class="col-md-4 col-sm-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3 control-label">Down Payment</label>
                              <div class="col-md-6 col-sm-6 col-md-offset-1 col-xs-12 col-xs-offset-0">
                                <input type="text" value="0" readonly="true" subtotalABCcalcu();   class="form-control" id="dpcalculated" name="dpcalculated"  />
                              </div>
                      </div>

                      <div class="form-group">
                              <label for="baseloan" class="col-md-4 col-sm-4 col-md-offset-1  col-sm-offset-1  col-xs-12 col-xs-offset-3 control-label">Base Loan Amount</label>
                              <div class="col-md-6 col-md-offset-1 col-sm-6 col-xs-12 col-xs-offset-0">
                                <input type="text" value="0" class="form-control" id="baseloan" readonly="true" name="baseloan"  />
                              </div>
                      </div>

                      <div class="form-group" >
                           <label for="ddmipfinanced" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3  control-label">Select MIP Financed</label>
                                <div class="col-md-6 col-sm-6 col-md-offset-1 col-xs-12  col-xs-offset-0">
                                     <select class="form-control " onchange="calculate()"  id="ddmipfinanced">
                                        
                                        <option value="0">CONVENTIONAL</option>
                                        <option value="1.75">FHA</option>
                                        <option >VA</option>
                                     </select>
                                </div>
                      </div>
                       
                            <div class="form-group">
                              <label for="mipfinanced" value="0" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3 control-label">MIP Financed</label>
                            <div class="col-md-6 col-md-offset-1 col-xs-12 col-sm-6 col-xs-offset-0">
                              <input type="text" value="0" class="form-control" id="mipfinanced" readonly="true" name="mipfinanced"  />
                            </div>
                          </div>

                           <div class="form-group">
                              <label for="totalloanamount" class="col-md-4  col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3 control-label">Total Loan Amount</label>
                            <div class="col-md-6 col-sm-6 col-md-offset-1 col-xs-12 col-xs-offset-0">
                              <input type="text" value="0" class="form-control" id="totalloanamount" readonly="true" name="totalloanamount"  />
                            </div>
                          </div>
                   
                      </div>

                      <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-0" style="float: right;margin-right: 30px">  
                      <div class="form-group" >
                       <label for="loantypef" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3  control-label">Loan Type</label>
                            <div class="col-md-6 col-sm-6 col-md-offset-1 col-xs-12 col-xs-offset-1">
                                 <select class="form-control "  id="loantypef">
                                   <option value="0">Select Loan Type</option>
                                    <option>FIXED</option>
                                    <option>ADJ. 3/1 ARM</option>
                                    <option>ADJ. 5/1 ARM</option>
                                    <option>ADJ. 7/1 ARM</option>
                                    <option>ADJ. 10/1 ARM</option>
                                 </select>
                            </div>
                      </div>
                      
                      <div class="form-group" >
                       <label for="loanterm" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3  control-label">Loan Term (Years)</label>
                            <div class="col-md-6 col-md-offset-1 col-xs-12 col-sm-6 col-xs-offset-1">
                                 <select class="form-control " onchange="calculate()"  id="loanterm">
                                    <option value=30 >30</option>
                                    <option value=25 >25</option>
                                    <option value=20 >20</option>
                                    <option value=15 >15</option>
                                    <option value=10 >10</option>
                                    <option value=5 >5</option>
                                 </select>
                            </div>
                      </div>

                      <div class="form-group" >
                       <label for="interestrate" class="col-md-4 col-md-offset-1  col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3  control-label">Interest Rate</label>
                            <div class="col-md-6 col-md-offset-1 col-sm-6 col-xs-12 col-xs-offset-1">
                                 <select class="form-control " onchange="calculate()"  id="interestrate">

                                    <option value=1.5 >1.5%</option>
                                    <option value=1.625>1.625%</option>  
                                    <option value=1.75>1.75%</option>
                                    <option value=1.875>1.875%</option>
                                    
                                    <option value=2>2%</option>
                                    <option value=2.125>2.125%</option>
                                    <option value=2.25>2.25%</option>
                                    <option value=2.375>2.375%</option>
                                    <option value=2.5>2.5%</option>
                                    <option value=2.625>2.625%</option>
                                    <option value=2.75>2.75%</option> 
                                    <option value=2.875>2.875%</option>
                                    
                                    <option value=3 >3%</option>  
                                    <option value=3.125>3.125%</option>
                                    <option value=3.25>3.25%</option>
                                    <option value=3.375>3.375%</option>
                                    <option value=3.5>3.5%</option>
                                    <option value=3.625>3.625%</option>
                                    <option value=3.75>3.75%</option>
                                    <option value=3.875>3.875%</option>
                                    
                                    <option value=4>4%</option>
                                    <option value=4.125>4.125%</option>
                                    <option value=4.25>4.25%</option>
                                    <option value=4.375>4.375%</option>
                                    <option value=4.5>4.5%</option>
                                    <option value=4.625>4.625%</option>
                                    <option value=4.75>4.75%</option>
                                    <option value=4.875>4.875%</option>
                                    
                                    <option value=5>5%</option>
                                    <option value=5.125>5.125%</option>
                                    <option value=5.25>5.25%</option>
                                    <option value=5.375>5.375%</option>
                                    <option value=5.625>5.625%</option>
                                    <option value=5.75>5.75%</option>
                                    <option value=5.875>5.875%</option>
                                    
                                    <option value=6>6%</option>
                                    <option value=6.125>6.125%</option >
                                    <option value=6.25>6.25%</option>
                                    <option value=6.375>6.375%</option>
                                    <option value=6.5>6.5%</option>
                                    <option value=6.625>6.625%</option>
                                    <option value=6.75>6.75%</option>
                                    <option value=6.875>6.875%</option>
                                    
                                    <option value=7>7%</option>
                                    <option value=7.125>7.125%</option>
                                    <option value=7.25>7.25%</option>
                                    <option value=7.375>7.375%</option>
                                    <option value=7.5>7.5%</option>
                                    <option value=7.625>7.625%</option>
                                    <option value=7.75>7.75%</option>
                                    <option value=7.875 >7.875%</option>
                                    
                                    <option value=8>8%</option>
                                    <option value=8.125>8.125%</option>
                                    <option value=8.25>8.25%</option>
                                    <option value=8.375>8.375%</option>
                                    <option value=8.5>8.5%</option>
                                    <option value=8.625>8.625%</option>
                                    <option value=8.75>8.75%</option>
                                    <option value=8.875>8.875%</option>

                                    
                                    <option value=9>9%</option>
                                    <option value=9.125>9.125%</option>
                                    <option value=9.25>9.25%</option>
                                    <option value=9.375>9.375%</option>
                                    <option value=9.5>9.5%</option>
                                    <option value=9.625>9.625%</option>
                                    <option value=9.75>9.75%</option>
                                    <option value=9.875>9.875%</option>

                                    <option value=10>10%</option>
                                    <option value=10.125>10.125%</option>
                                    <option value=10.25>10.25%</option>
                                    <option value=10.375>10.375%</option>
                                    <option value=10.5>10.5%</option>
                                    <option value=10.625>10.625%</option>
                                    <option value=10.75>10.75%</option>
                                    <option value=10.875>10.875%</option>
                                    
                                    <option value=11>11%</option>
                                    <option value=11.125>11.125%</option>
                                    <option value=11.25>11.25%</option>
                                    <option value=11.375>11.375%</option>
                                    <option value=11.5>11.5%</option>
                                    <option value=11.625>11.625%</option>
                                    <option value=11.75>11.75%</option >
                                    <option value=11.875>11.875%</option>
                                    
                                    <option value=12>12%</option>
                                    <option value=12.125>12.125%</option>
                                    <option value=12.25>12.25%</option>
                                    <option value=12.375>12.375%</option>
                                    <option value=12.5>12.5%</option>
                                    <option value=12.625>12.625%</option>
                                    <option value=12.75>12.75%</option>
                                    <option value=12.875>12.875%</option>

                                    
                                    <option value=13>13%</option>
                                    <option value=13.125>13.125%</option>
                                    <option value=13.25>13.25%</option>
                                    <option value=13.375>13.375%</option>
                                    <option value=13.5>13.5%</option>
                                    <option value=13.625>13.625%</option>
                                    <option value=13.75>13.75%</option>
                                    <option value=13.875>13.875%</option>
                                    
                                    <option value=14>14%</option>
                                    <option value=14.125>14.125%</option>
                                    <option value=14.25>14.25%</option>
                                    <option value=14.375>14.375%</option>
                                    <option value=14.5>14.5%</option>
                                    <option value=14.625>14.625%</option>
                                    <option value=14.75>14.75%</option>
                                    <option value=14.875>14.875%</option>
                                    
                                    <option value=15>15%</option>
                                 </select>
                            </div>
                      </div>
                      
                      <div class="form-group">
                          <label for="principalandinterest" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3 control-label">Principle and Interest</label>
                        <div class="col-md-6 col-md-offset-1 col-sm-6 col-xs-12 col-xs-offset-1">
                          <input type="text" value="0" class="form-control" id="principalandinterest" name="principalandinterest" readonly="true" />
                        </div>
                      </div>

                      <div class="form-group" >
                       <label for="ddpropertytaxes" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3  control-label">Select Property Taxes</label>
                            <div class="col-md-6 col-md-offset-1 col-xs-12 col-xs-offset-1 com-sm-6">
                                 <select class="form-control " onchange="calculate()" id="ddpropertytaxes">
                                    
                                    <option value=1   >1%</option>
                                    <option value=1.125 >1.125%</option>
                                    <option value=1.25 >1.25%</option>
                                    <option value=1.375 >1.375%</option>
                                    <option value=1.5 >1.5%</option>
                                    <option value=1.625>1.625%</option>  
                                    <option value=1.75>1.75%</option>
                                    <option value=1.875>1.875%</option>
                                    
                                    <option value=2>2%</option>
                                    <option value=2.125>2.125%</option>
                                    <option value=2.25>2.25%</option>
                                    <option value=2.375>2.375%</option>
                                    <option value=2.5>2.5%</option>
                                    <option value=2.625>2.625%</option>
                                    <option value=2.75>2.75%</option> 
                                    <option value=2.875>2.875%</option>
                                    
                                    <option value=3 >3%</option>  
                                    <option value=3.125>3.125%</option>
                                    <option value=3.25>3.25%</option>
                                    <option value=3.375>3.375%</option>
                                    <option value=3.5>3.5%</option>
                                    <option value=3.625>3.625%</option>
                                    <option value=3.75>3.75%</option>
                                    <option value=3.875>3.875%</option>
                                    
                                    <option value=4>4%</option>

                                 </select>
                            </div>
                      </div>

                      <div class="form-group">
                          <label for="propertytax" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3 control-label">Property Tax</label>
                        <div class="col-md-6 col-md-offset-1 col-xs-12 col-sm-6 col-xs-offset-1">
                          <input type="text" value="0" class="form-control" id="propertytax" name="propertytax" readonly="true"  />
                        </div>
                      </div>

                      <div class="form-group" >
                       <label for="ddhomeownerinsper" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3  control-label">Select Home Owner Insurance</label>
                            <div class="col-md-6 col-md-offset-1 col-sm-6 col-xs-12 col-xs-offset-1">
                                 <select class="form-control " onchange="calculate()" id="ddhomeownerinsper">
                                    <option value="0.20" >0.20%</option>
                                    <option value="0.25" >0.25%</option>
                                    <option value="0.30" >0.30%</option>
                                    <option value="0.35" >0.35%</option>
                                    <option value="0.40" >0.40%</option>
                                    <option value="0.45" >0.45%</option>

                                 </select>
                            </div>
                      </div>

                      <div class="form-group">
                          <label for="homeins" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3 control-label">Home Insurance</label>
                        <div class="col-md-6 col-md-offset-1 col-xs-12 col-sm-6 col-xs-offset-1">
                          <input type="text" value="0" class="form-control" id="homeins" name="homeins" readonly="true" />
                        </div>
                      </div>

                      <div class="form-group" >
                       <label for="ddmmi" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3  control-label">Select MMI </label>
                            <div class="col-md-6 col-md-offset-1 col-sm-6 col-xs-12 col-xs-offset-1">
                                 <select class="form-control" onchange="calculate()" id="ddmmi">
                                    <option value="0">0</option>
                                    <option value="0.21">0.21%</option>
                                    <option value="0.23">0.23%</option>
                                    <option value="0.27">0.27%</option>
                                    <option value="0.33">0.33%</option>
                                    <option value="0.39">0.39%</option>
                                    <option value="0.44">0.44%</option>
                                    <option value="0.50">0.50%</option>
                                    <option value="0.57">0.57%</option>
                                    <option value="0.60">0.60%</option>
                                    <option value="0.71">0.71%</option>
                                    <option value="0.79">0.79%</option>
                                    <option value="0.80">0.80%</option>
                                    <option value="1.03">1.03%</option>
                                    <option value="1.10">1.10%</option>
                                    <option value="1.31">1.31%</option>
                                    <option value="1.48">1.48%</option>
                                 </select>
                            </div>
                      </div>

                      <div class="form-group">
                          <label for="mmi" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3 control-label">MMI</label>
                        <div class="col-md-6 col-md-offset-1 col-xs-12 col-sm-6 col-xs-offset-1">
                          <input type="text" value="0" class="form-control" id="mmi" name="mmi" readonly="true"  />
                        </div>
                      </div>

                       <div class="form-group">
                          <label for="totalpayment" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3 control-label">Total Payment </label>
                          <div class="col-md-6 col-md-offset-1 col-sm-6 col-xs-12 col-xs-offset-1">
                            <input type="text" value="0" class="form-control" id="totalpayment" name="totalpayment"  />
                          </div>
                      </div>

                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12" style="background-color: gray">
                              <label  class="col-md-4 col-md-offset-1    col-xs-4"  >Non Recuring Closing Cost </label>
                              <label  class="col-md-2 col-md-offset-2    col-xs-4 " >Seller ($)
                              </label>
                              <label  class="col-md-2 col-md-offset-1    col-xs-4 " >Buyer ($)
                              </label>
                            </div>
                          </div>

                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-sm-offset-0 col-xs-12 col-sm-offset-2">
                            <label for="originationgfeeper" class="col-md-4 col-md-offset-1 col-sm-2 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Originationg Fee</label>
                            <div class="col-md-3 col-md-offset-0 col-sm-6 col-md-offset-0 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="number" class="form-control" value="0" onfocus="if(this.value=='0') this.value='';" onblur="if(this.value=='') this.value = 0; " id="originationgfeeper" onchange="buyerorignatingfee()" name="originationgfeeper"   />

                            </div>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            
                            <div class="col-md-3 col-md-offset-1 col-sm-3 col-xs-6 col-xs-offset-0" style="text-align: left">
                              <input type="text" class="form-control" id="originationgfeeseller" onchange="subtotalsellercalculation()" value="0"  readonly="true" name="originationgfeeseller"   />

                            </div>
                               <div class="col-md-3 col-md-offset-2 col-sm-7 col-xs-6 col-xs-offset-0" style="text-align: left">
                              <input type="text" class="form-control" onchange="subtotalbuyercalculation()" id="originationgfeebuyer" readonly="true" value="0" name="originationgfeebuyer"   />

                            </div>
                          </div>

                         
                        </div>

                     <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <label for="discountpercent" class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1  col-xs-12 col-xs-offset-3 ">Discount Points</label>
                            <div class="col-md-3 col-md-offset-0 col-sm-3 col-xs-6 col-xs-offset-0" style="text-align: left">
                              <input type="number" class="form-control" value="0" id="discountpercent" onfocus="if(this.value=='0') this.value='';" onblur="if(this.value=='') this.value = 0; " onchange="discountpoointscalcu()" name="discountpercent"   />
                            </div>
                            <div class="col-md-3 col-md-offset-0 col-sm-3 col-xs-6 col-xs-offset-0" >
                              <input type="number" class="form-control" onchange="discountpoointscalcu()" value="0" id="discountpercent2" name="discountpercent2" onfocus="if(this.value=='0') this.value='';" onblur="if(this.value=='') this.value = 0; " />
                            </div>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-3 col-md-offset-1 col-sm-3 col-xs-6 col-xs-offset-0" >
                              <input type="text" class="form-control" id="discountpercentseller" onchange="subtotalsellercalculation()" readonly="true" value="0" name="discountpercentseller"   />
                            </div>
                             <div class="col-md-3 col-md-offset-2 col-sm-3 col-xs-6 col-xs-offset-0" style="text-align: left">
                              <input type="text" class="form-control" id="discountpercentbuyer" onchange="subtotalbuyercalculation()" readonly="true" value="0" name="discountpercentbuyer"   />

                            </div>
                            
                            
                          </div>

                          <div class="col-md-3 col-sm-3 col-xs-12">
                            
                           
                          </div>
                        </div>

                        <div class="form-group">

                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label for="Processingfee" class="col-md-6 col-md-offset-2 col-sm-6 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Processing Fee</label>
                            
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-6">
                            
                            <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="number" class="form-control" onchange="subtotalsellercalculation()" id="processingfeeseller" name="processingfeeseller" value="0"  />

                            </div>
                          </div>

                          <div class="col-md-3 col-sm-3 col-xs-6">
                            
                            <div class="col-md-7 col-md-offset-0 ol-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <select class="form-control " onchange="subtotalbuyercalculation()" name="ddprocessingfee" id="ddprocessingfee">
                              <option value="0">0</option>
                                 <?php 

                                  for($i=100; $i<=3500; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddprocessingfee"></option>
                                 </select>
                          </div>
                        </div>
                        </div>

                          <div class="row form-group">
                          
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <label  class="col-md-6 col-md-offset-2 col-sm-6 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Under Writing</label>
                              
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                              
                              <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" >
                                <input type="number" class="form-control" value="0" onchange="subtotalsellercalculation()" id="underwritingseller" name="underwritingseller"   />

                              </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                              
                              <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" >
                                <select class="form-control" onchange="subtotalbuyercalculation()" name="ddunderwriting" id="ddunderwriting">
                                    <option value="0">0</option>
                                    <?php 

                                  for($i=100; $i<=3500; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddunderwriting"></option>
                                 </select>

                              </div>
                            </div>
                            </div>
                        

                        <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <label  class="col-md-6 col-md-offset-2 col-sm-6 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Wire Transfer Fee</label>
                              
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                              
                              <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <input type="number" class="form-control" value="0" onchange="subtotalsellercalculation()" id="wirefeeseller" name="wirefeeseller"   />

                              </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                              
                              <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <select class="form-control" name="ddwirefee" onchange="subtotalbuyercalculation()" id="ddwirefee">
                                    <option value="0">0</option>
                                    <?php 

                                  for($i=100; $i<=3500; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddwirefee"></option>
                                 </select>

                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <label  class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Appraisal (Prepaid by Credit Card)</label>
                              
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                              
                              <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <input type="number" class="form-control" value="0" onchange="subtotalsellercalculation()" id="appraisalseller" name="appraisalseller"   />

                              </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                              
                              <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <select class="form-control" onchange="subtotalbuyercalculation()" name="ddappraisal" id="ddappraisal">
                                    <option value="0">0</option>
                                    <?php 

                                  for($i=100; $i<=3500; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddappraisal"></option>
                                 </select>

                              </div>
                            </div>
                        </div>

                          <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <label  class="col-md-6 col-md-offset-2 col-sm-6 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Credit Report</label>
                              
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                              
                              <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <input type="number" class="form-control" value="0" onchange="subtotalsellercalculation()" id="reportseller" name="reportseller"   />

                              </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                              
                              <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <select class="form-control" name="ddcreditreport" onchange="subtotalbuyercalculation()" id="ddcreditreport">
                                    <option value="0">0</option>
                                    <?php 

                                  for($i=100; $i<=3500; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddcreditreport"></option>
                                 </select>
                              </div>
                            </div>
                        </div>

                          <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <label  class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Other Misc or Fee pad</label>
                              
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                              
                              <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <input type="number" class="form-control" value="0" onchange="subtotalsellercalculation()" id="miscseller" name="miscseller"   />

                              </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                              
                              <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <select class="form-control" name="ddmisc" onchange="subtotalbuyercalculation()" id="ddmisc">
                                    <option value="0">0</option>
                                    <?php 

                                  for($i=100; $i<=3500; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddmisc"></option>
                                 </select>

                              </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <label  class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Escrow</label>
                              
                            </div>

                            <div class="col-md-6 col-s-6 col-xs-6">
                              
                              <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <input type="number" class="form-control" value="0" onchange="subtotalsellercalculation()" id="escrowseller" name="escrowseller"   />

                              </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                              
                              <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <select class="form-control" name="ddescrow" onchange="subtotalbuyercalculation()" id="ddescrow">
                                    <option value="0">0</option>
                                    <?php 

                                  for($i=100; $i<=3500; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddescrow"></option>
                                 </select>

                              </div>
                            </div>
                        </div>

                          <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <label  class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Doc prep. Fee</label>
                              
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                              
                              <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <input type="number" class="form-control" value="0" onchange="subtotalsellercalculation()" id="docfeeseller" name="docfeeseller"   />

                              </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                              
                              <div class="col-md-7 col-md-offset-0 col-md-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <select class="form-control" name="dddocfee"  onchange="subtotalbuyercalculation()" id="dddocfee">
                                    <option value="0">0</option>
                                    <?php 

                                  for($i=100; $i<=3500; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="dddocfee"></option>
                                 </select>


                              </div>
                            </div>
                        </div>

                          <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <label  class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Notary Fee</label>
                              
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                              
                              <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <input type="number" class="form-control" value="0" onchange="subtotalsellercalculation()" id="notaryseller" name="notaryseller"   />

                              </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                              
                              <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <select class="form-control" name="ddnotary" onchange="subtotalbuyercalculation()" id="ddnotary">
                                   <option value="0">0</option>
                                   <?php 

                                  for($i=100; $i<=3500; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddnotary"></option>
                                 </select>

                              </div>
                            </div>
                        </div>

                          <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <label  class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Title Insurance</label>
                              
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                              
                              <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <input type="number" class="form-control" value="0" onchange="subtotalsellercalculation()" id="titleinsseller" name="titleinsseller"   />

                              </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                              
                              <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                               <select class="form-control" name="ddtitleins" onchange="subtotalbuyercalculation()"  id="ddtitleins">
                                   <option value="0">0</option>
                                   <?php 

                                  for($i=100; $i<=3500; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddtitleins"></option>
                                 </select>

                              </div>
                            </div>
                        </div>

                          <div class="form-group">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <label  class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Recording Fee</label>
                              
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                              
                              <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <input type="number" class="form-control" value="0" onchange="subtotalsellercalculation()" id="recordingseller" name="recordingseller"   />

                              </div>
                            </div>

                            <div class="col-md-3 col-sm-3 col-xs-6">
                              
                              <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                                <select class="form-control"  name="ddrecordingfee" onchange="subtotalbuyercalculation()" id="ddrecordingfee">
                                   <option value="0">0</option>
                                    <?php 

                                  for($i=100; $i<=3500; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddrecordingfee"> </option>  
                                 </select>

                              </div>
                            </div>
                        </div>

                          <div class="form-group">
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Sub Total</label>
                          </div>


                            <div class="col-md-6 col-sm-6 col-xs-6 " >
                            <div class="col-md-3 col-md-offset-7 col-sm-3 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="text" readonly="true" value="0" class="form-control" id="subtotalseller" name="subtotalseller"   />
                            </div>  
                          </div>

                          <div class="col-md-3 col-sm-3 col-xs-6">  
                            <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="text" readonly="true" class="form-control" value="0" id="subtotalbuyer" name="subtotalbuyer"   />
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-12 col-sm-12 col-xs-12 col-xs-offset-2 col-md-offset-1">PREPAID & IMPOUND CHARGES</label>
                        </div>

                          <div class="form-group">
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-2 ">Home Owner's Insurance</label>
                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            
                            <label  class="col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-1  col-xs-12 col-xs-offset-3 ">Select Month</label>

                            <div class="col-md-3 col-md-offset-0 col-sm-3 col-xs-12 col-xs-offset-0" >
                              <select class="form-control" onchange="homeinsmontlycalc()" name="ddhomeinsmonth" id="ddhomeinsmonth">
                                  <option value="0">0</option>
                                  <?php 

                                  for($i=1; $i<=20; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddhomeinsmonth"></option>
                              </select>
                            </div>  
                          </div>

                          <div class="col-md-3 col-sm-3 col-xs-12">  
                            <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="text" class="form-control" readonly="true" onchange="subtotalCcalcu()" id="homeinsbuyer" name="homeinsbuyer" value="0"  />
                            </div>
                          </div>
                        </div>


                         <div class="form-group">
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-2 ">Mortgage Insurance:</label>
                          </div>

                          <div class="col-md-6 col-xs-12">
                            
                            <label  class="col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-1  col-xs-12 col-xs-offset-3 ">Select Month</label>

                            <div class="col-md-3 col-md-offset-0 col-sm-3 col-xs-12 col-xs-offset-0" >
                              <select class="form-control" onchange="mortgeinscalcu()" name="ddmortgageinsmonth" id="ddmortgageinsmonth">
                                  <option value="0">0</option>
                                  <?php 

                                  for($i=1; $i<=12; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddmortgageinsmonth"></option>
                              </select>
                            </div>  
                          </div>

                          <div class="col-md-3 col-sm-3 col-xs-12">  
                            <div class="col-md-7 col-md-offset-0 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="text" value="0" readonly="true" class="form-control" onchange="subtotalCcalcu()" id="mortageinsbuyer" name="mortageinsbuyer"   />
                            </div>
                          </div>
                        </div>

                         <div class="form-group">
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="col-md-12 col-md-offset-2 col-sm-2 col-sm-offset-1  col-xs-12 col-xs-offset-3 ">Property Taxes:</label>
                          </div>

                          <div class="col-md-6 col-xs-12">
                            
                            <label  class="col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-1  col-xs-12 col-xs-offset-3 ">Select Month</label>

                            <div class="col-md-3 col-md-offset-0 col-sm-3 col-xs-12 col-xs-offset-0" >
                              <select class="form-control" onchange="downpropertycalcu()" name="ddpropertytaxesmonth" id="ddpropertytaxesmonth">
                                  <option value="0">0</option>
                                  <?php 

                                  for($i=1; $i<=12; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddpropertytaxesmonth"></option>
                              </select>
                            </div>  
                          </div>

                          <div class="col-md-3">  
                            <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="text" readonly="true" class="form-control" onchange="subtotalCcalcu()" id="propertytaxbuyer" value="0" name="propertytaxbuyer"   />
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <label  class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-3 ">Prepaid Interest:</label>
                          </div>

                          <div class="col-md-6 col-xs-12">
                            
                            <label  class="col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-1  col-xs-12 col-xs-offset-4 ">Select Day</label>

                            <div class="col-md-3 col-md-offset-0 col-sm-3 col-xs-12 col-xs-offset-0" >
                              <select class="form-control" onchange="prepaidintrestcalcu()" name="ddprepaidinterestday" id="ddprepaidinterestday">
                                  <option value="0">0</option>
                                  <?php 

                                  for($i=1; $i<=31; $i++)
                                  {

                                      echo "<option value=".$i.">".$i."</option>";
                                  }
                                  ?> 
                                  <option name="ddprepaidinterestday"></option>
                              </select>
                            </div> 
                          <label  class="col-md-2 col-md-offset-0 col-sm-2 col-sm-offset-0  col-xs-4 col-xs-offset-0 ">Per day</label> 
                          <div class="col-md-3 col-md-offset-0 col-xs-6 col-xs-offset-2" >
                              <input type="text" value="0" class="form-control" id="perdaypercent" value="0" readonly="true" onchange="prepaidintrestcalcu()" name="perdaypercent"   />
                            </div>
                          </div>

                          <div class="col-md-3 col-sm-3 col-xs-12">  
                            <div class="col-md-7 col-md-offset-0 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="text" class="form-control" value="0" readonly="true" id="preintrstbuyer" name="preintrstbuyer"   />
                            </div>
                          </div>
                        </div>

                        
                        <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-6">
                            <label  class="col-md-12 col-md-offset-4 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Sub Total (C)</label>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-6">  
                            <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="text" readonly="true" value="0" class="form-control" id="subtotalc" name="subtotalc"   />
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-6">
                            <label  class="col-md-12 col-md-offset-4 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">Total Cash Requiured to Close (A + B + C)</label>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-6">  
                            <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="text" value="0" class="form-control" readonly="true" id="cashrequiredabc" name="cashrequiredabc"   />
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-6">
                            <label  class="col-md-12 col-md-offset-4 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">MINUS INITIAL DEPOSIT TO ESCROW:</label>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-6">  
                            <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="number" value="0" class="form-control" onchange="minusinitialescrowcalcu()" id="minusescrowbuyer" name="minusescrowbuyer"   />
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-6">
                            <label  class="col-md-12 col-md-offset-4 col-sm-12 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">MINUS UP FRONT FEES TO LENDER (Appraisal/Credit):</label>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-6">  
                            <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="number" value="0" class="form-control" id="minuslenderbuyer" name="minusledger"   />
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                        
                          <div class="col-md-9 col-md-offset-0 col-xs-12 col-sm-9  ">
                          <div class="col-md-3 col-md-offset-4 col-xs-12 col-xs-offset-0 col-sm-offset-3 col-sm-6">
                            <select class="form-control" name="ddpurchaseprice"  id="ddpurchaseprice">
                                    <option>Please Choose</option>
                                    <option>Lender Credits</option>
                                    <option>Seller Credits</option>
                                    <option>Down Payment Assistance</option>
                                    <option>Grants</option>
                                    <option>Others</option>
                              </select>
                          </div>
                          <div class="col-md-3 col-md-offset-0 col-xs-6 col-xs-offset-0 col-sm-offset-3 col-sm-3">
                            <input type="number" value="0" class="form-control" onchange="purchbuyercalculation()" id="purcahsepricepercent" name="purcahsepricepercent">   
                          </div>
                          <label class="col-md-2 col-md-offset-0 col-xs-6 col-xs-offset-0 col-sm-offset-3 col-sm-2" >% Purch. Price</label>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">  
                            <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" >
                              <input type="text" class="form-control" value="0" readonly="true" id="purchasepricebuyer" name="purchasepricebuyer"   />
                            </div>
                          </div>
                        
                        </div>

                        <div class="form-group">
                          <div class="col-md-9 col-md-offset-0 col-xs-12 col-sm-9  ">
                          <div class="col-md-3 col-md-offset-4 col-xs-12 col-xs-offset-0 col-sm-offset-3 col-sm-3">
                            <select class="form-control" name="ddloanamount"  id="ddloanamount">
                                    <option>Please Choose</option>
                                    <option>Lender Credits</option>
                                    <option>Seller Credits</option>
                                    <option>Down Payment Assistance</option>
                                    <option>Grants</option>
                                    <option>Others</option>
                              </select>
                          </div>
                          <div class="col-md-3 col-md-offset-0 col-xs-6 col-xs-offset-0 col-sm-offset-3 col-sm-3">
                            <input type="number" value="0" class="form-control" onchange="pctlonamtbyr()" id="loanamountpercent"  name="laonamountpercent">   
                          </div>
                          <label class="col-md-2 col-md-offset-0 col-xs-6 col-xs-offset-0 col-sm-offset-3 col-sm-2" >% Loan Amount</label>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12">  
                            <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" >
                              <input type="text" class="form-control" readonly="true" value="0" id="loanamountbuyer" name="loanamountbuyer"   />
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-9 col-sm-9 col-xs-6">
                            <label  class="col-md-12 col-md-offset-4 col-sm-2 col-sm-offset-1  col-xs-12 col-xs-offset-1 ">REMAINING CASH REQUIRED AT CLOSING:</label>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-6">  
                            <div class="col-md-7 col-md-offset-0 col-sm-7 col-xs-12 col-xs-offset-0" style="text-align: left">
                              <input type="text" class="form-control" value="0" readonly="true" id="remainingcashatclosed" name="remainingcashatclosed"   />
                            </div>
                          </div>
                        </div>

                        <input type="hidden" class="form-control" value="0" readonly="true" id="calid" name="calid"   />

                        <div class="form-group" style="text-align: center;">
                                      <div class="col-md-6 col-md-offset-3  col-sm-6 col-sm-offset-4  col-xs-6 col-xs-offset-3 ">
                                        <button id="btncalculate" name="btncalculate"  onclick="remningcshclosing()"  class="btn btn-success">Calculate Loan</button> 
                                         
                                      </div>
                        </div>            


                <div class="form-group" >
                                             
     
                </div>
                </div>
                </div>
		  </form>
           
 
     
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p> Copyright &copy 2017</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-3.2.0"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
