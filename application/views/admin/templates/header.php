<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/logo.png'); ?>" />
    <title><?= $page_title ?></title>
    <?php foreach ($css as $data) { ?>
        <link href="<?= base_url($data); ?>" rel="stylesheet"/>
    <?php } ?>

    <script>
        var BASE_URL = '<?php echo base_url(); ?>';
    </script>
</head>