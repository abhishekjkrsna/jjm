<div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="card border-0 shadow col-6">
            <form id="add-team-form" class="">
                <div class="card-header bg-transparent">
                    <h3 class="card-title">Add Team</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <input type="number" name="added_by" id="added_by" value="{{ $user->id }}" hidden>
                        <div id="response"></div>
                        <div class="mb-3 col-12">
                            <select class="form-select" name="pro_id" id="pro_id" required>
                                <option selected hidden disabled>Select Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3 col-12">
                            <input type="text" class="form-control" name="name" id="name" placeholder=""
                                pattern="[A-Za-z\s]{3,}" />
                            <label for="name">Team Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="description"
                                name="description"style="height: 100px"></textarea>
                            <label for="remark">Description</label>
                        </div>

                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@include('layouts/sections/scripts/form', ['formId' => 'add-team-form', 'url' => '/api/team/add'])

