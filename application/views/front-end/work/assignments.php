<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('work') ?>">Work</a></li>
						<li class="breadcrumb-item active"><a href="">Assignments</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="side_div1">
				<p>ASSIGNMENTS</p>
				<img style="width: 100%;" src="<?php echo base_url() ?>assets/images/icon_records.png">
			</div>

		</div>

		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<div class="student_activity_log">
						<div class="table_title" style="margin-top: 30px;">
							<h5>Assignments:</h5>
						</div>
					</div>
				</div>
            </div>
                <div class="row">
                      <div class="col-md-6 float-left">
						
                          <span>Past Assignments:</span>
						<select id="past_assignment" >
							<?php foreach ($past_assignment as $key => $value) { ?>
								<option value="<?= date('Y-m-d', strtotime($value->date)) ?>">
									<?= date('l n/j/Y', strtotime($value->date)) ?>
								</option>
							<?php } ?>
						</select>
                    </div>
                    <div class="col-md-6 float-right">
						<span class="float-right">New Assignments:</span>
						<select name="new_assignment_date" id="new_assignment_date" class="float-right">
							<option value="<?= date('Y-m-d', strtotime('today'))?> ">
								<?= date('l n/j/Y', strtotime('today')) ?>
							</option>
							<option value="<?= date('Y-m-d', strtotime('tomorrow')) ?>" selected>
								<?= date('l n/j/Y', strtotime('tomorrow')) ?>
							</option>
						</select>
					</div>
				</div>
            
		      <div class="row" style="border-bottom:1px solid ; padding:10px 0px">
				   <div class="col-md-4 mt-2 new_location_head">
                        <select id="select_location">
                            <option>-- Select Recent Location -- </option>
                            <?php foreach ($location as $key => $value) { ?>
                                <option value="<?= $value->column_id ?>"><?= $value->column_id ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-5 mt-2 new_location_head">
                        <form id="add_location">
                        <label>-or-</label>
                          <input type="text" name="new_location" placeholder="New Location.."/>
                            <button type="submit" class="btn btn-primary btn-sm">Add</button>
                         </form>
                    </div>
                    <div class="col-md-3 mt-2 new_location_head ">
                        <button type="button" id="repeat_last_day" class="btn btn-primary btn-sm float-right">Repeat Last Day</button>
                    </div>     
            </div>
                <div class="col-md-12 offset-1 text-center mt-2 new_location_head" style="">
                    <form class="form-inline" id="note_form" >
                      <div class="form-group mx-sm-8 mb-2" style="width: 70%;">
                        <label for="" class="">Work Notes To Print</label>
                        <textarea data-action="edit" type="text" rows="3" class="form-control" disabled name="edit_notes" style="width: 70%;margin-left: 11px;"></textarea>
                      </div>
                      <button type="button" class="btn btn-primary mb-2" id="edit_note_btn">Edit</button> 
                        <button type="submit" class="btn btn-primary mb-2" id="submit_note_btn" style="display:none">Edit</button>
                    </form>
                </div>
		
                <div class="col-md-12 text-center mt-2 past_head" style="display:none">
                    <h5>ALL ASSIGNMENTS BEGINS AFTER CLASSES</h5>
                </div>
            
					<div class="mt-4">
						<div class="row" id="CONTENTS">
<!--  ajax data show here-->
           <div class="col-md-4 col-content">
            <div class="item_col">
                <h6 class="location_header">Resources</h6>
                <div class="list" id="resources">
                    
                </div>
			</div>
		   </div>
		     <div class="col-md-4 col-content">
            <div class="item_col">
                <h6 class="location_header">Workers</h6>
                <div class="list" id="unplaced">
                    
                </div>
			</div>
		   </div>

              
		    </div>		
		</div>
		<!--row-->
	</div>



<!--<script src='<?php echo base_url()?>assets/js/jquery-sortable.js'></script>-->

<script src="<?php echo base_url('assets/validate/jquery.validate.js')?>"></script>



<!--this script for new assignment date-->
<script>


</script>
<script>
$(document).ready(function(){

     var this_date = $('#new_assignment_date :selected').val();
    if(this_date){
       get_data(this_date);
        
    } 
       $('#new_assignment_date').on('change',function(){
            var this_date = $(this).val();
           $(".col-content").remove();
            get_data(this_date);
         })
    
   function get_data(this_date){
      
         $.ajax({
			url: "<?= base_url('ajax/get_new_data') ?>",
			type: "POST",
			data: {this_date: this_date},
			dataType: 'json',
			success: function(data) { 
			      console.log(data.html1);
                   if(data.last_location){
                  $('#CONTENTS').append(data.last_location); 
                }
                  
                if(data.location_option){
                  $('#select_location').html(data.location_option); 
                }     
                if(data.note){
                  $("textarea[name='edit_notes']").val(data.note);
                }
                
                var i;
                for (i = 0; i < data.html1.length; ++i) {
                  
                //   var column_id = String($.trim(data.html1[i].column_name));
                    var column_id = data.html1[i].column_name.replace(/\s/g, '');
          
                    var block = data.html1[i].html;
                       $("#"+column_id+"").html(block); 
                       
                }

// <!--this script for resource sortable js-->
                var el =document.getElementById('resources');
                var sortable = new Sortable(el, {
                     group: {
                        name: 'shared',
                    },
              
                    onEnd: function (evt) {
                        var block = evt.item.attributes.id.nodeValue;
                        var from_column = evt.from.attributes.id.nodeValue;
                        var to_column = evt.to.attributes.id.nodeValue;
                        var this_date = $('#new_assignment_date :selected').val();
                        $.ajax({
                            url: "<?= base_url('ajax/work/update_column') ?>",
                            type: "POST",
                            data: {block: block,from_column:from_column,to_column:to_column,this_date:this_date},
                            dataType: 'json',
                            success: function(data) {
                                console.log("success");
                            }
                        })
                      
                    },
                    store: {
                        get: function (sortable) {
                            var order = localStorage.getItem(sortable.options.group);
                            return order ? order.split('|') : [];
                        },
                        set: function (sortable) {
                            var order = sortable.toArray();
                           
                            var this_date = $('#new_assignment_date :selected').val();
                            $.ajax({
                                url: "<?= base_url('ajax/work/update_order') ?>",
                                type: "POST",
                                data: {order: order,this_date:this_date},
                                dataType: 'json',
                                success: function(data) {
                                    console.log("success");
                                }
                            })
                        }
                    },
                    animation: 150
                });
       
// <!--this script for workers sortable js-->
                var el =document.getElementById('unplaced');
                var sortable = new Sortable(el, {
                     group: {
                        name: 'shared',
                    },
                    onEnd: function (evt) {
                        var block = evt.item.attributes.id.nodeValue;
                        var from_column = evt.from.attributes.id.nodeValue;
                        var to_column = evt.to.attributes.id.nodeValue;
                        var this_date = $('#new_assignment_date :selected').val();
                        $.ajax({
                            url: "<?= base_url('ajax/work/update_column') ?>",
                            type: "POST",
                            data: {block: block,from_column:from_column,to_column:to_column,this_date:this_date},
                            dataType: 'json',
                            success: function(data) {
                                console.log("success");
                            }
                        })
                      
                    },
                    store: {
                        get: function (sortable) {
                            var order = localStorage.getItem(sortable.options.group);
                            return order ? order.split('|') : [];
                        },
                        set: function (sortable) {
                            var order = sortable.toArray();
                           
                            var this_date = $('#new_assignment_date :selected').val();
                            $.ajax({
                                url: "<?= base_url('ajax/work/update_order') ?>",
                                type: "POST",
                                data: {order: order,this_date:this_date},
                                dataType: 'json',
                                success: function(data) {
                                    console.log("success");
                                }
                            })
                        }
                    },
                    
                    animation: 150
                });
// <!--this script for resource sortable js end-->  
                 $.each(data.block_id, function( key, value ){
                    var el =document.getElementById(value.replace(/\s/g, ''));
                   
                    var sortable = new Sortable(el, {

                        group: {
                            name: 'shared',
                        },
                        animation: 150,
                        onEnd: function (evt) {
                            var block = evt.item.attributes.id.nodeValue;
                            var from_column = evt.from.attributes.id.nodeValue;
                            var to_column = evt.to.attributes.id.nodeValue;
                            var this_date = $('#new_assignment_date :selected').val();
                            $.ajax({
                                url: "<?= base_url('ajax/work/update_column') ?>",
                                type: "POST",
                                data: {block: block,from_column:from_column,to_column:to_column,this_date:this_date},
                                dataType: 'json',
                                success: function(data) {
                                    console.log("success");
                                }
                            })

                        },
                        store: {
                            get: function (sortable) {
                                var order = localStorage.getItem(sortable.options.group);
                                return order ? order.split('|') : [];
                            },
                            set: function (sortable) {
                                var order = sortable.toArray();

                                var this_date = $('#new_assignment_date :selected').val();
                                $.ajax({
                                    url: "<?= base_url('ajax/work/update_order') ?>",
                                    type: "POST",
                                    data: {order: order,this_date:this_date},
                                    dataType: 'json',
                                    success: function(data) {
                                        console.log("success");
                                    }
                                })
                            }
                    },
                    });  
                })
 
            }
		});
   }
    //end get data function 
    
    $('#select_location').on('change', function() {

        var column_id = $("#select_location option:selected").val();
        $("#select_location option:selected").remove();
        append_location(column_id);

    });    
    $('#add_location').on('submit', function(e) {
         e.preventDefault();
        var column_id =  $("input[name='new_location']").val();
        append_location(column_id);

    });
    function append_location(column_id){
                var html = '<div class="col-md-4"><div class="item_col"><h6 class="location_header">'+column_id+'</h6><div class="list" id="'+column_id+'"></div></div></div>';
         $('#CONTENTS').append(html); 
        // <!--this script for workers sortable js-->
                var el =document.getElementById(column_id);
                    var sortable = new Sortable(el, {
                     group: {
                        name: 'shared',
                    },
                    animation: 150,
                    onEnd: function (evt) {
                        var block = evt.item.attributes.id.nodeValue;
                        var from_column = evt.from.attributes.id.nodeValue;
                        var to_column = evt.to.attributes.id.nodeValue;
                        var this_date = $('#new_assignment_date :selected').val();
                        $.ajax({
                            url: "<?= base_url('ajax/work/update_column') ?>",
                            type: "POST",
                            data: {block: block,from_column:from_column,to_column:to_column,this_date:this_date},
                            dataType: 'json',
                            success: function(data) {
                                console.log("success");
                            }
                        })

                    },
                    store: {
                        get: function (sortable) {
                            var order = localStorage.getItem(sortable.options.group);
                            return order ? order.split('|') : [];
                        },
                        set: function (sortable) {
                            var order = sortable.toArray();
                           
                            var this_date = $('#new_assignment_date :selected').val();
                            $.ajax({
                                url: "<?= base_url('ajax/work/update_order') ?>",
                                type: "POST",
                                data: {order: order,this_date:this_date},
                                dataType: 'json',
                                success: function(data) {
                                    console.log("success");
                                }
                            })
                        }
                    },
                });
    }
})
</script>

<script>
  $('#past_assignment').on('change', function(){
      $('.past_head').css('display','block');
      $('.new_location_head').css('display','none');
      var value = $('#past_assignment option:selected').val();
    
        $.ajax({
                method:'POST',
                data:{date :value},
                url:"<?php echo base_url('get_past_assignments') ?>",
                success:function (html) {
                	$('#CONTENTS').html(html);
                }
        });
  });

  $('#repeat_last_day').on('click', function(){
     var new_assignment_date = $("#new_assignment_date option:selected").val();
     if (window.confirm('Repeat Last Day ?')){
                          
        $.ajax({
                method:'POST',
                data:{copy_to :new_assignment_date},
                url:"<?php echo base_url('repeat_last_day') ?>",
                success:function (data) {
                	
                	window.location = "<?php base_url('work') ?>";
                }
        });
     }
  });  
    
  
    $('#edit_note_btn').on('click', function(){
       $(this).css('display','none');
        $("textarea[name='edit_notes']").removeAttr('disabled');
       $('#submit_note_btn').css('display','block');
   
    });
    
    $('#note_form').on('submit', function(e){
      e.preventDefault();

        var edit_data = $("textarea[name='edit_notes']").val();
        var this_date = $('#new_assignment_date :selected').val();
        $.ajax({
            method:'POST',
            data: {edit_data:edit_data,this_date:this_date},
            url:"<?php echo base_url('work/add_new_note') ?>",
            success:function (data) {
               
               $('#edit_note_btn').css('display','block');
                $("textarea[name='edit_notes']").attr("disabled", true);
               $('#submit_note_btn').css('display','none');
            }
        });
    });

</script>


<style type="text/css">
	body.dragging, body.dragging * {
  cursor: move !important;
}

.span4{
	/*border: 1px solid gray;*/
}

.dragged {
  position: absolute;
  opacity: 0.5;
  z-index: 2000;
}

ol.example li.placeholder {
  position: relative;
  /** More li styles **/
}
ol.example li.placeholder:before {
  position: absolute;
  /** Define arrowhead **/
}
ol.vertical li {
    display: block;
    margin: 5px;
    padding: 5px;
    border: 1px solid #cccccc;
    color: #0088cc;
    background: #eeeeee;
}
.list >div {
    background: #eeeeee;
    padding: 10px;
    margin: 10px 5px;
    box-shadow: 0px 0px 0px 2px #e6e6e6;
}
    h6.location_header {
    text-align: center;
    font-weight: 700;
    text-transform: uppercase;
    padding: 10px;
    border-bottom: 1px solid #eeeeee;
    margin-bottom: 15px;
}
.item_col {
    background: white;
    padding: 10px;
    margin-bottom: 10px;
}
    .item_col span{padding:10px}
.is-dragging {
    border: 1px dashed #3b4552;
}
    .past_head h5{
        padding: 10px;
    font-weight: 700;
    }
</style>

