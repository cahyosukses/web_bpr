<?php get_header('admin'); ?>
<div class="account-container stacked">

    <div class="content clearfix">

        <?php echo $this->session->flashdata('message'); ?>
        <form action="<?php echo $form_action; ?>" method="post">
            <h1>Sign In</h1>
            <div class="login-fields">
                <div class="field">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Username" class="login username-field" />
                </div> <!-- /field -->
                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="login password-field"/>
                </div> <!-- /password -->
            </div> <!-- /login-fields -->
            <div class="login-actions">
                <span class="login-checkbox">
                    <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                    <label class="choice" for="Field">Keep me signed in</label>
                </span>
                <button class="button btn btn-warning btn-large">Sign In</button>

            </div> <!-- .actions -->            

            <!--div class="login-social">
                <p>Sign in using social network:</p>
                <div class="twitter">
                    <a href="#" class="btn_1">Login with Twitter</a>
                </div>
                <div class="fb">
                    <a href="#" class="btn_2">Login with Facebook</a>
                </div>
            </div-->
        </form>
        <a href="<?php echo site_url('admin/users/sign_up/'); ?>">Sign up</a>
    </div> <!-- /content -->
</div> <!-- /account-container -->


<?php get_footer('admin'); ?>