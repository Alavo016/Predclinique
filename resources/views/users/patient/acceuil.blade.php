<form action="{{ route('logout') }}" method="post">
@csrf

    <button type="submit" class="btn btn-danger">Deconnecté</button>
</form>
