<form action="{{ route('response') }}" method="POST">
    @csrf
    <!-- Other form fields -->
    <button type="submit">Submit</button>
</form>
