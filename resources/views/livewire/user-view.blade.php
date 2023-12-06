<?php
    $form = json_encode($this->form->form);
?>
<div>
    <input type="hidden" id="hide_me" value="{{ $form }}">

        <div id="fb-reader"></div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="{{ URL::asset('assets/form-builder/form-render.min.js') }}"></script>
<script>

    let content = document.getElementById("hide_me").value;
    console.log(content);
    $(function() {

     $('#fb-reader').formRender({

            formData: JSON.parse(content)



        });


    });
</script>
