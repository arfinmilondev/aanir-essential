<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

  //
  // Create a about widget
  //
  CSF::createWidget('aanir_essential_recent_post', array(
    'title'       => esc_html__('Aanir Recent Post 2', 'aanir-essential'),
    'classname'   => 'widget-trend-post',
    'description' => esc_html__('Aanir Recent Post 2', 'aanir-essential'),
    'fields'      => array(

      array(
        'id'      => 'title',
        'type'    => 'text',
        'title'   => esc_html__('Title', 'aanir-essential'),
        'default'   => esc_html__('Popular Posts', 'aanir-essential'),
      ),


      array(
        'id'      => 'enable_img',
        'type'    => 'switcher',
        'title'   => esc_html__('Enable thumbnail', 'aanir-essential'),
        'default'     => true
      ),


      array(
        'id'      => 'title_limit',
        'type'    => 'text',
        'title'   => esc_html__('Title limit', 'aanir-essential'),
        'default'     => '6'
      ),

      array(
        'id'      => 'post_limit',
        'type'    => 'text',
        'title'   => esc_html__('Post Limit', 'aanir-essential'),
        'default'     => '3'
      ),

      array(
        'id'      => 'enable_content',
        'type'    => 'switcher',
        'title'   => esc_html__('Show Content', 'aanir-essential'),
        'default'     => false
      ),

      array(
        'id'      => 'enable_image_icon',
        'type'    => 'switcher',
        'title'   => esc_html__('Show Image icon', 'aanir-essential'),
        'default'     => false
      ),

      array(
        'id'      => 'content_limit',
        'type'    => 'text',
        'title'   => esc_html__('Content Limit', 'aanir-essential'),
        'default'     => '13'
      ),

      array(
        'id'      => 'enable_date',
        'type'    => 'switcher',
        'title'   => esc_html__('Date', 'aanir-essential'),
        'default'     => true
      ),
      array(
        'id'      => 'enable_custom_date_format',
        'type'    => 'switcher',
        'title'   => esc_html__('Custom Date Format', 'aanir-essential'),
        'default'     => true
      ),

      array(
        'id'          => 'post_sortby',
        'type'        => 'select',
        'title'       => esc_html__('Post Sort By', 'aanir-essential'),
        'placeholder' => 'Select an option',
        'options'     => array(
          'recent'        => esc_html__('Recent Posts', 'aanir-essential'),
          'popularposts'  => esc_html__('Popular', 'aanir-essential'),
          'mostdiscussed' => esc_html__('Most Comment', 'aanir-essential'),


        ),
        'default'     => 'recent'
      ),



    )
  ));

  if (!function_exists('aanir_essential_recent_post')) {
    function aanir_essential_recent_post($args, $instance)
    {

      echo $args['before_widget'];

      if (!empty($instance['title'])) {
        echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
      }

      $post_limit = isset($instance['post_limit']) && $instance['post_limit'] != '' ? $instance['post_limit'] : 3;

      $q_args = array(
        'post_type'      => array('post'),
        'post_status'    => array('publish'),
        'orderby'        => 'date',
        'order'          => 'DESC',
        'posts_per_page' => $post_limit
      );

      if (isset($instance['post_sortby'])) {

        switch ($instance['post_sortby']) {

          case 'popularposts':
            $q_args['meta_key'] = 'aanir_post_views_count';
            $q_args['orderby']  = 'meta_value_num';
            break;

          case 'mostdiscussed':
            $q_args['orderby'] = 'comment_count';
            break;

          case 'tranding':

            $q_args['meta_query'][] = [
              'key'     => '_aanir_trending',
              'value'   => 'yes',
              'compare' => '=',
            ];
            break;

          default:
            $q_args['orderby'] = 'date';
            break;
        }
      }


      $the_query = new \WP_Query($q_args);

?>
      <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <div class="popular-post">
            <?php if (has_post_thumbnail() && $instance['enable_img']) : ?>
              <a href="<?php echo esc_url(get_the_permalink()); ?>">
                <?php if ($instance['enable_image_icon']) : ?>
                  <span class="sidebar-post fas fa-link"></span>
                <?php endif; ?>
                <?php if (function_exists('fw_resize')) : ?>
                  <?php $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_id())); ?>
                  <img src="<?php echo fw_resize($url, 80, 80); ?>" alt="<?php the_title_attribute(); ?>">
                <?php else : ?>
                  <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_id())); ?>" alt="<?php the_title_attribute(); ?>">
                <?php endif; ?>

              </a>
            <?php endif; ?>
            <h5><a href="<?php echo esc_url(get_the_permalink()); ?>"> <?php echo esc_html(get_the_title(get_the_id())); ?> </a></h5>
            <?php if ($instance['enable_date']) : ?>

              <?php if ($instance['enable_custom_date_format']) : ?>
                <span><?php echo get_the_date('M d, Y', get_the_id()); ?></span>
              <?php else : ?>
                <span><?php echo get_the_date(get_option('date_format'), get_the_id()); ?></span>
              <?php endif; ?>

            <?php endif; ?>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
      <?php endif; ?>
<?php

      echo $args['after_widget'];
    }
  }
}
