<?php 
    session_start();
    $emails = json_decode(file_get_contents('email.json'), true);
    $senhas = json_decode(file_get_contents('senha.json'), true);
    $nomes = json_decode(file_get_contents('nome.json'), true);
    $generos = json_decode(file_get_contents('genero.json'), true);
    $id = array_search($_SESSION['usuario'], $emails);
    $_SESSION['nomes'] = $nomes;
    $_SESSION['emails'] = $emails;
    $_SESSION['generos'] = $generos;
    $_SESSION['senhas'] = $senhas;
    
?>
<!-- link para os botões customizados https://uiverse.io/buttons?page=1-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Ajuda o navegador a entender que a linguagem do site é pt-br -->
    <meta http-equiv="content-language" content="pt-br">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>PHP / Array</title>
    <link rel="shortcut icon" type="image/jpg" href="/favicon.jpg"/>
</head>
<style>
    *{

    }

    body{
        background-color: rgb(100, 0, 131);
        color:rgb(255, 255, 255);
        cursor: auto;
    }

    .card-header {
        color:rgb(100, 0, 131);
    }

    .btn-purple {
            background: rgb(207, 48, 255);
            color: whitesmoke;
    }
    .btn-purple:hover {
            border: 1px solid rgb(207, 48, 255);
            background: rgb(100, 0, 131);
    }

    nav a {
        color: white;
        text-decoration: none;
    }

    .user {
        float: right;
        margin-right: 10px;
    }

/* From Uiverse.io by marcelodolza */ 
.button {
  --white: #ffe7ff;
  --purple-100: #f4b1fd;
  --purple-200: #d190ff;
  --purple-300: #c389f2;
  --purple-400: #8e26e2;
  --purple-500: #5e2b83;
  --radius: 18px;

  border-radius: var(--radius);
  outline: none;
  cursor: pointer;
  font-size: 23px;
  font-family: Arial;
  background: transparent;
  letter-spacing: -1px;
  border: 0;
  position: relative;
  width: 220px;
  height: 80px;
  transform: rotate(353deg) skewX(4deg);
}

.bg {
  position: absolute;
  inset: 0;
  border-radius: inherit;
  filter: blur(1px);
}
.bg::before,
.bg::after {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: calc(var(--radius) * 1.1);
  background: var(--purple-500);
}
.bg::before {
  filter: blur(5px);
  transition: all 0.3s ease;
  box-shadow:
    -7px 6px 0 0 rgb(115 75 155 / 40%),
    -14px 12px 0 0 rgb(115 75 155 / 30%),
    -21px 18px 4px 0 rgb(115 75 155 / 25%),
    -28px 24px 8px 0 rgb(115 75 155 / 15%),
    -35px 30px 12px 0 rgb(115 75 155 / 12%),
    -42px 36px 16px 0 rgb(115 75 155 / 8%),
    -56px 42px 20px 0 rgb(115 75 155 / 5%);
}

.wrap {
  border-radius: inherit;
  overflow: hidden;
  height: 100%;
  transform: translate(6px, -6px);
  padding: 3px;
  background: linear-gradient(
    to bottom,
    var(--purple-100) 0%,
    var(--purple-400) 100%
  );
  position: relative;
  transition: all 0.3s ease;
}

.outline {
  position: absolute;
  overflow: hidden;
  inset: 0;
  opacity: 0;
  outline: none;
  border-radius: inherit;
  transition: all 0.4s ease;
}
.outline::before {
  content: "";
  position: absolute;
  inset: 2px;
  width: 120px;
  height: 300px;
  margin: auto;
  background: linear-gradient(
    to right,
    transparent 0%,
    white 50%,
    transparent 100%
  );
  animation: spin 3s linear infinite;
  animation-play-state: paused;
}

