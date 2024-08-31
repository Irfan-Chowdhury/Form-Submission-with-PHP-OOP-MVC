<?php

namespace App\Controllers;

use App\Models\Journal;
use App\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Exception;

class HomeController extends Controller
{
    public static $orderService;

    public static $orderModel;

    public function __construct()
    {
        $this->orderService = new OrderService();
        $this->orderModel = new Order();
    }

    public function index()
    {
        $orderData = $this->orderModel->getAll();

        $this->render('index', ['orderData' => $orderData]);
    }

    public function create()
    {
        $this->render('create');
    }


    public function store()
    {
        try {

            $this->orderService->validation($_POST);
 
            $data = $this->orderService->requestDataManage($_POST);

            $dbArr = self::escapeString($data);

            $this->orderModel->insert($dbArr);

            return $this->sendResponse([],'Data submitted successfully');

        } catch (Exception $exception) {

            return $this->sendError($exception->getMessage(), $exception->getCode());
        }
    }


    private function escapeString(array $data) : array
    {
        $dbArr = [];
        foreach ($data as $key => $value) {
            $dbArr[$key] = $this->orderModel->mysqliRealEscapeString($value);
        }

        return $dbArr;
    }
}
