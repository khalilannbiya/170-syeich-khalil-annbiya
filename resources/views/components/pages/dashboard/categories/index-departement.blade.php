<x-layouts.dashboard>
    <x-slot:title>Data Kategori | </x-slot:title>

    <section>
        {{-- Breadcrumb --}}
        <nav class="mb-5">
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium"
                        href="{{ route(strtolower(auth()->user()->role->name) . '.dashboard') }}">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">Data Kategori</li>
            </ol>
        </nav>

        <table id="crudTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
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
                            data: 'id',
                            name: 'id',
                            "width": "5%"
                        },
                        {
                            data: 'name',
                            name: 'name',
                        },
                    ]
                });
            })
            // AJAX Datatable
        </script>
    @endpush
</x-layouts.dashboard>
