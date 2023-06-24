<div class="container mx-auto">
    @if ($message = Session::get('success'))
        <div class="bg-green p-4 rounded">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="w-2/3 mx-auto py-10">
        <div class="overflow-x-auto">
            <table class="table">
                <thead class="bg-grey-secondary">
                    <tr class="text-sm font-bold text-center">
                        <th></th>
                        <th>PRODUCT</th>
                        <th>QTY</th>
                        <th>PRICE</th>
                        <th>TOTAL PRICE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr class="text-center">
                            <td></td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ \App\Helpers\CurrencyUtils::formatCurrency($item['price']) }}</td>
                            <td class="justify-center flex gap-3 items-center">
                                <livewire:cart-update :item="$item" :key="$item['id']" />
                            </td>
                            <td>{{ $item['price'] * $item['quantity'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
