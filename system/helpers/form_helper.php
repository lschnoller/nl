<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2009, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Form Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/form_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Form Declaration
 *
 * Creates the opening portion of the form.
 *
 * @access	public
 * @param	string	the URI segments of the form destination
 * @param	array	a key/value pair of attributes
 * @param	array	a key/value pair hidden data
 * @return	string
 */	
if ( ! function_exists('form_open'))
{
	function form_open($action = '', $attributes = '', $hidden = array())
	{
		$CI =& get_instance();

		if ($attributes == '')
		{
			$attributes = 'method="post"';
		}

		$action = ( strpos($action, '://') === FALSE) ? $CI->config->site_url($action) : $action;

		$form = '<form action="'.$action.'"';
	
		$form .= _attributes_to_string($attributes, TRUE);
	
		$form .= '>';

		if (is_array($hidden) AND count($hidden) > 0)
		{
			$form .= form_hidden($hidden);
		}

		return $form;
	}
}

// ------------------------------------------------------------------------

/**
 * Form Declaration - Multipart type
 *
 * Creates the opening portion of the form, but with "multipart/form-data".
 *
 * @access	public
 * @param	string	the URI segments of the form destination
 * @param	array	a key/value pair of attributes
 * @param	array	a key/value pair hidden data
 * @return	string
 */
if ( ! function_exists('form_open_multipart'))
{
	function form_open_multipart($action, $attributes = array(), $hidden = array())
	{
		$attributes['enctype'] = 'multipart/form-data';
		return form_open($action, $attributes, $hidden);
	}
}

// ------------------------------------------------------------------------

