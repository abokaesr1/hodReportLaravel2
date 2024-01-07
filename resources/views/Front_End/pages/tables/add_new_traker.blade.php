@extends('Front_End.layout.main_design')

@section('content')
<!-- mani page content body part -->
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Form TRAKER</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">TRAKER</li>
                        <li class="breadcrumb-item active">Form TRAKER</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            <a href="{{ route('traker.view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> VIEW
                                TRAKERS</a>
                        </div>
                        <div class="p-2 d-flex">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>ADD NEW TRAKER</h2>
                    </div>
                    <div class="body">
                        <form id="basic-form" method="post" novalidate action="{{ route('traker.post') }}">
                            @csrf
                            <div class="form-group">
                                <label>Company Name </label>
                                <input type="text" class="form-control" required name="company_name">
                            </div>
                            <div class="form-group">
                                <label for="account_owner">Account Owner </label>
                                <select name="account_owner" id="account_owner" class="form-control">
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}"> {{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="child_account">Is It Parent Account </label>
                                <select name="child_account" id="child_account" class="form-control">
                                    <option value="parent"> YES </option>
                                    <option value="child"> NO </option>
                                </select>
                            </div>
                            <div class="form-group" id="parent_section" style="display: none">
                                <label for="parent_company">Parent Company </label>
                                <input type="text" name="parent_company" id="parent_company" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="line_manage">Line Manage </label>
                                        <input type="text" name="line_manage" id="line_manage" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_name">Contact Name </label>
                                        <input type="text" name="contact_name" id="contact_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position">Position </label>
                                        <input type="text" name="position" id="position" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="website">Website </label>
                                        <input type="text" name="website" id="website" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stage">Stage </label>
                                        <select name="stage" id="stage" class="form-control" required>
                                            <option value="assessment"> Assessment (30%)</option>
                                            <option value="contacted"> Contacted (50%)</option>
                                            <option value="proposal"> Proposal (70%)</option>
                                            <option value="closedwon"> Closed won (100%)</option>
                                            <option value="closedlost"> Closed lost (0%)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="revenue">Revenue</label>
                                        <input type="number" name="revenue" id="revenue" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="expected_revenue">Expected Revenue </label>
                                        <input name="expected_revenue" id="expected_revenue" class="form-control"
                                            required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="type">Type </label>
                                        <input type="text" name="type" id="type" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Quote Created </label>
                                        <br />
                                        <label class="fancy-radio">
                                            <input type="radio" name="quote_created" id="yes" value="1" required
                                                data-parsley-errors-container="#error-radio">
                                            <span><i></i>YES</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="quote_created" id="no" checked value="0">
                                            <span><i></i>NO</span>
                                        </label>
                                        <p id="error-radio"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customer_type">Customer Type </label>
                                        <select name="customer_type" id="customer_type" class="form-control" required>
                                            <option value="project">Project</option>
                                            <option value="retainer"> Retainer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_name ">Product Name </label>
                                        <select name="product_name" id="product_name" class="form-control" required>
                                            <option value="Digital Services">Digital Services </option>
                                            <option value="Awareness Campaign">Awareness Campaign </option>
                                            <option value="Lead Gen Campaign">Lead Gen Campaign </option>
                                            <option value="Event Activation"> Event Activation </option>
                                            <option value="Video Production Services"> Video Production Services </option>
                                            <option value="OOH"> OOH </option>
                                            <option value="Press Release"> Press Release </option>
                                            <option value="Press Conference"> Press Conference </option>
                                            <option value="Articles"> Articles </option>
                                            <option value="News Post"> News Post </option>
                                            <option value="Creative Services"> Creative Services </option>
                                            <option value="Website Development"> Website Development </option>
                                            <option value="Strategic Planning"> Strategic Planning </option>
                                            <option value="Full Services (Retainer)"> Full Services (Retainer) </option>
                                            <option value="Digital Rental"> Digital Rental </option>
                                            <option value="Event Creative Static"> Event Creative Static </option>
                                            <option value="Event Creative Production"> Event Creative Production </option>
                                            <option value="Event Production (Stage)"> Event Production (Stage) </option>
                                            <option value="Event Production (Rollups)"> Event Production (Rollups) </option>
                                            <option value="Event Production (Printing)"> Event Production (Printing) </option>
                                            <option value="Exhibition Stand"> Exhibition Stand </option>
                                            <option value="Event AVL (Audio Visual & Lighting)"> Event AVL (Audio Visual & Lighting) </option>
                                            <option value="Sponsorship"> Sponsorship </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="action_to_take">Action to Take</label>
                                        <select name="action_to_take" id="action_to_take" class="form-control" required>
                                            <option value="contact_the_client">Contact the client </option>
                                            <option value="set_a_meeting"> Set a Meeting </option>
                                            <option value="interested_in_aservice"> Interested in a service
                                            </option>
                                            <option value="not_interested_in_aservice "> Not interested in a service
                                            </option>
                                            <option value="close_the_deal"> Close the deal </option>
                                            <option value="sent_contract"> Sent contract </option>
                                            <option value="know_client_budget "> Know Client budget </option>
                                            <option value="call"> Call </option>
                                            <option value="meeting_invitation"> Meeting invitation </option>
                                            <option value="rejection_reason"> Rejection reason </option>
                                            <option value="product_preference"> Product preference </option>
                                            <option value="retain_the_Client "> Retain the Client </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="comments ">Comments </label>
                                        <textarea type="text" name="comments" id="comments" class="form-control"
                                            required>
                                            </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_contact_date">Last Contact Date </label>
                                        <input type="date" name="last_contact_date" id="last_contact_date"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="next_contact_date">Next Contact Date </label>
                                        <input type="date" name="next_contact_date" id="next_contact_date"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="expected_contact_date">Expected Close Date</label>
                                        <input type="date" name="expected_contact_date" id="expected_contact_date"
                                            class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone </label>
                                        <input type="text" name="phone" id="phone" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="address" name="address" id="address" class="form-control"
                                            required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country </label>
                                        <input type="text" name="country" id="country" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City </label>
                                        <input type="text" name="city" id="city" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="zip">Zip </label>
                                        <input type="number" name="zip" id="zip" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

