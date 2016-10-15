<?php
/* Template Name: Time Sheet */

	get_header(); ?>
<div class="looking-sec">
<div class="looking-text">
Looking for something a little extra? Try out Time Sheets Plus! Free Employee Scheduling, Payroll Management, Employee Time Tracking and More.
</div>
<div class="learnmore-btn">
<a href="http://timesheetsplus.com/features/">Learn More</a>
</div>
</div>
<h1 class="sq-revolution">Timesheet Calculator</h1>
<div class="sq-image"><img class="alignnone size-full wp-image-177" src="<?php echo get_template_directory_uri() ?>/img/img1.png" alt="img1" width="150" height="15" /></div>
<p class="sq-calc-desc first">Use the free timesheet calculator below to manually calculate the hours and wages owed for each of your business’ employees.</p>
<p class="sq-calc-desc">Simply enter the start, break, and stop times for each day of the week. Additional factors, such as overtime adjustments, lunch considerations, and sick time are also available.</p>
<p class="sq-calc-desc last">Once you’ve entered the week’s hours, input the employee’s hourly rate. Press “calculate” to view the employee’s weekly wages.</p>

<link href="../wp-content/themes/lsx/css/bootstrap.min.css.css" rel="stylesheet" type="text/css" />
<link href="../wp-content/themes/lsx/css/style-2.9.2.1.min.css" rel="stylesheet" type="text/css" media="screen" />
<script src="../wp-content/themes/lsx/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<link rel="apple-touch-icon" href="files/touch-icons/mobile-icon.png">

<!--<link href="../wp-content/themes/squared/css/print.css" rel="stylesheet" type="text/css" media="print" />-->
	<div class="sq-calculator">
    	<div class="calcWrap">
			<form name="ivForm" onsubmit="return false;">
            	<div id="error_chunk"></div>   
                <div class="sq-table">
                	<table class="sq-print-table"> 
                    	<tr class="header_row">
                            <td valign="middle" width="4%">&nbsp;&nbsp;&nbsp;&nbsp;</td> 
                            <td valign="middle" width="15%">Day</td>
                            <td valign="middle" width="25%">Starting Time</td> 
                            <td valign="middle" width="25%">Ending Time</td> 
                            <td valign="middle" width="20%">Break Deduction</td> 
                            <td valign="middle" id="ivnX" width="7%">&nbsp;&nbsp;Total</td> 
                            <td valign="middle" width="4%">&nbsp;&nbsp;&nbsp;&nbsp;</td> 
                        </tr>
<script type="text/javascript">
/*get the week number by following the norms of ISO 8601*/
function getWeek(dt){
	var calc=function(o){
		if(o.dtmin.getDay()!=1){
			if(o.dtmin.getDay()<=4 && o.dtmin.getDay()!=0)o.w+=1;
			o.dtmin.setDate((o.dtmin.getDay()==0)? 2 : 1+(7-o.dtmin.getDay())+1);
		}
		o.w+=Math.ceil((((o.dtmax.getTime()-o.dtmin.getTime())/(24*60*60*1000))+1)/7);
	},getNbDaysInAMonth=function(year,month){
		var nbdays=31;
		for(var i=0;i<=3;i++){
			nbdays=nbdays-i;
			if((dtInst=new Date(year,month-1,nbdays)) && dtInst.getDate()==nbdays && (dtInst.getMonth()+1)==month  && dtInst.getFullYear()==year)
				break;
		}
		return nbdays;
	};
	if(dt.getMonth()+1==1 && dt.getDate()>=1 && dt.getDate()<=3 && (dt.getDay()>=5 || dt.getDay()==0)){
		var pyData={"dtmin":new Date(dt.getFullYear()-1,0,1,0,0,0,0),"dtmax":new Date(dt.getFullYear()-1,11,getNbDaysInAMonth(dt.getFullYear()-1,12),0,0,0,0),"w":0};
		calc(pyData);
		return pyData.w;
	}else{
		var ayData={"dtmin":new Date(dt.getFullYear(),0,1,0,0,0,0),"dtmax":new Date(dt.getFullYear(),dt.getMonth(),dt.getDate(),0,0,0,0),"w":0},
			nd12m=getNbDaysInAMonth(dt.getFullYear(),12);
		if(dt.getMonth()==12 && dt.getDay()!=0 && dt.getDay()<=3 && nd12m-dt.getDate()<=3-dt.getDay())ayData.w=1;else calc(ayData);
		return ayData.w;
	}
}
var todayDate = new Date().toISOString().slice(0,10);
alert(todayDate);
var parts =todayDate.split('-');
var mydate = new Date(parts[2],parts[0]-1,parts[1], 01); 
alert(getWeek(mydate));
					var workdays = new Array(8);
					workdays[1] = "Monday";
					workdays[2] = "Tuesday";
					workdays[3] = "Wednesday&nbsp;&nbsp;&nbsp;";
					workdays[4] = "Thursday";
					workdays[5] = "Friday";
					workdays[6] = "Saturday";
					//workdays[7] = "Sunday";
					
					for(var i=1; i<7; i++){
					  var html = ''
					  +'  <tr>'
					  +'    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>'
					  +'    <td align="Left">'+workdays[i]+'</td>'
					  +'    <td align="Center"><input name="start_hr'+i+'" value="00" class="t1" onchange="if(!this.init) this.init=1; return calc(this)" accesskey="'+i+'"> :'
					  +'        <input name="start_min'+i+'" value="00" class="t1" onchange="return calc(this)"> '
					  +'        <select name="start_time'+i+'" onchange="return calc(this)">'
					  +'        <option>AM<option>PM'
					  +'        </select>'
					  +'		<label>Starting Time</label>'
					  +'    </td>'
					  +'    <td align="Center"><input name="end_hr'+i+'" value="00" class="t1" onchange="if(!this.init){ this.init=1; this.form.end_time'+i+'.options.selectedIndex=1; }; return calc(this)"> :'
					  +'        <input name="end_min'+i+'" value="00" class="t1" onchange="return calc(this)"> '
					  +'        <select name="end_time'+i+'" onchange="return calc(this)">'
					  +'        <option>AM<option>PM'
					  +'        </select>'
					  +'		<label>Ending Time</label>'
					  +'    </td>'
					  +'    <td align="Center"><input name="break_hr'+i+'" value="00" class="t1" onchange="return calc(this)"> :'
					  +'        <input name="break_min'+i+'" value="00" class="t1" onchange="return calc(this)"> '
					  +'		<label class="brkDdct">Break Deduction</label>'
					  +'    </td>'
					  +'    <td align="Right" ><div id="stot'+i+'"></div><label class="hrsWrkd">Hours Worked</label></td>'
					  +'    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>'
					  +'  </tr>'
					  document.write(html)
					}
