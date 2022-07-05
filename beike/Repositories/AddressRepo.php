<?php
/**
 * AddressRepo.php
 *
 * @copyright  2022 opencart.cn - All Rights Reserved
 * @link       http://www.guangdawangluo.com
 * @author     Edward Yang <yangjin@opencart.cn>
 * @created    2022-06-28 15:22:05
 * @modified   2022-06-28 15:22:05
 */

namespace Beike\Repositories;

use Beike\Models\Address;

class AddressRepo
{
    /**
     * 创建一个address记录
     * @param $data
     * @return int
     */
    public static function create($data)
    {
        $address = Address::query()->create($data);
        return $address;
    }

    /**
     * @param $address
     * @param $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     * @throws \Exception
     */
    public static function update($address, $data)
    {
        if (!$address instanceof Address) {
            $address = Address::query()->find($address);
        }
        if (!$address) {
            throw new \Exception("地址id {$address} 不存在");
        }
        $address->update($data);
        return $address;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public static function find($id)
    {
        return Address::query()->find($id);
    }

    /**
     * @param $id
     * @return void
     */
    public static function delete($id)
    {
        $address = Address::query()->find($id);
        if ($address) {
            $address->delete();
        }
    }

    public static function listByCustomer($customer)
    {
        if (gettype($customer) != 'object') {
            $customer = CustomerRepo::find($customer);
        }
        if ($customer) {
            return $customer->addresses()->with('country')->get();
        }
    }
}
