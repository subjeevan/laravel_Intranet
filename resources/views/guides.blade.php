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
                <div class="col-lg-3">
                    <div class="card">
                        @foreach ($hvideos as $hvideo)
                            <div class="card-body">
                                <div class="video-container">

                                    <video id="videoPlayer" controls>
                                        <source src="{{ Storage::url($hvideo->link) }}" type="video/mp4">
                                    </video>
                                </div>
                                <h3 class="mt-3">{{ $hvideo->name }}</h3>
                                <p id="videoDescription">Start at {{ $hvideo->start_time }}</p>

                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Software Video Guides</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($svideos as $svideo)
                                            <tr>
                                                <td>{{ $svideo->name }}</td>
                                                <td><a href="{{ 'storage/' . $svideo->link }}">
                                                        <button class="btn btn-sm btn-primary">Download</button>
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Hardware Video Guides</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hvideos as $hvideo)
                                            <tr>
                                                <td>{{ $hvideo->name }}</td>
                                                <td><a href="{{ 'storage/' . $hvideo->link }}">
                                                        <button class="btn btn-sm btn-primary">Download</button>
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Midas Software User Manuals</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($files as $file)
                                            <tr>
                                                <td>{{ $file->name }}</td>
                                                <td><a href="{{ 'storage/' . $file->link }}">
                                                        <button class="btn btn-sm btn-primary">Download</button>
                                                    </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Important Files</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($docs as $doc)
                                            <tr>
                                                <td>{{ $doc->name }}</td>
                                                <td><a href="{{ 'storage/' . $doc->link }}">
                                                        <button class="btn btn-sm btn-primary">Download</button>
                                                    </a></td>
                                            </tr>
                                        @endforeach
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
