<div class="clear"></div>
</div>
<footer id="footer" role="contentinfo">
	<div class='grid container'>
		<div class='grid__col--1-of-4 grid__col'>
			<h4><a href="https://github.com/pschfr" target="_blank">Public Repos</a></h4>
    		<?php echo do_shortcode("[github-repo-list username='pschfr' title_wrapper='strong' strip_name_dashes='false']"); ?>
		</div>
		<div class='grid__col--2-of-4 grid__col'>
			<h4><a href="https://dribbble.com/pschfr" target="_blank">Dribbble Shots</a></h4>
    		<ul id='shots' class='grid'></ul>
		</div>
		<div class='grid__col--1-of-4 grid__col share'>
			Share with<br>
			<a href='https://facebook.com/sharer/sharer.php?u=<?php echo urlencode(site_url()); ?>' target='_blank' class='js-social-share facebook'><span class='ion-social-facebook'></span></a>
			<a href='https://twitter.com/intent/tweet/?text=Paul%20Schaefer,%20digital%20artist%20and%20cool%20dude&via=pschfr&url=<?php echo urlencode(site_url()); ?>' target='_blank' class='js-social-share twitter'><span class='ion-social-twitter'></span></a>
			<a href='mailto:?to=%20&subject=Look%20at%20this%20rad%20website!&body=<?php echo urlencode(site_url()); ?>' class='email'><span class='ion-email'></span></a><br>
			Beam me up<br>
			<a class='arrow ion-chevron-up' href='#header'></a>
		</div>
		<div class='grid__col--12-of-12 grid__col--centered grid__col'>
			<p>Made with <span class='ion-heart pulse'></span> in Pittsburgh.<br>Enjoy your <?php echo date('l'); ?>.</p>
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
