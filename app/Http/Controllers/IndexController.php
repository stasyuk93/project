<?php

namespace Project\Http\Controllers;

use Illuminate\Http\Request;
use Project\Repositories\SliderRepository;
use Project\Repositories\PortfolioRepository;
use Project\Repositories\ArticlesRepository;
use Config;

class IndexController extends SiteController
{
    public function __construct(SliderRepository $s_rep,PortfolioRepository $p_rep, ArticlesRepository $a_rep)
    {
        $this->p_rep = $p_rep;
        $this->s_rep = $s_rep;
        $this->a_rep = $a_rep;
        parent::__construct(new \Project\Repositories\MenuRepository(new \Project\Models\Menu));
        $this->template = env('THEME').'.index';
        $this->bar = 'right';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->keywords = 'Home page';
        $this->meta_desc = 'Home page';
        $this->title = 'Home page';
        $portfolios = $this->getPortfolios();
        $this->vars = array_add($this->vars,'portfolios',view(env('THEME').'.content')->with('portfolios',$portfolios)->render());
        $sliders = $this->getSliders();
        $this->vars = array_add($this->vars,'sliders',view(env('THEME').'.slider')->with('sliders',$sliders)->render());
        $articles = $this->getArticles();
        $this->contentRightBar=view(env('THEME').'.sidebar')->with('articles',$articles)->render();
        $this->vars = array_add($this->vars,'sidebar',$this->contentRightBar);
        $this->vars = array_add($this->vars,'footer',view(env('THEME').'.footer')->render());

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function getSliders(){
        $sliders = $this->s_rep->get();
        if($sliders->isEmpty()) return false;
        $sliders->transform(function ($item,$key){
            $item->img = Config::get('settings.slider_path').$item->img;
            return $item;
        });
        return $sliders;
    }

    protected function getPortfolios(){
        $portfolio = $this->p_rep->get('*',Config::get('settings.portfolio_count'));
        return $portfolio;
    }

    protected function getArticles(){
        $articles = $this->a_rep->get(['title','created_at','img','alias'],Config::get('settings.sidebar_articles_count'));
        return $articles;
    }
}
