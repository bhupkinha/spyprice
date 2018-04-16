<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\View\Helper\FormHelper;
use Cake\Utility\Text;
use Cake\Network\Http\Client;
use Cake\Network\Response;
use Cake\Network\Request;
use Cake\I18n\Time;

class CommonHelper extends Helper {

    public $helpers = ['Form','Html','Time', 'Text'];
  
    public function getBreadcrumbAdminTwoLevel($controller, $action, $firsttitle, $secondtitle) {
        $breadHtml = '<ol class="breadcrumb breadcrumb-col-orange"> 
               <li>' . $this->Html->link(' '.__('Dashboard'), ["controller" => "Users", "action" => "dashboard"]) .
                '</li><li>' . $this->Html->link(__($firsttitle), ["controller" => $controller, "action" => $action])
                . '</li><li class="active">' . __($secondtitle) . '</li></ol>';
        return $breadHtml;
    } 
     
    
    public function getStatus() {
        return['1' => 'Active', '0' => 'Inactive'];
    }
 
 

  
    /*
     * truncate description
     */
    public function turnCatefun($text,$number)
    {
        return $this->Text->truncate(
                    $text,
                    $number,
                    [
                        'ellipsis' => '...',
                        'exact' => false
                    ]
                );
        
    }
   
public function getCategorytype() {
        return['1' => 'News', '2' => 'Faqs'];
    }
public function getpricerange() {
        return['500' => 'Less 500', '5000' => 'Less 5000', '100000' => 'Greater 5000'];
    }
    
    public function getNoOfRec() {
        return [10 => 10, 20 => 20, 30 => 30, 40 => 40, 50 => 50, 100 => 100];
    }
    
    
    public function getCategory()
    {
        $get_category          = TableRegistry::get('Categories');
        $cat_lists = $get_category->find('all')->select(['name', 'slug'])->where(['status' => 1])->toArray();
        return $cat_lists;
    }
    public function getFeatures()
    {
        $get_features          = TableRegistry::get('Features');
        $features_lists = $get_features->find('list')->where(['status' => 1])->toArray();
        return $features_lists;
    }
    public function getBrands()
    {
        $get_brands          = TableRegistry::get('Brands');
        $brands_lists = $get_brands->find('list')->where(['status' => 1])->toArray();
        return $brands_lists;
    }
    
  
 


    
    /*
     * Get breaking news
     */


    
    
}
