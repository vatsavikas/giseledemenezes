<!-- LINKS E ARTIGOS: ARTIGOS -->
<?php $i = 0; ?>
<?php if(!isset($taxonomy)) $taxonomy = '&sessao=nenhuma';?>
<?php if(!$no_title){ ?>
<?php $my_query = new WP_Query("post_type=post&showposts=-1". $taxonomy); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if($i == 0){ ?>
		<h3 class="item_sessao grid_9 alpha">Artigos e Links</h3>
		<?php echo $links_text;?>
		<ul style="clear: both;">
	<?php }; ?>
			<?php if(!get_the_terms($post->ID, 'pessoa') || get_the_terms($post->ID, 'sessao')){?><li class="itens_list site_link"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li><?php }; ?>
	<?php $i++; ?>
<?php endwhile; wp_reset_query(); ?>
<?php }; ?>
<!-- LINKS E ARTIGOS: LINKS -->
<?php $my_query = new WP_Query("post_type=links_relacionados&showposts=-1". $taxonomy); while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<?php if($i == 0){ ?>
		<?php if(!$no_title){ ?><h3 class="item_sessao grid_9 alpha">Artigos e Links</h3><?php };?>
		<?php echo $links_text;?>
		<ul>
	<?php }; ?>
		<?php $link_externo = get_post_meta($post->ID, 'url_key', true); $site_externo = get_post_meta($post->ID, 'titulo', true);?>
			<?php if(!get_the_terms($post->ID, 'pessoa') || get_the_terms($post->ID, 'sessao')){?><li class="itens_list external_link"><a href="<?php echo $link_externo;?>" target="_blank"><?php the_title(); ?></a><?php if($site_externo!=""){echo ' - ' . $site_externo;} ?></li><?php }; ?>
	<?php $i++; ?>
<?php endwhile; wp_reset_query(); ?>
<?php if($i>0){ ?>
		</ul>
<?php }; ?>