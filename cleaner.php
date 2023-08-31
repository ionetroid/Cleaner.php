<!DOCTYPE html>
<html>
<head>
    <title>Aplicativo de Limpeza de Disco</title>
</head>
<body>
    <h1>Aplicativo de Limpeza de Disco</h1>
    <form action="clean.php" method="post">
        <label for="fileTypes">Selecione os tipos de arquivo para limpar:</label><br>
        <input type="checkbox" name="fileTypes[]" value="tmp">Arquivos Temporários<br>
        <input type="checkbox" name="fileTypes[]" value="log">Arquivos de Log<br>
        <input type="checkbox" name="fileTypes[]" value="backup">Arquivos de Backup<br>
        <br>
        <input type="submit" value="Limpar Disco">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fileTypes = $_POST["fileTypes"];

    $cleanupMessages = [];

    foreach ($fileTypes as $fileType) {
        switch ($fileType) {
            case "tmp":
                // Lógica para limpar arquivos temporários
                $cleanupMessages[] = "Arquivos temporários foram limpos.";
                break;
            case "log":
                // Lógica para limpar arquivos de log
                $cleanupMessages[] = "Arquivos de log foram limpos.";
                break;
            case "backup":
                // Lógica para limpar arquivos de backup
                $cleanupMessages[] = "Arquivos de backup foram limpos.";
                break;
            // Adicione mais casos conforme necessário
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado da Limpeza</title>
</head>
<body>
    <h1>Resultado da Limpeza</h1>
    <?php
    if (!empty($cleanupMessages)) {
        echo "<ul>";
        foreach ($cleanupMessages as $message) {
            echo "<li>$message</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenhum tipo de arquivo selecionado para limpeza.</p>";
    }
    ?>
    <p><a href="index.php">Voltar</a></p>
</body>
</html>


