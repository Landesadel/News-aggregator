<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CallBackController extends Controller
{
    /**
     * @return View
     */
    public function index():View
    {
        return \view('Form.callback');
    }

    /**
     * @return RedirectResponse
     */
    public function saveInFile(): RedirectResponse
    {
        file_put_contents('public/dataFiles/callback.php', request()->all(), FILE_APPEND);
        return redirect()->route('form.callback');
    }
}
