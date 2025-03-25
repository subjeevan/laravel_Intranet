<x-layout>
    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* Aspect ratio 16:9 */
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }

        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
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
            <div class='row'>
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Downloads</h3>
                        </div>
                        <div class="card-body row justify-content-center">
                            @foreach ($docs as $doc)
                                <div class="col-md-3 m-1"><a href="{{ 'storage/' . $doc->link }}">
                                        <button type="button"
                                            class="btn btn-primary btn-block">{{ $doc->name }}</button></a>
                                </div>
                            @endforeach
                            <div class="col-md-3 m-1"><a href="{{ route('apitest') }}">
                                    <button type="button" class="btn btn-primary btn-block">Api Test</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
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
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.table-responsive -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Software Video Guides</h3>
                        </div>
                        <div class="card-body row justify-content-center">

                            @foreach ($svideos as $svideo)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-12"> <!-- Adjust grid for responsiveness -->

                                    <div class="video-container">
                                        <video class="video-player" controls>
                                            <source src="{{ Storage::url($svideo->link) }}" type="video/mp4">
                                        </video>
                                    </div>
                                    <h3 class="mt-3">{{ $svideo->name }}</h3>
                                    <p id="videoDescription">Start at {{ $svideo->start_time }}</p>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Hardware Video Guides</h3>
                        </div>
                        <div class="card-body row justify-content-center">

                            @foreach ($hvideos as $hvideo)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-12"> <!-- Adjust grid for responsiveness -->

                                    <div class="video-container">
                                        <video class="video-player" controls>
                                            <source src="{{ Storage::url($hvideo->link) }}" type="video/mp4">
                                        </video>
                                    </div>
                                    <h3 class="mt-3">{{ $hvideo->name }}</h3>
                                    <p id="videoDescription">Start at {{ $hvideo->start_time }}</p>

                                </div>
                            @endforeach
                        </div>
                    </div>
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
