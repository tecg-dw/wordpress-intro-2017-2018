<?php get_header(); ?>
    <?php if(have_posts()) : while(have_posts()) : the_post();?>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
    <?php endwhile; endif; ?>

    <section class="stories">
        <h2 class="stories__title">Nos récits de voyage</h2>
        <div class="stories__container">
        <?php 
            $stories = new WP_Query(['post_type' => 'story']);
            if($stories->have_posts()): while($stories->have_posts()): $stories->the_post();
        ?>
            <article class="story">
                <a href="<?php the_permalink(); ?>" class="story__link">Voir l'article "<?php the_title();?>"</a>
                <h3 class="story__title"><?php the_title();?></h3>
                <p class="story__meta">Publié le <time class="story__date" datetime="<?= get_the_date('c'); ?>"><?= get_the_date('d-m-Y'); ?></time></p>
                <figure class="story__thumb">
                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'story__img']); ?>
                </figure>
                <div class="story__excerpt">
                    <p><?php the_excerpt(); ?></p>
                </div>
            </article>
            <?php endwhile; endif; ?>
        </div>
    </section>

<?php get_footer(); ?>