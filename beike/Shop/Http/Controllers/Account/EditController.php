<?php
/**
 * AccountController.php
 *
 * @copyright  2022 opencart.cn - All Rights Reserved
 * @link       http://www.guangdawangluo.com
 * @author     TL <mengwb@opencart.cn>
 * @created    2022-06-23 20:22:54
 * @modified   2022-06-23 20:22:54
 */

namespace Beike\Shop\Http\Controllers\Account;

use Beike\Repositories\CustomerRepo;
use Illuminate\Http\RedirectResponse;
use Beike\Shop\Http\Requests\EditRequest;
use Beike\Shop\Http\Controllers\Controller;

class EditController extends Controller
{
    public function index()
    {
        $customer = current_customer();
        $data['customer'] = $customer;
        return view('account/edit', $data);
    }


    /**
     * 顾客修改个人信息
     * @param EditRequest $request
     * @return RedirectResponse
     */
    public function update(EditRequest $request): RedirectResponse
    {
        CustomerRepo::update(current_customer(), $request->only('name', 'email', 'avatar'));
        return redirect()->to(shop_route('account.edit.index'))->with('success', '修改成功');
    }
}
