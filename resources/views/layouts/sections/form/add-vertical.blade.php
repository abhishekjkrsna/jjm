<div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-5 col">
            <div class="card border-0 shadow">
                <form id="add-vertical-form">
                    <div class="card-header bg-transparent">
                        <h3 class="card-title">Add Vertical</h3>
                    </div>
                    <div class="card-body">
                        <input type="number" name="added_by" id="added_by" value="{{ $user->id }}" hidden>
                        <div id="response"></div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder=""
                                pattern="[A-Za-z\s]{3,}" required />
                            <label for="name">Name</label>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="head_id" id="head_id">
                                <option selected hidden disabled>Select Vertical Head</option>
                                @foreach ($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="remark" name="remark"style="height: 100px"></textarea>
                            <label for="remark">Remark</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block">Add Vertical</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@include('layouts/sections/scripts/form', array('formId'=>'add-vertical-form', 'url'=>'/api/vertical/add'))
