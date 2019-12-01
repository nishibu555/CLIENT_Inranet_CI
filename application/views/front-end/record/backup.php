 <div class="col-md-3 main_col3">
            <h4>Stephenson</h4>
            <div id="RockBridge_d_1" class="list-group col">
                <p>DORM 1</p>
                    <!--droppable-panel-start-->
                <div id="cardSlots" class="ui-droppable">
                    <div title="" style="background-color:red" class="cardSlots_img"></div>
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-1" class="ui-droppable">
                            <h1>1</h1>
             <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-1'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-2" class="ui-droppable">
                            <h1>2</h1>
            <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-2'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-3" class="ui-droppable">
                            <h1>3</h1>
             <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-3'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-4" class="ui-droppable">
                            <h1>4</h1>
              <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-4'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
<!--                dorm 2-->
                
                <p>DORM 2</p>
                    <!--droppable-panel-start-->
                <div id="cardSlots" class="ui-droppable">
                    <div title="" style="background-color:red" class="cardSlots_img"></div>
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-5" class="ui-droppable">
                            <h1>5</h1>
             <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-5'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-6" class="ui-droppable">
                            <h1>6</h1>
           <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-6'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-7" class="ui-droppable">
                            <h1>7</h1>
             <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-7'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-8" class="ui-droppable">
                            <h1>8</h1>
             <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-8'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                <p>DORM 3</p>
                    <!--droppable-panel-start-->
                <div id="cardSlots" class="ui-droppable">
                    <div title="" style="background-color:red" class="cardSlots_img"></div>
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-9" class="ui-droppable">
                            <h1>9</h1>
             <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-9'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-10" class="ui-droppable">
                            <h1>10</h1>
             <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-10'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-11" class="ui-droppable">
                            <h1>11</h1>
                            <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-11'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-12" class="ui-droppable">
                            <h1>12</h1>
                            <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-12'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-13" class="ui-droppable">
                            <h1>13</h1>
                            <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-13'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-14" class="ui-droppable">
                            <h1>14</h1>
                            <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-14'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                <p>STAFF DORM</p>
                    <!--droppable-panel-start-->
                <div id="cardSlots" class="ui-droppable">
                    <div title="" style="background-color:red" class="cardSlots_img"></div>
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-15" class="ui-droppable">
                            <h1><i class="fa fa-star"></i></h1>
       <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-15'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="step-16" class="ui-droppable">
                            <h1><i class="fa fa-star"></i></h1>
             <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'step-16'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
    <!--droppable-panel-end-->
         </div> 
<!--end Stephenson--> 
        <!-- Stephenson start-->
        <div class="col-md-3 main_col3">
            <h4>Stone Mountain</h4>
            <div id="RockBridge_d_1" class="list-group col">
                <p>DORM 1</p>
                    <!--droppable-panel-start-->
                <div id="cardSlots" class="ui-droppable">
                    <div title="" style="background-color:red" class="cardSlots_img"></div>
                        <ul style="" tabindex="57" data-tabidx="57" data-id="stone-1" class="ui-droppable">
                            <h1>1</h1>
              <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'stone-1'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="stone-2" class="ui-droppable">
                            <h1>2</h1>
              <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'stone-2'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="stone-3" class="ui-droppable">
                            <h1>3</h1>
              <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'stone-3'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="stone-4" class="ui-droppable">
                            <h1>4</h1>
              <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'stone-4'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
<!--                dorm 2-->
                
                <p>DORM 2</p>
                    <!--droppable-panel-start-->
                <div id="cardSlots" class="ui-droppable">
                    <div title="" style="background-color:red" class="cardSlots_img"></div>
                        <ul style="" tabindex="57" data-tabidx="57" data-id="stone-5" class="ui-droppable">
                            <h1>5</h1>
           <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'stone-5'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="stone-6" class="ui-droppable">
                            <h1>6</h1>
              <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'stone-6'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="stone-7" class="ui-droppable">
                            <h1>7</h1>
             <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'stone-7'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="stone-8" class="ui-droppable">
                            <h1>8</h1>
                                   <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'stone-8'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
              
                <p>STAFF DORM</p>
                    <!--droppable-panel-start-->
                <div id="cardSlots" class="ui-droppable">
                    <div title="" style="background-color:red" class="cardSlots_img"></div>
                        <ul style="" tabindex="57" data-tabidx="57" data-id="stone-9" class="ui-droppable">
                            <h1><i class="fa fa-star"></i></h1>
                                   <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'stone-9'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
                        <ul style="" tabindex="57" data-tabidx="57" data-id="stone-10" class="ui-droppable">
                            <h1><i class="fa fa-star"></i></h1>
              <?php foreach($all_active_data as $value):?>
                <?php if($value->column_id == 'stone-10'):?>
              <li tabindex="<?= $value->id?>" data-tabidx="<?= $value->id?>" id="block-<?= $value->id?>" class="ui-draggable"><span id="block-<?= $value->id?>">
                    <div class="bed-assignment-item tinted" data-column="" data-id="<?= $value->personnel_id?>">
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
    <!--droppable-panel-end-->
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