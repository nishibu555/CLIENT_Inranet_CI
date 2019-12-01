<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('marketing') ?>">Marketing</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('churches') ?>">Churches</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('') ?>">Update Church</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="side_div1">
				<p>CHURCHES</p>
				<img src="<?= base_url().'assets/icon/student-manager.png' ?>" style="margin:15% 0%; max-width:150px;">
			</div>
		</div>

		<div class="col-md-9">
			<div class="table_title" style="margin-top: 24px; margin-bottom: 10px">
				<h5>Update CHURCHE</h5>
			</div>
			<div>
				<form class="add_curch" id="update_curch">
					<div class="row">
						<div class="col-md-6">
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">Church:</label>
	                            <div class="col-sm-8">
	                                <input type="text" class="form-control" name="church" value="<?= $church->church ?>" required>
	                                <span class="church"></span>
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">Address Line 1:</label>
	                            <div class="col-sm-8">
	                                <input type="text" class="form-control" value="<?= $church->addr1 ?>" name="addr1">
	                                
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">Address Line 2:</label>
	                            <div class="col-sm-8">
	                                <input type="text" class="form-control" value="<?= $church->addr2 ?>" name="addr2" >
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">City:</label>
	                            <div class="col-sm-8">
	                                <input type="text" class="form-control" value="<?= $church->city ?>" name="city" >
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">State:</label>
	                            <div class="col-sm-8">
	                                <input type="text" class="form-control" value="<?= $church->state ?>" name="state" >
	                                
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">Zip:</label>
	                            <div class="col-sm-8">
	                                <input type="text" class="form-control" value="<?= $church->zip ?>" name="zip" >
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">Contact Name:</label>
	                            <div class="col-sm-8">
	                                <input type="text" class="form-control" value="<?= $church->contact ?>" name="contact" >
	                                
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">Contact Phone:</label>
	                            <div class="col-sm-8">
	                                <input type="text" class="form-control" value="<?= $church->phone ?>" name="phone" >
	                                
	                            </div>
	                        </div>
						</div>
						<div class="col-md-6">
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">Contact E-mail:</label>
	                            <div class="col-sm-8">
	                                <input type="text" class="form-control" value="<?= $church->email ?>" name="email" >
	                                
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">Notes:</label>
	                            <div class="col-sm-8">
	                                <textarea rows="4" name="notes" style="width: 100%"><?= $church->notes ?></textarea>
	                               
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">History:</label>
	                            <div class="col-sm-8">
	                                <textarea rows="4"  name="history" style="width: 100%"><?= $church->history ?></textarea>
	                                
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-md-4 col-form-label">Highlight:</label>
	                            <div class="col-sm-8">
							        <div class="form-check form-check-inline">
										 <input class="form-check-input" type="radio" name="highlight" value="FFFFFF">
										 <label class="form-check-label">
										    None
										 </label>
									</div>
									<div class="form-check form-check-inline">
									    <input class="form-check-input" type="radio" name="highlight"  value="00ff00">
									    <label class="form-check-label">
									        Green
									    </label>
									</div>
							        <div class="form-check form-check-inline">
										 <input class="form-check-input" type="radio" name="highlight" value="ffff00">
										 <label class="form-check-label">
										     Yellow
										 </label>
									</div>
							        <div class="form-check form-check-inline">
										 <input class="form-check-input" type="radio" name="highlight" value="ff0000">
										 <label class="form-check-label">
										     Red
										 </label>
									</div>
								</div>
	                        </div>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-4" style="text-align: center; margin: 20px 0px">
							<a href="<?= base_url('add_church') ?>">
								<button type="submit" class="btn btn-primary score-btn" style="width: 100%" id="add_church_btn">SAVE</button>
							</a>
						</div>
					</div>
				</form>
			</div>
		</div><!--col-md-9-->

	</div>
	<!-- main row-->
</div>

<script src="<?php echo base_url('assets/validate/jquery.validate.js')?>"></script>

<script>
	
        $("#update_curch").validate({
            submitHandler: function () {
                
                var value = $('#update_curch').serialize();

          
	            $.ajax({
	                    method:'POST',
	                    data:value,
	                    url:"<?php  echo base_url().'update_church/'.$church->id ?>",
	                    success:function (data) {
	                        var res = JSON.parse(data);
	                        if (res.error_list){
	                            $.each(res.error_list, function(key,val) {
	                                $('.'+key).text(val).css('color','red');
	                            });
	                        }
	                        else{
	                        	window.location.href="<?=  base_url('marketing/churches') ?>"
	                        }
	                    }
	             }); 
            }
        });
</script>

