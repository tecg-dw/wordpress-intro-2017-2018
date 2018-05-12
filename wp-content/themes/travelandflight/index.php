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
                    <img src="<?= taf_get_post_thumbnail_src(get_the_ID()); ?>" alt="Image de couverture du voyage <?php the_title();?>" class="story__img">
                </figure>
                <div class="story__excerpt">
                    <p><?php the_excerpt(); ?></p>
                </div>
                <dl class="story__metas">
                    <dt class="story__term">Date du voyage</dt>
                    <dd class="story__date"><time class="story__when" datetime="<?= date('c', $storyDate = strtotime(get_field('date')));?>"><?= date('d.m.Y', $storyDate);?></time></dd>
                    <dt class="story__term">Sponsor</dt>
                    <dd class="story__sponsor"><img src="<?= taf_get_acf_img_src('sponsor', 'thumbnail');?>" alt="" class="story__coach"></dd>
                </dl>
            </article>
            <?php endwhile; endif; ?>
        </div>
    </section>

<?php get_footer(); ?>