@endsection

@section('js')
<script>
    $(function() {
        $('#child_account').change(function(e) {
            var childVal = $('#child_account').val();
            e.preventDefault();
            if (childVal == 'parent') {
                $('#parent_section').css('display', 'none');
            } else {
                $('#parent_section').css('display', 'block');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Function to update values based on revenue and stage
        function updateValues() {
            var stageVal = $('#stage').val();
            var revenue = parseFloat($('#revenue').val());
            var expected_revenue = 0;
            var type = '';
            if (stageVal == 'assessment') {
                expected_revenue = revenue * 0.3;
            } else if (stageVal == 'contacted') {
                expected_revenue = revenue * 0.5;
            } else if (stageVal == 'proposal') {
                expected_revenue = revenue * 0.7;
            } else if (stageVal == 'closedwon') {
                expected_revenue = revenue;
            } else {
                expected_revenue = revenue;
            }
            $('#expected_revenue').val(expected_revenue.toFixed(2));
            if (expected_revenue >= 1000000) {
                type = 'Hot';
            } else if (expected_revenue < 1000000 && expected_revenue >= 100000) {
                type = 'Warm';
            } else {
                type = 'Cold';
            }
            $('#type').val(type);
            // Show/hide "Quote Created" based on stageVal
            if (stageVal == 'proposal') {
                $('#quote-created-container').show();
                // Automatically set the value to "YES" if stageVal is "proposal"
                $('input[name="quote_created"]').val(['1']);
            } else {
                $('#quote-created-container').hide();
                // Automatically set the value to "NO" for other stageVals
                $('input[name="quote_created"]').val(['0']);
            }
        }
        // Trigger updateValues when revenue changes
        $('#revenue').on('input', function(e) {
            e.preventDefault();
            updateValues();
        });
        // Trigger updateValues when stage changes
        $('#stage').on('change', function() {
            updateValues();
        });
        // Initial execution to set initial visibility and values
        updateValues();
    });
</script>
<script>
    $(function() {
        // validation needs name of the element
        $('#group_leader').multiselect();
        // initialize after multiselect
        $('#basic-form').parsley();
    });
</script>
@stop