/**
 * Hidden Input Field
 *
 * Generates hidden fields.  You can pass a simple key/value string or an associative
 * array with multiple values.
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_hidden'))
{
	function form_hidden($name, $value = '', $recursing = FALSE)
	{
		static $form;

		if ($recursing === FALSE)
		{
			$form = "\n";
		}

		if (is_array($name))
		{
			foreach ($name as $key => $val)
			{
				form_hidden($key, $val, TRUE);
			}
			return $form;
		}

		if ( ! is_array($value))
		{
			$form .= '<input type="hidden" name="'.$name.'" value="'.form_prep($value, $name).'" />'."\n";
		}
		else
		{
			foreach ($value as $k => $v)
			{
				$k = (is_int($k)) ? '' : $k; 
				form_hidden($name.'['.$k.']', $v, TRUE);
			}
		}

		return $form;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('form_hr'))
{
	function form_hr()
	{
		return '<hr></hr>';
	}
}
// -----------------------------------------------------------------------
/**
 * Text Input Field
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_input'))
{
	function form_input($obl = FALSE,$title = '',$data = '', $value = '', $extra = '',$desci=FALSE)
	{
		if($obl)
			$oblspan = '<span class="obl"> * </span>';
		else
			$oblspan = '';
		$defaults = array('type' => 'text', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
		if($desci)
			$desci = '<br /><small>'.$desci.'</small>';
		else
			$desci = '';
		return '
			<p>
				<label>'.$title.$oblspan.'</label>
				<input class="text-input small-input" '._parse_form_attributes($data, $defaults).$extra.' />
				'.$desci.'
			</p>
		';
	}
}
if ( ! function_exists('form_inputx2'))
{
	function form_inputx2($obl = FALSE,$title = '',$name1 = '', $val1 = '',$name2 = '', $val2 = '', $extra = '',$desci=FALSE)
	{
		if($obl)
			$oblspan = '<span class="obl"> * </span>';
		else
			$oblspan = '';
		if($desci)
			$desci = '<br /><small>'.$desci.'</small>';
		else
			$desci = '';
		return '
			<p>
				<label>'.$title.$oblspan.'</label>
				<input id="'.$name1.'" class="text-input small-input" type="text" name="'.$name1.'" value="'.$val1.'" '.$extra.' />
				<input id="'.$name2.'" class="text-input small-input" type="text" name="'.$name2.'" value="'.$val2.'" '.$extra.' />
				'.$desci.'
			</p>
		';
	}
}

if ( ! function_exists('form_input_medium'))
{
	function form_input_medium($obl = FALSE,$title = '',$data = '', $value = '', $extra = '',$desci=FALSE)
	{
		if($obl)
			$oblspan = '<span class="obl"> * </span>';
		else
			$oblspan = '';
		$defaults = array('type' => 'text', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
		if($desci)
			$desci = '<br /><small>'.$desci.'</small>';
		else
			$desci = '';
		return '
			<p>
				<label>'.$title.$oblspan.'</label>
				<input class="text-input medium-input" '._parse_form_attributes($data, $defaults).$extra.' />
				'.$desci.'
			</p>
		';
	}
}

if ( ! function_exists('form_input_large'))
{
	function form_input_large($obl = FALSE,$title = '',$data = '', $value = '', $extra = '',$desci=FALSE)
	{
		if($obl)
			$oblspan = '<span class="obl"> * </span>';
		else
			$oblspan = '';
		$defaults = array('type' => 'text', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
		if($desci)
			$desci = '<br /><small>'.$desci.'</small>';
		else
			$desci = '';
		return '
			<p>
				<label>'.$title.$oblspan.'</label>
				<input class="text-input large-input" '._parse_form_attributes($data, $defaults).$extra.' />
				'.$desci.'
			</p>
		';
	}
}

// ------------------------------------------------------------------------

/**
 * Password Field
 *
 * Identical to the input function but adds the "password" type
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_password'))
{
	function form_password($obl = FALSE,$title ='',$data = '', $value = '', $extra = '',$desci=FALSE)
	{
		if($obl)
			$oblspan = '<span class="obl"> * </span>';
		else
			$oblspan = '';
		$defaults = array('type' => 'password', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
		if($desci)
			$desci = '<br /><small>'.$desci.'</small>';
		else
			$desci = '';
		return '
			<p>
				<label>'.$title.$oblspan.'</label>
				<input class="text-input small-input" '._parse_form_attributes($data, $defaults).$extra.' />
				'.$desci.'
			</p>
		';
	}
}

// ------------------------------------------------------------------------

/**
 * Upload Field
 *
 * Identical to the input function but adds the "file" type
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_upload'))
{
	function form_upload($obl = FALSE,$title ='',$data = '', $value = '', $extra = '',$desci=FALSE,$preview = '')
	{
		if($obl)
			$oblspan = '<span class="obl"> * </span>';
		else
			$oblspan = '';
		
		$defaults = array('type' => 'file', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
		if($desci)
			$desci = '<br /><small>'.$desci.'</small>';
		else
			$desci = '';
		if($preview !='')
			$preview = '<a href="'.$preview.'" rel="facebox">Vista Previa</a>';
		return '
			<p>
				<label>'.$title.$oblspan.' '.$preview.'</label> 
				<input class="text-input small-input" '._parse_form_attributes($data, $defaults).$extra.' /> 
				'.$desci.'
			</p>
		';
	}
}

// ------------------------------------------------------------------------

/**
 * Textarea field
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_textarea'))
{
	function form_textarea($obl = FALSE,$title = '',$data = '', $value = '', $extra = '',$desci='')
	{
		if($obl)
			$oblspan = '<span class="obl"> * </span>';
		else
			$oblspan = '';
		$defaults = array('name' => (( ! is_array($data)) ? $data : ''), 'cols' => '90', 'rows' => '12');

		if ( ! is_array($data) OR ! isset($data['value']))
		{
			$val = $value;
		}
		else
		{
			$val = $data['value']; 
			unset($data['value']); // textareas don't use the value attribute
		}
		if($desci)
			$desci = '<br /><small>'.$desci.'</small>';
		else
			$desci = '';
		$name = (is_array($data)) ? $data['name'] : $data;		
		return '
			<p>
				<label>'.$title.$oblspan.'</label>
					<textarea class="text-input textarea" rows="10" '._parse_form_attributes($data, $defaults).$extra.'>'.form_prep($val, $name).'</textarea>
					'.$desci.'
			</p>
		';
		
	}
}

if ( ! function_exists('form_textarea_e'))
{
	function form_textarea_e($obl = FALSE,$title = '',$data = '', $value = '', $extra = '')
	{
		if($obl)
			$oblspan = '<span class="obl"> * </span>';
		else
			$oblspan = '';
		$defaults = array('name' => (( ! is_array($data)) ? $data : ''), 'cols' => '90', 'rows' => '12');

		if ( ! is_array($data) OR ! isset($data['value']))
		{
			$val = $value;
		}
		else
		{
			$val = $data['value']; 
			unset($data['value']); // textareas don't use the value attribute
		}
		
		$name = (is_array($data)) ? $data['name'] : $data;		
		return '
			<p>
				<label>'.$title.$oblspan.'</label>
					<textarea class="text-input textarea wysiwyg" rows="10" '._parse_form_attributes($data, $defaults).$extra.'>'.form_prep($val, $name).'</textarea>
			</p>
		';
		
	}
}

// ------------------------------------------------------------------------

/**
 * Multi-select menu
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	mixed
 * @param	string
 * @return	type
 */
