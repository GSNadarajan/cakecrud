<?php

 echo $this->Form->create(NULL,array('url'=>'/Pages/add', 'class' => 'add'));
 if(isset($_POST['name'])){
    if($result){
        ?>
        <div class="alert alert-primary" role="alert">
           Added successfully
        </div>
        <?php
    }else{
        
        ?>
        <div class="alert alert-danger" role="alert">
         Failed to add the user
        </div>

    <?php
    }
   }
 echo $this->Form->control('id',['id' => 'id' ,'value' => '','required']);
 echo $this->Form->control('name',['id' => 'name','value' => '','required']);
 echo $this->Form->button('Add user');


?>