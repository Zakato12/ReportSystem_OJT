@extends('layouts.themes.main')
@section('page-title', 'View Account')

@section('content')

    <main class="main-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/accounts')}}">Account List</a></li>
                        <li class="breadcrumb-item"><a href="{{route('accounts.view', $details->account_id)}}">Account Details</a> </li>
                        <li class="breadcrumb-item active" aria-current="page">Account Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

            
        <div class="content-container">

                <main class="container">
                    <div class="container">
                    <h4 class="text-center mb-4  fw-bold">Account Details</h4>
                    {{-- View Account Body --}}

                        <form id="viewaccountForm" method="POST" action="{{route('account.update', $details->account_id)}}" aria-label="Add Account">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group position-relative">
                                        <label class="p-3 fw-semibold" for="account">Account</label>
                                        <select name="account" id="account" class="form-select" required>
                                            @foreach ($accounts as $acc)
                                                <option value="{{ $acc->account_id }}"
                                                    @if (old('account', $details->account_id) == $acc->account_id) selected @endif>
                                                    {{ $acc->account_name }}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4 text-end">
                                    <button class="btn btn-success ms-1" type="submit">Update</button>
                                    <a class="btn btn-secondary"  href="{{route('accounts.view' , $details->accounts_id)}}">Cancel</a>
                                </div>
                               
                        </form>
                    </div>
                </main>
        </div>  

    </div>

</main>

        <script>
             document.addEventListener('DOMContentLoaded', function() {

                document.getElementById('openviewAccount').addEventListener('click', function() {
                    var viewaccount = new bootstrap.Modal(document.getElementById('viewticketModal'));
                    viewaccount.show();
                });

                
            });
        </script>

@endsection