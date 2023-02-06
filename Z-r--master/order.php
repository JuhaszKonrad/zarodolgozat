<?php include('partials-frontend/menu.php')?>
    <section class="order">
        <div class="container">

            <h2 class="text-center">Töltse ki adatait!</h2>

            <form action="#" class="order">
                <fieldset>
                    <legend>Választott Étel</legend>

                    <div class="food-menu-img">
                        <img src="képek/pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h3>Songoku Pizza</h3>
                        <p class="food-ar">2000Ft</p>
                        <p class="food-leiras">Paradicsomos alap, Sonka, Gomba, Kukorica, Sajt</p> <br>
                        <div class="order-label">Darab</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>

                    </div>

                </fieldset>

                <fieldset>
                    <legend>Szállítási Adatok</legend>
                    <div class="order-label">Teljes Név</div>
                    <input type="text" name="full-name" placeholder="Teljes Név" class="input-responsive"
                        required>

                    <div class="order-label">Telefonszám</div>
                    <input type="tel" name="contact" placeholder="+36201234567" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="pelda@gmail.com" class="input-responsive"
                        required>

                    <div class="order-label">Cím</div>
                    <textarea name="address" rows="5" placeholder="Cím" class="input-responsive"
                        required></textarea>

                    <input type="submit" name="submit" value="Rendelés Leadása" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>


    <?php include('partials-frontend/footer.php')?>