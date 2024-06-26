<x-layouts.dashboard>
    <x-slot:title>Data Laporan | </x-slot:title>

    <section>
        {{-- Breadcrumb --}}
        <nav class="mb-5">
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium"
                        href="{{ route(strtolower(auth()->user()->role->name) . '.dashboard') }}">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Data Laporan</li>
            </ol>
        </nav>

        <table id="crudTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal</th>
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
                            "render": function(data, type, row) {
                                return counter++; // Increment counter and return the value
                            },
                            "width": "5%"
                        },
                        {
                            data: 'title',
                            name: 'title',
                            width: '15%'
                        },
                        {
                            data: 'category.name',
                            name: 'category.name',
                            width: '20%'
                        },
                        {
                            data: 'status',
                            name: 'status',
                            width: '15%'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
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
