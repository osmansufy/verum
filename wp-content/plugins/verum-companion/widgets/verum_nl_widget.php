<?php

// Adds widget: Mailchimp
class Mailchimp_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'mailchimp_widget',
            esc_html__('Mailchimp', 'verum')
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Massege',
            'id' => 'verum_nl_sms',
            'type' => 'textarea',
        ),
        array(
            'label' => 'Form submition url',
            'id' => 'verum_nl_url',
            'type' => 'url',
        ),
        array(
            'label' => 'Button',
            'id' => 'verum_nl_label',
            'type' => 'text',
        ),
    );

    public function widget($args, $instance)
    {
        echo wp_kses_post($args['before_widget']);

        if (!empty($instance['title'])) {

            echo wp_kses_post($args['before_title']);
            echo '<h2 class="widget-title mb-0"> ' . esc_html($instance['title']) . '</h2>';
            echo wp_kses_post($args['after_title']);
        }

        // Output generated fields
        // echo '<p>' . $instance['verum_nl_sms'] . '</p>';
        // echo '<p>' . $instance['verum_nl_url'] . '</p>';
        // echo '<p>' . $instance['verum_nl_label'] . '</p>';
        ?>


                    <p class="text-muted"><?php echo esc_html($instance['verum_nl_sms']); ?></p>

                    <form target="_blank" action="<?php echo esc_url($instance['verum_nl_url']); ?>" method="post">
                        <input type="text" class="form-control mb-3"/>
                        <button class="btn btn-default btn-block"><?php echo esc_html($instance['verum_nl_label']); ?></button>
                    </form>
        <?php

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
                case 'textarea':
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'verum') . ':</label> ';
                    $output .= '<textarea class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" rows="6" cols="6" value="' . esc_attr($widget_value) . '">' . $widget_value . '</textarea>';
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

function register_mailchimp_widget()
{
    register_widget('Mailchimp_Widget');
}
add_action('widgets_init', 'register_mailchimp_widget');