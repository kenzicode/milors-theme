<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Milors
 */

?>
	
<?php 
    global $krocks_opt;
    $_totop = $krocks_opt['_pagetoTop'];
    $_copy = $krocks_opt['_footerCopy'];
    $_column = $krocks_opt['_footerColumn'];
    $_footer_1_col_sidebar = $krocks_opt['_footer_1_Column_setting'];
    $_footer_3_col_sidebar_1 = $krocks_opt['_footer_3_Column_setting-1'];
    $_footer_3_col_sidebar_2 = $krocks_opt['_footer_3_Column_setting-2'];
    $_footer_3_col_sidebar_3 = $krocks_opt['_footer_3_Column_setting-3'];	
?>
	
	</main>

	<?php if ($_column == 'col-lg-12') : ?>

	<footer id="colophon" class="site-footer <?php echo $_column; ?>">
		<div class="container">
			<div class="site-info flex-nowrap align-items-center text-center py-3">
				<div class="footer-widget">
					<?php 
						if ( ! dynamic_sidebar( $_footer_1_col_sidebar ) ) : 
					?>
					<?php endif; ?>
				</div>

				<?php if ( $_copy !== '' ) : ?>
				<div class="copy">
					<p>&copy;&nbsp;<?php echo date('Y'); ?>&nbsp;<?php bloginfo( 'name' ); ?>, &nbsp;<?php echo $_copy; ?></p>
				</div>
				<?php endif; ?>

			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->

	<?php elseif ($_column == 'col-lg-4' ) : ?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="<?php echo $_column; ?> footer-widget wf-1">
					<?php 
						if ( ! dynamic_sidebar( $_footer_3_col_sidebar_1 ) ) : 
					?>
					<?php endif; ?>
				</div>
				<div class="<?php echo $_column; ?> footer-widget wf-2">
					<?php 
						if ( ! dynamic_sidebar( $_footer_3_col_sidebar_2 ) ) : 
					?>
					<?php endif; ?>
				</div>
				<div class="<?php echo $_column; ?> footer-widget wf-3">
					<?php 
						if ( ! dynamic_sidebar( $_footer_3_col_sidebar_3 ) ) : 
					?>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( $_copy !== '' ) : ?>
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="copy">
							<p>&copy;&nbsp;<?php echo date('Y'); ?>&nbsp;<?php bloginfo( 'name' ); ?>, &nbsp;<?php echo $_copy; ?></p>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</footer>

	<?php endif; ?>

<?php wp_footer(); ?>


</body>
</html>
