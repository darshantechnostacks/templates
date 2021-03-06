
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="UTF-8" />
<title>Monthly Compound Interest Calculator</title>

<?php include_once 'include/header.php'; ?>
<script Language='JavaScript'>
function fn(num, places, comma) {

var isNeg=0;

    if(num < 0) {
       num=num*-1;
       isNeg=1;
    }

    var myDecFact = 1;
    var myPlaces = 0;
    var myZeros = "";
    while(myPlaces < places) {
       myDecFact = myDecFact * 10;
       myPlaces = Number(myPlaces) + Number(1);
       myZeros = myZeros + "0";
    }
    
  onum=Math.round(num*myDecFact)/myDecFact;
    
  integer=Math.floor(onum);

  if (Math.ceil(onum) == integer) {
    decimal=myZeros;
  } else{
    decimal=Math.round((onum-integer)* myDecFact)
  }
  decimal=decimal.toString();
  if (decimal.length<places) {
        fillZeroes = places - decimal.length;
     for (z=0;z<fillZeroes;z++) {
        decimal="0"+decimal;
        }
     }

   if(places > 0) {
      decimal = "." + decimal;
   }

   if(comma == 1) {
  integer=integer.toString();
  var tmpnum="";
  var tmpinteger="";
  var y=0;

  for (x=integer.length;x>0;x--) {
    tmpnum=tmpnum+integer.charAt(x-1);
    y=y+1;
    if (y==3 & x>1) {
      tmpnum=tmpnum+",";
      y=0;
    }
  }

  for (x=tmpnum.length;x>0;x--) {
    tmpinteger=tmpinteger+tmpnum.charAt(x-1);
  }


  finNum=tmpinteger+""+decimal;
   } else {
      finNum=integer+""+decimal;
   }

    if(isNeg == 1) {
       finNum = "-" + finNum;
    }

  return finNum;
}




function sn(num) {

   num=num.toString();


   var len = num.length;
   var rnum = "";
   var test = "";
   var j = 0;

   var b = num.substring(0,1);
   if(b == "-") {
      rnum = "-";
   }

   for(i = 0; i <= len; i++) {

      b = num.substring(i,i+1);

      if(b == "0" || b == "1" || b == "2" || b == "3" || b == "4" || b == "5" || b == "6" || b == "7" || b == "8" || b == "9" || b == ".") {
         rnum = rnum + "" + b;

      }

   }

   if(rnum == "" || rnum == "-") {
      rnum = 0;
   }

   rnum = Number(rnum);

   return rnum;

}

function computeForm(form)  {

   if(document.calc.interest.value == "") {
      alert("Please enter the Interest Rate.");
      document.calc.interest.focus();
   } else 
   if(document.calc.moAdd.value == "") {
      alert("Please enter the Monthly Addition.");
      document.calc.moAdd.focus();
   } else
   if(document.calc.payments.value == "") {
      alert("Please enter the Number of Years.");
      document.calc.payments.focus();
   } else {
  

      var i = sn(document.calc.interest.value);
      i /= 100;
      i /= 12;

      var ma = sn(document.calc.moAdd.value);
 
      var Vprincipal = sn(document.calc.principal.value);
      var prin = Vprincipal;

      var Vpayments = sn(document.calc.payments.value);

      var pmts = Vpayments * 12;

      var count = 0;
    
      while(count < pmts) {

        newprin = Number(prin) + Number(ma);

        prin = Number(newprin * i) + Number(prin + ma);

        count = Number(count) + Number(1);

      }

      var Vfv = prin;

      document.calc.fv.value = "$" + fn(prin,2,1);
    
      var totinv = Number(count * ma) + Number(Vprincipal);

      var Vtotalint = Number(prin - totinv);

      document.calc.totalint.value = "$" + fn(Vtotalint,2,1);
      jQuery('.email-my-results').removeClass('hidden');

   }

}



function clear_results(form) {

   document.calc.fv.value = "";
   document.calc.totalint.value = "";

}
</script>
</head>
<body class="page-template page-template-templates page-template-calculator-content-sidebar page-template-templatescalculator-content-sidebar-php page page-id-6815 page-child parent-pageid-6715 header-image header-full-width content-sidebar fmfb_none mortgage-payoff-calculator not_home feature-box-none footer-height-tall calculator" itemscope itemtype="https://schema.org/WebPage">
    <div class="site-container">
         <div class="site-inner">
            <div class="content-sidebar-wrap">
                <main class="content mb5">
                    <div class="fmcalc-inner-container fmcalc-ic-c14">
                        <div class="fmcalc-wrapper">
                        <form name="calc" method="post" action="#">
<table class="fmcalc" cellpadding='4' cellspacing='0'>
<tbody>
<tr>
<td colspan="2">
<br><h4 align=center>Monthly - Compound Interest Calculator</h4>
<div class="fmcalc-separator"></div>
</td>
</tr>
<tr>
<td>
Enter Current Savings Balance:
</td>
<td align="center">
<input type="text" name="principal" size="15" onKeyUp="clear_results(this.form)" />
</td>
</tr>
<tr>
<td>
Monthly Deposit:
</td>
<td align="center">
<input type="text" name="moAdd" size="15" onKeyUp="clear_results(this.form)" />
</td>
</tr>
<tr>
<td>
Annual Interest Rate (ROI):
</td>
<td align="center">
<input type="text" name="interest" size="15" onKeyUp="clear_results(this.form)" />
</td>
</tr>
<tr>
<td>
Number of Years To Compound:
</td>
<td align="center">
<input type="text" name="payments" size="15" onKeyUp="clear_results(this.form)" />
</td>
</tr>
<tr>
<td align="center" colspan="2">
<input type="button" VALUE="Calculate Compound Growth" onClick="computeForm(this.form)" />
<input type="reset" VALUE="Reset" />
<div class="fmcalc-separator"></div>
<div class="clearfix"></div><div class="email-my-results text-center hidden"><button class="button email-my-results-btn launch-popup">Email My Results<br><small>Click Here</small></button></div><br />
</td>
</tr>
<tr>
<td>
Future Account Value:
</td>
<td align="center">
<input type="text" name="fv" size="15" />
</td>
</tr>
<tr>
<td>
Compound Interest Earned:
</td>
<td align="center">
<input type="text" name="totalint" size="15" />
</td>
</tr>
</tbody>
</table>
</form>
                        </div>
                    </div>
                </main>
<?php include_once 'include/footer.php'; ?>