
<form action="thanks.php" method="post">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="lastname" name="user_lastname">
    </div>
    <div>
        <label for="prenom">Prénom :</label>
        <input type="text" id="firstname" name="user_firstname">
    </div>
    <div>
        <label for="courriel">Courriel :</label>
        <input type="email" id="email" name="user_email">
    </div>
    <div>
        <label for="telephone">Téléphone :</label>
        <input type="text" id="phone" name="user_phone">
    </div>
    <div>
        <label for="sujet">Choisir un sujet :</label>
        <select id="subject" name="user_subject">
            <option value="france">France</option>
            <option value="international">International</option>
            <option value="economie">Economie</option>
            <option value="sciencesEtTechnologies">Sciences Et Technologies</option>
            <option value="divertissement">Divertissement</option>
            <option value="sports">Sports</option>
            <option value="santé">Santé</option>
        </select>
    </div>
    <div>
        <label for="message">Message :</label>
        <textarea id="message" name="user_message"></textarea>
    </div>
    <div class="button">
        <button type="submit">Envoyer votre message</button>
    </div>
</form>