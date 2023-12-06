<?php

    $data = json_encode($this->form_template->content);

?>
<div>
    {{ $this->formInfolist }}
    <input type="hidden" id="hide_me" value="{{ $data }}">
    <form id="form">
        <div id="fb-reader"></div>
        <input type="submit" value="Save" class="btn btn-success" />

    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="{{ URL::asset('assets/form-builder/form-render.min.js') }}"></script>
<script>
    let form = document.getElementById("form");
    var rendered_form;


    let data = document.getElementById("hide_me");
    $(function() {
        rendered_form = $('#fb-reader').formRender({
            formData: data.value,
        });


    });


    form.addEventListener('submit', function(e) {
        e.preventDefault();
        console.log(JSON.stringify(rendered_form.userData));
        @this.dispatch('create', {
            message: JSON.stringify(rendered_form.userData)
        });

    })
</script>
