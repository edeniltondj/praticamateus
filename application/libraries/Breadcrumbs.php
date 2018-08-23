<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Breadcrumbs
{
	private $ci;
	private $crumbs = array();
	private $separator = '<span class="sep">::</span>';
	private $wrapper = array('', '');

	public function __construct()
	{
		//Get CI main instance
		$this->ci =& get_instance();
	}

	/**
	 * setSeparator()
	 * - defines a new separator for breadcrumbs
	 * @param (string) $separator
	 */
	public function setSeparator($separator)
	{
		$this->separator = $separator;
	}

	/**
	 * validateCrumb()
	 * - validate the form of a crumb
	 * @param (array) $crumb = 'crumb to be validated'
	 * @return (bool)
	 */
	public function validateCrumb($crumb)
	{
		$errors = 0;

		if(!isset($crumb['name']))
			$errors++;

		return (bool) ($errors == 0);
	}

	/**
	 * addCrumb()
	 * - adds a new crumb for listing
	 */
	public function addCrumb()
	{
		$args = func_get_args();
		//Se o primeiro parametro for uma array
		if(isset($args[0]) && is_array($args[0]))
		{
			if($this->validateCrumb($arg[0]))
				$this->crumbs[] = $crumb;
		}
		elseif(isset($args[0]) && !is_array($args[0]))
		{
			//O nome da migalha será o primeiro parametro
			$crumb = array(
				'name' => $args[0]
			);

			//Se foi definido um link para a migalha será o segundo parametro
			if(isset($args[1]))
				$crumb['link'] = $args[1];
				

			$this->crumbs[] = $crumb;
		}
		else
		{
			return false;
		}
	}

	/**
	 * setWrapper()
	 * - sets the breadcrumb wrapper html tag
	 * @param (string) $wrapper_open
	 * @param (string) $wrapper_close
	 */
	public function setWrapper($wrapper_open = NULL, $wapper_close = NULL)
	{
		if(!is_null($wrapper_open) && !is_null($wrapper_close))
			$this->wrapper = array($wrapper_open, $wapper_close);
	}

	/**
	 * wrap()
	 * @param (string) $toWrap
	 * @return 'wrapped string'
	 */
	private function wrap($toWrap)
	{
		return $this->wrapper[0] . $toWrap . $this->wrapper[1];
	}

	/**
	 * make()
	 * - returns the complete breadcrumb and cleans "crumb holder"
	 * @param (array) $crumbs
	 * @param (string) $wrapper_open
	 * @param (string) $wrapper_close
	 * @return (string) html crumb formated
	 */
	public function make($crumbs = array(), $wrapper_open = NULL, $wapper_close = NULL)
	{
		if(!empty($crumbs))
		{
			foreach ($crumbs as $c) {
				$this->addCrumb($c);
			}
		}

		if(!is_null($wrapper_open) && !is_null($wrapper_close))
			$this->setWrapper($wrapper_open, $wapper_close);

		$breadcrumb = array();

		//travels by the crumbs in class
		foreach($this->crumbs as $c)
		{
			$cr = (isset($c['link'])) ? anchor($c['link'], $c['name']) : '<span class="actual">'.$c['name'].'</span>';
			$breadcrumb[] = $cr;
		}

		$breadcrumb = $this->wrap( implode($this->separator, $breadcrumb) );
		return $breadcrumb;
	}

}//Breadcrumbs

/* End of file breadcrumbs.php */
/* Location: ./application/libraries/breadcrumbs.php */