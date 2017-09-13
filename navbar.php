<nav class="pui-nav primary fixed top">
    <div class="inner">
        <div class="container">
            <div class="side">
              <button class="nav-toggle material-icons" pui-collapse-target="#main_collapse_menu">menu</button>
            </div>
            <span class="title"><? bloginfo("name"); ?></span>
            <div class="collapsible" id="main_collapse_menu">
                <ul class="menu">
                    <? wp_nav_menu("title_li="); ?>
<!--                    <li><a class="icon-only" href="javascript:$_seacrhformOpen()" id="sf-handler"><i class="material-icons">search</i></a></li>-->
                </ul>
            </div>
        </div>
    </div>
    <?get_search_form()?>
</nav>
<?php // NOTE: Give the 'href="javascript:$_seacrhformOpen()" attribute the seacrh open link in the navbar!!!!' ?>
