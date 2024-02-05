<?php

require_once "open.php";
require_once "conexao.php";
?>

<?php include("head.php") ?>

<body>
    <div class="wrapper">

        <?php
        if (isset($_GET["pag"])) {
            $pag = $_GET["pag"];
        } else {
            $pag = 'dashboard';
        }
        ?>

        <!-- Navigation -->
        <?php include("menu.php") ?>

        <div class="main">

            <?php include("top-menu.php") ?>

            <!-- Conteudo -->
            <?php include($pag . ".php") ?>

            <!-- Rodapé -->
            <?php include("footer.php") ?>

        </div>
    </div>
    <!-- /#wrapper -->

</body>

</html>