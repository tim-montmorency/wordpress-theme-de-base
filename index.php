<?php
/**
 * Modèle générique au cas où Wordpress ne trouve pas un modèle
 * À utiliser comme fallback seulement.
 */

// Cette fonction appel le fichier header.php
get_header(); 

// Est-ce que nous avons des posts qui correspondent à notre requête ?
// Dans le cas de la page d'accueil, les billets les plus récents serons affichés
if ( have_posts() ) : 
	// Si oui, bouclons au travers pour tous les afficher
	while ( have_posts() ) : the_post(); 
?>

	<article>
		<?php the_post_thumbnail('large'); // Vignette large du post ?>

		<h2>
			<a href="<?php the_permalink(); // Lien du post ?>">
				<?php the_title(); // Titre du post ?>
			</a>
		</h2>

		<?php get_template_part( 'partials/metas' ); ?>
	</article>

<?php endwhile; wp_reset_postdata(); // Fermeture de la boucle ?>

<?php 
/* get_template_part( 'partials/superheros-grid' ); */
/* Appel le fichier metas.php dans le dossier partials qui appel un type de post personnalisé */ ?>

<?php else : // Si aucune page/billet correspondant n'a été trouvé ?>
	<h2>Oh oh, désolé la requête demandé n'a pas été trouvée</h2>
	<img src="https://media.giphy.com/media/3HLMNi9U0yb4CDldVO/giphy.gif" alt="Non trouvée">
<?php endif; 

// Appel le fichier footer.php
get_footer(); ?>