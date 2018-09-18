<?php
define('IPP',500);///item per page
class Pcfunc extends Model {
	function Pcfunc()
	{
		parent::Model();
		$this->load->helper('url');	
		$this->load->database();
		$this->lang_key = $this->getLangKey();
		$this->last_id = 0;
	}
	function getLangKey()
	{
		if($this->uri->segment(1) == 'es')
			return 'es';
		else
			return 'en';
	}
	function getPostValue($name,$type = 'textbox') {
    	$value = '';
    	if($type == 'checkbox'){
    		if(isset($_POST[$name])){
    			$value = 1;
    		}else{
    			$value = 0;
    		}	
    	}else{
    		$value = mysql_real_escape_string($_POST[$name]);
    		if ($value == '') {
    			$value = NULL;
    		}
    	}
    	
    	return $value;
    }
    
    function itemPerPage($table) 
	 {
    	$cp = 1;
		$nor = $this->db->count_all($table);
		if(is_numeric($nor) && $nor>0){
			$np = $nor/IPP;
			$npInt = intval($nor/IPP);
		}else{
			$np=0;
			$npInt =0;
		}
		if (isset($_REQUEST['cp']) && is_numeric($_REQUEST['cp']))
			$cp = $_REQUEST['cp'];
		if($np>1){
			echo '<tr><td colspan="6"><div class="pagination">';
			if(($cp-3)>0)
				echo '<a href="?cp=1" title="First Page">&laquo; First</a>';
			if(($cp-3)>0)
				echo '<a href="?cp='.($cp-1).'" title="Previous Page">&laquo; Previous</a>';
				
			if(($cp-2)>0)
				echo '<a href="?cp='.($cp-2).'" class="number" title="'.($cp-2).'">'.($cp-2).'</a>';
			if(($cp-1)>0)
				echo '<a href="?cp='.($cp-1).'" class="number" title="'.($cp-1).'">'.($cp-1).'</a>';
			echo '<a href="?cp='.($cp).'" class="number current" title="'.($cp).'">'.($cp).'</a>';
			if(($cp)<$np)
				echo '<a href="?cp='.($cp+1).'" class="number" title="'.($cp+1).'">'.($cp+1).'</a>';
			if(($cp+1)<$np)
				echo '<a href="?cp='.($cp+2).'" class="number" title="'.($cp+2).'">'.($cp+2).'</a>';
			if(($cp+2)<$np)
				echo '<a href="?cp='.($cp+1).'" title="Next Page">Next &raquo;</a>';
			if(($cp+3)<$np)
				echo '<a href="?cp='.($npInt).'" title="Last Page">Last &raquo;</a>';
			echo '<div class="clear"></div></td></tr>';
			
		}
    }
    
    
	function mainIU($table = '',$values= '',$id = 0)
	{
		$this->db->trans_start();
    	if($id == 0){
    		$rs = $this->db->insert($table, $values); 
    		$this->last_id = $this->db->insert_id();
    	}else{
    		$where = 'id = '.$id;
    		$str = $this->db->update_string($table, $values, $where);
    		$rs = $this->db->query($str);
    	}
    	$this->db->trans_complete();
    	if($this->db->trans_status() === FALSE){
    		if($id==0)
    			return msg_error('Error on While Inserting Item');
    		else
    			return msg_success('Error on While Updating Item');
    	}else{
    		if($id==0)
    			return msg_success('New Item Successfully Inserted');
    		else
    			return msg_success('The Item Successfull Updated');
    	}
	}
	function mainDel($table = '',$id = 0,$table2=''){
    	if($table2!=''){
			$this->db->where($table.'_id', $id);	
	    	$this->db->from($table2);	
			$products = $this->db->count_all_results();
	    	if($products>0){
	    		//return msg_error('The Item has sub items!! You need to delete these sub items first to perform delete action.');
	    		//$arr = array ('stat'=>false,'text'=>'The Item has sub items!! You need to delete these sub items first to perform delete action.');
				//echo json_encode($arr);
				//echo '{"stat":"false","text","The Item has sub items!! You need to delete these sub items first to perform delete action."}';
				echo 'no';
	    		return false;
	    	}
    	}
    	$this->db->delete($table, array('id' => $id)); 
    	//return msg_success('The Item is successfully deleted.');
    	//$arr = array ('stat'=>true,'text'=>'The Item is successfully deleted.');
		//echo json_encode($arr);
		//echo '{"stat":"true","text","The Item is successfully deleted."}';
		//return true;
		echo 'yes';
    }
	function changeStatus($table,$id,$status,$table2='',$table3='')
    {
    	$tableCheck = strtolower($table);
    	if($status == 1)
    		$status = 0;
    	else
    		$status=1;
    	$rs = $this->db->query("UPDATE $table SET status = $status WHERE id = $id");
    	if($table2!='')
    		$rs2 = $this->db->query("UPDATE $table2 SET status = $status WHERE ".$tableCheck."_id = $id");
    	if($table3!='')
    		$rs3 = $this->db->query("UPDATE $table3 SET status = $status WHERE ".$tableCheck."_id = $id");
    	echo 'yes';
	    return true;
    }
	function changeAboutMeStatus($id = 0)
	{
    	$this->db->query("update About_Me set status = 0");
    	$this->db->query("update About_Me set status = 1 where id = $id");
    }
	function getMainList($table,$items,$order,$dic='asc',$where = '',$getAll = FALSE) 
	{
		$list = FALSE;
		$cp = 1;
		if (isset($_REQUEST['cp']) && is_numeric($_REQUEST['cp']))
			$cp = $_REQUEST['cp'];
		$cp = $cp-1;	
		if($getAll)
			$query = $this->db->query("select id, $items from $table $where order by $order $dic");
		else 
			$query = $this->db->query("select id, $items from $table $where order by $order $dic limit ".($cp*IPP).",".IPP." ");
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row){
		   	  $p = explode(',',$items);
			  foreach($p as $val){
				$list[$row->id][$val] = $row->$val;
			  }
		   }
		}
		return $list;
	}
    
	function getMainImage($id)
	{
		$query = $this->db->query("SELECT default_img_id FROM Portfolio_Items WHERE id = $id ");	
		if ($query->num_rows() > 0) {
    		$row = $query->row();
    		return $row->default_img_id;
		}
		return 0;
	}
	
	function getPortfolioItems($status = FALSE)
	{
		$name = "name_".$this->lang_key;
		$description = "description_".$this->lang_key;
		$title = "title_".$this->lang_key;
		$WHERE = '';
		if($status)
			$WHERE = ' WHERE PI.status = 1';
		$list = FALSE;
		$query = $this->db->query("SELECT PI.id,PI.$name, PI.$description ,PI.status, I.image_url, I.$title FROM Portfolio_Items AS PI LEFT JOIN Images AS I ON (I.id = PI.default_img_id ) $WHERE ");	
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row)
			{
    			$list[$row->id]['name'] = $row->$name;
    			$list[$row->id]['status'] = $row->status;
    			$list[$row->id]['desci'] = $row->$description;
    			$list[$row->id]['image'] = $row->image_url;
    			$list[$row->id]['image_title'] = $row->$title;
			}
		}
		return $list;
	}
	
	function getReferences()
	{
		$description = "desci_".$this->lang_key;
		
		$list = FALSE;
		$query = $this->db->query("SELECT * FROM Our_References WHERE status = 1");	
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row)
			{
    			$list[$row->id]['title'] = $row->title;
    			$list[$row->id]['desci'] = $row->$description;
    			$list[$row->id]['ref_url'] = $row->ref_url;
			}
		}
		return $list;
	}
	
	function getPortfolioItemsAdmin($status = FALSE) {
		$WHERE = '';
		if($status)
			$WHERE = ' WHERE PI.status = 1';
		$list = FALSE;
		$query = $this->db->query("SELECT PI.id,PI.name_es, PI.description_es ,PI.status, I.image_url, I.title_es FROM Portfolio_Items AS PI LEFT JOIN Images AS I ON (I.id = PI.default_img_id ) $WHERE ");	
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row)
			{
    			$list[$row->id]['name'] = $row->name_es;
    			$list[$row->id]['status'] = $row->status;
    			$list[$row->id]['desci'] = $row->description_es;
    			$list[$row->id]['image'] = $row->image_url;
    			$list[$row->id]['image_title'] = $row->title_es;
			}
		}
		return $list;
	}
	function getPortfolioImages($id)
	{
		$description = "description_".$this->lang_key;
		$title = "title_".$this->lang_key;
		$list = FALSE;
		$query = $this->db->query("SELECT * FROM Images WHERE portfolio_items_id = $id AND status = 1");
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row)
			{
    			$list[$row->id]['title'] = $row->$title;
    			$list[$row->id]['desci'] = $row->$description;
    			$list[$row->id]['image'] = $row->image_url;
			}
		}
		return $list;
	}
	function getPortfolioItem($id) {
		$values['id'] = $id;
    	$values['name_en'] = '';
		$values['description_en'] = '';
		$values['name_es'] = '';
		$values['description_es'] = '';
		if ($id != 0){
			$query = 'select * from Portfolio_Items where id = '.$id.' ';
    		$rs = $this->db->query($query);
    		if ($rs->num_rows() > 0) {
    			$row = $rs->row();
    			$values['id'] = $id;
		    	$values['name_en'] = $row->name_en;
		    	$values['description_en'] = $row->description_en;
		    	$values['name_es'] = $row->name_es;
		    	$values['description_es'] = $row->description_es;
    		}
		}
		return $values;
    }
	
    function getImage($id = 0) {
    	$values['id'] = $id;
    	$values['title_en'] = '';
    	$values['description_en'] = '';
    	$values['title_es'] = '';
    	$values['description_es'] = '';
		$values['image_url'] = '';
		
		if ($id != 0){
			$query = 'select * from Images where id = '.$id.' ';
    		$rs = $this->db->query($query);
    		if ($rs->num_rows() > 0) {
    			$row = $rs->row();
    			$values['id'] = $id;
		    	$values['title_es'] = $row->title_es;
				$values['description_es'] = $row->description_es;
				$values['title_en'] = $row->title_en;
				$values['description_en'] = $row->description_en;
				$values['image_url'] = base_url().'images/'.$row->image_url;
    		}
		}
		return $values;
    }
	 
    function getAboutMe($id = 0){
    	$values['id'] = $id;
    	$values['title_en'] = '';
    	$values['body_text_en'] = '';
    	$values['title_es'] = '';
    	$values['body_text_es'] = '';
		
		if ($id != 0){
			$query = 'select * from About_Me where id = '.$id.' ';
    		$rs = $this->db->query($query);
    		if ($rs->num_rows() > 0) {
    			$row = $rs->row();
    			$values['id'] = $id;
		    	$values['title_en'] = $row->title_en;
				$values['body_text_en'] = $row->body_text_en;
				$values['title_es'] = $row->title_es;
				$values['body_text_es'] = $row->body_text_es;
    		}
		}
		return $values;
    }
    
    function getReference($id)
    {
    	$values['id'] = $id;
    	$values['title'] = '';
    	$values['desci_en'] = '';
    	$values['desci_es'] = '';
    	$values['ref_url'] = '';
		
		if ($id != 0){
			$query = 'select * from Our_References where id = '.$id.' ';
    		$rs = $this->db->query($query);
    		if ($rs->num_rows() > 0) {
    			$row = $rs->row();
    			$values['id'] = $id;
		    	$values['title'] = $row->title;
				$values['desci_en'] = $row->desci_en;
				$values['desci_es'] = $row->desci_es;
				$values['ref_url'] = $row->ref_url;
    		}
		}
		return $values;
    }
    
 	function getAboutMeText(){
 		$title = "title_".$this->lang_key;
 		$body_text = "body_text_".$this->lang_key;
    	$list['title'] = '';
    	$list['body'] = '';
    	$rs = $this->db->query("select $title,$body_text from About_Me where status = 1 ");
    	if ($rs->num_rows() > 0) {
    		$row = $rs->row();
			$list['title'] = $row->$title;
    		$list['body'] = $row->$body_text;
    	}
		return $list;
    }
    function getImages($catId = 0, &$catName = '') 
	 {
		if($catId == 0)
    		$query = 'select cuadros.id, categorias_id, order_number, title, description, image_url, prev_width, prev_height, cuadros.status, categorias.name from cuadros INNER JOIN categorias on categorias_id = categorias.id where cuadros.status = 1 order by order_number';
    	else
    		$query = 'select cuadros.id, categorias_id, order_number, title, description, image_url, prev_width, prev_height, cuadros.status, categorias.name from cuadros INNER JOIN categorias on categorias_id = categorias.id where categorias_id = '.$catId.' and cuadros.status = 1 order by order_number ';
			
    	/*if($catId == 0)
    		$query = 'select * from cuadros where status = 1 order by order_number ';
    	else
    		$query = 'select * from cuadros where categorias_id = '.$catId.' and status = 1 order by order_number ';*/
    	$list = FALSE;
    	$rs = $this->db->query($query);
    	if ($rs->num_rows() > 0) {
	    	foreach ($rs->result() as $row)
			{
				$list[$row->id]['image'] = $row->image_url;
				$list[$row->id]['title'] = $row->title;
				$list[$row->id]['desci'] = $row->description;
				$list[$row->id]['prev_width'] = $row->prev_width;
				$list[$row->id]['prev_height'] = $row->prev_height;
				$catName = $row->name;
			}
    	}
    	return $list;
    }
	 
	function getEvents() 
	{
    	$query = "select *, DATE_FORMAT(event_date, '%d/%m/%Y') as edate from eventos where status = 1 order by event_date desc";
    	$list = FALSE;
    	$rs = $this->db->query($query);
    	if ($rs->num_rows() > 0) {
	    	foreach ($rs->result() as $row){
				$list[$row->id]['image'] = $row->image_url;
				$list[$row->id]['title'] = $row->title;
				$list[$row->id]['desci'] = $row->description;
				$list[$row->id]['date'] = $row->edate;
			   }
    	}
    	return $list;
    }
    
    function createPrev($folder = '',$file=''){
    	$root = '/home/emilioronzoni/public_html/images/';
    	$src = $root.$folder.'/'.$file;
    	$desti = $root.$folder.'_prev/'.$file;
    	$img = $src;
		$min_area = 70000;
		$x = @getimagesize($img);
		$sw = $x[0];
		$sh = $x[1];
		if($sw > $sh)
		{
			$w = 350;
			$temp = 350 * 100 / $sw;
			$h = round($temp * $sh / 100);
			
			$current_area = ($w * $h); 
			if($current_area < $min_area)
			{
				$plus_percentage = $min_area / $current_area;
				$w = round($w * $plus_percentage);
				$h = round($h * $plus_percentage);	
				//make sure that the wide side does not go over the limit
				if($w > 500) 
				{
					$w = 500;
					$temp = 500 * 100 / $sw;
					$h = round($temp * $sh / 100);
				}
			}
		}
		else
		{
			$h = 350;
			$temp = 350 * 100 / $sh;
			$w = round($temp * $sw / 100);
			$current_area = ($w * $h); 
			if($current_area < $min_area)
			{
				$plus_percentage = $min_area / $current_area;
				$w = round($w * $plus_percentage);
				$h = round($h * $plus_percentage);	
			}
		}
		$im = @ImageCreateFromJPEG ($img) or
		$im = @ImageCreateFromPNG ($img) or 
		$im = @ImageCreateFromGIF ($img) or 
		$im = false; 
		
		if (!$im) {
			readfile ($img);
		} else {
			$thumb = @ImageCreateTrueColor ($w, $h);
			ImageCopyResampled ($thumb, $im, 0,0,0,0, $w, $h, $sw, $sh);
			imagejpeg($thumb, $desti, 90); //save prev image
		}	
		
		$dimensions['width'] = round($w /1.8); //$w; //reduce image size a bit
		$dimensions['height'] = round($h /1.8); // $h; //reduce image size a bit
		
		return $dimensions;
    }
	 
	 //this is a utility funcition and should only be called once when the 
	 function resetImgsSizes() 
	 {
		 $cuadros = $this->getImages();
		 foreach($cuadros as $key => $value)
		 {
			 $imgSize = $this->createPrev('cuadros', $value['image']);
			 $this->db->query("update cuadros set prev_width = ".$imgSize['width'].", prev_height = ".$imgSize['height']." where id = $key");
		 }
	 }
	 
	 function isDefaultImage($protfolioId,$imageId)
	 {
	 	$query = $this->db->query("SELECT id FROM Images WHERE portfolio_items_id = $protfolioId ");
    	if ($query->num_rows() == 1)
    	{
    		$this->db->query("UPDATE Portfolio_Items SET default_img_id = $imageId WHERE id = $protfolioId ");
    	}
	 }
	 function isDefaultAboutMe()
	 {
	 	$query = $this->db->query("SELECT id FROM About_Me");
    	if ($query->num_rows() == 1)
    	{
    		$this->db->query("UPDATE About_Me SET status = 1");
    	}
	 }
	 
	 
	function sendContactFormEntry($vals = FALSE)
	{
		if(is_array($vals) && isset($vals['name']) && isset($vals['email']) && isset($vals['subject']) && isset($vals['message']))
		{
		   $headers = "Content-type:text/html;charset=utf-8\n";		
		   $headers .= "From: NORALATORRE.COM <paisajismonoralatorre@gmail.com>\n";
		   $headers .= "Bcc: paisajismonoralatorre@gmail.com; info@noralatorre.com; noralatorre@yahoo.com.ar; notifications@hoaworldwide.com \n";
		   $message = '<html> <table>
						    <tr><th>Nombre</th><td>'.$vals['name'].'</td></tr>
						    <tr><th>Email</th><td>'.$vals['email'].'</td></tr>
						    <tr><th>Tema</th><td>'.$vals['subject'].'</td></tr>
						    <tr><th>Mensaje</th><td>'.$vals['message'].'</td></tr>
						  </table>
						</html>
						';
		
		   mail('info@noralatorre.com', 'Nuevo formulario de contacto', $message, $headers);
		   
			
		   $headers = "Content-type:text/html;charset=utf-8\n";		
		   $headers .= "From: NORALATORRE.COM <noralatorre@yahoo.com.ar>\n";
		   /*$message2 = '
				<html>
			<head>
			</head>
			<body>
			  <table>
			  	<tr>
			      <td><b>Hola '.$vals['name'].'</b>!</td>
			     </tr>
			     <tr>
			      <td>'.$this->lang->line('email-body').'</td>
			     </tr>
			  </table>
			</body>
			</html>';*/
			
			if(mail($vals['email'], $this->lang->line('email-subject'), $this->lang->line('email-body'), $headers))
		   {
		   		return TRUE;
		   }
		   else 
		   {
		   		return FALSE;
		   }
				
		}
		else 
		{
			return FALSE;
		}
    }
}
?>