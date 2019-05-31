<?php
/**
 * Created by PhpStorm.
 * User: youxingxiang
 * Date: 2019/5/31
 * Time: 9:15 AM
 */
namespace Tw\Server\Controllers;
use Illuminate\Routing\Controller;
use Tw\Server\Facades\Tw;
use Tw\Server\Traits\Common;
class AdminController extends Controller
{

    use Common;
    /**
     * 创建
     */
    public function getUserInfo()
    {
        $this->bindScript(['file_upload','icheck']);
        $user = Tw::authLogic()->guard()->user();
        return view('tw::user.info',compact('user'));
    }

    /**
     *
     */
    public function postUserInfo()
    {
        $id = request()->post("id");
        $this->Model()->update($id);
        //return Tw::ajaxResponse("操作成功",route("tw.index.index"));
    }

    public function Model():object
    {
       return Tw::moldelLogic(Tw::newModel("Admin"));
    }


}