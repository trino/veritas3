<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
    use Cake\Event\Event;

class SettingsComponent extends Component
{
    function get_permission($uid)
   {
        $setting = TableRegistry::get('sidebar');
         $query = $setting->find()->where(['user_id'=>$uid]);
                 
         $l = $query->first();
         return $l;
         
   }
   
   function getprofilebyclient($u,$super,$cid="")
   {
        $cond = [];
        $pro_id = [];
        $clients = TableRegistry::get('clients');
        if($cid != "")
        {
           $qs = $clients->find()->select('profile_id')->where(['id'=>$cid])->first();
           if(count($qs)>0)
           {
                $p = explode("," ,$qs->profile_id);
                foreach($p as $pro)
                {
                    array_push($pro_id,$pro);
                }
                $pro_id =array_unique($pro_id);
                   
                foreach($pro_id as $pid)
                {
                     array_push($cond,['id'=>$pid]);
                }
            }
            else
            {
                  $cond = ['id >'=>'0'];
            }
            
        }
        else
        {
             if(!$super)
            {
                
                
                
                $qs = $clients->find()->select('profile_id')->where(['profile_id LIKE "'.$u.',%" OR profile_id LIKE "%,'.$u.',%" OR profile_id LIKE "%,'.$u.'" OR profile_id ="'.$u.'"'])->all();
                if(count($qs)>0)
                {
                    foreach($qs as $q)
                    {
                        
                        $p = explode("," ,$q->profile_id);
                        foreach($p as $pro)
                        {
                            array_push($pro_id,$pro);
                        }
                    }
                    //var_dump($pro_id);
                    $pro_id =array_unique($pro_id);
                   
                    foreach($pro_id as $pid)
                    {
                         array_push($cond,['id'=>$pid]);
                    }
                }
                else
                {
                    $cond = ['id >'=>'0'];
                }                
               
            }
            else
                $cond = ['id >'=>'0'];
        }
            //var_dump($cond);
        return $cond;
   }
    function getclientids($u,$super,$model="")
   {
    
        if($model!="")
            $model =$model.".";
        $cond = [];
        $pro_id = [];
         if(!$super)
         {
            
            $clients = TableRegistry::get('clients');
            $qs = $clients->find()->select('id')->where(['profile_id LIKE "'.$u.',%" OR profile_id LIKE "%,'.$u.',%" OR profile_id LIKE "%,'.$u.'" OR profile_id ="'.$u.'"'])->all();
            $pro_id = [];
            $cond = [];
            if(count($qs)>0)
            {
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
                     array_push($cond,[$model.'client_id'=>$pid]);
                }
            }
            else
                $cond = [$model.'id >'=>'0'];
        }
        else
            $cond = [$model.'id >'=>'0'];
      return $cond;
        
    }
    
    function check_pro_id($id)
    {
        $profile = TableRegistry::get('profiles');
        $query = $profile->find()->select('id')->where(['id'=>$id]);
                 
         $l = $query->first();
        if(!$l)
        {
            return 1;
        }
    }
    
    function check_client_id($id)
    {
        $profile = TableRegistry::get('clients');
        $query = $profile->find()->select('id')->where(['id'=>$id]);
                 
         $l = $query->first();
        if(!$l)
        {
            return 1;
        }
    }
    
    
    function check_permission($uid,$pid)
    {
        $user_profile = TableRegistry::get('profiles');
        $query = $user_profile->find()->where(['id'=>$uid]);
        $q1 = $query->first();
        if($q1)
        {
            $profile = $user_profile->find()->select('profile_type')->where(['id'=>$pid]);
            $q2 = $profile->first();
            $usertype = $q1->profile_type;
            $uptype = $q2;
            
            if($q2->super == '1' && ($q1->super == '1'))
            {
                return 1;
            }
            else
            {
              if($q2->super != '1')
              {
                if($usertype == '2'){
                $pt = $q2;
                if( $pt=='5' || $pt=='7' || $pt=='8' /*|| $q1->profile_type==$q2->id*/ || $uid==$pid)    
                return 1;
                }
                else
                return 1;
              }  
              else return 0;
            }
            //else return 0;
        }
        
    }
    
    function check_client_permission($uid,$cid)
    {
        $client_profile = TableRegistry::get('clients');
        $user_profile = TableRegistry::get('profiles');
        $query = $user_profile->find()->where(['id'=>$uid]);
        $q1 = $query->first();
        if($q1)
        {
            $profile = $user_profile->find()->where(['id'=>$uid]);
            $q2 = $profile->first();
            $usertype = $q1->profile_type;
        
            $client = $client_profile->find()->select('profile_id')->where(['id'=>$cid]);
            $q2 = $client->first();
            //var_dump($q2); echo $uid; die();
            $arr = explode(',',$q2->profile_id);
            if(in_array($uid,$arr) || $usertype== 1 || $q1->super == 1 || $q1->admin == 1 )
            {
                return 1;
             }
            else return 0;
            }
    }

}
