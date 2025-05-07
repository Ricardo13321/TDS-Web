<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title>Conversor de Temperatura</title>
    </head>
    <body>
        <center><h2>Calculatrom</h2></center>
        <hr/>
        <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sw">
                    <div class="card-header py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-ui-checks" viewBox="0 0 16 16">
                        <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zM2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zm.854-3.646a.5.5 0 0 1-.708 0l-1-1a.5.5 0 1 1 .708-.708l.646.647 1.646-1.647a.5.5 0 1 1 .708.708zm0 8a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647 1.646-1.647a.5.5 0 0 1 .708.708zM7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                        </svg>&nbsp;&nbsp;<font style="font-size: 30px;"><b>Conversor de Celsius para Fahrenheit</b></font>
                    </div>
                    <div class="card-body">
                        <?php
                            $celsius = $_POST['celsius'];
                            if ($celsius > 35) {
                                echo '<img src="https://i2.wp.com/judao.com.br/wp-content/uploads/2019/07/DogOnFire.jpeg?fit=1280%2C640&ssl=1" class="card-img-top" height="500">';
                            } elseif ($celsius < 20) {
                                echo '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiFZuQHe2u3XJVJ2geBWYKxOxocpkyXxibaw&s" class="card-img-top" height="500">';
                            } else {
                                echo '<img src="https://ogimg.infoglobo.com.br/in/25339584-79f-886/FT1086A/laika-labradora-praia.jpg" class="card-img-top" height="500">';
                            }
                            echo "<br/> A conversão de $celsius celsius em fahrenheit é: <b>".($celsius*1.8+32)."</b><br/>";
                            echo "<br/><a href='index.php' class='btn btn-outline-success' tabindex='-1' role='button'>VOLTAR</a>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>