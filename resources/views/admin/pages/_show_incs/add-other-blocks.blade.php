<div class="raw">
    <div class="col-6">
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="card-title"> Add other blocks </h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> Add Gallery block </h6>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addGallery">Add
                    </button>
                </div>
                @include('admin.pages.gallery.create')

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> Add Info block </h6>
                    <a href="{{ route('admin.infos.create', $page->id) }}" class="btn btn-primary">Add</a>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> Add Comment block </h6>
                    <a href="{{ route('admin.comments.create', $page->id) }}"
                       class="btn btn-primary">Add</a>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> Add Appeals block </h6>
                    <a href="{{ route('admin.appeals.create', $page->id) }}"
                       class="btn btn-primary"> Add </a>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> Add Text block </h6>
                    <a href="{{ route('admin.texts.create', $page->id) }}" class="btn btn-primary">Add</a>
                </div>

                <hr>

                @if($videos->isEmpty())
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-1"> Add Video block </h6>
                        <a href="{{ route('admin.videos.create', $page->id) }}"
                           class="btn btn-primary">Add</a>
                    </div>

                    <hr>
                @else
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-1"> Add Video Player block </h6>
                        <button type="button" class="btn btn-secondary" disabled> Add</button>
                    </div>

                    <hr>
                @endif

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> Add Our Clients block </h6>
                    <a href="{{ route('admin.clients.create', $page->id) }}"
                       class="btn btn-primary"> Add </a>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> Add Our Clients Logo block </h6>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addClientLogo"> Add
                    </button>
                </div>
                @include('admin.pages.clients_logo.create')

                <hr>

                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> Add Direct Speech block </h6>
                    <a href="{{ route('admin.direct_speech.create', $page->id) }}"
                       class="btn btn-primary"> Add </a>
                </div>
            </div>
        </div>
    </div>
</div>
