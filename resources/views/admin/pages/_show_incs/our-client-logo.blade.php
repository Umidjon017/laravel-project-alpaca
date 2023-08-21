<div class="raw">
    <div class="d-flex justify-content-evenly flex-wrap">
        @foreach ($ourClientLogos as $clientLogo)
            <div class="card mt-3">
                <div class="card-header">
                    <div class="card-title">
                        <h6> Clients Logo Block {{ $loop->iteration }} </h6>
                        <form action="{{ route('admin.clients_logo.destroy', $clientLogo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm float-end ms-2">Delete</button>
                        </form>
                        <button type="button" class="btn btn-success btn-sm float-end text-capitalize"
                                data-bs-toggle="modal" data-bs-target="#editClientsLogo{{$clientLogo->id}}">Edit
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="me-3">
                            <h6 class="mb-1">Logo</h6>
                            <img src="{{ asset(clients_logo_file_path().$clientLogo->logo) }}" alt="" width="200">
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.pages.clients_logo.edit')

        @endforeach
    </div>
</div>
