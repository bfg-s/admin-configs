<?php

namespace Admin\Extend\AdminConfigs;

use Admin\Extend\AdminConfigs\Models\ConfigModel;
use Admin\Models\AdminUser;
use Admin\Page;
use App\Admin\Controllers\Controller;
use App\Admin\Delegates\Buttons;
use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\ModelInfoTable;
use Lar\Layout\Respond;

class AdminConfigsController extends Controller
{
    /**
     * Static variable Model
     * @var string
     */
    static $model = ConfigModel::class;

    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  SearchForm  $searchForm
     * @param  ModelTable  $modelTable
     * @param  Buttons  $buttons
     * @return Page
     */
    public function index(
        Page $page,
        Card $card,
        SearchForm $searchForm,
        ModelTable $modelTable,
        Buttons $buttons,
    ) : Page {
        return $page->card(
            $card->search_form(
                $searchForm->id(),
                $searchForm->input('name', 'Name'),
                $searchForm->input('value', 'Value'),
            ),
            $card->model_table(
                $modelTable->id(),
//                $modelTable->col('Name', function (ConfigModel $model) {
//                    $name = $model->name;
//                    return "<a tabindex=\"0\" class=\"btn btn-xs btn-twitter\" role=\"button\" data-toggle=\"popover\" data-html=true title=\"Usage\" data-content=\"<code>config('$name');</code>\">$name</a>";
//                })->sort('name'),
                $modelTable->col('Name', 'name')->sort()->to_export()->copied,
                $modelTable->col('Value', 'value')->sort()->to_export(),
                $modelTable->col('Description', 'description')->sort()->to_export(),
                $modelTable->at(),
            ),
        );
    }

    /**
     * @param Page $page
     * @param Card $card
     * @param Form $form
     * @return Page
     */
    public function matrix(Page $page, Card $card, Form $form) : Page
    {
        return $page->card(
            $card->form(
                $form->ifEdit()->info_id(),
                $form->input('name', 'Name'),
                $form->textarea('value', 'Value'),
                $form->textarea('description', 'Description'),
                $form->ifEdit()->info_updated_at(),
                $form->ifEdit()->info_created_at(),
            ),
            $card->footer_form(),
        );
    }

    /**
     * @param Page $page
     * @param Card $card
     * @param ModelInfoTable $modelInfoTable
     * @return Page
     */
    public function show(Page $page, Card $card, ModelInfoTable $modelInfoTable) : Page
    {
        return $page->card(
            $card->model_info_table(
                $modelInfoTable->id(),
                $modelInfoTable->row('Name', 'name')->copied_right,
                $modelInfoTable->row('Value', 'value'),
                $modelInfoTable->row('Description', 'description'),
                $modelInfoTable->at()
            ),
        );
    }

}
