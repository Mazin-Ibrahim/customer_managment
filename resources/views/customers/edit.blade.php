@extends('layouts.admin')

@section('title','تعديل')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card p-10">

            <form id="kt_modal_new_target_form" enctype="multipart/form-data"
                class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post"
                action="{{ route('customers.update',$customer->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-13">
                   <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <div class="d-flex justify-content-between">
                        <h1 class="mb-3 text-danger">تعديل البيانات</h1>

                        <a href="{{ route('customers.index') }}" class="btn btn-success">رجوع</a>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
        
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">اﻷسم</span>
                            </label>
        
        
                            <input  type="text" class="form-control" name="name" value="{{ $customer->name }}">
                            @error('name')
                                <div class="fv-plugins-message-container invalid-feedback fs-4">
                                    {{ $message }}
        
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
        
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">البريد اﻷلكتروني</span>
                            </label>
        
        
                            <input  type="email" class="form-control" name="email" value="{{ $customer->email }}">
                            @error('email')
                                <div class="fv-plugins-message-container invalid-feedback fs-4">
                                    {{ $message }}
        
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-xl-6">
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
        
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">رقم الهاتف</span>
                            </label>
        
        
                            <input  type="tel" class="form-control" name="phone" value="{{ $customer->phone }}">
                            @error('phone')
                                <div class="fv-plugins-message-container invalid-feedback fs-4">
                                    {{ $message }}
        
                                </div>
                            @enderror
                        </div>
                    </div>

                    
                    
                    
        
        
                    <div class="text-center">
                        {{-- <a href="{{ route('dashboard.opportunities.index') }}" id="kt_modal_new_target_cancel" class="btn btn-light me-3">رجوع</a> --}}
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">حفظ</span>
                            <span class="indicator-progress">
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
        
                    <div>
        
                    </div>
                </div>
            </form>
        
        </div>
    </div>
</div>
 
@endsection