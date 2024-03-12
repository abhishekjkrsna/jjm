<div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-5 col">
            <div class="card border-0 shadow">
                <form id="add-user-form">
                    <div class="card-header bg-transparent">
                        <h3 class="card-title">Add User</h3>
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
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder=""
                                pattern="[\d]{10}" />
                            <label for="mobile">Mobile</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="" />
                            <label for="email">Email Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="password" id="password"
                                value="P@55word" />
                            <label for="password">Password</label>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="role" id="role" required>
                                <option selected hidden disabled>Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="vertical" id="vertical" required>
                                <option selected hidden disabled>Select Vertical</option>
                                @foreach ($verticals as $vertical)
                                    <option value="{{ $vertical->id }}">{{ $vertical->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block">Add User</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@include('layouts/sections/scripts/form', array('formId'=>'add-user-form', 'url'=>'/api/user/add'))

