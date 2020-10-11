<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    /**
     * @author chungdd
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        $viewData = [
            'contacts' => $contacts
        ];
        return view('admin.contact.index', $viewData);
    }

    /**
     * @author chungdd
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Contact::find($id)->delete();
        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Xoá dữ liệu thành công'
        ]);
        return redirect()->back();
    }
}
