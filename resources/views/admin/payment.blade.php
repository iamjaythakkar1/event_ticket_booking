<x-admin-layout>

    <x-slot name='title'>Admin - Payments</x-slot>

    <x-slot name='main'>
    <main class="dash-content">
        <div class="container-fluid">
            <h1 class="dash-title">Payments</h1>
            <!-- <div class="card spur-card"> -->
            <div class="" style="background: white; border:1px solid #d3d3d3">
                <div class="card-body ">
                    <table class="table table-hover table-in-card">
                        <thead>
                            <tr>
                                <th scope="col">Payment Id</th>
                                <th scope="col">Payment Number</th>
                                <th scope="col">Transaction ID</th>
                                <th scope="col">User Email</th>
                                <th scope="col">Event Name</th>
                                <th scope="col">Event Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Method</th>
                                <th scope="col">Date / Time</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                        <tbody>
                          {{-- Foreach Loop --}}
                          @foreach ($payments as $payment)
                                <tr>
                                    <th scope="row">{{ $payment->id }}</th>
                                    <td>{{ $payment->paymentno }}</td>
                                    <td>{{ $payment->txn_id }}</td>
                                    <td>{{ $payment->user->user_email }}</td>
                                    <td>{{ $payment->event->event_name }}</td>
                                    <td>{{ $payment->event_price }}</td>
                                    <td>{{ $payment->quantity }}</td>
                                    <td>{{ $payment->payment_amount }}</td>
                                    <td>{{ $payment->payment_method }}</td>
                                    <td>{{ $payment->created_at }}</td>
                                    <td>{{ $payment->status }}</td>
                                </tr>
                                @endforeach
                           {{-- End Foreach Loop --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</x-slot>
</x-admin-layout>