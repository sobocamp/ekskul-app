{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('layouts.template')

@section('title', 'Dashboard Administrator')

@section('content')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3>Dashboard Administrator</h3>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <p>Selamat datang, {{ Auth::user()->name }}!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Ekstrakurikuler</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-white bg-primary">
                            <i class="align-middle" data-feather="book-open"></i>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3">{{ $extracurriculars }}</h1>
                <div class="mb-0">
                    <a href="{{ url('admin/extracurricular') }}">Lihat Data</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Pembina</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-white bg-danger">
                            <i class="align-middle" data-feather="user"></i>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3">{{ $pembina }}</h1>
                <div class="mb-0">
                    <a href="{{ url('admin/pembina') }}">Lihat Data</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Periode Pendaftaran</h5>
                    </div>

                    <div class="col-auto">
                        <div class="stat text-white bg-info">
                            <i class="align-middle" data-feather="calendar"></i>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3">{{ $registration_period }}</h1>
                <div class="mb-0">
                    <a href="{{ url('admin/periode') }}">Lihat Data</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
