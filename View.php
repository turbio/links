<?php //Adapted from: https://bitbucket.org/krzysztofr/sm-view

class View
{
	protected $template_directory = 'templates/';
	protected $variables = array();
	
	public function __construct( $template_directory = null )
	{
		if ( $template_directory !== null ) {
			$this->template_directory = $template_directory;
		}
	}
	
	public function render( $template_file )
	{
		if ( file_exists( $this->template_directory . $template_file )) {
			include $this->template_directory . $template_file;
		} else {
			throw new Exception( 'no template file ' . $template_file . ' present in directory ' . $this->template_directory );
		}
	}
	
	public function __set( $name, $value )
	{
		$this->variables[$name] = $value;
	}
	
	public function __get( $name )
	{
		return $this->variables[$name];
	}
}
