<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\WhyChooseController;
use App\Http\Controllers\Admin\AddProductController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Admin\AllProductsController;
use App\Http\Controllers\CheckCountryStateController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\SubscribeController;
use App\Http\Controllers\Admin\SubscribeController as AdminSubscribeController;
use App\Http\Controllers\Admin\SingleProductController;
use App\Http\Controllers\User\AccountSettingController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Announcement;
use App\Http\Controllers\Admin\ApiCallingController;
use App\Http\Controllers\Admin\MapInformationController;
use App\Http\Controllers\Admin\SpecificationsController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\BasicInformationController;
use App\Http\Controllers\Admin\CookieController;
use App\Http\Controllers\Admin\CupponGenaratorController;
use App\Http\Controllers\Admin\FaqAdminController;
use App\Http\Controllers\Admin\GivenIPAdressController;
use App\Http\Controllers\Admin\ISPController;
use App\Http\Controllers\Admin\KnowledgebaseController;
use App\Http\Controllers\Admin\MassageController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Frontend\ResidentialRDPController;
use App\Http\Controllers\Frontend\ResidentialVPSController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SendReminderController;
use App\Http\Controllers\Admin\SingleMessagesController;
use App\Http\Controllers\Admin\SingleUserProfile;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\TeamMembersController;
use App\Http\Controllers\Admin\TermsConditionController;
use App\Http\Controllers\EmonApi;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\Knowledge;
use App\Http\Controllers\PrivacyPolicy;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\User\AddFundController;
use App\Http\Controllers\User\AnnouncementsController;
use App\Http\Controllers\User\ChangePasswordController;
use App\Http\Controllers\User\MyInvoiceController;
use App\Http\Controllers\User\MyProfileController;
use App\Http\Controllers\User\MyServicesController;
use App\Http\Controllers\User\TicketController;
use App\Http\Controllers\User\TricketDashboarddControoler;
use App\Http\Controllers\User\ViewTicketController;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::resource("/", WelcomeController::class)->middleware("visitorCount")->only(["index"]);

Route::resource('/contact', ContactController::class)->only(["index", "store"]);

Route::resource('/about', AboutController::class)->only(["index"]);

// Need Implement to Residential VPS & Residential RDP Route and view
Route::resource("/residential-vps", ResidentialVPSController::class)->only(["index"]);

Route::resource("/residential-rdp", ResidentialRDPController::class)->only(["index"]);

Route::resource("/subscribe", SubscribeController::class)->only(["index", "store"]);

Route::resource("/privacy-policy", PrivacyPolicy::class)->only(["index"]);

Route::resource('/admin/dashboard', AdminDashboardController::class)->only(["index"])->middleware(['auth:admin', 'verified'])->names([
    "index" => "admin.dashboard"
]);

Route::resource("/faq", FaqController::class)->only(["index"]);

Route::resource("/knowledge-base", Knowledge::class)->only(["index"]);


Route::middleware(["auth"])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(["auth", "verified"])->group(function () {
    Route::resource("/dashboard", DashboardController::class)->only(["index"]);
    Route::resource("/account-setting", AccountSettingController::class)->only(["index", "store"]);
    Route::resource("/review", ReviewController::class)->only(["show"]);
    Route::post("/checkout", [CheckoutController::class, "checkout"])->middleware("checkoutValidation");
    Route::resource("/my-services", MyServicesController::class)->only(["index"]);
    Route::resource("/my-invoice", MyInvoiceController::class)->only(["index", "show"]);
    Route::resource("/change-password", ChangePasswordController::class)->only(["index", "store"]);
    Route::resource("/open-ticket", TicketController::class)->only(["index"]);
    Route::resource("/ticket", TricketDashboarddControoler::class)->only(["index"]);
    Route::resource("/announcements", AnnouncementsController::class)->only(["index", "show"]);
    Route::resource("/my-profile", MyProfileController::class)->only(["index"]);
    Route::resource("/add-fund", AddFundController::class)->only(["index"]);
    Route::resource("/view-ticket", ViewTicketController::class)->only(['show', "store", "destroy"]);
    Route::get("/service-shutdown/{id}", [ApiCallingController::class, "index"]);
    Route::get("/service-boot/{id}", [ApiCallingController::class, "boot"]);
    Route::get("/service-reboot/{id}", [ApiCallingController::class, "restartApi"]);
});

// Country state check
Route::resource("/check-country-state", CheckCountryStateController::class)->only(["show"]);