if (! function_exists('form_multiselect'))
{
	function form_multiselect($name = '', $options = array(), $selected = array(), $extra = '')
	{
		if ( ! strpos($extra, 'multiple'))
		{
			$extra .= ' multiple="multiple"';
		}
		
		return form_dropdown($name, $options, $selected, $extra);
	}
}

// --------------------------------------------------------------------

/**
 * Drop-down Menu
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_dropdown'))
{
	function form_dropdown($obl = FALSE,$title='',$name = '', $options = array(), $selected = array(), $extra = '',$submit=FALSE)
	{
		if($obl)
			$oblspan = '<span class="obl"> * </span>';
		else
			$oblspan = '';
		if ( ! is_array($selected))
		{
			$selected = array($selected);
		}

		// If no selected state was submitted we will attempt to set it automatically
		if (count($selected) === 0)
		{
			// If the form name appears in the $_POST array we have a winner!
			if (isset($_POST[$name]))
			{
				$selected = array($_POST[$name]);
			}
		}

		if ($extra != '') $extra = ' '.$extra;

		$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
		$onChange = '';
		if($submit)
			$onChange = 'onchange="this.form.submit();"';
		$form = '<select name="'.$name.'"'.$extra.$multiple." class=\"small-input\" $onChange>\n";

		foreach ($options as $key => $val)
		{
			$key = (string) $key;

			if (is_array($val))
			{
				$form .= '<optgroup label="'.$key.'">'."\n";

				foreach ($val as $optgroup_key => $optgroup_val)
				{
					$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';

					$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
				}

				$form .= '</optgroup>'."\n";
			}
			else
			{
				$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';

				$form .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
			}
		}

		$form .= '</select>';
		$return = '<p>
						<label>'.$title.$oblspan.'</label>
						'.$form.'
					</p>';
		return $return;
	}
}

// ------------------------------------------------------------------------

/**
 * Checkbox Field
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	bool
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_checkbox'))
{
	function form_checkbox($obl = FALSE,$title='',$datas = '',$serie = FALSE, $value = '', $checked = FALSE, $extra = '')
	{
		if($obl)
			$oblspan = '<span class="obl"> * </span>';
		else
			$oblspan = '';
		$checkbox = '<p>
						<label>'.$title.$oblspan.'</label>';
		if($serie){
			foreach ($datas as $data) {				
				$defaults = array('type' => 'checkbox', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
				$sTitle = '';
				if (is_array($data) AND array_key_exists('title', $data))
				{
					$sTitle = $data['title'];
				}
				if (is_array($data) AND array_key_exists('checked', $data))
				{
					$checked = $data['checked'];
		
					if ($checked == FALSE)
					{
						unset($data['checked']);
					}
					else
					{
						$data['checked'] = 'checked';
					}
				}
		
				if ($checked == TRUE)
				{
					$defaults['checked'] = 'checked';
				}
				else
				{
					unset($defaults['checked']);
				}
				$checkbox .=  "<input "._parse_form_attributes($data, $defaults).$extra." /> ".$sTitle." ";
			}
		}else{
			$defaults = array('type' => 'checkbox', 'name' => (( ! is_array($datas)) ? $datas : ''), 'value' => $value);
				$sTitle = '';
				if (is_array($datas) AND array_key_exists('title', $datas))
				{
					$sTitle = $datas['title'];
				}
				if (is_array($datas) AND array_key_exists('checked', $datas))
				{
					$checked = $datas['checked'];
		
					if ($checked == FALSE)
					{
						unset($datas['checked']);
					}
					else
					{
						$datas['checked'] = 'checked';
					}
				}
		
				if ($checked == TRUE)
				{
					$defaults['checked'] = 'checked';
				}
				else
				{
					unset($defaults['checked']);
				}
				$checkbox .=  "<input "._parse_form_attributes($datas, $defaults).$extra." /> $sTitle ";
		}
		$checkbox .= '</p>';
		return $checkbox;
	}
}

// ------------------------------------------------------------------------

/**
 * Radio Button
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	bool
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_radio'))
{
	function form_radio($obl = FALSE,$title='',$datas = '',$serie = FALSE, $value = '', $checked = FALSE, $extra = '')
	{
		if($obl)
			$oblspan = '<span class="obl"> * </span>';
		else
			$oblspan = '';
		$radio = '<p>
						<label>'.$title.$oblspan.'</label>';
		if($serie){
			foreach ($datas as $data) {				
				$defaults = array('type' => 'radio', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
				$sTitle = '';
				if (is_array($data) AND array_key_exists('title', $data))
				{
					$sTitle = $data['title'];
				}
				if (is_array($data) AND array_key_exists('checked', $data))
				{
					$checked = $data['checked'];
		
					if ($checked == FALSE)
					{
						unset($data['checked']);
					}
					else
					{
						$data['checked'] = 'checked';
					}
				}
		
				if ($checked == TRUE)
				{
					$defaults['checked'] = 'checked';
				}
				else
				{
					unset($defaults['checked']);
				}
				$radio .=  "<input "._parse_form_attributes($data, $defaults).$extra." /> ".$sTitle." <br />";
			}
		}else{
			$defaults = array('type' => 'radio', 'name' => (( ! is_array($datas)) ? $datas : ''), 'value' => $value);
				$sTitle = '';
				if (is_array($datas) AND array_key_exists('title', $datas))
				{
					$sTitle = $datas['title'];
				}
				if (is_array($datas) AND array_key_exists('checked', $datas))
				{
					$checked = $datas['checked'];
		
					if ($checked == FALSE)
					{
						unset($datas['checked']);
					}
					else
					{
						$datas['checked'] = 'checked';
					}
				}
		
				if ($checked == TRUE)
				{
					$defaults['checked'] = 'checked';
				}
				else
				{
					unset($defaults['checked']);
				}
				$radio .=  "<input "._parse_form_attributes($datas, $defaults).$extra." /> $sTitle ";
		}
		$radio .= '</p>';
		return $radio;
	}
}

// ------------------------------------------------------------------------

/**
 * Submit Button
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_submit'))
{	
	function form_submit($data = '', $value = '', $extra = '')
	{
		$defaults = array('type' => 'submit', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);

		return "<p><input class=\"button\" "._parse_form_attributes($data, $defaults).$extra." /></p>";
	}
}

// ------------------------------------------------------------------------

/**
 * Reset Button
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_reset'))
{
	function form_reset($data = '', $value = '', $extra = '')
	{
		$defaults = array('type' => 'reset', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);

		return "<input "._parse_form_attributes($data, $defaults).$extra." />";
	}
}

// ------------------------------------------------------------------------

/**
 * Form Button
 *
 * @access	public
 * @param	mixed
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_button'))
{
	function form_button($data = '', $content = '', $extra = '')
	{
		$defaults = array('name' => (( ! is_array($data)) ? $data : ''), 'type' => 'button');

		if ( is_array($data) AND isset($data['content']))
		{
			$content = $data['content'];
			unset($data['content']); // content is not an attribute
		}

		return "<button "._parse_form_attributes($data, $defaults).$extra.">".$content."</button>";
	}
}

// ------------------------------------------------------------------------

/**
 * Form Label Tag
 *
 * @access	public
 * @param	string	The text to appear onscreen
 * @param	string	The id the label applies to
 * @param	string	Additional attributes
 * @return	string
 */
