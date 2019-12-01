<style>
    .ui-hover-class{
            border: 2px dashed #00adff !important;
    }

ul.ui-droppable {
    border: 2px dashed;
    height: 60px;
    border-radius: 5px;
}
    li{list-style: none;text-decoration: none}
    .bed-assignment-item {
    padding: 5px;
    margin: 5px 5px;
    border-radius: 5px;
    display: block;
    position: sticky;
    overflow: hidden;
    height: 45px;
    box-shadow: -3px 0px 0px #0f3a64;
    background: #d2d2d2;
}
.bed-assignment-item img {
    height: 35px;
    width: 35px;
    position: absolute;
    border-radius: 5px;
}
.bed-assignment-item h6 {
    position: relative;
    left: 25%;
    font-weight: 700;
    top: 0px;
    font-size: 14px;
}
.bed-assignment-item span {
    position: relative;
    left: 25%;
    top: -34px;
    font-size: 10px;
}
.col-md-3.main_col3{
    background: white !important;
    border: 7px solid #f5f5f5 !important;
    padding: 10px !important;
}
.col-md-3.main_col3 h4{
    text-align: center;
    border-bottom: 1px solid #e3e3e3;
    padding: 10px;
    font-weight: 700;
    text-transform: uppercase;
}
.col-md-3.main_col3 p{
    font-weight: 600;
    border-bottom: 2px solid #0f3a64
}
.selected{
       background: #0f3a64;
    color: white;
}
.main_col3 h1 {
    position: absolute;
    width: 10%;
    float: left;
    font-weight: 800;
    padding: 10px 0px;
    font-size: 25px;
    left: 5%;
}
    .ui-draggable-disabled{
        display: none;
    }
