<div class="flex flex-col pb-14">
    <form action="" wire:submit.prevent="submitMembership" method="POST">
        <div class="lg:py-14 flex flex-col space-y-6 w-full">
            <input type="text" class="input input-bordered rounded-full bg-grey-secondary-50 "
                placeholder="Nama Lengkap" wire:model="name" required>
            @error('name')
                @include('components.public.partials.error-message', ['message' => $message])
            @enderror

            <select class="select rounded-full input-bordered bg-grey-secondary-50" wire:model="selectedGender" required>
                @php
                    $genders = [
                        0 => 'Pria',
                        1 => 'Wanita',
                    ];
                @endphp
                <option value="">Jenis Kelamin</option>
                @foreach ($genders as $index => $gender)
                    <option value="{{ $genders[$index] }}">{{ $genders[$index] }}</option>
                @endforeach
            </select>
            <input type="number" class="input input-bordered rounded-full bg-grey-secondary-50 "
                placeholder="Nomor KTP ( Sesuai peraturan perundang-undangan )" wire:model="ktp" required>
            @error('ktp')
                @include('components.public.partials.error-message', ['message' => $message])
            @enderror

            <input type="number" class="input input-bordered rounded-full bg-grey-secondary-50 "
                placeholder="Nomor Telepon ( Terhubung ke WHatsApp Anda )" wire:model="phoneNumber" required>
            @error('phoneNumber')
                @include('components.public.partials.error-message', ['message' => $message])
            @enderror

            <input type="email" class="input input-bordered rounded-full bg-grey-secondary-50 " placeholder="Email"
                wire:model="email" required>
            @error('email')
                @include('components.public.partials.error-message', ['message' => $message])
            @enderror

            <input id="datepicker" type="text" class="input input-bordered rounded-full bg-grey-secondary-50 "
                placeholder="Tanggal Lahir" wire:model="ttl" required>
            @error('ttl')
                @include('components.public.partials.error-message', ['message' => $message])
            @enderror

            <span>
                <p class="text-grey-secondary">Detail Pengiriman</p>
            </span>

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
        </div>
        <button type="submit" class="btn btn-primary text-white rounded-full">Submit</button>
    </form>

    <script>
        flatpickr("#datepicker", {
            position: 'below',
            dateFormat: 'd-m-Y'
        });
    </script>
</div>
