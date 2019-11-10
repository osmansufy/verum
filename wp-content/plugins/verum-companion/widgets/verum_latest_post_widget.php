<?php

// Adds widget: Verum Latest Post
class Verumlatestpost_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'verumlatestpost_widget',
            esc_html__('Verum Latest Post', 'verum')
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Number of Post',
            'id' => 'verum_no_post',
            'default' => '3',
            'type' => 'number',
        ),
        array(
            'label' => 'Display thumnail',
            'id' => 'verum_display_thum',
            'default' => '1',
            'type' => 'checkbox',
        ),
        array(
            'label' => 'Display date',
            'id' => 'verum_display_date',
            'default' => '1',
            'type' => 'checkbox',
        ),
    );

    public function widget($args, $instance)
    {
        echo wp_kses_post($args['before_widget']);

        if (!empty($instance['title'])) {
            echo wp_kses_post($args['before_title']) . apply_filters('widget_title', $instance['title']) . wp_kses_post($args['after_title']);
        }
        $post_arg = array(
            'posts_per_page' => $instance['verum_no_post'],
            'post_type' => 'post',
            'post_status' => 'publish',
        );
        $latest_post = new WP_Query($post_arg);
        while ($latest_post->have_posts()) {
            $latest_post->the_post();
            ?>
                    <div class="media">
                    <?php
if ($instance['verum_display_thum']) {
                ?>
                        <a href="<?php the_permalink();?>"><?php the_post_thumbnail('verum_latestpost_thum', array('class' => "mr-3"));?></a>

                 <?php }
            ?>
                        <div class="media-body align-self-center">
                            <h6 class="mt-0"><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                            <?php
if ($instance['verum_display_date']) {
                ?>

                            <p class="text-muted"><?php echo get_the_date("F j, Y") ?></p>
                            <?php }
            ?>
                        </div>
                    </div>
       <?php
}
        wp_reset_query();
        // Output generated fields

        echo wp_kses_post($args['after_widget']);
    }

    public function field_generator($instance)
    {
        $output = '';
        foreach ($this->widget_fields as $widget_field) {
            $default = '';
            if (isset($widget_field['default'])) {
                $default = $widget_field['default'];
            }
            $widget_value = !empty($instance[$widget_field['id']]) ? $instance[$widget_field['id']] : esc_html__($default, 'verum');
            switch ($widget_field['type']) {
                case 'checkbox':
                    $output .= '<p>';
                    $output .= '<input class="checkbox" type="checkbox" ' . checked($widget_value, true, false) . ' id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" value="1">';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'verum') . '</label>';
                    $output .= '</p>';
                    break;
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'verum') . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . esc_attr($widget_value) . '">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'verum');
        ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'verum');?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<?php
$this->field_generator($instance);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        foreach ($this->widget_fields as $widget_field) {
            switch ($widget_field['type']) {
                default:
                    $instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
            }
        }
        return $instance;
    }
}

function register_verumlatestpost_widget()
{
    register_widget('Verumlatestpost_Widget');
}
add_action('widgets_init', 'register_verumlatestpost_widget');