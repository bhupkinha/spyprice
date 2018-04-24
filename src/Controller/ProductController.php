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
 * Features Controller
 *
 * @property \App\Model\Table\FeaturesTable $Features
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductController extends AppController
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
       
        $norec = 10;
        $search = [];
        if (isset($this->request->query['norec']) && trim($this->request->query['norec']) != "") {
            $norec = $this->request->query['norec'];
        }
        
        if (isset($search)) {
            $count = $this->Product->find('all')
                    ->where([$search]);
          //  pr($count); die;
        } else {
            $count = $this->Product->find('all');
        }
        $count = $count->where(['Product.status !=' => '2']);
        
        $this->paginate = ['limit' => $norec, 'order' => ['Product.id' => 'DESC'],'contain' => ['Categories', 'Brands', 'Features']];

        $product = $this->paginate($count)->toArray();        
        //pr($product); die;

        $this->set(compact('product'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Product->get($id, [
            'contain' => ['Categories', 'Brands', 'Features']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Product->newEntity();
        if ($this->request->is('post')) {
             $data = $this->request->data;
//            if (!empty($data['feature_id'])) {
//                    $feature_id  = $data['feature_id'];
//                    $feature_comma = implode(",", $feature_id);
//                    $data['feature_id'] = $feature_comma;
//                }
// if (!empty($data['brand_id'])) {
//                    $brand_id  = $data['brand_id'];
//                    $brand_comma = implode(",", $brand_id);
//                    $data['brand_id'] = $brand_comma;
//                }
                  if (isset($this->request->data['images']['name']) && $data['images']['name'] != "") {
                $flname = time() . str_replace(" ", "", $data['images']['name']);
                $flpath = WWW_ROOT . "img/" . $flname;
                if (move_uploaded_file($data['images']['tmp_name'], $flpath)) {
                    $data['images'] = $flname;
                }
            }
               // pr($data); die;
                
            $product = $this->Product->patchEntity($product, $data);
           // pr($product); die;
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Product->Categories->find('list')->where(['status' => 1]);
        $brands = $this->Product->Brands->find('list')->where(['status' => 1]);
        $features = $this->Product->Features->find('list')->where(['status' => 1]);
        $this->set(compact('product', 'categories', 'brands', 'features'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Product->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
                $data = $this->request->data;
//            if (!empty($data['feature_id'])) {
//                    $feature_id  = $data['feature_id'];
//                    $feature_comma = implode(",", $feature_id);
//                    $data['feature_id'] = $feature_comma;
//                }
// if (!empty($data['brand_id'])) {
//                    $brand_id  = $data['brand_id'];
//                    $brand_comma = implode(",", $brand_id);
//                    $data['brand_id'] = $brand_comma;
//                }
              //  $data['imhhm'] = $product->images;
                  if (isset($this->request->data['images']['name']) && $data['images']['name'] != "") {
                $flname = time() . str_replace(" ", "", $data['images']['name']);
                $flpath = WWW_ROOT . "img/" . $flname;
                if (move_uploaded_file($data['images']['tmp_name'], $flpath)) {
                    $data['images'] = $flname;
                }
            } else {
                $data['images'] = $product->images;
            }
           // pr($data);die;
            $product = $this->Product->patchEntity($product, $data);
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Product->Categories->find('list')->where(['status' => 1]);
        $brands = $this->Product->Brands->find('list')->where(['status' => 1]);
        $features = $this->Product->Features->find('list')->where(['status' => 1]);
        $this->set(compact('product', 'categories', 'brands', 'features'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   public function delete($id = null)
    {
      
        $brands = $this->Product->get($id);
        
           if ($brands->id !='') {
            
            $query = $this->Product->query();
                     $result = $query->update()
                    ->set(['status' =>'2'])
                    ->where(['id' =>$brands->id])
                    ->execute();
            
            $this->Flash->success(__('The Product has been deleted.'));
        } else {
            $this->Flash->error(__('The Product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function beforeRender(\Cake\Event\Event $event) {
        parent::beforeRender($event);
        $this->viewBuilder()->theme('Admintheme');
    }   
    
}
