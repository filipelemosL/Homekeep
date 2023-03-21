<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles\login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@800&family=League+Spartan:wght@600&display=swap" rel="stylesheet">
    <title>Homekeep</title>
</head>
<body>
    <section>
        <h1 class='title'>HOMEKEEP</h1>
        <form class='forms' method='post'>
            <?php echo'<input placeholder=\'Email\' id=\'nome\' class=\'formStyle\' type=\'text\' name=\'email\' oninput=\'validarForm()\' required>' ?>
            <?php echo'<input placeholder=\'Senha\' id=\'senha\' class=\'formStyle\' type=\'password\' name=\'password\' oninput=\'validarForm()\' required>' ?>
            <?php echo'<input class=\'subButton\' type=\'submit\' disabled>'?>
        </form>
    </section>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        function validarEmail($email) {
            return preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email);
        }

        function validarSenha($senha) {
            return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $senha);
        }

        function validarForm() {
            $email = $_POST['email'];
            $senha = $_POST['password'];
            echo "<script>document.getElementsByClassName('subButton')[0].disabled = " . (validarEmail($email) && validarSenha($senha) ? 'false' : 'true') . ";</script>";
        }

        validarForm();
    }
    ?>
</body>
</html>