@extends('layouts.base-layout')

@section('title', 'Membership')
@section('content')

    <div class="container mx-auto px-6 lg:px-0 py-10">
        <div class="lg:w-1/2">
            <h3 class="text-xl">Join Membership</h3>
            <livewire:form-membership />
            {{-- <div class="flex flex-col pb-14">
                <form action="">
                    <div class="lg:py-14 flex flex-col space-y-6 w-full">
                        <input type="text" class="input input-bordered rounded-full bg-grey-secondary-50 "
                            placeholder="Nama Lengkap" required>
                        <select class="select rounded-full input-bordered bg-grey-secondary-50" wire:model="selectedProvince"
                            required>
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
                            placeholder="Nomor KTP ( Sesuai peraturan perundang-undangan )" required>
                        <input type="number" class="input input-bordered rounded-full bg-grey-secondary-50 "
                            placeholder="Nomor Telepon ( Terhubung ke WHatsApp Anda )" required>
                        <input type="email" class="input input-bordered rounded-full bg-grey-secondary-50 "
                            placeholder="Email" required>
                        <input id="datepicker" type="text"
                            class="input input-bordered rounded-full bg-grey-secondary-50 " placeholder="Tanggal Lahir"
                            required>
                        <span>
                            <p class="text-grey-secondary">Detail Pengiriman</p>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary text-white rounded-full">Submit</button>
                </form>

                <script>
                    flatpickr("#datepicker", {
                        position: 'below',
                        dateFormat: 'd-m-Y'
                    });
                </script>
            </div> --}}

        </div>
    </div>

@endsection
