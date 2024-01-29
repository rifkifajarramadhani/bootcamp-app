@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    My Camps
                </div>
                <div class="card-body">
                    @include('components.alert')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Camp</th>
                                <th>Price</th>
                                <th>Register Data</th>
                                <th>Paid Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($checkouts as $checkout)
                            <tr>
                                <td>{{ $checkout->User->name }}</td>
                                <td>{{ $checkout->Camp->title }}</td>
                                <td>{{ $checkout->Camp->price }}</td>
                                <td>{{ $checkout->created_at->format('M d Y') }}</td>
                                <td>
                                    @if($checkout->is_paid)
                                    <span class="badge bg-success">Paid</span>
                                    @else
                                    <span class="badge bg-warning">Waiting</span>
                                    @endif
                                </td>
                                <td>
                                    @if(!$checkout->is_paid)
                                    <form action="{{ route('admin.checkout.update', $checkout) }}" method="post">
                                        @csrf
                                        <button class="btn btn-primary btn-sm">Set to Paid</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan=3>No camps registered</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    My Bootcamps
                </h2>
            </div>
        </div>
        <div class="row my-5">
            @include('components.alert')
            <table class="table">
                <tbody>
                    @forelse ($checkouts as $checkout)
                    <tr class="align-middle">
                        <td width="18%">
                            <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                        </td>
                        <td>
                            <p class="mb-2">
                                <strong>{{ $checkout->Camp->title }}</strong>
                            </p>
                            <p>
                                {{ $checkout->created_at->format('M d, Y') }}
                            </p>
                        </td>
                        <td>
                            <strong>{{ $checkout->Camp->price }}k</strong>
                        </td>
                        <td>
                            @if($checkout->is_paid)
                            <strong class="text-success">Payment Success</strong>
                            @else
                            <strong>Waiting for Payment</strong>
                            @endif
                        </td>
                        <td>
                            <a href="https://wa.me/085819529740?text=Hi, saya ingin bertanya tentang kelas {{ $checkout->Camp->title }}" class="btn btn-primary" target="_blank">
                                Contact Support
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan=5>
                            <h3>No Data</h3>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section> -->

@endsection
