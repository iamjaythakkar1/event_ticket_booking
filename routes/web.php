<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Admin Panel Controller
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\OrganiserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\SearchController;

// Organiser Panel Controller
use App\Http\Controllers\Organiser\EventController as OrganiserEventController;
use App\Http\Controllers\Organiser\OrganiserController as OrganiserPanel;
use App\Http\Controllers\Organiser\SpeakerController as OrganiserSpeakerController;
use App\Http\Controllers\Organiser\SearchController as SearchOrganiser;

// User Panel Controller
use App\Http\Controllers\TicketController;

// Models
use App\Models\Category;
use App\Models\Event;
use App\Models\Organiser;
use App\Models\Ticket;
use App\Models\User;

// Others
use Illuminate\Support\Facades\Auth;

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

// Homepage Route
Route::get('/', function () {
    $events = Event::where('status', 1)->orderby('event_date', 'ASC')->get();
    $categories = Category::all();
    return view('homepage.index', ['events' => $events, 'categories' => $categories]);
})->name('home');

// Event Route
Route::get('/events', function () {
    $events = Event::where('status', 1)->orderby('event_date', 'ASC')->get();
    return view('homepage.eventlist', ['events' => $events]);
})->name('event');

// Category Route
Route::get('/category', function () {
    $categories = Category::all();
    return view('homepage.eventcategory', ['categories' => $categories]);
})->name('category');

Route::get('/category/{string}', function ($string) {
    // dd($string);
    $events = Event::where('category_name', $string)->where('status', 1)->orderby('event_date', 'ASC')->get();
    return view('homepage.categoryshow', ['events' => $events, 'category' => $string]);
})->name('category.event');

// Event's Detail Route
Route::get('/event/detail/{id}', function ($id) {
    $events = Event::findOrFail($id);
    return view('homepage.eventdetail', ['events' => $events]);
})->name('event.detail');

// Authenticated Routes For Users
Route::middleware('auth')->group(function () {
    // Ticket Confirmation Route
    Route::post('/ticket/confirm', [TicketController::class, 'index'])->name('ticket.confirm');

    // Ticket Database Store Route
    Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket.store');

    Route::get('/ticket/view/{id}', function ($id) {
        // Retrieve User ID & Check Ticket is Belongs to That User or Not
        $userId = Auth::id();
        $ticket = Ticket::where('user_id', $userId)->findOrFail($id);
        return view('homepage.ticket', ['ticket' => $ticket]);
    })->name('ticketview');

    Route::get('/mytickets', function () {

        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $tickets = $user->tickets()->with('event')->get();

        return view('homepage.myticket', ['tickets' => $tickets]);
    })->name('mytickets');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Redirect Admin Route
Route::redirect('/admin', '/admin/dashboard');

// Redirect Organiser Route
Route::redirect('/organiser', '/organiser/dashboard');

// Admin's Route
Route::prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        Route::get('/login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'index'])->name('login');
        Route::post('/login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'store'])->name('store');
    });

    Route::middleware('admin')->group(function () {
        // Admin dashboard
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::resource('/organiser', OrganiserController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/event', EventController::class);
        Route::resource('/category', CategoryController::class);
        Route::resource('/speaker', SpeakerController::class);

        // Admin's Search Details
        Route::get('/search', [SearchController::class, 'search'])->name('search');

        // Admin's Payment Details
        Route::get('/payment', function () {
            $payments = Ticket::all();
            return view('admin.payment')->with(['payments' => $payments]);
        })->name('payment');

        // Admin's Profile 
        Route::get('/profile', function () {
            // Retrive Admin ID
            $profile = Auth::guard('admin')->user();
            return view('admin.profile')->with(['data' => $profile]);
        })->name('profile');

        // Admin Profile Update
        Route::post('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
    });
    // Admin Logout Route
    Route::post('/logout', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Organiser's Route
Route::prefix('organiser')->name('organiser.')->group(function () {
    Route::namespace('Auth')->middleware('guest:organiser')->group(function () {
        Route::get('/login', [\App\Http\Controllers\Organiser\Auth\AuthenticatedSessionController::class, 'index'])->name('login');
        Route::post('/login', [\App\Http\Controllers\Organiser\Auth\AuthenticatedSessionController::class, 'store'])->name('store');

        Route::get('/register', [OrganiserPanel::class, 'createOrganiser'])->name('create');
        Route::post('/register', [OrganiserPanel::class, 'register'])->name('register');
    });
    Route::middleware('organiser')->group(function () {
        Route::get('/dashboard', [OrganiserPanel::class, 'index'])->name('dashboard');

        Route::resource('/event', OrganiserEventController::class);
        Route::resource('/speaker', OrganiserSpeakerController::class);

        // Organiser's Search Details
        Route::get('/search', [SearchOrganiser::class, 'search'])->name('search');

        // Organiser's Payment Details
        Route::get('/payment', function () {
            // $payments = Ticket::all();

            $orgId = Auth::guard('organiser')->id();
            $org = Organiser::findOrFail($orgId);
            $events = $org->events()->with('tickets')->get();

            return view('organiser.payment')->with(['events' => $events]);
        })->name('payment');

        Route::get('payment/test', [OrganiserController::class, 'payment']);

        // Organiser's Profile
        Route::get('/profile', function () {
            // Retrive Organiser ID
            $id = Auth::guard('organiser')->id();
            $profile = Organiser::find($id);
            return view('organiser.profile')->with(['data' => $profile]);
        })->name('profile');
        Route::post('/profile', [OrganiserPanel::class, 'updateProfile'])->name('profile.update');
    });
    // Organiser Logout Route
    Route::post('/logout', [\App\Http\Controllers\Organiser\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
