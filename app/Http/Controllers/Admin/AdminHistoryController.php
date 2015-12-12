<?php

namespace Douyasi\Http\Controllers\Admin;

use Douyasi\Http\Requests\DynastyRequest;
use Douyasi\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Douyasi\Repositories\DynastyRepository;

/**
 * 历史长河主要控制器
 *
 * @author mahuan <mahuan1768@126.com>
 */
class AdminHistoryController extends BackController
{
    //构造函数
    public function __construct(
        DynastyRepository $dynasty)
    {
        parent::__construct();
        $this->dynasty = $dynasty;
        
        if (! user('object')->can('manage_contents')) {
            $this->middleware('deny403');
        }
    }

    /**
     * 历史长河页面首页
     */
    public function getIndex()
    {
        $dynasty = $this->dynasty->index();
        return view('back.history.index', compact('dynasty'));
    }

    /**
     * 业务流程
     * route('admin.flow')
     */
    public function getFlow()
    {
        return view('back.business.flow');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('back.history.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(DynastyRequest $request)
    {
        $data = $request->all();
        $dynasty = $this->dynasty->store($data);
        if ($dynasty->id) {
            return redirect()->route('admin.hisotry')->with('message', '成功新增分类！');
        } else {
            return redirect()->back()->withInput($request->input())->with('fail', '数据库操作返回异常！');
        }
    }
}
