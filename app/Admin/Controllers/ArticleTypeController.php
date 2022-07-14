<?php

namespace App\Admin\Controllers;

use App\Models\ArticleType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;

class ArticleTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = "Type d'article";

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ArticleType());

        $grid->column('title', __('titre'));
        $grid->filter(function($filter){
           $filter->disableIdFilter();
           $filter->like('title', __('Titre'));

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
        $show = new Show(ArticleType::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ArticleType());

        $form->select('parent_id', __("Catégorie"))->options((new ArticleType())::selectOptions());
        $form->text('title', __('Nom de la catégorie'))->required();
        $form->number('order', __("Ordre"))->default(0);


        return $form;
    }
}
