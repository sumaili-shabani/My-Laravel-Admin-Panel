<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\ArticleType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('title', "Titre")->display(function($val){
           return substr($val, 0, 40).'...'; 
        });
        $grid->column('sub_title', __("Sous Titre"))->display(function($val){
           return substr($val, 0, 40).'...'; 
        });
        $grid->column('article.title', __('Catégorie'));
        $grid->column('released')->bool();
        // $grid->column('description', __('Description'))->display(function($val){
        //    return substr($val, 0, 3000); 
        // });
        
        $grid->column('thumbnail', __('Image'))->image('','80', '80')->display(function($val){
            if(empty($val)){
                return "No Thumbnal";
            }
            return $val;
        });
        $grid->model()->orderBy('created_at','desc');
        $grid->filter(function($filter){
           $filter->disableIdFilter();
           $filter->like('title', __('Titre'));
           $filter->like('article.title', __('Catégorie'));
        });


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());

        $form->select('type_id', "Select")->options((new ArticleType())::selectOptions());
        $form->text("title", __("Titreitre"))->placeholder("Type in the article title")->required();
        $form->text("sub_title", __("Sous titre"))->placeholder("Type in the article sub title");
        $form->image('thumbnail', __("Importer l'image "))->move('/article/');
        $form->UEditor('description', __("Description de l'article"))->required();
    
        $states = [
            'on'=>['value'=>1, 'text'=>'publish', 'color'=>'success'],
            'off'=>['value'=>0, 'text'=>'draft', 'color'=>'default'],
        ];
            
        $form->switch('released', __('Publier'))->states($states);

        return $form;
    }
}
