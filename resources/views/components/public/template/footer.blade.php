<footer>
    <div class="bg-pink-bloosom py-14">
        <div class="container mx-auto">
            <div class="footer-content flex flex-col lg:flex-row text-sm px-6 lg:px-0 lg:gap-6">

                <div class="mb-4 lg:w-1/6">
                    <p class="text-lg font-bold text-pink-primary py-4">ABOUT US</p>
                    <div class="flex flex-col space-y-1">
                        <a href="{{ url('about') }}" class="hover:text-grey font-bold">OUR STORY</a>
                        <a href="{{ url('careers') }}" class="hover:text-grey font-bold">CAREERS</a>
                        <a href="#" class="hover:text-grey font-bold">OUR EVENT</a>
                    </div>
                </div>

                <div class="mb-4 lg:w-1/5">
                    <p class="text-lg font-bold text-pink-primary py-4">MARKETPLACE</p>
                    <div class="flex flex-row gap-4">
                        <div class="flex flex-col space-y-1">
                            <a href="#" class="hover:text-grey font-bold">OUR STORY</a>
                            <a href="{{ url('careers') }}" class="hover:text-grey font-bold">CAREERS</a>
                            <a href="#" class="hover:text-grey font-bold">OUR EVENT</a>
                        </div>
                        <div class="flex flex-col space-y-1">
                            <a href="#" class="hover:text-grey font-bold">OUR STORY</a>
                            <a href="{{ url('careers') }}" class="hover:text-grey font-bold">CAREERS</a>
                            <a href="#" class="hover:text-grey font-bold">OUR EVENT</a>
                        </div>
                    </div>
                </div>

                <div class="mb-4 lg:w-1/5">
                    <p class="text-lg font-bold text-pink-primary py-4">HELP</p>
                    <div class="flex flex-col space-y-1">
                        <p class="hover:text-grey font-bold">FIXED LINE (0274) 5025200</p>
                        <p class="hover:text-grey font-bold">CARELINE@HABBIE.CO.ID</p>
                    </div>
                </div>

                <div class="col-span-2 mb-4 lg:w-2/5">
                    <p class="text-lg font-bold py-4">NEWSLETTER</p>
                    <div class="flex flex-col space-y-1">
                        <p class="hover:text-grey">Sign Up to get Exclusive Promo and Update</p>
                        <livewire:form-subscribe />
                    </div>
                </div>
            </div>

            <div class="footer-copyright pt-14 px-6 lg:px-0">
                <div class="flex flex-col lg:flex-row items-center lg:items-end lg:justify-between space-y-4">
                    <div class="flex flex-col space-y-4">
                        <p class="hover:text-grey font-bold text-center lg:text-left">GET CONNECTED</p>
                        <div class="flex flex-row gap-4">
                            <span class="p-4 rounded bg-pink-primary"></span>
                            <span class="p-4 rounded bg-pink-primary"></span>
                            <span class="p-4 rounded bg-pink-primary"></span>
                            <span class="p-4 rounded bg-pink-primary"></span>
                        </div>
                    </div>
                    <div >
                        <p class="font-bold">2023 | Habbie</p>
                    </div>
                    <div class="flex flex-row justify-end gap-4">
                        <a href="#" class="hover:text-grey">Terms of Service</a>
                        <a href="#" class="hover:text-grey">Privacy Policy</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</footer>
