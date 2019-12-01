<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('/office') ?>">Office</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('office/documents') ?>">Documents</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="side_div1">
				<p>DOCUMENTS</p>
				<img style="width: 100%;" src="<?php echo base_url() ?>assets/images/icon_records.png">
			</div>

		</div>

		<div class="col-md-9">
			
				<div class="row">
					<div class="col-md-8">
						<div class="student_activity_log">
							<div class="table_title" style="margin-top: 30px;">
								<h5>Documents:</h5>
							</div>
							<div class="student_academic">
								<div style="margin-top: 5px; float: right;">
									<form id="search_form" method="post" action="#">
									    <input type="text" name="search_input" style="margin-right: 5px">
										<img src="<?php echo base_url() ?>assets/images/icon_search.png">
										<button type="button" class="int_btn" id="search_form_btn">SEARCH</button>
								    </form>
								    <div>
								    	<div id="search_result">
								    		
								    	</div>
								    </div>
								</div>
							</div>

							<div style="padding: 5px; margin-top: 40px">
								<p><b id="fullPath">
									  <a href="#" id="documents"><span id="1">Documents</span></a> 
									  
								</b></p>
							</div>

							<div style="border: 0.5px solid gray; padding: 0px;">
								<div style="background-color: #0f3a64; color: white; padding: 5px; margin: 0px">
									<b>Folders</b>
                                    <div style="float: right; padding: 0px 5px">
                                    	<select style="padding:0px !important;width: 100%; font-size: 12px; font-weight: 600" name="sort_by" id="sort">
                                    		<option value="date">Sort by date:</option>
                                    		<option value="size">Sort by size:</option>
                                    		<option value="type">Sort by type:</option>
                                    		<option value="name">Sort by name:</option>
                                    	</select>
                                    </div> 
								</div>

								<div id="append_folder" style="margin-bottom: 10px">
									

								</div>

								<p style="background-color: #0f3a64; color: white; padding: 5px; margin: 0px"><b>Files</b></p>
								<div id="append_file">


								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div style="border: 0.5px solid gray; padding: 0px; margin-bottom: 20px; font-size: 13px">
							<div style="text-align: center;background-color: #0f3a64; color: white; padding: 10px; margin: 0px"><b>UPLOAD FILE</b></div>

                            <form id="upload_form" enctype="multipart/form-data" method="post" action="#">
								<div style="padding-left: 15px; padding-top: 10px">
									<input type="file" name="userfile">
									<input type="hidden" name="fid" id="fid_input">
								</div>
								<div style="text-align: center; margin-top: 20px">
									<button type="submit" id ="upload_btn" class="btn btn-primary" style="font-size: 12px; padding: 5px 20px">UPLOAD</button>
									<p style="margin-top: 5px">Max file size 32 MB</p>
								</div>
							</form>
						    
						</div>


						<div style="border: 0.5px solid gray; padding: 0px">
							<div style="text-align: center;background-color: #0f3a64; color: white; padding: 10px; margin: 0px"><b>CREATE</b></div>

                            <form id="create" >
							<div style="padding: 10px 10px; font-size: 13px">
								<div class="row">
									<div class="col">
										<input type="radio" name="create" value="folder" style="margin-right: 5px">Folder
										<input type="hidden" name="parent_id" value="" id="parent_id">
									</div>
						
									<div class="col">
										<input type="radio" name="create" value="url" style="margin-right: 5px">Url
									</div>
								</div>
								<input type="text" name="name" style="width:100%; margin-top: 10px">
							</div>
							<div style="text-align: center; margin-bottom: 10px">
								<button type="button" class="btn btn-primary" style="padding: 5px 20px; font-size: 12px" id="create_form_submit">CREATE</button>
							</div>
							</form>
						</div>
					</div>

				</div>
			
			<div class="col-md-12" style="margin-top: 40px;">
				<div class="row">
					<div class="col-md-12" id="total" style="margin-bottom: 20px ">
                       
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" id="get_fund">

					</div>
				</div>

			</div>
			<!--row-->

		</div>
		<!--row-->
	</div>

