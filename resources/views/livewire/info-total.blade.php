<div class="py-4 flex flex-col space-y-4">
    @if (!!$ongkir && !!$total)
        <span class="flex justify-between">
            <p>Subtotal</p>
            <p class="font-bold">{{ \App\Helpers\CurrencyFormat::data(Cart::getTotal()) }}</p>
        </span>
        <span class="flex justify-between items-center">
            <span>
                <p>Biaya Ongkir</p>
                <span class="text-sm text-grey-secondary">
                    <p>{{ $ongkir['code'] . " " . $ongkir['service'] }}</p>
                    <p>{{"Estimasi Pengiriman " . $ongkir['etd'] . " Hari" }}</p>
                </span>
            </span>
            <span class="font-bold">{{ \App\Helpers\CurrencyFormat::data($ongkir['value']) }}</span>
        </span>
        <span class="flex justify-between">
            <p>Total</p>
            <span class="text-xl font-bold text-primary">{{ \App\Helpers\CurrencyFormat::data($total) }}</span>
        </span>
    @endif
</div>
