<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function index()
    {
        return view('frontend.pages.contact.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = Carbon::now();

        Contact::insert($data);
        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Cảm ơn bạn. Chúng tối sẽ sớm liên hệ với bạn'
        ]);

        return redirect()->to('/');
    }
}