.content {
  pointer-events: none;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1;
  position: relative;
  height: 100%;
  gap: 16px;
  border-radius: calc(var(--radius) * 0.85);
  font-weight: 600;
  transition: all 0.3s ease;
  background: linear-gradient(
    to bottom,
    var(--purple-300) 0%,
    var(--purple-400) 100%
  );
  box-shadow:
    inset -2px 12px 11px -5px var(--purple-200),
    inset 1px -3px 11px 0px rgb(0 0 0 / 35%);
}
.content::before {
  content: "";
  inset: 0;
  position: absolute;
  z-index: 10;
  width: 80%;
  top: 45%;
  bottom: 35%;
  opacity: 0.7;
  margin: auto;
  background: linear-gradient(to bottom, transparent, var(--purple-400));
  filter: brightness(1.3) blur(5px);
}

.char {
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}
.char span {
  display: block;
  color: transparent;
  position: relative;
}
.char span:nth-child(5) {
  margin-left: 5px;
}
.char.state-1 span:nth-child(5) {
  margin-right: -3px;
}
.char.state-1 span {
  animation: charAppear 1.2s ease backwards calc(var(--i) * 0.03s);
}
.char.state-1 span::before,
.char span::after {
  content: attr(data-label);
  position: absolute;
  color: var(--white);
  text-shadow: -1px 1px 2px var(--purple-500);
  left: 0;
}
.char span::before {
  opacity: 0;
  transform: translateY(-100%);
}
.char.state-2 {
  position: absolute;
  left: 80px;
}
.char.state-2 span::after {
  opacity: 1;
}

.icon {
  animation: resetArrow 0.8s cubic-bezier(0.7, -0.5, 0.3, 1.2) forwards;
  z-index: 10;
}
.icon div,
.icon div::before,
.icon div::after {
  height: 3px;
  border-radius: 1px;
  background-color: var(--white);
}
.icon div::before,
.icon div::after {
  content: "";
  position: absolute;
  right: 0;
  transform-origin: center right;
  width: 14px;
  border-radius: 15px;
  transition: all 0.3s ease;
}
.icon div {
  position: relative;
  width: 24px;
  box-shadow: -2px 2px 5px var(--purple-400);
  transform: scale(0.9);
  background: linear-gradient(to bottom, var(--white), var(--purple-100));
  animation: swingArrow 1s ease-in-out infinite;
  animation-play-state: paused;
}
.icon div::before {
  transform: rotate(44deg);
  top: 1px;
  box-shadow: 1px -2px 3px -1px var(--purple-400);
  animation: rotateArrowLine 1s linear infinite;
  animation-play-state: paused;
}
.icon div::after {
  bottom: 1px;
  transform: rotate(316deg);
  box-shadow: -2px 2px 3px 0 var(--purple-400);
  background: linear-gradient(200deg, var(--white), var(--purple-100));
  animation: rotateArrowLine2 1s linear infinite;
  animation-play-state: paused;
}

.path {
  position: absolute;
  z-index: 12;
  bottom: 0;
  left: 0;
  right: 0;
  stroke-dasharray: 150 480;
  stroke-dashoffset: 150;
  pointer-events: none;
}

.splash {
  position: absolute;
  top: 0;
  left: 0;
  pointer-events: none;
  stroke-dasharray: 60 60;
  stroke-dashoffset: 60;
  transform: translate(-17%, -31%);
  stroke: var(--purple-300);
}

/** STATES */

.button:hover .words {
  opacity: 1;
}
.button:hover .words span {
  animation-play-state: running;
}

.button:hover .char.state-1 span::before {
  animation: charAppear 0.7s ease calc(var(--i) * 0.03s);
}

.button:hover .char.state-1 span::after {
  opacity: 1;
  animation: charDisappear 0.7s ease calc(var(--i) * 0.03s);
}

.button:hover .wrap {
  transform: translate(8px, -8px);
}

.button:hover .outline {
  opacity: 1;
}

.button:hover .outline::before,
.button:hover .icon div::before,
.button:hover .icon div::after,
.button:hover .icon div {
  animation-play-state: running;
}

