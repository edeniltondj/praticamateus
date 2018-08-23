<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Extended_model extends CI_Model {

	// Attributes

	private $dev_server_name = 'vieirasistemasserver';

	/**
	 * db instance
	 */
	#protected $db;

	/**
	 * table name
	 */
	protected $table;

	/**
	 * prefix for table fields
	 */
	protected $prefix;

	/**
	 * suffix fox table fields
	 */
	protected $suffix;

	/**
	 * contains filters for forms
	 * 
	 * should take the following structure
	 * 
	 * array
	 * 		['delimiters']		array containing open & close error delimiters
	 * 			[0]				
	 * 			[1]
	 * 		['for_all']			string that contains filters which are common to all fields
	 * 		['forms']			array that contains arrays that contains form profiles
	 * 			[form_profile]	array that contains filters for the form fields
	 * 				[fieldname]	string that contains filters for this field
	 */
	protected $filters = array();

	/**
	 * contains aliases for db views
	 * 
	 * should take the following structure
	 * 
	 * array
	 * 		['alias']	a friendly name for view reference
	 * 		['name']	the real view name
	 */
	protected $views = array();

	/**
	 * recipient ready for patterned DB response actions
	 * 
	 * should take the following structure
	 * 
	 * array
	 * 		['opr']	a boolean that represents operation result
	 * 		['msg']	a string that contains a message describing operation result
	 * 		['erf']	a string that contains an error flag for better communication between models and views
	 * 		['ext']	a mixed type variable that contains some extra information for possible processes
	 */
	protected $action = array(
		'opr' => null,
		'msg' => null,
		'erf' => null,
		'ext' => null
	);

	// Methods

	public function __construct()
	{
		parent::__construct();

		// loading the database with right configs
		// related with the environment which the app is are
		#$this->db = $this->load->database(  ((is_null($this->db) && $this->input->server('SERVER_NAME') == $this->dev_server_name) ? 'development' : 'production' ), true );
	}

	public function __fget($key)
	{
		$active_record_exceptions = array(
			'select',
			'select_max',
			'select_min',
			'select_avg,',
			'select_sum',
			'from',
			'join',
			'where',
			'or_where',
			'where_in',
			'or_where_in',
			'where_not_in',
			'or_where_not_id',
			'like',
			'or_like',
			'not_like',
			'or_not_like',
			'group_by',
			'distinct',
			'order_by',
			'having',
			'or_having',
			'limit',
			'count_all',
			'count_all_results',
			'set'
		);

		if(in_array($key, $active_record_exceptions)){
			return $this->db->$key;
		}
		else
			return parent::__get($key);
	}

	// treatment methods

	/**
	 * return a string with prefix and suffix glued in it
	 * @param string $string 
	 * @param bool $remove
	 * @return string
	 */
	public function stickers($string, $remove = false)
	{
		if(!$remove)
			return $this->prefix . $string . $this->suffix;
		else
			return substr($string, strlen($this->prefix), strlen($string)-strlen($this->prefix)-strlen($this->suffix));
	}

	/**
	 * translate patterns
	 * @param string $pattern 
	 * @param array &$data 
	 * @return string
	 */
	public function translate_pattern($pattern, $data)
	{
		$special_flags = array( '(t)', '(p)', '(s)' );
		$special_replacements = array( $this->table, $this->prefix, $this->suffix );

		$flags = $replacements = array();
		// feed 'flags' and 'replacements'
		foreach ($data as $k=>$v)
		{
			$flags[] = '/\{' . $this->stickers($k, true) . '\}/i';
			$replacements[] = $v;
		}

		unset($data);

		return preg_replace($flags, $replacements, str_replace($special_flags, $special_replacements, $pattern));
	}

	/**
	 * Applies filters for POST data that came from forms
	 * @param string $form_type 
	 * @param array $pattern_data 
	 * @return bool
	 */
	protected function filters($form_type = 'null', $pattern_data = array())
	{
		$form_type = is_null($form_type) ? 'default' : $form_type;

		//routine vars
		$profile = $config = array();

		//loads "form validation library"
		$this->load->library('form_validation');

		//extracting filters array
		extract($this->filters);

		//checking error delimiters
		if(isset($delimiters) && sizeof($delimiters)==2)
			$this->form_validation->set_error_delimiters($delimiters[0],$delimiters[1]);

		//checking "for_all" existence
		$for_all = (isset($for_all)) ? $for_all : null;
		
		//if pattern_data was defined, it will prepared for action
		if(is_array($pattern_data) && !empty($pattern_data))
			foreach ($pattern_data as $k => $v) {
				$pattern_data[$this->stickers($k)] = $v;
				unset($pattern_data[$k]);
			}

		// fetch form profiles and prepares a profile
		// for "form_type" case specified
		if(isset($forms['common']))
			$profile = array_merge($profile, $forms['common']);

		if($form_type != 'common' && $form_type != null && isset($forms[$form_type]))
			$profile = array_merge($profile, $forms[$form_type]);

		// prepare rule array
		foreach ($profile as $k => $v)
		{
			if(strpos($k, '|')>-1)
				$pieces = explode('|', $k, 2);
			else
				$pieces[0] = $pieces[1] = $k;

			$config[] = array(
				'field' => $pieces[1],
				'label' => $pieces[0],
				'rules' => $this->translate_pattern($v.'|'.$for_all, $pattern_data)
			);
		}
		
		$this->form_validation->set_rules($config);

		return $this->form_validation->run();
	}

	// data retrieving methods

	/**
	 * returns the data of one single table line
	 * @param mixed $value 
	 * @param string $field 
	 * @param string $view
	 * @return array
	 */
	public function get_one($value = null, $field = 'id', $view = null)
	{
		// apply filter just whether value is defined
		if($value != null)
		{
			$this->db->where($this->stickers($field), $value);
		}
		// whether not, will return the last inserted one
		else
		{
			$this->db->limit(1);
			$this->db->order_by($this->stickers($field), 'DESC');
		}

		// set the correct FROM value
		$from = is_null($view) ? $this->table : $this->views[$view];

		return $this->db->get($from)->row_array();
	}

	/**
	 * returns a list from table data
	 * @param string $view 
	 * @return array
	 */
	public function get_list($view = null)
	{
		// set the correct FROM value
		$from = is_null($view) ? $this->table : $this->views[$view];

		return $this->db->get($from)->result_array();
	}

	/**
	 * returns a numbers, counted from a table or view
	 * @param string $view 
	 * @return int
	 */
	public function count($view = null)
	{
		$this->db->select('count(1) as n');
		$l = $this->get_list($view);

		return $l[0]['n']+0;
	}

	/**
	 * get an array, optimized for "form_dropdown" of CI
	 * @param string $option_pattern 
	 * @param string $value_field 
	 * @param string $null_val 
	 * @param string $view 
	 * @return array
	 */
	public function get_dropdown($option_pattern, $value_field = 'id', $null_val = '...', $view = null)
	{
		$list = $this->get_list($view);

		$array = array($null_val => '');

		// fetching rows, checking pattern translation
		foreach ($list as $row)
			$array[ $row[$this->stickers($value_field)] ] = $this->translate_pattern($option_pattern, $row);

		return $array;
	}

	// Management methods

	/**
	 * returns an array containing all queries executed by this model until the moment
	 * @return array
	 */
	public function queries()
	{
		return $this->db->queries;
	}

	/**
	 * returns an object with action/process data response
	 * @return object
	 */
	public function action()
	{
		$array = $this->action;

		foreach($this->action as $k=>$v)
			$this->action[$k] = null;

		return (object) $array;
	}
}