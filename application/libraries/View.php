<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View
{
	//Attributes
	private $CI;
	private $extra_path = NULL;
	private $controller = NULL;
	private $view = NULL;
	private $output;
	private $viewData = array();
	private $accepted_output_methods = array(
		'html',
		'json',
		#'xml' //Soon
	);

	//Resources
	private $css_files 	= array();
	private $js_files 	= array();

	//wildcard attributes
	private $wildcards = array(
		'common_path'	=> 'template',
		'header' 		=> true,
		'page_title'	=> NULL,
		'page_subtitle'	=> NULL,
		'menu' 			=> false,
		'logged' 		=> false,
		'footer'		=> true,
		'session_info' 	=> array()
	);

	//Methods
	public function __construct()
	{
		//Get CodeIgniter's instance
        $this->CI =& get_instance();
        //Loading language file
		$this->CI->lang->load('view');
        //set the default output method as the first child of 'accepted_output_method' array
        $this->setOutputMethod($this->accepted_output_methods[0]);

        //Loading confis
        $this->CI->load->config('view_config');

        $this->addCss( $this->CI->config->item('default_css_files') );
        $this->addJs( $this->CI->config->item('default_js_files') );
	}//__construct()

	//getters-------------------------------------------------------------

	/**
	 * getViewName()
	 * - returns the actual view's name
	 * @return (string) 'view's name'
	 */
	public function getViewName()
	{
		return $this->view;
	}//getViewName()

	/**
	 * getControllerName()
	 * - retuns the actual controller's name
	 * @return (string) 'controller's name'
	 */
	public function getControllerName()
	{
		return $this->controller;
	}//getControllerName

	/**
	 * getExtraPath()
	 * - return the actual extra path
	 * @return (string) 'extra path for view'
	 */
	public function getExtraPath()
	{
		return $this->extra_path;
	}//getExtraPath

	/**
	 * getOutputMethod()
	 * - returns the output method
	 * @return (string) 'actual output method'
	 */
	public function getOutputMethod()
	{
		return $this->output;
	}//getOutputMethod()

	/**
	 * getViewPath()
	 * - makes a path with attributes information
	 * @param (string) $another = 'if isset return path to template'
	 * @return (string) 'path for view'
	 */
	private function getViewPath($another = NULL)
	{
		$extra_path = $this->getExtraPath();
		$controller = $this->getControllerName();
		$view = $this->getViewName();

		$a = array();

		if($extra_path)
			$a[] = $extra_path;

		if($controller && $another == NULL)
			$a[] = $controller;
		elseif($another != NULL)
			$a[] = $this->wildcards['common_path'];

		if($view && $another == NULL)
			$a[] = $view;
		elseif($another != NULL)
			$a[] = $another;

		unset($extra_path, $controller, $view);

		return implode('/', $a);
	}//getViewPath

	/**
	 * getData()
	 * - returns the viewData
	 * @return (array) 'view's data'
	 */
	public function getData()
	{
		return $this->viewData;
	}//getData();

	//setters-------------------------------------------------------------

	/**
	 * setView()
	 * - defines view name
	 * @param (string) $name = 'view ou path to view name'
	 * @return (void)
	 */
	public function setView($name)
	{
		// if exists some '/' in $name
		// $name have to be treated
		if(strpos($name, '/'))
		{
			//Explodes an array and revert the order of pieces
			$a = array_reverse(explode('/', $name));

			//it is assumed that the first piece is the view's name
			$this->view = $a[0];
			//same way that the second piece is the controller's name
			$this->setControllerName($a[1]);

			//unseting the first and second pieces
			unset($a[0], $a[1]);

			//the remaining pieces will be the "extra path"
			if(sizeof($a) > 0)
				$this->setExtraPath($a);
		}
		// otherwise only stores the value
		else
		{
			$this->view = $name;
		}
	}//setView()

	/**
	 * setControllerName()
	 * - set the controller name
	 * @param (string) $name = 'controller name'
	 * @return (void)
	 */
	public function setControllerName($name)
	{
		// if exists some '/' in $name
		// $name have to be treated
		if(strpos($name, '/'))
		{
			//Explodes an array and revert the order of pieces
			$a = array_reverse(explode('/', $name));
			//it is assumed that the first piece is the controller's name
			$this->controller = $a[0];

			//unseting the first and second pieces
			unset($a[0]);

			//the remaining pieces will be the "extra path"
			$this->setExtraPath($a);
		}
		// otherwise only stores the value
		else
		{
			$this->controller = $name;
		}
	}//setControllerName()

	/**
	 * setExtraPath()
	 * - set an extra path for view
	 * @param (mixed) $path = 'path in string or array'
	 * @return (void)
	 */
	public function setExtraPath($path)
	{	
		if(is_array($path))
			$this->extra_path = implode('/', array_reverse($path));
		else
			$this->extra_path = $path;
	}//setExtraPath()

	/**
	 * setOutputMethod()
	 * - defines output method, class' efault  output method is html
	 * @param (string) $method = 'output method'
	 * @return (bool) 'method has changed or not'
	 */
	public function setOutputMethod($method)
	{
		if(in_array($method, $this->accepted_output_methods))
		{
			$this->output = $method;
			return true;
		}
		else
		{
			return false;
		}
	}//setOutputMethod()

	/**
	 * addCss()
	 * - adds css files to the css recipient
	 * @param (mixed) $css = 'can be a string or an array'
	 */	
	public function addCss($css)
	{
		if(is_array($css))
		{
			foreach($css as $c)
			{
				$this->css_files[] = $c;
			}
		}
		else
		{
			$this->css_files[] = $css;
		}
		
		unset($css);
	}//addCss()

	/**
	 * addJs()
	 * - adds javascript files to the js recipient
	 * @param (mixed) $js = 'can be a string or an array'
	 */	
	public function addJs($js)
	{
		if(is_array($js))
		{
			foreach($js as $j)
			{
				$this->js_files[] = $j;
			}
		}
		else
		{
			$this->js_files[] = $js;
		}
		
		unset($js);
	}//addJs()

	/**
	 * setData()
	 * - set the view's data
	 * @param (array) $data = 'view's data'
	 */
	public function setData($data)
	{
		$this->viewData = $data;
	}//setData()


	/**
	 * showHeader()
	 * - defines header's visibility
	 * @param (bool) $visible
	 */
	public function showHeader($visible)
	{
		$this->wildcards['header'] = $visible;
	}//showHeader()

	/**
	 * setPageTitle
	 * - defines the page title
	 * @param (string) $title
	 * @param (string) $subtitle
	 */
	public function setPageTitle($title, $subtitle = NULL)
	{
		$this->wildcards['page_title'] = $title;
		$this->wildcards['page_subtitle'] = $subtitle;
	}//setPageTitle()
	
	/**
	 * showMenu()
	 * - defines menu's visibility
	 * @param (bool) $visible
	 */
	public function showMenu($visible)
	{
		$this->wildcards['menu'] = $visible;
	}//showMenu()

	/**
	 * isLogged()
	 * - defines if user is logged or not
	 * @param (bool) $logged
	 */
	public function isLogged($logged)
	{
		$this->wildcards['logged'] = $logged;
	}//isLogged()


	/**
	 * showFooter()
	 * - defines footer's visibility
	 * @param (bool) $visibility
	 */
	public function showFooter($visibility)
	{
		$this->wildcards['footer'] = $visibility;
	}//showFooter()

	/**
	 * setSettionInfo()
	 * - defines session info
	 * @param (array) $session_info
	 */
	public function setSessionInfo($session_info)
	{
		$this->wildcards['session_info'] = $session_info;
	}//setSessionInfo()

	//routines------------------------------------------------------------

	/**
	 * prepareResourceFiles()
	 * - prepare css and js files string for HTML view
	 * @return (array) '[js_files/css_files]'
	 */
	private function prepareResourceFiles()
	{
		//Essential helper
		$this->CI->load->helper('resource');

		$data = array(
			'js_files'	=> r_js( $this->js_files, $this->getExtraPath() ),
			'css_files'	=> r_css( $this->css_files, $this->getExtraPath() )
		);

		return $data;
	}//prepareResourceFiles()

	/**
	 * checkEssentialAttributes()
	 * - check essesntial attributes for class operation
	 * @return (mixed) true for 'go for it' string for error message
	 */
	private function checkEssentialAttributes()
	{
		$errors = 0;

		switch($this->getOutputMethod())
		{
			case 'html':
				if(!$this->getViewName())
				{
					show_error( $this->CI->lang->line('missing_view_name') );
					$errors++;
				}

				if(!$this->getData())
				{
					show_error( $this->CI->lang->line('missing_view_data') );
					$errors++;
				}
					
				break;

			case 'json':
				if(!$this->getData())
				{
					show_error( $this->CI->lang->line('missing_view_data') );
					$errors++;
				}
				break;

			default:
				show_error( $this->CI->lang->line('missing_output_method') );
				die();
				break;
		}
		//no errors
		if($errors == 0)
			return true;
		//errors found
		else
			return false;
	}//checkEssentialAttributes()

	/**
	 * html_output()
	 * - throws the view in html format
	 */
	private function html_output()
	{	
		//Preparing wildcards data
		if($this->wildcards['page_title'] == NULL)
			$this->wildcards['page_title'] = $this->getViewName();

		$wildcards = $this->wildcards;
		$wildcards['session'] = (object) $wildcards['session_info'];
		unset($wildcards['common_path'], $wildcards['session_info']);

		$wildcards['view'] = $this->getViewName();
		$wildcards['controller'] = $this->getControllerName();
		$wildcards['extra_path'] = $this->getExtraPath();

		//Prepare resource data
		$resources = $this->prepareResourceFiles();

		//Prepare view data
		$data = array_merge($this->getData(), $wildcards, $resources);

		//Header
		if($wildcards['header'])
			$this->CI->load->view( $this->getViewPath('header'), $data );

		//View
		$this->CI->load->view( $this->getViewPath(), $data );

		//Footer
		if($wildcards['footer'])
			$this->CI->load->view( $this->getViewPath('footer'), $data );
		
		unset($data, $wildcards, $resources);
	}//html_output()

	/**
	 * json_output()
	 *- throws the view in json format
	 */
	private function json_output()
	{
		//Preparing wildcards data
		if($this->wildcards['page_title'] == NULL)
			$this->wildcards['page_title'] = $this->getViewName();
		//replace header filename
		$this->CI->output->set_header('Content-Disposition: inline; filename="'.$this->wildcards['page_title'].'.json"');
		//outputs just the viewData in json format
		$this->CI->output->set_content_type('application/json')->set_output(json_encode($this->getData()));
	}//json_output()

	/**
	 * show()
	 * - prepare the view and throw in configured output method
	 * @param (mixed) 'first' -> (string) 'viewname' || (array) 'data'
	 * @param (array) 'second' (array) 'data'
	 */
	public function show()//$view = NULL, $data = array()
	{
		//get args
		$args = func_get_args();

		//If the first arg has been defined and it is a string
		if(isset($args[0]) && is_string($args[0]))
			$this->setView($args[0]);
		//If the first arg has been defined and it is an array or the second arg is an array
		if(isset($args[0]) && is_array($args[0]))
			$this->setData($args[0]);
		elseif(isset($args[1]) && is_array($args[1]))
			$this->setData($args[1]);

		//Checking essential attributes for class operation
		$safe = $this->checkEssentialAttributes();

		//All ready
		if($safe === true)
			$this->{$this->getOutputMethod() . '_output'}();
		else
			die();	
	}//show()

}//View

/* End of file View.php */
/* Location: ./application/libraries/View.php */