<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>

        <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('kickstart');
                echo $this->Html->css('style');
                echo $this->Html->script('jquery');
                echo $this->Html->script('kickstart');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div id="container" class="grid">
    <header>
        <div class="col_6 column">
            <h1 ><a href="<?php $this->webroot; ?>"><strong class="title_icon">Job</strong>Finds </a></h1>
        </div>
        
        <div class="col_6 column right welcome">
            <?php if(AuthComponent::user('id')) : ?>
            <h6>Welcome <strong><?php echo $userData['username']; ?></strong></h6>
            <a href="http://localhost/project/users/logout">Logout</a>
            <?php endif; ?>
            
        </div>
        
        <div class="col_6 column">
            <form action='<?php $this->webroot;?>jobs/add'>
                <button id="add" class="large green">
                    <i class="icon-plus"></i> Add Job</button> 
            </form>
        </div>
    </header>
    
    <div class="col_12 column">
        <!-- Menu Horizontal -->
            <ul class="menu">
            <li <?php echo($this->here =='/project/' || $this->here == '/project/jobs')? 'class="current"' : '' ; ?>><a href="http://localhost/project/"><i class="fa fa-home"> </i> Home</a></li>
            <li <?php echo($this->here =='/project/jobs/browse')? 'class="current"' : '' ;?>><a href="http://localhost/project/jobs/browse"><i class="fa fa-desktop"> </i> browse Jobs</a></li>
            <li <?php echo($this->here =='/project/users/register')? 'class="current"' : '' ;?>><a href="http://localhost/project/users/register"><i class="fa fa-user"> </i> Register</a></li>
            <li <?php echo($this->here =='/project/users/login')? 'class="current"' : '' ;?>><a href="http://localhost/project/users/login"><i class="fa fa-key"> </i> Login</a></li>
            
            </ul>
    </div>
    
    
    <div class="col_12 column">
        <?php $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
	</div>
    
    <div class="clearfix"></div>
    <footer id="footer">
        <center> <p> This Site Made By Kemooo &copy;</p> </center>
    </footer>
</div> <!-- End Grid -->
</body>
</html>
