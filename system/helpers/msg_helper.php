<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('image_folder'))
{
	function image_folder()
	{
		$CI =& get_instance();
		return $CI->config->slash_item('base_url');
	}
}

/////
///////////listing elements
/////

if ( ! function_exists('list_head'))
{
	function list_head($table='',$td1='',$o1='',$td2='',$o2='',$td3='',$o3='',$td4='',$o4='',$td5='',$o5='',$td6='',$o6='',$td7='',$o7='',$td8='',$o8='',$td9='',$o9='')
	{
		if($o1!='')
			$td1 .= '<div class="order-elements"><a class="up" href="'.base_url().$table.'/index/'.$o1.'/desc"></a><a class="down" href="'.base_url().$table.'/index/'.$o1.'/asc"></a></div>';
		if($o2!='')
			$td2 .= '<div class="order-elements"><a class="up" href="'.base_url().$table.'/index/'.$o2.'/desc"></a><a class="down" href="'.base_url().$table.'/index/'.$o2.'/asc"></a></div>';
		if($o3!='')
			$td3 .= '<div class="order-elements"><a class="up" href="'.base_url().$table.'/index/'.$o3.'/desc"></a><a class="down" href="'.base_url().$table.'/index/'.$o3.'/asc"></a></div>';
		if($o4!='')
			$td4 .= '<div class="order-elements"><a class="up" href="'.base_url().$table.'/index/'.$o4.'/desc"></a><a class="down" href="'.base_url().$table.'/index/'.$o4.'/asc"></a></div>';
		if($o5!='')
			$td5 .= '<div class="order-elements"><a class="up" href="'.base_url().$table.'/index/'.$o5.'/desc"></a><a class="down" href="'.base_url().$table.'/index/'.$o5.'/asc"></a></div>';
		if($o6!='')
			$td6 .= '<div class="order-elements"><a class="up" href="'.base_url().$table.'/index/'.$o6.'/desc"></a><a class="down" href="'.base_url().$table.'/index/'.$o6.'/asc"></a></div>';
		if($o7!='')
			$td7 .= '<div class="order-elements"><a class="up" href="'.base_url().$table.'/index/'.$o7.'/desc"></a><a class="down" href="'.base_url().$table.'/index/'.$o7.'/asc"></a></div>';
		if($o8!='')
			$td8 .= '<div class="order-elements"><a class="up" href="'.base_url().$table.'/index/'.$o8.'/desc"></a><a class="down" href="'.base_url().$table.'/index/'.$o8.'/asc"></a></div>';
		if($o9!='')
			$td9 .= '<div class="order-elements"><a class="up" href="'.base_url().$table.'/index/'.$o9.'/desc"></a><a class="down" href="'.base_url().$table.'/index/'.$o9.'/asc"></a></div>';
		
		$msg = '<tr>';
		if($td1 != '')
			$msg .= '<th>'.$td1.'</th>';
		if($td2 != '')
			$msg .= '<th>'.$td2.'</th>';
		if($td3 != '')
			$msg .= '<th>'.$td3.'</th>';
		if($td4 != '')
			$msg .= '<th>'.$td4.'</th>';
		if($td5 != '')
			$msg .= '<th>'.$td5.'</th>';
		if($td6 != '')
			$msg .= '<th>'.$td6.'</th>';
		if($td7 != '')
			$msg .= '<th>'.$td7.'</th>';
		if($td8 != '')
			$msg .= '<th>'.$td8.'</th>';
		if($td9 != '')
			$msg .= '<th>'.$td9.'</th>';
		$msg .= '<th width="60">Action</th>';
		
		$msg .= '</tr>';
		return $msg;
	}
}


if ( ! function_exists('list_item'))
{
	function list_item($status=-1,$id = 0,$url='',$td1='',$td2='',$td3='',$td4='',$td5='',$td6='',$td7='',$td8='',$td9='')
	{
		$msg = '<tr>';
		if($td1 != '')
			$msg .= '<td>'.$td1.'</td>';
		if($td2 != '')
			$msg .= '<td>'.$td2.'</td>';
		if($td3 != '')
			$msg .= '<td>'.$td3.'</td>';
		if($td4 != '')
			$msg .= '<td>'.$td4.'</td>';
		if($td5 != '')
			$msg .= '<td>'.$td5.'</td>';
		if($td6 != '')
			$msg .= '<td>'.$td6.'</td>';
		if($td7 != '')
			$msg .= '<td>'.$td7.'</td>';
		if($td8 != '')
			$msg .= '<td>'.$td8.'</td>';
		if($td9 != '')
			$msg .= '<td>'.$td9.'</td>';
		$msg .= '<td>'.icon_edit($url,$id).icon_del($url,$id);
		if($status>-1)
			$msg .= icon_status($url,$id,$status);
		$msg .= '</td>';
		$msg .= '</tr>';
		return $msg;
	}
}
////////

