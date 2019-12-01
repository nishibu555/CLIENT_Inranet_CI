

<div class="row justify-content-center registration-form">
 
    <div class="col-md-12"><!-- main -->
        <form method="post" action="#" id="register_form_8" name="reg_form8">

            <div class="row justify-content-center reg_form_content_row_last">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>The Problem</span></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>What is your main problem, as you see it?</label>
                        <div class="col-sm-6">
                          <textarea class="form-control" rows="4" name="main_problem" required></textarea>
                          <span class="main_problem"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>What have you done about it?</label>
                        <div class="col-sm-6">
                          <textarea class="form-control" rows="4" name="what_done_about_main_problem" required></textarea>
                          <span class="what_done_about_main_problem"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>What are your greatest needs, in order of priority?</label>
                        <div class="col-sm-6">
                          <textarea class="form-control" rows="4" name="greatest_needs" required></textarea>
                          <span class="greatest_needs"></span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Have you ever been in a program before?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_in_program_before"  value="1" required="required" minlength="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="is_in_program_before" value="0">
                                 <label class="form-check-label">
                                     No
                                 </label>
                            </div>
                          <br>  
                          <span class="is_in_program_before"></span>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>If Yes, was it:</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="program_type[]"  value="religious" required="required" minlength="1">
                                <label class="form-check-label">
                                     Religious
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="checkbox" name="program_type[]" value="non religious">
                                 <label class="form-check-label">
                                     Non-Religious
                                 </label>
                            </div>
                            <br>
                            <span class="program_type"></span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>How many programs have you been in before?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="programs_been_in_before" required> 
                            <span class="programs_been_in_before"></span>
                        </div>
                    </div> 
                </div>
            </div>      


            <div class="reg_form_submit_div">
                <button type="submit" class="reg_form_submit_button" id="submit_form_8">Save and Continue</button>
            </div>
            <span class="msg"></span>
        </form>

	    <div class="row reg_form_footer">
	        <div class="col">
	            <div>
	                <a href="">Clear Entire Application</a>
	            </div>
	        </div>
	    </div>

    </div> 
</div>



<script>
$("#register_form_8").validate({
    submitHandler: function () {


        var eighth_form_value = $('#register_form_8').serialize();
        console.log(eighth_form_value);

        $.ajax(
            {
                method:'POST',
                data:eighth_form_value,
                url:'save_registration_form8',
                success:function (data) {
                    console.log(data);
                    var res = JSON.parse(data);
                    console.log(res);
                    if (res.error_list)
                    {
                        // $.each(res.error_list, function(key,val) {
                        //     $('.'+key).text(val).css('color','red');
                        // });
                    }else
                    {
                        $('.msg').text('Successfully saved.').css('color','green');
                        $('#register_form_8').reset();
                    }
                }
        });
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


 </style>





