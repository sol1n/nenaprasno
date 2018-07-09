<template>
    <div class="modal-overlay">
        <div class="form-success-modal">
            <div class="form-success-modal-icon">

            </div>
            <div class="form-success-modal-title">
                Спасибо
            </div>
            <div class="form-success-modal-desc">
                <p>
                    <b>Сейчас вы будете автоматически перенаправлены в личный кабинет…</b>
                </p>
            </div>
            <a :href="config.cabinetURL" class="form-success-modal-submit">В личный кабинет</a>
        </div>
    </div>
</template>

<script>
    const config = require('./../config.js');

    module.exports = {
        data() {
            return {
                config
            }
        }
    }
</script>