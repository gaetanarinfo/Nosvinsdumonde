<div id="previewImg2">
    <img class="imgPreview" width="200" data-id="" height="150" src="" alt="" style="border-radius: 16px;">
</div>
<form class="appForm">
    <div class="formGroup">
        <label for="">Nom de l'auteur</label>
        <input type="text" id="nomAuteurImage2" name="nomAuteurImage" value="<?php if (isset($configModal['nom_auteur'])) echo $configModal['nom_auteur']; ?>">
    </div>
    <div class="formGroup">
        <label for="">Lien de l'auteur (url)</label>
        <input type="text" id="profilAuteurImage2" name="profilAuteurImage" value="<?php if (isset($configModal['profil_auteur'])) echo $configModal['profil_auteur']; ?>">
    </div>
</form>