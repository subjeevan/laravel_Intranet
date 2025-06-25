<x-layout>
    <!-- Main content -->
    <section class="content">
        <!-- Dashboard-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-info text-center align-middle p-1">
                        <h4 class="font-weight-bold mb-0">Today's Registration Data</h4>
                    </div>
                    <div class="card-body p-2">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr class="text-center align-middle">
                                    <th rowspan='3'>Branch</th>
                                    <th colspan="4">New </th>
                                    <th colspan="4">Old</th>
                                    <th rowspan="3">EMG.</th>
                                    <th colspan='10'>Total</th>
                                    <th rowspan="3">Grand</th>
                                </tr>
                                <tr class="text-center align-middle">
                                    <th colspan="2"> General</th>
                                    <th colspan='2'> Insurance</th>
                                    <th colspan="2"> General</th>
                                    <th colspan='2'> Insurance</th>
                                    <th colspan='3'>General</th>
                                    <th colspan='3'>Insurance</th>
                                    <th colspan='2'>Department</th>
                                    <th colspan='2'>New/Old</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Adult</th>
                                    <th>Ped</th>
                                    <th>Adult</th>
                                    <th>Ped</th>
                                    <th>Adult</th>
                                    <th>Ped</th>
                                    <th>Adult</th>
                                    <th>Ped</th>
                                    <th>Adult</th>
                                    <th>Ped</th>
                                    <th>Total</th>
                                    <th>Adult</th>
                                    <th>Ped</th>
                                    <th>Total</th>
                                    <th>Adult</th>
                                    <th>Ped</th>
                                    <th>New</th>
                                    <th>Old</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pcounts as $pcount)
                                    <tr class="text-center align-middle">
                                        <td>{{ $pcount->suor_branchname }}</td>
                                        <td>{{ $pcount->newgen }}</td>
                                        <td>{{ $pcount->newpedgen }}</td>
                                        <td>{{ $pcount->newgeninsurance }}</td>
                                        <td>{{ $pcount->newpedinsurance }}</td>
                                        <td>{{ $pcount->followupgeneral }}</td>
                                        <td>{{ $pcount->followuped }}</td>
                                        <td>{{ $pcount->followupgeninsurance }}</td>
                                        <td>{{ $pcount->followuppedinsurance }}</td>
                                        <td>{{ $pcount->newemggen }}</td>
                                        <td>{{ $pcount->newgen + $pcount->followupgeneral }}</td>
                                        <td>{{ $pcount->newpedgen + $pcount->followuped }}</td>
                                        <td>{{ $pcount->newgen + $pcount->newpedgen + $pcount->followupgeneral + $pcount->followuped }}
                                        </td>
                                        <td>{{ $pcount->newgeninsurance + $pcount->followupgeninsurance }}</td>
                                        <td>{{ $pcount->newpedinsurance + $pcount->followuppedinsurance }}</td>
                                        <td>{{ $pcount->newgeninsurance + $pcount->newpedinsurance + $pcount->followupgeninsurance + $pcount->followuppedinsurance }}
                                        </td>
                                        <td>{{ $pcount->newgen + $pcount->newgeninsurance + $pcount->followupgeneral + $pcount->followupgeninsurance }}
                                        </td>
                                        <td>{{ $pcount->newpedgen + $pcount->newpedinsurance + $pcount->followuped + $pcount->followuppedinsurance }}
                                        </td>
                                        <td>{{ $pcount->newemggen + $pcount->newpedgen + $pcount->newpedinsurance + $pcount->newgen + $pcount->newgeninsurance }}
                                        </td>
                                        <td>{{ $pcount->followuped + $pcount->followuppedinsurance + $pcount->followupgeneral + $pcount->followupgeninsurance }}
                                        </td>
                                        <td>{{ $pcount->newemggen + $pcount->newpedgen + $pcount->newpedinsurance + $pcount->followuped + $pcount->followuppedinsurance + $pcount->newgen + $pcount->newgeninsurance + $pcount->followupgeneral + $pcount->followupgeninsurance }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Table-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-header bg-info text-center align-middle p-1">
                            <h4 class="font-weight-bold mb-0">Today's Medical Record Data</h4>
                        </div>
                        <div class="card-body p-2">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center align-middle">
                                        <th>Branch Name</th>
                                        <th>Medicine Prescribed</th>
                                        <th>Glass Prescribed</th>
                                        <th>Teleopthlmology Done</th>
                                        <th>Cataract Referred</th>
                                        <th>Other Referred</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($dreports2day)
                                        @foreach ($dreports2day as $dreport)
                                            <tr class="text-center align-middle">
                                                <td>{{ $dreport->suor_branchname }}</td>
                                                <td>{{ $dreport->medicine }}</td>
                                                <td>{{ $dreport->glass }}</td>
                                                <td>{{ $dreport->tele }}</td>
                                                <td>{{ $dreport->catrefer }}</td>
                                                <td>{{ $dreport->orefer }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card shadow">
                        <div class="card-header bg-info text-center align-middle p-1">
                            <h4 class="font-weight-bold mb-0">Today's Optical Sales Data</h4>
                        </div>
                        <div class="card-body p-2">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center align-middle">
                                        <th>Branch Name</th>
                                        <th>Patient Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($opticalsales)
                                        @foreach ($opticalsales as $opticalsale)
                                            <tr class="text-center align-middle">
                                                <td>{{ $opticalsale->departmentname }}</td>
                                                <td>{{ $opticalsale->bill_count  }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card shadow">
                        <div class="card-header bg-info text-center align-middle p-1">
                            <h4 class="font-weight-bold mb-0">Today's Pharmacy Sales Data</h4>
                        </div>
                        <div class="card-body p-2">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center align-middle">
                                        <th>Branch Name</th>
                                        <th>Medicine Sold</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pharsales)
                                        @foreach ($pharsales as $pharsale)
                                            <tr class="text-center align-middle">
                                                <td>{{ $pharsale->departmentname }}</td>
                                                <td>{{ $pharsale->bill_count}}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-header bg-info text-center align-middle p-1">
                            <h4 class="font-weight-bold mb-0">Yesterday's Medical Record Data</h4>
                        </div>
                        <div class="card-body p-2">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center align-middle">
                                        <th>Branch Name</th>
                                        <th>Medicine Prescribed</th>
                                        <th>Glass Prescribed</th>
                                        <th>Teleopthlmology Done</th>
                                        <th>Cataract Referred</th>
                                        <th>Other Referred</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($dreportsyday)
                                        @foreach ($dreportsyday as $dreport)
                                            <tr class="text-center align-middle">
                                                <td>{{ $dreport->suor_branchname }}</td>
                                                <td>{{ $dreport->medicine }}</td>
                                                <td>{{ $dreport->glass }}</td>
                                                <td>{{ $dreport->tele }}</td>
                                                <td>{{ $dreport->catrefer }}</td>
                                                <td>{{ $dreport->orefer }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <form action="{{ route('dateconverter') }}" method="GET">
            @csrf
            <div class="form-group">
                <label for="selected_date">Select Date:</label>
                <input type="date" class="form-control" id="selected_date" name="selected_date">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </section>
    <!-- /.content -->
</x-layout>
<script>
    $(function() {
        const dataTableOptions = {
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "pageLength": 7,
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
