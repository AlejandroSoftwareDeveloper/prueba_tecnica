<?php

use App\Http\Controllers\Api\V1\PersonaController;


// No se me instalo el passport
// Asi seria si se me hubiera instalado el passport
// Route::middleware('auth:api')->prefix('v1')->group(function () {
//     Route::apiResource('personas', PersonaController::class);
// });

Route::apiResource('personas', PersonaController::class);
