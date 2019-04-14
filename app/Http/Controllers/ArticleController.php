<?php
/**
 * Created by PhpStorm.
 * User: Valerii
 * Date: 09.03.2019
 * Time: 16:41
 */

namespace Project\Http\Controllers;
use Project\Repositories\PortfolioRepository;
use Project\Repositories\ArticlesRepository;
use Project\Repositories\CommentsRepository;

class ArticleController extends SiteController
{
    public function __construct(PortfolioRepository $p_rep, ArticlesRepository $a_rep, CommentsRepository $c_rep)
    {
        parent::__construct(new \Project\Repositories\MenuRepository(new \Project\Models\Menu));
        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;
        $this->c_rep = $c_rep;

        $this->bar = 'right';

        $this->template = env('THEME').'.articles';
    }

    public function index(){
        $this->keywords = 'Article page';
        $this->meta_desc = 'Article page';
        $this->title = 'Article page';
        $articles = $this->getArticles();
        $content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();
        $comments = $this->c_rep->get();
        $portfolios = $this->p_rep->get();
        $this->contentRightBar = view(env('THEME').'.articlesBar')->with(['comments'=>$comments,'portfolios'=>$portfolios]);
        $this->vars = array_add($this->vars,'content',$content);
        $this->vars = array_add($this->vars,'sidebar', $this->contentRightBar);
        $this->vars = array_add($this->vars,'footer','');
        return $this->renderOutput();
    }

    public function getArticles($alias = false){
        $articles = $this->a_rep->get(['id','title','alias','created_at','img','desc','user_id','category_id',],false,1);
        if($articles) $articles->load('user','category','comments');
        return $articles;
    }
}