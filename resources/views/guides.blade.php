<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v2</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
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
                {{-- <div class="col-lg-6">
                    <div class="card">

                    </div>
                </div> --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Software Guides</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>How to Register New patient</td>
                                            <td><button class="btn btn-sm btn-primary"><a
                                                        href="pages/examples/invoice.html">OR9842</a></button></td>
                                        </tr>
                                        <tr>
                                            <td>How to Bill New patient</td>
                                            <td><button class="btn btn-sm btn-primary"><a How to Register New patient
                                                        href="pages/examples/invoice.html">OR9842</a></button></td>
                                        </tr>
                                        <tr>
                                            <td>How to refund Registration and Bill</td>
                                            <td><button class="btn btn-sm btn-primary"><a
                                                        href="pages/examples/invoice.html">OR9842</a></button></td>
                                        </tr>
                                        <tr>
                                            <td>Call of Duty IV</td>
                                            <td><button class="btn btn-sm btn-primary"><a
                                                        href="pages/examples/invoice.html">OR9842</a></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Download Files</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>How to Register New patient</td>
                                            <td><button class="btn btn-sm btn-primary"><a
                                                        href="pages/examples/invoice.html">OR9842</a></button></td>
                                        </tr>
                                        <tr>
                                            <td>How to Bill New patient</td>
                                            <td><button class="btn btn-sm btn-primary"><a How to Register New patient
                                                        href="pages/examples/invoice.html">OR9842</a></button></td>
                                        </tr>
                                        <tr>
                                            <td>How to refund Registration and Bill</td>
                                            <td><button class="btn btn-sm btn-primary"><a
                                                        href="pages/examples/invoice.html">OR9842</a></button></td>
                                        </tr>
                                        <tr>
                                            <td>Call of Duty IV</td>
                                            <td><button class="btn btn-sm btn-primary"><a
                                                        href="pages/examples/invoice.html">OR9842</a></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </section>
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
