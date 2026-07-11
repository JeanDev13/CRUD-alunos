<?php

    require "../config/conection.php";

    $id = $_GET["id"];

    $sql = ("SELECT * FROM alunos WHERE id = :id");
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":id" => $id]);
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>CURSO</title>
</head>
<body>
    <div class="container mt-3">
        <div class="card shadow p-4">
            <h1 class="text-center mb-4">
                Visualizar Aluno
            </h1>
        </div>
    </div>
    <div class="container mt-3 d-flex justify-content-end">
        <a href="../index.php" class="btn btn-secondary">
           <- Voltar
        </a>
    </div>
    <div class="container mt-3">
        <div class="card shadow p-4">
            <p>
                <strong> Nome: </strong><?= htmlspecialchars($aluno["nome"]) ?>
            </p>
            <p>
                <strong> Matricula: </strong><?=htmlspecialchars($aluno["matricula"]) ?>
            </p>
            <p>
                <strong> Email: </strong><?=htmlspecialchars($aluno["email"]) ?>
            </p>
            <p>
                <strong> Curso: </strong><?=htmlspecialchars($aluno["curso"]) ?>
            </p>
            <p>
                <strong> Data de Nascimento: </strong><?=htmlspecialchars($aluno["data_nasc"]) ?>
            </p>
        </div>
    </div>
</body>
</html>