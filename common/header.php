<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_url('//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
    queue_css_file(array('iconfonts','style'));
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_url('https://code.jquery.com/jquery-3.3.1.slim.min.js');
    queue_js_url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
    queue_js_url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    queue_js_file(array('jquery-accessibleMegaMenu', 'minimalist', 'globals'));
    //queue_js_file(array('jquery-accessibleMegaMenu', 'popper.min', 'bootstrap.bundle.min','minimalist', 'globals'));
    //queue_js_file(array('minimalist'));
    echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap" class="container-fluid">

        <header role="banner">
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <div class="row">
                <div class="col col-sm-12">
                  <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
                  <?php echo theme_header_image(); ?>
                  <?php echo link_to_home_page(theme_logo(), array('class'=>'navbar-brand')); ?>
                </div>
              </div>
              <div class="row">
                <div class="col col-sm-8">
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                      $partial = array('common/menu-partial.phtml', 'default');
                      $nav = public_nav_main();
                      $nav->setUlClass('navbar-nav')->setPartial($partial);
                      echo $nav->render();
                    ?>
                    </div>
                </div>
                <div class="col col-sm-4">
                  <form class="form-inline my-2 my-lg-0">
                    <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                    <?php echo search_form(array('show_advanced' => true)); ?>
                    <?php else: ?>
                    <?php echo search_form(); ?>
                    <?php endif; ?>
                  </form>

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                </div>
              </div>
            </div>
          </nav>

        </header>

        <article id="content" role="main" tabindex="-1" class="container">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