Route::middleware(["auth:admin"])->prefix("admin")->group(function () {
    Route::resource("/basic-information", BasicInformationController::class)->only(["index", "store"]);
    Route::resource("/banner-information", BannerController::class)->only(["index", "store"]);
    Route::resource("/map-information", MapInformationController::class)->only(["index", "store"]);
    Route::resource("/page-information", PageController::class)->only(['index', "store"]);
    Route::resource("/specification", SpecificationsController::class)->only(["index", "store", "destroy"]);
    Route::resource("/why-choose-me", WhyChooseController::class)->only(["index"]);
    Route::resource("/terms-condition", TermsConditionController::class)->only(["index", "store"]);
    Route::resource("/update-privacy-policy", PrivacyPolicyController::class)->only(["index", "store"]);
    Route::resource("/cookie-policy", CookieController::class)->only(["index", "store"]);
    Route::resource("/support-information", SupportController::class)->only(["index", "store", "destroy"]);
    Route::resource("/announcement", Announcement::class)->only(["index", "store", "destroy"]);
    Route::resource("/team-members", TeamMembersController::class)->only(["index"]);
    Route::resource("/messages", MassageController::class)->only(["index", "show"]);
    Route::resource("/signle-messages", SingleMessagesController::class)->only(["show", "store"]);
});

Route::middleware(["auth:admin"])->prefix("admin/products/")->group(function () {
    Route::resource("/all-products", AllProductsController::class)->only(["index", "show", "destroy", "edit"]);
    Route::resource("/edit/single-product", SingleProductController::class)->only(["show", "update"]);
    Route::resource("/add-product", AddProductController::class)->only(["index", "store"]);
    Route::resource("/category", ProductCategoryController::class)->only(["index", "store", "show", "update", "edit", "destroy"]);
    Route::resource("/country", CountryController::class)->only(["index", "store", "destroy"]);
    Route::resource("/isp", ISPController::class)->only(["index", "destroy", "store"]);
    Route::resource("/cuppon", CupponGenaratorController::class)->only(["index", "store"]);
    Route::resource("/give-ip", GivenIPAdressController::class)->only(["update"]);
    Route::resource("/send-reminder", SendReminderController::class)->only(["show"]);
    Route::resource("/knowledgebase", KnowledgebaseController::class)->only(["index", "store"]);
    Route::resource("/frequently-sasked-questions", FaqAdminController::class)->only(["index", "store"]);
});

Route::middleware(["auth:admin"])->prefix("admin/orders/")->group(function () {
    Route::resource("/all-orders", OrdersController::class)->only(["index", "show", "store", "update", "edit"]);
});

Route::middleware(["auth:admin"])->prefix("admin")->group(function () {
    Route::resource("/all-users", UsersController::class)->only(["index", "destroy", "store"]);
    Route::resource("/all-subscribe", AdminSubscribeController::class)->only(["index"]);
});

Route::middleware(["auth:admin"])->prefix("admin")->group(function () {
    Route::resource("/profile", AdminProfileController::class)->only(["index", "store"])->names([
        "index" => "admin.profile"
    ]);
    Route::resource("/user-profile", SingleUserProfile::class)->only(["show"]);
});

Route::middleware(["auth"])->group(function(){
    Route::post("/sassion", [StripeController::class, "sassion"]);
    Route::post("/add-fund", [StripeController::class, "addFunds"])->name("fund.add");
    Route::get("/success", [StripeController::class, "success"])->middleware(['checkPaySuccess'])->name("success");
    Route::get("/fund-success", [StripeController::class, "fundSuccess"])->name("fund.success");
    Route::get("/cancle", [StripeController::class, "cancle"])->name("cancle");
});

Route::get('/dev', function () {
    // Simulating an error
    return abort(500);
});
// Route::middleware(["auth", "checkPayMethod"])->group(function(){
//     // SSLCOMMERZ Start
//     Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
//     Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

//     Route::post('/pay/{amount}/{product}', [SslCommerzPaymentController::class, 'index']);
//     Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

//     Route::post('/success', [SslCommerzPaymentController::class, 'success']);
//     Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
//     Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

//     Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//     //SSLCOMMERZ END
// });


Route::get("/emonapi", [EmonApi::class, "index"]);

Route::get("/go-back", function(){
    return Redirect::back();
})->name("go.back");

require __DIR__ . '/adminauth.php';

require __DIR__ . '/auth.php';
