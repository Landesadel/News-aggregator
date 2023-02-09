<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
     * @return int|false
     */
    public function __invoke(Request $request): bool|int
    {
        $status = file_put_contents(public_path('callback.json'), json_encode($request->all()));
        redirect()->route('form.callback');
        return $status;
    }
}
