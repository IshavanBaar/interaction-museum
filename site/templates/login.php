<?php snippet('header-logged-out') ?>
<div class="header">
                <!-- Menu -->
            <?php snippet('menu')?>

            <?php snippet('search-bar') ?>
    </div>
<div class="container" role="main">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <!-- LOGIN TITLE -->
            <h2 style="text-align: center;"><?php echo $page->title()->html() ?></h2>

            <!-- ERROR MESSAGE -->
            <?php if($error): ?>
                <div class="alert alert-danger" role="alert">
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <span class="sr-only">Error:</span>
                  <?php echo $page->alert()->html() ?>
                </div>
            <?php endif ?>


            <!-- TODO styling of the form -->
            <form method="post">
                <div class="col-xs-12 loginField">
                    <label for="username" class="col-xs-5 ">Username: </label>
                    <input type="text" id="username" name="username" class="col-xs-7">
                </div>
                <div class="col-xs-12 loginField">
                    <label for="password" class="col-xs-5 ">Password: </label>
                    <input type="password" id="password" name="password" class="col-xs-7">
                </div>
                <br>
                <div>      
                    <input type="submit" name="login" value="<?php echo $page->button()->html() ?>" class="col-xs-12 btn btn-primary ">
                </div>
            </form>
        </div>
    </div>
</div>

<?php snippet('footer') ?>