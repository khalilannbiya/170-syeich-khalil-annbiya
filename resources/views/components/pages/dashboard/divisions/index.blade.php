<x-layouts.dashboard>
    <x-slot:title>Data Divisi | </x-slot:title>

    <section>
        {{-- Breadcrumb --}}
        <nav class="mb-5">
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route('adminisrator.dashboard') }}">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Data Divisi</li>
            </ol>
        </nav>

        {{-- create button --}}
        <a href="{{ route('adminisrator.divisions.create') }}"
            class="px-3 py-3 flex justify-center w-44 rounded mb-5 bg-primary text-white-dahsboard">Tambah Divisi</a>

        <table id="crudTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </section>

    @push('script')
        <script type="text/javascript">
            $(document).ready(function() {
                let counter = 1;
                $('#crudTable').DataTable({
                    serverSide: true,
                    ajax: {
                        url: '{!! url()->current() !!}'
                    },
                    columns: [{
                            "data": 'id',
                            "nam": 'id',
                            "width": "5%"
                        },
                        {
                            data: 'name',
                            name: 'name',
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                        }
                    ]
                });
            })
            // AJAX Datatable
        </script>
    @endpush
</x-layouts.dashboard>
