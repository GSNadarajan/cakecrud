<table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Name</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>

     
    </tr>
  </thead>
  <tbody>

  <?php
    
    foreach($results as $key => $value){
      ?>
        <tr>
              <th scope="row"><?=$key+1?></th>
              <td><?=$value['name']?></td>
              <td>
                <a href="<?=$this->Url->build(["controller" => "User","action" => "edit",$value['id']])?>">Update
                </a> 
              </td>
              <td> <a href="<?=$this->Url->build(["controller" => "Pages","action" => "delete",$value['id']])?>"> Delete </a>


        </td>
            </tr>
      <?php
    }
    // use Cake\ORM\TableRegistry;

  ?>
    

  </tbody>
</table>
