<?php

// Adds widget: VerumFlickrWidget
class Verumflickrwidget_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'verumflickrwidget_widget',
            esc_html__('VerumFlickrWidget', 'verum'),
            array('description' => esc_html__('Flickr Widget', 'verum')) // Args
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Flickr ID',
            'id' => 'verum_flickr_id',
            'type' => 'text',
        ),
        array(
            'label' => 'Number of photos',
            'id' => 'veum_number_photos',
            'default' => '12',
            'type' => 'text',
        ),
    );

    public function widget($args, $instance)
    {
        echo wp_kses_post($args['before_widget']);

        // Output generated fields

        $flickr_output = wp_remote_get(" https://api.flickr.com/services/rest/?method=flickr.people.getPhotos&api_key=c525f8a1f0c67508991ee657190aecc8&user_id={$instance['verum_flickr_id']}&per_page={$instance['veum_number_photos']}&format=json&nojsoncallback=1");
        if (is_array($flickr_output)) {
            $photos = json_decode($flickr_output['body'], true);

            ?>
<div class="flickr-photo-section">
        <div class="flickr-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/flickr.jpg" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/flickr@2x.jpg 2x" alt=""/>
        </div>
        <div class="flickr_gallery owl-carousel owl-theme">
<?php

            foreach ($photos['photos']['photo'] as $photo) {
                $flckrurl = "https://farm{$photo['farm']}.staticflickr.com/{$photo['server']}/{$photo['id']}_{$photo['secret']}_z.jpg";
                ?>
    <div class="item">
                <a target="_blank" href="https://www.flickr.com/photos/<?php echo esc_attr($instance['verum_flickr_id']) ?>/<?php echo esc_attr($photo['id']) ?>/in/dateposted-public/"><img class="img-fluid" src="<?php echo esc_url($flckrurl) ?>" alt="<?php echo esc_attr($photo['title']) ?>"/></a>
            </div>
            <?php
}
            ?>
        </div>
        </div>
        <?php
}
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
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'verum') . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . esc_attr(($widget_field['type'])) . '" value="' . esc_attr($widget_value) . '">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form($instance)
    {
        $this->field_generator($instance);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        foreach ($this->widget_fields as $widget_field) {
            switch ($widget_field['type']) {
                default:
                    $instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
            }
        }
        return $instance;
    }
}

function register_verumflickrwidget_widget()
{
    register_widget('Verumflickrwidget_Widget');
}
add_action('widgets_init', 'register_verumflickrwidget_widget');