if ( ! function_exists('form_label'))
{
	function form_label($label_text = '', $id = '', $attributes = array())
	{

		$label = '<label';

		if ($id != '')
		{
			 $label .= " for=\"$id\"";
		}

		if (is_array($attributes) AND count($attributes) > 0)
		{
			foreach ($attributes as $key => $val)
			{
				$label .= ' '.$key.'="'.$val.'"';
			}
		}

		$label .= ">$label_text</label>";

		return $label;
	}
}

// ------------------------------------------------------------------------
/**
 * Fieldset Tag
 *
 * Used to produce <fieldset><legend>text</legend>.  To close fieldset
 * use form_fieldset_close()
 *
 * @access	public
 * @param	string	The legend text
 * @param	string	Additional attributes
 * @return	string
 */
if ( ! function_exists('form_fieldset'))
{
	function form_fieldset($legend_text = '', $attributes = array())
	{
		$fieldset = "<fieldset";

		$fieldset .= _attributes_to_string($attributes, FALSE);

		$fieldset .= ">\n";

		if ($legend_text != '')
		{
			$fieldset .= "<legend>$legend_text</legend>\n";
		}

		return $fieldset;
	}
}

// ------------------------------------------------------------------------

/**
 * Fieldset Close Tag
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_fieldset_close'))
{
	function form_fieldset_close($extra = '')
	{
		return "</fieldset>".$extra;
	}
}

// ------------------------------------------------------------------------

/**
 * Form Close Tag
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_close'))
{
	function form_close($extra = '')
	{
		return "</form>".$extra;
	}
}

// ------------------------------------------------------------------------

/**
 * Form Prep
 *
 * Formats text so that it can be safely placed in a form field in the event it has HTML tags.
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_prep'))
{
	function form_prep($str = '', $field_name = '')
	{
		static $prepped_fields = array();
		
		// if the field name is an array we do this recursively
		if (is_array($str))
		{
			foreach ($str as $key => $val)
			{
				$str[$key] = form_prep($val);
			}

			return $str;
		}

		if ($str === '')
		{
			return '';
		}

		// we've already prepped a field with this name
		// @todo need to figure out a way to namespace this so
		// that we know the *exact* field and not just one with
		// the same name
		if (isset($prepped_fields[$field_name]))
		{
			return $str;
		}
		
		$str = htmlspecialchars($str);

		// In case htmlspecialchars misses these.
		$str = str_replace(array("'", '"'), array("&#39;", "&quot;"), $str);

		if ($field_name != '')
		{
			$prepped_fields[$field_name] = $str;
		}
		
		return $str;
	}
}

// ------------------------------------------------------------------------

/**
 * Form Value
 *
 * Grabs a value from the POST array for the specified field so you can
 * re-populate an input field or textarea.  If Form Validation
 * is active it retrieves the info from the validation class
 *
 * @access	public
 * @param	string
 * @return	mixed
 */
