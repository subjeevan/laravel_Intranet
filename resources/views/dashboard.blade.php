<x-layout>
    <!-- Main content -->
    <section class="content">


        <div class="row">
            <!-- Left Column: Intranet & Internet Sites -->
            <div class="col-lg-9">
                <!-- Intranet Sites -->
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Intranet Sites <a href="{{ route('apitest') }}">
                                    <button type="button" class="btn btn-primary btn-block">Api Test</button></a></h3>
                            </div>
                             <div class="col-md-3 m-1">
                            </div>
                            <div class="card-body row justify-content-center">
                                @if ($intranetdatas && count($intranetdatas))
                                    @foreach ($intranetdatas as $intranetdata)
                                        <div class="col-sm-4 col-md-3 col-lg-2 m-1 text-center">
                                            <a href="{{ $intranetdata->url }}"
                                                class="btn btn-primary btn-block {{ $intranetdata->blink ? 'blink-button' : '' }}"
                                                title="{{ $intranetdata->name }}">
                                                {{ $intranetdata->name }}
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12 text-center text-muted">No intranet sites available.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Internet Sites -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Internet Sites</h3>
                            </div>
                            <div class="card-body row justify-content-center">
                                @if ($internetdatas && count($internetdatas))
                                    @foreach ($internetdatas as $internetdata)
                                        <div class="col-sm-4 col-md-3 col-lg-2 m-1 text-center">
                                            <a href="{{ $internetdata->url }}"
                                                class="btn btn-success btn-block text-truncate"
                                                title="{{ $internetdata->name }}">
                                                {{ $internetdata->name }}
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12 text-center text-muted">No internet sites available.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-6">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4 class="card-title">Todays Userwise Registration Details</h4>
                            </div>
                            <div class="card-body p-2">
                                <table id="usercount"
                                    class="table table-bordered table-striped dataTable dtr-inline table-sm"
                                    aria-describedby="usercount_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting" tabindex="0" aria-controls="usercount" rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                User Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="usercount" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Insurance
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="usercount" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                General
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="usercount" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                New
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="usercount" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Old
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="usercount" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Total
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($uregcounts as $uregcount)
                                            <tr class="odd ">
                                                <td>{{ $uregcount->usma_fullname }}</td>
                                                <td>{{ $uregcount->ins }}</td>
                                                <td>{{ $uregcount->gen }}</td>
                                                <td>{{ $uregcount->new }}</td>
                                                <td>{{ $uregcount->old }}</td>
                                                <td>{{ $uregcount->old + $uregcount->new }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total</td>
                                            <td></td>

                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4 class="card-title">Todays Medical Record Entered Data</h4>
                            </div>
                            <div class="card-body p-2">
                                <table id="usercount"
                                    class="table table-bordered table-striped dataTable dtr-inline table-sm"
                                    aria-describedby="usercount_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting" tabindex="0" aria-controls="usercount" rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                User Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="usercount" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                MR Entered
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="usercount" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Branch
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medentered as $med)
                                            <tr class="odd ">
                                                <td>{{ $med->usma_username }}</td>
                                                <td>{{ $med->patient_count }}</td>
                                                <td>{{ $med->branch }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total</td>
                                            <td>{{ $medentered->sum('patient_count') }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">

                </div>
            </div>

            <!-- Right Column: Staff on Leave -->
            <div class="col-lg-3">
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="card-title">Today Staffs on Leave</h4>
                    </div>
                    <div class="card-body p-2">
                        @if ($tdayleaves && count($tdayleaves))
                            <table id="leave_count" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Staff Name</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tdayleaves as $leave)
                                        <tr>
                                            <td>{{ $leave->staffname }}</td>
                                            <td>{{ $leave->requestfromdatevs }}<br>({{ $leave->requestfromdatead }})
                                            </td>
                                            <td>{{ $leave->requesttodatevs }}<br>({{ $leave->requesttodatead }})</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center text-muted">No staff on leave today.</div>
                        @endif
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="card-title">Tomorrow Staffs on Leave</h4>
                    </div>
                    <div class="card-body p-2">
                        @if ($tomleaves && count($tomleaves))
                            <table id="leave_count" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Staff Name</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tomleaves as $tomleave)
                                        <tr>
                                            <td>{{ $tomleave->staffname }}</td>
                                            <td>{{ $tomleave->requestfromdatevs }}<br>({{ $tomleave->requestfromdatead }})
                                            </td>
                                            <td>{{ $tomleave->requesttodatevs }}<br>({{ $tomleave->requesttodatead }})
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center text-muted">No staff on leave Tomorrow.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


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
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4 class="card-title">Backlog Document Upload Status by user dated 2081/07/01 till 2081/12/28</h4>
                        </div>
                        <div class="card-body p-2">
                            <table id="dupcount"
                                class="table table-bordered table-striped dataTable dtr-inline table-sm"
                                aria-describedby="dupcount_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="dupcount" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">
                                            User Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dupcount" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">
                                            Patient Count
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($uploaded as $upload)
                                        <tr class="odd ">
                                            <td>{{ $upload->usma_fullname }}</td>
                                            <td>{{ $upload->distinct_claim_count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="odd ">
                                        <td>Total</td>
                                        <td>{{ $uploaded->sum('distinct_claim_count') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                                <div class="col-lg-6">
                    {{-- <div class="card shadow">
                        <div class="card-header">
                            <h4 class="card-title">Todays Document Upload Status by user</h4>
                        </div>
                        <div class="card-body p-2">
                            <table id="tdupcount"
                                class="table table-bordered table-striped dataTable dtr-inline table-sm"
                                aria-describedby="tdupcount_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="tdupcount" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">
                                            User Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="tdupcount" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">
                                            Patient Count
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tdyuploaded as $upload)
                                        <tr class="odd ">
                                            <td>{{ $upload->usma_fullname }}</td>
                                            <td>{{ $upload->distinct_claim_count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="odd ">
                                        <td>Total</td>
                                        <td>{{ $tdyuploaded->sum('distinct_claim_count') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div> --}}
                </div>
            <div class="row col-lg-12">
                {{-- <div class="col-lg-3">
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
                                        <th class="sorting" tabindex="0" aria-controls="rcount" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">
                                            Room No.</th>
                                        <th class="sorting" tabindex="0" aria-controls="rcount" rowspan="1"
                                            colspan="1" aria-label="Browser: activate to sort column ascending">
                                            Patient Count
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($docvisits as $docvisit)
                                        <tr class="odd ">
                                            <td>{{ $docvisit->docname }}</td>
                                            <td>{{ $docvisit->patient_count }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Extension List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="extension_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="extension"
                                            class="table-sm table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="extension_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="extension"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Department</th>
                                                    <th class="sorting" tabindex="0" aria-controls="extension"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Extension No.
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="extension"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Location
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($extensions as $extension)
                                                    <tr class="odd">
                                                        <td>{{ $extension->department }}</td>
                                                        <td>{{ $extension->extension }}</td>
                                                        <td>{{ $extension->description }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="extension_paginate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Email List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="email_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="email"
                                            class="table-sm table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="email_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="email"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Department
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="email"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Email Address</th>

                                                    <th class="sorting" tabindex="0" aria-controls="email"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Location</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($emails as $email)
                                                    <tr class="odd">
                                                        <td>{{ $email->department }}</td>
                                                        <td>{{ $email->email }}</td>
                                                        <td>{{ $email->location }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="email_paginate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- Table-->
        </div>
    </section>
    <!-- /.content -->
</x-layout>
<script>
    $(function() {
        const dataTableOptions = {
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "pageLength": 5,
            "order": [],
            "buttons": ["excel", "print"]
        };

        // Initialize extension Table
        $("#extension").DataTable(dataTableOptions).buttons().container().appendTo(
            '#extension_wrapper .col-md-6:eq(0)');
        // Initialize Email Table
        $("#email").DataTable(dataTableOptions).buttons().container().appendTo(
            '#email_wrapper .col-md-6:eq(0)');
        $("#rcount").DataTable(dataTableOptions).buttons().container().appendTo(
            '#email_wrapper .col-md-6:eq(0)');
        $("#usercount").DataTable(dataTableOptions).buttons().container().appendTo(
            '#email_wrapper .col-md-6:eq(0)');
        $("#tlcount").DataTable(dataTableOptions).buttons().container().appendTo(
            '#email_wrapper .col-md-6:eq(0)');
        $("#tolcount").DataTable(dataTableOptions).buttons().container().appendTo(
            '#email_wrapper .col-md-6:eq(0)');

    });
</script>

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

        $("#dupcount").DataTable(dataTableOptions).buttons().container().appendTo(
            '#email_wrapper .col-md-6:eq(0)');
    });
</script>
