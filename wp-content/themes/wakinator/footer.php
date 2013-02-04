    </div><!-- #main -->
     
    <footer>
        <div class="hidden-phone hidden-tablet">
            <?php wp_nav_menu(array(
                'theme_location' => 'main-navigation',
            )); ?>
        </div>
        <div id="menu-control" class="toggle-up visible-phone visible-tablet">
            Menu <div class="direction icon-arrow-up icon-white"></div>
        </div>
        <?php wp_nav_menu(array(
            'theme_location' => 'main-navigation',
            'container_class' => 'responsive-menu-main-navigation-container',
            'menu_id' => 'responsive-menu-main-navigation',
        )); ?>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.9.0.min.js"><\/script>')</script>

    <!-- scripts concatenated and minified via build script -->
    <!--
    <script src="js/plugins.js"></script>
    -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/script.js"></script>
</body>
</html>
