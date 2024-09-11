<?php include 'menu.php';
?>

<?php
// Funzione per leggere e decodificare il file JSON
function get_page_data($page) {
    $file = 'pagine.json';  // Il percorso del file JSON

    if (file_exists($file)) {
        $json_data = file_get_contents($file);  // Leggi il file JSON
        $pages = json_decode($json_data, true);  // Decodifica il JSON in array associativo

        // Se esiste la pagina richiesta nel JSON, restituisci i dati
        if (isset($pages[$page])) {
            return $pages[$page];
        } else {
            return [
                'title' => 'Pagina non trovata',
                'content' => 'Spiacenti, la pagina che stai cercando non esiste.'
            ];
        }
    } else {
        // Se il file JSON non esiste, restituisci un messaggio di errore
        return [
            'title' => 'Errore',
            'content' => 'Il file di dati non esiste.'
        ];
    }
}

// Imposta la pagina 
$page = isset($_GET['page']) ? $_GET['page'] : 'portfolio';

// Ottieni i dati della pagina dal file JSON
$page_data = get_page_data($page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="style/main.css" rel="stylesheet" type="text/css">
    <link href="style/form.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="img/icon.png">
    <title><?php echo $page_data['title']; ?></title>
    <style>
       
       .sfondo {
  background: url(img/sfondo.jpg) no-repeat center center/cover;
  height: 400px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  text-align: center;
}
.testo {
  font-size: 20px;
  padding: 20px;
  border-radius: 10px;
}


  
   
   
</style>
</head>
<body>
<header>
       



</header>
<section class="sfondo">
    <div class="testo">
        <h1><?php echo $page_data['primo']; ?></h1>
        <p><?php echo $page_data['paragrafo']; ?></p>
    </div>
    </section>
    <div class="profilo">
    <h2>PORTFOLIO</h2>
</div>
<div class="container">
        <div class="project">
            <img src="img/avvocato.jpg" alt="avvocato">
            <h3>AVVOCATO</h3>
            <p><?php echo $page_data['contenuto']; ?></p>
        </div>

        <div class="project">
            <img src="img/giornalista.jpg" alt="giornalista">
            <h3>GIORNALISTA</h3>
            <p><?php echo $page_data['contenuto']; ?></p>
        </div>
        <div class="project">
            <a href="progettosingolo.html"><img src="img/webdesigner.jpg" alt="webdesigner"></a>
            <h3>WEB DESIGNER</h3>
            <p><?php echo $page_data['contenuto']; ?></p>
        </div>
        <div class="project">
            <img src="img/front.jpg" alt="frontend">
            <h3>FRONT END DEVELOPER</h3>
            <p><?php echo $page_data['contenuto']; ?></p>
        </div>
        <div class="project">
            <img src="img/social.jpg" alt="socialmedia">
            <h3>SOCIAL MEDIA MANAGER</h3>
            <p><?php echo $page_data['contenuto']; ?></p>
        </div>
    </div>
<?php include 'form.php';
?>
<hr>

<?php require ("footer.php");
         ?>
</body>

</html>


        





