<article
    {{ $attributes->merge(['class' => 'group flex w-full h-[22rem] md:h-[25rem] lg:h-[20rem] sm:max-w-lg md:max-w-[22rem] lg:max-w-md xl:max-w-sm  flex-col rounded-md bg-white bg-clip-border text-gray-700 shadow-md hover:shadow-2xl transition-all duration-700 ease-in-out']) }}>
    <div class="flex flex-col justify-between h-full">
        <div class="p-6">
            <h1 id="report-title"
                class="block mb-2 text-xl antialiased font-semibold leading-snug tracking-normal text-black">
                {{ $report->title }}
            </h1>
            <p class="mb-2 text-sm antialiased font-semibold tracking-normal text-gray-600 capitalize">
                {{ $report->user_name }}
            </p>
            <p class="mb-2 text-sm antialiased font-semibold tracking-normal text-gray-400">
                {{ $report->created_at->format('H:i, d-m-Y') }}
            </p>
            <p class="mb-2 text-sm antialiased font-semibold tracking-normal text-gray-400 capitalize">
                {{ $report->category_name }}
            </p>
            <p id="report-description"
                class="block text-base antialiased font-normal leading-relaxed text-gray-500 text-inherit">
                {{ $report->description }}
            </p>
        </div>
        <div class="flex items-center justify-between p-6 pt-0">
            <p class="text-sm font-semibold capitalize">{{ $report->status }}
            </p>
            {{ $slot }}
        </div>
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
