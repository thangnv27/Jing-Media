<?php if (post_password_required()) { ?>
    
	<?php return; } ?>
<div class="comments_block">
<?php if (have_comments()) : ?>
<hr/> 
<h4><?php _e("Comments", "dysaniatext"); ?></h4>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments', 'dysaniatext' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;', 'dysaniatext' )); ?></div><!-- end of .next -->
        <div class="clear"></div> 
    <?php endif; ?>

    <ol class="commentlist">
        <?php wp_list_comments('type=comment&callback=dysania_comment'); ?>
    </ol>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <hr/>
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments', 'dysaniatext' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;', 'dysaniatext' )); ?></div><!-- end of .next -->
        <div class="clear"></div> 
    <?php endif; ?>

<?php else : ?>

<?php endif; ?>

<?php
if (!empty($comments_by_type['pings'])) : // let's seperate pings/trackbacks from comments
    $count = count($comments_by_type['pings']);
    ($count !== 1) ? $txt = __('Pings&#47;Trackbacks', 'dysaniatext') : $txt = __('Pings&#47;Trackbacks', 'dysaniatext');
?>

    <h6 id="pings"><?php printf( __( '%1$d %2$s for "%3$s"', 'dysaniatext'), $count, $txt, get_the_title() )?></h6>

    <ol class="commentlist">
        <?php wp_list_comments('type=pings&max_depth=<em>'); ?>
    </ol>

<?php endif; ?>
<?php if (comments_open()) : ?>
<hr/>    
<?php comment_form(); ?>   
<?php endif; ?> 
</div>    

