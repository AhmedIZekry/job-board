<div>
    <nav class="mb-8 flex justify-between text-lg font-medium">
        <ul class="flex space-x-2">
            <li>
                <a href="{{ route('jobs.index') }}">Home</a>
            </li>
        </ul>

        <ul class="flex space-x-4">
            @auth
                <li>
                    <a href="#">
                        {{ auth()->user()->name ?? 'Anonymous' }}: Applications
                    </a>
                </li>
                <li>
                    <a href="#">My Jobs</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button>Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}">Sign in</a>
                </li>
            @endauth
        </ul>
    </nav>
</div>
