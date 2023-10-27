<x-layout title="Login">
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label"></label>
            <input type="email" name="email" id="email" class="form-group">
        </div>

        <div class="form-group">
            <label for="password" class="form-label"></label>
            <input type="password" name="password" id="password" class="form-group">
        </div>

        <button class="btn btn-primary mt-3">Entra</button>
    </form>
</x-layout>