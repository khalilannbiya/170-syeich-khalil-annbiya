<x-layouts.frontend>
    <x-slot:title>Buat Laporan | </x-slot:title>

    <x-partials.frontend.banner>
        <x-slot:title>Buat Laporan</x-slot:title>

        <li class="inline-flex items-center">
            <a href="{{ route('index') }}" aria-label="Kembali Ke Halaman Beranda"
                class="inline-flex items-center text-sm font-medium text-white hover:text-slate-300">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Beranda
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 rtl:rotate-180 text-slate-300" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="text-sm font-medium ms-1 text-slate-300 md:ms-2">Buat Laporan</span>
            </div>
        </li>
    </x-partials.frontend.banner>


    <section class="flex flex-col items-center justify-center gap-6">
        <section class="w-full pt-10 max-w-7xl md:py-6 ">
            <section>
                <h5 class="text-xs font-semibold leading-relaxed text-center text-gray-500 md:text-sm">Pelajari cara
                    mengajukan laporan
                    dengan efektif - <span
                        class="underline cursor-pointer open-modal-button text-deep-koamaru-700">lihat
                        panduan kami
                        sekarang!</span></h5>
            </section>

            <form action="{{ route('reporter.reports.store') }}" method="POST"
                class="mt-5 md:mt-7 lg:mt-8 lg:px-32 xl:px-40" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="title" class="font-bold">Judul Laporan <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        placeholder="Masukan Judul Laporan" autofocus maxlength="50" required
                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                    <x-partials.frontend.input-error :messages="$errors->get('title')" />
                </div>

                <div class="mt-5">
                    <label for="category" class="font-bold">Kategori laporan <span class="text-red-500">*</span></label>
                    <select name="category" id="category"
                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                        <option disabled selected>Pilih Kategori</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @empty
                            <option disabled>Belum ada kategori</option>
                        @endforelse
                    </select>
                    <x-partials.frontend.input-error :messages="$errors->get('category')" />
                </div>

                <div class="mt-5">
                    <label for="description" class="font-bold">Isi Laporan <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" cols="30" rows="15"
                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent"
                        placeholder="Sampaikan aduan Anda disini...">{{ old('description') }}</textarea>
                    <x-partials.frontend.input-error :messages="$errors->get('description')" />
                </div>

                <div class="mt-5">
                    <label for="location" class="font-bold">Lokasi Kejadian <span class="text-red-500">*</span></label>
                    <input type="text" id="location" name="location" value="{{ old('location') }}"
                        placeholder="Masukan Lokasi Kejadian" maxlength="100" required
                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                    <x-partials.frontend.input-error :messages="$errors->get('location')" />
                </div>

                <div class="mt-5">
                    <label for="time" class="font-bold">Waktu Kejadian <span class="text-red-500">*</span></label>
                    <input type="datetime-local" id="time" name="time" value="{{ old('time') }}"
                        placeholder="Masukan Waktu Kejadian" required
                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                    <x-partials.frontend.input-error :messages="$errors->get('time')" />
                </div>

                <div class="mt-5">
                    <label for="is_private" class="block font-bold">Private</label>
                    <input type="checkbox" id="is_private" name="is_private" value="1" @checked(old('is_private'))
                        class="mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                    <x-partials.frontend.input-error :messages="$errors->get('is_private')" />
                </div>

                <div class="mt-5">
                    <label for="is_anonymous" class="block font-bold">Anonim</label>
                    <input type="checkbox" id="is_anonymous" name="is_anonymous" value="1"
                        @checked(old('is_anonymous'))
                        class="mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                    <x-partials.frontend.input-error :messages="$errors->get('is_anonymous')" />
                </div>

                <div class="mt-10 mb-2 accordion-item">
                    <button type="button"
                        class="flex items-center justify-between w-full px-2 py-2 mb-4 text-lg font-semibold text-left text-black bg-gray-300 rounded accordion-header">
                        Bukti-bukti
                        <svg class="transition-all duration-500 chevron" xmlns="http://www.w3.org/2000/svg"
                            width="36" height="36" viewBox="0 0 24 24"
                            style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                            <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
                        </svg>
                    </button>
                    <div class="hidden accordion-content">
                        {{-- Bukti-bukti / Evidences --}}
                        <section>
                            <p class="text-xs font-semibold text-red-500">* Jika tidak ada bukti, boleh dihiraukan</p>
                            <p class="text-xs font-semibold text-red-500">* Ukuran file maksimal 1 MB</p>
                            <p class="text-xs font-semibold text-red-500">* Boleh memasukan lebih dari 1 bukti, dengan
                                cara
                                tekan "Tambah Bukti"</p>

                            <section>
                                <div class="mt-5">
                                    <label for="evidence-1-title" class="font-bold">Judul Bukti</label>
                                    <input type="text" id="evidence-1-title" name="evidences[1][title]"
                                        value="{{ old('evidences.1.title') }}" placeholder="Masukan Judul Bukti 1"
                                        maxlength="50"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                                    <x-partials.frontend.input-error :messages="$errors->get('evidences.1.title')" />
                                </div>

                                <div class="mt-5">
                                    <label for="evidence-1-photo" class="font-bold">Bukti Foto <span
                                            class="block text-xs text-red-500">*File
                                            bertipe
                                            jpg/jpeg/png</span></label>
                                    <input type="file" name="evidences[1][photo]" id="evidence-1-photo"
                                        value="{{ old('evidences.1.photo') }}" class="mt-2 ">
                                    <x-partials.frontend.input-error :messages="$errors->get('evidences.1.photo')" />
                                </div>

                                <div class="mt-5">
                                    <label for="evidence-1-description" class="font-bold">Deskripsi Bukti</label>
                                    <textarea name="evidences[1][description]" id="evidence-1-description" cols="30" rows="7"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent"
                                        placeholder="Isi dengan penjelasan tentang bukti yang di upload">{{ old('evidences.1.description') }}</textarea>
                                    <x-partials.frontend.input-error :messages="$errors->get('evidences.1.description')" />
                                </div>
                            </section>

                            <section>
                                <div class="mt-4 border-b-2"></div>

                                <div class="mt-5">
                                    <label for="evidence-2-title" class="font-bold">Judul Bukti</label>
                                    <input type="text" id="evidence-2-title" name="evidences[2][title]"
                                        value="{{ old('evidences.2.title') }}" placeholder="Masukan Judul Bukti 2"
                                        maxlength="50"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                                    <x-partials.frontend.input-error :messages="$errors->get('evidences.2.title')" />
                                </div>

                                <div class="mt-5">
                                    <label for="evidence-2-photo" class="font-bold">Bukti Foto <span
                                            class="block text-xs text-red-500">*File
                                            bertipe
                                            jpg/jpeg/png</span></label>
                                    <input type="file" name="evidences[2][photo]" id="evidence-2-photo"
                                        value="{{ old('evidences.2.photo') }}" class="mt-2 ">
                                    <x-partials.frontend.input-error :messages="$errors->get('evidences.2.photo')" />
                                </div>

                                <div class="mt-5">
                                    <label for="evidence-2-description" class="font-bold">Deskripsi Bukti</label>
                                    <textarea name="evidences[2][description]" id="evidence-2-description" cols="30" rows="7"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent"
                                        placeholder="Isi dengan penjelasan tentang bukti yang di upload">{{ old('evidences.2.description') }}</textarea>
                                    <x-partials.frontend.input-error :messages="$errors->get('evidences.2.description')" />
                                </div>
                            </section>

                            <section id="newEvidencesRow"></section>

                            <div class="flex justify-center mt-10">
                                <button type="button" id="addEvidencesRow"
                                    class="px-5 py-2 font-bold text-white bg-black rounded-md lg:text-lg lg:px-9 lg:py-3 active:bg-deep-koamaru-700 active:shadow-lg lg:hover:bg-deep-koamaru-700 lg:hover:shadow-lg">Tambah
                                    Bukti</button>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="accordion-item">
                    <button type="button"
                        class="flex items-center justify-between w-full px-2 py-2 mb-4 text-lg font-semibold text-left text-black bg-gray-300 rounded accordion-header">Saksi-saksi
                        <svg class="transition-all duration-500 chevron" xmlns="http://www.w3.org/2000/svg"
                            width="36" height="36" viewBox="0 0 24 24"
                            style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                            <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path>
                        </svg></button>
                    <div class="hidden accordion-content">
                        {{-- Saksi-saksi / Witnesses --}}
                        <section>
                            <p class="text-xs font-semibold text-red-500">* Jika tidak ada saksi, boleh dihiraukan</p>
                            <p class="text-xs font-semibold text-red-500">* Boleh memasukan lebih dari 1 saksi, dengan
                                cara
                                tekan "Tambah Saksi"</p>

                            <section>
                                <div class="mt-5">
                                    <label for="witness-1-name" class="font-bold">Nama Saksi</label>
                                    <input type="text" id="witness-1-name" name="witnesses[1][name]"
                                        value="{{ old('witnesses.1.name') }}" placeholder="Masukan Nama Saksi 1"
                                        maxlength="100"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                                    <x-partials.frontend.input-error :messages="$errors->get('witnesses.1.name')" />
                                </div>

                                <div class="mt-5">
                                    <label for="witness-1-phone" class="font-bold">Nomor Telepon Saksi</label>
                                    <input type="text" id="witness-1-phone" name="witnesses[1][phone]"
                                        value="{{ old('witnesses.1.phone') }}"
                                        placeholder="Masukan Nomor Telepon Saksi 1" maxlength="20"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                                    <x-partials.frontend.input-error :messages="$errors->get('witnesses.1.phone')" />
                                </div>

                                <div class="mt-5">
                                    <label for="witness-1-address" class="font-bold">Alamat Saksi</label>
                                    <input type="text" id="witness-1-address" name="witnesses[1][address]"
                                        value="{{ old('witnesses.1.address') }}" placeholder="Masukan Alamat Saksi 1"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                                    <x-partials.frontend.input-error :messages="$errors->get('witnesses.1.address')" />
                                </div>

                                <div class="mt-5">
                                    <label for="witness-1-description" class="font-bold">Deskripsi Saksi</label>
                                    <textarea name="witnesses[1][description]" id="witness-1-description" cols="30" rows="7"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent"
                                        placeholder="Isi dengan penjelasan tentang saksi">{{ old('witnesses.1.description') }}</textarea>
                                    <x-partials.frontend.input-error :messages="$errors->get('witnesses.1.description')" />
                                </div>
                            </section>

                            <section>
                                <div class="mt-4 border-b-2"></div>

                                <div class="mt-5">
                                    <label for="witness-2-name" class="font-bold">Nama Saksi</label>
                                    <input type="text" id="witness-2-name" name="witnesses[2][name]"
                                        value="{{ old('witnesses.2.name') }}" placeholder="Masukan Nama Saksi 2"
                                        maxlength="100"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                                    <x-partials.frontend.input-error :messages="$errors->get('witnesses.2.name')" />
                                </div>

                                <div class="mt-5">
                                    <label for="witness-2-phone" class="font-bold">Nomor Telepon Saksi</label>
                                    <input type="text" id="witness-2-phone" name="witnesses[2][phone]"
                                        value="{{ old('witnesses.2.phone') }}"
                                        placeholder="Masukan Nomor Telepon Saksi 2" maxlength="20"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                                    <x-partials.frontend.input-error :messages="$errors->get('witnesses.2.phone')" />
                                </div>

                                <div class="mt-5">
                                    <label for="witness-2-address" class="font-bold">Alamat Saksi</label>
                                    <input type="text" id="witness-2-address" name="witnesses[2][address]"
                                        value="{{ old('witnesses.2.address') }}" placeholder="Masukan Alamat Saksi 2"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                                    <x-partials.frontend.input-error :messages="$errors->get('witnesses.2.address')" />
                                </div>

                                <div class="mt-5">
                                    <label for="witness-2-description" class="font-bold">Deskripsi Saksi</label>
                                    <textarea name="witnesses[2][description]" id="witness-2-description" cols="30" rows="7"
                                        class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent"
                                        placeholder="Isi dengan penjelasan tentang saksi">{{ old('witnesses.2.description') }}</textarea>
                                    <x-partials.frontend.input-error :messages="$errors->get('witnesses.2.description')" />
                                </div>
                            </section>

                            <section id="newWitnessesRow"></section>

                            <div class="flex justify-center mt-10">
                                <button type="button" id="addWitnessesRow"
                                    class="px-5 py-2 font-bold text-white bg-black rounded-md lg:text-lg lg:px-9 lg:py-3 active:bg-deep-koamaru-700 active:shadow-lg lg:hover:bg-deep-koamaru-700 lg:hover:shadow-lg">Tambah
                                    Saksi</button>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="flex justify-center mt-10">
                    <button type="submit"
                        class="px-5 py-2 font-bold text-white bg-black rounded-md lg:text-lg lg:px-9 lg:py-3 active:bg-deep-koamaru-700 active:shadow-lg lg:hover:bg-deep-koamaru-700 lg:hover:shadow-lg">Laporkan</button>
                </div>
            </form>
        </section>
    </section>

    <x-partials.frontend.modal-guidelines />

    @push('script')
        <script>
            const addEvidencesRowButton = document.getElementById("addEvidencesRow");
            const newEvidencesRow = document.getElementById("newEvidencesRow");
            const addWitnessesRowButton = document.getElementById("addWitnessesRow");
            const newWitnessesRow = document.getElementById("newWitnessesRow");

            let evidenceCount = 2;
            addEvidencesRowButton.addEventListener("click", () => {
                evidenceCount++

                const html = `
                <section>
                    <div class="mt-4 border-b-2"></div>

                    <div class="mt-5">
                        <label for="evidence-${evidenceCount}-title" class="font-bold">Judul Bukti</label>
                        <input type="text" id="evidence-${evidenceCount}-title" name="evidences[${evidenceCount}][title]" value="{{ old('evidences.${evidenceCount}.title') }}" placeholder="Masukan Judul Bukti ${evidenceCount}" maxlength="50" class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                        <x-partials.frontend.input-error :messages="$errors->get('evidences.${evidenceCount}.title')" />
                    </div>

                    <div class="mt-5">
                        <label for="evidence-${evidenceCount}-photo" class="font-bold">Bukti Foto <span class="block text-xs text-red-500">*File bertipe jpg/jpeg/png</span></label>
                        <input type="file" name="evidences[${evidenceCount}][photo]" id="evidence-${evidenceCount}-photo" value="{{ old('evidences.${evidenceCount}.photo') }}" class="mt-2 ">
                        <x-partials.frontend.input-error :messages="$errors->get('evidences.${evidenceCount}.photo')" />
                    </div>

                    <div class="mt-5">
                        <label for="evidence-${evidenceCount}-description" class="font-bold">Deskripsi Bukti</label>
                        <textarea name="evidences[${evidenceCount}][description]" id="evidence-${evidenceCount}-description" cols="30" rows="7" class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent" placeholder="Isi dengan penjelasan tentang bukti yang di upload">{{ old('evidences.${evidenceCount}.description') }}</textarea>
                        <x-partials.frontend.input-error :messages="$errors->get('evidences.${evidenceCount}.description')" />
                    </div>
                </section>
                `;

                const newRow = document.createElement("div"); // Create a new row element
                newRow.innerHTML = html; // Set the inner HTML of the new row
                newEvidencesRow.appendChild(newRow)
            })

            let witnessCount = 2
            addWitnessesRowButton.addEventListener("click", () => {
                witnessCount++

                const html = `
                <section>
                    <div class="mt-4 border-b-2"></div>

                    <div class="mt-5">
                        <label for="witness-${witnessCount}-name" class="font-bold">Nama Saksi</label>
                        <input type="text" id="witness-${witnessCount}-name" name="witnesses[${witnessCount}][name]" value="{{ old('witnesses.${witnessCount}.name') }}" placeholder="Masukan Nama Saksi ${witnessCount}" maxlength="100" class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                        <x-partials.frontend.input-error :messages="$errors->get('witnesses.${witnessCount}.name')" />
                    </div>

                    <div class="mt-5">
                        <label for="witness-${witnessCount}-phone" class="font-bold">Nomor Telepon Saksi</label>
                        <input type="text" id="witness-${witnessCount}-phone" name="witnesses[${witnessCount}][phone]" value="{{ old('witnesses.${witnessCount}.phone') }}" placeholder="Masukan Nomor Telepon Saksi ${witnessCount}" maxlength="20" class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                        <x-partials.frontend.input-error :messages="$errors->get('witnesses.${witnessCount}.phone')" />
                    </div>

                    <div class="mt-5">
                        <label for="witness-${witnessCount}-address" class="font-bold">Alamat Saksi</label>
                        <input type="text" id="witness-${witnessCount}-address" name="witnesses[${witnessCount}][address]" value="{{ old('witnesses.${witnessCount}.address') }}" placeholder="Masukan Alamat Saksi ${witnessCount}" class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent">
                        <x-partials.frontend.input-error :messages="$errors->get('witnesses.${witnessCount}.address')" />
                    </div>

                    <div class="mt-5">
                        <label for="witness-${witnessCount}-description" class="font-bold">Deskripsi Saksi</label>
                        <textarea name="witnesses[${witnessCount}][description]" id="witness-${witnessCount}-description" cols="30" rows="7" class="w-full mt-2 transition duration-500 ease-in-out rounded ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-deep-koamaru-700 focus:border-transparent" placeholder="Isi dengan penjelasan tentang saksi">{{ old('witnesses.${witnessCount}.description') }}</textarea>
                        <x-partials.frontend.input-error :messages="$errors->get('witnesses.${witnessCount}.description')" />
                    </div>
                </section>
                `;

                const newRow = document.createElement("div") // Create a new row element
                newRow.innerHTML = html // Set the inner HTML of the new row
                newWitnessesRow.appendChild(newRow)
            })
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const accordionHeaders = document.querySelectorAll('.accordion-header')
                const chevron = document.querySelectorAll('.chevron')

                accordionHeaders.forEach(header => {
                    header.addEventListener('click', function() {
                        const accordionContent = header.nextElementSibling
                        const chevron = header.children[0]

                        // Toggle visibility
                        accordionContent.classList.toggle('hidden')


                        // Toggle expanded state
                        if (accordionContent.classList.contains('hidden')) {
                            chevron.classList.remove('rotate-180');
                        } else {
                            chevron.classList.add('rotate-180');
                        }
                    });
                });
            });
        </script>
    @endpush
</x-layouts.frontend>
