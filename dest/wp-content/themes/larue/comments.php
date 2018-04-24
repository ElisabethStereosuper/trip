<div id="comments" class="aligncenter">
	<?php
	
		if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
			die ('Please do not load this page directly. Thanks!');
	
		if ( post_password_required() ) { ?>
			<?php esc_html_e('This post is password protected. Enter the password to view comments.', 'larue'); ?>
		<?php
			return;
		}
	?>
	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title"><span><?php comments_number(esc_html__('No Comments', 'larue'), esc_html__('1 Comment', 'larue'), esc_html__('% Comments', 'larue') );?></span></h2>
	
		<div class="navigation">
			<div class="next-posts"><?php previous_comments_link() ?></div>
			<div class="prev-posts"><?php next_comments_link() ?></div>
		</div>
	
		<ol class="unstyled commentlist clearfix">
			 <?php wp_list_comments(array('type'=> 'comment', 'callback' => 'larue_comment' )); ?>
		</ol>
		<?php //get ping and trackbacks
			global $post;
			$ping_entries = get_comments(array( 'type'=> 'pings', 'post_id' => $post->ID ));
			
			if(!empty($ping_entries)){
			echo "<h2 class='title pingbacklist'><span>".esc_html__('Trackbacks &amp; Pingbacks','larue')."</span></h2>";
			?>
			
			<ol class="pingbacklist">
				<?php
					/* 
					 * Loop through and list the pingbacks and trackbacks. 
					 */
					wp_list_comments( array( 'type'=> 'pings', 'reverse_top_level'=>true ) );
				?>
			</ol>
			<?php } ?>
		<div class="navigation">
			<div class="next-posts"><?php previous_comments_link() ?></div>
			<?php paginate_comments_links(); ?> 
			<div class="prev-posts"><?php next_comments_link() ?></div>
		</div>
		
	 <?php else : // this is displayed if there are no comments so far ?>
	
		<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
	
		 <?php else : // comments are closed ?>
			<p class="hidden"><?php esc_html_e('Comments are closed.', 'larue'); ?></p>
	
		<?php endif; ?>
		
	<?php endif; ?>
		
		
<?php if ( comments_open() ) : ?>

	<?php

		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		//Custom Fields
		$fields =  array(
			'author'=> '<div id="respond-inputs" class="row-fluid"><div class="span6"><input id="author" name="author" type="text" value="" placeholder="' . esc_html__('Name', 'larue') . ' *" size="30"' . $aria_req . ' /></div>',
			
			'email' => '<div class="span6"><input id="email" name="email" type="email" value="" placeholder="' . esc_html__('E-Mail', 'larue') . ' *" size="30"' . $aria_req . ' /></div>',
			'url' => '<div class="span12"><input id="url" name="url" type="url" value="" placeholder="' . esc_html__('Website', 'larue') . '" ' . $aria_req . ' /></div></div>'		
		);

		//Comment Form Args
        $comments_args = array(
			'fields' => $fields,
			'title_reply'=>esc_html__('Leave a comment', 'larue'),
			'comment_field' => '<div id="respond-textarea"><textarea id="comment" name="comment" placeholder="'.esc_html__('Add a Comment...','larue').'" aria-required="true" cols="58" rows="6" tabindex="4"></textarea></div>',
			'comment_notes_after' => '',
			'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title"><span>',
			'title_reply_after' => '</span></h3>',
			'comment_notes_before' => '',
			'logged_in_as' => '',
			'label_submit' => esc_html__('Post comment','larue')
		);
		
		// Show Comment Form
		comment_form($comments_args); 
	?>


<?php endif; // if you delete this the sky will fall on your head ?>

</div>