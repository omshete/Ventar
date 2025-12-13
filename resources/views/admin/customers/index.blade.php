@extends('admin.layouts.app')

@section('title','Customers')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Customers</h2>
    <a href="{{ route('admin.customers.create') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        + Add Customer
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded text-sm mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="min-w-full bg-white rounded-xl shadow overflow-hidden text-sm">
    <thead class="bg-slate-100 text-left">
    <tr>
        <th class="px-4 py-2">Name</th>
        <th class="px-4 py-2">Company</th>
        <th class="px-4 py-2">Logo</th>
        <th class="px-4 py-2 text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($customers as $customer)
        <tr class="border-t">
            <td class="px-4 py-2 font-medium">{{ $customer->name }}</td>
            <td class="px-4 py-2">{{ $customer->company_name ?? '-' }}</td>
            <td class="px-4 py-2">
                @if($customer->logo_path)
                    <img src="{{ asset('storage/'.$customer->logo_path) }}"
                         alt="{{ $customer->name }}"
                         class="h-8 w-auto rounded">
                @else
                    <span class="text-slate-400 text-xs">No logo</span>
                @endif
            </td>
            <td class="px-4 py-2 text-right space-x-2">
                <a href="{{ route('admin.customers.edit', $customer) }}"
                   class="text-xs text-blue-600">Edit</a>
                <form action="{{ route('admin.customers.destroy', $customer) }}"
                      method="post" class="inline"
                      onsubmit="return confirm('Delete this customer?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-xs text-red-600">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="px-4 py-6 text-center text-slate-500 text-sm">
                No customers added yet.
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $customers->links() }}
</div>
@endsection
