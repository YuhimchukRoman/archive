<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap a.0.1
 */

if ( have_comments() ) :
	if ( (is_page() || is_single()) && ( ! is_home() && ! is_front_page()) ) :
?>
	<section id="comments"><?php


		wp_list_comments(
			array(
				'walker'            => new bootstrap_Comments(),
				'max_depth'         => '',
				'style'             => 'ol',
				'callback'          => null,
				'end-callback'      => null,
				'type'              => 'all',
				'reply_text'        => __( 'Reply', 'bootstrap' ),
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 48,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'            => 'html5',
				'short_ping'        => false,
				'echo'  	    => true,
				'moderation' 	    => __( 'Your comment is awaiting moderation.', 'bootstrap' ),
			)
		);

		?>

 	</section>
<?php
	endif;
endif;
?>

<?php

	  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

	defined( 'ABSPATH' ) or die( __( 'Please do not load this page directly. Thanks!', 'bootstrap' ) );

	if ( post_password_required() ) { ?>
	<section id="comments">
		<div class="notice">
			<p class="bottom"><?php _e( 'This post is password protected. Enter the password to view comments.', 'bootstrap' ); ?></p>
		</div>
	</section>
	<?php
		return;
	}
?>

<?php
if ( comments_open() ) :
	if ( (is_page() || is_single()) && ( ! is_home() && ! is_front_page()) ) :
?>
<section id="respond" class="col-xs-12">
	<h3><?php comment_form_title( __( 'Leave a Reply', 'bootstrap' ), __( 'Leave a Reply to %s', 'bootstrap' ) ); ?></h3>
	<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
	<?php if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) : ?>
	<p><?php printf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'bootstrap' ), wp_login_url( get_permalink() ) ); ?></p>
	<?php else : ?>
	<form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" method="post" class="form-group" id="commentform">
		<?php if ( is_user_logged_in() ) : ?>
		<p><?php printf( __( 'Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'bootstrap' ), get_option( 'siteurl' ), $user_identity ); ?> <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php __( 'Log out of this account', 'bootstrap' ); ?>"><?php _e( 'Log out &raquo;', 'bootstrap' ); ?></a></p>
		<?php else : ?>
		<p>
			<label for="author">
				<?php
					_e( 'Name', 'bootstrap' ); if ( $req ) { _e( ' (required)', 'bootstrap' ); }
				?>
			</label>
			<input type="text" class="five form-control" name="author" id="author" value="<?php echo esc_attr( $comment_author ); ?>" size="22" tabindex="1" <?php if ( $req ) { echo "aria-required='true'"; } ?>>
		</p>
		<p>
			<label for="email">
				<?php
					_e( 'Email (will not be published)', 'bootstrap' ); if ( $req ) { _e( ' (required)', 'bootstrap' ); }
				?>
			</label>
			<input type="text" class="five form-control" name="email" id="email" value="<?php echo esc_attr( $comment_author_email ); ?>" size="22" tabindex="2" <?php if ( $req ) { echo "aria-required='true'"; } ?>>
		</p>
		<p>
			<label for="url">
				<?php
					_e( 'Website', 'bootstrap' );
				?>
			</label>
			<input type="text" class="five form-control" name="url" id="url" value="<?php echo esc_attr( $comment_author_url ); ?>" size="22" tabindex="3">
		</p>
		<?php endif; ?>
		<p>
			<label for="comment">
					<?php
						_e( 'Comment', 'bootstrap' );
					?>
			</label>
			<textarea name="comment" id="comment" tabindex="4" class="form-control"></textarea>
		</p>
		<p id="allowed_tags" class="small"><strong>XHTML:</strong> 
			<?php
				_e( 'You can use these tags:','bootstrap' );
			?> 
			<code>
				<?php echo allowed_tags(); ?>
			</code>
		</p>
		<p><input name="submit" class="btn btn-primary" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e( 'Submit Comment', 'bootstrap' ); ?>"/></p>
		<?php comment_id_fields(); ?>
		<?php do_action( 'comment_form', $post->ID ); ?>
	</form>
	<?php endif; // If registration required and not logged in. ?>
</section>
<?php
	endif; // If you delete this the sky will fall on your head.
	endif; // If you delete this the sky will fall on your head.
?>