<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

  //
  // Create a about widget
  //
  CSF::createWidget('aanir_ess_contact_info', array(
    'title'       => esc_html__('Aanir Contact info', 'aanir-essential'),
    'classname'   => 'footer-widget-info',
    'description' => esc_html__('Contact info', 'aanir-essential'),
    'fields'      => array(

      array(
        'id'      => 'title',
        'type'    => 'text',
        'title'   => esc_html__('Title', 'aanir-essential'),
      ),


      array(
        'id'     => 'contact_list',
        'type'   => 'repeater',
        'title'  => esc_html__('Contact List', 'aanir-essential'),
        'fields' => array(

          array(
            'id'      => 'icon',
            'type'    => 'icon',
            'title'   => esc_html__('Icon', 'aanir'),
            'desc'    => esc_html__('Set the profile icon like (email,location )', 'aanir'),
            'default' => 'fal fa-envelope'
          ),

          array(
            'id'          => 'link_type',
            'type'        => 'select',
            'title'       => 'Select',
            'placeholder' => 'Link Type',
            'options'     => array(
              'phone'    => 'Phone',
              'email'    => 'Email',
              'url'      => 'Url',
              'location' => 'Location',
            ),
            'default'     => 'location'
          ),

          array(
            'id'      => 'link',
            'type'    => 'text',
            'title'   => esc_html__('Link ?', 'aanir'),
          ),

          array(
            'id'      => 'content',
            'type'    => 'textarea',
            'title'   => esc_html__('Content', 'aanir'),

          ),

        ),
      ),


    )
  ));

  if (!function_exists('aanir_ess_contact_info')) {
    function aanir_ess_contact_info($args, $instance)
    {

      echo $args['before_widget'];

      if (!empty($instance['title'])) {
        echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
      }

?>

      <?php if (is_array($instance['contact_list'])) : ?>
        <div class="footer-widget-info">
          <ul>
            <?php foreach ($instance['contact_list'] as $item) : ?>

              <?php

              $link = $item['link'];
              $link_type = $item['link_type'];

              if ($link_type == 'phone') {
                $link = 'tel:' . $link;
              }

              if ($link_type == 'email') {
                $link = 'mailto:' . $link;
              }

              ?>
              <li>
                <?php if ($link != '') : ?>
                  <a href="<?php echo 'url' == $link_type ? esc_url($link) : esc_attr($link); ?>">
                  <?php endif; ?>
                  <i class="<?php echo esc_attr($item['icon']); ?>"></i>
                  <?php echo esc_html($item['content']); ?>
                  <?php if ($link != '') : ?>
                  </a>
                <?php endif; ?>
              </li>

            <?php endforeach; ?>
          </ul>
        </div>

      <?php endif; ?>

<?php

      echo $args['after_widget'];
    }
  }
}
