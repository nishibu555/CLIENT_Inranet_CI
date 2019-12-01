
 <div class="container">
  <div class="row">
  <div class="col">
  <div class="sub_nav">
  <nav aria-label="breadcrumb">
 <ol class="breadcrumb">
   <li class="breadcrumb-item active"><a href="<?= base_url()?>">Home</a></li>
   <li class="breadcrumb-item active" ><a href="<?= base_url('records')?>">Records</a></li>
   <li class="breadcrumb-item active" ><a href="<?= base_url('staff_correction')?>">Staff Correction</a></li>
   <li class="breadcrumb-item active" ><a href="">New Correction Record</a></li>
 </ol>
</nav>
  </div>
  </div>
  </div>


  <div class="row">
      <div class="col-md-4">
          <div class="side_div1">
            <p>STUFF CORRECTION</p>
				<img src="<?= base_url().'assets/icon/staff-icon.png' ?>"  style="margin:15% 0%; max-width:200px">
         </div>
      </div>   
      <div class="col-md-8">
        <div class="table_title" style="margin-top: 30px">
          <h5>STUFF CORRECTION</h5>
        </div>

        <div style="margin-top: 10px">
           <p style="font-size: 21px; color: #3d3d3d; font-family: Arial">New Correction Record</p>
        </div>
        <div style="width: 100%">
            <div style="float: left;">
              <form method="post" action="<?= base_url()."save_new_write_up" ?>">
              <select class="form-controll" style="padding-right: 20px; width: 250px" name="staff_id">
                <option>Select Staff Member</option>
                <?php foreach ($new_write_up_list as $new_write_up_list) {?>
                    <option value="<?= $new_write_up_list->staff_id ?>"><?= $new_write_up_list->fname." ".$new_write_up_list->lname ?></option>
                <?php } ?>
              </select>
            </div>
            <div style="float: right; margin-top: 10px">
              <p>Description of Infraction</p>
            </div>
    
               <textarea name="infraction" rows="4" class="form-controll" style="width: 100%; margin-top: 5px"></textarea>
             
               <div  class="row justify-content-center">
                  <div class="col-md-4">
                     <button type="submit" class="btn btn-primary submit_button">Submit</button>
                  </div>
               </div>
              </form>
        </div>
      </div>
  </div><!--row-->
 
</div>
