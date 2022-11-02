<?php

    $article = [
        'categorie' => '',
        'titre_Article'=> '',
        'image' => '',
        'description'=> ''
    ];
    $errors = [
        'article'=>''
    ];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $titre = filter_var($_POST['titre_Article'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $categorie = filter_var($_POST['categorie'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $image = filter_var($_POST['image'], FILTER_VALIDATE_URL);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        $tuileStmt = $pdo->prepare("INSERT INTO article VALUES (DEFAULT, :categorie, :titre_Article, :image, :description");
        

        // titre
        if(!$titre){
            $errors['titre_article'] = '<p class="color_red"><strong>Votre saisie contient aucun caractere</strong></p>';
            
        }elseif(strlen($titre) <= 5){
            $errors['titre_Article'] = '<p class="color_red"><strong>Votre saisie est trop courte</strong></p>';
        }

        // Categorie
        if(!$categorie){
            $errors['categorie'] = '<p class="color_red"><strong>Votre saisie contient aucun caractere</strong></p>';
            
        }elseif(strlen($categorie) <= 5){
            $errors['categorie'] = '<p class="color_red"><strong>Votre saisie est trop courte</strong></p>';
        }

        // image
        if(!$image){
            $errors['image'] = '<p class="color_red"><strong>Votre saisie contient aucun caractere</strong></p>';
            
        }elseif(strlen($image) <= 5){
            $errors['image'] = '<p class="color_red"><strong>Votre saisie est trop courte</strong></p>';
        }

        // description
        if(!$description){
            $errors['description'] = '<p class="color_red"><strong>Votre saisie contient aucun caractere</strong></p>';
            
        }elseif(strlen($description) <= 5){
            $errors['description'] = '<p class="color_red"><strong>Votre saisie est trop courte</strong></p>';
        }
        
    }

?>



<main>

    <div class="form pad-T-5-5em dpf"> 
        <div class="">
            <h2>Créer un article</h2>
            <form action="/formulaire-article.php" method="post">
                <div>
                    <label for="titre_Article">Titre</label>
                    <input type="text" name="titre_Article" id="titre_Article">
                </div>
                <div class="errors dpf-jc">
                <?php
                echo $errors['article'];
                ?>
            </div>
                <div>
                    <label for="image">Image</label>
                    <input type="text" name="image" id="image">
                </div>
                <div>
                    <label for="categorie">Categorie</label>
                    <select name="categorie" id="categorie">
                        <option value="1">Animeaux</option>
                        <option value="2">BTP</option>
                         <option value="3">Jeux de cartes</option>
                    </select>
                </div>
                <div>
                    <label for="description">Contenue</label>
                    <input type="text" name="description" id="description">
                </div>
                <button type="submit">Valider</button>
            </form>
        </div>
        
    </div>

</main>