</style>
<div class="container">
    <div class="logo_print">
        <img height="" width=""  src="<?= base_url('assets/images/initranet-logo.png') ?>">
    </div>
    <div class="row breadcrumb_print">
        <div class="col">
            <div class="sub_nav">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?= base_url('/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active" ><a href="<?= base_url('/records')?>">Records</a></li>
                        <li class="breadcrumb-item active" ><a href="">Bed Assignment</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<!-- main section-->
    <div class="row">
        <div class="heading_print" style="width: 100%;">
            <h4>Bed Assignments</h4>
        </div>
        <div style="width: 98%;" class="print">
            <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print_icon">
        </div>
        <div class="col-md-12 bed_assignments">
        </div>
    </div>    
    
    <div class="row">
        <div class="col-md-3 main_col3">
            <div id="RockBridge_d_1" class="list-group col">
                    <!--droppable-panel-start-->
                <div id="cardSlots" class="ui-droppable" style="z-index: 500;">
                    <div title="" class="cardSlots_img">
                           
                        <?php for ($i=1; $i <=34 ; $i++) { ?>  
                            <ul style="" tabindex="57" data-tabidx="57" data-id="step-<?=  $i ?>" class="ui-droppable">
                                   <h1><?= $i ?></h1>

                                    <?php 
                                    $col_id="step-".$i; 
                                
                                    foreach ($all_active_data as  $value) { 

                                        if ($col_id== $value->column_id) {
                                        ?>
                                       
                                        <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable ui-droppable">
                                            <span id="block-<?= $value->id?>">
                                            <div class="bed-assignment-item tinted" data-column="unplaced" data-id="<?= $value->personnel_id?>">
                                                <?php if(isset($value->image)):?>
                                                    <img src="<?= base_url('assets/images/personnel/'.$value->id.'.jpg')?>" >
                                                <?php else:?>
                                                    <img src="<?= base_url('assets/images/default_profile.jpg')?>" >
                                                <?php endif;?>
                                                <h6><?= $value->fname.' '.$value->lname?></h6>
                                            <?php if ($value->rank == 'student'):?>
                                                <?php if (!empty($value->doe)):?>
                                                    <span class="student_info"><br><?= date('d-m-y',strtotime($value->doe)).' - '.date('d-m-y',strtotime($value->dog))?> (TN)&nbsp;</span>
                                                <?php endif;?>
                                            <?php endif;?>
                                            </div>
                                            </span>
                                      </li>
                                    <?php } } ?>
                             </ul>
                         <?php } ?>
                           
                    </div>
                </div>
             </div>
  
         </div> 


        <div class="col-md-3 main_col3">
            <div id="RockBridge_d_1" class="list-group col">
                    <!--droppable-panel-start-->
                <div id="cardSlots" class="ui-droppable" style="z-index: 500;">
                    <div title="" class="cardSlots_img">
                        <?php for ($i=35; $i <=67 ; $i++) { ?>
                            <ul style="" tabindex="57" data-tabidx="57"  data-id="step-<?= $i ?>" class="ui-droppable">
                                   <h1><?= $i ?></h1>

                                    <?php 
                                    $col_id="step-".$i; 
                                
                                    foreach ($all_active_data as  $value) { 
                                        if ($col_id== $value->column_id) {
                                        ?>
                                       
                                        <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable">
                                            <span id="block-<?= $value->id?>">
                                            <div class="bed-assignment-item tinted" data-column="unplaced" data-id="<?= $value->personnel_id?>">
                                                <?php if(isset($value->image)):?>
                                                    <img src="<?= base_url('assets/images/personnel/'.$value->id.'.jpg')?>" >
                                                <?php else:?>
                                                    <img src="<?= base_url('assets/images/default_profile.jpg')?>" >
                                                <?php endif;?>
                                                <h6><?= $value->fname.' '.$value->lname?></h6>
                                            <?php if ($value->rank == 'student'):?>
                                                <?php if (!empty($value->doe)):?>
                                                    <span class="student_info"><br><?= date('d-m-y',strtotime($value->doe)).' - '.date('d-m-y',strtotime($value->dog))?> (TN)&nbsp;</span>
                                                <?php endif;?>
                                            <?php endif;?>
                                            </div>
                                            </span>
                                      </li>
                                    <?php } } ?>

                            </ul>
                         <?php } ?>
                    </div>
                </div>
             </div>
  
         </div> 


        <div class="col-md-3 main_col3">
            <div id="RockBridge_d_1" class="list-group col">
                    <!--droppable-panel-start-->
                <div id="cardSlots" class="ui-droppable" style="z-index: 500;">
                    <div title="" class="cardSlots_img">
                        <?php for ($i=68; $i <=100 ; $i++) { ?>
                            <ul style="" tabindex="57" data-tabidx="57" class="ui-droppable">
                                   <h1><?= $i ?></h1>

                                    <?php 
                                    $col_id="step-".$i; 
                                
                                    foreach ($all_active_data as  $value) { 
                                        if ($col_id== $value->column_id) {
                                        ?>
                                       
                                        <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable">
                                            <span id="block-<?= $value->id?>">
                                            <div class="bed-assignment-item tinted" data-column="unplaced" data-id="<?= $value->personnel_id?>">
                                                <?php if(isset($value->image)):?>
                                                    <img src="<?= base_url('assets/images/personnel/'.$value->id.'.jpg')?>" >
                                                <?php else:?>
                                                    <img src="<?= base_url('assets/images/default_profile.jpg')?>" >
                                                <?php endif;?>
                                                <h6><?= $value->fname.' '.$value->lname?></h6>
                                            <?php if ($value->rank == 'student'):?>
                                                <?php if (!empty($value->doe)):?>
                                                    <span class="student_info"><br><?= date('d-m-y',strtotime($value->doe)).' - '.date('d-m-y',strtotime($value->dog))?> (TN)&nbsp;</span>
                                                <?php endif;?>
                                            <?php endif;?>
                                            </div>
                                            </span>
                                      </li>
                                    <?php } } ?>

                            </ul>
                         <?php } ?>
                    </div>
                </div>
             </div>
  
         </div> 


      


   
<!--end Stephenson-->
        <div class="col-md-3 main_col3">
                 <h4>UNSET</h4>
  <div id="MainList" class="list-group col">
          <div id="cardPile" class="ui-droppable">
            <ul tabindex="-1" class="ui-draggable" >
            <?php $i=1; foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'unplaced'):?>
                
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="unplaced" data-id="<?= $value->personnel_id?>">
                        <?php if(isset($value->image)):?>
                            <img src="<?= base_url('assets/images/personnel/'.$value->id.'.jpg')?>" >
                        <?php else:?>
                            <img src="<?= base_url('assets/images/default_profile.jpg')?>" >
                        <?php endif;?>
                        <h6><?= $value->fname.' '.$value->lname?></h6>
                    <?php if ($value->rank == 'student'):?>
                        <?php if (!empty($value->doe)):?>
                            <span class="student_info"><br><?= date('d-m-y',strtotime($value->doe)).' - '.date('d-m-y',strtotime($value->dog))?> (TN)&nbsp;</span>
                        <?php endif;?>
                    <?php endif;?>
                    </div>
                <?php endif;?>
                  </span></li>
            <?php endforeach;?>
              </ul>
            </div>
        </div>
    </div>
