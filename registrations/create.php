<?php

    require "../config/conection.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = htmlspecialchars($_POST["nome"]);
        $matricula = ($_POST["matricula"]);
        $email = htmlspecialchars($_POST["email"]);
        $curso = htmlspecialchars($_POST["curso"]);
        $data_nasc = ($_POST["data_nasc"]);

        $erros = [];
        
        if(empty($nome)){
            $erros[] = "Nome obrigatório";
        }
        if(empty($matricula)){
            $erros[] = "Matricula obrigatória";
        }
        if(empty($email)){
            $erros[] = "Email obrigatório";
        }
        if(empty($curso)){
            $erros[] = "curso obrigatório";
        }
        if(empty($data_nasc)){
            $erros[] = "Data de nascimento obrigatória";
        }

        if (count($erros) > 0){
            foreach($erros as $erro){
                echo '
                <div class="alert alert-danger" role="alert"> ' . $erro . ' </div>';
            }
        } else{

            $sql = ("INSERT INTO alunos (nome, matricula, email, curso, data_nasc) 
                    VALUES (:nome, :matricula, :email, :curso, :data_nasc)");
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ":nome" => $nome,
                ":matricula" => $matricula,
                ":email" => $email,
                ":curso" => $curso,
                ":data_nasc" => $data_nasc
            ]);

            header ("Location: ../index.php");
            exit;
        }
    }

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
            <h1 class="text-center mb-4">Cadastrar Aluno</h1> 
        </div> 
    </div>
    <div class="container mt-3 d-flex justify-content-end">
        <a href="../index.php" class="btn btn-secondary">
           <- Voltar
        </a>
    </div>
    <div class="container mt-4">
        <div class="card shadow p-4">
            <form action="create.php" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome"> 
            </div>
            <div class="mb-3">
                <label for="matricula" class="form-label">Matricula</label>
                <input type="text" class="form-control" id="matricula" name="matricula">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <input type="text" class="form-control" id="curso" name="curso">
            </div>
            <div class="mb-3">
                <label for="data_nasc" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc">
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
        </div>
    </div>   
</body>
</html>