<script>


	
	function get_folder(){
        $.ajax({
            method:'GET',
            url:'<?php echo base_url('get_folder') ?>',
            success:function (data) {
            	$('#append_folder').html(data);
            }
		});
	}


	function get_file(){
		$.ajax({
            method:'GET',
            url:'<?php echo base_url('get_file') ?>',
            success:function (data) {
            	$('#append_file').html(data);
            }
		}); 
	}
    

	$('#create_form_submit').on('click', function(){
     
         var value = $('#create').serialize();
         
		 $.ajax({
            method:'POST',
            data:value,
            url:'<?php echo base_url('create_doc') ?>',
            success:function (data) {
                if(data == 1){
                	$('#create').trigger('reset');
                	get_folder();
                	get_file();
                }
                else{

                }
            }
		}); 
	});


	 $('#upload_form').on('submit', function(event) {
		event.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			url: "<?php echo base_url('upload_doc') ?>",
			type: "POST",
			data: formData,
			processData: false,
			contentType: false,
			dataType: 'json',
			success: function(data) {
                 get_folder();
                 get_file();

			}
	    });
	});


	$('#append_folder').on('click','.folder_list', function(){
        var fdid=$(this).attr('data-fid');//folder id
		$.ajax({
            method:'GET',
            dataType: 'json',
            url: '<?php echo  base_url('get_files_by_fdid/')?>'+fdid,
            success:function (data) {
            	$('#append_file').html(data.html);
            	$('#append_folder').html(data.html1);

            	for(var i=0; i<data.fullPath.length ; i++){
            		var html = '';
	            	 html += '<span>> <a href="#" class="path" data-folder="'+data.fullPath[i]+'">'+data.fullPath[i]+'</a> </span>';
	            	
            	}
            	$('#fullPath').append(html);
            	$('#fid_input').val(fdid);
            	$('#parent_id').val(fdid);   
            }
		}); 
		
	});


	$('#search_result').on('click','.f_list', function(){
        var fdid=$(this).attr('data-fid');
		$.ajax({
            method:'GET',
            dataType: 'json',
            url: '<?php echo  base_url('get_files_by_fdid/')?>'+fdid,
            success:function (data) {
            	$('#append_folder').html(data.html);
            	$('#path').html(data.folder);
            	$('#fid_input').val(fdid);
            	$('#search_result').html('');
            	$('#search_form').trigger('reset');

            }
		}); 
	});


	$('#fullPath').on('click','#documents', function(e){
		e.preventDefault();
		location.reload();
	});


    $('#search_form_btn').on('click', function(event) {
		var formData = $('#search_form').serialize();
		console.log(formData);
		$.ajax({
			url: "<?php echo base_url('search_doc') ?>",
			type: "POST",
			data: formData,
			success: function(data) {
				$('#search_result').html(data);
			}
	    });
	});



	$('#sort').on('change', function(){
         var value = $("#sort option:selected").val();
         $.ajax({
			url: "<?php echo base_url('sort_doc') ?>",
			type: "POST",
			dataType: 'json',
			data: {sort_by: value},
			success: function(data) {
				console.log(data)
				$('#append_folder').html(data.html1);
				$('#append_file').html(data.html2);
			}
	    });
	});
    

    $('#fullPath').on('click', '.path' ,function(){
        var folder_title= $(this).attr('data-folder');
        $.ajax({
            method:'GET',
            dataType: 'json',
            url: '<?php echo  base_url('get_folder_by_title/')?>'+folder_title,
            success:function (data) {
                var fdid=data.id;
				$.ajax({
		            method:'GET',
		            dataType: 'json',
		            url: '<?php echo  base_url('get_files_by_fdid/')?>'+fdid,
		            success:function (data) {
		                $('#fullPath').html('<a href="#" id="documents"><span id="1">Documents</span></a>');
		            	$('#append_file').html(data.html);
		            	$('#append_folder').html(data.html1);
		            	for(var i=0; i<data.fullPath.length ; i++){
		            		var html = '';
			            	 html += '<span>> <a href="#" class="path" data-folder="'+data.fullPath[i]+'">'+data.fullPath[i]+'</a> </span>';
		            	}
		            	$('#fullPath').append(html);
		            	$('#fid_input').val(fdid);
		            	$('#parent_id').val(fdid);   
		            }
				});
            }
		});  
    })
  

    $(document).ready(function() {
       get_folder();
       get_file();
    });

</script>

