<?php
/**
 * cf100 theme specific widget(s)
 *
 * @package cf100
 */

class cf100_address extends WP_Widget
{
  function cf100_address()
  {
    $widget_ops = array('classname' => 'cf100_address', 'description' => 'This widget is custom for St. Pauls Lutheran Church. It is used to display the cf100 address in large font, with a smaller link to a page with more information (for example the contact page or a google map).');
    $this->WP_Widget('cf100_address', 'cf100 Address Widget', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args((array) $instance, array( 'title' => '' ));
    $title = $instance['title'];
    $thecontent = $instance['thecontent'];
    $thelink = $instance['thelink'];
    $thelinklabel = $instance['thelinklabel'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label><br /><em>This is not shown on the website. It is only for your reference</em></p><br />
  <p><label for="<?php echo $this->get_field_id('thecontent'); ?>">Content: <textarea class="widefat" id="<?php echo $this->get_field_id('thecontent'); ?>" name="<?php echo $this->get_field_name('thecontent'); ?>" rows="6"><?php echo attribute_escape($thecontent); ?></textarea></label><br /><em>This is where the address goes. This text will be displayed in a larger font.</em></p><br />
  <p><label for="<?php echo $this->get_field_id('thelink'); ?>">Link address: <input class="widefat" id="<?php echo $this->get_field_id('thelink'); ?>" name="<?php echo $this->get_field_name('thelink'); ?>" type="text" value="<?php echo attribute_escape($thelink); ?>" /></label><br /><em>This is where the web address that users will be directed to. Be sure you include the full address, including the "http://" in the beginning.</em></p><br />
  <p><label for="<?php echo $this->get_field_id('thelinklabel'); ?>">Link label: <input class="widefat" id="<?php echo $this->get_field_id('thelinklabel'); ?>" name="<?php echo $this->get_field_name('thelinklabel'); ?>" type="text" value="<?php echo attribute_escape($thelinklabel); ?>" /></label><br /><em>This is the text for the above address. (for example: "Find us")</em></p><br />


<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['thecontent'] = strip_tags( $new_instance['thecontent'] );
    $instance['thelink'] = strip_tags( $new_instance['thelink'] );
    $instance['thelinklabel'] = strip_tags( $new_instance['thelinklabel'] );
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args);
 
    echo $before_widget;
 
    // widget output here:
    echo '<div class="addressWidget">';
    echo '<h3 class="addressWidgetContent">';
    echo $instance['thecontent'];
    echo '</h3>';
    echo '<a class="addressWidgetLink" href="';
    echo $instance['thelink'];
    echo '">';
    echo $instance['thelinklabel'];
    echo '&nbsp;&raquo;</a>';
    echo '</div>';
 
    echo $after_widget;
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("cf100_address");') );
