<?php

namespace Project\Http\Controllers;

use Illuminate\Http\Request;
use Project\Repositories\MenuRepository;

use Project\Libraries\MenuBuilder;

class SiteController extends Controller
{

    protected $title;
    protected $keywords;
    protected $meta_desc;

    protected $MenuBuilder;
/**
 * object portfolio repository, logic
 * @var object $p_rep
 */
    protected $p_rep;

/**
 * object slider repository, logic
 * @var object $s_rep
 */
    protected  $s_rep;

/**
 * object article repository, logic
 * @var object $a_rep
 */
    protected  $a_rep;

/**
 * object menu repository, logic
 * @var object $m_rep
 */
    protected  $m_rep;

    protected $c_rep;

/**
 * name template to display info
 * @var string $template
 */
    protected $template;

/**
 * array variables for template
 * @var array $vars
 */
    protected $vars = [];

/**
 * display sidebar
 * @var string $bar
 *
*/
    protected $bar = 'no';

    protected $contentRightBar = false;
    protected $contentLeftBar = false;

    public function __construct(MenuRepository $m_rep)
    {
        $this->MenuBuilder = new MenuBuilder();
        $this->m_rep = $m_rep;

    }
/**
 *rendered templates
 *
 */
    protected function renderOutput(){
        $this->vars = array_add($this->vars,'keywords',$this->keywords);
        $this->vars = array_add($this->vars,'meta_desc',$this->meta_desc);
        $this->vars = array_add($this->vars,'title',$this->title);
        $menu = $this->MenuBuilder->getItems($this->getMenu());
        $this->vars = array_add($this->vars,'navigation',view(env('THEME').'.navigation')->with('menu',$menu)->render());
        $this->vars = array_add($this->vars,'bar',$this->bar);

        return view($this->template)->with($this->vars);
    }

    protected function getMenu(){
        return $this->m_rep->get()->toArray();
    }


}
