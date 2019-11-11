<header class="header">
  <div class="header__row">
    <div class="header__bg"></div>
    <h1 class="header__logo">
      <a href="<?php echo $home_url; ?>/"><?php echo $metaTtl; ?></a>
    </h1>
    <nav class="header__gnav gnav">
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
        <!-- <li class="gnav__item">
          <a href="<?php echo $home_url; ?>/_styleguide/" target="_blank" class="gnav__link _styleguide u-icon__link">styleguide</a>
        </li> -->
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
            <?php
            if ( has_nav_menu( $location ) ) {
                //Do something
            } else { ?>
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
            <?php } ?>
            </ul>
          </nav>

        </li>
        <li class="gnav__item">
          <a href="#" class="gnav__link contact">contact</a>
        </li>
      </ul>
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
