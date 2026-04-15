    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\RiceController;
    use App\Http\Controllers\OrderController;
    use App\Http\Controllers\PaymentController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [RiceController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');
        

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';

    Route::post('/dashboard123', [RiceController::class, 'store']);
    Route::get('/dashboard-edit/{id}', [RiceController::class, 'edit']);
    Route::put('/dashboard-edit/{id}', [RiceController::class, 'update']);
    Route::delete('/dashboard-delete/{id}', [RiceController::class, 'destroy']);

    Route::get('/dashboard-order', [OrderController::class, 'index']);
    Route::post('/dashboard-order123', [OrderController::class, 'store']);
    Route::get('/dashboard-order-edit/{id}', [OrderController::class, 'edit']);
    Route::put('/dashboard-order-update/{id}', [OrderController::class, 'update']);
    Route::delete('/dashboard-order-delete/{id}', [OrderController::class, 'destroy']);

    Route::get('/dashboard-payment', [PaymentController::class, 'index']);
    Route::post('/dashboard-payment123', [PaymentController::class, 'store']);    
    Route::get('/dashboard-payment-edit/{id}', [PaymentController::class, 'edit']);
    Route::put('/dashboard-payment-update/{id}', [PaymentController::class, 'update']);