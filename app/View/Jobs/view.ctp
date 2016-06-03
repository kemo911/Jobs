<h3><?php echo $job['Job']['title'] ?></h3>
        <ul>
            <li><strong>Location : </strong> <?php echo $job['Job']['state'] ?></li>
            <li><strong>Job Type : </strong> <?php echo $job['Type']['name'] ;?></li>
            <li><strong>Description : </strong> <p><?php echo $job['Job']['description'] ;?></p></li>
            <li><strong>Contact Email : </strong> <a href="mailto:<?php echo $job['Job']['contact_email'] ;?>"><?php echo $job['Job']['contact_email'] ;?></a></li>
        </ul>
<p><a href="http://localhost/project/jobs/browse">Back to Jobs</a></p>
<br><br>
<?php echo $this->Html->link('Edit',array('action'=>'edit',$job['Job']['id'])); ?> | 
<?php echo $this->Form->postLink('Delete',array('action'=>'delete',$job['Job']['id']),array('confirm'=>'Are you sure ?')) ;?>