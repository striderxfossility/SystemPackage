<?php
namespace Jelle\Strider\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

use Jelle\Strider\View\Basics\PriceLoadComponent;
use Jelle\Strider\View\Basics\SearchButtonComponent;
use Jelle\Strider\View\Blocks\ActiesComponent;
use Jelle\Strider\View\Blocks\AlgemeenComponent;
use Jelle\Strider\View\Blocks\BijlagenComponent;
use Jelle\Strider\View\Blocks\BlockButtonComponent;
use Jelle\Strider\View\Blocks\BlockComponent;
use Jelle\Strider\View\Blocks\BlockSmallComponent;
use Jelle\Strider\View\Blocks\BlockTitleComponent;
use Jelle\Strider\View\Blocks\EmailComponent;
use Jelle\Strider\View\Blocks\ImportComponent;
use Jelle\Strider\View\Blocks\NavigationComponent;
use Jelle\Strider\View\Blocks\NewItemComponent;
use Jelle\Strider\View\Blocks\SearchComponent;
use Jelle\Strider\View\Blocks\SendedComponent;
use Jelle\Strider\View\Cols\FullComponent;
use Jelle\Strider\View\Cols\OneTwoOneComponent;
use Jelle\Strider\View\Cols\ThreeOneComponent;
use Jelle\Strider\View\Forms\FormAttachmentComponent;
use Jelle\Strider\View\Forms\FormDateComponent;
use Jelle\Strider\View\Forms\FormInputComponent;
use Jelle\Strider\View\Forms\FormMainComponent;
use Jelle\Strider\View\Forms\FormSearchComponent;
use Jelle\Strider\View\Forms\FormSelectComponent;
use Jelle\Strider\View\Forms\FormSubmitComponent;
use Jelle\Strider\View\Forms\FormTextareaComponent;
use Jelle\Strider\View\Pages\Attachments\AttachmentsRelationComponent;
use Jelle\Strider\View\Pages\Choices\ChoiceRelationComponent;
use Jelle\Strider\View\Pages\Colors\ColorsTableComponent;
use Jelle\Strider\View\Pages\Contacts\ContactsTableComponent;
use Jelle\Strider\View\Pages\Contacts\SmallContactComponent;
use Jelle\Strider\View\Pages\Emails\EmailsTableComponent;
use Jelle\Strider\View\Pages\Groothuis\GroothuisTableComponent;
use Jelle\Strider\View\Pages\Hoekprofielen\HoekprofielenTableComponent;
use Jelle\Strider\View\Pages\Inkopen\InkopenRelationComponent;
use Jelle\Strider\View\Pages\Invoices\InvoicesRelationComponent;
use Jelle\Strider\View\Pages\Invoices\InvoicesTableComponent;
use Jelle\Strider\View\Pages\Layouts\LayoutsTableComponent;
use Jelle\Strider\View\Pages\Lijms\LijmsTableComponent;
use Jelle\Strider\View\Pages\Materialproducts\MaterialproductsRelationComponent;
use Jelle\Strider\View\Pages\Montageprijzen\MontageprijzenTableComponent;
use Jelle\Strider\View\Pages\Notes\NotesGridComponent;
use Jelle\Strider\View\Pages\Offers\OffersRelationComponent;
use Jelle\Strider\View\Pages\Offers\OffersTableComponent;
use Jelle\Strider\View\Pages\Orderproducts\OrderproductRelationComponent;
use Jelle\Strider\View\Pages\Orders\OrderReplationComponent;
use Jelle\Strider\View\Pages\Orders\OrdersTableComponent;
use Jelle\Strider\View\Pages\Packages\PackageRelationComponent;
use Jelle\Strider\View\Pages\Packages\PackageTableComponent;
use Jelle\Strider\View\Pages\Products\ProductsOpenstaandRelationComponent;
use Jelle\Strider\View\Pages\Products\ProductsRelationComponent;
use Jelle\Strider\View\Pages\Products\ProductsTableComponent;
use Jelle\Strider\View\Pages\Rapports\RapportsTableComponent;
use Jelle\Strider\View\Pages\Rooms\RoomsRelationComponent;
use Jelle\Strider\View\Pages\Rooms\RoomsTableComponent;
use Jelle\Strider\View\Pages\Rows\EmptyRowComponent;
use Jelle\Strider\View\Pages\Rows\RowComponent;
use Jelle\Strider\View\Pages\Shadowproducten\ShadowproductenRelationComponent;
use Jelle\Strider\View\Pages\Shadowtegels\ShadowtegelsRelationComponent;
use Jelle\Strider\View\Pages\Showrooms\ShowroomsTableComponent;
use Jelle\Strider\View\Pages\Sills\SillsTableComponent;
use Jelle\Strider\View\Pages\Stockproducts\StockproductsRelationComponent;
use Jelle\Strider\View\Pages\Suppliers\SuppliersTableComponent;
use Jelle\Strider\View\Pages\Tegelzetters\TegelzettersTableComponent;
use Jelle\Strider\View\Pages\Tegelzetters\TegezettersRelationComponent;
use Jelle\Strider\View\Pages\Tiles\TilesOpenstaandRelationComponent;
use Jelle\Strider\View\Pages\Tiles\TilesRelationComponent;
use Jelle\Strider\View\Pages\Tiles\TilesTableComponent;
use Jelle\Strider\View\Pages\Timeblocks\TimeblocksTableComponent;
use Jelle\Strider\View\Pages\Timesheets\TimesheetsRelationComponent;
use Jelle\Strider\View\Pages\Timesheets\TimesheetsTableComponent;
use Jelle\Strider\View\Pages\Timesheets\TimesheetsTimelineComponent;
use Jelle\Strider\View\Pages\Voegen\VoegenTableComponent;
use Jelle\Strider\View\Pages\Voorstrijks\VoorstrijksTableComponent;
use Jelle\Strider\View\Pages\Workorders\WorkordersGraftableComponent;
use Jelle\Strider\View\Pages\Workorders\WorkordersRelationComponent;
use Jelle\Strider\View\Pages\Workorders\WorkordersTableComponent;
use Jelle\Strider\View\Table\BodyColumnComponent;
use Jelle\Strider\View\Table\BodyRowComponent;
use Jelle\Strider\View\Table\HeadColumnComponent;
use Jelle\Strider\View\Table\HeadRowComponent;
use Jelle\Strider\View\Table\TableBodyComponent;
use Jelle\Strider\View\Table\TableHeadComponent;
use Jelle\Strider\View\Table\TableMainComponent;

class ComponentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::component('row',                             RowComponent::class);
        Blade::component('empty-row',                       EmptyRowComponent::class);
        Blade::component('offers-table',                    OffersTableComponent::class);
        Blade::component('timeblocks-table',                TimeblocksTableComponent::class);
        Blade::component('timesheets-table',                TimesheetsTableComponent::class);
        Blade::component('workorders-table',                WorkordersTableComponent::class);
        Blade::component('workorders-graftable',            WorkordersGraftableComponent::class);
        Blade::component('invoices-table',                  InvoicesTableComponent::class);
        Blade::component('emails-table',                    EmailsTableComponent::class);
        Blade::component('orders-table',                    OrdersTableComponent::class);
        Blade::component('hoekprofielen-table',             HoekprofielenTableComponent::class);
        Blade::component('layouts-table',                   LayoutsTableComponent::class);
        Blade::component('lijms-table',                     LijmsTableComponent::class);
        Blade::component('montageprijzen-table',            MontageprijzenTableComponent::class);
        Blade::component('sills-table',                     SillsTableComponent::class);
        Blade::component('suppliers-table',                 SuppliersTableComponent::class);
        Blade::component('voegen-table',                    VoegenTableComponent::class);
        Blade::component('voorstrijks-table',               VoorstrijksTableComponent::class);
        Blade::component('colors-table',                    ColorsTableComponent::class);
        Blade::component('contacts-table',                  ContactsTableComponent::class);
        Blade::component('groothuis-table',                 GroothuisTableComponent::class);
        Blade::component('rapports-table',                  RapportsTableComponent::class);
        Blade::component('packages-table',                  PackageTableComponent::class);
        Blade::component('tiles-table',                     TilesTableComponent::class);
        Blade::component('products-table',                  ProductsTableComponent::class);
        Blade::component('rooms-table',                     RoomsTableComponent::class);
        Blade::component('tegelzetters-table',              TegelzettersTableComponent::class);
        Blade::component('showrooms-table',                 ShowroomsTableComponent::class);
        Blade::component('table-main',                      TableMainComponent::class);
        Blade::component('table-head',                      TableHeadComponent::class);
        Blade::component('table-body',                      TableBodyComponent::class);
        Blade::component('table-body-row',                  BodyRowComponent::class);
        Blade::component('table-body-column',               BodyColumnComponent::class);
        Blade::component('table-head-row',                  HeadRowComponent::class);
        Blade::component('table-head-column',               HeadColumnComponent::class);
        Blade::component('blocks-navigation',               NavigationComponent::class);
        Blade::component('blocks-title',                    BlockTitleComponent::class);
        Blade::component('blocks-button',                   BlockButtonComponent::class);
        Blade::component('block',                           BlockComponent::class);
        Blade::component('block-small',                     BlockSmallComponent::class);
        Blade::component('blocks-import',                   ImportComponent::class);
        Blade::component('cols-1-2-1',                      OneTwoOneComponent::class);
        Blade::component('cols-3-1',                        ThreeOneComponent::class);
        Blade::component('cols-full',                       FullComponent::class);
        Blade::component('search',                          SearchComponent::class);
        Blade::component('blocks-new-item',                 NewItemComponent::class);
        Blade::component('blocks-acties',                   ActiesComponent::class);
        Blade::component('contacts-small',                  SmallContactComponent::class);
        Blade::component('notes-grid',                      NotesGridComponent::class);
        Blade::component('blocks-algemeen',                 AlgemeenComponent::class);
        Blade::component('forms-main',                      FormMainComponent::class);
        Blade::component('input-text',                      FormInputComponent::class);
        Blade::component('input-date',                      FormDateComponent::class);
        Blade::component('input-submit',                    FormSubmitComponent::class);
        Blade::component('input-textarea',                  FormTextareaComponent::class);
        Blade::component('input-select',                    FormSelectComponent::class);
        Blade::component('input-search',                    FormSearchComponent::class);
        Blade::component('input-attachment',                FormAttachmentComponent::class);
        Blade::component('blocks-bijlagen',                 BijlagenComponent::class);
        Blade::component('blocks-email',                    EmailComponent::class);
        Blade::component('sended',                          SendedComponent::class);
        Blade::component('timeline',                        TimesheetsTimelineComponent::class);
        Blade::component('relation-offers',                 OffersRelationComponent::class);
        Blade::component('relation-timesheets',             TimesheetsRelationComponent::class);
        Blade::component('relation-attachments',            AttachmentsRelationComponent::class);
        Blade::component('relation-invoices',               InvoicesRelationComponent::class);
        Blade::component('relation-stockproducts',          StockproductsRelationComponent::class);
        Blade::component('relation-materialproducts',       MaterialproductsRelationComponent::class);
        Blade::component('relation-inkopen',                InkopenRelationComponent::class);
        Blade::component('relation-workorders',             WorkordersRelationComponent::class);
        Blade::component('relation-rooms',                  RoomsRelationComponent::class);
        Blade::component('relation-shadowtegels',           ShadowtegelsRelationComponent::class);
        Blade::component('relation-shadowproducten',        ShadowproductenRelationComponent::class);
        Blade::component('relation-packages',               PackageRelationComponent::class);
        Blade::component('relation-products',               ProductsRelationComponent::class);
        Blade::component('relation-choices',                ChoiceRelationComponent::class);
        Blade::component('relation-tegelzetters',           TegezettersRelationComponent::class);
        Blade::component('relation-orders',                 OrderReplationComponent::class);
        Blade::component('relation-orderproducts',          OrderproductRelationComponent::class);
        Blade::component('relation-products-openstaand',    ProductsOpenstaandRelationComponent::class);
        Blade::component('relation-tiles-openstaand',       TilesOpenstaandRelationComponent::class);
        Blade::component('relation-tiles',                  TilesRelationComponent::class);
        Blade::component('search-button',                   SearchButtonComponent::class);
        Blade::component('check-priceload',                 PriceLoadComponent::class);
    }
}