<?php

namespace App\Http\Controllers;

use App\Events\OrderCompleted;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Все заказы
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::with('partner', 'products')->paginate(50);

        return view('order.index', compact('data'));
    }

    /**
     * Текущие заказы
     *
     * @return \Illuminate\Http\Response
     */
    public function current()
    {
        $data = Order::with('partner', 'products')
                     ->where('status', Order::ORDER_STATUS_CONFIRMED)
                     ->whereBetween('delivery_dt', [now(), now()->addDay()])
                     ->orderBy('delivery_dt')
                     ->paginate(50);

        return view('order.index', compact('data'));
    }

    /**
     * Новые заказы
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        $data = Order::with('partner', 'products')
                     ->where('status', Order::ORDER_STATUS_NEW)
                     ->where('delivery_dt', '>', now())
                     ->orderBy('delivery_dt')
                     ->paginate(50);

        return view('order.index', compact('data'));
    }

    /**
     * Просроченные заказы
     *
     * @return \Illuminate\Http\Response
     */
    public function outdated()
    {
        $data = Order::with('partner', 'products')
                     ->where('status', Order::ORDER_STATUS_CONFIRMED)
                     ->where('delivery_dt', '<', now())
                     ->orderBy('delivery_dt', 'DESC')
                     ->paginate(50);

        return view('order.index', compact('data'));
    }

    /**
     * Выполненные заказы
     *
     * @return \Illuminate\Http\Response
     */
    public function completed()
    {
        $data = Order::with('partner', 'products')
                     ->where('status', Order::ORDER_STATUS_COMPLETED)
                     ->whereBetween('delivery_dt', [now(), now()->addDay()])
                     ->orderBy('delivery_dt', 'DESC')
                     ->paginate(50);

        return view('order.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Order::findOrFail($id);

        return view('order.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Order::findOrFail($id);

        return view('order.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'client_email' => 'required|email',
            'partner_id' => 'required|integer',
            'status' => 'required|integer',
        ]);

        /** @var Order $order */
        $order = Order::findOrFail($id);

        /** @noinspection TypeUnsafeComparisonInspection */
        if ($data['status'] == Order::ORDER_STATUS_COMPLETED && $order->status != $data['status']) {
            OrderCompleted::dispatch($order);
        }

        $order->update($data);

        return redirect()->back();
    }
}
