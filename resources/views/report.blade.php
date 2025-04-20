<x-layout>
    <!-- Main content -->
    <section class="content">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="card-title">Patient's in OPD</h4>
                </div>
                <div class="card-body p-2">
                    <table id="rcount"
                        class="table table-bordered table-striped dataTable dtr-inline table-sm"
                        aria-describedby="rcount_info">
                        <thead>
                            <tr>
                                @if (!empty($regdata[0]))
                                @foreach (get_object_vars($regdata[0]) as $column => $value)
                                    <th>{{ ucfirst(str_replace('_', ' ', $column)) }}</th>
                                @endforeach
                            @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($regdata as $item)
                            <tr>
                                @foreach (get_object_vars($item) as $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</x-layout>
<script>
    $(function() {
        const dataTableOptions = {
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "pageLength": 20,
            "order": [],
            "buttons": ["excel", "print"]
        };

        // Initialize extension Table
        $("#extension").DataTable(dataTableOptions).buttons().container().appendTo(
            '#extension_wrapper .col-md-6:eq(0)');

        // Initialize Email Table
        $("#email").DataTable(dataTableOptions).buttons().container().appendTo(
            '#email_wrapper .col-md-6:eq(0)');
        // Initialize Email Table
        $("#rcount").DataTable(dataTableOptions).buttons().container().appendTo(
            '#rcount_wrapper .col-md-6:eq(0)');
        $("#otbook").DataTable(dataTableOptions).buttons().container().appendTo(
            '#otbook_wrapper .col-md-6:eq(0)');
        $("#wardlist").DataTable(dataTableOptions).buttons().container().appendTo(
            '#wardlist_wrapper .col-md-6:eq(0)');
    });
</script>
