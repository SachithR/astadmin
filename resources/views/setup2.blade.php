@include('header')
<style type="text/css">
.popover-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
/*  margin-left: 100px;*/
  margin-top: -50px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                {{csrf_field()}}
                <div class="box-primary">
                    <!-- /.box-header -->
                    <div class="box box-primary">
                        <div class="box-header with-border" id="heders">
                            <div class="col-md-10">
                                <h3 class="box-title" id="btnborder">Setup Queues.conf</h3>
                            </div>

                        </div>
                        <div class="box-header with-border" id="heders">
                            
                            <div class="col-md-6">
                                <?php $i=1;$n=0; foreach($MainArray as $key=>$val){ ?>
                                    <div class="popover-content" id="popover<?php echo $i?>" style="color:red">Delete Context</div>
                                    
                                    <h5>
                                        <strong><?php echo $i ?>.&nbsp;<?php echo $key ?></strong>&nbsp;
                                        <a href="#" class="popover-trigger" onmouseover="showPopover(<?php echo $i?>)" onmouseout="hidePopover(<?php echo $i?>)">
                                            <span onclick="delete_context_queue('<?php echo $key ?>')" class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </h5>
                                    
    
                                        <div class="row" >
                                            
                                            <div class="col-md-12">
                                                
                                                <pre class="col-md-7"><?php echo $val ?></pre>
                                                <?php if(strpos($val, 'musicclass') !== false){ ?> <!-- MUSIC -->
                                                            <label class="col-md-1">QMusic</label>
                                                            
                                                            <input type="text" id="newM<?php echo $i?>" name="newM<?php echo $i?>" class="col-md-2" style="height: 22px;margin-right: 6px;">
                                                            
                                                            <button type="button" class="col-md-1 btn btn-primary btn-flat" onclick="change_music(<?php echo $i?>)" style="padding:0px;height: 22px;">Save</button>

                                                            <input type="hidden" name="line_num<?php echo $i?>" id="line_num<?php echo $i?>" value="<?php echo $music_lines[$n]?>">
                                                <?php $n++; } ?>
                                            </div>
                                        </div>
                                    <hr>
                                <?php $i++; } ?>
                            </div>
                            <div class="col-md-3">
                                <h5><strong>Add New Context</strong></h5>
                                <textarea id="context_text" name="context_text" cols="45" rows="6"></textarea>
                                <br>
                                <button type="button" class="btn btn-primary btn-flat" onclick="add_context_queue()" style="padding:0px;height: 22px;padding-left: 10px;padding-right: 10px;">Add</button>

                            </div>
                            <div  class="col-md-3">
                                <h5><strong>Example:</strong></h5>
                                <pre>[general]<br>static = yes<br>writeprotect = no<br>autofallthrouth= yes<br>clearglobalvars=no<br>priortyjumping=no</pre>    
                            </div>
                            
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
    });

    function showPopover(i) {
      var popover = document.getElementById("popover"+i);
      popover.style.display = "block";
    }

    function hidePopover(i) {
      var popover = document.getElementById("popover"+i);
      popover.style.display = "none";
    }

    function change_music(i){
        var newM = document.getElementById("newM"+i).value;
        var line_num = document.getElementById("line_num"+i).value;

        if(newM){

                    $.ajax({
                        url: "{{ url('change_music') }}",
                        type: 'GET',
                        data: {
                            newM: newM,
                            line_num: line_num
                        },
                        success: function (response) {

                            if(response === 'success'){

                                    alert('Update Success!');
                                    location.reload();

                            }else{
                                    alert('Error Occurred!');
                                    location.reload();
                                
                            }
                        }
                    });

        }else{
            alert('Please Enter Music File name!');
        }
    }

    function add_context_queue(){
        var context_text = document.getElementById("context_text").value;

        if(context_text){

                    $.ajax({
                        url: "{{ url('add_context_queue') }}",
                        type: 'GET',
                        data: {
                            context_text: context_text
                        },
                        success: function (response) {


                            if(response === 'success'){

                                    alert('Added Successfully!');
                                    location.reload();

                            }else{
                                    alert('Error Occurred!');
                                    location.reload();
                                
                            }
                        }
                    });

        }else{
            alert('Please Enter Context!');
        }
    }

    function delete_context_queue(context){

        if (confirm("Do you want delete this context?") == true) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                      });

                    $.ajax({
                        url: "{{ url('delete_context_queue') }}",
                        type: 'POST',
                        data: {
                            context: context
                        },
                        success: function (response) {

                            console.log(response);

                            if(response === 'success'){

                                    alert('Deleted Successfully!');
                                    location.reload();

                            }else{
                                    alert('Error Occurred!');
                                    location.reload();
                                
                            }
                        }
                    });

        }

    }
    
   
</script>

<script>
    $.datetimepicker.setLocale('en');
    $('.some_class').datetimepicker({
        format: 'Y-m-d H:i:s'
    });

    $('#datetimepicker_dark').datetimepicker({theme: 'dark'})

</script>
@include('footer')

</body>
</html>




















