<?php

class BaseController extends Controller {

    protected $defaultTheme = 'default';

    /**
     * Default layout, "default" is a full width layout
     *
     * @var string
     */
    protected $defaultLayout = 'default';

    protected $siteTitle = 'Fureal CMS';

    /**
     * @var Theme
     */
    protected $theme;

    /**
     * Initializer.
     *
     * @access   public
     * @return \BaseController
     */
    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));

        $this->theme = Theme::theme($this->defaultTheme)->layout($this->defaultLayout);

        /*
         * Setup Custom Values for now
         */
        $this->theme->set('serverName', "Fureal");
        $this->theme->set('title', "Fureal WoW");
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( !is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    protected function getTheme(){
        return $this->theme;
    }

    protected function setTitle($title){
        $this->theme->set('title', $title);
    }

    protected function prependTitle($title){
        $this->theme->prepend('title', $title . " - ");
    }

    protected function view($template, $templateVariables = array(), $layout = false) {

        /**
         * @TODO User kann theme speichern? Dann hier bevorzugen
         * @TODO Andere Theme ist in der Config? Dann hier diese laden.
         */

        $themeName = 'frozen';

        // Check if the set theme does exist
        if(Theme::exists($themeName)){
            //$this->theme->uses($themeName);
        }

        // Check if a layout was given
        if($layout === false){
            $this->theme->layout($layout);
        }

        $this->theme->set('nav-main', array(
            array(
                'name' => 'Home',
                'link' => '/'
            ),
            array(
                'name' => 'Game',
                'link' => '/game'
            ),
            array(
                'name' => 'Server',
                'link' => '/server'
            ),
            array(
                'name' => 'Account',
                'link' => '/account'
            ),
        ));

        // home.index will look up the path 'public/themes/default/views/$template'
        return $this->theme->scope($template, $templateVariables)->render();

    }

}