<div>
    <form>

        {{ $this->form }}

        <div id="fb-editor" style="margin-top: 2rem"></div>
    </form>

    <x-filament-actions::modals />
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script>
    jQuery(function($) {


        $(document.getElementById('fb-editor')).formBuilder({
            onSave: function(evt, formData) {

                console.log(formData);

                @this.dispatch('create', {
                    message: formData
                });


                // @this.data = formData;
                // saveForm(formData);
            },
        });
    });
</script>
