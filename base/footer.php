<link rel="stylesheet" href="base/footer.css" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<footer>
    <?php
        if(isset($_POST['email_newsletter'])) {
            $email_newsletter = $_POST['email_newsletter'];
            /*connessione al database*/
            $host="localhost";
            $db='GruppoXX';
            $user="www";
            $password="password";
            $connection_string = "host=$host dbname=$db user=$user password=$password"; /* viene inizializzata una stringa di connessione */
            $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error()); /* inizializza la connessione */

            //controllo per vedere se l'utente è già iscritto
            $newsletter_search = "SELECT email FROM newsletter WHERE email = '$email_newsletter'";
            $newsletter_search_query = pg_query($db, $newsletter_search);
            if(pg_num_rows($newsletter_search_query) > 0) {
                echo "<script>alert("."'Sei già iscritto, grazie di far parte di questa grande famiglia!'".");</script>";
            }
            else {
                $newsletter_add = "INSERT INTO newsletter (email) VALUES ($1)";
                $newsletter_add_prepare = pg_prepare($db, "newsletter_add", $newsletter_add);
                $newsletter_add_query = pg_execute($db, "newsletter_add", array($email_newsletter));
                if(!$newsletter_add_query) {
                    echo "<script>alert("."'Impossibile completare iscrizione'".");</script>";
                }
                else {
                    echo "<script>alert("."'Iscrizione completata con successo'".");</script>";
                }
            }
            pg_close($db);
        }
    ?>
    <div id="footer_container">
        <div id="upper_footer_container">
            <div id="newsletter_text">
                <h1>Iscriviti alla nostra newsletter!</h1>
                <p id="margin_less">Riceverai sconti, regali e inviti ad eventi!</p>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="newsletter_form">
                <label for="newsletter_field">e-mail: <input type="email" id="newsletter_field" name="email_newsletter" placeholder="Inserisci qui la tua e-mail" required></label>
                <input type="submit" value="REGISTRAMI" id="submit_newsletter_footer">
            </form>
        </div>
        <div id="lower_footer_container">
            <div id="trademark_footer">
                <p>
                    FLYING SAUCE&reg;<br/>
                    <span>2023-2024</span>
                </p>
            </div>
            <div id="policies_footer">
                <p>
                    LINK UTILI<br/>
                    <span><a href="informative/infoPrivacy.php">Privacy Policy</a></span><br/>
                    <span><a href="informative/condizioni.php">Membership Policy</a></span>
                </p>
            </div>
            <div id="social_footer">
                <p>SEGUICI SU</p>
                <a href="https://www.facebook.com/people/Flying-Sauce/61555762993624/"><img src="media/facebook_icon.png" alt="facebook icon" width="25px" height="25px"></a>
                <a href="https://www.instagram.com/flying.sauce/"><img src="media/instagram_icon.png" alt="instagram icon" width="25px" height="25px"></a>
            </div>
        </div>
    </div>
</footer>