<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Gemini\Laravel\Facades\Gemini;

Route::get('/get-dinner', function(Request $request) {
    // $result = Gemini::geminiPro()->generateContent('Sugestão para jantar. apenas nome de 1 prato. ');
    $result = Gemini::generativeModel('gemini-1.5-flash')->generateContent('Sugestão para jantar. apenas nome de 1 prato. ');
    return [$result->text()];
});

Route::get('/models', function(Request $request) {
    $result = Gemini::models()->list();
    return [$result->models];
});
