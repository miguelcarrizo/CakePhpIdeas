<!-- app/View/Users/login.ctp -->
<!-- <div class="users form">
<?php //echo $this->Session->flash('auth'); ?>
<?php //echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php //echo __('Please enter your username and password'); ?>
        </legend>
        <?php //echo $this->Form->input('username');
        //echo $this->Form->input('password');
    ?>
    </fieldset>
<?php //echo $this->Form->end(__('Login')); ?>
</div>-->

<!-- app/View/Users/login.ctp -->
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
        <div class="form-box" id="login-box" style="margin-top: 0px;">
            <div class="header" style="background-color: #3c8dbc;">Bienvenido</div>
            <form action="../../index.html" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input  type="text" name="data[User][username]" placeholder="Usuario" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="data[User][password]"  class="form-control" required="required" value="" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-light-blue btn-block">Sign me in</button>  
                </div>
            </form>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
