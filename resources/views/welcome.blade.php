@extends('layouts.app')

@section('content')
    <div class="row h-100">
        <div class="col-2">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#test-one" role="tab">Anagrams</a>
                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#test-two" role="tab">Restful API</a>
                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#test-three" role="tab">Pattern</a>
            </div>
        </div>
        <div class="col-10">
            <div class="card h-100">
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="test-one" role="tabpanel">
                            @include('tests.one')
                        </div>
                        <div class="tab-pane fade" id="test-two" role="tabpanel">
                            @include('tests.two')
                        </div>
                        <div class="tab-pane fade" id="test-three" role="tabpanel">
                            @include('tests.three')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-js')
    <script src="{{ asset('js/one.js') }}"></script>
    <script src="{{ asset('js/two.js') }}"></script>
    <script src="{{ asset('js/three.js') }}"></script>
@endpush
