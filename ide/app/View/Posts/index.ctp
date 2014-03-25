<!-- File : /app/View/post/index.ctp -->
<h1>
    <?php 
    echo __('Post_');
     ?>
</h1>
<?php 
echo $this->Html->link('English', array('language'=>'eng')) 
 ?>
&nbsp;
<?php 

echo $this->Html->link('Russian', array('language'=>'rus')) ?>
<?php 
echo $this->Html->link('ខ្មែរ', array('language'=>'khm')) 
 ?>
&nbsp;

<br/>
<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php 
            echo $this->Html->link(
            						$post['Post']['title'],
									array(
										'controller' => 'posts', 
										'action' => 'view', 
										$post['Post']['id'])); 
			?>
        </td>
        <td>
            <?php 
                echo $this->Html->link(
                                'Edit',
                                array(
                                        'action'=>'edit',
                                        $post['Post']['id']
                                        ));
             ?>
             <?php 
                echo $this->Form->postLink(
                    'Delete',
                    array('action'=>'delete',$post['Post']['id']),
                    array('confirm'=>'Are you sure?')                    
                    );
              ?>
        </td>

        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>