<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$APPLICATION->SetAdditionalCSS('/local/templates/.default/css/medicine_form_styles.css');

if ($arResult['isFormNote'] !== 'Y') {
    ?>
    <div class="contact-form">
        <div class="contact-form__head">
            <div class="contact-form__head-title">Связаться</div>
            <div class="contact-form__head-text">
                Наши сотрудники помогут выполнить подбор услуги и&nbsp;расчет цены с&nbsp;учетом ваших требований
            </div>
        </div>
        <form action="<?= POST_FORM_ACTION_URI ?>" method="POST" class="contact-form__form" enctype="multipart/form-data">
            <?= $arResult['FORM_HEADER'] ?>
            <div class="contact-form__form-inputs">
                <?php foreach ($arResult['QUESTIONS'] as $FIELD_SID => $arQuestion) {
                    if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] === 'hidden') {
                        echo $arQuestion['HTML_CODE'];
                        continue;
                    }

                    $isMessage = ($arQuestion['ID'] === 10);
                    $html = $arQuestion['HTML_CODE'];

                    if ($arQuestion['ID'] == 8) {
                        $html = preg_replace('/type="text"/', 'type="email"', $html);
                    } elseif ($arQuestion['ID'] == 9) {
                        $html = preg_replace('/type="text"/', 'type="tel"', $html);
                        $html = preg_replace(
                            '/<input([^>]*)>/',
                            '<input$1 maxlength="12" data-inputmask="\'mask\': \'+79999999999\', \'clearIncomplete\': \'true\'" x-autocompletetype="phone-full">',
                            $html
                        );
                    }

                    $html = preg_replace('/<(input|textarea)([^>]*)>/', '<$1 class="input__input"$2>', $html);

                    if ($isMessage) {
                        ?>
                        <div class="contact-form__form-message">
                            <div class="input">
                                <label class="input__label">
                                    <div class="input__label-text">
                                        <?= $arQuestion['CAPTION'] ?><?= $arQuestion['REQUIRED'] === 'Y' ? '*' : '' ?>
                                    </div>
                                    <?= $html ?>
                                    <div class="input__notification">
                                        <?= $arQuestion['ERROR'] ?? '' ?>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="input contact-form__input">
                            <label class="input__label">
                                <div class="input__label-text">
                                    <?= $arQuestion['CAPTION'] ?><?= $arQuestion['REQUIRED'] === 'Y' ? '*' : '' ?>
                                </div>
                                <?= $html ?>
                                <div class="input__notification">
                                    <?= $arQuestion['ERROR'] ?? '' ?>
                                </div>
                            </label>
                        </div>
                        <?php
                    }
                } ?>
            </div>

            <div class="contact-form__bottom">
                <div class="contact-form__bottom-policy">
                    Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных данных&raquo;.
                </div>
                <button
                    class="form-button contact-form__bottom-button"
                    type="submit"
                    name="web_form_submit"
                    value="<?= htmlspecialcharsbx(trim($arResult['arForm']['BUTTON']) ?: 'Оставить заявку') ?>"
                >
                    <div class="form-button__title">Оставить заявку</div>
                </button>
            </div>

            <?= $arResult['FORM_FOOTER'] ?>
        </form>
    </div>
    <?php
}