<div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-5 col">
            <div class="card border-0 shadow">
                <form id="add-role-form">
                    <div class="card-header bg-transparent">
                        <h3 class="card-title">Add Roles</h3>
                    </div>
                    <div class="card-body">
                        <div id="response"></div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder=""
                                pattern="[A-Za-z\s]{3,}" />
                            <label for="name">Name</label>
                        </div>

                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block">Add Role</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@include('layouts/sections/scripts/form', array('formId'=>'add-role-form', 'url'=>'/api/role/add'))
