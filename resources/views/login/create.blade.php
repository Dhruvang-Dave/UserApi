Nice... Now log in.
<form action="/sessions" method="get">
    @csrf
    
    Email:- <input type="text" name="email">
    @error('email')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
    Password:- <input type="password" name="password">
    @error('password')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
    <button type="submit" > Login </button>
</form>

<form action="/sessions" method="get">
    <button type="submit"> LogOut </button>
</form>
