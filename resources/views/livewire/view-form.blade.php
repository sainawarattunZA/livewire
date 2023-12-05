<?php 


$ok =  json_encode($this->form_template->content);


?>
<div>
 {{$this->formInfolist}}
<input type="hidden" id="hide_me" value="{{$ok}}">
<input type="number" id="form_id" name="form_id" hidden/>
                <div id="fb-reader"></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="{{ URL::asset('assets/form-builder/form-render.min.js') }}"></script>
    <script>
      let bb = document.getElementById("hide_me");
      
      console.log();
        $(function() {
            // $("#form_id").val(data.id);
                    $('#fb-reader').formRender({
                        formData: bb.value
                    });
                    console.log($('#fb-reader'))
        });
    </script> 





















