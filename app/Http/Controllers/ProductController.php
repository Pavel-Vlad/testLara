<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Jobs\SendEmailJob;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller //TODO DB methods move in Model
{
    public function index()
    {
        $data['products'] = Product::all();

        return view('products', $data);
    }

    public function delete($id)
    {
        Product::where('id', $id)->delete();

        return back();
    }

    protected function update(UpdateProductRequest $request, $id)
    {
        Product::where('id', $id)
            ->update([
                'article' => $request->article,
                'name' => $request->name,
                'status' => $request->status,
                'data' => $request->data
            ]);

        return back();

    }

    public function create(CreateProductRequest $request)
    {
        $product = Product::create([
            'article' => $request->article,
            'name' => $request->name,
            'status' => $request->status,
            'data' => $request->data
        ]);

        SendEmailJob::dispatch($product);

        return back();

    }

}
