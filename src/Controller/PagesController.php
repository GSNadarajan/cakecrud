<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\Datasource\ConnectionManager;
use Cake\Network\Session;

use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('SELECT * FROM crud ')->fetchAll('assoc');
        $this->set('results',$results);
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function add(){
        if($this->request->is('post')){
           $id = $this->request->getData('id');
           $name = $this->request->getData('name');
           
           $connection = ConnectionManager::get('default');
           $result = $connection->insert('crud', [
              'id' => $id,
              'name' => $name,
          ]);
          $session = $this->request->getSession();
          $session->write("profile_update","success");
          $value = $admin_id = $session->read("profile_update");
          echo $value;
         
          
          $this->set('result',$result);
         
        }
     }
     

    //  public function edit($req)
    //  {
    //     echo "edit";
       
        // $connection = ConnectionManager::get('default');

        // if($this->request->is('post')){
        //    $username = $this->request->getData('name');
           
        //    $result = $connection->update('crud', ['id' => $id,"name" => $name], ['id' => $id]);
        //    $this->set('result',$result);
        // }

        // $updated_value = $connection->execute('SELECT * FROM crud WHERE id = :id', ['id' => $id])->fetchAll('assoc');
        // $this->set("id",$updated_value[0]['id']);
        // $this->set("name",$updated_value[0]['name']);
    //  }

    //  public function delete($id){
    //     $connection = ConnectionManager::get('default');
    //     $result = $connection->delete('cakecrud', ['id' => $id]);
    //     // $fetch_all = $connection->execute('SELECT * FROM users_temp')->fetchAll('assoc');
    //     // $this->set("results",$fetch_all);

    //  }


}