</div>


<script>
var draggable_options = {
  helper: 'clone', //produce a clone of the card when being dragged
  cursor: 'move', //cursor to show when being dragged
//  revert: 'invalid', //revert to initial position if condition in accept function is not met
    revert: "invalid",
    snap: ".main_col3",
    stack: ".ui-droppable"
 
}

function disableDragging(element){
  element.addClass("disabled") //just style the original element to be greyed out
  element.draggable(draggable_options).draggable('disable') //disable the dragging of the original element
}


function checkIfShouldAcceptTheDraggable(droppable){
  if ($(droppable).prop("tagName").toLowerCase() === "ul" && $(droppable).parent().attr("id") === "cardSlots") {
    return $(droppable).find("li").length === 0 //if it is a slot and it has no children, accept the card
  }
  return true //if it's a droppable but not a slot, accept the card with no condition
}
var set_data='';
function getTarget(event) {
  var target = $(event.target)
  var id = target.attr("id")
  set_data = target[0].dataset;
    
  if (id === "cardSlots") {
    return "cardSlots"
  } else if (id === "cardPile") {
    return "cardPile"
  } else if (target.prop("tagName").toLowerCase() === "ul" && target.parent().attr("id") === "cardSlots") {
    return "slot"
  }
}

function handleDropOutsideSlot(card, original){
  /*
    if the card came from the card pile and was dropped inside the cardPile, do nothing. Otherwise:
  */
  if (card.parent().parent().attr("id") !== "cardPile") {
    card.remove() //remove the card from the slot where it was
    original.removeClass("disabled") //activate card again
    original.draggable('enable') //enable dragging again
  }
}

function handleDropInsideSlot(droppable, ui, card, original){
  var parent = card.parent()

  if (!parent.hasClass("ui-droppable"))
    card = ui.helper.clone() //get the clone of the dropped card

  $(card).draggable(draggable_options) //make card draggable again*/
  card.attr('style', '') //remove all inline styles imposed by jquery ui
  $(droppable).append(card) //append the card to the list where it was placed
  disableDragging(original)
}

function handleDrop(droppable, event,ui){
  var target = getTarget(event)
  var card = ui.draggable
  var original = $("#cardPile").find("li[data-tabidx=" + card.attr("data-tabidx") + "]")
  if (target === "cardSlots" || target === "cardPile") {
    handleDropOutsideSlot(card, original)
  } else if (target === "slot") {
    handleDropInsideSlot(droppable, ui, card, original)
  }
}



$(document).ready(function () {

  $(".ui-draggable").draggable(draggable_options) //make cards draggable


  $(".ui-droppable").droppable({ //handle card drops
    greedy: true,
    hoverClass: "ui-hover-class",
       zIndex:10000,
    drop: function (event, ui) {
      handleDrop(this, event, ui)
        console.log(ui.draggable[0].dataset);
        console.log(set_data.id);
        var id = ui.draggable[0].dataset.tabidx;
        var column_id = set_data.id;
        $.ajax({
			url: "<?= base_url('ajax/bade_order/store') ?>",
			type: "POST",
			data: {
				id: id,column_id:column_id
			},
			dataType: 'json',
			success: function(data) { console.log('ok')}
		});
    },
    accept: function () {
      return checkIfShouldAcceptTheDraggable(this)
    }
  })
})

</script>

<script>
    $('.print_icon').on('click', function(){
         window.print();
     });
</script>

                        



                        
