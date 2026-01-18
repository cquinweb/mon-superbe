<?php
// Inicializar variables
$resultado = "";

// Verificar si se presionó el botón "Calculer"
if(isset($_POST['calculer'])){
    // Obtener los valores del formulario
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $operacion = $_POST['operacion'];

    // Realizar la operación según la selección
    switch($operacion){
        case 'addition':
            $resultado = $numero1 + $numero2;
            break;

        case 'soustraction':
            $resultado = $numero1 - $numero2;
            break;

        case 'multiplication':
            $resultado = $numero1 * $numero2;
            break;

        case 'division':
            if($numero2 != 0){
                $resultado = $numero1 / $numero2;
            } else {
                $resultado = "Erreur : Division par zéro!";
            }
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculatrice PHP</title>
</head>
<body>
<h1>Calculatrice</h1>

<form method="POST" action="">

    <input type="number" name="numero1"  step="any" required>
    <br><br>


    <input type="number" name="numero2" step="any" required>
    <br><br>


    <select name="operacion">
        <option value="addition">+</option>
        <option value="soustraction">-</option>
        <option value="multiplication">*</option>
        <option value="division">÷</option>
    </select>
    <br><br>

    <button type="submit" name="calculer">⏎</button>
    <br><br>

//readonly esta escrito para que no se pueda escribir encima
    <input type="text" value="<?php echo $resultado; ?>" readonly>
</form>

</body>
</html>