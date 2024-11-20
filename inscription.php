<?php
require "./models/database.php";
require "./models/CandidateRepository.php";
require "./models/DepartRepository.php";
$candidats = new CandidateRepository();
if (isset($_POST["send"])) {
    echo $candidats->createCandidate($_POST["name"], $_POST["firstName"], $_POST["email"], $_POST["password"], $_POST["confirmPassword"], $_POST["depNom"], $_POST["age"]);
    var_dump($_POST);
}
$departements = new DepartRepository();
$departementsListe = $departements->searchAll();
$listeOption = "";
for ($i = 0; $i < count($departementsListe); $i++) {
    $departementCourrent = $departementsListe[$i];
    $listeOption .= "<option value='" . $departementCourrent["id_dep"] . "'>" . $departementCourrent["Name"] . "</option>";
}




?>

<!doctype html>
<html lang="fr-fr">

<head>
    <meta charset="utf-8">
    <title>Inscription Concours festival foire</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div>
        <form action="" method="post">
            <fieldset class="center">
                <div id="inputName">
                    <label for="name" class="center">Nom</label>
                    <input type="text" placeholder="votre nom" id="name" class="center" name="name">
                </div>
                <div id="inputFirstname">
                    <label for="firstname" class="center">Prenom</label>
                    <input type="text" placeholder="votre prénom" id="firstName" class="center" name="firstName">
                </div>
                <div id="inputEmail">
                    <label for="email" class="center">email</label>
                    <input type="email" placeholder="identifiant" id="email" class="center" name="email">
                </div>
                <div id="inputPassword">
                    <label for="password" class="center">Mot de passe</label>
                    <input type="password" id="password" class="center" name="password">
                </div>

                <div id="inputConfirmPassword">
                    <label for="confirmPassword" class="center">Vérification du mot de passe</label>
                    <input type="password" id="confirmPassword" class="center" name="confirmPassword">
                </div>
                <div id="inputDepNom">
                    <label for="depNom" class="center">departement de votre domicile prinsipale</label>
                    <select name="depNom" id="depNom" class="center">
                        <option value="default"> Choisir un Département</option>
                        <?php echo $listeOption; ?>
                    </select>
                    <div id="inputAge">
                        <label for="age" class="center"></label>
                        <input type="number" name="age" id="age" class="center">
                    </div>
                    <div id="inputSubmit">
                        <input type="submit" name="send" value="Valider" id="submit" class="center">
                    </div>
        </form>

    </div>

    </fieldset>
    </div>

</body>

</html>