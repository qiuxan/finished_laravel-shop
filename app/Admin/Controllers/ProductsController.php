<?php

namespace App\Admin\Controllers;

use App\Models\Product;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ProductsController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('商品列表');
            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('Edit Product');
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('Create');
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Product::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->title('Name');
            $grid->on_sale('Listed')->display(function ($value) {
                return $value ? 'Yes' : 'No';
            });
            $grid->price('Price');
            $grid->rating('Rate');
            $grid->sold_count('Sales Count');
            $grid->review_count('Comments');

            $grid->actions(function ($actions) {
//                $actions->disableView();
                $actions->disableDelete();
            });
            $grid->tools(function ($tools) {
                //
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        // 创建一个表单
        return Admin::form(Product::class, function (Form $form) {

            // 创建一个输入框，第一个参数 title 是模型的字段名，第二个参数是该字段描述
            $form->text('title', 'Product Name')->rules('required');

            // 创建一个选择图片的框
            $form->image('image', 'Image')->rules('required|image');

            // 创建一个富文本编辑器
            $form->editor('description', 'Product Description')->rules('required');

            // 创建一组单选框
            $form->radio('on_sale', 'On Sale')->options(['1' => '是', '0'=> '否'])->default('0');

            // 直接添加一对多的关联模型
            $form->hasMany('skus', 'SKU List', function (Form\NestedForm $form) {
                $form->text('title', 'SKU Name')->rules('required');
                $form->text('description', 'SKU Description')->rules('required');
                $form->text('price', 'Price')->rules('required|numeric|min:0.01');
                $form->text('stock', 'Number In Stock')->rules('required|integer|min:0');
            });

            // 定义事件回调，当模型即将保存时会触发这个回调
            $form->saving(function (Form $form) {
                $form->model()->price = collect($form->input('skus'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price') ?: 0;
            });
        });
    }
}
