@extends('layouts.admin')

@section('title','قائمة العملاء')
@section('content')
<div class="card p-10">
    <div class="card-title">
        <div class="d-flex justify-content-between">
            <h1 class="mb-3 text-danger">العملاء</h1>
             <a href="{{ route('customers.create') }}" class="btn btn-success">أضافة</a>
         </div>
    </div> 

     <div class="row">
        <form method="GET" action="{{ route('customers.index') }}">
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" name="email" placeholder="البريد اﻷلكتروني" value="{{ request('email') }}">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="phone" placeholder="رقم الهاتف" value="{{ request('phone') }}">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">تصفية</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">افراغ</a>
                </div>
            </div>
        </form>
     </div>
    <div class="table-responsive">
        <table class="table table-rounded table-row-dashed border gy-3 gs-3 yajra-datatable">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800">
                    <th>الأسم</th>
                    <th>البريد اﻷلكتروني</th>
                    <th>رقم الهاتف</th>
                    <th >التحكم</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td class="d-flex">
                        <a href="{{ route('customers.edit',$customer->id) }}" class="btn btn-primary btn-sm mx-2" data-bs-toggle="tooltip" data-bs-placement="top" title="تعديل البيانات">
                            تحرير
                         </a>

                         <form method="POST" action="{{ route('customers.delete',$customer->id) }}">
                           @method('DELETE')
                           @csrf
                           <button class="btn btn-danger btn-sm" type="submit">حذف</button>
                        </form>
                    </td>
                    </tr>
                @empty
                     <h3 class="m-5">لا توجد بيانات</h3>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection