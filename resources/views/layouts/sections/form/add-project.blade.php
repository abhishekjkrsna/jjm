<div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-5 col">
            <div class="card border-0 shadow">
                <form id="add-project-form">
                    <div class="card-header bg-transparent">
                        <h3 class="card-title">Add Project</h3>
                    </div>
                    <div class="card-body">
                        <input type="number" name="added_by" id="added_by" value="{{ $user->id }}" hidden>
                        <div id="response"></div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder=""
                                pattern="[A-Za-z\s]{3,}" />
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"
                                style="height: 100px"></textarea>
                            <label for="remark">Description</label>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="vertical" id="vertical" required>
                                <option selected hidden disabled>Select Vertical</option>
                                @foreach ($verticals as $vertical)
                                    <option value="{{ $vertical->id }}">{{ $vertical->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="spoc_id" id="spoc_id">
                                <option selected hidden disabled>Select SPOC</option>
                                @foreach ($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@include('layouts/sections/scripts/form', [
    'formId' => 'add-project-form',
    'url' => '/api/project/add',
])
