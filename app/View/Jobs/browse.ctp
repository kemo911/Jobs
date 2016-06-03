<?php echo $this->element('search'); ?>
<br>

<div id='category_block'>
    <ul>
        <hr>
        <?php foreach( $categories as $category) : ?>
            <li> <?php echo $this->Html->link($category['Category']['name'],array('action'=>'browse' ,$category['Category']['id']));?> </li>
        <?php endforeach ;?>    
            <hr>
    </ul>
</div>

<h3>Latest Job Listing</h3>
    <?php if($jobs) : ?>
            <ul id="listing">
            <?php  foreach( $jobs as $job)  :  ?>
                <li class="item">
                    <div class="type">
                        <span style="background: <?php echo $job['Type']['color'];?>"><?php echo $job['Type']['name'] ;?></span>
                    </div>
                    <div class="description">
                        <h5><?php echo $job['Job']['title'] ?></h5>
                        <span>
                            <?php echo $this->Time->format('F js h:i A',$job['Job']['created']) ?> <br>
                        </span>
                        <?php echo $this->Text->truncate($job['Job']['description'],250,array('ellipsis'=>'...','exact'=>false)) ?>
                        <?php echo $this->Html->link('Read More',array(
                            'controller'=>'jobs' ,
                            'action'=>'view',$job['Job']['id'])); 
                        ?>
                    </div>
                </li>
            <?php endforeach ; ?>

            </ul>
    <?php else : ?>
        <p>Sorry , No jobs available  </p>
    <?php endif ; ?>