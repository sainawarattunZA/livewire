<?php

?>
<div>
    <form>

        {{ $this->form }}


        <div id="fb-editor" style="margin-top: 2rem"></div>

    </form>

    <x-filament-actions::modals />
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<!-- <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script> -->
<script src="{{ URL::asset('assets/form-builder/form-builder.min.js') }}"></script>
<script>
    jQuery(function($) {


        var container = document.getElementById('fb-editor');
        var fields = [{
                label: "Email",
                type: "text",
                subtype: "email",
                icon: "✉"
            },

        ];
        var reg = [];
        var town = [];
        var qua = [];
        var nrc = [];
        var nrc_codes = [];

        var regions = <?php echo json_encode($regions); ?>;
        var township = <?php echo json_encode($townships); ?>;
        var quarter = <?php echo json_encode($quarters); ?>;
        var nrcs = <?php echo json_encode($nrcs);?>;
        var nrc_code = <?php echo json_encode($nrc_code);?>;

        for (const key in regions) {
            reg = [...reg,
                {
                    label: regions[key],
                    value: key,

                }
            ]
        }
        for (const key in township) {
            town = [...town,
                {
                    label: township[key],
                    value: key,

                }
            ]
        }
        for (const key in quarter) {
            qua = [...qua,
                {
                    label: quarter[key],
                    value: key,

                }
            ]
        }
        for (const key in nrcs) {
            nrc = [...nrc,
                {
                    label: nrcs[key],
                    value: key,

                }
            ]
        }

        for (const key in nrc_code) {
            nrc_codes = [...nrc_codes,
                {
                    label: nrc_code[key],
                    value: key,

                }
            ]
        }

        console.log(regions);
        var inputSets = [{
                label: 'Address',
                name: 'address',
                showHeader: true,
                icon: "&#x1F3E0",
                fields: [{
                        type: 'select',
                        label: 'Region',
                        className: 'form-control',
                        values: reg,

                    },
                    {
                        type: 'select',
                        label: 'Township',
                        className: 'form-control',
                        values: town
                    },
                    {
                        type: 'select',
                        label: 'Quarter',
                        className: 'form-control',
                        values: qua
                    },
                ]
            },
            {
                label: 'NRC',
                showHeader: true,
                fields: [{
                        type: 'select',
                        label: 'NRC code',
                        className: 'form-control',
                        values: nrc_code
                    },
                    {
                        type: 'select',
                        label: 'KAKATA',
                        className: 'form-control',
                        values: nrc
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
                        "type": "number",
                        "label": "Number",
                        "className": "form-control",
                        "min": 0,
                        "max": 999999

                    },
                ]
            }
        ];

        $(document.getElementById('fb-editor')).formBuilder({
            fields: fields,
            inputSets: inputSets,
            onSave: function(evt, formData) {

                console.log(formData);

                @this.dispatch('create', {
                    message: formData
                });
            },

        });
    });
</script>