if ( ! function_exists('set_value'))
{
	function set_value($field = '', $default = '')
	{
		if (FALSE === ($OBJ =& _get_validation_object()))
		{
			if ( ! isset($_POST[$field]))
			{
				return $default;
			}

			return form_prep($_POST[$field], $field);
		}

		return form_prep($OBJ->set_value($field, $default), $field);
	}
}

// ------------------------------------------------------------------------

/**
 * Set Select
 *
 * Let's you set the selected value of a <select> menu via data in the POST array.
 * If Form Validation is active it retrieves the info from the validation class
 *
 * @access	public
 * @param	string
 * @param	string
 * @param	bool
 * @return	string
 */
if ( ! function_exists('set_select'))
{
	function set_select($field = '', $value = '', $default = FALSE)
	{
		$OBJ =& _get_validation_object();

		if ($OBJ === FALSE)
		{
			if ( ! isset($_POST[$field]))
			{
				if (count($_POST) === 0 AND $default == TRUE)
				{
					return ' selected="selected"';
				}
				return '';
			}

			$field = $_POST[$field];

			if (is_array($field))
			{
				if ( ! in_array($value, $field))
				{
					return '';
				}
			}
			else
			{
				if (($field == '' OR $value == '') OR ($field != $value))
				{
					return '';
				}
			}

			return ' selected="selected"';
		}

		return $OBJ->set_select($field, $value, $default);
	}
}

// ------------------------------------------------------------------------

/**
 * Set Checkbox
 *
 * Let's you set the selected value of a checkbox via the value in the POST array.
 * If Form Validation is active it retrieves the info from the validation class
 *
 * @access	public
 * @param	string
 * @param	string
 * @param	bool
 * @return	string
 */
if ( ! function_exists('set_checkbox'))
{
	function set_checkbox($field = '', $value = '', $default = FALSE)
	{
		$OBJ =& _get_validation_object();

		if ($OBJ === FALSE)
		{ 
			if ( ! isset($_POST[$field]))
			{
				if (count($_POST) === 0 AND $default == TRUE)
				{
					return ' checked="checked"';
				}
				return '';
			}

			$field = $_POST[$field];
			
			if (is_array($field))
			{
				if ( ! in_array($value, $field))
				{
					return '';
				}
			}
			else
			{
				if (($field == '' OR $value == '') OR ($field != $value))
				{
					return '';
				}
			}

			return ' checked="checked"';
		}

		return $OBJ->set_checkbox($field, $value, $default);
	}
}

// ------------------------------------------------------------------------

/**
 * Set Radio
 *
 * Let's you set the selected value of a radio field via info in the POST array.
 * If Form Validation is active it retrieves the info from the validation class
 *
 * @access	public
 * @param	string
 * @param	string
 * @param	bool
 * @return	string
 */
