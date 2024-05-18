<article
    class="group flex w-full sm:max-w-lg md:max-w-[22rem] lg:max-w-md xl:max-w-sm h-auto flex-col rounded-md bg-white bg-clip-border text-gray-700 shadow-md hover:shadow-2xl transition-all duration-700 ease-in-out">
    <div class="p-6">
        <h1 id="report-title"
            class="mb-2 block text-xl font-semibold leading-snug tracking-normal text-black antialiased">
            Pembacokan di daerah wadas uhuy slebwe
        </h1>
        <p class="mb-2 text-sm font-semibold tracking-normal text-gray-600 capitalize antialiased">
            syeich khalil annbiya
        </p>
        <p class="mb-2 text-sm font-semibold tracking-normal text-gray-400 antialiased">
            20:00, 20-04-2024
        </p>
        <p class="mb-2 text-sm capitalize font-semibold tracking-normal text-gray-400 antialiased">
            Pemerkosaan dan perbuatan cabul
        </p>
        <p id="report-description"
            class="block text-base text-primary font-normal leading-relaxed text-inherit antialiased">
            Garis kejut di depan PKU Gamping menurut saya kurang nyaman dan bahaya, karena berada di
            jalur cepat. Banyak yang tiba-tiba
        </p>
    </div>
    <div class="p-6 pt-0 flex justify-between items-center">
        <p class="capitalize text-sm font-semibold">sedang diproses
        </p>
        <a href="#" aria-label="Lihat Detail Laporan"
            class="flex items-center justify-between px-4 gap-3 select-none rounded-md bg-black py-3 text-center align-middle text-sm font-bold text-white shadow-md shadow-slate-500/20 transition-all hover:shadow-lg hover:shadow-slate-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
            Detail
        </a>
    </div>
</article>

@push('script')
    <script>
        // Text Elipsis via javascript
        function shortenText(elementSelector, maxLength, elipsis) {
            let elements = document.querySelectorAll(elementSelector);

            elements.forEach(function(element) {
                let textContent = element.textContent.trim();

                if (textContent.length > maxLength) {
                    if (elipsis) {
                        let shortenedContent =
                            textContent.substring(0, maxLength) + " ...";
                        element.textContent = shortenedContent;
                    } else {
                        let shortenedContent = textContent.substring(0, maxLength);
                        element.textContent = shortenedContent;
                    }
                }
            });
        }

        shortenText("#report-title", 30, true);
        shortenText("#report-description", 85, true)
    </script>
@endpush
