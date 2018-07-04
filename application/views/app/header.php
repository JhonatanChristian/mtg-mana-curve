<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title><?php echo 'MTG Mana Curve'; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/font/mana-master/css/mana.min.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/frameworks/materialize/css/materialize.min.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/style.min.css'; ?>">
</head>
<body>

<header class="header">
  <nav class="blue darken-2">
    <div class="nav-wrapper">
      <a href="<?php echo site_url(); ?>" class="brand-logo center">MTG Mana Curve</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="left hide-on-med-and-down">
        <li><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('header_mana_curve'); ?></a></li>
        <li><a href="<?php echo site_url() . 'color-distribution/'; ?>"><?php echo $this->lang->line('header_color_distribution'); ?></a></li>
        <li><a href="<?php echo site_url() . 'how-it-works/'; ?>"><?php echo $this->lang->line('header_how_it_works'); ?></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('header_mana_curve'); ?></a></li>
        <li><a href="<?php echo site_url() . 'color-distribution/'; ?>"><?php echo $this->lang->line('header_color_distribution'); ?></a></li>
        <li><a href="<?php echo site_url() . 'how-it-works/'; ?>"><?php echo $this->lang->line('header_how_it_works'); ?></a></li>
      </ul>
    </div>
  </nav>
</header>
