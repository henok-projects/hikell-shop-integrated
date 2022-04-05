<div class="w-full px-8 leading-normal lg:w-4/5">
    <div class="font-sans">
        <h1 class="pt-6 pb-2 font-sans text-xl uppercase break-normal">
            @php
                $header = substr_replace($content," From ", 7, 0);
            @endphp
            {{ $header  }} And Golden Buzzer</h1>
        <hr class="border-b border-gray-400">
    </div>

    <div class="flex flex-col w-full">
        <div class="flex flex-col flex-1 mx-2 md:flex-row lg:flex-row">
            <div class="w-full h-auto mb-2 border border-gray-300 border-solid rounded shadow-sm">
                <div class="px-2 py-3 bg-gray-200 border-b border-gray-200 border-solid">
                    Total HGT & Golden Buzzer
                </div>
                <div class="p-3">
                    <table class="w-full text-center rounded table-responsive">
                        <thead>
                        <tr>
                            <th class="w-1/4 px-4 py-2 text-center border">#</th>
                            <th class="w-1/6 px-4 py-2 text-center border">Amount</th>
                            <th class="w-1/6 px-4 py-2 text-center border">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(isset($payments) && count($payments)>0)
                            @foreach ($payments as $payment )
                            <tr>
                                <td class="px-4 py-2 text-center border">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 text-center border">{{ $payment->amount }} $</td>
                                <td class="px-4 py-2 text-center border">{{ $payment->created_at }}</td>
                            </tr>
                            @endforeach
                            @else
                             <tr>
                                <td colspan="4">No payment data</td>
                             </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
