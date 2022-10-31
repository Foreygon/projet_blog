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
        $article = filter_var($_POST['article'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $blog = $pdo->prepare("INSERT INTO article VALUES (DEFAULT, :categorie, :titre_Article, :image, :description");

        if(!$article){
            $errors['article'] = '<p class="color_red"><strong>Votre saisie contient aucun caractere</strong></p>';
        }elseif(strlen($article) <= 5){
            $errors['article'] = '<p class="color_red"><strong>Votre saisie est trop courte</strong></p>';
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
                        <option value="1">1</option>
                        <option value="2">2</option>
                         <option value="3">3</option>
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