</script>
                    	<tr>
                            <td class="hidden-td" ></td><td class="hidden-td" ></td><td class="hidden-td" ></td><td class="hidden-td" ></td>                       
                    		<td class="hidden-total"  id="totalHrs" >Total Hours:&nbsp;&nbsp;&nbsp;&nbsp;</td> 
                        	<td id="stots"></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> 
                    	</tr> 
                 	</table>
                    </div>
                    <div class="sq-calc-butttons">
                        <input class="sq-btn btn_grey calc_btn" type="button" name="mcalc" value="CALCULATE" onclick=" /* walk through the rows, use known input to generate cases for calc to operate on */ f = this.form; for(var i=0; i&lt;f.elements.length; i++){ if(f.elements[i].name.match(/start_hr/)){ calc(f.elements[i]); } } cal_days_sum()">
                        <input class="sq-btn btn_grey" type="reset" value="RESET ALL" onclick=" if(confirm('Are you sure want to reset all fields?')){ location.href = location.href; } else{ return false; }"> 
                        <input class="sq-btn btn_red" type="button" value="PRINT THIS" onclick= "window.print();return false;">
                    </div>

      <script src="../wp-content/themes/lsx/js/calc.min.js" type="text/javascript"></script>
			</form>
		</div>
  	</div>
<h3 class="sq-revolution sq-gray-hair">I think that all this calculating is giving you gray hair.</h3>
<p class="sq-calc-desc first text-left">Our <a href="<?php echo get_permalink( get_page_by_title( 'Sign Up' ) ); ?> ">FREE Timesheets Software</a> makes recording, categorizing, analyzing, and processing your timesheets an automatic process.</p>
<ul class="sq-calc-point">
    <li>Track hours in real time</li>
    <li>View lateness and overtime reports in one click</li>
    <li>Automatically calculate wages</li>
    <li>Refocus your energy on important profit-related tasks</li>
</ul>
<p class="sq-calc-desc first text-left">Our timesheets calculator will definitely help you get the job done, but our free software will get it done better. <a href="<?php echo get_permalink( get_page_by_title( 'Sign Up' ) ); ?>">Sign up now.</a> (Did we mention it’s free?)</p>
<div class="sq-calc-butttons">
	<a href="http://timesheetsplus.com/sign-up/"><input class="sq-btn btn_grey" type="button" value="get timesheetsplus free"> </a>
</div>
 <?php if ($options['enable_social_buttons'] == 1): ?>
     <?php get_template_part('share-buttons'); ?>
 <?php endif; ?>
<script>$(function(){ jQuery(".res").addClass("resNav"); });</script>
<script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e4a9d120577e0a7"></script>
<script src="http://www.redcort.com/assets/cache/3018a8ac8c90caa225a9ac890e39781b.js"></script>
<script>(function( $ ){ $.fn.customSelect = function() {}; })( jQuery );</script>
<noscript><style type="text/css" scoped>#loader{display:none;}</style></noscript>
<?php get_footer();