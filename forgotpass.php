<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-mail</title>
</head>
<body>

<?php
    /* Usuario e senha do enviador de emails: 
    E-mail: logicometodo@gmail.com
    Senha : M3t@d@l@g1co#2019!
    */
        use PHPMailer\PHPMailer\PHPMailer;
        require 'vendor/autoload.php';

        function enviar($email, $mensagem){

            $mail = new PHPMailer;

            $mail->setLanguage('pt_br', '/optional/path/to/language/directory/');

            $mail->isSMTP();

            $mail->CharSet = 'UTF-8';

            $mail->Encoding = 'base64';

            $mail->SMTPDebug = 0;

            $mail->SMTPAuth = true; 

            $mail->Host = 'smtp.gmail.com';

            $mail->Port = 587;

            $mail->SMTPSecure = 'tls';

            $mail->Username = "logicometodo@gmail.com";

            $mail->Password = "M3t@d@l@g1co#2019!";

            $mail->setFrom('logicometodo@gmail.com', 'Metodologico');

            $mail->addAddress($email);

            $mail->Subject = 'Recuperação de senha';

            $mail->Body = 'Sua senha é: ' . $mensagem;

            $mail->AltBody = 'Sua senha é: ' . $mensagem;

            if (!$mail->send()) {
                echo "Falha ao recuperar senha: " . $mail->ErrorInfo;
            } else {
                echo "Mensagem enviada!";
                echo "<script> setTimeout(function () { window.history.go(-1);}, 1500); </script>";
            }

        }

        $email = $_GET['email'];

        $host = 'localhost';
        $db = 'metodologico';
        $user = 'root';
        $pass = '';

        $con = mysqli_connect($host, $user, $pass, $db) or die('Erro com a conexao com o banco !' . mysqli_error());

        $sql = "SELECT COUNT(*) FROM `user` WHERE userMail = '$email' " ;

        $result = mysqli_query($con, $sql) or die('Erro na selecao da tabela ! : ' . mysqli_error($con));
        
        $qte = mysqli_fetch_array($result);

        if($qte[0] == 0){
            echo '<script> alert("E-mail nao encontrado");
            window.history.go(-1); </script>';
        } else {
            $sql = "SELECT userPass FROM `user` WHERE userMail = '$email' " ;
            $result = mysqli_query($con, $sql) or die('Erro na selecao da tabela ! : ' . mysqli_error($con));
            $senha = mysqli_fetch_array($result);
            enviar($email, $senha[0]);
        }
    mysqli_close($con);
?>  

</body>
</html>