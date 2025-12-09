<section class="consult">
    <div class="consult__wrapper">
        <div class="consult__image">
            <img src="<?php echo $args[ 'image' ]; ?>" alt="Консультация специалистов">
        </div>
        <div class="consult__content">
            <p class="consult__text">
                <?php 
                    echo $args[ 'title' ]; 
                ?>
            </p>
            <form class="consult__form" action="#" method="post">
                <div class="consult__fields">
                    <label class="consult__field">
                        <input type="text" name="name" placeholder="Имя" required>
                    </label>

                    <label class="consult__field">
                        <input type="tel" name="phone" placeholder="Телефон" required>
                    </label>

                    <label class="consult__field">
                        <input type="email" name="email" placeholder="Email" required>
                    </label>

                    <button type="submit" class="consult__button">Отправить заявку</button>

                    <div class="consult__policy">
                        Нажимая «Отправить заявку», вы принимаете условия <a href="<?php echo get_privacy_policy_url(); ?>">Политики конфиденциальности</a> и даете согласие на обработку ваших персональных данных
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>