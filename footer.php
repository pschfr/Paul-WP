<div class="clear"></div>
<footer id="footer">
<div class='grid container'>
<div class='grid__col--1-of-3 grid__col'>
<?php wp_nav_menu(array('theme_location' => 'footer_menu')); ?>
</div>
<div class='grid__col--1-of-3 grid__col'>
Share with<br>
<a href='https://facebook.com/sharer/sharer.php?u=<?php echo urlencode(site_url()); ?>' target='_blank' class='js-social-share'>
<svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg>
</a>
<a href='https://twitter.com/intent/tweet/?text=Paul%20Schaefer,%20digital%20artist%20and%20web%20developer&via=pschfr&url=<?php echo urlencode(site_url()); ?>' target='_blank' class='js-social-share'>
<svg class="icon icon-twitter"><use xlink:href="#icon-twitter"></use></svg>
</a>
<a href='mailto:?to=%20&subject=Look%20at%20this%20rad%20website!&body=<?php echo urlencode(site_url()); ?>'>
<svg class="icon icon-mail"><use xlink:href="#icon-mail"></use></svg>
</a><br>
</div>
<div class='grid__col--1-of-3 grid__col'>
Beam me up<br>
<a class='arrow' href='#'>
<svg class="icon icon-arrow-up"><use xlink:href="#icon-arrow-up"></use></svg>
</a>
</div>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
