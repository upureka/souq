<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscriber;
use Mail;
use Carbon\Carbon;

class SubscriberController extends Controller
{
    //
    public function getIndex() {
        $subscribtions = Subscriber::latest()->paginate(15);
        if (request()->ajax()) {
            return view('admin.pages.subscribtions.templates.table', compact('subscribtions'))->render();
        }
        return view('admin.pages.subscribtions.index', compact('subscribtions'));
    }

    public function getSearch($q = null) {
        if (!empty($q)) {
            $cols = (new Subscriber)->getTableColumns();
            $subscribtions = Subscriber::latest();
            $subscribtions->where('id', 'LIKE', "%$q%");
            foreach ($cols as $col) {
                if (in_array($col, ['id', 'created_at', 'updated_at'])) {
                    continue;
                }
                $subscribtions->orWhere($col, 'LIKE', "%$q%");
            }
        } else {
            $subscribtions = Subscriber::latest();
        }
        $subscribtions = $subscribtions->paginate(15);

        return view('admin.pages.subscribtions.templates.table', compact('subscribtions'))->render();
    }

    /**
     * View Contant with given id.
     *
     * @param  int $id
     * @return View
     */
    public function getView($id) {
        $subscribtion = Subscriber::find($id);
        $subscribtion->seen = 1;
        $subscribtion->save();
        return view('admin.pages.subscribtions.modals.subscribtion-modal-view', compact('subscribtion'))->render();
    }

    public function postSend(Request $request) {
        //dd($request->all());
        if (!$request->has('ids')) {
            return ['status' => false, 'title' => 'error', 'data' => 'برجاء اختيار بريد'];
        }

        if (!$request->has('content')) {
            return ['status' => false, 'title' => 'error', 'data' => 'برجاء ادخال محتوي الرساله'];
        }

        if (!$request->has('subject')) {
            return ['status' => false, 'title' => 'error', 'data' => 'برجاء ادخال عنوان الرساله'];
        }

        $ids = $request->input('ids');
        //dd($request->all());
        foreach ($ids as $id) {
            $this->sendMail($id, $request->subject, $request->message);
        }
        return ['status' => 'success',
            'title' => 'success',
            'data' => 'تم ارسال الرساله بنجاح'];
    }

    public function postAction($action, Request $r) {
        $state = 0;
        switch ($action) {
            case 'seen':
                $state = 1;
                break;
            case 'unseen':
                $action = 'seen';
                $state = 0;
                break;
            case 'deleted':
                $action = 'deleted';
                break;
            default :
                $data = ['status' => 'error', 'title' => 'failed',
                    'msg' => 'عمليه غير مدعومه'];
                return $data;
        }

        if ($r->has('ids')) {
            $ids = $r->input('ids');
            foreach ($ids as $id) {
                $this->_action($id, $action, $state);
            }
            $data = ['status' => 'success', 'title' => 'success', 'msg' => 'تم اتمام العمليه ينجاح'];
        } else {
            $data = ['status' => 'warning', 'title' => 'error', 'msg' => 'برجاء اختيار بريد واحد علي '];
        }

        return $data;
    }

    protected function _action($id, $action, $state) {
        $faq = Subscriber::find($id);
        if ($action === 'deleted') {
            $faq->delete();
            return;
        }
        $faq->$action = $state;
        $faq->save();
    }

    public function getFilter($filter) {
        $subscribtions = Subscriber::latest();
        $subscribtions = $this->_filter($subscribtions, $filter)->paginate(15);
        return view('admin.pages.subscribtions.templates.table', compact('subscribtions'))->render();
    }

    protected function _filter(&$subscribtions, $filter) {
        switch ($filter) {
            case 'all':
                return $subscribtions;
            case 'seen':
                return $subscribtions->where('seen', 1);
            case 'unseen':
                return $subscribtions->where('seen', 0);
            case 'today':
                return $subscribtions->where('created_at', '>=', Carbon::today()->toDateString());
        }
    }

    protected function sendMail($id, $subject, $mail) {
        $user = Subscriber::find($id);
        Mail::send('admin.mails.form-mail', compact('mail'), function ($m) use ($user, $subject) {
            $m->to($user->email, $user->email)->subject($subject);
        });
    }

    public function getDelete($id) {
        $faq = Subscriber::find($id);
        if (!$faq) {
            return back()->withError('no id.');
        }
        $faq->delete();
        return back()->withSuccess('Deleted Successfully.');
    }

}
