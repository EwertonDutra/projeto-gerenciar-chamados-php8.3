<?php
$sql = "SELECT chamado.*, usuario.NOME FROM chamado INNER JOIN usuario ON usuario.ID = chamado.ID_USUARIO";
$sth = $pdo->prepare($sql);
$sth->execute();

$chamados = $sth->fetchAll();
?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Dashboard</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Últimos chamados</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuário</th>
                                <th class="d-none d-xl-table-cell">Data/Hora</th>
                                <th class="d-none d-xl-table-cell">Problema</th>
                                <th>Status</th>
                                <th class="d-none d-xl-table-cell">Resolvido em</th>
                                <th class="d-none d-md-table-cell">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($chamados as $chamado) :
                                $status = $chamado->RESOLVIDO == 1 ? 'Resolvido' : 'Aberto';
                                $status_class = $chamado->RESOLVIDO == 1 ? 'success' : 'warning';
                            ?>
                                <tr>
                                    <td><?= $chamado->ID ?></td>
                                    <td><?= $chamado->NOME ?></td>
                                    <td class="d-none d-xl-table-cell"><?= date_format(new DateTime($chamado->DATA_HORA), 'd/m/Y H:i') ?></td>
                                    <td class="d-none d-xl-table-cell"><?= $chamado->PROBLEMA ?></td>
                                    <td><span class="badge bg-<?= $status_class ?>"><?= $status ?></span></td>
                                    <td class="d-none d-xl-table-cell"><?= $chamado->DATA_HORA_RESOLUCAO == null ? '-' : date_format(new DateTime($chamado->DATA_HORA_RESOLUCAO), 'd/m/Y H:i') ?></td>
                                    <td class="d-none d-md-table-cell">
                                        <?php if ($chamado->RESOLVIDO == 0) : ?>
                                            <button type="button" onclick="resolver(<?= $chamado->ID ?>)" class="btn btn-primary">Resolver</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function resolver(id) {
        if(confirm('Deseja resolver o chamado?')) {
            window.location.href = 'php/resolver_chamado.php?id=' + id;
        }
    }
</script>