<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title>13 - Conversão de Nota Para Conceito</title>

        <style>
            * {
                color: purple;
            }
        </style>
    </head>
    <body>
        <center><h2>Conversão de Nota Para Conceito</h2></center>
        <hr/>
        <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sw">
                    <div class="card-header py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="purple" class="bi bi-joystick" viewBox="0 3 16 16">
                        <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2"/>
                        <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23"/>
                        </svg>&nbsp;&nbsp;<font style="font-size: 30px; color: purple;"><b>Conversão de Nota Para Conceito</b></font>
                    </div>
                    <div class="card-body">
                        <form action="resultado.php" method="post">
                            <label class="form-label">Digite o valor da nota</label>
                            <div class="input-group has-validation">
                                <input class="form-control" type="number" name="nota" placeholder="0" max="10" step="0.1"/><br> 
                            </div>
                            <br>
                            <input type="submit" class="btn btn-success" value="Verificar"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
    </script>
</html>