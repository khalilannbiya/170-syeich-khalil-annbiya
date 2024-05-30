<x-layouts.dashboard>
    <x-slot:title>Data Laporan | </x-slot:title>

    <section>
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
                $('#crudTable').DataTable({
                    serverSide: true,
                    ajax: {
                        url: '{!! url()->current() !!}'
                    },
                    columns: [{
                            data: 'id',
                            name: 'id',
                            width: '5%'
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
