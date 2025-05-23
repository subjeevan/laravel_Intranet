<x-layout>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Intranet Sites</h3>
                    </div>
                    <div class="card-body row justify-content-center"">
                        @if ($intranetdatas)
                        @foreach ($intranetdatas as $intranetdata)
                        <div class="col-md-2 m-1">
                            <a href="{{ $intranetdata->url }}">
                                <button type="button" class="btn btn-primary btn-block {{ $intranetdata->blink ? 'blink-button' : '' }}">
                                    {{ $intranetdata->name }}
                                </button>
                            </a>
                        </div>
                    @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Internet Sites</h3>
                    </div>
                    <div class="card-body row justify-content-center">
                        @if ($internetdatas)
                            @foreach ($internetdatas as $internetdata)
                                <div class="col-md-2 m-1"><a href="{{ $internetdata->url }}">
                                        <button type="button"
                                            class="btn btn-success text-truncate  btn-block">{{ $internetdata->name }}</button></a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-md-6">
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
            <div class="row col-lg-12">
                <div class="col-lg-6">
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
                <div class="col-lg-6">
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
          });
</script>
