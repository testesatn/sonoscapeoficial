<h2 class="header"><?php echo $page_title; ?></h2>

<!-- Display update message if options have been updated -->
<?php if( isset( $_GET['message'] ) ): ?>
    <div id="message" class="updated below-h2"><p><?php print('Settings successfully updated!'); ?></p></div>
<?php endif; ?>

<div class="config-wrap">
    <p><?php print('Set your message you want to display it on your site.'); ?></p>
    <form action="" method="post" id="<?php echo $namespace; ?>-form">
        <div id="content">
            <?php wp_nonce_field( $namespace . "-update-options" ); ?>   
            <?php include( "messagebox.php" );?>
            
            <div class="highlight secondary">
                <h3><?php print('Notification Message Position'); ?></h3>
                <p><input type="radio" name="data[position]" value="top" <?php if($this->get_option( 'position' ) == 'top') echo 'checked'; ?>> <label><?php print('Top'); ?></label></p>
                <p><input type="radio" name="data[position]" value="bottom" <?php if($this->get_option( 'position' ) == 'bottom') echo 'checked'; ?>> <label><?php print('Bottom'); ?></label></p>
            
                <h3><?php print('Message Container'); ?></h3>
                <p><input type="radio" name="data[type]" value="belt" <?php if($this->get_option( 'type' ) == 'belt') echo 'checked'; ?>> <label><?php print('Sticky Belt'); ?></label></p><img src="<?php print(plugins_url( COOKIES_DIRNAME . '/img/stickybelt.png' ));?>" title="Sticky Belt" alt="Sticky Belt" width="100%" height="auto">
                <p><input type="radio" name="data[type]" value="box" <?php if($this->get_option( 'type' ) == 'box') echo 'checked'; ?>> <label><?php print('Box'); ?></label></p><img src="<?php print(plugins_url( COOKIES_DIRNAME . '/img/popupbox.png' ));?>" title="Box" alt="Box" width="auto" height="100%">

                <h3><?php print('Container Theme'); ?></h3>
                <p class="aws-color-picker-parent"><b><?php print("Container Back-ground Color");?></b><br /><input type="text" name="data[bgcolor]" value="<?php echo ($this->get_option( 'bgcolor' ) ); ?>" class="aws-color-field" data-default-color="<?php echo ($this->get_option( 'bgcolor' ) ); ?>"><div style="position: absolute;" id="aws-color-picker"></div><b><?php print("Container Font Color");?></b><br /><input type="text" name="data[fcolor]" value="<?php echo ($this->get_option( 'fcolor' ) ); ?>" class="aws-color-field" data-default-color="<?php echo ($this->get_option( 'fcolor' ) ); ?>"><div style="position: absolute;" id="aws-color-picker"></div></p>

                <h3><?php print('Close Button Theme'); ?></h3>
                <p class="aws-color-picker-parent"><b><?php print("Close Button Back-ground Color");?></b><br /><input type="text" name="data[closecolor]" value="<?php echo ($this->get_option( 'closecolor' ) ); ?>" class="aws-color-field" data-default-color="<?php echo ($this->get_option( 'closecolor' ) ); ?>"><div style="position: absolute;" id="aws-color-picker"></div><b><?php print("Close Button Text");?></b><br /><input type="text" name="data[closetext]" value="<?php echo ($this->get_option( 'closetext' ) ); ?>"><br><br><div style="position: absolute;" id="aws-color-picker"></div><b><?php print("button Font Color");?></b><br /><input type="text" name="data[bfcolor]" value="<?php echo ($this->get_option( 'bfcolor' ) ); ?>" class="aws-color-field" data-default-color="<?php echo ($this->get_option( 'bfcolor' ) ); ?>"><div style="position: absolute;" id="aws-color-picker"></div></p>
                
            </div>
            <input type="hidden" name="action" value="awscpopup"/>
            <p class="submit">
                <input type="submit" name="Submit" class="button-primary" value="<?php print( "Save Changes"); ?>" />
            </p>
        </div>
    </form>