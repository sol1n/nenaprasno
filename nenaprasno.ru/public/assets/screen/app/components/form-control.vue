<template>
    <div class="form-control" :class="'form-control-' + index + ' ' + (control.class ? control.class : '') + ' form-control-' + control.id" v-if="display">
        <component :is="'form-' + control.type" :control="control" :value="value"></component>
    </div>
</template>

<style scoped>

</style>

<script>
    const displayCondition = require('./../helpers/displayCondition'),
        controlValidation = require('./../helpers/controlValidation'),
        formRadioButtons = require('./controls/form-radioButtons.vue'),
        formTextBlock = require('./controls/form-textBlock.vue'),
        formTextBox = require('./controls/form-textBox.vue'),
        formNumberInput = require('./controls/form-numberInput.vue'),
        formDateTimePicker = require('./controls/form-dateTimePicker.vue'),
        formCheckbox = require('./controls/form-checkBox.vue'),
        formCheckboxList = require('./controls/form-checkBoxList.vue'),
        formComboBox = require('./controls/form-comboBox.vue');

    module.exports = {
        components: {
            'form-radioButtons': formRadioButtons,
            'form-textBlock': formTextBlock,
            'form-textBox': formTextBox,
            'form-numberInput': formNumberInput,
            'form-dateTimePicker': formDateTimePicker,
            'form-checkBox': formCheckbox,
            'form-checkBoxList': formCheckboxList,
            'form-comboBox': formComboBox
        },
        props: ['control', 'index'],
        data() {
            return {
                value: null,
                valid: false,
                showErrors: false
            }
        },
        computed: {
            storeShowErrors() {
                return this.$store.state.form.data.find(ctrl => {
                    return ctrl.controlId === this.control.id;
                }).showErrors;
            },
            display() {
                let display = displayCondition(this.control, this.$store);

                this.$store.commit('setControlDisplay', {
                    id: this.control.id,
                    display: display
                });

                return display;
            }
        },
        methods: {
            fetchControl() {
                let ctrl = this.$store.state.form.data.find(ctrl => {
                    return ctrl.controlId === this.control.id;
                });

                if (ctrl) {
                    this.value = ctrl.value;
                    this.valid = ctrl.valid;
                    this.showErrors = ctrl.showErrors;
                }
            },
            validate() {
                this.valid = controlValidation(this);
            }
        },
        watch: {
            value(val, oldVal) {
                if (oldVal !== val) {
                    this.validate();

                    this.$store.commit('setControlValue', {
                        id: this.control.id,
                        value: val
                    });

                    this.showErrors = true;

                    this.$store.commit('setControlShowErrors', {
                        id: this.control.id,
                        showErrors: true
                    });
                }
            },
            storeShowErrors(val) {
                this.showErrors = val;
            }
        },
        mounted() {
            this.fetchControl();
            this.validate();
        }
    }
</script>
