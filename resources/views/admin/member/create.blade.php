@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Membership Type</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Create Membership Type</h3>
                        <a href="{{url('admin/membership_types')}}" class="back-button">back</a>
                    </div>
                    <div class="card-body">
                        @include('success.success')
                        @include('errors.error')
                        {!! Form::open(['url' => '/admin/membership_types', 'class' => 'form-horizontal', 'method'=> 'POST','files' => true]) !!}
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Membership Type Name <span style="color: red">*</span> </label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="name" value="{{old('name')}}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expiration Years</label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="expiration_years" value="{{old('expiration_years')}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Amount<span style="color: red">*</span> </label>
                                    <input type="text" class="form-control"  id="inputPassword3" name="amount" value="{{old('amount')}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Staus <span style="color: red">*</span> </label>
                                    <select name="status" class="form-control" id="type" required>
                                        <option value="" selected disabled>Please select Status</option>
                                        @foreach(config('custom.status') as $in => $val)
                                            <option value="{{$in}}" @if(old('status') == $in) selected @endif >{{$val}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="value_section">

                                </div>
                            </div>

                        </div>
                        <div class="form-group row create-button">
                            <div class="col-sm-10 col-md-12">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


