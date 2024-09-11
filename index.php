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
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

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

 
 
  
    .container1{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 20px;
        margin-top: 100px;
        
    }
    
    .project1 h2{
        color: #000000;
    }
    .project1 p{
        color: #000000;
    }
  
  
    .project1{
       
        padding: 5px;
        border-radius: 30px;
        width: 300px;
        text-align: center;
        transition: transform 0.3s;
       
        
    }
    .project1:hover{
        transform: translateY(-10px);
    }
    .project1 img{
    
        display: flex;
        width: 100%;
        flex-direction: row;
        align-items: center;
        border-radius: 50px;
        height: auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
  

    .project h2{
        color: #000000;
    }
    .project p{
        color: #000000;
    }
  
  
   

    @media (max-width: 768px) {
        .container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        color: white;
        
    }
    .container1{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        color: white;
        
    }
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
        <h2>PIACENTINO ALESSIA</h2>
        <p><?php echo $page_data['contenuto']; ?></p>
    </div>
    <div class="container">
       <div class="project">
              <a href="progetti.html"><img src="img/avvocato.jpg" alt="progetto1"></a>
                <h2>AVVOCATO</h2>
                <p><?php echo $page_data['contenuto']; ?></p>
            </div>
            <div class="project">
               <a href="progetti.html"><img src="img/giornalista.jpg" alt="progetto2"></a>
                <h2>GIORNALISTA</h2>
                <p><?php echo $page_data['contenuto']; ?></p>
            </div>
            <div class="project">
                <a href="progetti.html"><img src="img/webdesigner.jpg" alt="progetto3"></a>
                <h2>WEB DESIGNER</h2>
                <p><?php echo $page_data['contenuto']; ?></p>
            </div>
        </div>
        <div class="container1">
            <div class="project1">
                   <img src="img/service.jpg" alt="service1">
                     <h2>SERVIZIO1</h2>
                     <p><?php echo $page_data['contenuto']; ?></p>
                 </div>
                 <div class="project1">
                    <img src="img/service2.jpg" alt="service2">
                     <h2>SERVIZIO2</h2>
                     <p><?php echo $page_data['contenuto']; ?></p>
                 </div>
                 <div class="project1">
                     <img src="img/service3.jpg" alt="service3">
                     <h2>SERVIZIO3</h2>
                     <p><?php echo $page_data['contenuto']; ?></p>
                 </div>
                 <div class="project1">
                    <img src="img/service4.jpg" alt="service4">
                    <h2>SERVIZIO4</h2>
                    <p><?php echo $page_data['contenuto']; ?></p>
                </div>
            </div>
    
   
           

<hr>
<?php require ("footer.php");
         ?>
</body>

</html>