<div class="container" style="background-color: white">
<div class="row justify-content-center">
<div class="col-md-10" style="margin-top: 20px; text-align: left;">

<p><b>Fill out the Teen Challenge admission application over the web and start changing your life today!</b></p>
<p><b><span>Things to Know Before Applying to Teen Challenge</span></b></p>
<p><i>Please read the following guidelines carefully before proceeding with the application.</i></p>


<div class="lists">
<ul>
<li>Teen Challenge is a minimum of one (1) year in length. If you are unable to commit to this length of time, you should not apply.</li>
<li>Contact with people outside the Teen Challenge program will be limited to your immediate family (father, mother, sister, brother, wife, and children only) and your Pastor and his/her spouse <b>unless specified by Director.</b></li>
<li> Contact with any previous girlfriends or past friends (relationships) during your stay at Teen Challenge is not permitted <b>unless specified by Director.</b></li>
<li>You will not be allowed to have any visitors of the opposite sex (except immediate family) or date during the duration of the program <b>unless specified by Director.</b></li>
<li>You agree to participate in all program activities, which include church services, classes, and outside activities.</li>
<li>You agree to refrain from discussing past experiences with other students.</li>
<li> If you decide to withdraw from the program (walk off) or if your are terminated from the program, Teen Challenge will hold any belongings that you leave behind for three (3) days. If arrangements to retrieve said items are not made within three days of leaving the program, all belongings left behind will be discarded.</li>
<li>If you decide to withdraw from the program (walk off) or if you are terminated from the program, all funds in your medical/personal account will be forfeited to Teen Challenge.</li>
<li>If you decide to withdraw from the program (walk off) or if you are terminated from the program, all monies previously donated, given, paid into the program, etc, prior to leaving the program WILL NOT be refunded.</li>
<li>All telephone privileges, pass privileges, and visits are <b>privileges, not rights.</b> You will receive such privileges based on your progress in the program.</li>
<li>All phone calls and letters are screened by staff for drugs, pornography, or deception.</li>
<li> All outside business such as bills and income taxes must be taken care of BEFORE entering the program. This also includes any DOCTOR or DENTAL appointments. You will not be able to take care of outside business once entering Teen Challenge, nor will you be able to make telephone calls for business purposes <b>unless specified by Director.</b> We suggest that, if you have any OUTSTANDING DEBT, you notify your creditors that you are being admitted into a long-term residential program and will make restitution upon completion. It is our past experience with creditors that they will be happy to wait, because late payment is better than no payment. With your permission, they are more than welcome to contact this office for verification.</li>
<li> If you have medical problems that require frequent attention from a doctor, you must have these things taken care of before entering Teen Challenge. Teen Challenge staff is not equipped to transport you for personal needs.
</li>
<li>Teen Challenge allows no narcotic, mood-altering, mind-altering, or psychotropic drugs while in the program. If you foresee a problem, we suggest that you withdraw before coming to Teen Challenge.</li>
<li>You must bring a picture ID, social security card, and copy of your birth certificate.</li>
<li><b><span>Important!</span></b> Please review the <a href="<?php echo base_url()."assets/what_to_bring.pdf" ?>" target="_blank">What to Bring</a> document to be sure you have all the items you'll need at Teen Challenge.</li>
</ul>
</div>
            <form method="POST" action="">
<div class="check">
<p><span><input type="checkbox" name="isAgree" id="isAgree" ></span> I have read and agree to the guidelines listed above, and I have at least one hour to complete the entire application.</p>
</div>
<div class="row justify-content-center" style="margin:20px 0px">
<div class="col-md-4">
   <div style="text-align: center">
    <button type="button" class="agreement_button" id="submit">Save and Continue</button>
    </form>
   </div>
    <div style="margin: 20px 0px; text-align:center">
       <a href="">Clear Application</a>
    </div>
</div>
</div>
   </div>
</div>
</div>


<script>
  
    
    $('#submit').click(function(){
        if ($('#isAgree').is(":checked"))
        {
          var url = '<?php echo base_url()."student_registration"?>';
            var isAgree = $('#isAgree').val();
            console.log(isAgree);
          window.location.replace(url);
          $.ajax({
			url: "<?= base_url('save_agreement') ?>",
			type: "POST",
			data: {isAgree:isAgree},
			dataType: 'json',
			success: function(data) {
			 window.location.replace(url);
			}
		});
         
        }
        else
        {
           $('.check').css('background', '#ff3535');
           $('.check').css('color', 'white');
           $('.check').css('border', 'none');
        }
    });
</script>

    <style type="text/css">
        body{
         background-color: #edeeee;
    width: 100%;
    max-width: 1170px;
    margin: 30px auto;
        }
        header .init_menu {
    background:transparent;
    border-bottom: 1px solid #ffffff;
    padding: 0;
    box-shadow: 0px 7px 7px -7px #ffffff;
}
header{
    margin-bottom: 0px;
}
header .init_menu .container{
     background-color: #fff;
     border:1px solid #a1a1a1;
     border-bottom: none;
}
header + div.container{
   background-color: #fff;
   padding-top: 20px;
    border:1px solid #a1a1a1;
     border-top: none;
}
.lists ul{
    padding-left:14px !important;
}
.lists ul li{
    margin-top: 10px !important;
}
.p{
    color: #676767;
}
span{
    color: #2b78cb;
}
.check{
padding: 10px;
border: 1px solid #268df2;
background-color: #d4e9ff;
margin: 50px 0px;
text-align:center;
}
.agreement_button{
     width: 100%;
     background-color: #0f3a64;
     padding: 20px 50px;
     font-size:17px;
     font-weight: bold;
     border:none;
     color: #fff;
}
 </style>
