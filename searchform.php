<div class="search-form">
    <form action="<?php echo home_url( '/' ); ?>" role="search" method="get">
        <div class="close-container">
            <button class="btn fab red simple material-icons" onclick="$_seacrhformClose()" type="button">close</button>
        </div>
        <div class="input-area">
            <div class="pui-raised-input light lg">
                <input type="text" name="s" required placeholder="جستجو کنید..." value="<?php echo get_search_query() ?>">
            </div>
        </div>
        <div class="submitter">
            <button type="submit" class="btn yellow fab material-icons">search</button>
        </div>
    </form>
</div>
