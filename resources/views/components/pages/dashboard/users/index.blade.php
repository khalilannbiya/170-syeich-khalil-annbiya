<x-layouts.dashboard>
    <x-slot:title>Data Pelapor | </x-slot:title>

    <section>
        {{-- Breadcrumb --}}
        <nav class="mb-5">
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route('adminisrator.dashboard') }}">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Data Pelapor</li>
            </ol>
        </nav>

        <table id="crudTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
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
                            data: 'name',
                            name: 'name',
                            width: '15%'
                        },
                        {
                            data: 'email',
                            name: 'email',
                            width: '20%'
                        },
                        {
                            data: 'phone',
                            name: 'phone',
                            width: '15%'
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
