<section class="pt-[60px] md:pt-[82px]">
    <div
        class="bg-gradient-hero aspect-square lg:aspect-auto h-[300px] w-full flex items-center justify-center rounded-lg">
        <div class="max-w-7xl flex flex-col items-center justify-center gap-4">
            <h1 class="text-4xl text-white font-bold text-center leading-normal">{{ $title }}</h1>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center justify-center flex-wrap space-x-1 md:space-x-2 rtl:space-x-reverse">
                    {{ $slot }}
                </ol>
            </nav>
        </div>
    </div>
</section>
