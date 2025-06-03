@extends('frontEnd.layouts.master')
@section('title', 'Agent Transection')
@section('content')
    <section class="agent_auth section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="agent_auth_box">
                        <h5 class="agent-auth-title">Withdraw History</h5>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2025-05-28</td>
                                    <td>৳ 5000</td>
                                    <td class="status-success">Success</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2025-05-26</td>
                                    <td>৳ 3000</td>
                                    <td class="status-pending">Pending</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2025-05-20</td>
                                    <td>৳ 7000</td>
                                    <td class="status-failed">Failed</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('script')
    <script src="{{ asset('public/frontEnd/') }}/js/parsley.min.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/form-validation.init.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <script></script>
@endpush
