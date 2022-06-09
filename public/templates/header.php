<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/required.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php $SEO->print_title(); ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php $SEO->print(); ?>
    </head>
    <body>