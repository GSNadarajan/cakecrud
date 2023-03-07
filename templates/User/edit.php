<?php
//     session_start();
//    print_r($_SESSION);
   
// echo "asdfasdf";
if(isset($_POST['username'])){
    echo "asdfasdf";

    if($result){
        ?>
        <div class="alert alert-primary" role="alert">
        User updated successfully
        </div>
        <?php
    }else{
        
        ?>
 <div class="alert alert-danger" role="alert">
        Error in database
        </div>

    <?php
    // print_r($results);
    $session = $this->request->getSession();
    // $session->write("name",$results['name']);
    $value = $session->read("name");
    echo $value;
    }
    ?>
    
<?php
   }
   echo $this->Form->create(NULL,array('url'=>'/User/edit.php/'.$id));
   echo $this->Form->control('id',['id' => 'id'],'required');
   echo $this->Form->control('username',['id' => 'name'],'required');
   echo $this->Form->button('Update');
   echo $this->Form->end();
?>