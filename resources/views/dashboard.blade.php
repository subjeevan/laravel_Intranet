<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <div class="marquee text-red">
                            @if ($newses)
                                <marquee behavior="scroll" direction="left">
                                    @foreach ($newses as $news)
                                        {{ $news->created_at->format('d-M-Y= ') . $news->type . ': ' . $news->message}}&nbsp;||&nbsp;
                                    @endforeach
                                </marquee>
                            @endif
                        </div>
                    </div><!-- /.col -->
                    <div class="col-sm-2">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Intranet Sites</h3>
                        </div>
                        <div class="card-body row justify-content-center">
                            @if ($intranetdatas)
                                @foreach ($intranetdatas as $intranetdata)
                                    <div class="col-md-3 m-1"><a href="{{ $intranetdata->url }}">
                                            <button type="button"
                                                class="btn btn-primary btn-block">{{ $intranetdata->name }}</button></a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Internet Sites</h3>
                        </div>
                        <div class="card-body row justify-content-center">
                            @if ($internetdatas)
                                @foreach ($internetdatas as $internetdata)
                                    <div class="col-md-2 m-1"><a href="{{ $internetdata->url }}">
                                            <button type="button"
                                                class="btn btn-primary btn-block">{{ $internetdata->name }}</button></a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header bg-info text-center align-middle p-3">
                            <h4 class="font-weight-bold mb-0">Registration Data</h4>
                        </div>
                        <div class="card-body p-2">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th rowspan='2' class="text-center align-middle">Branch</th>
                                        <th colspan="2" class="text-center align-middle">General</th>
                                        <th colspan='2' class="text-center align-middle">Insurance</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">New</th>
                                        <th class="text-center">Old</th>
                                        <th class="text-center">New</th>
                                        <th class="text-center">Old</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pcounts as $pcount)
                                        <tr>
                                            <td class="text-center">{{ $pcount->suor_branchname }}</td>
                                            <td class="text-center">{{ $pcount->newgeneral }}</td>
                                            <td class="text-center">{{ $pcount->followupgeneral }}</td>
                                            <td class="text-center">{{ $pcount->newinsurance }}</td>
                                            <td class="text-center">{{ $pcount->followupinsurance }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
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
                                            class="table table-bordered table-striped dataTable dtr-inline"
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
                                        <div class="dataTables_paginate paging_simple_numbers" id="extension_paginate">
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
                                            class="table table-bordered table-striped dataTable dtr-inline"
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
                <!-- /.col-md-6 -->


                <!-- /.col-md-6 -->
            </div>
        </section>
        <!-- /.content -->
    </div>
</x-layout>
<script>
    $(function() {
        const dataTableOptions = {
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print", "colvis"]
        };

        // Initialize Extension Table
        $("#extension").DataTable(dataTableOptions).buttons().container().appendTo(
            '#extension_wrapper .col-md-6:eq(0)');

        // Initialize Email Table
        $("#email").DataTable(dataTableOptions).buttons().container().appendTo(
            '#email_wrapper .col-md-6:eq(0)');
    });
</script>
