<!-- Essential javascripts for application to work-->
<script src="<?= media() ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?= media() ?>/js/popper.min.js"></script>
<script src="<?= media() ?>/js/bootstrap.min.js"></script>
<script src="<?= media() ?>/js/main.js"></script>
<script src="<?= media() ?>/js/functionsAdmin.js"></script>
<!-- Font Awesome -->
<script src="<?= media(); ?>/js/fontawesome.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?= media() ?>/js/plugins/pace.min.js"></script>
<!-- Data table plugin-->
<script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>

<?php if ($data['page_name'] == "Cargo") { ?>
    <script src="<?= media(); ?>/js/functionsCargo.js"></script>
<?php } ?>

</body>

</html>