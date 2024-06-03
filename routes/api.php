<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get-dinner', function(Request $request) {
    $client = Gemini::client(getenv('GEMINI_API_KEY'));
    $result = $client->geminiPro()->generateContent('Sugestão para jantar. apenas nome de 1 prato. ');
    return [$result->text()];
});
