@props([
    'theme' => null,
    'readyToLoad' => false,
])
<div @isset($this->setUp['responsive']) x-data="tableResponsive" @endisset>
    <table
        class="table"
    >
        <thead
            class="bg-pink-primary text-white"
        >
            {{ $header }}
        </thead>
        @if ($readyToLoad)
            <tbody
                class="{{ $theme->tbodyClass }}"
                style="{{ $theme->tbodyStyle }}"
            >
                {{ $rows }}
            </tbody>
        @else
            <tbody
                class="{{ $theme->tbodyClass }}"
                style="{{ $theme->tbodyStyle }}"
            >
                {{ $loading }}
            </tbody>
        @endif
    </table>

    @isset($this->setUp['responsive'])
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                this.livewire.hook('message.processed', () => {
                    Alpine.nextTick(() => {
                        window.dispatchEvent(
                            new CustomEvent('pg-livewire-request-finished')
                        );
                    })
                })
                this.livewire.hook('message.failed', () => {
                    Alpine.nextTick(() => {
                        window.dispatchEvent(
                            new CustomEvent('pg-livewire-request-finished')
                        );
                    })
                })
            });
        </script>
    @endisset
</div>
