<?php
namespace App\Controller;
use App\Controller\AppController;
// use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


   class UserController extends AppController{

   
    // public function display(string ...$path): ?Response
    // {
    //     // $connection = ConnectionManager::get('default');
    //     // $results = $connection->execute('SELECT * FROM crud ')->fetchAll('assoc');
    //     // $this->set('results',$results);
    //     if (!$path) {
    //         return $this->redirect('/');
    //     }
    //     if (in_array('..', $path, true) || in_array('.', $path, true)) {
    //         throw new ForbiddenException();
    //     }
    //     $page = $subpage = null;

    //     if (!empty($path[0])) {
    //         $page = $path[0];
    //     }
    //     if (!empty($path[1])) {
    //         $subpage = $path[1];
    //     }
    //     $this->set(compact('page', 'subpage'));

    //     try {
    //         return $this->render(implode('/', $path));
    //     } catch (MissingTemplateException $exception) {
    //         if (Configure::read('debug')) {
    //             throw $exception;
    //         }
    //         throw new NotFoundException();
    //     }
    // }

    
    public function edit($id)
    {
       echo "edit".$id;
       
       $connection = ConnectionManager::get('default');
       $results = $connection->execute("SELECT * FROM crud WHERE id= '$id'")->fetch('assoc');
      //  print_r($results['name']);
       if($results['name']){
         $session = $this->request->getSession();
          $session->write("name",$results['name']);
          $value =  $session->read("name");
         //  echo $value;

       }
       
    

       
    }
      //  $this->set("name",$results['name']);
      //  echo $name;
     
    //    print_r($results);

      //  if($this->request->is('post')){
      //   //   $username = $this->request->getData('name');
      //   //   echo $username;
         
   
          
      //     $result = $connection->update('crud', ['id' => $id,"name" => $name], ['id' => $id]);
      //     $this->set('result',$result);
      //  }

    //    $updated_value = $connection->execute('SELECT * FROM crud WHERE id = :id', ['id' => $id])->fetchAll('assoc');
    //    $this->set("id",$updated_value[0]['id']);
    //    $this->set("name",$updated_value[0]['name']);
    // }

    // public function delete($id){
    //     $connection = ConnectionManager::get('default');
    //     $result = $connection->delete('cakecrud', ['id' => $id]);
    //     // $fetch_all = $connection->execute('SELECT * FROM users_temp')->fetchAll('assoc');
    //     // $this->set("results",$fetch_all);

    //  }


}

?>