if ( ! function_exists('msg_attention'))
{
	function msg_attention($t = '')
	{
		$msg = '
			<div class="notification attention png_bg">
				<a href="#" class="close"></a>
				<div>
					Attention: '.$t.'
				</div>
			</div>
		';
		return $msg;
	}
}

if ( ! function_exists('msg_attention_echo'))
{
	function msg_attention_echo($t = '')
	{
		$msg = '
			<div class="notification attention png_bg">
				<a href="#" class="close"></a>
				<div>
					Attention: '.$t.'
				</div>
			</div>
		';
		echo $msg;
	}
}

/////error
if ( ! function_exists('msg_error'))
{
	function msg_error($t = '')
	{
		$msg = '
			<div class="notification error png_bg">
				<a href="#" class="close"></a>
				<div>
					Error: '.$t.'
				</div>
			</div>
		';
		return $msg;
	}
}

if ( ! function_exists('msg_error_echo'))
{
	function msg_error_echo($t = '')
	{
		$msg = '
			<div class="notification error png_bg">
				<a href="#" class="close"></a>
				<div>
					Error: '.$t.'
				</div>
			</div>
		';
		echo $msg;
	}
}

/////success
if ( ! function_exists('msg_success'))
{
	function msg_success($t = '')
	{
		$msg = '
			<div class="notification success png_bg">
				<a href="#" class="close"></a>
				<div>
					'.$t.'
				</div>
			</div>
		';
		return $msg;
	}
}

if ( ! function_exists('msg_success_echo'))
{
	function msg_success_echo($t = '')
	{
		$msg = '
			<div class="notification success png_bg">
				<a href="#" class="close"></a>
				<div>
					 '.$t.'
				</div>
			</div>
		';
		echo $msg;
	}
}

///info 
if ( ! function_exists('msg_info'))
{
	function msg_info($t = '')
	{
		$msg = '
			<div class="notification information png_bg">
				<a href="#" class="close"></a>
				<div>
					 '.$t.'
				</div>
			</div>
		';
		return $msg;
	}
}

if ( ! function_exists('msg_info_echo'))
{
	function msg_info_echo($t = '')
	{
		$msg = '
			<div class="notification information png_bg">
				<a href="#" class="close"></a>
				<div>
					 '.$t.'
				</div>
			</div>
		';
		echo $msg;
	}
}
//////icons

if ( ! function_exists('icon_edit'))
{
	function icon_edit($url = '#',$id=0)
	{
		$msg = '
			<a href="'.base_url().$url.'/edit/'.$id.'" title="Editar" class="edit" id="edit'.$id.'"><img src="'.image_folder().'design/icons/pencil.png" alt="Editar" /></a>
		';
		return $msg;
	}
}

if ( ! function_exists('icon_del'))
{
	function icon_del($url = '#',$id=0)
	{
		$msg = '
			<a href="#'.base_ajax().$url.'/del/'.$id.'" title="Borrar" class="delete" id="delete'.$id.'"><img src="'.image_folder().'design/icons/cross.png" alt="Borrar" /></a>
		';
		return $msg;
	}
}

if ( ! function_exists('icon_status'))
{
	function icon_status($url = '#',$id=0,$stat=1)
	{
		$msg = '
			<a href="#'.base_ajax().$url.'/status/'.$id.'/'.$stat.'" title="Cambiar Estado" class="status" id="status'.$id.'"><img id="imgstatus'.$id.'" src="'.image_folder().'design/icons/status_'.$stat.'.png" width="16" height="16" alt="Cambiar Estado" /></a>
		';
		return $msg;
	}
}

if ( ! function_exists('icon_metaedit'))
{
	function icon_metaedit($url = '#')
	{
		$msg = '
			<a href="'.base_url().$url.'" title="Meta Edit"><img src="'.image_folder().'design/icons/hammer_screwdriver.png" alt="Meta Edit" /></a>
		';
		return $msg;
	}
}
/*
 * contact info
 */
if ( ! function_exists('contact'))
{
	function contact($who = '')
	{
		if($who == '')
			return 'info@partyspace.com';
		if($who == 'sales1')
			return 'robyn@partyspace.com';
		if($who == 'sales2')
			return 'eliza@partyspace.com';
		if($who == 'registry')
			return 'registry@partyspace.com';
		if($who == 'tech1')
			return 'emek@partyspace.com';
		if($who == 'tech2')
			return 'mumin@partyspace.com';
		if($who == 'phone')
			return '1-866-312-9800';
		
	}
}

/* End of file url_helper.php */
/* Location: ./system/helpers/url_helper.php */