<?php

/**
 * The share bar
 *
 * Created by Sarah Gonçalves for Ericson Scorsim
 */
?>

<?php
$obj_id = get_queried_object_id();
$current_url = get_permalink($obj_id);
// talvez precise usar  home_url('') . 
?>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v5.0"></script>

<script>
/*Twitter Share Button*/

window.twttr = (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
      t = window.twttr || {};
    if (d.getElementById(id)) return t;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);
  
    t._e = [];
    t.ready = function(f) {
      t._e.push(f);
    };
  
    return t;
  }(document, "script", "twitter-wjs"))

</script>

<div class="share-bar">
    <span><?php _e('compartilhar:', 'twentytwenty'); ?></span>
    <ul class="share-bar_list">
        <li>
            <a class="share-bar_button" 
               href="https://twitter.com/intent/tweet" 
               data-text="<?php wp_strip_all_tags(the_title()); ?>" 
               data-url="<?php echo $current_url ?>">
               twitter
            </a>
        </li>
        <li>
            <div class="share-bar_button" 
                data-href="https://developers.facebook.com/docs/plugins/" 
                data-layout="button" 
                data-size="small">
                    <a target="_blank" 
                    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url ?>" class="fb-xfbml-parse-ignore">
                    facebook
                </a>
            </div>
        </li>
        <li>
            <a class="share-bar_button"
                href="mailto: ?Subject=Ericson%20Scorsim&Body=<?php echo $current_url ?>"  target="_blank">
                email
            </a>
        </li>
    </ul>
</div>