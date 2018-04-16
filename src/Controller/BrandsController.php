<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;
use Cake\Mailer\Email;
use Cake\Core\Plugin;
use Cake\Filesystem\Folder;
use Cake\Routing\Router;
use Cake\Utility\Security;

/**
 * Brands Controller
 *
 * @property \App\Model\Table\BrandsTable $Brands
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BrandsController extends AppController
{

    
    
      public function initialize()
    {

        parent::initialize();
        $this->loadComponent('Flash'); 
    }
    
     public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
       // $this->Users->userAuth = $this->UserAuth;
        $this->Auth->allow(['index','add','view','delete','edit','status','positionUpdate']);
        
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        
        $name = '';
        $norec = 10;
        $status = '';
        $search = [];
        if (isset($this->request->query['name']) && trim($this->request->query['name']) != "") {
            $name = $this->request->query['name'];
            $search['Brands.name REGEXP'] = $name;
        }
        if (isset($this->request->query['status']) && trim($this->request->query['status']) != "") {
            $status = $this->request->query['status'];
            $search['Brands.status'] = $status;
        }
        if (isset($this->request->query['norec']) && trim($this->request->query['norec']) != "") {
            $norec = $this->request->query['norec'];
        }
         if (isset($search)) {
            $count = $this->Brands->find('all')
                    ->where([$search]);
        } else {
            $count = $this->Brands->find('all');
        }
        $count = $count->where(['Brands.status !=' => '2']);

        $this->paginate = ['limit' => $norec, 'order' => ['Brands.id' => 'DESC']];

        $brands = $this->paginate($count)->toArray();
        

        $this->set(compact('brands','name', 'status', 'norec'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $brands = $this->Brands->get($id);

        $this->set('brands', $brands);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $brands = $this->Brands->newEntity();
        if ($this->request->is('post')) {
            
            $data = $this->request->data;
            //$data['slug'] = $this->slugify($data['name']);
            $brands = $this->Brands->patchEntity($brands, $data);
         //   pr($brands);die;
            if ($this->Brands->save($brands)) {
                $this->Flash->success(__('The Brands has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Brands could not be saved. Please, try again.'));
        }
        $this->set(compact('brands'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $brands = $this->Brands->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
           $data = $this->request->data;
            $data['slug'] = $this->slugify($data['name']);
            $brands = $this->Brands->patchEntity($brands, $data);
           // pr($brands); die;
            if ($this->Brands->save($brands)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('brands'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
      
        $brands = $this->Brands->get($id);
        
           if ($brands->id !='') {
            
            $query = $this->Brands->query();
                     $result = $query->update()
                    ->set(['status' =>'2'])
                    ->where(['id' =>$brands->id])
                    ->execute();
            
            $this->Flash->success(__('The Brands has been deleted.'));
        } else {
            $this->Flash->error(__('The Brands could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
     public function statusUpdate()
    {
   
        
     $this->autoRender=false;
     
    
           $get_id = $this->request->data['id'];
           
           $status = $this->request->data['status'];

          if($status == '1')
           {
               $status_chg = '0';
           }
           
            else {
                    $status_chg = '1';
     
                           }
            $query = $this->Brands->query();
                     $result = $query->update()
                    ->set(['status' =>$status_chg])
                    ->where(['id' =>$get_id])
                    ->execute();
                     
            if($status_chg == '0')
            {
                
          echo '<button id='.$get_id.' class="btn btn-primary waves-effect" value='.$status_chg.' onclick="updateStatus(this.id,'.$status_chg.')" type="submit">Inactive</button>';
     
            }
            
            else
            {
                
                
      echo '<button id='.$get_id.' class="btn btn-success waves-effect" value='.$status_chg.' onclick="updateStatus(this.id,'.$status_chg.')" type="submit">Active</button>';
            
            }

}

 public function positionUpdate()
                      {
      
          $this->autoRender=false;
           $get_id = $this->request->data['category_id'];
           $position = $this->request->data['position'];
           
         //pr($get_id);  die;
           
           
             $PositionData = $this->Brands->find()
                                   ->select(['position'])
                                   ->where(['position' => $position, 'id !=' =>$get_id])->first();
             
            // pr($PositionData); die;

            if (!empty($PositionData)) {
                   
                         $this->Flash->error(__('Category position allready exist'));
                        //echo 'Category position allready exist';
                    return $this->redirect(['action' => 'index']); 
                    exit();
                    
            }
            else
            {
                $query = $this->Brands->query();
                     $result = $query->update()
                    ->set(['position' =>$position])
                    ->where(['id' =>$get_id])
                    ->execute();
                   echo '1';
                   exit();
                    //return json_encode($get_id);
                
            }
    
}


    
    
     public function beforeRender(\Cake\Event\Event $event) {
        parent::beforeRender($event);
        $this->viewBuilder()->theme('Admintheme');
    } 
}
