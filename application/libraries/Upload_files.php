<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Upload
 * - Uplod files
 * @version 1.0
 * @author Elias Bruno
 */
class Upload_files
{
	private $config;
	private $CI;
	private $subpasta;
	private $path;
	private $types_files;
	private $max_size;
	private $max_height;
	private $max_width;

	public function __construct() 
	{		
        $this->CI =& get_instance();
        $this->path="src/uploads/";
        $this->types_files="gif|jpg|png|jpeg";
        $this->max_size= 4*1024;//4 MB
        $this->max_height = 0; 
        $this->max_width = 0;
	}

	/**
	 * Caminho principal do upload
	 * - convert a password
	 * @param (string) $path
	 */
	public function setPath($path)
	{
		$this->path=$path;
	}

	/**
	 * path 
	 * - Retorna caminho principal do upload
	 * @return (string) 
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * subpasta 
	 * - Setar a subpasta do path
	 * @param (string) 
	 */
	public function setSubpasta($subpasta)
	{
		$this->subpasta=$subpasta;
	}

	/**
	 * path 
	 * - Retorna caminho principal do upload
	 * @return (string) 
	 */
	public function getSubpasta()
	{
		return $this->subpasta;
	}

	/**
	 * max_size 
	 * - Seta a tamanho máximo do arquivo
	 * @param (string) 
	 */
	public function setMaxSize($max_size)
	{
		$this->max_size=$max_size;
	}

	/**
	 * max_size 
	 * - Retorna o tamanho máximo do imagem
	 * @return (string) 
	 */
	public function getMaxSize()
	{
		return $this->max_size;
	}

	/**
	 * max_height 
	 * - Seta a altura máxima da imagem
	 * @param (string) 
	 */
	public function setMaxHeight($max_height)
	{
		$this->max_height=$max_height;
	}

	/**
	 * max_size 
	 * - Retorna a altura máxima da imagem
	 * @return (string) 
	 */
	public function getMaxHeight()
	{
		return $this->max_height;
	}

	public function setMaxWidth($max_width)
	{
		$this->max_width=$max_width;
	}

	public function getMaxWidth()
	{
		return $this->max_width;
	}

	/**
	 * send_file
	 * - Realiza o upload das imagens
	 * @param (string) 
	 */
	public function send_file($file)
	{
		
		$this->config =  array(
				'encrypt_name'	=> true,
                'upload_path'  	=> $this->path.'/'.$this->subpasta,
                'allowed_types'	=> $this->types_files,
                'max_size'     	=> $this->max_size,
                'max_height'   	=> $this->max_height,
                'max_width'    	=> $this->max_width,
                );

		$this->CI->load->library('upload', $this->config); 

		if(!$this->CI->upload->do_upload($file))
		{
			$error = array('error' =>  $this->CI->upload->display_errors());

			return $error;
		}
		else
		{
			return $this->CI->upload->data();
		}
	}

	/**
	 * delelte_file
	 * - Deleta arquivo com a função nativa do PHP
	 * @param (string) 
	 */
	public function delete_file($file)
	{		
		$dir=$this->path.$this->subpasta.'/'.$file; //armazena o caminho e o arquivo que foi passado
		
		if(file_exists($dir))//verifica se o arquivo existe
			return (bool) unlink($dir);//deleta o arquivo com a função nativa do php unlink
		else
			echo "not found file";
	}

}