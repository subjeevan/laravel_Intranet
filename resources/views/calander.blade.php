<x-layout>
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title">BEH Calander</h4>
            </div>
            <div class="card-body">
                <div >
                    <img src="{{asset('storage/'."files/images/hospital_banner.jpg") }}" class="img-fluid" alt="hospital">
                </div>
                <div class="row">
                    @foreach ($months as $month)
                    <div class="col-sm-4">
                            <a href="{{ asset('storage/'.$month->image) }}" data-toggle="lightbox" data-title="sample 1 - white"
                                data-gallery="gallery">
                                {{ $month->name }}
                                <img src="{{ asset('storage/'.$month->image) }}" class="img-fluid mb-2"
                                    alt="NullData">
                                    <h4>{{ $month->name }}</h4>
                            </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
