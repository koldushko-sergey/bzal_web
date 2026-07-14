<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiquidationItem;
use App\Traits\UploadsFiles;
use Illuminate\Http\Request;

class LiquidationItemController extends Controller
{
    use UploadsFiles;

    public function index()
    {
        $items = LiquidationItem::orderBy('sort_order')->paginate(15);

        return view('admin.liquidation.index', compact('items'));
    }

    public function create()
    {
        return view('admin.liquidation.form', ['item' => new LiquidationItem]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['image'] = $this->storeImage($request->file('image'), 'liquidation');
        $data['is_published'] = $request->boolean('is_published');

        LiquidationItem::create($data);

        return redirect()->route('admin.liquidation.index')->with('success', 'Позиция добавлена.');
    }

    public function edit(LiquidationItem $liquidationItem)
    {
        return view('admin.liquidation.form', ['item' => $liquidationItem]);
    }

    public function update(Request $request, LiquidationItem $liquidationItem)
    {
        $data = $this->validated($request);
        $data['image'] = $this->storeImage($request->file('image'), 'liquidation', $liquidationItem->image);
        $data['is_published'] = $request->boolean('is_published');

        $liquidationItem->update($data);

        return redirect()->route('admin.liquidation.index')->with('success', 'Позиция обновлена.');
    }

    public function destroy(LiquidationItem $liquidationItem)
    {
        $this->deleteFile($liquidationItem->image);
        $liquidationItem->delete();

        return redirect()->route('admin.liquidation.index')->with('success', 'Позиция удалена.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'contact_info' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|max:5120',
        ]);
    }
}
