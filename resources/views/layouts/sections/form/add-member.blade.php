<div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-5 col">
            <div class="card border-0 shadow">
                <form id="add-member-form">
                    <div class="card-header bg-transparent">
                        <h3 class="card-title">Add Team Member</h3>
                    </div>
                    <div class="card-body">
                        <input type="number" name="added_by" id="added_by" value="{{ $user->id }}" hidden>
                        <div id="response"></div>
                        <div class="mb-3">
                            <select class="form-select" name="project" id="project"
                                onchange="getDistricts(this.value)" required>
                                <option selected hidden disabled>Select Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="t_id" id="t_id" required>
                                <option selected hidden disabled>Select Team</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="u_id" id="u_id">
                                <option selected hidden disabled>Select Member</option>
                                @foreach ($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="role" id="role" required>
                                <option selected hidden disabled>Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="remark" name="remark"style="height: 100px"></textarea>
                            <label for="remark">Remark</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block">Add Member</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@include('layouts/sections/scripts/form', ['formId' => 'add-member-form', 'url' => '/api/team-member/add'])
<script>
    const district = document.getElementById('t_id');

    async function getDistricts(state) {
        district.disabled = false;

        try {
            const response = await fetch(`/api/team-member/project/${state}`);
            if (response.ok) {
                const data = await response.json();

                if (data.data.length == 0) {
                    district.innerHTML = "<option selected disabled hidden>No Team Found</option>";
                    return;
                }
                let temp = "<option selected disabled hidden>Select Team</option>";

                data.data.forEach(element => {
                    temp += `<option value="${element.id}">${element.name}</option>`;
                });

                district.innerHTML = temp;
            } else {
                console.error('Failed to fetch data.');
            }
        } catch (error) {
            console.error('An error occurred:', error);
        }
    }
</script>
