<?php
    session_start();
    //Incializa o array
    if (!isset($_SESSION['pessoas'])) {
        $_SESSION['pessoas'] = [];
    }
    //Adicionar
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $id = $_POST['id'];
        $pessoa = ['nome'=>$nome,'idade'=>$idade];
        if ($id === '') {
            $_SESSION['pessoas'][] = $pessoa;//Criando o registro
        } else {
            $_SESSION['pessoas'][$id] = $pessoa;//Atualizando
        }
        header("Location:pessoa.php");
        exit();
    }
    //Deletar
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        unset($_SESSION['pessoas'][$id]);
        header("Location:pessoa.php");
        exit();
    }
    //Editar
    $editando = false;
    $editId = '';
    $editNome = '';
    $editIdade = '';
    if (isset($_GET['edit'])) {
        $editando = true;
        $editId = $_GET['edit'];
        $editNome = $_SESSION['pessoas'][$editId]['nome'];
        $editIdade = $_SESSION['pessoas'][$editId]['idade'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf8">
        <title>CRUD - PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    </head>
    <body>
        <center><h2>CRUD</h2></center>
        <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sw">
                    <div class="card-header py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" fill="green" class="bi bi-person-fill-check" viewBox="3 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
</svg>
                    &nbsp;&nbsp;<font style="font-size: 30px;"><b>CRUD PESSOA</b></font>
                    </div>
                    <div class="card-body">
                        <form method="post" action="pessoa.php">
                            <h2><?=$editando ? "Editar Pessoa" : "Cadastrar Pessoa"?></h2>
                            <input type="hidden" name="id" value="<?= htmlspecialchars($editId) ?>">
                            <label>NOME</label>
                            <input type="text" name="nome" required value="<?=htmlspecialchars($editNome)?>"><br/><br>
                            <label>IDADE</label>
                            <input type="number" name="idade" required value="<?=htmlspecialchars($editIdade)?>"><br/><br>
                            <button class="btn btn-outline-success" type="submit"><?=$editando ? "Atualizar" : "Cadastrar"?></button>
                        </form>
                    
                        <br/>
                        <table class="table table-striped table-hover" border="1" cellpadding="5">
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>IDADE</th>
                                <th>AÇÕES</th>
                            </tr>
                            <?php foreach($_SESSION['pessoas'] as $index => $pessoa): ?>
                            <tr>
                                <td><?= $index ?></td>
                                <td><?= htmlspecialchars($pessoa['nome'])?></td>
                                <td><?=htmlspecialchars($pessoa['idade'])?></td>
                                <td>
                                    <a class="btn" href="pessoa.php?edit=<?=$index?>"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="blue" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></a> | 
                                    <a class="btn" href="pessoa.php?delete=<?=$index?>" onclick="return confirm('Deseja realmente excluir?')"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>