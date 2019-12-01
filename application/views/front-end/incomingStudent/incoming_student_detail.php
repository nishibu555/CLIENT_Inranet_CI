<div class="row justify-content-center" style="margin-top: 30px">
    <div class="col-md-6" style="text-align: center;">
        <h4>Applications</h4>

        <div style="text-align: center; margin-top: 20px">
          <h5><?php  echo $student_info->first_name." ".$student_info->middle_name." ".$student_info->last_name ?></h5>
          <p><span><?php  echo $student_info->registration_date ?></span></p>
      </div>
  </div>
</div>



<div class="row justify-content-center">
    <div class="col-md-8 ">
        <div class="row">
            <div class="col">
              <div style="text-align: center;">
                <div style="text-align:center">
                    <form id="notes">
                       <textarea rows="3" name="admins_notes"  placeholder="Admins Note" id="admins_notes"></textarea>
                       <input type="hidden" name="std_id" value="<?=  $student_info->student_id ?>">
                       <br>
                       <button type="button" class="btn btn-primary" id="save_note">Save note</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div style="text-align: center; margin-top:10px">
              <form method="post" action="<?php echo base_url()."activate_student/". $student_info->student_id ?>">
                  <button type="submit" class="btn btn-primary">Activate Student</button>
              </form>    
           </div>

           <div style="margin-top:20px; text-align: center; ">
            <select id="incoming_student">
               <option value="">Select an applicant</option>
               <?php foreach ($incoming_student as $incoming_student) { ?>
                <option value="<?php echo base_url()."incoming_student_detail/".$incoming_student->student_id ?>"><?php echo $incoming_student->first_name."".$incoming_student->last_name ?></option>
            <?php } ?>
        </select>
    </div>
</div>
</div>
</div>
</div>



<div class="row justify-content-center" style="margin-top: 30px">
    <div class="col-md-8">
        <div class="register-form-list">
            <ul id="nav" class="nav nav-tabs">
                <li><a class="nav-item nav-link active" href="<?php echo base_url()."page_1/".$student_id ?>">Page 1</a></li>
                <li><a class="nav-item nav-link" href="<?php echo base_url()."page_2/".$student_id ?>">Page 2</a></li>
                <li><a class="nav-item nav-link" href="<?php echo base_url()."page_3/".$student_id ?>">Page 3</a></li>
                <li><a class="nav-item nav-link" href="<?php echo base_url()."page_4/".$student_id ?>">Page 4</a></li>
                <li><a class="nav-item nav-link" href="<?php echo base_url()."page_5/".$student_id ?>">Page 5</a></li>
                <li><a class="nav-item nav-link" href="<?php echo base_url()."page_6/".$student_id ?>">Page 6</a></li>
                <li><a class="nav-item nav-link" href="<?php echo base_url()."page_7/".$student_id ?>">Page 7</a></li>
                <li><a class="nav-item nav-link" href="<?php echo base_url()."page_8/".$student_id ?>">Page 8</a></li>
            </ul>
            <div id="ajax-content"></div>
        </div>
    </div>
</div>

<script>
    $('#save_note').on('click',function(){
        var value = $('#notes').serialize();
        $.ajax({
            method:'POST',
            data: value,
            url:'<?php echo base_url(); ?>save_note',
        });
         $('#admins_notes').val('');
    }) 
</script>

<script>
  $(document).ready(function() {
      


    $('#incoming_student').on('change',function(){
        var href = $( "#incoming_student option:selected" ).val();
        window.location.replace(href);
    });


    $("#nav li a").click(function() {

        $("#nav li a").removeClass('active');
        $(this).addClass('active');

        $.ajax({ url: this.href, success: function(html) {
            $("#ajax-content").empty().append(html);
        }
    });
        return false;
    });

    $.ajax({ url: '<?php echo base_url()."page_1/".$student_id ?>', success: function(html) {
        $("#ajax-content").empty().append(html);
    }
});
});
</script>