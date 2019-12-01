<div class="container">
    <div class="register-form-list">
        <ul id="nav" class="nav nav-tabs" style="">
            <li><a class="nav-item nav-link active" href="<?php echo base_url()?>register_form_1" id="p1">Page 1</a></li>
            <li><a class="nav-item nav-link" href="<?php echo base_url()?>register_form_2"  id="p2" >Page 2</a></li>
            <li><a class="nav-item nav-link" href="<?php echo base_url()?>register_form_3"  id="p3">Page 3</a></li>
            <li><a class="nav-item nav-link" href="<?php echo base_url()?>register_form_4"  id="p4">Page 4</a></li>
            <li><a class="nav-item nav-link" href="<?php echo base_url()?>register_form_5"  id="p5">Page 5</a></li>
            <li><a class="nav-item nav-link" href="<?php echo base_url()?>register_form_6"  id="p6">Page 6</a></li>
            <li><a class="nav-item nav-link" href="<?php echo base_url()?>register_form_7"  id="p7">Page 7</a></li>
            <li><a class="nav-item nav-link" href="<?php echo base_url()?>register_form_8"  id="p8">Page 8</a></li>
        </ul>

        <div id="ajax-content"></div>
        
        <input type="hidden" id="flag" value="">
        
    </div>
</div>



 <script>
 
    function changeNavStatus(flag){
    
        for(var i=1; i<=flag+1; i++){
            $("#p"+i).removeClass('disabled'); 
        }
    }
    
    
    $(document).ready(function() {
           
           $("#p2").addClass('disabled');
           $("#p3").addClass('disabled');
           $("#p4").addClass('disabled');
           $("#p5").addClass('disabled');
           $("#p6").addClass('disabled');
           $("#p7").addClass('disabled');
           $("#p8").addClass('disabled');
       
       
        $("#nav li a").click(function() {

            $("#nav li a").removeClass('active');
            $(this).addClass('active');

            $.ajax({ url: this.href, success: function(html) {
                    $("#ajax-content").empty().append(html);
                }
            });
            return false;
        });

        $.ajax({ url: 'register_form_1', success: function(html) {
                $("#ajax-content").empty().append(html);
            }
        });
    });

 </script>