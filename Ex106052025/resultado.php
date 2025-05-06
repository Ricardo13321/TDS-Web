<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['palavra'])) {
        $_SESSION['palavra'] = strtolower(trim($_POST['palavra']));
        $_SESSION['tentativas'] = 3;
    }
    $jogoencerrado = false;
    if (!isset($_SESSION['palavra'])) {
        header("Location:index.php");
        exit;
    }
    $palavra = $_SESSION['palavra'];
    $tamanho = strlen($palavra);
    $msg = '';
    if (isset($_POST['chute'])) {
        $chute = strtolower(trim($_POST['chute']));
        $_SESSION['tentativas']--;
        if ($chute === $palavra) {
            $msg = "<div class='alert alert-success'>Parabéns! Você acertou a palavra: <strong>$palavra</strong></div>";
            $jogoencerrado = true;
        } elseif ($_SESSION['tentativas'] <= 0) {
            $msg = "<div class='alert alert-danger'>Você perdeu! A palavra era: <strong>$palavra</strong></div>";
            $jogoencerrado = true;
        } else {
            $msg = "<div class='alert alert-warning'>Errado! Tentativas restantes: <strong>{$_SESSION['tentativas']}</strong></div>";
        }
        if ($jogoencerrado) {
            session_unset();
            session_destroy();
            header("Refresh: 5;URL=index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title>Palavra Secreta</title>
        
        <style>
            * {
                color: purple;
            }

            body {
                background-color: cadetblue;
            }
        </style>

    </head>
    <body>
        <center><h2>GAME WORD</h2></center>
        <hr/>
        <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sw">
                    <div class="card-header py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="purple" class="bi bi-joystick" viewBox="0 3 16 16">
                        <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2"/>
                        <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23"/>
                        </svg>&nbsp;&nbsp;<font style="font-size: 30px;"><b>PALAVRA SECRETA</b></font>
                    </div>
                    <div class="card-body">
                        <h3>Dica: A palavra tem <strong><?php echo $tamanho; ?> letras.</strong></h3>
                        <?php if(!empty($msg)) echo $msg; ?>
                        <?php if(!$jogoencerrado): ?>
                        <form action="resultado.php" method="post">
                            <label class="form-label">Digite uma palavra</label>
                            <input class="form-control" type="text" name="chute" required placeholder="Digite uma palavra"/>
                            <br/>
                            <input type="submit" class="btn btn-outline-success" value="INICIAR O JOGO"/>
                        </form>
                        <?php else: ?>
                            <a href="index.php" class="btn btn-secondary">RECOMEÇAR</a>
                            <p class="text-muted mt-2">Você será redirecionado em alguns segundos...</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>