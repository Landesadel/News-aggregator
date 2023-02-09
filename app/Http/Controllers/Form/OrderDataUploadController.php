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
     * @return int|false
     */
    public function __invoke(Request $request): bool|int
    {
        $status = file_put_contents(public_path('data.json'), json_encode($request->all()));
        redirect()->route('form.upload');
        return $status;
    }
}
