<?get_header()?>
<?get_template_part("navbar")?>
<div class="container">
<div class="chip" style="text-align: center">
    <h1>404</h1>
    <br>
    <h2>صفحه درخواستی پیدا نشد.</h2>
    <a class="btn secondary" href="<?=bloginfo('siteurl')?>">خانه</a>
    <?php if (empty($_SERVER['HTTP_REFERER'])): ?>
    <button class="btn yellow" onclick="window.history.back()" >برگشت به صفحه قبلی</button>
    <?php endif; ?>
</div>
</div>
<?get_footer()?>