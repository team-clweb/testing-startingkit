<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Spatie\LaravelPdf\Facades\Pdf;

class DownloadMenuController extends Controller
{
    public function __invoke()
    {
        $dishes = Dish::with('recipe.ingredients.allergies')->get();

        return Pdf::view('pdfs.menu', compact('dishes'))
            ->format('a4')
            ->name('menukaart.pdf');
    }
}
