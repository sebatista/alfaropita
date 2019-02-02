<!DOCTYPE html>
<html lang="en">
<head>
  <title>Diseña tu ropita</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--script type="text/javascript" src="<?php echo base_url(); ?>scripts/crop.js" ></script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <script src="<?php echo base_url(); ?>scripts/canvas2image.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>scripts/alfaropita.js" ></script>
  <script src="<?php echo base_url(); ?>scripts/print.js"></script>

  <link href="<?php echo base_url(); ?>css/app.css" rel="stylesheet">

  <!--CROPPIE-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>scripts/croppie/croppie.css" />
  <script src="<?php echo base_url(); ?>scripts/croppie/croppie.js"></script>


</head>

<body class="site" onload="verImagenesPrecargadas()">