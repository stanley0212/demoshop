<?php

namespace App\Admin\Controllers;

use App\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order);

        $grid->id('編號');
        $grid->user_id('使用者編號');
        $grid->address('寄送地址');
        $grid->total('總計');
        $grid->closed('是否關閉');
        $grid->created_at('建立時間');
        $grid->updated_at('更新時間');

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('address', __('Address'));
        $show->field('total', __('Total'));
        $show->field('closed', __('Closed'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->number('user_id', __('User id'));
        $form->textarea('address', __('Address'));
        $form->number('total', __('Total'));
        $form->switch('closed', __('Closed'));

        return $form;
    }
}
