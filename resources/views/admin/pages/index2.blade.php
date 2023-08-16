@extends('layout.master')

@section('content')
    @include('admin.partials.breadcrumb', ['page'=>'Pages'])
    <div class="row">

        <div class="col-md-4">
            <div class="card col-md-11">
                <div class="card-header">
                    <h1>Select Models</h1>
                </div>

                <div class="card-body">
                    <form id="modelForm">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="models" value="country"> Country
                        </label><br>
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="models" value="feedback"> Feedback
                        </label><br>
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="models" value="ourclient"> Our Client
                        </label><br>
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="models" value="gallery"> Gallery
                        </label><br>
                    </form>
                </div>

                <div class="card-footer">
                    <input class="btn btn-primary mt-2" type="button" value="Submit" onclick="submitForm()">
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card col-12">
                <div class="card-header">
                    <h2>Selected Models</h2>
                </div>

                <div class="card-body">
                    <h6 class="card-title">Создание слайдера</h6>
                    <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf

                        <div id="selectedModels"> </div>

                        <button type="submit" class="btn btn-primary mr-2 mt-3">Создать</button>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('custom-scripts')
    <script>
        function submitForm() {
            const form = document.getElementById("modelForm");
            const selectedModels = [];

            const checkboxes = form.elements.models;
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    selectedModels.push(checkboxes[i].value);
                }
            }

            displaySelectedModels(selectedModels);
        }

        function displaySelectedModels(models) {
            const selectedModelsDiv = document.getElementById("selectedModels");
            selectedModelsDiv.innerHTML = "";

            if (models.length === 0) {
                selectedModelsDiv.innerHTML = "No models selected.";
                return;
            }

            const div = document.createElement("div");

            models.forEach(model => {
                const label = document.createElement("label");
                const input = document.createElement("input");
                label.textContent = model;

                if (model === "country") {
                    input.type = "text";
                    input.name = "country";
                }
                else if (model === "feedback") {
                    input.type = "text";
                    input.name = "feedback";
                }
                else if (model === "ourclient") {
                    input.type = "checkbox";
                    input.name = "ourclient";
                    input.value = model;
                }
                else if (model === "gallery") {
                    input.type = "text";
                    input.name = "gallery";
                }

                label.appendChild(input);
                div.appendChild(label);
            });

            selectedModelsDiv.innerHTML = models.length > 0 ? div.outerHTML : "No models selected.";
        }
    </script>
@endpush
