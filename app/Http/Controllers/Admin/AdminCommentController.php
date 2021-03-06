<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    /**
     * @author chungdd
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $comments = Comments::with('user:id,name')->paginate(10);

        $viewData = [
            'comments' => $comments
        ];

        return view('admin.comment.index', $viewData);
    }

    /**
     * @author chungdd
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        Comments::find($id)->delete($id);
        return redirect()->route('admin.comment.index')->with('msg','Xóa bình luận thành công');
    }
}
