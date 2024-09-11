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

$page = isset($_GET['page']) ? $_GET['page'] : 'aboutme' ;



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
       
// Richiamo la pagina del menu

<?php require ('menu.php');

?>

// per ogni titolo e paragrafo ho fatto una chiamata nel file json
</header>
<section class="sfondo">
  <div class="testo">
      <h1><?php echo $page_data['primo']; ?></h1>
      <p><?php echo $page_data['paragrafo']; ?></p>
  </div>
  </section>
<div class="profilo">
    <h2><?php echo $page_data['titolo']; ?></h2>
</div>
<div class="container">
    <div class="project">
        <a href="progettosingolo.html"><img src="img/webdesigner.jpg" alt="portfolio"></a>
        <h3><?php echo $page_data['titolo']; ?></h3>
        <p><?php echo $page_data['contenuto']; ?></p>
    </div>
    <div class="project">
            <a href="progettosingolo.html"><img src="img/aboutme.jpg" alt="portfolio"></a>
        <h3><?php echo $page_data['titolo']; ?></h3>
        <p><?php echo $page_data['contenuto']; ?></p>
</div>
<div class="project">
            <img src="img/hobbi1.jpg" alt="hobbi">
            <h3><?php echo $page_data['titolo2']; ?></h3>
            <p><?php echo $page_data['contenuto']; ?></p>
            </div>
            <div class="project">
               <img src="img/hobbi2.jpg" alt="portfolio">
            <h3><?php echo $page_data['titolo2']; ?></h3>
            <p><?php echo $page_data['contenuto']; ?></p>
    </div>

</div>

// richiamo la pagina del form
<?php include 'form.php';
?>    
 
 // richiamo la pagina del footer   
    <hr>
    <?php require ("footer.php");
         ?>

</body>

</html>