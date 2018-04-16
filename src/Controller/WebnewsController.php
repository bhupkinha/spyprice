<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Http\Client;
use Cake\Mailer\Email;
use Cake\Cache\Cache;
use Cake\Routing\Router;
use App\View\Helper\CommonHelper;
/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[] paginate($object = null, array $settings = [])
 */
class WebnewsController extends AppController {

    public function initialize() {
        parent::initialize();
    

    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
       $this->Auth->allow(['index', 'getFilter']);
        
    }

   

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    //for webnews index page

    
    public function index($categoryslug = '') {

        $Product = TableRegistry::get('Product');
        $categoryname='';
        $cataactive='';
        $name = '';
        $source = '';
        $norec = 10;
        $Products = '1';
        
        $search = [];
         if (!empty($categoryslug)) {
             $cataactive = $categoryslug;
             $categoryname = ucfirst(str_replace('-', ' ', $categoryslug));
             $search['Categories.slug'] = $categoryslug;
            }
      
        if (isset($this->request->query['search']) && trim($this->request->query['search']) != "") {
            $productsrh = $this->request->query['search'];
            //$search['Product.name REGEXP'] = $productsrh;
        }

        if (isset($search)) {

            $count = $Product->find()
                    ->find('all')
                     ->contain(['Categories', 'Brands', 'Features'])
                    ->where([$search]);
            
                if  (isset($productsrh) && !empty($productsrh)) {
            
            $count = $count->where(['OR' =>['Product.name REGEXP' => $productsrh,'Brands.name REGEXP' => $productsrh,'Features.name REGEXP' => $productsrh]]);
            
        }
          //pr($count); die;
        } else {
            $count = $Product->find()
                    ->contain(['Categories', 'Brands', 'Features'])
                    ->find('all');
        }
        $count = $count->where(['Product.status !=' => '2']);
        $this->paginate = [
            'limit' => $norec,
            'contain' => ['Brands', 'Categories', 'Features'],
            'order' => ['created' => 'desc']
        ];
        $Products = $this->paginate($count);
 // pr($Products); die;

        $this->set(compact('Products','categoryname','cataactive'));
        $this->set('_serialize', ['Product']);
    }
    
      public function getFilter() {
    $this->viewBuilder()->layout("ajax");
    $Product = TableRegistry::get('Product');
    $limit = 10;
       $Products = '';
       $feature_id = '';
       $brand_id = '';
   if (isset($this->request->data['chkArrayfeature']) && $this->request->data['chkArrayfeature'] != "") {
             $chkArrayfeature = $this->request->data['chkArrayfeature'];
             $feature_id = explode(',', $chkArrayfeature);
           //  pr($feature_id); die; 
        }
   if (isset($this->request->data['chkArraybrand']) && $this->request->data['chkArraybrand'] != "") {
             $chkArraybrand = $this->request->data['chkArraybrand'];
             $brand_id = explode(',', $chkArraybrand);
           // pr($brand_id); die; 
        }
   if (isset($this->request->data['price_id']) && $this->request->data['price_id'] != "") {
             $price_id = $this->request->data['price_id'];
            // $brand_id = explode(',', $chkArraybrand);
           // pr($brand_id); die; 
        }
        
       $result = $Product->find('all')
                ->contain(['Categories', 'Brands', 'Features'])
                ->where(['Product.status' => 1])
                ->order(['Product.created' => 'DESC']);

        if (!empty($feature_id && !empty($brand_id))) {
            
            $result = $result->where(['OR' =>['Product.feature_id IN' => $feature_id,'Product.brand_id IN' => $brand_id]]);
            
        } else {
            if (isset($feature_id) && !empty($feature_id)) {
                $result = $result->where(['Product.feature_id IN' => $feature_id]);
            }
            if (isset($brand_id) && !empty($brand_id)) {
                $result = $result->where(['Product.brand_id IN' => $brand_id]);
            }
        }
            if (isset($price_id) && !empty($price_id)) {
                $result = $result->where(['Product.price <=' => $price_id]);
            }
       
       //pr($result); die;
          $Products = $result->limit($limit)->toArray();  
         // pr($Products); die;
            
   $this->set(compact('Products'));
   }
   
    public function beforeRender(\Cake\Event\Event $event) {
        parent::beforeRender($event);
        $this->viewBuilder()->theme('Webs');
    }

}
