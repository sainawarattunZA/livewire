<style>
    .addFieldWrap {
        text-align: center;
    }
</style>
<?php
$ok = json_encode($this->form_template->content);
?>
<div>

    <input type="hidden" id="hide_me" value="{{ $ok }}">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" class="form-control" wire:model="name" />


    <div id="fb-editor"></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="{{ URL::asset('assets/form-builder/form-render.min.js') }}"></script>
<script>
    $(document).ready(function() {
        let bb = document.getElementById("hide_me");
        var fbEditor = document.getElementById('fb-editor');

        var fields = [{
                label: "Email",
                type: "text",
                subtype: "email",
                icon: "✉"
            },
            {
                label: "Address",
                type: "select",
                subtype: "address",
                icon: "&#128004;"
            }
        ];
        var inputSets= [{
                    label: 'Address',
                    name: 'address', // optional - one will be generated from the label if name not supplied
                    showHeader: true, // optional - Use the label as the header for this set of inputs
                    icon: "&#x1F3E0",
                    fields: [{
                            type: 'select',
                            label: 'Region',
                            className: 'form-control',
                            values: [{
                                    label: 'Yangon',
                                    value: 'option-2',
                                    selected: false
                                },
                                {
                                    label: 'Mandalay',
                                    value: 'option-3',
                                    selected: false
                                }
                            ]
                        },
                        {
                            type: 'select',
                            label: 'Township',
                            className: 'form-control',
                            values: [{
                                    label: 'Hlaing',
                                    value: 'option-2',
                                    selected: false
                                },
                                {
                                    label: 'Alone',
                                    value: 'option-3',
                                    selected: false
                                }
                            ]
                        },
                        {
                            type: 'select',
                            label: 'Quarter',
                            className: 'form-control',
                            values: [{
                                    label: 'Ward 1',
                                    value: 'option-2',
                                    selected: false
                                },
                                {
                                    label: 'Ward 2',
                                    value: 'option-3',
                                    selected: false
                                }
                            ]
                        },
                    ]
                },
                {
                    label: 'NRC',
                    showHeader: true,
                    fields:  [{
                            type: 'select',
                            label: 'NRC code',
                            className: 'form-control',
                            values: [{
                                    label: '1/',
                                    value: 'option-2',
                                    selected: false
                                },
                                {
                                    label: '6/',
                                    value: 'option-3',
                                    selected: false
                                }
                            ]
                        },
                        {
                            type: 'select',
                            label: 'KAKATA',
                            className: 'form-control',
                            values: [{
                                    label: 'YATANA',
                                    value: 'option-2',
                                    selected: false
                                },
                                {
                                    label: 'APATA',
                                    value: 'option-3',
                                    selected: false
                                }
                            ]
                        },
                        {
                            type: 'select',
                            label: 'National Type',
                            className: 'form-control',
                            values: [{
                                    label: 'N',
                                    value: 'option-2',
                                    selected: false
                                },
                                {
                                    label: 'E',
                                    value: 'option-3',
                                    selected: false
                                },
                                {
                                    label: 'P',
                                    value: 'option-3',
                                    selected: false
                                }
                            ]
                        },
                        {
                            type: 'number',
                            label: 'Number',
                            className: 'form-control',
                            "validation": {
        "min": {
          "value": 0,
          "message": "Value must be greater than or equal to 0"
        },
        "max": {
          "value": 999999,
          "message": "Value must be less than or equal to 999999"
        }
      }
                        },
                    ]
                }
            ]
        ;
        // Function to initialize the form builder with data
        function initializeFormBuilder(data) {
            $(fbEditor).formBuilder({
                formData: data,
                fields: fields,
                inputSets: inputSets,
                onSave: function(evt, formData) {

                    @this.dispatch('update', {
                        content: formData
                    });
                },
            });
        }

        // Fetch data and initialize form builder
        var fetchDataPromise = new Promise(function(resolve) {
            // Simulate data fetching, replace this with your actual data fetching logic
            setTimeout(function() {
                var formData = JSON.parse(bb.value);
                resolve(formData);
            }, 50); // Adjust the timeout as needed
        });
        fetchDataPromise.then(function(data) {
            initializeFormBuilder(data);
        });
    });
</script>