.button:active .bg::before {
  filter: blur(5px);
  opacity: 0.7;
  box-shadow:
    -7px 6px 0 0 rgb(115 75 155 / 40%),
    -14px 12px 0 0 rgb(115 75 155 / 25%),
    -21px 18px 4px 0 rgb(115 75 155 / 15%);
}
.button:active .content {
  box-shadow:
    inset -1px 12px 8px -5px rgba(71, 0, 137, 0.4),
    inset 0px -3px 8px 0px var(--purple-200);
}

.button:active .words,
.button:active .outline {
  opacity: 0;
}

.button:active .wrap {
  transform: translate(3px, -3px);
}

.button:active .splash {
  animation: splash 0.8s cubic-bezier(0.3, 0, 0, 1) forwards 0.05s;
}

.button:focus .path {
  animation: path 1.6s ease forwards 0.2s;
}

.button:focus .icon {
  animation: arrow 1s cubic-bezier(0.7, -0.5, 0.3, 1.5) forwards;
}

.char.state-2 span::after,
.button:focus .char.state-1 span {
  animation: charDisappear 0.5s ease forwards calc(var(--i) * 0.03s);
}

.button:focus .char.state-2 span::after {
  animation: charAppear 1s ease backwards calc(var(--i) * 0.03s);
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes charAppear {
  0% {
    transform: translateY(50%);
    opacity: 0;
    filter: blur(20px);
  }
  20% {
    transform: translateY(70%);
    opacity: 1;
  }
  50% {
    transform: translateY(-15%);
    opacity: 1;
    filter: blur(0);
  }
  100% {
    transform: translateY(0);
    opacity: 1;
  }
}

@keyframes charDisappear {
  0% {
    transform: translateY(0);
    opacity: 1;
  }
  100% {
    transform: translateY(-70%);
    opacity: 0;
    filter: blur(3px);
  }
}

@keyframes arrow {
  0% {
    opacity: 1;
  }
  50% {
    transform: translateX(60px);
    opacity: 0;
  }
  51% {
    transform: translateX(-200px);
    opacity: 0;
  }
  100% {
    transform: translateX(-128px);
    opacity: 1;
  }
}

@keyframes swingArrow {
  50% {
    transform: translateX(5px) scale(0.9);
  }
}

@keyframes rotateArrowLine {
  50% {
    transform: rotate(30deg);
  }
  80% {
    transform: rotate(55deg);
  }
}

@keyframes rotateArrowLine2 {
  50% {
    transform: rotate(330deg);
  }
  80% {
    transform: rotate(300deg);
  }
}

@keyframes resetArrow {
  0% {
    transform: translateX(-128px);
  }
  100% {
    transform: translateX(0);
  }
}

@keyframes path {
  from {
    stroke: white;
  }
  to {
    stroke-dashoffset: -480;
    stroke: #f9c6fe;
  }
}

@keyframes splash {
  to {
    stroke-dasharray: 2 60;
    stroke-dashoffset: -60;
  }
}

/* From Uiverse.io by 1k24bytes */ 
.fundobonitinho {
  width: 100%;
  height: 100vh;
  background: 
    /* Diagonal slices */
    radial-gradient(
      circle at 100% 50%,
      #ff00cc 0% 2%,
      #00ffcc 3% 5%,
      transparent 6%
    ),
    /* Offset dots */
      radial-gradient(
        circle at 0% 50%,
        #ff00cc 0% 2%,
        #00ffcc 3% 5%,
        transparent 6%
      ),
    /* Wave-like pattern */
      radial-gradient(ellipse at 50% 0%, #3300ff 0% 3%, transparent 4%) 10px
      10px,
    /* Scattered elements */
      radial-gradient(
        circle at 50% 50%,
        #00ffcc 0% 1%,
        #ff00cc 2% 3%,
        #3300ff 4% 5%,
        transparent 6%
      )
      20px 20px,
    /* Background texture */
      repeating-linear-gradient(
        45deg,
        #1a1a1a,
        #1a1a1a 10px,
        #242424 10px,
        #242424 20px
      );
  background-size:
    50px 50px,
    50px 50px,
    40px 40px,
    60px 60px,
    100% 100%;
  animation: shift 15s linear infinite;
}

@keyframes shift {
  0% {
    background-position:
      0 0,
      0 0,
      10px 10px,
      20px 20px,
      0 0;
  }
  100% {
    background-position:
      50px 50px,
      -50px -50px,
      60px 60px,
      80px 80px,
      0 0;
  }
}

</style>
<body class="fundobonitinho">
    <center><h2><b>PHP/ Array</h2></b></h2></center>
    <hr>
    <nav>
        &nbsp;&nbsp;
        <a href="inicial.php">HOME |</a>
        <a href="listagem.php">LISTAGEM |</a>
        <a href="gravar.php">SALVAR DADOS</a>
        <div class="user">
                <?php echo $nomes[$id] ?> | <a href="sair.php">SAIR</a>
        </div>
    </nav>
    <br><br>
    <center>
        <!-- Button trigger modal -->
        <!-- From Uiverse.io by marcelodolza --> 
<button class="button">
  <div class="bg"></div>
  <svg
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 342 208"
    height="208"
    width="370"
    class="splash"
  >
    <path
      stroke-linecap="round"
      stroke-width="3"
      d="M54.1054 99.7837C54.1054 99.7837 40.0984 90.7874 26.6893 97.6362C13.2802 104.485 1.5 97.6362 1.5 97.6362"
    ></path>
    <path
      stroke-linecap="round"
      stroke-width="3"
      d="M285.273 99.7841C285.273 99.7841 299.28 90.7879 312.689 97.6367C326.098 104.486 340.105 95.4893 340.105 95.4893"
    ></path>
    <path
      stroke-linecap="round"
      stroke-width="3"
      stroke-opacity="0.3"
      d="M281.133 64.9917C281.133 64.9917 287.96 49.8089 302.934 48.2295C317.908 46.6501 319.712 36.5272 319.712 36.5272"
    ></path>
    <path
      stroke-linecap="round"
      stroke-width="3"
      stroke-opacity="0.3"
      d="M281.133 138.984C281.133 138.984 287.96 154.167 302.934 155.746C317.908 157.326 319.712 167.449 319.712 167.449"
    ></path>
    <path
      stroke-linecap="round"
      stroke-width="3"
      d="M230.578 57.4476C230.578 57.4476 225.785 41.5051 236.061 30.4998C246.337 19.4945 244.686 12.9998 244.686 12.9998"
    ></path>
    <path
      stroke-linecap="round"
      stroke-width="3"
      d="M230.578 150.528C230.578 150.528 225.785 166.471 236.061 177.476C246.337 188.481 244.686 194.976 244.686 194.976"
    ></path>
    <path
      stroke-linecap="round"
      stroke-width="3"
      stroke-opacity="0.3"
      d="M170.392 57.0278C170.392 57.0278 173.89 42.1322 169.571 29.54C165.252 16.9478 168.751 2.05227 168.751 2.05227"
    ></path>
    <path
      stroke-linecap="round"
      stroke-width="3"
      stroke-opacity="0.3"
      d="M170.392 150.948C170.392 150.948 173.89 165.844 169.571 178.436C165.252 191.028 168.751 205.924 168.751 205.924"
    ></path>
    <path
      stroke-linecap="round"
      stroke-width="3"
      d="M112.609 57.4476C112.609 57.4476 117.401 41.5051 107.125 30.4998C96.8492 19.4945 98.5 12.9998 98.5 12.9998"
    ></path>
    <path
      stroke-linecap="round"
      stroke-width="3"
      d="M112.609 150.528C112.609 150.528 117.401 166.471 107.125 177.476C96.8492 188.481 98.5 194.976 98.5 194.976"
    ></path>
    <path
      stroke-linecap="round"
      stroke-width="3"
      stroke-opacity="0.3"
      d="M62.2941 64.9917C62.2941 64.9917 55.4671 49.8089 40.4932 48.2295C25.5194 46.6501 23.7159 36.5272 23.7159 36.5272"
    ></path>
    <path
      stroke-linecap="round"
      stroke-width="3"
      stroke-opacity="0.3"
      d="M62.2941 145.984C62.2941 145.984 55.4671 161.167 40.4932 162.746C25.5194 164.326 23.7159 174.449 23.7159 174.449"
    ></path>
  </svg>

  <div class="wrap">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 221 42"
      height="42"
      width="221"
      class="path"
    >
      <path
        stroke-linecap="round"
        stroke-width="3"
        d="M182.674 2H203C211.837 2 219 9.16344 219 18V24C219 32.8366 211.837 40 203 40H18C9.16345 40 2 32.8366 2 24V18C2 9.16344 9.16344 2 18 2H47.8855"
      ></path>
    </svg>

    <div class="outline"></div>
    <div class="content">
      <span class="char state-1">
        <span data-label="C" style="--i: 1">C</span>
        <span data-label="A" style="--i: 2">A</span>
        <span data-label="D" style="--i: 3">D</span>
        <span data-label="A" style="--i: 4">A</span>
        <span data-label="S" style="--i: 5">S</span>
        <span data-label="T" style="--i: 6">T</span>
        <span data-label="R" style="--i: 7">R</span>
        <span data-label="A" style="--i: 8">A</span>
        <span data-label="R" style="--i: 9">R</span>
      </span>

      <div class="icon">
        <div></div>
      </div>

      <span class="char state-2">
        <span data-label="C" style="--i: 1">C</span>
        <span data-label="A" style="--i: 2">A</span>
        <span data-label="D" style="--i: 3">D</span>
        <span data-label="A" style="--i: 4">A</span>
        <span data-label="S" style="--i: 5">S</span>
        <span data-label="T" style="--i: 6">T</span>
        <span data-label="R" style="--i: 7">R</span>
        <span data-label="A" style="--i: 8">A</span>
        <span data-label="R" style="--i: 9">R</span>
      </span>
    </div>
  </div>
</button>

    </button>
    </center>
    <br><br>
    <div class="row justify-content-center row-cols-1 row-cols-md-3 text-center">
        <div class="cols">
            <div class="card mb-4 rounded shadow-sw">
                <div class="card-header py-3">
                    <strong><h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="purple" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
</svg>
                    &nbsp;&nbsp;USUÁRIOS</h3></strong>
                </div>
                <div class="card-body">
                   <?php include "usuarios.php";
                   ?>

                </div>
            </div>
        </div>
        <div class="cols">
            <div class="card mb-4 rounded shadow-sw">
                <div class="card-header py-3">
                    <strong><h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="purple" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5"/>
</svg>
                    &nbsp;&nbsp;GENEROS</h3></strong>
                </div>
                <div class="card-body">
                    <?php include "generos.php"  ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">CADASTRAR USUARIO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <form action="cadastro.php" method="post">
                        <label class="form-label">E-MAIL</label>
                        <input class="form-control" type="email" name="email" required autofocus placeholder="Digite o seu e-mail">
                        <br>
                        <label class="form-label">NOME</label>
                        <input class="form-control" type="text" name="nome" required  placeholder="Digite o seu nome">
                        <br>
                        <label class="form-label">GÊNERO</label>
                        <select class="form-select" id="floatingSelect" aria-label="Selecione um gênero" name="genero" required>
                            <option style="color:gray;" disabled selected>Selecione um gênero</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>
                        <br>
                        <label class="form-label">SENHA</label>
                        <input class="form-control" type="password" name="senha" required  placeholder="**********">
                        <br>
                        <input type="submit" class="btn btn-purple" value="CADASTRAR">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">FECHAR</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>