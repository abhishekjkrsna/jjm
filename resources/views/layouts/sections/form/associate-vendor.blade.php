<div class="container">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-5 col">
            <div class="card border-0 shadow">
                <form id="associate-vendor-form">
                    <div class="card-header bg-transparent">
                        <h3 class="card-title">Associate Vendor</h3>
                    </div>
                    <div class="card-body">
                        <input type="number" name="added_by" id="added_by" value="{{ $user->id }}" hidden>
                        <div id="response"></div>
                        <div class="mb-3">
                            <select class="form-select" name="p_id" id="p_id" required>
                                <option selected hidden disabled>Select Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="v_id" id="v_id" required>
                                <option selected hidden disabled>Select Vendor</option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <select select id="state" class="form-control" name="state" id="state"
                                    onchange="getDistricts(this.value)" required>
                                    <option value="">Select State</option>
                                    <option value="Andaman Nicobar">Andaman Nicobar</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadra Nagar Haveli and Daman a">Dadra Nagar Haveli and Daman a
                                    </option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu Kashmir">Jammu Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Ladakh">Ladakh</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <select class="form-control" name="district" disabled id="district" required>
                                    <option>Select District</option>
                                    <!-- <option>Lucknow</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input id="start_date" class="form-control" type="date" name="start_date" />
                            </div>
                        </div>
                        <div class=" mb-3 col-12">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input id="end_date" class="form-control" type="date" name="end_date" />
                            </div>                            
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="remark" name="remark"style="height: 100px"></textarea>
                            <label for="remark">Remark</label>
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

@include('layouts.sections.scripts.district')
@include('layouts/sections/scripts/form', [
    'formId' => 'associate-vendor-form',
    'url' => '/api/associate-vendor/add',
])
