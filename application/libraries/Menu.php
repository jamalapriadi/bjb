<?php if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

class Menu
{    
	public function tampilmenu(){
		$this->ci = & get_instance();
		$uri1 =$this->ci->uri->segment(1);
		$uri2 =$this->ci->uri->segment(2);

		if ($uri2) {
			$uri2 = '/'.$uri2;            
		}else{ $uri2 = '';}
		$uriSegment = $uri1.$uri2;        
						
		$uri3 =$this->ci->uri->segment(3);
		if ($uri3) {
			$uri3 = '/'.$uri3;
		}else{ $uri3 = '';}        
						
		$url=$uri1.$uri2.$uri3;
        echo $this->dynamicMenu($url);
	}

    public function dynamicMenu($url){
        $this->ci = & get_instance();
        $CI = &get_instance();        
        $getMenuActive=$this->getMenuActive($url);
		$sql="SELECT id, name, link, icon, is_parent FROM menu
				where is_active=1
				ORDER BY sort asc";
		$user_menu =  $this->ci->db->query($sql);
		$menu = array(
            'items' => array(),
            'parents' => array(),
        );
        
        foreach($user_menu->result_array() as $items){
        	$menu['items'][$items['id']]=$items;
        	$menu['parents'][$items['is_parent']][] = $items['id'];	
        }
		return $output = $this->buildMenu(0, $menu, $getMenuActive);
    }
	
	public function getMenuActive($url){
		$this->ci = & get_instance();

		$sql="select a.id from menu a
				where a.link='".$url."'";
		$result=$this->ci->db->query($sql);
		$row=$result->result_array();
		$num = count($row);
		if ($num>0) {
			$data[] =  $row[0]['id'];
			$data=array_merge($this->getParent( $row[0]['id']),$data);
        } else {
            return false;
        }
		return $data;
	}
	public function getParent($id=0){
		$this->ci = & get_instance();

		$sql	= "select a.is_parent id_parent from menu a
					where a.id='".$id."'";
		$query 	= $this->ci->db->query($sql);
		$num	= $query->num_rows();
		if($num>0){
			foreach($query->result_array() as $row){
				$data[]=$row['id_parent'];	
			}
		}else{
			return false;
		}
		return $data;
	}
    
    public function buildMenu($parent, $menu, $getMenuActive, $flag=null)
    {
		$html = '';   		
        if (isset($menu['parents'][$parent])) {
            if($flag !=null){
                $html .= "<ul class='treeview-menu'>"; 
            }else{
                $html .= "<ul class='sidebar-menu'>";
            }
            
            foreach ($menu['parents'][$parent] as $itemId) {
                
                $result = $this->active_id($menu['items'][$itemId]['id'],$getMenuActive);
                if ($result) {
                    $active = "class='active'";
                } else {
                    $active = '';
                }                
                               
                if (isset($menu['parents'][$itemId])) { //if condition is p 
                    $html .= "<li class='treeview'><a href='#'>";
					$html .= "<i class='".$menu['items'][$itemId]['icon']." sidebar-nav-icon'></i>";
					$html .= "<span>".$menu['items'][$itemId]['name']."</span>";
					$html .= "<i class='fa pull-right fa-angle-left'></i>";
					$html .= "</a>";
					$html .= self::buildMenu($itemId, $menu, $getMenuActive, $flag=1);
					$html .= "</li>";
                } 
                
                if (!isset($menu['parents'][$itemId])) { //if condition is parent   
					$html .= "<li ".$active ."> <a href='".base_url().$menu['items'][$itemId]['link']."' ".$active ."><i class='".$menu['items'][$itemId]['icon']."'></i>";
					$html .= "".$menu['items'][$itemId]['name']."</a></li>";
					//echo $itemId.', ';
                } 
            }
            $html .= "</ul>";
        }        
        return $html;
        print_r($html);
        die();
    }

    public function active_id($id, $getMenuActive)
    {
        $CI = &get_instance();
		$activeId = $getMenuActive;
        if (!empty($activeId)) {
            foreach ($activeId as $v_activeId) {
                if ($id == $v_activeId) {
                    return true;
                }
            }
        }
        return false;
    }
}
