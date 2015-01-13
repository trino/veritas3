<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class SettingsComponent extends Component
{
    function get_permission($uid)
   {
        $setting = TableRegistry::get('sidebar');
         $query = $setting->find()->where(['user_id'=>$uid]);
                 
         $l = $query->first();
         return $l;
         
   }
   
   function getprofilebyclient($u,$super)
   {
        $cond = [];
        $pro_id = [];
         if(!$super)
            {
                $clients = TableRegistry::get('clients');
                
                
                $qs = $clients->find()->select('profile_id')->where(['profile_id LIKE "'.$u.',%" OR profile_id LIKE "%,'.$u.',%" OR profile_id LIKE "%,'.$u.'" OR profile_id ="'.$u.'"'])->all();
                //debug($qs);
                foreach($qs as $q)
                {
                    
                    $p = explode("," ,$q->profile_id);
                    foreach($p as $pro)
                    {
                        array_push($pro_id,$pro);
                    }
                }
                //var_dump($pro_id);die();
                $pro_id =array_unique($pro_id);
               
                foreach($pro_id as $pid)
                {
                     array_push($cond,['id'=>$pid]);
                }
                
               
            }
            else
                $cond = ['id >'=>'0'];
            return $cond;
   }
    function getclientids($u,$super)
   {
        $cond = [];
        $pro_id = [];
         if(!$super)
         {
            
            $clients = TableRegistry::get('clients');
            $qs = $clients->find()->select('id')->where(['profile_id LIKE "'.$u.',%" OR profile_id LIKE "%,'.$u.',%" OR profile_id LIKE "%,'.$u.'" OR profile_id ="'.$u.'"'])->all();
            $pro_id = [];
            $cond = [];
            //debug($qs);
            foreach($qs as $q)
            {
                
                $p = explode("," ,$q->id);
                foreach($p as $pro)
                {
                    array_push($pro_id,$pro);
                }
            }
            //var_dump($pro_id);die();
            $pro_id =array_unique($pro_id);
           
            foreach($pro_id as $pid)
            {
                 array_push($cond,['client_id'=>$pid]);
            }
        }
        else
            $cond = ['id >'=>'0'];
      return $cond;
        
    }
}
