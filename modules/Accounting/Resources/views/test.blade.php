<div class="p-6">
    <h1 class="text-3xl font-bold mb-4">Accounting Module Test Page 🧪</h1>

    @if($user)
        <p>Hello, <strong>{{ $user->name }}</strong>! Your account was created on <strong>{{ $user->created_at->format('d M Y') }}</strong>.</p>
    @else
        <p>Hello, Guest! Please login to access test features.</p>
    @endif

    <p>This is the <code>test.blade.php</code> page for the Accounting module.</p>


</div>