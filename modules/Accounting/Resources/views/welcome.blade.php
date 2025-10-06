<div class="p-6">
    <h1 class="text-3xl font-bold mb-4">Welcome to Accounting Module 🎉</h1>

    @if($user)
    <p>Hello, <strong>{{ $user->name }}</strong>! Your account was created on <strong>{{ $user->created_at->format('d M Y') }}</strong>.</p>
    @else
    <p>Hello, Guest! Please login to access full features.</p>
    @endif

    <p>This is a default Livewire welcome component in <code>modules/Accounting/Resources/views/welcome.blade.php</code></p>
    <!-- //test route button for livewire component -->
    <!-- <button wire:navigate href="{{ route('accounting.test') }}" class="btn btn-primary">Go to Test</button> -->
    <x-button color="success" size="btn-sm" wire:navigate="save" href="{{ route('accounting.test') }}">
        <i class="bi bi-check-circle"></i> Save
    </x-button>

    <x-button accounting.test danger btn-sm>
        <i class="bi bi-graph-up"></i> Reports
    </x-button>

    

</div>