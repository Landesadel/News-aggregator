<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;

class OrderDataUploadController extends Controller
{
    /**
     * @return View
     */
    public function index():View
    {
        return \view('Form.orderUpload');
    }

    /**
     * @return RedirectResponse
     */
    public function saveInFile(): RedirectResponse
    {
        file_put_contents('public/dataFiles/upload.php', request()->all(), FILE_APPEND);
        return redirect()->route('form.upload');
    }
}
