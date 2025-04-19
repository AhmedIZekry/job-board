@php use Illuminate\Support\Facades\Auth; @endphp
<div>
    <nav class="mb-8 flex justify-between text-lg font-medium">
        <ul class="flex space-x-2">
            <li>
                <a href="{{ route('jobs.index') }}">Home</a>
            </li>
        </ul>

        <ul class="flex space-x-4">
            @auth

                @if(Auth::user()->role === 'employer')
                    <li>
                        <a href="#">{{Auth::user()->name}}</a>
                    </li>
                    <li>
                        <a href="{{route('employer.index')}}">My Jobs</a>
                    </li>
                @else
                    <li>
                        <a href="#">{{Auth::user()->name}}</a>
                    </li>
                    <li>
                        <a href="#">
                            {{ auth()->user()->name }}: Applications
                        </a>
                    </li>
                    <li>
                        <a href="#">Become Employer</a>
                    </li>
                @endif
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
