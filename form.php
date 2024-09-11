<?php
session_start();

// Funzione per validare i dati di input
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = test_input($_POST['nome']);
    $email = test_input($_POST['email']);
    $tel = test_input($_POST['tel']);
    $mex = test_input($_POST['mex']);

    // Verifica del nome
    if (empty($nome)) {
        $errors['nome'] = "Il campo nome è obbligatorio.";
    }

    // Verifica del telefono
    if (empty($tel)) {
        $errors['tel'] = "Il campo telefono è obbligatorio.";
    } elseif (!preg_match('/^[0-9]+$/', $tel)) {
        $errors['tel'] = "Il numero di telefono può contenere solo cifre.";
    }

    // Verifica del messaggio
    if (empty($mex)) {
        $errors['mex'] = "Il campo messaggio è obbligatorio.";
    }

    // Verifica dell'email
    if (empty($email)) {
        $errors['email'] = "Il campo Email è obbligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Formato email non valido.";
    }

    // Se non ci sono errori, salva i dati su file JSON
    if (empty($errors)) {
        $user_data = [
            'nome' => $nome,
            'tel' => $tel,
            'mex' => $mex,
            'email' => $email,
        ];

        // File JSON dove salvare i dati
        $file = 'utenti1.json';

        // Leggi i dati esistenti, se il file non esiste crea un array vuoto
        if (file_exists($file)) {
            $json_data = file_get_contents($file);
            $users = json_decode($json_data, true);
        } else {
            $users = [];
        }

        // Aggiungi il nuovo utente all'array
        $users[] = $user_data;

        // Salva nuovamente tutti gli utenti nel file JSON
        if (file_put_contents($file, json_encode($users))) {
            $success = "I dati sono stati inviati con successo!";

            $errors['file'] = "Si è verificato un errore nel salvataggio dei dati.";
        }
    }
}
?>


    <form method="post" action="">

        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo isset($nome) ? $nome : ''; ?>"><br>
        <span class="error"><?php echo isset($errors['nome']) ? $errors['nome'] : ''; ?></span><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>"><br>
        <span class="error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span><br>

        <label for="tel">Telefono:</label><br>
        <input type="text" id="tel" name="tel" value="<?php echo isset($tel) ? $tel : ''; ?>"><br>
        <span class="error"><?php echo isset($errors['tel']) ? $errors['tel'] : ''; ?></span><br>

        <label for="mex">Messaggio:</label><br>
        <textarea id="mex" name="mex" rows="5"><?php echo isset($mex) ? $mex : ''; ?></textarea><br>
        <span class="error"><?php echo isset($errors['mex']) ? $errors['mex'] : ''; ?></span><br>
        
        <input type="submit" value="Invia">

    </form>


<?php
if (!empty($success)) {
    echo "<p class='success'>$success</p>";
}
?>
