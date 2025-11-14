<section class="consult consult-reverse">
    <div class="consult__wrapper">
        
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

                    <label class="consult__field">
                        <textarea rows="1" placeholder="Комментарий"></textarea>
                    </label>

                    <!-- <div class="form__group">
                        <textarea rows="3" cols="50" class="form__input" placeholder="Комментарий"></textarea>
                    </div> -->

                    <button type="submit" class="consult__button">Отправить заявку</button>

                    <div class="consult__policy">
                        Нажимая «Отправить заявку», вы соглашаетесь с Условиями использования и Политикой конфиденциальности
                    </div>
                </div>
            </form>
        </div>
        <div class="consult__image">
            <img src="<?php echo $args[ 'image' ]; ?>" alt="Консультация специалистов">
        </div>
    </div>
</section>