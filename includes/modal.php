<div class="modal-overlay modal-overlay" id="modal-overlay">
    <div class="modal-body">
        <form class="ajax-form" id="ajax-form-modal" onsubmit="ym(95006354,'reachGoal','send')">
            <div class="form-body">
                <div class="form-group-input">
                    <div class="module_form-heading d-flex justify-content-between">
                        <h3 class="mod_form-header ">Заказать сейчас</h3>
                        <svg width="32" height="32" class="cross">
                            <use xlink:href="/assets/images/sprite.svg#cross"></use>
                        </svg>
                    </div>
                    <div class="success" id="success-modal">Отправлено!</div>
                    <div class="error" id="error-modal">Что-то пошло не так :(</div>
                    <div class="firstLine-input js-ym-forma row v-center">
                        <div class="col-12 my-3">
                            <input class="form-input phone-mask" type="tel" name="Телефон" placeholder="+7 (999) 999-99-99" required="">
                        </div>
                        <div class="col-12 my-3">
                            <input class="form-input" type="text" name="Имя" placeholder="Ваше имя" required="">
                        </div>
                        <div class="col-12 my-3">
                            <div id="recaptcha_1"></div>
                        </div>
                        <div class="col-12 confidentiality my-3">
                            <input type="checkbox" class="custom-checkbox" id="checkbox" name="checkbox" value="yes" required="" checked="true">
                            <label for="checkbox">
                                <span>
                                    Нажимая кнопку «Записаться» вы принимаете <a href="/assets/confidentiality.pdf" rel="noreferrer noopener" target="_blank" title="условия конфиденциальности">условия конфиденциальности
                                    </a>
                                </span>
                            </label>
                        </div>
                        <div class="col-12 mt-4">
                            <button class="button button-green w-100 mw-100" title="Заказать сейчас" onsubmit="ym(95006354,'reachGoal','send')">
                                Заказать сейчас
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hidden Required Fields -->
            <input type="hidden" name="project_name" value="menzer.ru">
            <input type="hidden" name="admin_email" value="so-v-ik@yandex.ru">
            <input type="hidden" name="form_subject" class="formSubjectHidden" value="Заявка из формы в модальном окне">
            <input type="hidden" name="p_key" value="...">
            <!-- End Hidden Required Fields -->
        </form>
    </div>
</div>