if ( ! function_exists('set_radio'))
{
	function set_radio($field = '', $value = '', $default = FALSE)
	{
		$OBJ =& _get_validation_object();

		if ($OBJ === FALSE)
		{
			if ( ! isset($_POST[$field]))
			{
				if (count($_POST) === 0 AND $default == TRUE)
				{
					return ' checked="checked"';
				}
				return '';
			}

			$field = $_POST[$field];
			
			if (is_array($field))
			{
				if ( ! in_array($value, $field))
				{
					return '';
				}
			}
			else
			{
				if (($field == '' OR $value == '') OR ($field != $value))
				{
					return '';
				}
			}

			return ' checked="checked"';
		}

		return $OBJ->set_radio($field, $value, $default);
	}
}

// ------------------------------------------------------------------------

/**
 * Form Error
 *
 * Returns the error for a specific form field.  This is a helper for the
 * form validation class.
 *
 * @access	public
 * @param	string
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('form_error'))
{
	function form_error($field = '', $prefix = '', $suffix = '')
	{
		if (FALSE === ($OBJ =& _get_validation_object()))
		{
			return '';
		}

		return $OBJ->error($field, $prefix, $suffix);
	}
}

// ------------------------------------------------------------------------

/**
 * Validation Error String
 *
 * Returns all the errors associated with a form submission.  This is a helper
 * function for the form validation class.
 *
 * @access	public
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('validation_errors'))
{
	function validation_errors($prefix = '', $suffix = '')
	{
		if (FALSE === ($OBJ =& _get_validation_object()))
		{
			return '';
		}

		return $OBJ->error_string($prefix, $suffix);
	}
}

// ------------------------------------------------------------------------

/**
 * Parse the form attributes
 *
 * Helper function used by some of the form helpers
 *
 * @access	private
 * @param	array
 * @param	array
 * @return	string
 */
if ( ! function_exists('_parse_form_attributes'))
{
	function _parse_form_attributes($attributes, $default)
	{
		if (is_array($attributes))
		{
			foreach ($default as $key => $val)
			{
				if (isset($attributes[$key]))
				{
					$default[$key] = $attributes[$key];
					unset($attributes[$key]);
				}
			}

			if (count($attributes) > 0)
			{
				$default = array_merge($default, $attributes);
			}
		}

		$att = '';
		
		foreach ($default as $key => $val)
		{
			if ($key == 'value')
			{
				$val = form_prep($val, $default['name']);
			}

			$att .= $key . '="' . $val . '" ';
		}

		return $att;
	}
}

// ------------------------------------------------------------------------

/**
 * Attributes To String
 *
 * Helper function used by some of the form helpers
 *
 * @access	private
 * @param	mixed
 * @param	bool
 * @return	string
 */
if ( ! function_exists('_attributes_to_string'))
{
	function _attributes_to_string($attributes, $formtag = FALSE)
	{
		if (is_string($attributes) AND strlen($attributes) > 0)
		{
			if ($formtag == TRUE AND strpos($attributes, 'method=') === FALSE)
			{
				$attributes .= ' method="post"';
			}

		return ' '.$attributes;
		}
	
		if (is_object($attributes) AND count($attributes) > 0)
		{
			$attributes = (array)$attributes;
		}

		if (is_array($attributes) AND count($attributes) > 0)
		{
		$atts = '';

		if ( ! isset($attributes['method']) AND $formtag === TRUE)
		{
			$atts .= ' method="post"';
		}

		foreach ($attributes as $key => $val)
		{
			$atts .= ' '.$key.'="'.$val.'"';
		}

		return $atts;
		}
	}
}

// ------------------------------------------------------------------------

/**
 * Validation Object
 *
 * Determines what the form validation class was instantiated as, fetches
 * the object and returns it.
 *
 * @access	private
 * @return	mixed
 */
if ( ! function_exists('_get_validation_object'))
{
	function &_get_validation_object()
	{
		$CI =& get_instance();

		// We set this as a variable since we're returning by reference
		$return = FALSE;

		if ( ! isset($CI->load->_ci_classes) OR  ! isset($CI->load->_ci_classes['form_validation']))
		{
			return $return;
		}

		$object = $CI->load->_ci_classes['form_validation'];

		if ( ! isset($CI->$object) OR ! is_object($CI->$object))
		{
			return $return;
		}

		return $CI->$object;
	}
}


/* End of file form_helper.php */
/* Location: ./system/helpers/form_helper.php */