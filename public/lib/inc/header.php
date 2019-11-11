<header class="header">
  <div class="header__row">
    <div class="header__bg"></div>
    <h1 class="header__logo">
      <a href="<?php echo $home_url; ?>/"><?php echo $metaTtl; ?></a>
    </h1>
    <nav class="header__gnav gnav">
    <?php
      if ( has_nav_menu( 'global' ) ) {
        $menu_name = 'global';
        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

            $menu_items = wp_get_nav_menu_items($menu->term_id);

            $menu_list = '<ul id="menu-' . $menu_name . '" class="gnav__row"　data-scroll-scope>';

            foreach ( (array) $menu_items as $key => $menu_item ) {
                $title = $menu_item->title;
                $url = $menu_item->url;
                $menu_list .= '<li class="gnav__item"><a href="' . $url . '" class="gnav__link '.$title.'">' . $title . '</a></li>';
            }
            $menu_list .= '</ul>';
            echo ($menu_list);
        } else {
            $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
        }
          //Do something
      } else { ?>
      <ul class="gnav__row"　data-scroll-scope>
        <li class="gnav__item">
          <a href="<?php echo $home_url ?>/" class="gnav__link home">home</a>
        </li>
        <li class="gnav__item">
          <a href="<?php echo $home_url ?>/_sample/" class="gnav__link _sample">sample</a>
        </li>
        <li class="gnav__item">
          <a href="<?php echo $home_url ?>/_layout/" class="gnav__link _layout">layout</a>
        </li>
        <li class="gnav__item gnav-deep">
          <a href="#" class="gnav__link">menu</a>

          <nav class="gnav-deep__nav">
            <ul class="gnav-deep__row">
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
            </ul>
          </nav>

        </li>
        <li class="gnav__item gnav-deep">
          <a href="#" class="gnav__link">menu</a>

          <nav class="gnav-deep__nav">
            <ul class="gnav-deep__row">
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
              <li class="gnav-deep__item">
                <a href="<?php echo $home_url; ?>" class="gnav-deep__link">dummy</a>
              </li>
            </ul>
          </nav>

        </li>
        <li class="gnav__item">
          <a href="#" class="gnav__link contact">contact</a>
        </li>
      </ul>
      <?php } ?>
    </nav>
    <label class="header__menubar menubar">
      <div class="menubar__row">
        <span class="menubar__item"></span>
        <span class="menubar__item"></span>
        <span class="menubar__item"></span>
      </div>
    </label>
  </div>
</header>
