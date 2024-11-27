<!-- resources/views/features.blade.php -->
@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container my-5">
    <h2 class="text-">Contacts Us</h2>
    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">First Name</label>
            <input
                type="text"
                class="form-control"
                name=""
            />
        </div>
        
        <div class="col-md-6">
            <label for="" class="form-label">Last Name</label>
            <input
                type="text"
                class="form-control"
                name=""
            />
        </div>
            
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    name=""
                />
            </div>
            
            <div class="col-md-6">
                <label for="" class="form-label">Number</label>
                <input
                    type="number"
                    class="form-control"
                    name=""
                />
            </div>
                
            </div>
            <div class="row">
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" name=""  rows="3"></textarea>
                </div>
                
            </div>
    </div>
</div>
@endsection
