<?php

    require "config/conection.php";

    $sql = "SELECT * FROM alunos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>CURSO</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h1 class="text-center mb-4">ALUNOS</h1> 
        </div> 
    </div>

    <div class="container mt-3 d-flex justify-content-end">
        <a href="registrations/create.php" class="btn btn-success">
           + Adicionar Aluno
        </a>
    </div>

    <div class="container mt-3">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Matricula</th>
            <th scope="col">Email</th>
            <th scope="col">Curso</th>
            <th scope="col">Data de Nascimento</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($alunos) == 0):?>
            <div class="alert alert-warning" role="alert">
                Nenhum aluno cadastrado ainda!
            </div>
            <?php else: ?>              
            <?php foreach ($alunos as $aluno):?>
                <tr>
                    <th scope="row"><?= $aluno["id"] ?></th>
                    <td> <?= $aluno["nome"] ?></td>
                    <td> <?= $aluno["matricula"] ?></td>
                    <td> <?= $aluno["email"] ?></td>
                    <td> <?= $aluno["curso"] ?></td>
                    <td> <?= $aluno["data_nasc"] ?></td>      
                
                <td>
                    <a href="viwer.php?id=<?= $aluno["id"] ?>" class="btn btn-secondary btn-sm">
                        Visualizar
                    </a>
                    <a href="registrations/update.php?id=<?= $aluno["id"]?>" class="btn btn-warning btn-sm">
                        Editar
                    </a>
                    <a href="registrations/delete.php?id=<?= $aluno["id"]?>" class="btn btn-danger btn-sm">
                        Deletar
                    </a>
                </td>    
                </tr>
        <?php endforeach; ?> 
        <?php endif; ?>   
    </tbody>
    </table>
</body>
</html>
