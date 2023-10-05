<div class="margin-top form-footer">
    <div class="container">
        <div class="row v-center">
            <div class="col-lg-6">
                <img src="/assets/images/form/form.webp" alt="У вас есть вопрос или вы хотите обсудить условия сотрудничества?" title="У вас есть вопрос или вы хотите обсудить условия сотрудничества?">
            </div>
            <div class="col-lg-6">
                <h2 class="mt-4 mt-lg-0">
                    У вас есть вопрос или вы хотите обсудить условия сотрудничества?
                </h2>
                <p class="mt-4 mb-5">
                    Просто заполните эту короткую форму обратной связи и наш менеджер свяжется с Вами
                </p>
                <form class="ajax-form" id="ajax-form-footer" onsubmit="ym(95006354,'reachGoal','send')">
                    <div class="form-body">
                        <div class="form-group-input">
                            <div class="success" id="success-footer">Отправлено!</div>
                            <div class="error" id="error-footer">Что-то пошло не так :(</div>
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
                                <div class="col-12">
                                    <button class="button button-green ms-lg-auto" title="Отправить">
                                        Отправить </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden Required Fields -->
                    <input type="hidden" name="project_name" value="menzer.ru">
                    <input type="hidden" name="admin_email" value="so-v-ik@yandex.ru">
                    <input type="hidden" name="form_subject" value="Заявка из формы в футере">
                    <input type="hidden" name="p_key" value="...">
                    <!-- END Hidden Required Fields -->

                </form>
            </div>
        </div>
    </div>
</div>