<?php
@session_start();

// verificar se teve chamado nos ultimos 15 minutos
$sql = "SELECT ID FROM chamado WHERE ID_USUARIO = :id AND RESOLVIDO = 0 AND DATA_HORA >= NOW() - INTERVAL 15 MINUTE";
$sth = $pdo->prepare($sql);
$sth->bindParam(':id', $_SESSION['id']);
$sth->execute();

$chamados = $sth->fetchAll();
?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Abrir chamado</h1>

        <div class="row">
            <div class="col-12">                
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Aqui voce pode abrir um novo chamado</h5>
                    </div>
                    <div class="card-body">


                        <form action="php/cadastrar_chamado.php" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="problema">Problema</label>
                                <textarea class="form-control" id="problema" name="problema" rows="3"></textarea>
                            </div>
                            <button <?= count($chamados) > 0 ? 'disabled' : '' ?> type="submit" class="btn btn-primary">Abrir</button>
                            <span class="text-danger"><?= count($chamados) > 0 ? 'Aguarde o chamado atual em aberto ser resolvido' : '' ?></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>