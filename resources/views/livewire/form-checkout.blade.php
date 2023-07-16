<div class="flex flex-col pb-14">
    <form action="" wire:submit.prevent="submitOrder" method="POST">
        <div class="lg:py-14 flex flex-col space-y-6 w-full">

            <input type="number" class="input input-bordered rounded-full bg-grey-secondary-50 " placeholder="No.HP"
                wire:model="phoneNumber" required>
            @error('phoneNumber')
                @include('components.public.partials.error-message', ['message' => $message])
            @enderror

            <textarea class="textarea textarea-bordered bg-grey-secondary-50 font-bold" placeholder="Alamat" wire:model="address"
                required></textarea>
            @error('address')
                @include('components.public.partials.error-message', ['message' => $message])
            @enderror

            <select class="select rounded-full bg-grey-secondary-50" wire:model="selectedProvince" required>
                <option value="">Pilih Provinsi</option>
                @foreach ($provinces as $province)
                    @php
                        $data = [
                            'id' => $province['province_id'],
                            'name' => $province['province'],
                        ];
                    @endphp
                    <option value="{{ json_encode($data) }}">{{ $province['province'] }}</option>
                @endforeach
            </select>

            <select wire:model="selectedCity" {{ is_null($selectedProvince) ? 'disabled' : ' ' }}
                class="select rounded-full bg-grey-secondary-50 {{ is_null($selectedProvince) ? 'opacity-30' : 'opacity-100 ' }}"
                required>
                <option>PIlih Kota/Kabupaten</option>
                @foreach ($cities as $city)
                    @php
                        $data = [
                            'id' => $city['city_id'],
                            'name' => $city['city_name'],
                        ];
                    @endphp
                    <option value="{{ json_encode($data) }}">{{ $city['city_name'] }}</option>
                @endforeach
            </select>

            <select wire:model="selectedSubdistrict" {{ is_null($selectedCity) ? 'disabled' : '' }}
                class="select rounded-full bg-grey-secondary-50 {{ is_null($selectedCity) ? 'opacity-30' : 'opacity-100 ' }}"
                required>
                <option>Pilih Kecamatan</option>
                @foreach ($subdistricts as $subdistrict)
                    @php
                        $data = [
                            'id' => $subdistrict['subdistrict_id'],
                            'name' => $subdistrict['subdistrict_name'],
                        ];
                    @endphp
                    <option value="{{ json_encode($data) }}">{{ $subdistrict['subdistrict_name'] }}</option>
                @endforeach
            </select>

            <input type="number" class="input input-bordered rounded-full bg-grey-secondary-50 " placeholder="Kode Pos"
                wire:model="postalCode" required>
            @error('postalCode')
                @include('components.public.partials.error-message', ['message' => $message])
            @enderror

            <select wire:model="selectedCourier" {{ is_null($selectedSubdistrict) ? 'disabled' : '' }}
                class="select rounded-full bg-grey-secondary-50 {{ is_null($selectedSubdistrict) ? ' opacity-30' : ' opacity-100 ' }}"
                required>
                <option>Pilih Kurir</option>
                @foreach ($couriers as $courier)
                    <option value="{{ $courier }}">{{ $courier }}</option>
                @endforeach
            </select>


        </div>

        @if (!!$selectedCourier)
            <div class="flex flex-col space-y-4 w-1/2 form-control pb-14">
                @php
                    $costData = $costs['rajaongkir']['results'][0]['costs'] ?? null;
                    $courierCode = $costs['rajaongkir']['results'][0]['code'] ?? null;
                    // print_r($costData);
                    // print_r($courierCode['code'] ?? null);
                @endphp
                @if (!!$costData)
                    <p class="py-4 font-bold">Pilih jenis Ongkir</p>
                    @foreach ($costData as $index => $cost)
                        @php
                            $data = [
                                'code' => strtoupper($courierCode),
                                'service' => $cost['service'],
                                'value' => $cost['cost'][0]['value'],
                                'etd' => $cost['cost'][0]['etd'],
                            ];
                        @endphp
                        <label class="p-4 rounded-md bg-grey-secondary-50 label cursor-pointer flex flex-row gap-4"
                            wire:click="setOngkir">
                            <span class="flex flex-col">
                                <h4 class="uppercase font-bold">{{ $courierCode . ' ' . $cost['service'] }}</h4>
                                <p>{{ \App\Helpers\CurrencyFormat::data($cost['cost'][0]['value']) }}</p>
                                <p class="text-sm">{{ 'Estimasi Pengiriman ' . $cost['cost'][0]['etd'] . ' Hari' }}</p>
                            </span>
                            <input type="radio" wire:model="selectedCost" class="radio checked:bg-pink-primary"
                                value="{{ json_encode($data) }}" required />
                        </label>
                        @endforeach

                @endif
            </div>
        @endif

        <button type="submit" {{ is_null($selectedCost) ? 'disabled' : '' }}
            class="btn btn-primary text-white rounded-full">Submit</button>

    </form>

</div>
