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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Intranet Sites</h3>
                </div>
                <div class="card-body row justify-content-center">
                    @foreach ($intranetdatas as $intranetdata)
                    <div class="col-md-2 m-1"><a href="{{$intranetdata->url}}">
                        <button type="button" class="btn btn-primary btn-block" >{{$intranetdata->name}}</button></a>
                    </div>
                    @endforeach

                </div>

            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Internet Sites</h3>
                </div>
                <div class="card-body row justify-content-center">
                        @foreach ($internetdatas as $internetdata)
                        <div class="col-md-2 m-1"><a href="{{$internetdata->url}}">
                            <button type="button" class="btn btn-primary btn-block" >{{$internetdata->name}}</button></a>
                        </div>
                        @endforeach
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
</x-layout>
