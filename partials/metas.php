<div class="meta">
  <?php the_author();
  /* Affiche l'auteur de ce post*/ ?>

  <?php the_time('d.m.Y');
  /* Affiche la date à laquelle ce post a été publié */ ?>

  <?php echo get_the_category_list(); 
  /* Affiche sous forme de liens les catégories auquel ce post appartient */ ?>

  <?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); 
  /* Affiche les tags associés à ce post séparés par des espaces (&nbsp;) et un pipe (|) */ ?>
</div>