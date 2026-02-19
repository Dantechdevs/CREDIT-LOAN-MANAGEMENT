@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h6 class="mb-0"><i class="fas fa-check-circle"></i> Create a customer</h6>
        </div>

        <div class="card-body">

            {{-- Step Wizard --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="text-center">
                    <div class="rounded-circle bg-primary text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:35px;height:35px;">1</div>
                    <p class="small mt-2">Personal information</p>
                </div>

                <div class="flex-grow-1 border-top mx-2"></div>

                <div class="text-center">
                    <div class="rounded-circle bg-secondary text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:35px;height:35px;">2</div>
                    <p class="small mt-2 text-muted">Next Of Kin</p>
                </div>

                <div class="flex-grow-1 border-top mx-2"></div>

                <div class="text-center">
                    <div class="rounded-circle bg-secondary text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:35px;height:35px;">3</div>
                    <p class="small mt-2 text-muted">Location</p>
                </div>

                <div class="flex-grow-1 border-top mx-2"></div>

                <div class="text-center">
                    <div class="rounded-circle bg-secondary text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:35px;height:35px;">4</div>
                    <p class="small mt-2 text-muted">Account Details</p>
                </div>

                <div class="flex-grow-1 border-top mx-2"></div>

                <div class="text-center">
                    <div class="rounded-circle bg-secondary text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:35px;height:35px;">5</div>
                    <p class="small mt-2 text-muted">Channels</p>
                </div>

                <div class="flex-grow-1 border-top mx-2"></div>

                <div class="text-center">
                    <div class="rounded-circle bg-secondary text-white fw-bold d-inline-flex align-items-center justify-content-center" style="width:35px;height:35px;">6</div>
                    <p class="small mt-2 text-muted">Confirm and Submit</p>
                </div>
            </div>

            <h5 class="fw-bold mb-4">Step 1 - Personal Information</h5>

            <form method="POST" action="{{ route('customers.create.step1.post') }}">
                @csrf

                <div class="row g-4">

                    {{-- Type --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Type</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                            <select name="type" class="form-select border-danger" required>
                                <option value="">Select Type</option>
                                <option value="Individual">Individual</option>
                                <option value="Business">Business</option>
                            </select>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- PF Number --}}
                    <div class="col-md-3">
                        <label class="form-label text-success">PF Number</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-success"><i class="fas fa-user"></i></span>
                            <input type="text" name="pf_number" class="form-control border-success" placeholder="PF Number">
                        </div>
                    </div>

                    {{-- Title --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Title</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                            <select name="title" class="form-select border-danger" required>
                                <option value="">Select Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Dr">Dr</option>
                            </select>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- First Name --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">First Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                            <input type="text" name="first_name" class="form-control border-danger" placeholder="First Name" required>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- Middle Name --}}
                    <div class="col-md-3">
                        <label class="form-label text-success">Middle Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-success"><i class="fas fa-user"></i></span>
                            <input type="text" name="middle_name" class="form-control border-success" placeholder="Middle Name">
                        </div>
                    </div>

                    {{-- Last Name --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Last Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                            <input type="text" name="last_name" class="form-control border-danger" placeholder="Last Name" required>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- Gender --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Gender</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                            <select name="gender" class="form-select border-danger" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- Date of Birth --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Date of Birth</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-calendar"></i></span>
                            <input type="date" name="dob" class="form-control border-danger" required>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- Relationship Officer --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">RelationShip Officer</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                            <select name="relationship_officer" class="form-select border-danger" required>
                                <option value="">--Select Relationship Officer--</option>
                                <option value="Officer 1">Officer 1</option>
                                <option value="Officer 2">Officer 2</option>
                            </select>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- Tax PIN --}}
                    <div class="col-md-3">
                        <label class="form-label text-success">Tax PIN</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-success"><i class="fas fa-lock"></i></span>
                            <input type="text" name="tax_pin" class="form-control border-success" placeholder="Tax PIN">
                        </div>
                    </div>

                    {{-- Mobile Line --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Mobile Line</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <img src="https://flagcdn.com/w20/ke.png" width="20">
                            </span>
                            <span class="input-group-text">+254</span>
                            <input type="text" name="mobile_no" class="form-control border-danger" placeholder="7XXXXXXXX" required>
                        </div>
                        <small class="text-danger">Incorrect Phone Number</small>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-3">
                        <label class="form-label text-success">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-success"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control border-success" placeholder="Email Address">
                        </div>
                    </div>

                    {{-- Alternative Phone --}}
                    <div class="col-md-3">
                        <label class="form-label text-success">Alternative Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <img src="https://flagcdn.com/w20/ke.png" width="20">
                            </span>
                            <span class="input-group-text">+254</span>
                            <input type="text" name="alternative_phone" class="form-control border-success" placeholder="7XXXXXXXX">
                        </div>
                    </div>

                    {{-- Customer Category --}}
                    <div class="col-md-3">
                        <label class="form-label text-muted">Customer Category</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-mobile-alt"></i></span>
                            <select name="customer_category" class="form-select">
                                <option value="All">All</option>
                                <option value="VIP">VIP</option>
                                <option value="Normal">Normal</option>
                            </select>
                        </div>
                    </div>

                    {{-- Max Prequalified Amount --}}
                    <div class="col-md-3">
                        <label class="form-label text-success">Maximum Prequalified Amount</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-success"><i class="fas fa-bars"></i></span>
                            <input type="number" name="max_prequalified_amount" class="form-control border-success" value="0">
                        </div>
                    </div>

                    {{-- Identity Type --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Identity Type</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-bars"></i></span>
                            <select name="identity_type" class="form-select border-danger" required>
                                <option value="">Select Id Type</option>
                                <option value="National ID">National ID</option>
                                <option value="Passport">Passport</option>
                            </select>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- Identity Number --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Identity Number</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-id-card"></i></span>
                            <input type="text" name="identity_number" class="form-control border-danger" placeholder="Identification Number" required>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- Marital Status --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Marital Status</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-bars"></i></span>
                            <select name="marital_status" class="form-select border-danger" required>
                                <option value="">Marital Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- Referee --}}
                    <div class="col-md-6">
                        <label class="form-label">Referee (Search By Name /Mobile Line/ Id No.)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-users"></i></span>
                            <input type="text" name="referee" class="form-control" placeholder="Referee">
                        </div>
                    </div>

                    {{-- Guarantor --}}
                    <div class="col-md-6">
                        <label class="form-label">Guarantor (Search By Name /Mobile Line/ Id No.)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-bars"></i></span>
                            <input type="text" name="guarantor" class="form-control" placeholder="Guarantor">
                        </div>
                    </div>

                    {{-- Industry Type --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Industry Type</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-bars"></i></span>
                            <select name="industry_type" class="form-select border-danger" required>
                                <option value="">Select Industry</option>
                                <option value="Agriculture">Agriculture</option>
                                <option value="Technology">Technology</option>
                                <option value="Retail">Retail</option>
                            </select>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- Business Type --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Business Type</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-bars"></i></span>
                            <select name="business_type" class="form-select border-danger" required>
                                <option value="">Select Business</option>
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                            </select>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- Income Range --}}
                    <div class="col-md-3">
                        <label class="form-label text-danger">Income Range</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-bars"></i></span>
                            <select name="income_range" class="form-select border-danger" required>
                                <option value="">Income Range</option>
                                <option value="0-20000">0 - 20,000</option>
                                <option value="20000-50000">20,000 - 50,000</option>
                                <option value="50000-100000">50,000 - 100,000</option>
                                <option value="100000+">100,000+</option>
                            </select>
                        </div>
                        <small class="text-danger">This field is required</small>
                    </div>

                    {{-- Customer Source --}}
                    <div class="col-md-3">
                        <label class="form-label">Customer Source</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-bars"></i></span>
                            <select name="customer_source" class="form-select">
                                <option value="Through Facebook">Through Facebook</option>
                                <option value="Through WhatsApp">Through WhatsApp</option>
                                <option value="Walk In">Walk In</option>
                                <option value="Referral">Referral</option>
                            </select>
                        </div>
                    </div>

                    {{-- Is Employed --}}
                    <div class="col-md-12">
                        <label class="form-label">Is Employed?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_employed" value="1">
                        </div>
                    </div>

                </div>

                {{-- Buttons --}}
                <div class="d-flex justify-content-between mt-5">
                    <button type="button" class="btn btn-outline-secondary px-4" disabled>Previous</button>
                    <button type="submit" class="btn btn-outline-primary px-5">Next</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
