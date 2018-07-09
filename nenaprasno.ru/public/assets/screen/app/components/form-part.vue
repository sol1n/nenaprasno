<template>
    <div class="form-part" :class="'form-part-' + index + ' ' + (part.class ? part.class : '')" v-if="display">
        <div class="form-part-title">
            {{ part.title }}
        </div>

        <div class="form-part-desc" v-if="part.description">{{ part.description }}</div>

        <form-section v-for="(section, index) in part.sections" :section="section" :index="index"></form-section>

        <div class="form-part-buttons" v-if="current != 0 || current != totalParts-1 || current === totalParts-1">
            <button class="form-part-button form-part-button-prev" v-if="current != 0" @click.prevent="changeStep('prev', false)">Назад</button>
            <button class="form-part-button form-part-button-next" v-if="current != totalParts-1" @click.prevent="changeStep('next', true)">Далее</button>
            <button class="form-part-button form-part-button-send" v-if="current === totalParts-1" @click.prevent="submitForm">Отправить</button>
        </div>
    </div>
</template>

<style scoped>

</style>

<script>
    const config = require('../config'),
        displayCondition = require('../helpers/displayCondition'),
        pageValidation = require('../helpers/pageValidation'),
        formSubmit = require('../helpers/formSubmit'),
        formSection = require('./form-section.vue');

    module.exports = {
        props: ['part', 'index'],
        components: {
            'form-section': formSection
        },
        computed: {
            current() {
                return this.$store.state.current;
            },
            totalParts() {
                return this.$store.state.totalParts;
            },
            totalSections() {
                return this.$store.state.totalSections;
            },
            display() {
                return displayCondition(this.part, this.$store);
            }
        },
        methods: {
            changeStep(action, validate) {
                if ( (validate && pageValidation(this.part, this.$store)) || validate == false ) {
                    this.$store.dispatch('changeStep', action);
                    // Scrolling to top of next page
                    this.$root.$el.scrollIntoView(true);
                }
            },
            submitForm() {
                if ( pageValidation(this.part, this.$store) ) {

                    this.$store.commit('showSpinner');

                    formSubmit(this)
                        .then(response => {
                            alert(config.messages.successFormPost);

                            // Scrolling to top of next page
                            this.$root.$el.scrollIntoView(true);

                            if (!this.$store.state.user || this.$store.state.user.isAnonymous) {
                                this.$store.commit('setSubmitAuthModal', true);
                            }

                            this.$store.commit('setFormResponse', response.data);

                            // Go to form result page
                            this.$store.dispatch('changeStep', 'next');

                            this.$store.commit('hideSpinner');

                            if (!this.$store.state.user.isAnonymous) {
                                this.$store.commit('setSuccessModal', true);

                                setTimeout(() => {
                                    this.$store.state.form = {};
                                    this.$store.state.user = {};
                                    this.$store.state.userProfile = {};
                                    window.sessionStorage.clear();
                                }, 2000);

                                setTimeout(() => {
                                    window.location.replace(config.cabinetURL);
                                }, 5000);
                            }
                        })
                        .catch(error => {
                            alert(config.messages.errorSendingFormResults);
                            this.$store.commit('hideSpinner');
                        });
                }
            }
        }
    }
</script>
