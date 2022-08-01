<?php
/**
 * AdminUserController.php
 *
 * @copyright  2022 opencart.cn - All Rights Reserved
 * @link       http://www.guangdawangluo.com
 * @author     Edward Yang <yangjin@opencart.cn>
 * @created    2022-08-01 11:44:54
 * @modified   2022-08-01 11:44:54
 */

namespace Beike\Admin\Http\Controllers;

use Beike\Models\AdminUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function index()
    {
        $data = [
            'admin_users' => AdminUser::query()->with(['roles'])->get(),
            'admin_roles' => Role::query()->get()
        ];

        return view('admin::pages.admin_users.index', $data);
    }

    public function store(Request $request)
    {
        return json_success('保存成功');
    }

    public function update(Request $request, int $adminUserId)
    {
        return json_success('更新成功');
    }

    public function destroy(Request $request, int $adminUserId)
    {
        return json_success('删除成功');
    }
}